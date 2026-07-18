<?php
/*
 * Template Name: Team Profile
 * Description: Team member profile page, driven by ACF.
 *
 * ---------------------------------------------------------------------------
 * Fields are registered in inc/acf/team-profile.php (field group "Team Profile",
 * shown on any page using this template).
 *
 * Self-contained: no helper from another file is required for this page to
 * render. Theme helpers (get_ri_field, ri_review_link_open, ri_reviews_tooltip)
 * are used when present and skipped when not, so a missing include or a
 * deactivated ACF cannot fatal the page.
 *
 * EVERY FIELD IS OPTIONAL. Leave one empty and its section does not render —
 * no gaps, no broken layout. Fill what you have, add more when it arrives.
 * ---------------------------------------------------------------------------
 */
get_header();

// ===========================================================================
// RENDER — reads only from ACF. No need to edit below.
// ===========================================================================

if ( ! function_exists( 'ri_first_name' ) ) {
	function ri_first_name( $full_name ) {
		$full_name = trim( wp_strip_all_tags( (string) $full_name ) );
		if ( '' === $full_name ) {
			return '';
		}
		$parts = preg_split( '/\s+/', $full_name );
		return isset( $parts[0] ) ? $parts[0] : '';
	}
}

if ( ! function_exists( 'ri_val' ) ) {
	/** A key from a repeater row, or $default when absent or empty. */
	function ri_val( $arr, $key, $default = '' ) {
		if ( is_array( $arr ) && isset( $arr[ $key ] ) && '' !== $arr[ $key ] && null !== $arr[ $key ] ) {
			return $arr[ $key ];
		}
		return $default;
	}
}

if ( ! function_exists( 'ri_profile_field' ) ) {
	/**
	 * Read a field through the theme helper, falling back to plain ACF, then to
	 * $default. Never returns null. '' or array() means "not filled in".
	 */
	function ri_profile_field( $name, $default = '' ) {
		$value = null;

		if ( function_exists( 'get_ri_field' ) ) {
			$value = get_ri_field( $name, $default );
		} elseif ( function_exists( 'get_field' ) ) {
			$value = get_field( $name );
		}

		if ( null === $value || false === $value || '' === $value || array() === $value ) {
			return $default;
		}
		return $value;
	}
}

if ( ! function_exists( 'ri_profile_rows' ) ) {
	/** Repeater rows, always an array — guards against false / null / a string. */
	function ri_profile_rows( $name ) {
		$rows = ri_profile_field( $name, array() );
		return is_array( $rows ) ? $rows : array();
	}
}

if ( ! function_exists( 'ri_theme_option' ) ) {
	/** A theme option via get_ri_field when the theme provides it. */
	function ri_theme_option( $name, $default = '' ) {
		if ( function_exists( 'get_ri_field' ) ) {
			$v = get_ri_field( $name, $default, 'option' );
			if ( '' !== $v && null !== $v && false !== $v ) {
				return $v;
			}
		}
		return $default;
	}
}

// --- Unpack -----------------------------------------------------------------

$p_name  = ri_profile_field( 'profile_name', get_the_title() );
$p_first = ri_first_name( $p_name );
$p_role  = ri_profile_field( 'profile_role' );
$p_photo = ri_profile_field( 'profile_photo' );

// Where the portrait crops. Landscape photos need 'center' (or 'top'/'bottom')
// rather than the default top-crop, which lops off the body. One field, both images.
$p_focus_raw = ri_profile_field( 'profile_photo_focus', 'center' );
$focus_map   = array(
	'top'    => 'object-top',
	'center' => 'object-center',
	'bottom' => 'object-bottom',
);
$p_focus = isset( $focus_map[ $p_focus_raw ] ) ? $focus_map[ $p_focus_raw ] : 'object-center';
$p_stand = ri_profile_field( 'profile_standfirst' );
$p_intro = ri_profile_field( 'profile_intro_text' );
$p_email = ri_profile_field( 'profile_email' );
$p_phone = ri_profile_field( 'profile_phone' );
$p_langs = ri_profile_field( 'profile_languages' );
$p_cta   = ri_profile_field( 'profile_cta_link', '/contact-us' );

$p_bio   = ri_profile_field( 'profile_bio_content' ); // WYSIWYG
$p_creds = ri_profile_rows( 'profile_credentials' );

// Areas: rows with a name.
$p_areas = array();
foreach ( ri_profile_rows( 'profile_practice_areas' ) as $row ) {
	if ( ri_val( $row, 'area_name' ) ) {
		$p_areas[] = $row;
	}
}

// Q&A: rows with both a question and an answer.
$p_qa = array();
foreach ( ri_profile_rows( 'profile_qa' ) as $row ) {
	if ( ri_val( $row, 'qa_question' ) && ri_val( $row, 'qa_answer' ) ) {
		$p_qa[] = $row;
	}
}

// Reviews: rows with a quote.
$p_reviews = array();
foreach ( ri_profile_rows( 'profile_reviews' ) as $row ) {
	if ( ri_val( $row, 'review_quote' ) ) {
		$p_reviews[] = $row;
	}
}

// Career: rows with a title or text.
$p_timeline = array();
foreach ( ri_profile_rows( 'profile_timeline' ) as $row ) {
	if ( ri_val( $row, 'title' ) || ri_val( $row, 'text' ) ) {
		$p_timeline[] = $row;
	}
}

$cta_text = ri_profile_field( 'profile_cta_text', $p_first ? sprintf( 'Book a call with %s', $p_first ) : 'Get a Free Consultation' );
$p_rating = ri_profile_field( 'profile_reviews_text', ri_theme_option( 'reviews_rating_text', 'Rated 4.9/5 from 529 verified reviews' ) );

$has_contact = ( $p_email || $p_phone );
$grid_blocks = ( ! empty( $p_areas ) ) + ( ! empty( $p_creds ) ) + ( $p_langs ? 1 : 0 ) + ( $has_contact ? 1 : 0 );
$can_edit    = current_user_can( 'edit_posts' );

$t1 = ri_theme_option( 'trust_image_1' );
$t2 = ri_theme_option( 'trust_image_2' );
?>

<style>
    /* Scoped to this template. Everything else is Tailwind, matching the theme. */
    .profile-prose p { margin-bottom: 1.25em; }
    .profile-prose p:last-child { margin-bottom: 0; }
    .profile-prose a { color: #884A83; text-decoration: underline; text-underline-offset: 3px; }
    @media (prefers-reduced-motion: reduce) {
        * { transition: none !important; }
    }
</style>

<main class="flex-grow">

    <!-- ============================== HERO ============================== -->
    <section class="py-10 lg:py-12">

        <?php if ( $p_photo ) : ?>
        <!-- Mobile: full-width image (breaks out of container) -->
        <div class="lg:hidden relative left-1/2 -translate-x-1/2">
            <div class="lg:h-[480px] sm:h-[400px]">
                <img src="<?php echo esc_url( $p_photo ); ?>" alt="<?php echo esc_attr( $p_name ); ?>"
                    loading="eager" decoding="async" fetchpriority="high" width="440" height="370"
                    class="h-[370px] w-full object-cover <?php echo esc_attr( $p_focus ); ?>">
            </div>
        </div>
        <?php endif; ?>

        <div class="mx-auto px-6 lg:px-0 lg:max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-8 items-center">

                <?php if ( $p_photo ) : ?>
                <!-- RIGHT IMAGE -->
                <div class="hidden lg:flex order-2 justify-end relative -ml-6">
                    <div class="relative h-full w-full overflow-hidden rounded-l-[120px]">
                        <img src="<?php echo esc_url( $p_photo ); ?>" alt="<?php echo esc_attr( $p_name ); ?>"
                            loading="eager" decoding="async" fetchpriority="high" width="560" height="420"
                            class="h-full w-full object-cover object-center">
                    </div>
                </div>
                <?php elseif ( $can_edit ) : ?>
                <div class="hidden lg:flex order-2 justify-end relative -ml-6">
                    <div class="relative h-[420px] w-full max-w-[720px] overflow-hidden rounded-l-[120px] border-2 border-dashed border-[#C9A6C6] flex items-center justify-center">
                        <p class="text-[16px] text-[#884A83] px-10 text-center">Add a portrait in the Team Profile panel to show it here.<br><span class="text-[#5C5C5C]">Only editors see this.</span></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="max-w-[620px] order-1 text-center lg:text-left mx-auto lg:mx-0 lg:pl-[165px] mt-8 lg:mt-0 lg:pt-[68px]">

                    <?php if ( $p_role ) : ?>
                    <p class="text-[18px] lg:text-[30px] font-bold text-[#884A83] leading-[1.4em] mb-3 mt-4 lg:mt-0">
                        <?php echo esc_html( $p_role ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $p_name ) : ?>
                    <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-4">
                        <?php echo esc_html( $p_name ); ?>
                    </h1>
                    <?php endif; ?>

                    <?php if ( $p_stand ) : ?>
                    <p class="text-[18px] leading-relaxed text-[#000000] mb-6">
                        <?php echo esc_html( $p_stand ); ?>
                    </p>
                    <?php endif; ?>

                    <!-- CTA -->
                    <div class="mt-6 flex flex-col sm:flex-row justify-center lg:justify-start gap-3">
                        <a href="<?php echo esc_url( $p_cta ); ?>"
                            class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer bg-[#4A884F] text-white hover:bg-[#3d7242] gap-2 rounded-[15px] px-5 py-2.5 text-[16px] lg:text-[18px] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#884A83]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-messages-square h-5 w-5 lg:h-6 lg:w-6 stroke-white" aria-hidden="true">
                                <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                            </svg>
                            <?php echo esc_html( $cta_text ); ?>
                        </a>

                        <?php if ( $p_email && is_email( $p_email ) ) : ?>
                        <a href="mailto:<?php echo esc_attr( sanitize_email( $p_email ) ); ?>"
                            class="inline-flex items-center justify-center rounded-[15px] border-2 border-[#884A83] px-5 py-2.5 text-[16px] lg:text-[18px] font-bold text-[#884A83] transition duration-200 hover:bg-[#884A83] hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#884A83]">
                            <?php echo esc_html( $p_first ? sprintf( 'Email %s', $p_first ) : 'Email us' ); ?>
                        </a>
                        <?php endif; ?>
                    </div>

                    <!-- REVIEWS -->
                    <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                        <div class="flex items-center gap-6">
                            <?php if ( function_exists( 'ri_review_link_open' ) ) { ri_review_link_open( 'reviewsio' ); } ?>
                            <div class="w-[156px] h-[45px] flex items-center">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating" loading="lazy" decoding="async" width="156" height="45"
                                    class="w-full h-full object-contain">
                            </div>
                            <?php if ( function_exists( 'ri_review_link_close' ) ) { ri_review_link_close(); } ?>

                            <?php if ( function_exists( 'ri_review_link_open' ) ) { ri_review_link_open( 'google' ); } ?>
                            <div class="w-[149px] h-[78px] flex items-center">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews" loading="lazy" decoding="async" width="149" height="78"
                                    class="w-full h-full object-contain">
                            </div>
                            <?php if ( function_exists( 'ri_review_link_close' ) ) { ri_review_link_close(); } ?>
                        </div>
                        <?php if ( $p_rating ) : ?>
                        <p class="text-[16px] text-[#000000]">
                            <?php echo esc_html( $p_rating ); ?><?php if ( function_exists( 'ri_reviews_tooltip' ) ) { ri_reviews_tooltip(); } ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= INTRO + DETAIL ========================= -->
    <section class="py-10 bg-white px-2 lg:px-0">
        <div class="mx-auto max-w-6xl px-6 w-full">

            <!-- TITLE -->
            <?php $intro_title = ri_profile_field( 'profile_intro_title', $p_first ? sprintf( 'Meet %s', $p_first ) : '' ); ?>
            <?php if ( $intro_title && ( $p_intro || $p_bio ) ) : ?>
            <h2 class="text-[36px] font-semibold text-[#884A83] mb-6"><?php echo esc_html( $intro_title ); ?></h2>
            <?php endif; ?>

            <!-- LEAD -->
            <?php if ( $p_intro ) : ?>
            <p class="text-[20px] leading-relaxed text-[#000000] mb-8"><?php echo esc_html( $p_intro ); ?></p>
            <?php endif; ?>

            <!-- BIOGRAPHY -->
            <?php if ( $p_bio ) : ?>
            <div class="profile-prose text-[18px] leading-relaxed text-[#000000] mb-10">
                <?php echo wp_kses_post( $p_bio ); ?>
            </div>
            <?php endif; ?>

            <!-- DETAIL BLOCKS -->
            <?php if ( $grid_blocks ) : ?>
            <div class="grid grid-cols-1 <?php echo $grid_blocks > 1 ? 'lg:grid-cols-2' : ''; ?> gap-8 mt-10 mb-10">

                <!-- Areas -->
                <?php if ( ! empty( $p_areas ) ) : ?>
                <div>
                    <h3 class="text-[24px] font-semibold text-[#884A83] mb-4">
                        <?php echo esc_html( ri_profile_field( 'profile_areas_heading', $p_first ? sprintf( 'What %s handles', $p_first ) : 'Areas of expertise' ) ); ?>
                    </h3>
                    <ul class="space-y-4">
                        <?php foreach ( $p_areas as $a ) : ?>
                        <?php
                        $a_name = ri_val( $a, 'area_name' );
                        $a_note = ri_val( $a, 'area_note' );
                        $a_link = ri_val( $a, 'area_link' );
                        ?>
                        <li class="border-l-[6px] border-[#884A83] pl-4">
                            <p class="text-[18px] font-semibold leading-snug text-[#000000]">
                                <?php if ( $a_link ) : ?>
                                <a href="<?php echo esc_url( $a_link ); ?>"
                                    class="hover:text-[#884A83] transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#884A83]"><?php echo esc_html( $a_name ); ?></a>
                                <?php else : ?>
                                <?php echo esc_html( $a_name ); ?>
                                <?php endif; ?>
                            </p>
                            <?php if ( $a_note ) : ?>
                            <p class="text-[16px] leading-relaxed text-[#4A4A4A] mt-1"><?php echo esc_html( $a_note ); ?></p>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Credentials -->
                <?php if ( ! empty( $p_creds ) ) : ?>
                <div>
                    <h3 class="text-[24px] font-semibold text-[#884A83] mb-4">
                        <?php echo esc_html( ri_profile_field( 'profile_credentials_heading', 'Recognition and memberships' ) ); ?>
                    </h3>
                    <ul class="space-y-3 text-[18px] leading-relaxed text-[#000000]">
                        <?php foreach ( $p_creds as $c ) : ?>
                        <?php $cred = ri_val( $c, 'credential' ); ?>
                        <?php if ( ! $cred ) { continue; } ?>
                        <li class="flex gap-3">
                            <span class="mt-[10px] h-[7px] w-[7px] shrink-0 rounded-full bg-[#884A83]" aria-hidden="true"></span>
                            <span><?php echo esc_html( $cred ); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Languages -->
                <?php if ( $p_langs ) : ?>
                <div>
                    <h3 class="text-[24px] font-semibold text-[#884A83] mb-4">Languages</h3>
                    <p class="text-[18px] leading-relaxed text-[#000000]"><?php echo esc_html( $p_langs ); ?></p>
                </div>
                <?php endif; ?>

                <!-- Contact -->
                <?php if ( $has_contact ) : ?>
                <div>
                    <h3 class="text-[24px] font-semibold text-[#884A83] mb-4">
                        <?php echo esc_html( $p_first ? sprintf( 'Contact %s', $p_first ) : 'Contact us' ); ?>
                    </h3>
                    <ul class="space-y-2 text-[18px] leading-relaxed text-[#000000]">
                        <?php if ( $p_email && is_email( $p_email ) ) : ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr( sanitize_email( $p_email ) ); ?>"
                                class="text-[#884A83] underline underline-offset-4 break-words hover:no-underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#884A83]"><?php echo esc_html( $p_email ); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php $p_tel = $p_phone ? preg_replace( '/[^0-9+]/', '', (string) $p_phone ) : ''; ?>
                        <?php if ( $p_phone ) : ?>
                        <li>
                            <?php if ( $p_tel ) : ?>
                            <a href="tel:<?php echo esc_attr( $p_tel ); ?>"
                                class="text-[#884A83] underline underline-offset-4 hover:no-underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#884A83]"><?php echo esc_html( $p_phone ); ?></a>
                            <?php else : ?>
                            <?php echo esc_html( $p_phone ); ?>
                            <?php endif; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            <!-- TRUST BADGES -->
            <div class="flex justify-center">
                <div class="flex items-center gap-10">
                    <?php if ( $t1 ) : ?>
                    <img src="<?php echo esc_url( $t1 ); ?>" alt="Trust 1" class="h-[164px] lg:h-[183px] w-auto object-contain">
                    <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/solicitors.Bzp1uPFu_Zh6Cz2.webp"
                        alt="Solicitors Regulation Authority" class="h-[164px] lg:h-[183px] w-auto object-contain">
                    <?php endif; ?>

                    <?php if ( $t2 ) : ?>
                    <img src="<?php echo esc_url( $t2 ); ?>" alt="Trust 2" class="h-[110px] lg:h-[157px] w-auto object-contain">
                    <?php else : ?>
                    <img src="/wp-content/uploads/2026/05/uk-leading-firm-2024.webp"
                        alt="Legal 500 Leading Firm" class="h-[110px] lg:h-[157px] w-auto object-contain">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================= REVIEWS CAROUSEL =======================
         Markup mirrors template-parts/common/testimonials.php so it is driven
         by the same /scripts/reviewsCarrousel.js: data-carousel, data-track,
         data-prev, data-next, .carousel-item.
    -->
    <?php if ( ! empty( $p_reviews ) ) : ?>
    <?php $astro = get_template_directory_uri() . '/ui-source/dist/_astro/'; ?>
    <section class="bg-[#6D3B69] py-12 lg:py-16 overflow-hidden">
        <div class="mx-auto max-w-7xl lg:px-10">

            <!-- HEADER -->
            <div class="mb-8 lg:mb-10 px-4 lg:px-0 text-left lg:text-center">
                <p class="text-white text-[32px] leading-tight lg:text-[36px] font-semibold">
                    <?php echo esc_html( ri_profile_field( 'profile_reviews_heading', $p_first ? sprintf( 'What clients say about %s', $p_first ) : 'What clients say' ) ); ?>
                </p>
            </div>

            <!-- CARDS + NAVIGATION -->
            <div class="relative flex items-center justify-center px-4 lg:px-0" data-carousel>

                <!-- PREV BUTTON -->
                <button data-prev aria-label="Previous reviews" class="absolute z-10 flex items-center justify-center text-white left-0 lg:left-[calc(50%-350px-230px)]">
                    <img src="<?php echo esc_url( $astro . 'Back.V5pXw1d-_Z13nhBy.webp' ); ?>"
                        alt="Previous" loading="lazy" decoding="async" fetchpriority="auto" width="36" height="42"
                        class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px]">
                </button>

                <!-- CARDS WRAPPER -->
                <div class="flex items-stretch gap-6 w-full justify-center px-8 lg:px-0" data-track>

                    <?php foreach ( $p_reviews as $r ) : ?>
                    <?php
                    $r_title  = ri_val( $r, 'review_title' );
                    $r_author = ri_val( $r, 'review_author' );
                    $r_source = ri_val( $r, 'review_source' );
                    $r_stars  = (int) ri_val( $r, 'review_stars', 0 );
                    $is_rio   = in_array( $r_source, array( 'Reviews.io', 'Reviews.co.uk' ), true );
                    ?>
                    <div class="carousel-item flex flex-col w-full max-w-[350px] lg:max-w-none lg:w-auto">

                        <div class="review-card bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-full
                                flex flex-col border-[5px] border-[#A3599D]">

                            <!-- TITLE -->
                            <?php if ( $r_title ) : ?>
                            <h3 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                                <?php echo esc_html( $r_title ); ?>
                            </h3>
                            <?php endif; ?>

                            <!-- BODY -->
                            <p class="flex-1 text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                                <?php echo esc_html( ri_val( $r, 'review_quote' ) ); ?>
                            </p>

                            <!-- FOOTER always at bottom -->
                            <?php if ( $r_author || $r_stars > 0 || $r_source ) : ?>
                            <div class="pt-4 flex flex-col gap-1">
                                <?php if ( $r_author ) : ?>
                                <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]">
                                    <?php echo esc_html( $r_author ); ?>
                                </span>
                                <?php endif; ?>

                                <?php if ( $r_stars > 0 || $r_source ) : ?>
                                <div class="flex items-center gap-5 leading-none">

                                    <?php if ( $r_stars > 0 ) : ?>
                                    <div class="flex" role="img" aria-label="<?php echo esc_attr( sprintf( '%d out of 5 stars', $r_stars ) ); ?>">
                                        <?php for ( $i = 0; $i < $r_stars; $i++ ) : ?>
                                        <img src="<?php echo esc_url( $astro . 'Star.BDdK2hbS_zVXRy.webp' ); ?>"
                                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain">
                                        <?php endfor; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ( $is_rio ) : ?>
                                    <img src="<?php echo esc_url( $astro . 'review-io.Do0gNMNe_Z243keq.webp' ); ?>"
                                        alt="<?php echo esc_attr( $r_source ); ?>" loading="lazy" decoding="async" fetchpriority="auto"
                                        width="144" height="32"
                                        class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain">
                                    <?php elseif ( $r_source ) : ?>
                                    <span class="text-[16px] lg:text-[18px] text-[#000000]"><?php echo esc_html( $r_source ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <!-- NEXT BUTTON -->
                <button data-next aria-label="Next reviews" class="absolute z-10 flex items-center justify-center text-white right-0 lg:right-[calc(50%-350px-230px)]">
                    <img src="<?php echo esc_url( $astro . 'Back.V5pXw1d-_Z13nhBy.webp' ); ?>"
                        alt="Next" loading="lazy" decoding="async" fetchpriority="auto" width="36" height="42"
                        class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px] rotate-180">
                </button>
            </div>
        </div>
        <script src="/scripts/reviewsCarrousel.js"></script>
    </section>
    <?php endif; ?>

    <!-- ====================== IN THEIR OWN WORDS ====================== -->
    <?php if ( ! empty( $p_qa ) ) : ?>
    <section class="py-10 lg:py-14 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="text-[36px] font-semibold text-[#884A83] mb-8">
                <?php echo esc_html( ri_profile_field( 'profile_qa_heading', $p_first ? sprintf( "In %s's own words", $p_first ) : 'In their own words' ) ); ?>
            </h2>
            <dl class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <?php foreach ( $p_qa as $qa ) : ?>
                <div>
                    <dt class="text-[24px] font-semibold text-[#884A83] mb-4 leading-snug"><?php echo esc_html( ri_val( $qa, 'qa_question' ) ); ?></dt>
                    <dd class="text-[18px] leading-relaxed text-[#000000]"><?php echo esc_html( ri_val( $qa, 'qa_answer' ) ); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </section>
    <?php endif; ?>

    <!-- ============================ CAREER ============================ -->
    <?php if ( ! empty( $p_timeline ) ) : ?>
    <section class="bg-[#9A5B9D] py-10 lg:py-16">
        <div class="mx-auto max-w-4xl px-4 sm:px-6">
            <h2 class="text-center text-[26px] sm:text-[30px] lg:text-[36px] font-semibold text-white mb-8 lg:mb-10">
                <?php echo esc_html( ri_profile_field( 'profile_timeline_heading', $p_first ? sprintf( "%s's Journey", $p_first ) : 'Career' ) ); ?>
            </h2>
            <div class="space-y-4 lg:space-y-6 flex flex-col items-center">
                <?php foreach ( $p_timeline as $item ) : ?>
                <?php
                $year  = ri_val( $item, 'year' );
                $title = ri_val( $item, 'title' );
                $text  = ri_val( $item, 'text' );
                ?>
                <div class="bg-white px-6 py-8 border-l-[15px] border-[#6D3B69] shadow-sm w-full lg:w-[1140px]">
                    <?php if ( $year ) : ?>
                    <p class="text-[16px] font-bold uppercase tracking-[0.12em] text-[#9A5B9D] mb-1"><?php echo esc_html( $year ); ?></p>
                    <?php endif; ?>
                    <?php if ( $title ) : ?>
                    <h4 class="text-[26px] font-semibold text-[#884A83] mb-2"><?php echo esc_html( $title ); ?></h4>
                    <?php endif; ?>
                    <?php if ( $text ) : ?>
                    <p class="text-[18px] leading-relaxed text-[#000000]"><?php echo esc_html( $text ); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/featured-article' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>
</main>

<?php
get_footer();