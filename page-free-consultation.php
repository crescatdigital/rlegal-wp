<?php
/*
 * Template Name: Free Consultation
 * Description: Dedicated landing page for the Free Consultation CTA.
 */
get_header();

$fc = function_exists('get_field') ? get_field('free_consultation') : null;
?>

<main class="flex-grow">

    <!-- ============================================================
         HERO: short overview of the free consultation
         (text left, stat panel right — no form, no CTA)
         ============================================================ -->
    <section class="relative bg-white overflow-hidden">
        <div class="mx-auto py-10 lg:py-14 max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-10 lg:gap-0 items-center">

                <!-- LEFT: copy -->
                <div class="px-6 lg:pl-[165px] lg:pr-8 order-2 lg:order-1">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">

                        <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                            <?php echo esc_html( $fc['eyebrow'] ?? 'Free Consultation' ); ?>
                        </p>

                        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-5">
                            <?php echo wp_kses_post( nl2br( esc_html( $fc['heading'] ?? "A free, no-obligation call\nwith a UK immigration solicitor" ) ) ); ?>
                        </h1>

                        <p class="text-[16px] lg:text-[18px] text-[#333333] leading-[1.7] mb-6">
                            <?php echo esc_html( $fc['intro'] ?? 'Tell us about your situation and we\'ll call you back with honest advice, a realistic timeline, and a clear next step. Whether you instruct us or not is entirely your call.' ); ?>
                        </p>

                        <!-- Reviews -->
                        <div class="flex flex-col items-center lg:items-start gap-2">
                            <div class="flex items-center gap-4">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating" class="h-[45px] w-auto">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews" class="h-[78px] w-auto">
                            </div>
                            <p class="text-[16px] text-[#000000]">
                                <?php echo esc_html( $fc['reviews_text'] ?? 'Rated 4.9/5 from 515 verified reviews' ); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: stat panel -->
                <div class="order-1 lg:order-2 px-6 lg:px-0">
                    <div class="relative mx-auto lg:ml-auto lg:mr-[60px] w-full max-w-[560px]
                                bg-[linear-gradient(135deg,#6D3B69_0%,#A3599D_100%)]
                                rounded-3xl shadow-xl p-8 lg:p-10 text-white">

                        <!-- Badge -->
                        <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#4A884F] text-white text-[14px] lg:text-[15px] font-bold tracking-wide uppercase px-4 py-1.5 rounded-full shadow">
                            100% Free
                        </span>

                        <h2 class="text-center text-[22px] lg:text-[26px] font-semibold mb-6 mt-2">
                            What's included
                        </h2>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="text-center bg-white/10 rounded-2xl py-5 px-3">
                                <p class="text-[34px] lg:text-[40px] font-bold leading-none mb-1">20</p>
                                <p class="text-[13px] lg:text-[14px] uppercase tracking-wide text-white/90">Minute call</p>
                            </div>
                            <div class="text-center bg-white/10 rounded-2xl py-5 px-3">
                                <p class="text-[34px] lg:text-[40px] font-bold leading-none mb-1">£0</p>
                                <p class="text-[13px] lg:text-[14px] uppercase tracking-wide text-white/90">Fees, ever</p>
                            </div>
                            <div class="text-center bg-white/10 rounded-2xl py-5 px-3">
                                <p class="text-[34px] lg:text-[40px] font-bold leading-none mb-1">1<span class="text-[20px] align-top ml-1">day</span></p>
                                <p class="text-[13px] lg:text-[14px] uppercase tracking-wide text-white/90">Typical callback</p>
                            </div>
                            <div class="text-center bg-white/10 rounded-2xl py-5 px-3">
                                <p class="text-[34px] lg:text-[40px] font-bold leading-none mb-1">100%</p>
                                <p class="text-[13px] lg:text-[14px] uppercase tracking-wide text-white/90">Confidential</p>
                            </div>
                        </div>

                        <p class="text-center text-[14px] text-white/85 mt-6 leading-relaxed">
                            By phone or video — at a time that suits you.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         TRUST STRIP
         ============================================================ -->
    <section class="bg-[#6D3B69] py-8 lg:py-10">
        <div class="mx-auto max-w-[1200px] px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 text-center text-white">

                <div class="flex flex-col items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <p class="text-[15px] lg:text-[17px] font-semibold leading-tight">SRA-regulated</p>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <p class="text-[15px] lg:text-[17px] font-semibold leading-tight">20+ years' experience</p>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <p class="text-[15px] lg:text-[17px] font-semibold leading-tight">No-obligation advice</p>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <p class="text-[15px] lg:text-[17px] font-semibold leading-tight">Strictly confidential</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         HOW IT WORKS
         ============================================================ -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-[1200px] px-6">

            <div class="text-center mb-12">
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-2">
                    Simple, three-step process
                </p>
                <h2 class="text-[28px] lg:text-[36px] font-semibold text-black">
                    How your free consultation works
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

                <!-- STEP 1 -->
                <div class="relative bg-[#F9F4F8] rounded-2xl p-8 lg:p-10 text-center border border-[#E8D9E6]">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 h-12 w-12 rounded-full bg-[#884A83] text-white text-[20px] font-bold flex items-center justify-center shadow">
                        1
                    </div>
                    <div class="mt-2 mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="9" y1="13" x2="15" y2="13"></line>
                            <line x1="9" y1="17" x2="13" y2="17"></line>
                        </svg>
                    </div>
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-2">
                        Tell us about your case
                    </h3>
                    <p class="text-[15px] lg:text-[16px] text-[#333333] leading-[1.6]">
                        A 60-second form — your name, the best time to call, and one line about your situation.
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
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-2">
                        We call you back
                    </h3>
                    <p class="text-[15px] lg:text-[16px] text-[#333333] leading-[1.6]">
                        A qualified immigration solicitor, typically within one working day. Phone or video — your choice.
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
                    <h3 class="text-[20px] lg:text-[22px] font-semibold text-[#6D3B69] mb-2">
                        Get a clear plan
                    </h3>
                    <p class="text-[15px] lg:text-[16px] text-[#333333] leading-[1.6]">
                        Honest advice, an upfront fee estimate, and concrete next steps — whether you instruct us or not.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         BOOKING FORM
         ============================================================ -->
    <section id="book" class="bg-[#F9F4F8] py-14 lg:py-20">
        <div class="mx-auto max-w-[640px] px-6">

            <div class="text-center mb-8">
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-2">
                    Book your call
                </p>
                <h2 class="text-[28px] lg:text-[36px] font-semibold text-black mb-3">
                    Request your free consultation
                </h2>
                <p class="text-[16px] text-[#333333] leading-[1.6]">
                    Takes under a minute. We'll call you back to confirm a time.
                </p>
            </div>

            <div class="bg-[#A3599D] rounded-3xl p-5 lg:p-8 shadow-xl">
                <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
            </div>

            <p class="text-center text-[14px] text-[#666666] mt-5">
                Your information is held in confidence and never shared.
            </p>
        </div>
    </section>

    <!-- ============================================================
         WHAT WE'LL COVER
         ============================================================ -->
    <section class="bg-white py-14 lg:py-20">
        <div class="mx-auto max-w-[1100px] px-6">

            <div class="text-center mb-10">
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-2">
                    What you'll get from the call
                </p>
                <h2 class="text-[28px] lg:text-[36px] font-semibold text-black">
                    A clear answer, not a sales pitch
                </h2>
            </div>

            <ul class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-6">

                <li class="flex items-start gap-4 bg-[#F9F9F9] rounded-xl p-5 lg:p-6">
                    <span class="mt-0.5 flex-shrink-0 h-8 w-8 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <div>
                        <p class="text-[18px] font-semibold text-black mb-1">An honest view of your options</p>
                        <p class="text-[15px] text-[#555555] leading-[1.5]">Which visa routes apply and the strength of your application.</p>
                    </div>
                </li>

                <li class="flex items-start gap-4 bg-[#F9F9F9] rounded-xl p-5 lg:p-6">
                    <span class="mt-0.5 flex-shrink-0 h-8 w-8 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <div>
                        <p class="text-[18px] font-semibold text-black mb-1">A realistic timeline</p>
                        <p class="text-[15px] text-[#555555] leading-[1.5]">How long the process usually takes and where delays happen.</p>
                    </div>
                </li>

                <li class="flex items-start gap-4 bg-[#F9F9F9] rounded-xl p-5 lg:p-6">
                    <span class="mt-0.5 flex-shrink-0 h-8 w-8 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <div>
                        <p class="text-[18px] font-semibold text-black mb-1">A transparent fee estimate</p>
                        <p class="text-[15px] text-[#555555] leading-[1.5]">Fixed fees wherever possible, with no surprises down the line.</p>
                    </div>
                </li>

                <li class="flex items-start gap-4 bg-[#F9F9F9] rounded-xl p-5 lg:p-6">
                    <span class="mt-0.5 flex-shrink-0 h-8 w-8 rounded-full bg-[#4A884F] text-white flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </span>
                    <div>
                        <p class="text-[18px] font-semibold text-black mb-1">A concrete next step</p>
                        <p class="text-[15px] text-[#555555] leading-[1.5]">You'll leave the call knowing exactly what to do next.</p>
                    </div>
                </li>

            </ul>
        </div>
    </section>

    <!-- ============================================================
         CONSULTATION FAQ
         ============================================================ -->
    <section class="bg-[#9A5B9D] py-14 lg:py-16">
        <div class="mx-auto max-w-3xl px-6">
            <h2 class="text-center text-[28px] lg:text-[36px] font-semibold text-white mb-10">
                Questions about the consultation
            </h2>

            <div class="space-y-4">

                <!-- Q1 -->
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button"
                        class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[22px] font-semibold text-white bg-[#6D3B69]"
                        aria-expanded="true">
                        <span class="max-w-[90%]">Is it really free, with no obligation?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↑</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] block">
                        <p>Yes — completely. There's no fee, no commitment, and no pressure. If we're not the right firm to help, we'll tell you that too.</p>
                    </div>
                </div>

                <!-- Q2 -->
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button"
                        class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[22px] font-semibold text-white bg-[#6D3B69]"
                        aria-expanded="false">
                        <span class="max-w-[90%]">How long does the call take, and who will I speak to?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>About 20 minutes. You'll always speak to a qualified immigration solicitor — never a call handler or a sales rep.</p>
                    </div>
                </div>

                <!-- Q3 -->
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button"
                        class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[22px] font-semibold text-white bg-[#6D3B69]"
                        aria-expanded="false">
                        <span class="max-w-[90%]">What should I have ready before the call?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>Nothing formal — just an idea of your situation, your timeline, and any deadlines. If you have prior visa decisions or refusals, having them to hand helps but isn't required.</p>
                    </div>
                </div>

                <!-- Q4 -->
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button"
                        class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[22px] font-semibold text-white bg-[#6D3B69]"
                        aria-expanded="false">
                        <span class="max-w-[90%]">Is what I share confidential?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>Yes — everything you tell us is covered by solicitor–client confidentiality from the first minute, and nothing is recorded or shared.</p>
                    </div>
                </div>

            </div>
        </div>
        <script src="/scripts/accordion.js"></script>
    </section>

    <!-- ============================================================
         PHONE FALLBACK
         ============================================================ -->
    <?php $ri_phone = function_exists('get_ri_field') ? get_ri_field( 'phone_number', '0207 038 3880', 'option' ) : '0207 038 3880'; ?>
    <section class="bg-white py-10 lg:py-12">
        <div class="mx-auto max-w-[800px] px-6 text-center">
            <p class="text-[18px] lg:text-[22px] text-[#333333] mb-3">
                Prefer to talk now?
            </p>
            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ri_phone ) ); ?>"
                class="inline-flex items-center gap-2 text-[24px] lg:text-[32px] font-bold text-[#884A83] hover:text-[#6D3B69] transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M13 2a9 9 0 0 1 9 9"></path>
                    <path d="M13 6a5 5 0 0 1 5 5"></path>
                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                </svg>
                <?php echo esc_html( $ri_phone ); ?>
            </a>
            <p class="text-[14px] text-[#666666] mt-3">
                Mon–Fri, 9am–6pm
            </p>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>
