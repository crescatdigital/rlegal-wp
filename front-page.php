<?php
/**
 * The front page template
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<main class="flex-grow">
    
    <section class="relative bg-white overflow-hidden mb-10">
        <div class="mx-auto py-0 lg:w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">
               
            <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="px-6 lg:pl-[165px] lg:pr-8">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">
                        
                        <!-- Eyebrow -->
                        <h1 class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                            <?php echo esc_html( get_ri_field( 'services_hero_eyebrow', 'Immigration Solicitors In London' ) ); ?>
                        </h1>

                        <!-- Heading -->
                        <p class="text-[32px] lg:text-[40px] leading-tight text-black mb-6 hero-heading">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_heading', "The UK's Leading\nExperts in Immigration\nfor Over 20 Years" ) ) ) ); ?>
                        </p>

                        <p class="text-[16px] lg:text-[16px] leading-tight text-black mb-6 hero-description">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_description', "Our immigration lawyers work with you to deal with visa issues." ) ) ) ); ?>
                        </p>

                        <!-- CTA removed from hero; the primary "Book Consultation" CTA lives in the sticky header. -->

                        <!-- REVIEWS -->
                        <div class="mt-8 flex flex-col items-center lg:items-start gap-2">
                            <div class="flex items-center gap-4">
                                <?php ri_review_link_open( 'reviewsio' ); ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/reviews-io.934vh-eS_Zp3Wh4.webp"
                                    alt="Reviews.io rating" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="156" height="45" class="h-[45px] w-auto"><?php ri_review_link_close(); ?>
                                <?php ri_review_link_open( 'google' ); ?><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/ui-source/dist/_astro/google-rating.B9ne1Uc6_Z1ggsmn.webp"
                                    alt="Google reviews" loading="lazy" decoding="async" fetchpriority="auto"
                                    width="149" height="78" class="h-[78px] w-auto"><?php ri_review_link_close(); ?>
                            </div>
                            <p class="text-[16px] text-[#000000]">
                                <?php echo esc_html( get_ri_field( 'services_reviews_text', 'Rated 4.9/5 from 529 verified reviews' ) ); ?><?php ri_reviews_tooltip(); ?>
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
                        <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-full w-full">
                            <h3 class="text-center text-white font-bold text-[20px] mb-2">
                                <?php echo esc_html( get_ri_field( 'services_form_heading', 'Get in touch with our lawyers' ) ); ?>
                            </h3>
                            <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SPECIALISTS SECTION -->
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:pl-[60px]">
            <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] lg:mb-[22px] mb-4 text-center">
                <?php echo wp_kses_post( get_ri_field( 'specialists_heading', 'Specialists <span class="hp-ink">in Immigration</span> Law' ) ); ?>
            </h2>
            <p class="text-[18px] leading-relaxed text-[#000000]">
                <?php echo wp_kses_post( get_ri_field( 'specialists_paragraph', 'Our immigration solicitors provide <strong>expert legal advice across all areas of UK immigration law</strong>, supporting individuals and businesses with <a class="hp-link" href="/private-immigration/">visa applications</a>, <a class="hp-link" href="/corporate-immigration/">extensions</a>, and <a class="hp-link" href="/indefinite-leave-to-remain/">settlement routes</a>. We take a structured, detail-focused approach to every case, ensuring applications are prepared accurately and in line with current <a class="hp-link" href="/visa-refusal-appeals/">Home Office requirements</a>.' ) ); ?>
            </p>

            <div class="hp-specialists">
                <!-- LEFT: how we help -->
                <div class="hp-specialists__main">
                    <p class="hp-specialists__lead">Our team carefully reviews your circumstances:</p>
                    <?php
                    $hp_checklist = array(
                        array( 'Identifies the most suitable ', 'immigration pathway' ),
                        array( 'Manages the process from ', 'start to finish' ),
                        array( 'Clear communication & ', 'practical guidance' ),
                        array( 'Strong record of ', 'successful outcomes' ),
                        array( 'Help clients move forward with ', 'confidence and clarity' ),
                    );
                    ?>
                    <ul class="hp-checklist">
                        <?php foreach ( $hp_checklist as $hp_item ) : ?>
                            <li>
                                <span class="hp-checklist__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                <span><?php echo esc_html( $hp_item[0] ); ?><span class="hp-hl"><?php echo esc_html( $hp_item[1] ); ?></span></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- RIGHT: regulatory + ranking badges -->
                <div class="hp-badges-panel">
                    <?php $trust2 = get_ri_field( 'trust_image_2', '' ); ?>
                    <div class="sra-iframe">
                        <div style="position: relative; padding-bottom: 59.1%; height: auto; overflow: hidden;"><iframe frameborder="0" scrolling="no" allowtransparency="true" src="https://cdn.yoshki.com/iframe/55847r.html" style="border: 0px; margin: 0px; padding: 0px; backgroundcolor: transparent; top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;"></iframe></div>
                    </div>
                    <img src="<?php echo esc_url( $trust2 ? $trust2 : ri_legal_image_url( 'legal-500.webp' ) ); ?>" alt="Legal 500 Leading Firm" class="hp-legal500">
                </div>
            </div>
        </div>
    </section>

    <!-- RLEGAL TEAM SECTION -->
    <section class="hp-team">
        <div class="mx-auto max-w-7xl px-6 hp-team__inner">
            <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] text-center">
                <?php echo esc_html( get_ri_field( 'team_heading', 'RLegal Team of Immigration Experts' ) ); ?>
            </h2>
            <?php
            $hp_team = array(
                array( 'img' => 'david.jpg',  'first' => 'David',  'last' => 'Robinson' ),
                array( 'img' => 'evan.jpg',   'first' => 'Evan',   'last' => 'Remedios' ),
                array( 'img' => 'julian.jpg', 'first' => 'Julian', 'last' => 'Torreggiani' ),
            );
            ?>
            <div class="hp-team__grid">
                <?php foreach ( $hp_team as $member ) : ?>
                    <figure class="hp-team__member">
                        <div class="hp-team__photo">
                            <img src="<?php echo esc_url( ri_legal_image_url( $member['img'] ) ); ?>" alt="<?php echo esc_attr( $member['first'] . ' ' . $member['last'] ); ?>" loading="lazy" decoding="async">
                        </div>
                        <figcaption class="hp-team__name"><span class="hp-team__fname"><?php echo esc_html( $member['first'] ); ?></span> <?php echo esc_html( $member['last'] ); ?></figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
            <div class="hp-team__cta">
                <a href="/free-consultation/" class="hp-team__btn">BOOK&nbsp;<u>FREE</u>&nbsp;CONSULTATION</a>
            </div>
        </div>
    </section>

    <!-- REVIEWS CAROUSEL SECTION (wrapped for the homepage-only chevron divider) -->
    <div class="hp-reviews">
        <?php get_template_part( 'template-parts/common/testimonials' ); ?>
    </div>

    <!-- SERVICES SECTION -->
    <section class="py-12">
        <div class="mx-auto max-w-7xl">
            <h2 class="text-center text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-10 px-6">
                Services We Provide
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <!-- FOR BUSINESSES -->
                <div class="bg-[#A3599D] p-8" data-accordion="business">
                    <h3 class="text-center text-white text-[32px] lg:text-[36px] font-semibold mb-6">
                        For Businesses
                    </h3>
                    <div class="flex flex-col items-center lg:grid lg:grid-cols-2 lg:justify-items-center gap-6 mb-4">
                        <?php
                        $business_services_new  = get_field('services_business'); 

                        // $business_services = new WP_Query(array(
                        //     'post_type' => 'service',
                        //     'posts_per_page' => 4,
                        //     'meta_query' => array(array(
                        //         'key' => 'service_type',
                        //         'value' => 'business',
                        //         'compare' => '=',
                        //     )),
                        // ));

                        // if ( $business_services->have_posts() ) :
                        //     while ( $business_services->have_posts() ) : $business_services->the_post();
                        //         $svc_title = get_the_title();
                        //         $svc_link = get_permalink();

                        if($business_services_new):
                            foreach($business_services_new as $service):
                                $svc_title =  $service['business_service_title'];
                                $svc_link  = $service['business_service_link'];
                                $svc_url   = !empty($svc_link['url']) ? home_url($svc_link['url']) : '#';
                                $svc_img   = $service['business_service_image'];
                        ?>
                                <div class="accordion-card w-full max-w-sm lg:max-w-none">
                                    <div class="overflow-hidden w-full max-w-[243px] shadow-sm mx-auto">
                                        <div class="relative bg-white h-[200px] flex flex-col border-b border-[#A3599D]" 
                                        style="background-image: url('<?php echo $svc_img; ?>'); background-size: cover; background-position: center;"
                                        >
                                            <a href="<?php echo esc_url( $svc_url ); ?>" class="flex-1 flex flex-col service-box-title">
                                                <span class="text-[24px] font-semibold text-[#884A83] mx-auto"><?php echo esc_html( $svc_title ); ?></span>
                                            </a>
                                        </div>
                                        <div class="h-[33px] px-4 flex items-center justify-end bg-[#6D3B69] text-white">
                                            <a href="<?php echo esc_url( $svc_url ); ?>">
                                                <img src="<?php echo esc_url( ri_legal_image_url( 'arrow.webp' ) ); ?>" alt="Arrow" class="w-[34px] h-[34px] object-contain">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                            // wp_reset_postdata();
                        else :
                            // fallback: show one placeholder card
                        ?>
                        <div class="accordion-card w-full max-w-sm lg:max-w-none">
                            <div class="overflow-hidden w-full max-w-[243px] shadow-sm mx-auto">
                                <div class="relative bg-white h-[200px] px-4 pt-3 flex flex-col border-b border-[#6D3B69]">
                                    <span class="text-[24px] font-semibold text-[#884A83] mx-auto">Service</span>
                                    <div class="flex-1 flex items-center justify-center">
                                        <svg class="h-[90px] w-[90px] text-[#B3B3B3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <path d="M21 15l-5-5L5 21"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="h-[33px] px-4 flex items-center justify-end bg-[#6D3B69] text-white">
                                    <img src="<?php echo esc_url( ri_legal_image_url( 'arrow.webp' ) ); ?>" alt="Arrow" class="w-[34px] h-[34px] object-contain">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button
                        class="accordion-toggle lg:hidden w-full flex flex-col items-center justify-center gap-2 text-white text-[24px]"
                        aria-expanded="false">
                        <span class="accordion-text font-semibold">Load more services</span>
                        <span
                            class="accordion-icon w-[50px] h-[50px] rounded-full bg-[#6D3B69] flex items-center justify-center text-white font-bold">↓</span>
                    </button>
                </div>

                <!-- FOR INDIVIDUALS -->
                <div class="bg-[#6D3B69] p-8" data-accordion="individual">
                    <h3 class="text-center text-white text-[32px] lg:text-[36px] font-semibold mb-6">
                        For Individuals
                    </h3>
                    <div class="flex flex-col items-center lg:grid lg:grid-cols-2 lg:justify-items-center gap-6 mb-4">
                        <?php

                        $individual_service_new =  get_field('services_individual');

                        $individual_services = new WP_Query(array(
                            'post_type' => 'service',
                            'posts_per_page' => 4,
                            'meta_query' => array(array(
                                'key' => 'service_type',
                                'value' => 'individual',
                                'compare' => '=',
                            )),
                        ));

                        if ( $individual_service_new ) :
                            // print_r($individual_service_new);
                            foreach($individual_service_new as $service):
                                $svc_title = $service['individual_service_title'];
                                $svc_link  = $service['individual_service_link'];
                                $svc_url   = !empty($svc_link['url']) ? home_url($svc_link['url']) : '#';
                                $svc_img   = $service['individual_service_image'];
    
                         
                        ?>
                        <div class="accordion-card w-full max-w-sm lg:max-w-none">
                            <div class="overflow-hidden w-full max-w-[243px] shadow-sm mx-auto">
                                <div class="relative bg-white h-[200px] flex flex-col border-b border-[#A3599D]" 
                                style="background-image: url('<?php echo $svc_img; ?>'); background-size: cover; background-position: center;"
                                >
                                    <a href="<?php echo esc_url( $svc_url ); ?>" class="flex-1 flex flex-col service-box-title">
                                        <span class="text-[24px] font-semibold text-[#884A83] mx-auto"><?php echo esc_html( $svc_title ); ?></span>
                                    </a>
                                </div>
                                <div class="h-[33px] px-4 flex items-center justify-end bg-[#A3599D] text-white">
                                    <a href="<?php echo esc_url( $svc_url ); ?>">
                                        <img src="<?php echo esc_url( ri_legal_image_url( 'arrow.webp' ) ); ?>" alt="Arrow" class="w-[34px] h-[34px] object-contain">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                            // wp_reset_postdata();
                        else :
                        ?>
                        <div class="accordion-card w-full max-w-sm lg:max-w-none">
                            <div class="overflow-hidden w-full max-w-[243px] shadow-sm mx-auto">
                                <div class="relative bg-white h-[200px] px-4 pt-3 flex flex-col border-b border-[#A3599D]">
                                    <span class="text-[24px] font-semibold text-[#884A83] mx-auto">Service</span>
                                    <div class="flex-1 flex items-center justify-center">
                                        <svg class="h-[90px] w-[90px] text-[#B3B3B3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <path d="M21 15l-5-5L5 21"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="h-[33px] px-4 flex items-center justify-end bg-[#A3599D] text-white">
                                    <img src="<?php echo esc_url( ri_legal_image_url( 'arrow.webp' ) ); ?>" alt="Arrow" class="w-[34px] h-[34px] object-contain">
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button
                        class="accordion-toggle lg:hidden w-full flex flex-col items-center justify-center gap-2 text-white text-[24px]"
                        aria-expanded="false">
                        <span class="accordion-text font-semibold">Load more services</span>
                        <span
                            class="accordion-icon w-[50px] h-[50px] rounded-full bg-[#A3599D] flex items-center justify-center text-white font-bold">↓</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION -->

    <?php get_template_part( 'template-parts/common/featured-article' ); ?>

    <?php get_template_part( 'template-parts/common/callout' ); ?>
    
    </div>
    </div>
    </section>

    <!-- LOCATION SECTION -->
    <section class="py-16 bg-[#F9F9F9] lg:min-h-[623px]">
        <div class="mx-auto max-w-5xl px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- LEFT CONTENT -->
                <div class="max-w-md">
                    <h2 class="text-[32px] lg:text-[36px] font-semibold text-[#A3599D] mb-[36px]">
                        Where to find us
                    </h2>
                    <p class="text-[24px] lg:text-[30px] leading-relaxed text-[#000000] mb-[44px]">
                        Third Floor, Linen Hall<br>
                        162-168 Regent Street<br>
                        London<br>
                        W1B 5TD
                    </p>
                    <a href="https://maps.google.com/?q=Third+Floor+Linen+Hall+162-168+Regent+Street+London+W1B+5TD"
                        class="inline-flex items-center justify-center rounded-[15px] bg-[#884A83] px-5 py-2.5 lg:w-[220px] text-[18px] text-white font-bold transition duration-200 hover:bg-[#7a4275]">
                        Get Directions
                    </a>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="w-full aspect-[4/3] lg:aspect-auto lg:w-[602px] lg:h-[450px] rounded-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.061106840687!2d-0.14201072364932948!3d51.512094910360716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d5a1c8235d%3A0x65a64559005db2e5!2sRLegal%20Solicitors%20London!5e0!3m2!1sen!2sin!4v1770874856574!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>