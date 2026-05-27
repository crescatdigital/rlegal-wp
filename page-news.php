<?php
/*
 * Template Name: News
 */
get_header();
?>

<main class="flex-grow">


    <section class="py-10 lg:py-12">
        <!-- Mobile: Full-width image (breaks out of container) -->
        <div class="lg:hidden relative left-1/2 -translate-x-1/2">
            <div class="lg:h-[480px] sm:h-[400px]">
                <?php $news_mob_img = get_ri_field( 'news_hero_mob_image', '' ); ?>
                <img
                    src="<?php echo esc_url(
                        $news_mob_img
                            ? $news_mob_img
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
                        <?php $news_desktop_img = get_ri_field( 'news_hero_desktop_image', '' ); ?>
                        <img
                            src="<?php echo esc_url(
                                $news_desktop_img
                                    ? $news_desktop_img
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

                <!-- LEFT CONTENT -->
                <div class="max-w-[620px] order-1 text-center lg:text-left mx-auto lg:mx-0 lg:pl-[85px] mt-8 lg:mt-0 lg:pt-[68px]">
                    <!-- Eyebrow -->
                    <p class="text-[20px] sm:text-[16px] lg:text-[20px] text-[#884A83] mb-3">
                        <?php echo esc_html(
                            get_ri_field(
                                'news_hero_eyebrow',
                                'Immigration Law Latest News & Insights'
                            )
                        ); ?>
                    </p>

                    <!-- Heading -->
                    <h1 class="text-[36px] sm:text-[36px] lg:text-[40px] leading-tight text-[#000000]">
                        <?php
                        $news_heading = get_ri_field(
                            'news_hero_heading',
                            "Welcome to the\nRLegal\ninformation hub"
                        );
                        $lines = preg_split('/\r\n|\r|\n/', $news_heading);
                        foreach ( $lines as $line ) {
                            echo '<span class="block whitespace-nowrap">' . esc_html( $line ) . '</span>';
                        }
                        ?>
                    </h1>

                    <!-- CTA -->
                    <div class="mt-6 flex justify-center lg:justify-start">
                        <a   href="<?php echo esc_url( get_ri_field( 'news_hero_cta_link', '#' ) ); ?>"
                                class="inline-flex items-center gap-2 rounded-[15px] bg-[#4A884F] px-5 py-2.5 text-[16px] lg:text-[18px] text-white font-bold transition duration-200 hover:bg-[#3d7242]"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-messages-square h-5 w-5 lg:h-6 lg:w-6 stroke-white">
                                    <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                                </svg>
                          <?php echo esc_html( get_ri_field( 'news_hero_cta_text', 'Get a Free Consultation' ) ); ?>
                        </a>
                    </div>

                    <!-- REVIEWS -->
                    <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                        <div class="flex items-center gap-6">
                            <div class="w-[156px] h-[45px] flex items-center">
                                <img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating"
                                    loading="lazy"
                                    decoding="async"
                                    width="156"
                                    height="45"
                                    class="w-full h-full object-contain"
                                >
                            </div>
                            <div class="w-[149px] h-[78px] flex items-center">
                                <img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews"
                                    loading="lazy"
                                    decoding="async"
                                    width="149"
                                    height="78"
                                    class="w-full h-full object-contain"
                                >
                            </div>
                        </div>
                        <p class="text-[16px] lg:text-[16px] text-[#000000]">
                            <?php echo esc_html(
                                get_ri_field(
                                    'news_hero_reviews_text',
                                    'Rated 4.9/5 from 515 verified reviews'
                                )
                            ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
        $intro_heading = get_field('articles_intro_heading') ?: 'All the latest immigration law updates, news and insight';
        $intro_text    = get_field('articles_intro_text') ?: '';
    ?>

    <section class="bg-white pt-14 pb-10">
        <div class="mx-auto max-w-6xl px-6">
            <!-- CONTENT ROW -->
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
                <!-- LEFT TEXT -->
                <div class="max-w-xl">
                    <h2 class="text-[36px] font-semibold text-[#884A83] leading-tight mb-4">
                        <?php echo esc_html( $intro_heading ); ?>
                    </h2>
                    <?php if ( $intro_text ) : ?>
                        <p class="text-[18px] leading-relaxed text-[#000000]">
                            <?php echo esc_html( $intro_text ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- RIGHT LOGOS -->
                <div class="flex justify-center lg:justify-end gap-10">
                    <img
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/solicitors.Bzp1uPFu_Zh6Cz2.webp"
                        alt="Solicitors Regulation Authority"
                        loading="lazy" decoding="async" fetchpriority="auto"
                        width="262" height="183"
                        class="h-[128px] lg:h-[183px] w-auto object-contain"
                    >
                    <img
                        src="/wp-content/uploads/2026/05/uk-leading-firm-2024.webp"
                        alt="Legal 500 Leading Firm"
                        loading="lazy" decoding="async" fetchpriority="auto"
                        width="108" height="157"
                        class="h-[110px] lg:h-[157px] w-auto object-contain"
                    >
                </div>
            </div>

            <!-- DIVIDER -->
            <div class="mt-10 h-[2px] w-full bg-[#884A83]"></div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/featured-article' ); ?>
    
    <?php
        $load_more_text = get_field('articles_load_more_text') ?: 'Load more articles';
        $initial_count  = 2;

        $articles_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        $articles = $articles_query->posts;
        wp_reset_postdata();
        ?>

        <section class="py-14 bg-white">
            <div class="mx-auto max-w-6xl px-6">

                <?php if ( $articles ) : ?>
                <div class="space-y-6 mb-10">

                    <?php foreach ( $articles as $index => $post ) :
                        $title   = get_the_title( $post->ID );
                        $excerpt = wp_trim_words( $post->post_excerpt ?: $post->post_content, 15 );
                        $link    = get_permalink( $post->ID );
                        $image   = get_the_post_thumbnail_url( $post->ID, 'large' );
                    ?>

                    <div class="article-card flex flex-col lg:flex-row
                                w-full overflow-hidden rounded-md
                                bg-[#F2F2F2]
                                lg:h-[340px]
                                <?php echo $index >= $initial_count ? 'hidden' : ''; ?>">

                        <!-- LEFT CONTENT -->
                        <div class="w-full lg:w-[55%]
                                    bg-[#9A5B9D]
                                    border-l-0 lg:border-l-[10px]
                                    border-t-[10px] lg:border-t-0
                                    border-[#6D3B69]
                                    px-4 lg:px-[41px]
                                    py-6 lg:py-10
                                    text-white
                                    flex flex-col justify-between">

                            <div>
                                <?php if ( $title ) : ?>
                                    <h3 class="text-[22px] lg:text-[26px] font-semibold mb-2">
                                        <?php echo esc_html( $title ); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ( $excerpt ) : ?>
                                    <p class="text-[16px] lg:text-[18px] leading-relaxed opacity-90">
                                        <?php echo esc_html( $excerpt ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <a href="<?php echo esc_url( $link ); ?>"
                            class="mt-6 lg:mt-0
                                    inline-block w-fit lg:w-[260px]
                                    rounded-[15px]
                                    bg-[#6D3B69]
                                    px-4 py-2
                                    text-[16px] lg:text-[18px]
                                    text-white text-center">
                                Read this article
                            </a>

                        </div>

                        <!-- RIGHT IMAGE -->
                        <div class="w-full lg:w-[45%]
                                    flex items-center justify-center
                                    bg-[#F2F2F2]
                                    py-6 lg:py-0">

                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image ); ?>"
                                    alt="<?php echo esc_attr( $title ); ?>"
                                    class="h-full w-full object-cover"
                                    loading="lazy">
                            <?php else : ?>
                                <div class="h-[96px] w-[96px] lg:h-[126px] lg:w-[135px] flex items-center justify-center">
                                    <svg class="h-full w-full text-[#B3B3B3]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <path d="M21 15l-5-5L5 21"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
                <?php endif; ?>

                <!-- LOAD MORE -->
                <?php if ( count( $articles ) > $initial_count ) : ?>
                <div class="flex justify-center" id="load-more-wrap">
                    <button type="button"
                            id="load-more-btn"
                            class="rounded-[15px] bg-[#6D3B69]
                                px-5 py-2
                                text-[18px] lg:w-[260px] text-white">
                        <?php echo esc_html( $load_more_text ); ?>
                    </button>
                </div>
                <?php endif; ?>

            </div>
        </section>


    <!-- REVIEWS CAROUSEL SECTION -->
    <?php get_template_part( 'template-parts/common/testimonials' ); ?>

    <?php get_template_part( 'template-parts/common/callout' ); ?>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php
get_footer();
?>