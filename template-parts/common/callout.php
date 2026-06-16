<?php
/**
 * Callout section with request form and clear-advice content
 */
?>
<section class="py-20 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:pl-[60px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-[100px] items-start">
            <!-- LEFT: FORM CARD -->
            <div
                class="bg-[#A3599D] rounded-3xl p-3 pt-4  w-full lg:pt-[44px] lg:p-10 lg:w-[618px] lg:h-[500px] callout__form"
            >
                <h3 class="text-center text-white font-bold text-[20px] mb-2 lg:text-[32px]">
                    <?php echo esc_html( get_ri_field( 'form_request_title', 'Request a callback from our immigration
                    experts' ) ); ?>
                </h3>
                <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
            </div>

            <!-- RIGHT: CONTENT -->
            <div class="max-w-xl">
                <?php $heading = get_ri_field( 'clear_advice_heading' ); if ( ! $heading ) { $heading = get_ri_field(
                'services_clear_advice_heading' ); } if ( ! $heading ) { $heading = 'Clear, honest advice with a bespoke
                strategy for your case'; } ?>
                <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-6">
                    <?php echo esc_html( $heading ); ?>
                </h2>
            
                <!-- BULLETS -->
                <?php
                /*
                <ul class="space-y-2 mb-[27px]">
                    <?php $usps = get_ri_field( 'clear_advice_usps', false ); if ( ! $usps ) { $usps = get_ri_field(
                    'services_clear_advice_usps', array() ); } if ( ! empty( $usps ) ) { foreach ( $usps as $usp ) {
                    $text = isset( $usp['usp_text'] ) ? $usp['usp_text'] : ''; if ( ! $text ) { continue; } ?>
                    <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                        <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span
                        ><?php echo esc_html( $text ); ?>
                    </li>
                    <?php } } ?>
                </ul>
                */
                ?>
                
                <?php if ( is_page_template('page-news.php') ) : ?>
                    
                <!-- <ul class="space-y-2 mb-[27px]">
                    <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                        <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span>
                        Clear Solution
                    </li>
                    <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                        <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span>
                        Honest Advice
                    </li>
                    <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                        <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span>
                        Bespoke Strategy
                    </li>
                </ul> -->
                <?php
                    $page_id =  get_queried_object_id();
                ?>
                <?php if ( have_rows('benefits_list', $page_id) ) : ?>
                    <ul class="space-y-2 mb-[27px]">
                        <?php while ( have_rows('benefits_list', $page_id) ) : the_row(); ?>
                            <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                                <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span>
                                <?php echo esc_html( get_sub_field('benefit_text') ); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            <?php else : ?>

                <ul class="space-y-2 mb-[27px]">
                <?php

                if ( is_singular('post') ) {
                    $usps = get_field('single_post_usps');
                } else {
                    $usps = get_ri_field( 'clear_advice_usps', false );

                    if ( ! $usps ) {
                        $usps = get_ri_field( 'services_clear_advice_usps', array() );
                    }
                }

                if ( ! empty( $usps ) ) {
                    foreach ( $usps as $usp ) {
                        $text = isset( $usp['usp_text'] ) ? $usp['usp_text'] : '';
                        if ( ! $text ) { continue; }
                ?>
                    <li class="flex items-center gap-2 text-[22px] lg:text-[26px] text-[#000000]">
                        <span class="h-[22px] w-[22px] rounded-full bg-[#6D3B69]"></span>
                        <?php echo esc_html( $text ); ?>
                    </li>
                <?php
                    }
                }
                ?>
                </ul>

            <?php endif; ?>
                
                <!-- CTAS -->
                <?php $phone = get_ri_field( 'phone_number', '0207 038 3880', 'option' ); $hero_cta_text = get_ri_field(
                'hero_cta_text', '', 'option' ); if ( ! $hero_cta_text ) { $hero_cta_text = get_ri_field(
                'hero_cta_text', get_ri_field( 'about_cta_text', 'Free Consultation' ) ); } $hero_cta_link =
                get_ri_field( 'hero_cta_link', '', 'option' ); if ( ! $hero_cta_link ) { $hero_cta_link = get_ri_field(
                'hero_cta_link', '#consultation' ); } 
                ?>


                <div class="flex items-center justify-center lg:justify-start gap-2 mb-10">
                    <a
                        href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"
                        class="inline-flex items-center lg:rounded-[15px] rounded-2xl bg-[#4A884F] lg:px-4 px-3 py-2 lg:text-[18px] text-[16px] text-white hover:bg-[#4A884F]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-phone-call h-4 w-6 fill-white pr-2"
                        >
                            <path d="M13 2a9 9 0 0 1 9 9"></path>
                            <path d="M13 6a5 5 0 0 1 5 5"></path>
                            <path
                                d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"
                            ></path>
                        </svg>
                        <?php echo esc_html( $phone ); ?>
                    </a>
                    
                    <a
                        href="<?php echo esc_attr( $hero_cta_link ); ?>"
                        class="inline-flex items-center lg:rounded-[15px] rounded-2xl bg-[#884A83] lg:px-4 px-3 py-2 lg:text-[18px] text-[16px] text-white hover:bg-[#884A83]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-messages-square h-4 w-6 stroke-white pr-2"
                        >
                            <path
                                d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"
                            ></path>
                            <path
                                d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"
                            ></path>
                        </svg>
                        <?php echo esc_html( $hero_cta_text ); ?>
                    </a>
                </div>

                <!-- TRUST -->
                <div class="flex items-start gap-6">
                    <?php $trust1 = get_ri_field( 'trust_image_1', '', 'option' ); $trust2 = get_ri_field(
                    'trust_image_2', '', 'option' ); ?> <?php if ( $trust1 ) : ?>
                    <img
                        src="<?php echo esc_url( $trust1 ); ?>"
                        alt="Trust image 1"
                        class="h-[110px] w-auto object-contain"
                    />
                    <?php endif; ?> <?php if ( $trust2 ) : ?>
                    <img
                        src="<?php echo esc_url( $trust2 ); ?>"
                        alt="Trust image 2"
                        class="h-[110px] w-auto object-contain"
                    />
                    <?php endif; ?>
                    <div>
                        <div class="flex items-center gap-3">
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp' ); ?>"
                                alt="Reviews.io"
                                class="h-[45px] w-auto"
                            />
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp' ); ?>"
                                alt="Google Reviews"
                                class="h-[63px] md:h-[78px] w-auto"
                            />
                        </div>
                        <p class="text-[16px] text-[#000000] mt-1">
                            <?php echo esc_html( get_ri_field( 'reviews_rating_text', 'Rated 4.9/5 from 515 verified reviews', 'option' ) ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
