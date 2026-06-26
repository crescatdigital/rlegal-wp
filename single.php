<?php
get_header();
?>
<main class="flex-grow">

    <!-- HERO SECTION -->
    <section class="relative bg-white overflow-hidden mb-10">
        <div class="mx-auto py-0 max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">

                <!-- LEFT CONTENT -->
                <div class="px-6 lg:pl-[165px] lg:pr-8">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">

                        <!-- Category -->
                        <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                            Immigration Insights
                        </p>

                        <!-- Title -->
                        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black">
                            <?php the_title(); ?>
                        </h1>

                        <!-- Meta -->
                        <p class="text-[16px] text-[#555] mb-6">
                            <?php echo get_the_date(); ?> &bull; <?php echo esc_html(get_the_author()); ?>
                        </p>

                        <!-- CTA -->
                        <div class="flex justify-center lg:justify-start">
                            <a href="/contact" class="inline-flex items-center gap-2 rounded-lg bg-[#4A884F] px-5 py-2.5 text-[16px] lg:text-[18px] font-semibold text-white hover:bg-[#3d7242] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 stroke-white">
                                    <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                                </svg>
                                Get a Free Consultation
                            </a>
                        </div>

                        <!-- Reviews -->
                        <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                            <div class="flex items-center gap-4">
                                <?php ri_review_link_open( 'reviewsio' ); ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp" alt="Reviews.io rating" loading="lazy" width="156" height="45" class="h-[45px] w-auto"><?php ri_review_link_close(); ?>
                                <?php ri_review_link_open( 'google' ); ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp" alt="Google reviews" loading="lazy" width="149" height="78" class="h-[78px] w-auto"><?php ri_review_link_close(); ?>
                            </div>
                            <p class="text-[16px] text-[#000000]">Rated 4.9/5 from 529 verified reviews<?php ri_reviews_tooltip(); ?></p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE (FEATURED IMAGE) -->
                <?php
                $thumbnail = get_the_post_thumbnail_url();
                if ($thumbnail) {
                    $bg_style = "style=\"background-image: linear-gradient(270deg, rgba(109,59,105,0.7) 0.64%, rgba(255,255,255,1) 100%), url('$thumbnail'); background-size: cover; background-position: center; background-repeat: no-repeat;\"";
                } else {
                    $bg_style = '';
                }
                ?>
                <div class="relative flex items-center order-1 lg:order-2 min-h-[500px] lg:min-h-[550px] mx-6 lg:mx-0 lg:bg-[linear-gradient(270deg,#6D3B69_0.64%,#FFFFFF_99.11%)]" <?php echo $bg_style; ?>>
                    <div class="w-[550px] flex justify-center lg:justify-end px-0 lg:pr-[10px] lg:pl-[135px]">
                        <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-[470px] w-full">
                            <h3 class="text-center text-white font-bold text-[20px] mb-2">
                                Get in touch with our lawyers
                            </h3>
                            <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURED IMAGE -->
    <?php if ( has_post_thumbnail() ) : the_post(); ?>
    <section class="bg-white pb-10">
        <div class="mx-auto max-w-4xl px-6">
            <div class="w-full h-[400px] lg:h-[500px] overflow-hidden rounded-xl">
                <?php the_post_thumbnail('full', [
                    'class' => 'w-full h-full object-cover',
                    'alt'   => esc_attr(get_the_title()),
                ]); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- ARTICLE CONTENT -->
    <section class="content-article py-10 bg-white">
        <div class="mx-auto max-w-4xl px-6">
            <?php if ( ! have_posts() ) : the_post(); endif; ?>
            <div class="prose prose-lg max-w-none text-[18px] leading-relaxed text-[#000000]">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/testimonials' ); ?>

    <?php get_template_part( 'template-parts/common/callout' ); ?>

    <?php get_template_part( 'template-parts/common/featured-article' ); ?>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>