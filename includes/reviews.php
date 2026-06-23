<?php
/**
 * Review platforms — single source of truth.
 *
 * Centralises the external links, per-platform review counts and the
 * "how is this calculated" tooltip used by the REVIEWS badges across the
 * theme. Update the counts here and every badge/tooltip stays in sync.
 *
 * @package RI_Legal_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Canonical review data. Counts last verified: June 2026.
 *
 * The Google link uses the listing CID derived from the Maps place ID used in
 * the contact-page embed (RLegal Solicitors, 162-168 Regent Street, London).
 */
function ri_reviews_data() {
    return array(
        'reviewsio' => array(
            'url'   => 'https://www.reviews.co.uk/company-reviews/store/rlegal-solicitors',
            'count' => 358,
            'label' => 'Reviews.co.uk',
        ),
        'google' => array(
            'url'   => 'https://www.google.com/maps?cid=7324618092525236965',
            'count' => 171,
            'label' => 'Google',
        ),
        'rating' => '4.9',
    );
}

/** Total verified reviews across all platforms (e.g. 529). */
function ri_reviews_total() {
    $d = ri_reviews_data();
    return (int) $d['reviewsio']['count'] + (int) $d['google']['count'];
}

/** External URL for a platform ('reviewsio' | 'google'). */
function ri_review_url( $which ) {
    $d = ri_reviews_data();
    return isset( $d[ $which ]['url'] ) ? $d[ $which ]['url'] : '';
}

/**
 * Open an accessible link wrapping a review badge image. Pair with
 * ri_review_link_close(). The inner <img> markup is left untouched so each
 * template keeps its own sizing.
 *
 * @param string $which 'reviewsio' | 'google'
 */
function ri_review_link_open( $which ) {
    $d = ri_reviews_data();
    if ( empty( $d[ $which ]['url'] ) ) {
        return;
    }
    $r     = $d[ $which ];
    $label = sprintf( 'Read our %d reviews on %s (opens in a new tab)', $r['count'], $r['label'] );
    printf(
        '<a href="%1$s" class="ri-review-badge" target="_blank" rel="noopener noreferrer" aria-label="%2$s">',
        esc_url( $r['url'] ),
        esc_attr( $label )
    );
}

/** Close a ri_review_link_open() wrapper. */
function ri_review_link_close() {
    echo '</a>';
}

/**
 * Info icon + tooltip explaining how the headline rating is calculated.
 * Drop in immediately after the rating text inside the REVIEWS block.
 */
function ri_reviews_tooltip() {
    $d     = ri_reviews_data();
    $total = ri_reviews_total();
    $text  = sprintf(
        'The %s/5 score is the average of every verified client review across two independent platforms: %d on %s and %d on %s (%d in total). Each review is left by a real client and verified by the platform.',
        $d['rating'],
        $d['google']['count'],
        $d['google']['label'],
        $d['reviewsio']['count'],
        $d['reviewsio']['label'],
        $total
    );
    ?>
<span class="ri-rtip">
    <button type="button" class="ri-rtip__btn" aria-label="How is this rating calculated?">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
            <circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path>
        </svg>
    </button>
    <span class="ri-rtip__bubble" role="tooltip"><?php echo esc_html( $text ); ?></span>
</span>
    <?php
}
