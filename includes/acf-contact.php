<?php

add_action( 'acf/init', 'ri_legal_register_contact_page_fields' );
function ri_legal_register_contact_page_fields() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(array(
    'key' => 'group_contact_page',
    'title' => 'Contact Page',
    'show_in_graphql' => true,
    'graphql_field_name' => 'contactPageContent',
    'graphql_types' => array( 'Page' ),

    'fields' => array(
        array(
            'key' => 'tab_contact_hero',
            'label' => 'Hero Section',
            'type' => 'tab',
            'placement' => 'top',
        ),
        array(
            'key' => 'field_contact_hero',
            'label' => 'Hero Content',
            'name' => 'contact_hero',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => array(

                array(
                    'key' => 'field_contact_hero_eyebrow',
                    'label' => 'Eyebrow',
                    'name' => 'eyebrow',
                    'type' => 'text',
                    'default_value' => 'Connect with Us',
                ),

                array(
                    'key' => 'field_contact_hero_heading',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'textarea',
                ),

                array(
                    'key' => 'field_contact_hero_cta',
                    'label' => 'CTA Button',
                    'name' => 'cta',
                    'type' => 'link',
                    'return_format' => 'array',
                ),

                array(
                    'key' => 'field_contact_reviews_io',
                    'label' => 'Reviews.io Image',
                    'name' => 'reviews_io_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),

                array(
                    'key' => 'field_contact_google_reviews',
                    'label' => 'Google Reviews Image',
                    'name' => 'google_reviews_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),

                array(
                    'key' => 'field_contact_reviews_text',
                    'label' => 'Reviews Text',
                    'name' => 'reviews_text',
                    'type' => 'text',
                    'default_value' => 'Rated 4.9/5 from 529 verified reviews',
                ),

                array(
                    'key' => 'field_contact_form_heading',
                    'label' => 'Form Heading',
                    'name' => 'form_heading',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'tab_contact_location',
            'label' => 'Location Section',
            'type' => 'tab',
            'placement' => 'top',
        ),
        array(
            'key' => 'field_contact_location',
            'label' => 'Location Content',
            'name' => 'contact_location',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => array(

                array(
                    'key' => 'field_location_heading',
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'default_value' => 'Where to find us',
                ),

                array(
                    'key' => 'field_location_address',
                    'label' => 'Address',
                    'name' => 'address',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_location_map_link',
                    'label' => 'Google Maps Link',
                    'name' => 'map_link',
                    'type' => 'url',
                ),
                array(
                'key' => 'field_location_iframe',
                'label' => 'Map Iframe',
                'name' => 'iframe',
                'type' => 'textarea',
                'instructions' => 'Paste Google Maps embed iframe here',
                ),
            ),
         ),
    ),

    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-contact.php',
            ),
        ),
    ),
));
}