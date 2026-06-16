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
                        <?php echo esc_html($hero['eyebrow'] ?? 'Book Your Free Consultation'); ?>
                    </p>

                    <!-- Heading -->
                    <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                        <?php echo wp_kses_post(nl2br(esc_html($hero['heading'] ?? "Speak to a UK immigration\nexpert today"))); ?>
                    </h1>

                    <!-- Sub-heading: assurance line -->
                    <p class="text-[16px] lg:text-[18px] text-[#333333] mb-6 leading-[1.6]">
                        <?php echo esc_html($hero['subheading'] ?? 'A free, no-obligation 20-minute call with a qualified immigration solicitor. Honest advice, a clear next step, and full confidentiality — guaranteed.'); ?>
                    </p>

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

    <!-- HOW IT WORKS -->
    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-[1200px] px-6">
            <div class="text-center mb-12">
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                    Simple, no-pressure process
                </p>
                <h2 class="text-[32px] lg:text-[36px] font-semibold text-black mb-4">
                    How your free consultation works
                </h2>
                <p class="text-[16px] lg:text-[18px] text-[#333333] max-w-2xl mx-auto leading-[1.7]">
                    Three short steps from request to clear advice. No fees, no commitment, no jargon.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

                <!-- STEP 1 -->
                <div class="relative bg-[#F9F4F8] rounded-2xl p-8 lg:p-10 text-center border border-[#E8D9E6]">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 h-12 w-12 rounded-full bg-[#884A83] text-white text-[20px] font-bold flex items-center justify-center shadow">
                        1
                    </div>
                    <div class="mt-2 mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-3">
                        Tell us about your case
                    </h3>
                    <p class="text-[16px] text-[#333333] leading-[1.6]">
                        Fill in the short form (takes under a minute) or call us directly. Share what you need — visa type, timeline, anything urgent.
                    </p>
                </div>

                <!-- STEP 2 -->
                <div class="relative bg-[#F9F4F8] rounded-2xl p-8 lg:p-10 text-center border border-[#E8D9E6]">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 h-12 w-12 rounded-full bg-[#884A83] text-white text-[20px] font-bold flex items-center justify-center shadow">
                        2
                    </div>
                    <div class="mt-2 mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2a9 9 0 0 1 9 9"></path>
                            <path d="M13 6a5 5 0 0 1 5 5"></path>
                            <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                        </svg>
                    </div>
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-3">
                        We call you back
                    </h3>
                    <p class="text-[16px] text-[#333333] leading-[1.6]">
                        A qualified immigration solicitor calls you at a time that suits you, typically within one working day. 20 minutes, by phone or video.
                    </p>
                </div>

                <!-- STEP 3 -->
                <div class="relative bg-[#F9F4F8] rounded-2xl p-8 lg:p-10 text-center border border-[#E8D9E6]">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 h-12 w-12 rounded-full bg-[#884A83] text-white text-[20px] font-bold flex items-center justify-center shadow">
                        3
                    </div>
                    <div class="mt-2 mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 11l3 3L22 4"></path>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                    </div>
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-3">
                        Get a clear plan
                    </h3>
                    <p class="text-[16px] text-[#333333] leading-[1.6]">
                        Walk away with honest advice, an upfront fee estimate, and the next steps. Whether you instruct us or not is entirely your call.
                    </p>
                </div>

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
    <section class="bg-white py-16 lg:py-20">
        <div class="mx-auto max-w-[1100px] px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <!-- LEFT: Heading + intro -->
                <div>
                    <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                        What you'll get from the call
                    </p>
                    <h2 class="text-[32px] lg:text-[36px] font-semibold text-black mb-5 leading-tight">
                        A clear answer, not a sales pitch
                    </h2>
                    <p class="text-[16px] lg:text-[18px] text-[#333333] leading-[1.7] mb-6">
                        Our consultations are designed to give you a useful, honest assessment of your situation — even if we're not the right firm to help. You'll come away knowing where you stand and what to do next.
                    </p>
                    <p class="text-[14px] lg:text-[16px] text-[#666666] italic leading-[1.6]">
                        Nothing in this call is recorded or shared. Everything you tell us is covered by solicitor–client confidentiality from the first minute.
                    </p>
                </div>

                <!-- RIGHT: Checklist -->
                <div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[18px] font-semibold text-black mb-1">An honest view of your options</p>
                                <p class="text-[16px] text-[#333333] leading-[1.5]">Which visa routes apply, the likely strength of your application, and any risks we can spot upfront.</p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-1 flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[18px] font-semibold text-black mb-1">A realistic timeline</p>
                                <p class="text-[16px] text-[#333333] leading-[1.5]">How long the process typically takes, what stages to expect, and where delays usually happen.</p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-1 flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[18px] font-semibold text-black mb-1">A transparent fee estimate</p>
                                <p class="text-[16px] text-[#333333] leading-[1.5]">If you instruct us, you'll know what it costs upfront — fixed fees wherever possible, no surprises.</p>
                            </div>
                        </li>

                        <li class="flex items-start gap-3">
                            <span class="mt-1 flex-shrink-0 h-6 w-6 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </span>
                            <div>
                                <p class="text-[18px] font-semibold text-black mb-1">Your next concrete step</p>
                                <p class="text-[16px] text-[#333333] leading-[1.5]">Whether you instruct us or not, you'll leave the call with a clear, actionable next step.</p>
                            </div>
                        </li>
                    </ul>
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