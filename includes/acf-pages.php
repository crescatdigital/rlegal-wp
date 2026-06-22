<?php
/**
 * Register ACF fields for the Services and About pages (local registration).
 *
 * These fields are registered only when ACF is active. Defaults mirror
 * the current hardcoded content so editors see existing values immediately.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'acf/init', 'ri_legal_register_pages_acf_fields' );
function ri_legal_register_pages_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    // SERVICES PAGE
    acf_add_local_field_group(array(
        'key' => 'group_ri_services_page',
        'title' => 'Services Page Content',
        'show_in_graphql' => true,
        'graphql_field_name' => 'servicesPageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key' => 'field_services_hero_eyebrow',
                'label' => 'Hero Eyebrow',
                'name' => 'services_hero_eyebrow',
                'type' => 'text',
                'default_value' => 'Business Visitor Visas in London',
            ),
            array(
                'key' => 'field_services_hero_heading',
                'label' => 'Hero Heading (use new lines for <br>)',
                'name' => 'services_hero_heading',
                'type' => 'textarea',
                'default_value' => "Over 20 years\nsupporting visitor visas\nfor businesses",
            ),
            array(
                'key'   => 'field_services_hero_cta',
                'label' => 'Hero CTA',
                'name'  => 'services_hero_cta',
                'type'  => 'link',
                'default_value' => array(
                    'url'    => '/contact-us',
                    'title'  => 'Get a Free Consultation',
                    'target' => '_self',
                ),
            ),
            array(
                'key' => 'field_services_reviews_text',
                'label' => 'Reviews Rating Text',
                'name' => 'services_reviews_text',
                'type' => 'text',
                'default_value' => 'Rated 4.9/5 from 515 verified reviews',
            ),
            array(
                'key' => 'field_services_section1_heading',
                'label' => 'Section 1 Heading',
                'name' => 'services_section1_heading',
                'type' => 'text',
                'default_value' => 'What is a Business Visitor Visa, and do you need one?',
            ),
            array(
                'key' => 'field_services_section1_content_left',
                'label' => 'Section 1 Left Content',
                'name' => 'services_section1_content_left',
                'type' => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ),
            array(
                'key' => 'field_services_section1_content_right',
                'label' => 'Section 1 Right Content',
                'name' => 'services_section1_content_right',
                'type' => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ),
            array(
                'key' => 'field_services_features',
                'label' => 'Features (cards)',
                'name' => 'services_features',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_services_feature_image',
                        'label' => 'Feature Image',
                        'name' => 'feature_image',
                        'type' => 'image',
                        'return_format' => 'id',
                        'preview_size' => 'medium',
                    ),
                    array(
                        'key' => 'field_services_feature_title',
                        'label' => 'Feature Title',
                        'name' => 'feature_title',
                        'type' => 'text',
                        'default_value' => 'Feature title',
                    ),
                    array(
                        'key' => 'field_services_feature_description',
                        'label' => 'Feature Description',
                        'name' => 'feature_description',
                        'type' => 'textarea',
                        'default_value' => 'Lorem ipsum dolor sit amet, consectetur',
                    ),
                ),
                'default_value' => array(
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                    array('feature_title' => 'Feature title', 'feature_description' => 'Lorem ipsum dolor sit amet, consectetur'),
                ),
            ),
            array(
                'key' => 'field_services_faqs',
                'label' => 'FAQs',
                'name' => 'services_faqs',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_services_faq_q',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'default_value' => 'Question about business visitor visas?',
                    ),
                    array(
                        'key' => 'field_services_faq_a',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    ),
                ),
                'default_value' => array(
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
                ),
            ),
            array(
                'key' => 'field_services_clear_advice_heading',
                'label' => 'Clear Advice Heading',
                'name' => 'services_clear_advice_heading',
                'type' => 'text',
                'default_value' => 'Clear, honest advice with a bespoke strategy for your case',
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
            array(
                'key' => 'field_phone_number_services',
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'type' => 'text',
                'default_value' => '0207 038 3880',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-services.php',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
    ));

    // SERVICE POST TYPE - single service fields
    acf_add_local_field_group(array(
        'key' => 'group_ri_service_post',
        'title' => 'Service Post Fields',
        'show_in_graphql' => true,
        'graphql_field_name' => 'serviceFields',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key' => 'field_service_type',
                'label' => 'Service Type',
                'name' => 'service_type',
                'type' => 'select',
                'choices' => array(
                    'business' => 'Business',
                    'individual' => 'Individual',
                ),
                'default_value' => 'business',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
    ));

    // ABOUT PAGE
    acf_add_local_field_group(array(
        'key' => 'group_ri_about_page',
        'title' => 'About Page Content',
        'show_in_graphql' => true,
        'graphql_field_name' => 'aboutPageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key' => 'field_about_hero_mob_image',
                'label' => 'About Hero Mobile Image',
                'name' => 'about_hero_mob_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_about_hero_desktop_image',
                'label' => 'About Hero Desktop Image',
                'name' => 'about_hero_desktop_image',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'large',
                'library' => 'all',
            ),
            array(
                'key' => 'field_about_eyebrow',
                'label' => 'Eyebrow',
                'name' => 'about_eyebrow',
                'type' => 'text',
                'default_value' => 'Welcome to RLegal Solicitors',
            ),
            array(
                'key' => 'field_about_heading',
                'label' => 'Main Heading (use new lines for <br>)',
                'name' => 'about_heading',
                'type' => 'textarea',
                'default_value' => "About our immigration\nlaw firm, established\nin 2002",
            ),
            array(
                'key' => 'field_about_cta_text',
                'label' => 'CTA Text',
                'name' => 'about_cta_text',
                'type' => 'text',
                'default_value' => 'Get a Free Consultation',
            ),
            array(
                'key' => 'field_about_cta_link',
                'label' => 'About CTA Link',
                'name' => 'about_cta_link',
                'type' => 'text',
                'default_value' => '/contact-us',
            ),
            array(
                'key' => 'field_about_reviews_text',
                'label' => 'Reviews Rating Text',
                'name' => 'about_reviews_text',
                'type' => 'text',
                'default_value' => 'Rated 4.9/5 from 515 verified reviews',
            ),
            array(
                'key' => 'field_about_intro_title',
                'label' => 'Intro Title',
                'name' => 'about_intro_title',
                'type' => 'text',
                'default_value' => 'Welcome to RLegal Immigration Solicitors',
            ),
            array(
                'key' => 'field_about_intro_text',
                'label' => 'Intro Text',
                'name' => 'about_intro_text',
                'type' => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ),
            array(
                'key' => 'field_about_who_heading',
                'label' => 'Who We Are Heading',
                'name' => 'about_who_heading',
                'type' => 'text',
                'default_value' => 'Who we are',
            ),
            array(
                'key' => 'field_about_who_text',
                'label' => 'Who We Are Text',
                'name' => 'about_who_text',
                'type' => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ),
            array(
                'key' => 'field_about_partners_heading',
                'label' => 'Partners Heading',
                'name' => 'about_partners_heading',
                'type' => 'text',
                'default_value' => 'Our Partners',
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
                'default_value' => array(array('usp_text' => 'KEY USP 1'), array('usp_text' => 'KEY USP 2'), array('usp_text' => 'KEY USP 3')),
            ),
            array(
                'key' => 'field_about_partners',
                'label' => 'Partners',
                'name' => 'about_partners',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_partner_image',
                        'label' => 'Partner Image',
                        'name' => 'partner_image',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_about_partner_name',
                        'label' => 'Name',
                        'name' => 'partner_name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_about_partner_bio',
                        'label' => 'Short Bio',
                        'name' => 'partner_bio',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_about_partner_link',
                        'label' => 'Link',
                        'name' => 'partner_link',
                        'type' => 'text',
                        'default_value' => '#'
                    ),
                ),
                'default_value' => array(
                    array('partner_image' => get_template_directory_uri() . '/ui-source/dist/_astro/partner-david.DuDGsPZk_kQHue.webp','partner_name' => 'David Robinson','partner_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','partner_link' => '#'),
                    array('partner_image' => get_template_directory_uri() . '/ui-source/dist/_astro/partner-evan.DB50w3Pa_ZUlzd4.webp','partner_name' => 'Evan Remedios','partner_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','partner_link' => '#'),
                    array('partner_image' => get_template_directory_uri() . '/ui-source/dist/_astro/partner-julian.D8iie0VS_Zp61M6.webp','partner_name' => 'Julian Torreggiani','partner_bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','partner_link' => '#'),
                ),
            ),
            array(
                'key' => 'field_about_timeline',
                'label' => 'Timeline',
                'name' => 'about_timeline',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_about_tl_date',
                        'label' => 'Date',
                        'name' => 'date',
                        'type' => 'text',
                        'default_value' => '2002: RLegal is Established',
                    ),
                    array(
                        'key' => 'field_about_tl_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => '2002: RLegal is     ',
                    ),
                    array(
                        'key' => 'field_about_tl_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    ),
                ),
                'default_value' => array(
                    array('date' => '2002', 'title' => 'RLegal is Established', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-about.php',
                ),
            ),
        ),
    ));

    // News Page 
    acf_add_local_field_group(array(
        'key' => 'group_ri_news_page',
        'title' => 'News Page Content',
        'show_in_graphql' => true,
        'graphql_field_name' => 'newsPageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(

            // HERO FIELDS 
            array(
                'key'          => 'field_news_hero_mob_image',
                'label'        => 'News Hero Mobile Image',
                'name'         => 'news_hero_mob_image',
                'type'         => 'image',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library'      => 'all',
            ),
            array(
                'key'          => 'field_news_hero_desktop_image',
                'label'        => 'News Hero Desktop Image',
                'name'         => 'news_hero_desktop_image',
                'type'         => 'image',
                'return_format' => 'url',
                'preview_size' => 'large',
                'library'      => 'all',
            ),
            array(
                'key'           => 'field_news_hero_eyebrow',
                'label'         => 'Eyebrow',
                'name'          => 'news_hero_eyebrow',
                'type'          => 'text',
                'default_value' => 'Immigration Law Latest News & Insights',
            ),
            array(
                'key'           => 'field_news_hero_heading',
                'label'         => 'Main Heading (use new lines for <br>)',
                'name'          => 'news_hero_heading',
                'type'          => 'textarea',
                'default_value' => "Welcome to the\nRLegal\ninformation hub",
            ),
            array(
                'key'           => 'field_news_hero_cta_text',
                'label'         => 'CTA Text',
                'name'          => 'news_hero_cta_text',
                'type'          => 'text',
                'default_value' => 'Get a Free Consultation',
            ),
            array(
            'key'           => 'field_news_hero_cta_link',
            'label'         => 'CTA Button Link',
            'name'          => 'news_hero_cta_link',
            'type'          => 'text',
            'default_value' => '',
            ),
            array(
                'key'           => 'field_news_hero_reviews_text',
                'label'         => 'Reviews Rating Text',
                'name'          => 'news_hero_reviews_text',
                'type'          => 'text',
                'default_value' => 'Rated 4.9/5 from 515 verified reviews',
            ),

            // INTRO SECTION
            array(
                'key'           => 'field_articles_intro_heading',
                'label'         => 'Articles Section Heading',
                'name'          => 'articles_intro_heading',
                'type'          => 'text',
                'default_value' => 'All the latest immigration law updates, news and insight',
            ),
            array(
                'key'           => 'field_articles_intro_text',
                'label'         => 'Articles Section Description',
                'name'          => 'articles_intro_text',
                'type'          => 'textarea',
                'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.',
            ),

            // ARTICLES REPEATER 
            array(
                'key'          => 'field_articles_section',
                'label'        => 'Articles',
                'name'         => 'articles',
                'type'         => 'repeater',
                'button_label' => 'Add Article',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_article_title',
                        'label'         => 'Article Title',
                        'name'          => 'article_title',
                        'type'          => 'text',
                        'default_value' => 'Immigration law article title',
                    ),
                    array(
                        'key'           => 'field_article_excerpt',
                        'label'         => 'Article Excerpt',
                        'name'          => 'article_excerpt',
                        'type'          => 'textarea',
                        'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    ),
                    array(
                        'key'           => 'field_article_link',
                        'label'         => 'Article Link',
                        'name'          => 'article_link',
                        'type'          => 'text',
                        'default_value' => '#',
                    ),
                    array(
                        'key'          => 'field_article_image',
                        'label'        => 'Article Image',
                        'name'         => 'article_image',
                        'type'         => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library'      => 'all',
                    ),
                ),
                'default_value' => array(
                    array(
                        'article_title'   => 'Immigration law article title',
                        'article_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                        'article_link'    => '#',
                    ),
                    array(
                        'article_title'   => 'Immigration law article title',
                        'article_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                        'article_link'    => '#',
                    ),
                ),
            ),

            //LOAD MORE BUTTON 
            array(
                'key'           => 'field_articles_load_more_text',
                'label'         => 'Load More Button Text',
                'name'          => 'articles_load_more_text',
                'type'          => 'text',
                'default_value' => 'Load more articles',
            ),

            
            // CALLOUT SECTION
            array(
                'key'           => 'field_news_form_request_title',
                'label'         => 'Form Request Title 1',
                'name'          => 'form_request_title',
                'type'          => 'text',
                'default_value' => 'Get in touch with our lawyers',
            ),
            array(
                'key'           => 'field_news_clear_advice_heading',
                'label'         => 'Clear Advice Heading',
                'name'          => 'clear_advice_heading',
                'type'          => 'text',
                'default_value' => 'Clear, honest advice with a bespoke strategy for your case',
            ),


            array(
                'key'          => 'field_news_benefits_repeater',
                'label'        => 'Clear Advice USPs',
                'name'         => 'benefits_list',
                'type'         => 'repeater',
                'min'          => 1,
                'max'          => 10,
                'layout'       => 'table',
                'button_label' => 'Add Row',
                'sub_fields'   => array(

                    array(
                        'key'           => 'field_news_benefits_item_text', 
                        'label'         => 'USP Text',
                        'name'          => 'benefit_text',
                        'type'          => 'text',
                        'required'      => 1,
                        'default_value' => '',
                        'placeholder'   => 'e.g. Clear Solution',
                    ),

                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-news.php',
                ),
            ),
        ),
    ));

    //page-ourpeople
    acf_add_local_field_group(array(
    'key'    => 'group_ri_people_page',
    'title'  => 'People Page Content',
    'show_in_graphql' => true,
    'graphql_field_name' => 'peoplePageContent',
    'map_graphql_types_from_location_rules' => true,
    'fields' => array(

        // Mobile Hero Image
        array(
            'key'           => 'field_ri_people_hero_mob_image',
            'label'         => 'Mobile Hero Image',
            'name'          => 'about_hero_mob_image',
            'type'          => 'image',
            'return_format' => 'url',
            'preview_size'  => 'medium',
            'instructions'  => 'Hero image displayed on mobile devices.',
        ),
        // CTA Button Link
        array(
            'key'           => 'field_ri_people_hero_cta_link',
            'label'         => 'CTA Button Link',
            'name'          => 'people_hero_cta_link',
            'type'          => 'text',
            'default_value' => '#',
            'instructions'  => 'URL for the hero CTA button.',
        ),
        // Section heading
        array(
            'key'           => 'field_ri_about_partners_heading',
            'label'         => 'Section Heading',
            'name'          => 'about_partners_heading',
            'type'          => 'text',
            'default_value' => 'Our people',
            'instructions'  => 'Heading displayed above the people cards.',
        ),

        // Repeater: people cards
        array(
            'key'          => 'field_ri_about_partners',
            'label'        => 'People',
            'name'         => 'about_partners',
            'type'         => 'repeater',
            'layout'       => 'block',
            'button_label' => 'Add Person',
            'sub_fields'   => array(

                array(
                    'key'           => 'field_ri_partner_image',
                    'label'         => 'Photo',
                    'name'          => 'partner_image',
                    'type'          => 'image',
                    'return_format' => 'url',
                    'preview_size'  => 'medium',
                    'instructions'  => 'Person\'s profile photo.',
                ),
                array(
                    'key'          => 'field_ri_partner_name',
                    'label'        => 'Name',
                    'name'         => 'partner_name',
                    'type'         => 'text',
                    'instructions' => 'Full name of the person.',
                ),
                array(
                    'key'          => 'field_ri_partner_bio',
                    'label'        => 'Bio',
                    'name'         => 'partner_bio',
                    'type'         => 'textarea',
                    'rows'         => 5,
                    'instructions' => 'Short biography shown on the card.',
                ),
            ),
        ),
        // USPs
        array(
            'key'          => 'field_ri_people_clear_advice_usps',
            'label'        => 'USPs',
            'name'         => 'clear_advice_usps',
            'type'         => 'repeater',
            'button_label' => 'Add USP',
            'sub_fields'   => array(
                array(
                    'key'           => 'field_ri_people_usp_text',
                    'label'         => 'USP Text',
                    'name'          => 'usp_text',
                    'type'          => 'text',
                    'default_value' => '',
                ),
            ),
            'default_value' => array(
                array( 'usp_text' => 'Honest Advice' ),
                array( 'usp_text' => 'Clear Solution' ),
                array( 'usp_text' => 'Bespoke Strategy' ),
            ),
        ),
    ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-our-people.php',
                ),
            ),
        ),
    ));

    //FAQ page 
    acf_add_local_field_group(array(
        'key'    => 'group_ri_faq_page',
        'title'  => 'FAQ Page Content',
        'show_in_graphql' => true,
        'graphql_field_name' => 'faqPageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
        // Section heading
            array(
                'key' => 'field_services_faqs',
                'label' => 'FAQs',
                'name' => 'services_faqs',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_services_faq_q',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'default_value' => 'Question about business visitor visas?',
                    ),
                    array(
                        'key' => 'field_services_faq_a',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    ),
                ),
                'default_value' => array(
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
                    array('question' => 'Question about business visitor visas?', 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-faq.php',
                ),
            ),
        ),

        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
    ));

    // SIMPLE PAGE TEMPLATE
    acf_add_local_field_group(array(
        'key'   => 'group_ri_simple_page',
        'title' => 'Simple Page – Callout Section',
        'show_in_graphql' => true,
        'graphql_field_name' => 'simplePageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key'          => 'field_simple_clear_advice_usps',
                'label'        => 'USPs',
                'name'         => 'clear_advice_usps',
                'type'         => 'repeater',
                'button_label' => 'Add USP',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_simple_usp_text',
                        'label'         => 'USP Text',
                        'name'          => 'usp_text',
                        'type'          => 'text',
                        'default_value' => '',
                    ),
                ),
                'default_value' => array(
                    array( 'usp_text' => 'Honest Advice' ),
                    array( 'usp_text' => 'Clear Solution' ),
                    array( 'usp_text' => 'Bespoke Strategy' ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-simple.php',
                ),
            ),
        ),
    ));
    
    // CATEGORY PAGE TEMPLATE
    acf_add_local_field_group(array(
        'key'   => 'group_ri_category_page',
        'title' => 'Category Page – Callout Section',
        'show_in_graphql' => true,
        'graphql_field_name' => 'categoryPageContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(
            array(
                'key'          => 'field_category_clear_advice_usps',
                'label'        => 'USPs',
                'name'         => 'clear_advice_usps',
                'type'         => 'repeater',
                'button_label' => 'Add USP',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_category_usp_text',
                        'label'         => 'USP Text',
                        'name'          => 'usp_text',
                        'type'          => 'text',
                        'default_value' => '',
                    ),
                ),
                'default_value' => array(
                    array( 'usp_text' => 'Honest Advice' ),
                    array( 'usp_text' => 'Clear Solution' ),
                    array( 'usp_text' => 'Bespoke Strategy' ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-category.php',
                ),
            ),
        ),
    ));

   // FOOTER SERVICE PAGE TEMPLATE
    acf_add_local_field_group(array(
        'key'   => 'group_ri_footer_service_page',
        'title' => 'Footer Service Page',
        'show_in_graphql' => true,
        'graphql_field_name' => 'footerServiceContent',
        'map_graphql_types_from_location_rules' => true,
        'fields' => array(

            // Eyebrow
            array(
                'key'           => 'field_footer_service_hero_eyebrow',
                'label'         => 'Eyebrow Text',
                'name'          => 'services_hero_eyebrow',
                'type'          => 'text',
                'default_value' => 'Connect with Us',
            ),
            // Heading
            array(
                'key'           => 'field_footer_service_hero_heading',
                'label'         => 'Heading',
                'name'          => 'services_hero_heading',
                'type'          => 'textarea',
                'rows'          => 3,
                'default_value' => "info@rlegal.com\n0207 038 3880",
            ),

            // CTA Button Text
            array(
                'key'           => 'field_footer_service_hero_cta_text',
                'label'         => 'CTA Button Text',
                'name'          => 'services_hero_cta_text',
                'type'          => 'text',
                'default_value' => 'Get a Free Consultation',
            ),

            // Reviews Text
            array(
                'key'           => 'field_footer_service_reviews_text',
                'label'         => 'Reviews Text',
                'name'          => 'services_reviews_text',
                'type'          => 'text',
                'default_value' => 'Rated 4.9/5 from 515 verified reviews',
            ),
            array(
                'key'           => 'field_footer_service_hero_cta_link',
                'label'         => 'CTA Button Link',
                'name'          => 'services_hero_cta_link',
                'type'          => 'text',
                'default_value' => '',
            ),
            // Form Heading
            array(
                'key'           => 'field_footer_service_form_heading',
                'label'         => 'Form Heading',
                'name'          => 'services_form_heading',
                'type'          => 'text',
                'default_value' => 'Get in touch with our lawyers',
            ),

            // USPs
            array(
                'key'          => 'field_footer_service_clear_advice_usps',
                'label'        => 'USPs',
                'name'         => 'clear_advice_usps',
                'type'         => 'repeater',
                'button_label' => 'Add USP',
                'sub_fields'   => array(
                    array(
                        'key'           => 'field_footer_service_usp_text',
                        'label'         => 'USP Text',
                        'name'          => 'usp_text',
                        'type'          => 'text',
                        'default_value' => '',
                    ),
                ),
                'default_value' => array(
                    array( 'usp_text' => 'Honest Advice' ),
                    array( 'usp_text' => 'Clear Solution' ),
                    array( 'usp_text' => 'Bespoke Strategy' ),
                ),
            ),

        ),
        'location' => array(
            array(
                array(
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'page-footer-service.php',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array(
    'key'   => 'group_single_post_usps',
    'title' => 'Single Post USPs',
    'show_in_graphql' => true,
    'graphql_field_name' => 'singlePostFields',
    'map_graphql_types_from_location_rules' => true,
    'fields' => array(

        array(
            'key'          => 'field_single_post_usps',
            'label'        => 'USPs',
            'name'         => 'single_post_usps',
            'type'         => 'repeater',
            'button_label' => 'Add USP',
            'sub_fields'   => array(
                array(
                    'key'   => 'field_single_post_usp_text',
                    'label' => 'USP Text',
                    'name'  => 'usp_text',
                    'type'  => 'text',
                ),
            ),
            'default_value' => array(
                array('usp_text' => 'Honest Advice'),
                array('usp_text' => 'Clear Solution'),
                array('usp_text' => 'Bespoke Strategy'),
            ),
        ),

    ),

    'location' => array(
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'post',
            ),
        ),
    ),
    ));
}
