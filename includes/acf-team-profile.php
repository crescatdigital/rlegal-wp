<?php
/**
 * Team Profile — ACF field group.
 *
 * Put this at /inc/acf/team-profile.php and require it from functions.php:
 *
 *     require_once get_template_directory() . '/inc/acf/team-profile.php';
 *
 * Field names match the ri_profile_field() / ri_val() calls in
 * page-team-profile.php. If the include is forgotten the page still renders —
 * it just has nothing to show.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'ri_register_team_profile_fields' );

function ri_register_team_profile_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'             => 'group_team_profile',
			'title'           => 'Team Profile',
			'location'        => array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'page-team-profile.php',
					),
				),
			),
			'menu_order'      => 0,
			'position'        => 'normal',
			'style'           => 'default',
			'label_placement' => 'top',
			'active'          => true,
			'fields'          => array(

				// ==============================================================
				// WHO
				// ==============================================================
				array(
					'key'   => 'field_profile_tab_who',
					'label' => 'Who',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_profile_name',
					'label'        => 'Full name',
					'name'         => 'profile_name',
					'type'         => 'text',
					'instructions' => 'Uses the page title if empty. The first name is taken from this for the button and heading copy ("Book a call with Evan").',
					'placeholder'  => 'Evan Remedios',
				),
				array(
					'key'          => 'field_profile_role',
					'label'        => 'Role',
					'name'         => 'profile_role',
					'type'         => 'text',
					'instructions' => 'The large purple line above the name. A job title, nothing longer.',
					'placeholder'  => 'Solicitor and Founding Partner',
				),
				array(
					'key'           => 'field_profile_photo',
					'label'         => 'Portrait',
					'name'          => 'profile_photo',
					'type'          => 'image',
					'return_format' => 'url',
					'preview_size'  => 'medium',
					'instructions'  => 'Used for both desktop and mobile.',
				),
				array(
					'key'          => 'field_profile_standfirst',
					'label'        => 'Standfirst',
					'name'         => 'profile_standfirst',
					'type'         => 'textarea',
					'rows'         => 2,
					'new_lines'    => '',
					'maxlength'    => 180,
					'instructions' => 'One sentence under the name. The single thing you want remembered about this person.',
				),

				// ==============================================================
				// CONTACT & CREDENTIALS
				// ==============================================================
				array(
					'key'   => 'field_profile_tab_contact',
					'label' => 'Contact & credentials',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_profile_email',
					'label'        => 'Email',
					'name'         => 'profile_email',
					'type'         => 'email',
					'instructions' => 'Powers the "Email [name]" button in the hero and the Contact block. Leave empty to hide both.',
				),
				array(
					'key'          => 'field_profile_phone',
					'label'        => 'Direct line',
					'name'         => 'profile_phone',
					'type'         => 'text',
					'instructions' => 'Displayed as typed; the tel: link is generated from the digits.',
					'placeholder'  => '020 7038 3980',
				),
				array(
					'key'          => 'field_profile_languages',
					'label'        => 'Languages',
					'name'         => 'profile_languages',
					'type'         => 'text',
					'instructions' => 'Its own block in the grid. Leave empty to hide it.',
					'placeholder'  => 'English, Italian',
				),
				array(
					'key'          => 'field_profile_credentials_heading',
					'label'        => 'Credentials block heading',
					'name'         => 'profile_credentials_heading',
					'type'         => 'text',
					'placeholder'  => 'Recognition and memberships',
				),
				array(
					'key'          => 'field_profile_credentials',
					'label'        => 'Credentials',
					'name'         => 'profile_credentials',
					'type'         => 'repeater',
					'layout'       => 'table',
					'button_label' => 'Add credential',
					'instructions' => 'Regulator, panels, accreditations, published work. One line each. Block hides if empty.',
					'sub_fields'   => array(
						array(
							'key'         => 'field_profile_credential',
							'label'       => 'Credential',
							'name'        => 'credential',
							'type'        => 'text',
							'required'    => 1,
							'placeholder' => 'Former member, Law Society Immigration Law Panel for Solicitors',
						),
					),
				),
				array(
					'key'          => 'field_profile_cta_text',
					'label'        => 'Primary button',
					'name'         => 'profile_cta_text',
					'type'         => 'text',
					'instructions' => 'Defaults to "Book a call with [first name]".',
				),
				array(
					'key'          => 'field_profile_cta_link',
					'label'        => 'Primary button link',
					'name'         => 'profile_cta_link',
					'type'         => 'text',
					'placeholder'  => '/contact-us',
				),

				// ==============================================================
				// STORY
				// ==============================================================
				array(
					'key'   => 'field_profile_tab_story',
					'label' => 'Story',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_profile_intro_title',
					'label'        => 'Section title',
					'name'         => 'profile_intro_title',
					'type'         => 'text',
					'instructions' => 'The 36px purple heading above the biography. Defaults to "Meet [first name]".',
				),
				array(
					'key'          => 'field_profile_intro_text',
					'label'        => 'Lead paragraph',
					'name'         => 'profile_intro_text',
					'type'         => 'textarea',
					'rows'         => 4,
					'new_lines'    => '',
					'instructions' => 'Set larger than the rest. Two or three sentences: what they do and what they are known for.',
				),
				array(
					'key'          => 'field_profile_bio_content',
					'label'        => 'Biography',
					'name'         => 'profile_bio_content',
					'type'         => 'wysiwyg',
					'tabs'         => 'all',
					'toolbar'      => 'basic',
					'media_upload' => 0,
					'instructions' => 'The full story: route into law, previous career, anything that explains how they work.',
				),
				array(
					'key'          => 'field_profile_areas_heading',
					'label'        => 'Practice areas heading',
					'name'         => 'profile_areas_heading',
					'type'         => 'text',
					'instructions' => 'Defaults to "What [first name] handles".',
				),
				array(
					'key'          => 'field_profile_practice_areas',
					'label'        => 'Practice areas',
					'name'         => 'profile_practice_areas',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add practice area',
					'instructions' => 'Each gets a purple rule down its left side. Block hides if empty.',
					'sub_fields'   => array(
						array(
							'key'         => 'field_profile_area_name',
							'label'       => 'Area',
							'name'        => 'area_name',
							'type'        => 'text',
							'required'    => 1,
							'placeholder' => 'Appeals and judicial review',
						),
						array(
							'key'          => 'field_profile_area_note',
							'label'        => 'Note',
							'name'         => 'area_note',
							'type'         => 'text',
							'instructions' => 'Optional half-line of detail underneath.',
							'placeholder'  => 'First-Tier Tribunal through to the Court of Appeal',
						),
						array(
							'key'          => 'field_profile_area_link',
							'label'        => 'Link',
							'name'         => 'area_link',
							'type'         => 'page_link',
							'instructions' => 'Optional — link to the matching service page.',
							'allow_null'   => 1,
						),
					),
				),

				// ==============================================================
				// REVIEWS
				// ==============================================================
				array(
					'key'   => 'field_profile_tab_reviews',
					'label' => 'Reviews',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_profile_reviews_text',
					'label'        => 'Hero rating text',
					'name'         => 'profile_reviews_text',
					'type'         => 'text',
					'instructions' => 'Overrides the rating line under the hero badges. Leave empty to use the global Site Options value.',
				),
				array(
					'key'          => 'field_profile_reviews_heading',
					'label'        => 'Carousel heading',
					'name'         => 'profile_reviews_heading',
					'type'         => 'text',
					'instructions' => 'Defaults to "What clients say about [first name]".',
				),
				array(
					'key'          => 'field_profile_reviews',
					'label'        => 'Reviews',
					'name'         => 'profile_reviews',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add review',
					'instructions' => 'Reviews naming this person. Renders as the purple carousel. Quote verbatim — do not tidy the wording. Section hides if empty.',
					'sub_fields'   => array(
						array(
							'key'          => 'field_profile_review_title',
							'label'        => 'Headline',
							'name'         => 'review_title',
							'type'         => 'text',
							'instructions' => 'Optional short headline in bold at the top of the card, like the ones on the About carousel. Leave empty if the review had none — do not invent one.',
							'placeholder'  => 'Great Service',
						),
						array(
							'key'          => 'field_profile_review_quote',
							'label'        => 'Quote',
							'name'         => 'review_quote',
							'type'         => 'textarea',
							'rows'         => 5,
							'new_lines'    => '',
							'required'     => 1,
							'instructions' => 'No surrounding quote marks.',
						),
						array(
							'key'   => 'field_profile_review_author',
							'label' => 'Author',
							'name'  => 'review_author',
							'type'  => 'text',
						),
						array(
							'key'           => 'field_profile_review_stars',
							'label'         => 'Star rating',
							'name'          => 'review_stars',
							'type'          => 'select',
							'choices'       => array(
								0 => 'No star row',
								1 => '1 star',
								2 => '2 stars',
								3 => '3 stars',
								4 => '4 stars',
								5 => '5 stars',
							),
							'default_value' => 0,
							'return_format' => 'value',
							'instructions'  => 'Only set this where you know the rating. "No star row" hides the stars — correct for Legal 500 quotes, which are not star-rated.',
						),
						array(
							'key'           => 'field_profile_review_source',
							'label'         => 'Source',
							'name'          => 'review_source',
							'type'          => 'select',
							'choices'       => array(
								'Google review' => 'Google review',
								'Reviews.io'    => 'Reviews.io',
								'Reviews.co.uk' => 'Reviews.co.uk',
								'Legal 500'     => 'Legal 500',
								'Client'        => 'Client',
							),
							'allow_null'    => 1,
							'return_format' => 'value',
							'instructions'  => 'Reviews.io and Reviews.co.uk show the platform logo. Anything else prints as text.',
						),
					),
				),

				// ==============================================================
				// CAREER
				// ==============================================================
				array(
					'key'   => 'field_profile_tab_career',
					'label' => 'Career',
					'name'  => '',
					'type'  => 'tab',
				),
				array(
					'key'          => 'field_profile_timeline_heading',
					'label'        => 'Heading',
					'name'         => 'profile_timeline_heading',
					'type'         => 'text',
					'instructions' => 'Defaults to "[first name]\'s Journey".',
				),
				array(
					'key'          => 'field_profile_timeline',
					'label'        => 'Career entries',
					'name'         => 'profile_timeline',
					'type'         => 'repeater',
					'layout'       => 'block',
					'button_label' => 'Add entry',
					'instructions' => 'Oldest first. Renders as the purple timeline band. Section hides if empty — better empty than half-filled.',
					'sub_fields'   => array(
						array(
							'key'          => 'field_profile_timeline_year',
							'label'        => 'Year',
							'name'         => 'year',
							'type'         => 'text',
							'instructions' => 'Optional. The entry renders fine without one.',
							'placeholder'  => '1991',
						),
						array(
							'key'         => 'field_profile_timeline_title',
							'label'       => 'Title',
							'name'        => 'title',
							'type'        => 'text',
							'required'    => 1,
							'placeholder' => 'Began practising immigration law',
						),
						array(
							'key'       => 'field_profile_timeline_text',
							'label'     => 'Detail',
							'name'      => 'text',
							'type'      => 'textarea',
							'rows'      => 3,
							'new_lines' => '',
						),
					),
				),
			),
		)
	);
}