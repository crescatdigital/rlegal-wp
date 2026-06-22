<?php
/*
 * Template Name: Free Consultation
 * Description: Dedicated landing page for the Free Consultation CTA.
 *
 * Layout lives in assets/css/free-consultation.css and the booking
 * calendar in assets/js/booking-calendar.js — both enqueued conditionally
 * from functions.php for this template.
 */
get_header();

$fc = function_exists('get_field') ? get_field('free_consultation') : null;
?>

<main class="flex-grow fc-main">

    <!-- ============================================================
         HOW IT WORKS — page lead, 3 across on desktop
         ============================================================ -->
    <section class="fc-steps-section fc-steps-section--lead">
        <div class="fc-steps-section__head">
            <p class="fc-steps-section__eyebrow">
                <?php echo esc_html( $fc['eyebrow'] ?? 'Free Consultation' ); ?>
            </p>
            <h1 class="fc-steps-section__title">
                <?php echo esc_html( $fc['steps_heading'] ?? 'How your free consultation works' ); ?>
            </h1>
            <p class="fc-steps-section__sub">
                <?php echo esc_html( $fc['steps_sub'] ?? 'Book a free, no-obligation call with a qualified solicitor — honest advice, a realistic timeline and a clear next step.' ); ?>
            </p>
        </div>

        <div class="fc-steps">

            <div class="fc-step">
                <div class="fc-step__num">1</div>
                <div class="fc-step__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="9" y1="13" x2="15" y2="13"></line>
                        <line x1="9" y1="17" x2="13" y2="17"></line>
                    </svg>
                </div>
                <h3 class="fc-step__title">Pick a day &amp; time</h3>
                <p class="fc-step__text">Choose a weekday slot that suits you and add a few details — it takes under a minute.</p>
            </div>

            <div class="fc-step">
                <div class="fc-step__num">2</div>
                <div class="fc-step__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M13 2a9 9 0 0 1 9 9"></path>
                        <path d="M13 6a5 5 0 0 1 5 5"></path>
                        <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                    </svg>
                </div>
                <h3 class="fc-step__title">We get in touch</h3>
                <p class="fc-step__text">A qualified immigration solicitor contacts you at your chosen time — by phone or email.</p>
            </div>

            <div class="fc-step">
                <div class="fc-step__num">3</div>
                <div class="fc-step__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#884A83" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 11l3 3L22 4"></path>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                </div>
                <h3 class="fc-step__title">Get a clear plan</h3>
                <p class="fc-step__text">Honest advice, an upfront fee estimate and concrete next steps — with no obligation.</p>
            </div>

        </div>
    </section>

    <!-- ============================================================
         CENTRAL FORM
         ============================================================ -->
    <section id="book" class="fc-form">
        <div class="fc-form__inner">
            <div class="fc-form__card">
                <?php
                /*
                 * The "Free Consultation Booking" CF7 form (ID 929) must contain the
                 * [data-ri-booking] block — the calendar + 2-hour time-block picker in
                 * assets/js/booking-calendar.js only renders when that markup is present.
                 */
                echo do_shortcode('[contact-form-7 id="929" title="Free Consultation Booking"]');
                ?>
            </div>

            <p class="fc-form__foot">Your details are held in confidence and never shared.</p>
        </div>
    </section>

    <!-- ============================================================
         SOCIAL PROOF + ASSURANCES (relocated below the form)
         ============================================================ -->
    <section class="fc-proof">
        <div class="fc-hero__reviews">
            <div class="fc-hero__reviews-imgs">
                <img class="io" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp" alt="Reviews.io rating">
                <img class="g" src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp" alt="Google reviews">
            </div>
            <p class="fc-hero__reviews-text">
                <?php echo esc_html( $fc['reviews_text'] ?? 'Rated 4.9/5 from 515 verified reviews' ); ?>
            </p>
        </div>

        <div class="fc-assurance">
            <span class="fc-assurance__item"><span class="fc-assurance__dot"></span>20-minute call</span>
            <span class="fc-assurance__item"><span class="fc-assurance__dot"></span>Completely free</span>
            <span class="fc-assurance__item"><span class="fc-assurance__dot"></span>Solicitor-led</span>
            <span class="fc-assurance__item"><span class="fc-assurance__dot"></span>Strictly confidential</span>
        </div>
    </section>

    <!-- ============================================================
         TRUST STRIP — 4 across on desktop
         ============================================================ -->
    <section class="fc-trust">
        <div class="fc-trust__grid">

            <div class="fc-trust__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <p class="fc-trust__label">SRA-regulated</p>
            </div>

            <div class="fc-trust__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <p class="fc-trust__label">20+ years' experience</p>
            </div>

            <div class="fc-trust__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <p class="fc-trust__label">No-obligation advice</p>
            </div>

            <div class="fc-trust__item">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <p class="fc-trust__label">Strictly confidential</p>
            </div>

        </div>
    </section>

    <!-- ============================================================
         CONSULTATION FAQ (global accordion handles toggling)
         ============================================================ -->
    <section class="bg-[#9A5B9D] py-14">
        <div class="mx-auto max-w-3xl px-6">
            <h2 class="text-center text-[28px] lg:text-[36px] font-semibold text-white mb-10">
                Questions about the consultation
            </h2>

            <div class="space-y-4">

                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button" class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[20px] font-semibold text-white bg-[#6D3B69]" aria-expanded="true">
                        <span class="max-w-[90%]">Is it really free, with no obligation?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↑</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] block">
                        <p>Yes — completely. There's no fee, no commitment and no pressure. If we're not the right firm to help, we'll tell you that too.</p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button" class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[20px] font-semibold text-white bg-[#6D3B69]" aria-expanded="false">
                        <span class="max-w-[90%]">How long does it take and who will I speak to?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>About 20 minutes. You'll always speak to a qualified immigration solicitor — never a call handler or a sales rep.</p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button" class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[20px] font-semibold text-white bg-[#6D3B69]" aria-expanded="false">
                        <span class="max-w-[90%]">Do I have to give my phone number?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>No — it's optional. Share it if you'd like a lawyer to call you back; otherwise leave it blank and we'll reply to your email instead.</p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button" class="accordion-trigger w-full flex items-center justify-between p-4 text-left text-[18px] lg:text-[20px] font-semibold text-white bg-[#6D3B69]" aria-expanded="false">
                        <span class="max-w-[90%]">Is what I share confidential?</span>
                        <span class="accordion-icon flex lg:h-[44px] lg:w-[44px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[20px]">↓</span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-5 text-[15px] lg:text-[17px] leading-[1.7] text-[#333333] hidden">
                        <p>Yes — everything you tell us is covered by solicitor–client confidentiality from the first minute, and nothing is recorded or shared.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
         PHONE FALLBACK
         ============================================================ -->
    <?php $ri_phone = function_exists('get_ri_field') ? get_ri_field( 'phone_number', '0207 038 3880', 'option' ) : '0207 038 3880'; ?>
    <section class="fc-phone">
        <p class="fc-phone__lead">Prefer to talk now?</p>
        <a class="fc-phone__num" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ri_phone ) ); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M13 2a9 9 0 0 1 9 9"></path>
                <path d="M13 6a5 5 0 0 1 5 5"></path>
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
            </svg>
            <?php echo esc_html( $ri_phone ); ?>
        </a>
        <p class="fc-phone__hours">Mon–Fri, 9am–6pm</p>
    </section>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>
