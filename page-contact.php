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
    
<!-- HERO: short overview of the free consultation -->
  <section class="relative bg-white overflow-hidden">
    <div class="mx-auto max-w-[1100px] px-6 pt-12 pb-10 lg:pt-16 lg:pb-12 text-center">

        <!-- Eyebrow -->
        <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
            <?php echo esc_html($hero['eyebrow'] ?? 'Book Your Free Consultation'); ?>
        </p>

        <!-- Heading -->
        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-4">
            <?php echo wp_kses_post(nl2br(esc_html($hero['heading'] ?? 'Speak to a UK immigration expert today'))); ?>
        </h1>

        <!-- One-line overview -->
        <p class="text-[16px] lg:text-[18px] text-[#333333] mb-8 max-w-2xl mx-auto leading-[1.6]">
            <?php echo esc_html($hero['subheading'] ?? 'A free, no-obligation 20-minute call with a qualified solicitor.'); ?>
        </p>

        <!-- Inline 3-step preview -->
        <ol class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-2 mb-8">
            <li class="flex items-center gap-2">
                <span class="h-7 w-7 rounded-full bg-[#884A83] text-white text-[14px] font-bold flex items-center justify-center">1</span>
                <span class="text-[16px] lg:text-[18px] text-black">Submit your details</span>
            </li>
            <span class="hidden sm:inline text-[#884A83]">→</span>
            <li class="flex items-center gap-2">
                <span class="h-7 w-7 rounded-full bg-[#884A83] text-white text-[14px] font-bold flex items-center justify-center">2</span>
                <span class="text-[16px] lg:text-[18px] text-black">We call you back</span>
            </li>
            <span class="hidden sm:inline text-[#884A83]">→</span>
            <li class="flex items-center gap-2">
                <span class="h-7 w-7 rounded-full bg-[#884A83] text-white text-[14px] font-bold flex items-center justify-center">3</span>
                <span class="text-[16px] lg:text-[18px] text-black">Get a clear plan</span>
            </li>
        </ol>

        <!-- REVIEWS -->
        <div class="flex flex-col items-center gap-2">
            <div class="flex items-center gap-4">
                <?php if (!empty($hero['reviews_io_image'])): ?>
                    <img src="<?php echo esc_url($hero['reviews_io_image']); ?>" alt="Reviews.io rating" class="h-[45px] w-auto">
                <?php endif; ?>
                <?php if (!empty($hero['google_reviews_image'])): ?>
                    <img src="<?php echo esc_url($hero['google_reviews_image']); ?>" alt="Google reviews" class="h-[78px] w-auto">
                <?php endif; ?>
            </div>
            <p class="text-[16px] text-[#000000]">
                <?php echo esc_html($hero['reviews_text'] ?? 'Rated 4.9/5 from 515 verified reviews'); ?>
            </p>
        </div>

    </div>
  </section>

  <!-- FORM SECTION (moved below the hero) -->
  <section class="bg-[linear-gradient(270deg,#6D3B69_0.64%,#A3599D_99.11%)] py-12 lg:py-16">
    <div class="mx-auto max-w-[620px] px-6">
        <div class="bg-[#A3599D] rounded-3xl p-4 lg:p-6 shadow-lg">
            <h2 class="text-center text-white font-bold text-[26px] lg:text-[30px] mb-6">
                <?php echo esc_html($hero['form_heading'] ?? 'Request a callback from our immigration experts'); ?>
            </h2>
            <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
        </div>
    </div>
  </section>

    <!-- TRUST STRIP -->
    <section class="bg-[#6D3B69] py-10 lg:py-12">
        <div class="mx-auto max-w-[1200px] px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">

                <div class="flex flex-col items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <p class="text-[16px] lg:text-[18px] font-semibold leading-tight">SRA-regulated solicitors</p>
                    <p class="text-[14px] text-white/80 leading-tight">Reg No. 00380691</p>
                </div>

                <div class="flex flex-col items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <p class="text-[16px] lg:text-[18px] font-semibold leading-tight">20+ years' experience</p>
                    <p class="text-[14px] text-white/80 leading-tight">UK immigration specialists</p>
                </div>

                <div class="flex flex-col items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    <p class="text-[16px] lg:text-[18px] font-semibold leading-tight">Free &amp; no-obligation</p>
                    <p class="text-[14px] text-white/80 leading-tight">No fees, no pressure</p>
                </div>

                <div class="flex flex-col items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <p class="text-[16px] lg:text-[18px] font-semibold leading-tight">Strictly confidential</p>
                    <p class="text-[14px] text-white/80 leading-tight">Protected by solicitor privilege</p>
                </div>

            </div>
        </div>
    </section>

    <!-- WHAT WE'LL COVER -->
    <section class="bg-white py-14 lg:py-16">
        <div class="mx-auto max-w-[900px] px-6">
            <h2 class="text-center text-[28px] lg:text-[32px] font-semibold text-black mb-10">
                What you'll get from the call
            </h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-4">
                <li class="flex items-center gap-3">
                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <p class="text-[16px] lg:text-[18px] text-black">An honest view of your options</p>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <p class="text-[16px] lg:text-[18px] text-black">A realistic timeline</p>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <p class="text-[16px] lg:text-[18px] text-black">A transparent fee estimate</p>
                </li>
                <li class="flex items-center gap-3">
                    <span class="flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <p class="text-[16px] lg:text-[18px] text-black">A clear next step</p>
                </li>
            </ul>
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