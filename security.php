<?php


/* ---- Security hardening ---- */

// 1. Disable application passwords site-wide
add_filter('wp_is_application_passwords_available', '__return_false');

// 2. Disable XML-RPC and pingbacks
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', function ($methods) {
    unset($methods['pingback.ping'], $methods['pingback.extensions.getPingbacks']);
    return $methods;
});
add_filter('wp_headers', function ($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
add_action('init', function () {
    if (isset($_SERVER['SCRIPT_FILENAME']) && basename($_SERVER['SCRIPT_FILENAME']) === 'xmlrpc.php') {
        status_header(403);
        exit('xmlrpc disabled');
    }
}, 1);

// 3. Disable file editing in admin
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

// 7. Disable plugin/theme install, update, and deletion
if (!defined('DISALLOW_FILE_MODS')) {
    define('DISALLOW_FILE_MODS', true);
}

// 4. Block REST API user enumeration for anyone who cannot list users
add_filter('rest_endpoints', function ($endpoints) {
    if (!current_user_can('list_users')) {
        unset($endpoints['/wp/v2/users']);
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});

// 5. Block author enumeration via ?author=N
add_action('template_redirect', function () {
    if (is_admin()) {
        return;
    }
    if (!empty($_GET['author']) || is_author()) {
        wp_safe_redirect(home_url('/'), 301);
        exit;
    }
});

// 6. Hide WP version
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_empty_string');