<?php
/**
 * Register ACF fields for global options page (Custom Options).
 *
 * These fields are available site-wide and intended for common UI blocks.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'acf/init', 'ri_legal_register_options_acf_fields' );
function ri_legal_register_options_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // Ensure options page exists when ACF is active
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page(array(
            'page_title'  => 'Custom Options',
            'menu_title'  => 'Custom Options',
            'menu_slug'   => 'custom-options',
            'capability'  => 'manage_options',
            'position'    => false,
            'redirect'    => false,
        ));
    }

    // Helper default image
    $default = function( $file ) {
        if ( function_exists( 'ri_legal_image_url' ) ) {
            return ri_legal_image_url( $file );
        }
        return '';
    };

    acf_add_local_field_group(array(
        'key' => 'group_ri_options',
        'title' => 'Custom Options',
        'fields' => array(
            array(
                'key' => 'field_opt_phone_number',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'default_value' => '0207 038 3880',
            ),
            array(
                'key' => 'field_opt_reviews_rating_text',
                'label' => 'Reviews Rating Text',
                'name' => 'reviews_rating_text',
                'type' => 'text',
                'default_value' => 'Rated 4.9/5 from 515 verified reviews',
            ),
            array(
                'key' => 'field_opt_trust_image_1',
                'label' => 'Trust Image 1',
                'name' => 'trust_image_1',
                'type' => 'image',
                'return_format' => 'url',
                'default_value' => $default('legal-500.webp'),
            ),
            array(
                'key' => 'field_opt_trust_image_2',
                'label' => 'Trust Image 2',
                'name' => 'trust_image_2',
                'type' => 'image',
                'return_format' => 'url',
                'default_value' => $default('reviews-io.webp'),
            ),
            array(
                'key' => 'field_opt_hero_cta_text',
                'label' => 'Hero CTA Text',
                'name' => 'hero_cta_text',
                'type' => 'text',
                'default_value' => 'Get a Free Consultation',
            ),
            array(
                'key' => 'field_opt_hero_cta_link',
                'label' => 'Hero CTA Link',
                'name' => 'hero_cta_link',
                'type' => 'text',
                'default_value' => '#consultation',
            ),
            array(
                'key' => 'field_opt_featured_article_image',
                'label' => 'Featured Article Image',
                'name' => 'featured_article_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_opt_featured_article_title',
                'label' => 'Featured Article Title',
                'name' => 'featured_article_title',
                'type' => 'text',
                'default_value' => 'Featured Article Title',
            ),
            array(
                'key' => 'field_opt_featured_article_excerpt',
                'label' => 'Featured Article Excerpt',
                'name' => 'featured_article_excerpt',
                'type' => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ),
            array(
                'key' => 'field_opt_newsletter_title',
                'label' => 'Newsletter Title',
                'name' => 'newsletter_title',
                'type' => 'text',
                'default_value' => 'The RLegal Immigration Newsletter',
            ),
            array(
                'key' => 'field_opt_newsletter_subheading',
                'label' => 'Newsletter Subheading',
                'name' => 'newsletter_subheading',
                'type' => 'textarea',
                'default_value' => 'Get the latest immigration law news, updates and advice straight to your inbox',
            ),
            array(
                'key'           => 'field_opt_reviews_clients_count',
                'label'         => 'Reviews: Clients Served Count',
                'name'          => 'reviews_clients_count',
                'type'          => 'text',
                'default_value' => '5000+',
            ),
            array(
                'key'           => 'field_opt_reviews_count',
                'label'         => 'Reviews: Review Count',
                'name'          => 'reviews_count',
                'type'          => 'text',
                'default_value' => '500+',
            ),
            array(
                'key'          => 'field_opt_reviews_cards',
                'label'        => 'Reviews: Cards',
                'name'         => 'reviews_cards',
                'type'         => 'repeater',
                'min'          => 1,
                'layout'       => 'block',
                'button_label' => 'Add Review Card',
                'sub_fields'   => array(
                    array(
                        'key'   => 'field_opt_reviews_card_title',
                        'label' => 'Title',
                        'name'  => 'card_title',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_opt_reviews_card_body',
                        'label' => 'Body',
                        'name'  => 'card_body',
                        'type'  => 'textarea',
                        'rows'  => 3,
                    ),
                    array(
                        'key'   => 'field_opt_reviews_card_name',
                        'label' => 'Client Name',
                        'name'  => 'card_name',
                        'type'  => 'text',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'custom-options',
                ),
            ),
        ),
    ));
}

add_action( 'acf/init', 'ri_legal_seed_reviews_cards' );
function ri_legal_seed_reviews_cards() {
    if ( ! function_exists( 'get_field' ) ) return;

    if ( ! get_field( 'reviews_clients_count', 'option' ) ) {
        update_field( 'reviews_clients_count', '5000+', 'option' );
    }

    if ( ! get_field( 'reviews_count', 'option' ) ) {
        update_field( 'reviews_count', '500+', 'option' );
    }

    if ( get_field( 'reviews_cards', 'option' ) ) return;

    update_field( 'reviews_cards', array(
        array(
            'card_title' => 'Excellent Service',
            'card_body'  => 'Excellent support from start to finish. The team was responsive, knowledgeable, and made the entire process stress-free.',
            'card_name'  => 'John Smith',
        ),
        array(
            'card_title' => 'Highly Recommended',
            'card_body'  => 'Excellent support from start to finish. The team was responsive, knowledgeable, and made the entire process stress-free.',
            'card_name'  => 'Sarah Johnson',
        ),
        array(
            'card_title' => 'Professional Team',
            'card_body'  => 'Excellent support from start to finish. The team was responsive, knowledgeable, and made the entire process stress-free.',
            'card_name'  => 'Michael Brown',
        ),
        array(
            'card_title' => 'Outstanding Results',
            'card_body'  => 'RLegal delivered clear, reliable immigration advice, handled every detail precisely, and secured a successful outcome without stress.',
            'card_name'  => 'Emily Davis',
        ),
    ), 'option' );
}
