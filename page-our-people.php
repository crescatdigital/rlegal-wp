<?php
/*
 * Template Name: Our People
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
                        src="https://rlegal.on-forge.com/wp-content/uploads/2026/02/pexels-n-voitkevich-7235894-scaled.jpg"
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
                    <h1 class="text-[36px] sm:text-[36px] lg:text-[40px]
         leading-tight text-[#000000]">
                        <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'about_heading', "About our immigration\nlaw firm, established\nin 2002" ) ) ) ); ?>
                    </h1> <!-- CTA -->
                    <div class="mt-6 flex justify-center lg:justify-start"> 

                        <a href="<?php echo esc_url( get_ri_field( 'people_hero_cta_link', '#' ) ); ?>"
                            class="inline-flex items-center gap-2
                                    rounded-lg bg-[#4A884F]
                                    px-5 py-2.5
                                    text-[16px] lg:text-[18px] font-semibold text-white
                                    hover:bg-[#3d7242] transition">
                                <!-- svg icon -->
                                <?php echo esc_html( get_ri_field( 'services_hero_cta_text', 'Get a Free Consultation' ) ); ?>
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
                    <div class="bg-white rounded-md p-6 w-[260px] lg:w-[320px] lg:h-[550px] shadow-sm text-center">
                        <!-- IMAGE -->
                        <div class="mb-4">
                            <?php if ( $img ) : ?>
                            <img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $name ); ?>"
                                class="h-[140px] lg:h-[197px] w-full object-cover rounded-sm">
                            <?php endif; ?>
                        </div>
                        <!-- NAME -->
                        <h4 class="text-[26px] font-semibold text-[#884A83] mb-2"><?php echo esc_html( $name ); ?></h4>
                        <!-- DESCRIPTION -->
                        <p class="text-[18px] text-left leading-relaxed text-[#000000] mb-4">
                            <?php echo wp_kses_post( nl2br( esc_html( $bio ) ) ); ?></p>
                        <!-- CTA -->
                        <a href="<?php echo esc_attr( $link ); ?>" class="inline-block lg:w-[220px] rounded-xl bg-[#884A83]
                        px-4 py-1.5 text-[18px] font-medium text-white
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


    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/featured-article' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>
</main>

<?php
get_footer();