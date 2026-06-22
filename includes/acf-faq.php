<?php

add_action( 'acf/init', 'ri_legal_register_faq_page_acf_fields' );
function ri_legal_register_faq_page_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(array(
    'key' => 'group_faq_section',
    'title' => 'FAQ Section',
    'show_in_graphql' => true,
    'graphql_field_name' => 'faqSection',
    'graphql_types' => array( 'Page' ),
    'fields' => array(

        array(
            'key' => 'field_faq_title',
            'label' => 'FAQ Title',
            'name' => 'faq_title',
            'type' => 'text',
            'default_value' => 'Frequently Asked Questions',
        ),

        array(
            'key' => 'field_faq_items',
            'label' => 'FAQ Items',
            'name' => 'faq_items',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add FAQ',
            'sub_fields' => array(

                array(
                    'key' => 'field_faq_question',
                    'label' => 'Question',
                    'name' => 'question',
                    'type' => 'text',
                    'default_value' => 'Question about visas?',
                ),

                array(
                    'key' => 'field_faq_answer',
                    'label' => 'Answer',
                    'name' => 'answer',
                    'type' => 'textarea',
                    'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                ),
            ),
        ),
        array(
            'key' => 'field_services_clear_advice_usps',
            'label' => 'Clear Advice USPs',
            'name' => 'services_clear_advice_usps',
            'type' => 'repeater',
            'sub_fields' => array(
                array(
                    'key' => 'field_services_usp_text',
                    'label' => 'USP Text',
                    'name' => 'usp_text',
                    'type' => 'text',
                    'default_value' => 'KEY USP 1',
                ),
            ),
            'default_value' => array(array('usp_text' => 'Clear Suggestions'), array('usp_text' => 'Honest Advice'), array('usp_text' => 'Bespoke Strategy')),
        ),

    ),

        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-faqs.php',
                ),
            ),
        ),
    ));
}