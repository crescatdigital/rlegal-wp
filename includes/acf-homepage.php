<?php
/**
 * Register ACF fields for the Homepage (local registration).
 *
 * These fields are registered only when ACF is active. Defaults mirror
 * the current hardcoded content so editors see existing values immediately.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'acf/init', 'ri_legal_register_homepage_acf_fields' );
function ri_legal_register_homepage_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // Helper to get theme image url default
    $default = function( $file ) {
        if ( function_exists( 'ri_legal_image_url' ) ) {
            return ri_legal_image_url( $file );
        }
        return '';
    };

    acf_add_local_field_group(array(
        'key' => 'group_ri_homepage',
        'title' => 'Homepage Content',
        'show_in_graphql' => true,
        'graphql_field_name' => 'homepageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key' => 'field_services_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name' => 'services_hero_eyebrow',
                'type' => 'text',
                'default_value' => 'Immigration Solicitors In London',
            ),
            array(
                'key' => 'field_services_hero_heading',
                'label' => 'Hero Heading (each line on new line)',
                'name' => 'services_hero_heading',
                'type' => 'textarea',
                'default_value' => "The UK's Leading\nExperts in Immigration\nfor Over 20 Years",
            ),
            array(
                'key' => 'field_services_hero_description',
                'label' => 'Hero Description',
                'name' => 'services_hero_description',
                'type' => 'textarea',
                'default_value' => "Our immigration lawyers work with you to deal with visa issues.",
            ),
            array(
                'key'   => 'field_services_hero_cta',
                'label' => 'Hero CTA',
                'name'  => 'services_hero_cta',
                'type'  => 'link',
                'default_value' => array(
                    'url'    => '#',
                    'title'  => 'Get a Free Consultation',
                    'target' => '_self',
                ),
            ),
            array(
                'key' => 'field_services_reviews_text',
                'label' => 'Reviews Text',
                'name' => 'services_reviews_text',
                'type' => 'text',
                'default_value' => 'Rated 4.9/5 from 529 verified reviews',
            ),
            array(
                'key' => 'field_services_form_heading',
                'label' => 'Form Heading',
                'name' => 'services_form_heading',
                'type' => 'text',
                'default_value' => 'Get in touch with our lawyers',
            ),
            // array(
            //     'key' => 'field_services_form_button_text',
            //     'label' => 'Form Button Text',
            //     'name' => 'services_form_button_text',
            //     'type' => 'text',
            //     'default_value' => 'Send Request',
            // ),
            array(
                'key' => 'field_specialists_heading',
                'label' => 'Specialists Heading',
                'name' => 'specialists_heading',
                'type' => 'text',
                'instructions' => 'HTML allowed. Wrap words in &lt;span class="hp-ink"&gt;…&lt;/span&gt; to render them in black instead of purple.',
                'default_value' => 'Specialists <span class="hp-ink">in Immigration</span> Law',
            ),
            array(
                'key' => 'field_specialists_paragraph',
                'label' => 'Specialists Paragraph',
                'name' => 'specialists_paragraph',
                'type' => 'textarea',
                'new_lines' => '',
                'instructions' => 'HTML allowed. Use &lt;a class="hp-link" href="/inner-page/"&gt;…&lt;/a&gt; to link phrases to inner pages and &lt;strong&gt;…&lt;/strong&gt; to bold.',
                'default_value' => 'Our immigration solicitors provide <strong>expert legal advice across all areas of UK immigration law</strong>, supporting individuals and businesses with <a class="hp-link" href="/private-immigration/">visa applications</a>, <a class="hp-link" href="/corporate-immigration/">extensions</a>, and <a class="hp-link" href="/indefinite-leave-to-remain/">settlement routes</a>. We take a structured, detail-focused approach to every case, ensuring applications are prepared accurately and in line with current <a class="hp-link" href="/visa-refusal-appeals/">Home Office requirements</a>.',
            ),
            array(
                'key' => 'field_trust_image_1',
                'label' => 'Trust Image 1',
                'name' => 'trust_image_1',
                'type' => 'image',
                'return_format' => 'url',
                'default_value' => $default('solicitors.webp'),
            ),
            array(
                'key' => 'field_trust_image_1_link',
                'label' => 'Trust Image 1 Link',
                'name' => 'trust_image_1_link',
                'type' => 'link',
            ),
            array(
                'key' => 'field_trust_image_2',
                'label' => 'Trust Image 2',
                'name' => 'trust_image_2',
                'type' => 'image',
                'return_format' => 'url',
                'default_value' => $default('legal-500.webp'),
            ),
            array(
                'key' => 'field_form_request_title',
                'label' => 'Form Request Title',
                'name' => 'form_request_title',
                'type' => 'text',
                'default_value' => 'Get in touch with our lawyers',
            ),
            array(
                'key' => 'field_services_business',
                'label' => 'Services - Business (repeater)',
                'name' => 'services_business',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_title',
                        'label' => 'Service Title',
                        'name' => 'business_service_title',
                        'type' => 'text',
                        'default_value' => 'Service A',
                    ),
                    array(
                        'key' => 'field_service_image_bus',
                        'label' => 'Service Image',
                        'name' => 'business_service_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_service_link_bus',
                        'label' => 'Service Link',
                        'name' => 'business_service_link',
                        'type' => 'link', 
                        'return_format' => 'array',
                    )
                ),
                'default_value' => array(array('service_title' => 'Service A'), array('service_title' => 'Service A'), array('service_title' => 'Service A'), array('service_title' => 'Service A')),
            ),
            array(
                'key' => 'field_services_individual',
                'label' => 'Services - Individual (repeater)',
                'name' => 'services_individual',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_title_ind',
                        'label' => 'Service Title',
                        'name' => 'individual_service_title',
                        'type' => 'text',
                        'default_value' => 'Service A',
                    ),

                    array(
                        'key' => 'field_service_image_ind',
                        'label' => 'Service Image',
                        'name' => 'individual_service_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),

                    array(
                        'key' => 'field_service_link_ind',
                        'label' => 'Service Link',
                        'name' => 'individual_service_link',
                        'type' => 'link',
                        'return_format' => 'array',
                    )
                ),
                'default_value' => array(array('service_title' => 'Service A'), array('service_title' => 'Service A'), array('service_title' => 'Service A'), array('service_title' => 'Service A')),
            ),
            array(
                'key' => 'field_clear_advice_heading',
                'label' => 'Clear Advice Heading',
                'name' => 'clear_advice_heading',
                'type' => 'text',
                'default_value' => 'Clear, honest advice with a bespoke strategy for your case',
            ),
            array(
                'key' => 'field_clear_advice_usps',
                'label' => 'Clear Advice USPs',
                'name' => 'clear_advice_usps',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_usp_text',
                        'label' => 'USP Text',
                        'name' => 'usp_text',
                        'type' => 'text',
                        'default_value' => 'KEY USP 1',
                    ),
                ),
                'default_value' => array(array('usp_text' => 'KEY USP 1'), array('usp_text' => 'KEY USP 2'), array('usp_text' => 'KEY USP 3')),
            ),
            array(
                'key' => 'field_phone_number',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'default_value' => '0207 038 3880',
            ),
            array(
                'key' => 'field_location_heading',
                'label' => 'Location Heading',
                'name' => 'location_heading',
                'type' => 'text',
                'default_value' => 'Where to find us',
            ),
            array(
                'key' => 'field_location_address',
                'label' => 'Location Address (HTML allowed)',
                'name' => 'location_address',
                'type' => 'textarea',
                'default_value' => "Third Floor, Linen Hall\n162-168 Regent Street\nLondon\nW1B 5TD",
            ),
            array(
                'key' => 'field_newsletter_title',
                'label' => 'Newsletter Title',
                'name' => 'newsletter_title',
                'type' => 'text',
                'default_value' => 'The RLegal Immigration Newsletter',
            ),
            array(
                'key' => 'field_newsletter_subheading',
                'label' => 'Newsletter Subheading',
                'name' => 'newsletter_subheading',
                'type' => 'textarea',
                'default_value' => 'Get the latest immigration law news, updates and advice straight to your inbox',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page',
                    'operator' => '==',
                    'value'    => get_option( 'page_on_front' ),
                ),
            ),
        ),
    ));
}
