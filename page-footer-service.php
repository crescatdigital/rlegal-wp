<?php
/**
 * Template Name: Servicessss
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<main class="flex-grow">

    <!-- HERO SECTION -->
    <section class="relative bg-white overflow-hidden mb-10">
        <div class="mx-auto py-0 lg:w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">
                <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="px-6 lg:pl-[165px] lg:pr-8">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">
                        
                        <!-- Eyebrow -->
                        <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                            <?php echo esc_html( get_ri_field( 'services_hero_eyebrow', 'Connect with Us' ) ); ?>
                        </p>

                        <!-- Heading -->
                        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_heading', "info@rlegal.com\n 0207 038 3880" ) ) ) ); ?>
                        </h1>

                        <!-- CTA -->
                        <div class="flex justify-center lg:justify-start">
                           <a href="<?php echo esc_url( get_ri_field( 'services_hero_cta_link', '#' ) ); ?>" 
                            class="inline-flex items-center gap-2 rounded-lg bg-[#4A884F] px-5 py-2.5 text-[16px] lg:text-[18px] font-semibold text-white hover:bg-[#3d7242] transition">
                                <!-- svg icon -->
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
                if ( $thumbnail ) {
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
                    <?php echo $thumbnail; ?>>
                    <!-- Inner alignment wrapper -->
                    <div class="w-[550px] flex justify-center lg:justify-end px-0 lg:pr-[10px] lg:pl-[135px]">
                        <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-[470px] w-full">
                            <h3 class="text-center text-white font-bold text-[30px] mb-6">
                                <?php echo esc_html( get_ri_field( 'services_form_heading', 'Request a callback from our immigration experts' ) ); ?>
                            </h3>
                            <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-[#faf8fa]">
        <div class="mx-auto max-w-6xl px-6">

            <!-- SECTION TITLE -->
            <div class="text-center mb-16">
                <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-10 text-center">Services</h2>
                <div class="mx-auto mt-4 h-1 w-24 rounded-full bg-[#884A83] opacity-40"></div>
            </div>

            <!-- CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Card 1 -->
                <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">

                    <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>
                    <div class="flex flex-col justify-between p-8 w-full">
                        <div>
                            <span class="inline-block bg-[#884A83]/10 text-[#884A83] text-[12px] font-semibold uppercase tracking-widest px-3 py-1 rounded-full mb-4">Work & Business</span>
                            <h3 class="text-[22px] font-bold text-[#884A83] mb-3 leading-snug">Visas for Work, Business & Investment</h3>
                            <p class="text-[15px] text-[#555] leading-relaxed">
                                We assist with sponsorship licence applications and visas for skilled workers, senior and specialist workers, expansion workers, innovator founders and global talent.
                            </p>
                        </div>
                        <a href=<?php echo home_url('/visas-for-work-business-investment/'); ?> class="mt-6 self-start inline-flex items-center gap-2 bg-[#884A83] text-white text-[14px] font-semibold px-5 py-2.5 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                            Learn more <span>→</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
               <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">

                    <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>
                    <div class="flex flex-col justify-between p-8 w-full">
                        <div>
                            <span class="inline-block bg-[#884A83]/10 text-[#884A83] text-[12px] font-semibold uppercase tracking-widest px-3 py-1 rounded-full mb-4">Personal</span>
                            <h3 class="text-[22px] font-bold text-[#884A83] mb-3 leading-snug">Visa For Individuals</h3>
                            <p class="text-[15px] text-[#555] leading-relaxed">
                                A comprehensive service for all UK personal immigration, including relationship visas, family members, private & family life, long residence and ILR and EUSS routes.
                            </p>
                        </div>
                        <a href="<?php echo home_url('/visa-for-individuals/'); ?>" class="mt-6 self-start inline-flex items-center gap-2 bg-[#884A83] text-white text-[14px] font-semibold px-5 py-2.5 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                            Learn more <span>→</span>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">

                    <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>
                    <div class="flex flex-col justify-between p-8 w-full">
                        <div>
                            <span class="inline-block bg-[#884A83]/10 text-[#884A83] text-[12px] font-semibold uppercase tracking-widest px-3 py-1 rounded-full mb-4">Citizenship</span>
                            <h3 class="text-[22px] font-bold text-[#884A83] mb-3 leading-snug">British Citizenship</h3>
                            <p class="text-[15px] text-[#555] leading-relaxed">
                                Applying for British citizenship can be complicated but with over 30 years experience, we are here to ensure success. Find out whether you are eligible to apply in our guides here.
                            </p>
                        </div>
                        <a href="<?php echo home_url('/british-citizenship/'); ?>" class="mt-6 self-start inline-flex items-center gap-2 bg-[#884A83] text-white text-[14px] font-semibold px-5 py-2.5 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                            Learn more <span>→</span>
                        </a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">

                    <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>
                    <div class="flex flex-col justify-between p-8 w-full">
                        <div>
                            <span class="inline-block bg-[#884A83]/10 text-[#884A83] text-[12px] font-semibold uppercase tracking-widest px-3 py-1 rounded-full mb-4">Appeals</span>
                            <h3 class="text-[22px] font-bold text-[#884A83] mb-3 leading-snug">Visa Refusals & Immigration Appeals</h3>
                            <p class="text-[15px] text-[#555] leading-relaxed">
                                If you've had an application refused, one of our specialist immigration appeal solicitors will guide you through the appeal, administrative review or judicial review process.
                            </p>
                        </div>

                        <a href="<?php echo home_url('/uk-visa-refusal/'); ?>" class="mt-6 self-start inline-flex items-center gap-2 bg-[#884A83] text-white text-[14px] font-semibold px-5 py-2.5 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                            Learn more <span>→</span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>
    

</main>

<?php get_footer(); ?>