<?php
/*
 * Template Name: Faqs
 * Description: Static About page using the pre-built HTML content.
 */
get_header();
?>
<main class="flex-grow">

    <section class="relative bg-white overflow-hidden mb-10">
        <div class="mx-auto py-0 max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">
                <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="px-6 lg:pl-[165px] lg:pr-8">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">
                        
                        <!-- Eyebrow -->
                        <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                            <?php echo esc_html( get_ri_field( 'services_hero_eyebrow', 'FAQ & Client Guidance' ) ); ?>
                        </p>

                        <!-- Heading -->
                        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_heading', "UK immigration Questions\n" ) ) ) ); ?>
                        </h1>
                        <!-- CTA -->
                        <div class="flex justify-center lg:justify-start">
                            <a href="<?php echo esc_url( get_ri_field( 'services_hero_cta_link', '/contact-us' ) ); ?>"
                                class="inline-flex items-center gap-2
                                        rounded-lg bg-[#4A884F]
                                        px-5 py-2.5
                                        text-[16px] lg:text-[18px] font-semibold text-white
                                        hover:bg-[#3d7242] transition">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-messages-square h-4 w-4 stroke-white">
                                        <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                        <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                                    </svg>

                                    <?php echo esc_html( get_ri_field( 'services_hero_cta_text', 'Get a Free Consultation' ) ); ?>
                                </a>
                        </div>

                        <!-- REVIEWS -->
                        <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                            <div class="flex items-center gap-4">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="156" height="45" class="h-[45px] w-auto">
                                    
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="149" height="78" class="h-[78px] w-auto">
                            </div>
                            <p class="text-[16px] text-[#000000]">
                                <?php echo esc_html( get_ri_field( 'services_reviews_text', 'Rated 4.9/5 from 515 verified reviews' ) ); ?>
                            </p>
                        </div>
                    </div>
                </div>
				<?php
				$thumbnail = get_the_post_thumbnail_url();
				if ($thumbnail){
					$thumbnail = "style=\" background-image: linear-gradient(270deg, rgba(109,59,105,0.7) 0.64%, rgba(255,255,255,1) 100%), url('$thumbnail'); background-size: cover; background-position: center; background-repeat: no-repeat; \" ";
				} else {
					$thumbnail = '';
				}
				?>
                <!-- RIGHT SIDE (GRADIENT + FORM) (FIRST ON MOBILE) -->
                <div class="relative flex items-center order-1 lg:order-2
         min-h-[500px] lg:min-h-[550px]
         mx-6 lg:mx-0
         lg:bg-[linear-gradient(270deg,#6D3B69_0.64%,#FFFFFF_99.11%)] hero-form-container"
					 <?php echo $thumbnail; ?>
					 >
                    <!-- Inner alignment wrapper -->
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



    <section class="bg-[#9A5B9D] py-10">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-center text-[36px] font-semibold text-white mb-12">
                <?php echo esc_html( get_field('faq_title') ?: 'Frequently Asked Questions' ); ?>
            </h2>

            <div class="space-y-5">
                <?php if( have_rows('faq_items') ): $i = 0; ?> <?php while( have_rows('faq_items') ): the_row(); ?>

                <div class="overflow-hidden rounded-md" data-accordion>
                    <button
                        type="button"
                        class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[24px] lg:text-[30px] font-semibold text-white transition bg-[#6D3B69]"
                        aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                    >
                        <span class="max-w-[90%]"> <?php echo esc_html( get_sub_field('question') ); ?> </span>

                        <span
                            class="accordion-icon flex lg:h-[50px] lg:w-[50px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[24px]"
                        >
                            <?php echo $i === 0 ? '↑' : '↓'; ?>
                        </span>
                    </button>

                    <div
                        class="accordion-content bg-white px-6 py-6 text-[16px] lg:text-[18px] leading-[1.7] text-[#333333] space-y-4 <?php echo $i === 0 ? 'block' : 'hidden'; ?>"
                    >
                        <p><?php echo esc_html( get_sub_field('answer') ); ?></p>
                    </div>
                </div>

                <?php $i++; endwhile; ?> <?php endif; ?>
            </div>
        </div>

        <script src="/scripts/accordion.js"></script>
    </section>


    <?php get_template_part( 'template-parts/common/callout' ); ?>

    <?php get_template_part( 'template-parts/common/featured-article' ); ?>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>