<?php
/**
 * Template Name: Contact Us
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<?php $hero = get_field('contact_hero'); ?>
<?php $location = get_field('contact_location'); ?>
    
<!-- HERO SECTION -->
  <section class="relative bg-white overflow-hidden mb-10">
    <div class="mx-auto py-10 lg:w-[1440px]">
        <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">

            <!-- LEFT CONTENT -->
            <div class="px-6 lg:pl-[165px] lg:pr-8">
                <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">

                    <!-- Eyebrow -->
                    <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                        <?php echo esc_html($hero['eyebrow'] ?? 'Connect with Us'); ?>
                    </p>

                    <!-- Heading -->
                    <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                        <?php echo wp_kses_post(nl2br(esc_html($hero['heading'] ?? "info@rlegal.com\n0207 038 3880"))); ?>
                    </h1>

                    <!-- CTA -->
                    <div class="flex justify-center lg:justify-start">
                        <?php if (!empty($hero['cta'])): 
                            $cta = $hero['cta'];
                        ?>
                        <a href="<?php echo esc_url($cta['url']); ?>"
                           target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>"
                           class="inline-flex items-center gap-2
                                  rounded-lg bg-[#4A884F]
                                  px-5 py-2.5
                                  text-[16px] lg:text-[18px] font-semibold text-white
                                  hover:bg-[#3d7242] transition">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4 stroke-white">
                                <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                            </svg>

                            <?php echo esc_html($cta['title']); ?>
                        </a>
                        <?php endif; ?>
                    </div>

                    <!-- REVIEWS -->
                    <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                        <div class="flex items-center gap-4">

                            <?php if (!empty($hero['reviews_io_image'])): ?>
                                <img src="<?php echo esc_url($hero['reviews_io_image']); ?>"
                                     alt="Reviews.io rating"
                                     class="h-[45px] w-auto">
                            <?php endif; ?>

                            <?php if (!empty($hero['google_reviews_image'])): ?>
                                <img src="<?php echo esc_url($hero['google_reviews_image']); ?>"
                                     alt="Google reviews"
                                     class="h-[78px] w-auto">
                            <?php endif; ?>

                        </div>

                        <p class="text-[16px] text-[#000000]">
                            <?php echo esc_html($hero['reviews_text'] ?? 'Rated 4.9/5 from 515 verified reviews'); ?>
                        </p>
                    </div>

                </div>
            </div>

            <?php
            $thumbnail = get_the_post_thumbnail_url();
            if ($thumbnail) {
                $thumbnail = "style=\" background-image: linear-gradient(270deg, rgba(109,59,105,0.7) 0.64%, rgba(255,255,255,1) 100%), url('$thumbnail'); background-size: cover; background-position: center; background-repeat: no-repeat; \" ";
            } else {
                $thumbnail = '';
            }
            ?>

            <!-- RIGHT SIDE -->
            <div class="relative flex items-center order-1 lg:order-2
                min-h-[500px] lg:min-h-[550px]
                mx-6 lg:mx-0
                lg:bg-[linear-gradient(270deg,#6D3B69_0.64%,#FFFFFF_99.11%)] hero-form-container"
                <?php echo $thumbnail; ?>>

                <div class="w-[550px] flex justify-center lg:justify-end px-0 lg:pr-[10px] lg:pl-[135px]">
                    <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-[470px] w-full">

                        <!-- Form Heading -->
                        <h3 class="text-center text-white font-bold text-[30px] mb-6">
                            <?php echo esc_html($hero['form_heading'] ?? 'Request a callback from our immigration experts'); ?>
                        </h3>

                        <!-- Form -->
                        <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>

                    </div>
                </div>

            </div>

        </div>
    </div>
  </section>

    <!-- LOCATION SECTION -->
    <section class="py-16 bg-[#F9F9F9] lg:min-h-[623px]">
        <div class="mx-auto max-w-5xl px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- LEFT CONTENT -->
                <div class="max-w-md">

                    <!-- Heading -->
                    <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#A3599D] mb-[36px]">
                        <?php echo esc_html($location['heading'] ?? 'Where to find us'); ?>
                    </h2>

                    <!-- Address -->
                    <p class="text-[24px] lg:text-[30px] leading-relaxed text-[#000000] mb-[44px]">
                        <?php echo nl2br(esc_html($location['location_address'] ?? '')); ?>
                    </p>


                    <!-- Button -->
                    <?php if (!empty($location['map_link'])): ?>
                        <a href="<?php echo esc_url($location['map_link']); ?>"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-[15px] bg-[#884A83] px-5 py-2.5 lg:w-[220px] text-[18px] text-white font-bold transition duration-200 hover:bg-[#7a4275]">
                            Get Directions
                        </a>
                    <?php endif; ?>

                </div>

                <!-- RIGHT MAP -->
                <div class="w-full aspect-[4/3] lg:aspect-auto lg:w-[602px] lg:h-[450px] rounded-lg overflow-hidden">

                    <?php
                    $iframe_src = $location['iframe_src'] ?? '';
                    ?>

                    <?php if (!empty($iframe_src)): ?>
                        <iframe 
                            src="<?php echo esc_url($iframe_src); ?>"
                            width="600"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    <?php else: ?>
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.061106840687!2d-0.14201072364932948!3d51.512094910360716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d5a1c8235d%3A0x65a64559005db2e5!2sRLegal%20Solicitors%20London!5e0!3m2!1sen!2sin!4v1770874856574!5m2!1sen!2sin"
                            width="600"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>


<?php get_footer(); ?>