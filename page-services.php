<?php
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
                            <?php echo esc_html( get_ri_field( 'services_hero_eyebrow', 'Business Visitor Visas in
                            London' ) ); ?>
                        </p>
                        <!-- Heading -->
                        <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-6">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_heading', "Over 20
                            years\nsupporting visitor visas\nfor businesses" ) ) ) ); ?>
                        </h1>
                        <!-- CTA -->
                        <!-- <div class="flex justify-center lg:justify-start">
                            <button
                                type="button"
                                class="inline-flex items-center gap-2 rounded-lg bg-[#4A884F] px-5 py-2.5 text-[16px] lg:text-[18px] font-semibold text-white hover:bg-[#3d7242] transition"
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
                                    class="lucide lucide-messages-square h-4 w-4 stroke-white"
                                >
                                    <path
                                        d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"
                                    ></path>
                                    <path
                                        d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"
                                    ></path>
                                </svg>
                                <?php echo esc_html( get_ri_field( 'services_hero_cta_text', 'Get a Free Consultation' )
                                ); ?>
                            </button>
                        </div> -->
                        <!-- REVIEWS -->
                        <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                            <div class="flex items-center gap-4">
                                <?php ri_review_link_open( 'reviewsio' ); ?><img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating"
                                    loading="lazy"
                                    decoding="async"
                                    fetchpriority="auto"
                                    width="156"
                                    height="45"
                                    class="h-[45px] w-auto"
                                /><?php ri_review_link_close(); ?>
                                <?php ri_review_link_open( 'google' ); ?><img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews"
                                    loading="lazy"
                                    decoding="async"
                                    fetchpriority="auto"
                                    width="149"
                                    height="78"
                                    class="h-[78px] w-auto"
                                /><?php ri_review_link_close(); ?>
                            </div>
                            <p class="text-[16px] text-[#000000]">
                                <?php echo esc_html( get_ri_field( 'services_reviews_text', 'Rated 4.9/5 from 529
                                verified reviews' ) ); ?><?php ri_reviews_tooltip(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- RIGHT SIDE (GRADIENT + FORM) (FIRST ON MOBILE) -->
                <div
                    class="relative flex items-center order-1 lg:order-2 min-h-[500px] lg:min-h-[550px] mx-6 lg:mx-0 lg:bg-[linear-gradient(270deg,#6D3B69_0.64%,#FFFFFF_99.11%)]"
                >
                    <!-- Inner alignment wrapper -->
                    <div class="w-[550px] flex justify-center lg:justify-end px-0 lg:pr-[10px] lg:pl-[135px]">
                        <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-[470px] w-full">
                            <h3 class="text-center text-white font-bold text-[20px] mb-2">
                                Get in touch with our lawyers
                            </h3>
                            <form class="space-y-4">
                                <input
                                    type="text"
                                    class="w-full rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                    aria-label="Full Name"
                                    required
                                />
                                <input
                                    type="email"
                                    class="w-full rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                    aria-label="Email Address"
                                    required
                                />
                                <textarea
                                    rows="4"
                                    class="w-full resize-none rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                    aria-label="Message"
                                >
                                </textarea>
                                <div class="pt-2 flex justify-center">
                                    <button
                                        type="submit"
                                        class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed bg-[#4A884F] text-white hover:bg-[#3d7242] px-6 py-2.5 text-[22px] h-[41px] lg:h-[58px] w-[200px] lg:w-[268px]"
                                    >
                                        Send Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <!-- HEADING -->
            <h2 class="text-left text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-12">
                <?php echo esc_html( get_ri_field( 'services_section1_heading', 'What is a Business Visitor Visa, and do
                you need one?' ) ); ?>
            </h2>
            <!-- CONTENT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                <p class="text-[18px] leading-relaxed text-[#000000]">
                    <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_section1_content_left', 'Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.' ) ) ) ); ?>
                </p>
                <p class="text-[18px] leading-relaxed text-[#000000]">
                    <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_section1_content_right', 'Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.' ) ) ) ); ?>
                </p>
            </div>
            <!-- TRUST BADGES -->
            <div class="flex items-center justify-center gap-10">
                <div class="sra-iframe"> <div style="position: relative; padding-bottom: 59.1%; height: auto; overflow: hidden;"><iframe frameborder="0" scrolling="no" allowtransparency="true" src="https://cdn.yoshki.com/iframe/55847r.html" style="border: 0px; margin: 0px; padding: 0px; backgroundcolor: transparent; top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;"></iframe></div> </div>
                <img
                    src="/wp-content/uploads/2026/05/uk-leading-firm-2024.webp"
                    alt="Legal 500 Leading Firm"
                    loading="lazy"
                    decoding="async"
                    fetchpriority="auto"
                    width="108"
                    height="157"
                    class="h-[110px] lg:h-[157px] w-auto object-contain"
                />
            </div>
        </div>
    </section>

    <section class="bg-[#6D3B69] py-12 lg:py-16 overflow-hidden">
        <div class="mx-auto max-w-7xl lg:px-10 lg:max-h-[400px]">
            <!-- HEADER -->
            <div class="mb-8 lg:mb-10 px-4 lg:px-0 text-left lg:text-center">
                <p class="text-white text-[32px] leading-tight lg:text-[36px] font-semibold">
                    5000+ Clients Served,
                    <span class="inline-flex items-center gap-1">
                        500+
                        <span class="inline-flex">
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                                alt="Star"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="auto"
                                width="40"
                                height="38"
                                class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"
                            /><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                                alt="Star"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="auto"
                                width="40"
                                height="38"
                                class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"
                            /><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                                alt="Star"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="auto"
                                width="40"
                                height="38"
                                class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"
                            /><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                                alt="Star"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="auto"
                                width="40"
                                height="38"
                                class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"
                            /><img
                                src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star-with-border.C0egjQLc_Z1Xc59b.webp"
                                alt="Star"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="auto"
                                width="40"
                                height="38"
                                class="lg:w-[41px] lg:h-[41px] w-[32px] h-[32px] object-contain"
                            />
                        </span>
                        Reviews
                    </span>
                </p>
            </div>
            <!-- CARDS + NAVIGATION -->
            <div class="relative flex items-center justify-center px-4 lg:px-0" data-carousel>
                <!-- PREV BUTTON -->
                <button
                    data-prev
                    aria-label="Previous reviews"
                    class="absolute z-10 flex items-center justify-center text-white left-0 lg:left-[calc(50%-350px-230px)]"
                >
                    <img
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Back.V5pXw1d-_Z13nhBy.webp"
                        alt="Previous"
                        loading="lazy"
                        decoding="async"
                        fetchpriority="auto"
                        width="36"
                        height="42"
                        class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px]"
                    />
                </button>
                <!-- CARDS WRAPPER -->
                <div class="flex gap-6 w-full justify-center px-8 lg:px-0" data-track>
                    <!-- CARD 1 -->
                    <div class="carousel-item w-full max-w-[350px] h-[244px] lg:max-w-none lg:w-auto lg:gap-[30px]">
                        <div
                            class="bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-[244px] flex flex-col border-[5px] border-[#A3599D]"
                        >
                            <!-- TITLE -->
                            <h3 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                                Excellent Service
                            </h3>
                            <!-- BODY (flexible) -->
                            <p class="text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <!-- FOOTER -->
                            <div class="mt-auto pt-4 flex flex-col gap-1">
                                <!-- Client Name -->
                                <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]"> John Smith </span>
                                <!-- Stars + Reviews.io -->
                                <div class="flex items-center gap-5 leading-none">
                                    <div class="flex">
                                        <img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        />
                                    </div>
                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/review-io.Do0gNMNe_Z243keq.webp"
                                        alt="Reviews.io"
                                        loading="lazy"
                                        decoding="async"
                                        fetchpriority="auto"
                                        width="144"
                                        height="32"
                                        class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CARD 2 -->
                    <div class="carousel-item w-full max-w-[350px] h-[244px] lg:max-w-none lg:w-auto">
                        <div
                            class="bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-[244px] flex flex-col border-[5px] border-[#A3599D]"
                        >
                            <!-- TITLE -->
                            <h3 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                                Highly Recommended
                            </h3>
                            <!-- BODY (flexible) -->
                            <p class="text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <!-- FOOTER -->
                            <div class="mt-auto pt-4 flex flex-col gap-1">
                                <!-- Client Name -->
                                <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]"> Sarah Johnson </span>
                                <!-- Stars + Reviews.io -->
                                <div class="flex items-center gap-5 leading-none">
                                    <div class="flex">
                                        <img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        />
                                    </div>
                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/review-io.Do0gNMNe_Z243keq.webp"
                                        alt="Reviews.io"
                                        loading="lazy"
                                        decoding="async"
                                        fetchpriority="auto"
                                        width="144"
                                        height="32"
                                        class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- CARD 3 -->
                    <div class="carousel-item w-full max-w-[350px] h-[244px] lg:max-w-none lg:w-auto">
                        <div
                            class="bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-[244px] flex flex-col border-[5px] border-[#A3599D]"
                        >
                            <!-- TITLE -->
                            <h3 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                                Professional Team
                            </h3>
                            <!-- BODY (flexible) -->
                            <p class="text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <!-- FOOTER -->
                            <div class="mt-auto pt-4 flex flex-col gap-1">
                                <!-- Client Name -->
                                <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]"> Michael Brown </span>
                                <!-- Stars + Reviews.io -->
                                <div class="flex items-center gap-5 leading-none">
                                    <div class="flex">
                                        <img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        />
                                    </div>
                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/review-io.Do0gNMNe_Z243keq.webp"
                                        alt="Reviews.io"
                                        loading="lazy"
                                        decoding="async"
                                        fetchpriority="auto"
                                        width="144"
                                        height="32"
                                        class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CARD 4 -->
                    <div class="carousel-item w-full max-w-[350px] h-[244px] lg:max-w-none lg:w-auto">
                        <div
                            class="bg-white rounded-[30px] p-4 w-full max-w-[355px] lg:max-w-[453px] h-[244px] flex flex-col border-[5px] border-[#A3599D]"
                        >
                            <!-- TITLE -->
                            <h3 class="text-[20px] lg:text-[22px] font-extrabold text-[#000000] mb-1">
                                Outstanding Results
                            </h3>
                            <!-- BODY (flexible) -->
                            <p class="text-[16px] lg:text-[18px] text-[#000000] leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <!-- FOOTER -->
                            <div class="mt-auto pt-4 flex flex-col gap-1">
                                <!-- Client Name -->
                                <span class="text-[16px] lg:text-[18px] font-bold text-[#000000]"> Emily Davis </span>
                                <!-- Stars + Reviews.io -->
                                <div class="flex items-center gap-5 leading-none">
                                    <div class="flex">
                                        <img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        /><img
                                            src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Star.BDdK2hbS_zVXRy.webp"
                                            alt="Star"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="auto"
                                            width="40"
                                            height="38"
                                            class="lg:w-[41px] lg:h-[41px] w-[27px] h-[30px] object-contain"
                                        />
                                    </div>
                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/review-io.Do0gNMNe_Z243keq.webp"
                                        alt="Reviews.io"
                                        loading="lazy"
                                        decoding="async"
                                        fetchpriority="auto"
                                        width="144"
                                        height="32"
                                        class="lg:h-[35px] lg:w-[144px] h-[28px] object-contain"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NEXT BUTTON -->
                <button
                    data-next
                    aria-label="Next reviews"
                    class="absolute z-10 flex items-center justify-center text-white right-0 lg:right-[calc(50%-350px-230px)]"
                >
                    <img
                        src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/Back.V5pXw1d-_Z13nhBy.webp"
                        alt="Next"
                        loading="lazy"
                        decoding="async"
                        fetchpriority="auto"
                        width="36"
                        height="42"
                        class="w-[40px] lg:w-[48px] h-[40px] lg:h-[48px] rotate-180"
                    />
                </button>
            </div>
        </div>
        <script src="/scripts/reviewsCarrousel.js"></script>
    </section>

    <section class="py-16 bg-white border-y-2 border-[#884A83]">
        <div class="mx-auto max-w-7xl px-6">
            <!-- SECTION TITLE -->
            <h2 class="text-center text-[36px] font-semibold text-[#A3599D] mb-10">
                How Getting a Visa Works with RLegal
            </h2>
            <!-- GREY PANEL -->
            <div class="bg-[#EFEFEF] rounded-md p-6 lg:p-10">
                <!-- GRID -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-10 place-items-center gap-1 lg:gap-y-[49px]"
                >
                    <?php $features = get_ri_field( 'services_features', array() ); if ( ! empty( $features ) ) {
                    foreach ( $features as $feature ) { $title = isset( $feature['feature_title'] ) ?
                    $feature['feature_title'] : ''; $desc = isset( $feature['feature_description'] ) ?
                    $feature['feature_description'] : ''; ?>
                    <div
                        class="bg-white rounded-md p-4 text-center shadow-sm h-[200px] lg:h-[243px] w-[200px] lg:w-[243px]"
                    >
                        <!-- Image Placeholder -->
                        <div class="mb-3 flex justify-center">
                            <div
                                class="h-[60px] lg:h-[90px] w-[60px] lg:w-[90px] rounded-md flex items-center justify-center"
                            >
                                <svg
                                    class="h-full w-full text-[#B3B3B3]"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <path d="M21 15l-5-5L5 21"></path>
                                </svg>
                            </div>
                        </div>
                        <!-- Title -->
                        <h4 class="text-left pl-[28px] text-[18px] lg:text-[26px] font-semibold text-[#884A83] mb-1">
                            <?php echo esc_html( $title ); ?>
                        </h4>
                        <!-- Description -->
                        <p class="text-[14px] text-left pl-[28px] lg:text-[18px] leading-relaxed text-[#000000]">
                            <?php echo esc_html( $desc ); ?>
                        </p>
                    </div>
                    <?php } } ?> <?php // End of features loop. ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#9A5B9D] py-10">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-center text-[36px] font-semibold text-white mb-12">Business Visitor Visa FAQs</h2>
            <div class="space-y-5">
                <?php $faqs = get_ri_field( 'services_faqs', array() ); if ( ! empty( $faqs ) ) { foreach ( $faqs as $i
                => $faq ) { $expanded = $i === 0 ? 'true' : 'false'; $hidden = $i === 0 ? 'block' : 'hidden'; $question
                = isset( $faq['question'] ) ? $faq['question'] : 'Question about business visitor visas?'; $answer =
                isset( $faq['answer'] ) ? $faq['answer'] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
                ?>
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button
                        type="button"
                        class="accordion-trigger w-full flex items-center justify-between px-6 h-[85px] text-left text-[18px] lg:text-[20px] font-semibold text-white transition bg-[#6D3B69]"
                        aria-expanded="<?php echo esc_attr( $expanded ); ?>"
                    >
                        <span class="max-w-[90%]" style="
    font-size: 20px;"><?php echo esc_html( $question ); ?></span>
                        <span
                            class="accordion-icon flex lg:h-[50px] lg:w-[50px] h-[30px] w-[30px] items-center justify-center bg-[#A3599D] rounded-full border border-white text-white text-sm lg:text-[24px]"
                        >
                            <?php echo $i === 0 ? '↑' : '↓'; ?>
                        </span>
                    </button>
                    <div
                        class="accordion-content bg-white px-6 py-6 text-[16px] lg:text-[18px] leading-[1.7] text-[#333333] space-y-4 <?php echo $hidden; ?>"
                    >
                        <p><?php echo wp_kses_post( nl2br( esc_html( $answer ) ) ); ?></p>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
        <!-- SCRIPT FRAGMENT -->
        <script src="/scripts/accordion.js"></script>
    </section>

    <?php get_template_part( 'template-parts/common/callout' ); ?> <?php get_template_part(
    'template-parts/common/featured-article' ); ?> <?php get_template_part( 'template-parts/common/newsletter' ); ?>
</main>

<?php get_footer(); ?>
