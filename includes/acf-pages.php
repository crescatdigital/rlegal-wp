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
        'graphql_types' => array( 'Page', 'Service' ),
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
                'default_value' => 'Rated 4.9/5 from 529 verified reviews',
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
                'key' => 'field_page_flexible_content',
                'label' => 'Page Content',
                'name' => 'page_content',
                'type' => 'flexible_content',

                'layouts' => array(

                    /**
                     * Rich Content Layout
                     */
                    'layout_content_block' => array(
                        'key' => 'layout_content_block',
                        'name' => 'content_block',
                        'label' => 'Content Block',
                        'display' => 'block',

                        'sub_fields' => array(

                            array(
                                'key' => 'field_content_block_editor',
                                'label' => 'Content',
                                'name' => 'content',
                                'type' => 'wysiwyg',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                            ),

                        ),
                    ),


                    /**
                     * Accordion Layout
                     */
                    'layout_accordion_content' => array(
                        'key' => 'layout_accordion_content',
                        'name' => 'accordion_content',
                        'label' => 'Accordion Content',
                        'display' => 'block',

                        'sub_fields' => array(

                            array(
                                'key' => 'field_accordion_items',
                                'label' => 'Accordion Items',
                                'name' => 'accordion_items',
                                'type' => 'repeater',
                                'layout' => 'row',
                                'button_label' => 'Add Accordion',

                                'sub_fields' => array(

                                    array(
                                        'key' => 'field_accordion_title',
                                        'label' => 'Accordion Title',
                                        'name' => 'accordion_title',
                                        'type' => 'text',
                                    ),

                                    array(
                                        'key' => 'field_accordion_content',
                                        'label' => 'Accordion Content',
                                        'name' => 'accordion_content',
                                        'type' => 'wysiwyg',
                                        'toolbar' => 'full',
                                        'media_upload' => 1,
                                    ),

                                ),
                            ),

                        ),
                    ),

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
        'graphql_types' => array( 'Page' ),
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
                'default_value' => 'Rated 4.9/5 from 529 verified reviews',
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
                'key' => 'field_start_title',
                'label' => 'The Start Title',
                'name' => 'start_title',
                'type' => 'text',
                'default_value' => 'The start',
            ),
            array(
                'key' => 'field_start_content',
                'label' => 'The Start Content',
                'name' => 'start_content',
                'type' => 'wysiwyg',
                'default_value' => 'By 2002 both David and Evan had gained considerable and varied experience from working within specialist immigration practices and decided to establish RLegal.

            The opportunity to provide clients with a professional, friendly, personal and honest approach to achieve successful affordable outcomes was the driving force. We have never looked back.',
            ),

            array(
                'key' => 'field_challenges_title',
                'label' => 'The Challenges Title',
                'name' => 'challenges_title',
                'type' => 'text',
                'default_value' => 'The challenges',
            ),
            array(
                'key' => 'field_challenges_content',
                'label' => 'The Challenges Content',
                'name' => 'challenges_content',
                'type' => 'wysiwyg',
                'default_value' => 'Naturally, there were challenges; at the outset the challenge of just starting off – where were we going to get clients? The internet was still relatively young, then the 2008 crash, the hostile environment, Brexit (who can forget) and now the drive to get immigration numbers down – all uncertain times.',
            ),

            array(
                'key' => 'field_addition_title',
                'label' => 'Notable Addition Title',
                'name' => 'addition_title',
                'type' => 'text',
                'default_value' => 'Notable addition',
            ),
            array(
                'key' => 'field_addition_content',
                'label' => 'Notable Addition Content',
                'name' => 'addition_content',
                'type' => 'wysiwyg',
                'default_value' => 'In 2008, Julian Torreggiani, a former journalist and editor, joined us and brought his assiduous attention to detail, not to mention his highly personable approach (just read his reviews) to help reshape the firm’s outlook.',
            ),

            array(
                'key' => 'field_mission_title',
                'label' => 'Mission Title',
                'name' => 'mission_title',
                'type' => 'text',
                'default_value' => "RLegal's mission",
            ),
            array(
                'key' => 'field_mission_content',
                'label' => 'Mission Content',
                'name' => 'mission_content',
                'type' => 'wysiwyg',
                'default_value' => 'Our mission is far from accomplished, advising clients and attaining their goals has brought us more than we could have imagined. We cannot thank our clients enough in providing us with the opportunity to work with them - it has brought us so much – recognition through the Legal 500, the Law Society and, of course, the chance to work in what we want to do.',
            ),

            array(
                'key' => 'field_evolve_title',
                'label' => 'How We Have Evolved Title',
                'name' => 'evolve_title',
                'type' => 'text',
                'default_value' => 'How we have evolved',
            ),
            array(
                'key' => 'field_evolve_content',
                'label' => 'How We Have Evolved Content',
                'name' => 'evolve_content',
                'type' => 'wysiwyg',
                'default_value' => 'Our clients are our business - their immigration journeys have become us. We understand how pivotal achieving a successful immigration outcome can be, whether you’re a worker, a business owner, or a family member. It is both gratifying and humbling to be given this responsibility daily.

            We have learned that our successes are measured through what we achieve through each client and that will never change.',
            ),

            array(
                'key' => 'field_work_title',
                'label' => 'Who We Work With Title',
                'name' => 'work_title',
                'type' => 'text',
                'default_value' => 'Who we work with',
            ),
            array(
                'key' => 'field_work_content',
                'label' => 'Who We Work With Content',
                'name' => 'work_content',
                'type' => 'wysiwyg',
                'default_value' => 'We have worked with businesses to obtain sponsorship licences and work permission under the Skilled Worker provisions (previously Tier 2 and, because we’ve been going that long, the work permit scheme), with individuals on family-related matters, for business-based entry, nationality, immigration appeals, and with EU Settlement Scheme residence routes.',
            ),

            array(
                'key' => 'field_success_title',
                'label' => 'Our Successes Title',
                'name' => 'success_title',
                'type' => 'text',
                'default_value' => 'Our successes',
            ),
            array(
                'key' => 'field_success_content',
                'label' => 'Our Successes Content',
                'name' => 'success_content',
                'type' => 'wysiwyg',
                'default_value' => 'RLegal has served more than 5000 clients in London, nationally and internationally with distinction and we are proud of what our clients say about us through their positive reviews stretching back over a decade. Their positive stories and recommendations recognise the depth of our engagement with our clients.',
            ),

            array(
                'key' => 'field_reviews_title',
                'label' => 'Reviews Title',
                'name' => 'reviews_title',
                'type' => 'text',
                'default_value' => 'Reviews',
            ),
            array(
                'key' => 'field_reviews_content',
                'label' => 'Reviews Content',
                'name' => 'reviews_content',
                'type' => 'wysiwyg',
                'default_value' => 'Over the past 10 plus years we have requested reviews from our client base but do not push them and respect our clients wishes to remain anonymous.

            We invite you to read our Google and <a title="reviews.co.uk" href="https://www.reviews.co.uk/company-reviews/store/rlegal-solicitors" target="_blank" rel="noopener">Review.co.uk</a> reviews. They speak to our client satisfaction ratings.',
            ),

            array(
                'key' => 'field_awards_title',
                'label' => 'Recognition and Awards Title',
                'name' => 'awards_title',
                'type' => 'text',
                'default_value' => 'Recognition and awards',
            ),
            array(
                'key' => 'field_awards_content',
                'label' => 'Recognition and Awards Content',
                'name' => 'awards_content',
                'type' => 'wysiwyg',
                'default_value' => 'RLegal have been recommended by the Legal 500 in both the personal and business immigration categories for immigration services consecutively since 2021 following rigorous independent testing.

            RLegal do not claim to have won immigration awards and have chosen to decline accepting these when approached as we have not participated through a process, do not know who most of the awarding bodies are, and refuse to pay for the apparent privilege.

            We believe it is important our clients understand our principles.',
            ),

            array(
                'key' => 'field_offer_title',
                'label' => 'What We Can Offer Title',
                'name' => 'offer_title',
                'type' => 'text',
                'default_value' => 'What we can offer',
            ),
            array(
                'key' => 'field_offer_content',
                'label' => 'What We Can Offer Content',
                'name' => 'offer_content',
                'type' => 'wysiwyg',
                'default_value' => 'We are confident RLegal has the skills and experience you need to meet the challenges of the complexities of the UK immigration system which is based on our long history, recognition and client reviews.

            We look forward to continuing to work with our clients to share, meet and overcome the obstacles they face. Of course new clients are always welcome as you will hopefully become part of the journey to fulfil our mission.

            Thank you for taking the time to read this and we wish you the best of luck no matter which path you decide to take but of course hope you join us!',
            ),

            array(
                'key' => 'field_contact_title',
                'label' => 'Contact Us Title',
                'name' => 'contact_title',
                'type' => 'text',
                'default_value' => 'Contact us',
            ),
            array(
                'key' => 'field_contact_content',
                'label' => 'Contact Us Content',
                'name' => 'contact_content',
                'type' => 'wysiwyg',
                'default_value' => 'Please do contact us for an honest appraisal of your case on 020 7038 3980, via e-mail to <a href="mailto:info@rlegal.com">info@rlegal.com</a> or click here to complete our <a href="http://www.rlegal.com/contact-us">online form</a>.

            You can read more about our individual service areas on this site.',
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
        'graphql_types' => array( 'Page' ),
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
                'default_value' => 'Rated 4.9/5 from 529 verified reviews',
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
    'graphql_types' => array( 'Page' ),
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
                    'key'          => 'field_ri_partner_link',
                    'label'        => 'CTA Button Link',
                    'name'         => 'partner_link',
                    'type'         => 'url',
                    'instructions' => 'Button Link',
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
        'graphql_types' => array( 'Page' ),
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
        'graphql_types' => array( 'Page' ),
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
        'graphql_types' => array( 'Page' ),
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
        'graphql_types' => array( 'Page' ),
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
                'default_value' => 'Rated 4.9/5 from 529 verified reviews',
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
