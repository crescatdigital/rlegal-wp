<?php
// Simple script to prettify HTML outside of PHP blocks in PHP files.
// Note: this will attempt to keep PHP blocks intact and only format the HTML between them.

function format_html_fragment($html) {
    $html = trim($html);
    if ($html === '') return $html;

    // Use DOMDocument to format HTML
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    // Avoid adding extra <html><body> wrappers
    // avoid raw '<?xml' literal in source to prevent short-open-tag parser issues
    $xmldecl = '<?' . 'xml encoding="utf-8"?>';
    $loaded = $dom->loadHTML( $xmldecl . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    if ( ! $loaded ) {
        // fallback: try wrapping it
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML( $xmldecl . '<div>' . $html . '</div>' );
        $body = $dom->getElementsByTagName('div')->item(0);
        if ($body) {
            $inner = '';
            foreach ($body->childNodes as $node) {
                $inner .= $dom->saveHTML($node);
            }
            return $inner;
        }
        return $html;
    }

    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;

    $out = $dom->saveHTML();

    // DOMDocument may add a doctype or xml prolog; remove the xml encoding added earlier.
    $out = preg_replace('/^\s*<\?xml.*?\?>\s*/', '', $out);

    // Trim leading/trailing blank lines
    $out = trim($out);

    return $out;
}

function process_file($path) {
    $content = file_get_contents($path);
    if ($content === false) return false;

    $parts = preg_split('/(<\?(?:php|=)?|\?>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
    // parts array will alternate between: '', '<?php', '...php...', '?>', '...html...', '<?php', ...

    $out = '';
    $i = 0;
    $len = count($parts);
    while ($i < $len) {
        $piece = $parts[$i];
        if ($piece === '<?php' || $piece === '<?=' || preg_match('/^<\?(?:php|=)?/i', $piece)) {
            // PHP opening tag
            $out .= $piece; // the opening token
            $i++;
            if ($i < $len) {
                // PHP code until closing token '?>' or end
                $phpcode = $parts[$i];
                $out .= $phpcode;
                $i++;
                // If next is '?>', append it
                if ($i < $len && $parts[$i] === '?>') {
                    $out .= $parts[$i];
                    $i++;
                }
            }
        } else {
            // This is HTML (or content before first PHP tag)
            $html = $piece;
            $trimmed = trim($html);
            if ($trimmed !== '') {
                $formatted = format_html_fragment($html);
                // preserve a single newline surrounding blocks
                $out .= "\n" . $formatted . "\n";
            } else {
                $out .= $html;
            }
            $i++;
        }
    }

    // Only write if changed
    if ($out !== $content) {
        file_put_contents($path, $out);
        return true;
    }
    return false;
}

$base = __DIR__ . '/..';
$theme = realpath($base);
if (!$theme) {
    echo "Could not resolve theme directory\n";
    exit(1);
}

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme));
$changedFiles = [];
foreach ($iterator as $file) {
    if (!$file->isFile()) continue;
    $name = $file->getFilename();
    if (pathinfo($name, PATHINFO_EXTENSION) !== 'php') continue;
    $path = $file->getPathname();
    // skip vendor or node_modules if any
    if (strpos($path, '/node_modules/') !== false) continue;
    if (strpos($path, '/.git/') !== false) continue;

    $changed = process_file($path);
    if ($changed) {
        $changedFiles[] = $path;
        echo "Formatted: $path\n";
    }
}

if (empty($changedFiles)) {
    echo "No changes made. Files were already formatted or could not be changed.\n";
} else {
    echo "Formatted " . count($changedFiles) . " files.\n";
}

