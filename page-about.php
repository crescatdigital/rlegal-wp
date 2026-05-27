<?php
/*
 * Template Name: About
 * Description: Static About page using the pre-built HTML content.
 */
get_header();
?>

<main class="flex-grow">
    <section class="py-10 lg:py-12">
        <!-- Mobile: Full-width image (breaks out of container) -->
        <div class="lg:hidden relative left-1/2 -translate-x-1/2">
        <div class="lg:h-[480px] sm:h-[400px]">
            <?php $about_mob_img = get_ri_field( 'about_hero_mob_image', '' ); ?>
            <img
                src="<?php echo esc_url(
                    $about_mob_img
                        ? $about_mob_img
                        : get_template_directory_uri() . '/ui-source/dist/_astro/hero-mob.C2kO84Pf_Z1umsxE.webp'
                ); ?>"
                alt="Immigration consultation"
                loading="eager"
                decoding="async"
                fetchpriority="auto"
                width="440"
                height="370"
                class="h-full w-full object-cover"
            >
        </div>
    </div>

        <div class="mx-auto px-6 lg:px-0 lg:max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-8 items-center">
                <!-- RIGHT IMAGE -->
                <div class="hidden lg:flex order-2 justify-end relative -ml-6">
                <div class="relative h-[420px] w-full max-w-[720px] overflow-hidden rounded-l-[120px]">
                    <?php $about_desktop_img = get_ri_field( 'about_hero_desktop_image', '' ); ?>
                    <img
                        src="<?php echo esc_url(
                            $about_desktop_img
                                ? $about_desktop_img
                                : get_template_directory_uri() . '/ui-source/dist/_astro/home-hero.BFRKJEPC_1lizIa.webp'
                        ); ?>"
                        alt="Immigration consultation"
                        loading="eager"
                        decoding="async"
                        fetchpriority="auto"
                        width="860"
                        height="480"
                        class="h-full w-full object-cover"
                    >
                </div>
            </div>

                <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="max-w-[620px]
                    order-1
                    text-center lg:text-left
                    mx-auto lg:mx-0
                    lg:pl-[85px]
                    mt-8 lg:mt-0
                    lg:pt-[68px]">
                    <!-- Eyebrow -->
                    <p class="text-[20px] sm:text-[16px] lg:text-[20px] text-[#884A83] mb-3">
                        <?php echo esc_html( get_ri_field( 'about_eyebrow', 'Welcome to RLegal Solicitors' ) ); ?></p>
                    <!-- Heading -->
                    <h1 class="text-[36px] sm:text-[36px] lg:text-[40px] leading-tight text-[#000000]">
                        <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'about_heading', "About our immigration\nlaw firm, established\nin 2002" ) ) ) ); ?>
                    </h1> 
                    
                    <!-- CTA -->
                    <div class="mt-6 flex justify-center lg:justify-start">
                        <a href="<?php echo esc_url( get_ri_field( 'about_cta_link', '/contact-us' ) ); ?>" 
                        class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer bg-[#4A884F] text-white hover:bg-[#3d7242] gap-2 rounded-[15px] px-5 py-2.5 text-[16px] lg:text-[18px]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-messages-square h-5 w-5 lg:h-6 lg:w-6 stroke-white">
                                <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                            </svg>
                            <?php echo esc_html( get_ri_field( 'about_cta_text', 'Get a Free Consultation' ) ); ?>
                        </a>
                    </div>



                    <!-- REVIEWS -->
                    <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                        <div class="flex items-center gap-6">
                            <div class="w-[156px] h-[45px] flex items-center"> <img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="156" height="45" class="w-full h-full object-contain"> </div>
                            <div class="w-[149px] h-[78px] flex items-center"> <img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="149" height="78" class="w-full h-full object-contain"> </div>
                        </div>
                        <p class="text-[16px] lg:text-[16px] text-[#000000]">
                            <?php echo esc_html( get_ri_field( 'about_reviews_text', get_ri_field( 'reviews_rating_text', 'Rated 4.9/5 from 515 verified reviews' ), 'option' ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <section class="py-10 bg-white px-2 lg:px-0">
        <div class="mx-auto max-w-5xl w-full">
            <!-- TITLE -->
            <h2 class="text-[36px] font-semibold text-[#884A83] mb-6">
                <?php echo esc_html( get_ri_field( 'about_intro_title', 'Welcome to RLegal Immigration Solicitors' ) ); ?>
            </h2> <!-- INTRO TEXT -->
            <p class="text-[18px] leading-relaxed text-[#000000] mb-10 max-w-4xl">
                <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'about_intro_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' ) ) ) ); ?>
            </p> <!-- SUB HEADING -->
            <h3 class="text-[24px] font-semibold text-[#000000] mb-4">
                <?php echo esc_html( get_ri_field( 'about_who_heading', 'Who we are' ) ); ?></h3> <!-- BODY TEXT -->
            <p class="text-[18px] leading-relaxed text-[#000000] mb-14 max-w-4xl">
                <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'about_who_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' ) ) ) ); ?>
            </p> <!-- TRUST BADGES -->
            <div class="flex justify-center">
                <div class="flex items-center gap-10">
                    <?php $t1 = get_ri_field( 'trust_image_1', '', 'option' ); $t2 = get_ri_field( 'trust_image_2', '', 'option' ); ?>
                    <?php if ( $t1 ) : ?><img src="<?php echo esc_url( $t1 ); ?>" alt="Trust 1"
                        class="h-[164px] lg:h-[183px] w-auto object-contain"><?php else : ?><img
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/solicitors.Bzp1uPFu_Zh6Cz2.webp"
                        alt="Solicitors Regulation Authority"
                        class="h-[164px] lg:h-[183px] w-auto object-contain"><?php endif; ?> <?php if ( $t2 ) : ?><img
                        src="<?php echo esc_url( $t2 ); ?>" alt="Trust 2"
                        class="h-[110px] lg:h-[157px] w-auto object-contain"><?php else : ?><img
                        src="/wp-content/uploads/2026/05/uk-leading-firm-2024.webp"
                        alt="Legal 500 Leading Firm"
                        class="h-[110px] lg:h-[157px] w-auto object-contain"><?php endif; ?> </div>
            </div>
        </div>
    </section>
    
    <!-- REVIEWS CAROUSEL SECTION -->
    <?php get_template_part( 'template-parts/common/testimonials' ); ?>


    <section class="py-14 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <!-- TITLE -->
            <h2 class="text-center text-[36px] font-semibold text-[#A3599D] mb-10">
                <?php echo esc_html( get_ri_field( 'about_partners_heading', 'Our Partners' ) ); ?>
            </h2> <!-- CARD CONTAINER -->
            <div class="bg-[#EFEFEF] rounded-lg p-8">
                <div class="flex flex-wrap justify-center gap-8"> 
                    <?php
                    $partners = get_ri_field( 'about_partners', array() );
                    if ( ! empty( $partners ) ) {
                        foreach ( $partners as $p ) {
                            $img = isset( $p['partner_image'] ) ? $p['partner_image'] : '';
                            $name = isset( $p['partner_name'] ) ? $p['partner_name'] : '';
                            $bio = isset( $p['partner_bio'] ) ? $p['partner_bio'] : '';
                            $link = isset( $p['partner_link'] ) ? $p['partner_link'] : '#';
                            ?>
                    <div class="bg-white rounded-md p-6 w-[260px] lg:w-[320px] lg:h-[550px] shadow-sm text-center partner__card">
                        <!-- IMAGE -->
                        <div class="mb-4">
                            <?php if ( $img ) : ?>
                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ); ?>"
                                class="object-cover rounded-sm partner__image">
                            <?php endif; ?>
                        </div>
                        <!-- NAME -->
                        <h4 class="text-[26px] font-semibold text-[#884A83] mb-2"><?php echo esc_html( $name ); ?></h4>
                        <!-- DESCRIPTION -->
                        <p class="text-[18px] text-left leading-relaxed text-[#000000] mb-4">
                            <?php echo wp_kses_post( nl2br( esc_html( $bio ) ) ); ?></p>
                        <!-- CTA -->
                        <a href="<?php echo esc_attr( $link ); ?>" class="inline-block lg:w-[220px] rounded-xl bg-[#884A83]
                        px-4 py-1.5 mt-[16px] mb-[22px] text-[18px] font-medium text-white
                        hover:bg-[#73366f] transition">Find out more</a>
                    </div>
                    <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-[#9A5B9D] py-10 lg:py-16">
        <div class="mx-auto max-w-4xl px-4 sm:px-6">
            <!-- SECTION TITLE -->
            <h2 class="text-center
             text-[26px] sm:text-[30px] lg:text-[36px]
             font-semibold text-white
             mb-8 lg:mb-10">
                The RLegal Journey: Our History
            </h2> <!-- TIMELINE STACK -->
            <div class="space-y-4 lg:space-y-6 flex flex-col items-center"> <?php
          $timeline = get_ri_field( 'about_timeline', array() );
          if ( ! empty( $timeline ) ) {
              foreach ( $timeline as $item ) {
                  $title = isset( $item['title'] ) ? $item['title'] : '';
                  $text  = isset( $item['text'] ) ? $item['text'] : '';
                  ?>
                <div class="bg-white px-6 py-8
         border-l-[15px] border-[#6D3B69]
         shadow-sm lg:w-[1140px]"> <?php if ( $title ) { ?><h4 class="text-[26px] font-semibold text-[#884A83] mb-2">
                        <?php echo esc_html( $title ); ?></h4><?php } ?> <?php if ( $text ) { ?><p
                        class="text-[18px] leading-relaxed text-[#000000]">
                        <?php echo wp_kses_post( nl2br( esc_html( $text ) ) ); ?></p><?php } ?> </div>
                <?php
              }
          }
          ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/featured-article' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>
</main>

<?php
get_footer();