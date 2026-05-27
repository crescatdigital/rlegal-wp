<?php
$clients_count = get_field('reviews_clients_count', 'option');
$reviews_count = get_field('reviews_count', 'option');
$cards         = get_field('reviews_cards', 'option');
?>

<section class="bg-[#6D3B69] py-12 lg:py-16 overflow-hidden">
    <div class="mx-auto max-w-7xl lg:px-10">
        <!-- HEADER -->
        <div class="mb-8 lg:mb-10 px-4 lg:px-0 text-left lg:text-center">
            <p class="text-white text-[32px] leading-tight lg:text-[36px] font-semibold">
                <?php echo esc_html( $clients_count ); ?> Clients Served,
                <span class="inline-flex items-center gap-1">
                    <?php echo esc_html( $reviews_count ); ?>
                    <span class="inline-flex">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                            class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                            class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                            class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                            class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"><img
                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                            alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                            class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain">
                    </span>
                    Reviews
                </span>
            </p>
        </div>
        <!-- CARDS + NAVIGATION -->
        <div class="relative flex items-center justify-center px-4 lg:px-0" data-carousel>
            <!-- PREV BUTTON -->
            <button data-prev aria-label="Previous reviews" class="absolute z-10 flex items-center justify-center text-white left-0 lg:left-[calc(50%-350px-230px)]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Back.V5pXw1d-_Z13nhBy.webp"
                    alt="Previous" loading="lazy" decoding="async" fetchpriority="auto" width="36" height="42"
                    class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px]">
            </button>

            <!-- CARDS WRAPPER -->
            <!-- items-stretch: makes all carousel-items grow to the tallest sibling's height -->
            <div class="flex items-stretch gap-6 w-full justify-center px-8 lg:px-0" data-track>

                <?php foreach ( $cards as $index => $card ) : ?>
                <!--
                    KEY FIX: added "flex flex-col" here.
                    Without display:flex on this wrapper, h-full on the child has nothing to stretch into.
                    The flex chain must be unbroken: track (flex) → carousel-item (flex) → review-card (flex)
                -->
                <div class="carousel-item flex flex-col w-full max-w-[350px] lg:max-w-none lg:w-auto">

                    <!-- h-full now works because the parent is flex -->
                    <div class="review-card bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-full
                            flex flex-col border-[5px] border-[#A3599D]">
                        <!-- TITLE -->
                        <h1 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                            <?php echo esc_html( $card['card_title'] ); ?>
                        </h1>
                        <!-- BODY: flex-1 fills available space and pushes footer down -->
                        <p class="flex-1 text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                            <?php echo esc_html( $card['card_body'] ); ?>
                        </p>
                        <!-- FOOTER always at bottom -->
                        <div class="pt-4 flex flex-col gap-1">
                            <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]">
                                <?php echo esc_html( $card['card_name'] ); ?>
                            </span>
                            <div class="flex items-center gap-5 leading-none">
                                <div class="flex">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                        alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                        class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"><img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                        alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                        class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"><img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                        alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                        class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"><img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                        alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                        class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"><img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                        alt="Star" loading="lazy" decoding="async" fetchpriority="auto" width="40" height="38"
                                        class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain">
                                </div>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/review-io.Do0gNMNe_Z243keq.webp"
                                    alt="Reviews.io" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="144" height="32"
                                    class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
            <!-- NEXT BUTTON -->
            <button data-next aria-label="Next reviews" class="absolute z-10 flex items-center justify-center text-white right-0 lg:right-[calc(50%-350px-230px)]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Back.V5pXw1d-_Z13nhBy.webp"
                    alt="Next" loading="lazy" decoding="async" fetchpriority="auto" width="36" height="42"
                    class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px] rotate-180">
            </button>
        </div>
    </div>
    <script src="/scripts/reviewsCarrousel.js"></script>
</section>