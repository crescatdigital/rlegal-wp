<?php
/**
 * Template Name: Single Service

 * @package RI_Legal_Theme
 */
get_header();
?>
<main class="flex-grow">

    <section class="relative bg-white overflow-hidden">
        <div class="mx-auto py-10 max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] gap-8 lg:gap-0 items-center">
                <!-- LEFT CONTENT (SECOND ON MOBILE) -->
                <div class="px-6 lg:pl-[165px] lg:pr-8">
                    <div class="max-w-xl text-center lg:text-left mx-auto lg:mx-0">
                        
                         <!-- Eyebrow -->
                        <h1 class="text-[18px] lg:text-[30px] font-bold text-[#884A83] mb-3">
                            <?php echo esc_html( get_ri_field( 'services_hero_eyebrow', 'Business Visitor Visas in London' ) ); ?>
                        </h1>


                        <!-- Heading -->
                        <p class="text-[32px] lg:text-[30px] leading-tight text-black mb-6">
                            <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_hero_heading', "Over 20 years\nsupporting visitor visas\nfor businesses" ) ) ) ); ?>
                        </p>

                       

                        <!-- CTA -->
                        <?php
                        $services_cta        = get_ri_field( 'services_hero_cta' );
                        $services_cta_url    = $services_cta['url']    ?? '/contact-us';
                        $services_cta_text   = $services_cta['title']  ?? 'Get a Free Consultation';
                        $services_cta_target = $services_cta['target'] ?? '_self';
                        ?>

                        <div class="flex justify-center lg:justify-start">
                            <a href="<?php echo esc_url( $services_cta_url ); ?>"
                                target="<?php echo esc_attr( $services_cta_target ); ?>"
                                class="inline-flex items-center gap-2
                                    rounded-lg bg-[#4A884F]
                                    px-5 py-2.5
                                    text-[16px] lg:text-[18px] font-semibold text-white
                                    hover:bg-[#3d7242] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-messages-square h-4 w-4 stroke-white">
                                    <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                    <path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                                </svg>
                                <?php echo esc_html( $services_cta_text ); ?>
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
				if ($thumbnail){
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
					 <?php echo $thumbnail; ?>
					 >
                    <!-- Inner alignment wrapper -->
                    <div class="w-[550px] flex justify-center lg:justify-end px-0 lg:pr-[10px] lg:pl-[135px]">
                        <div class="bg-[#A3599D] rounded-3xl p-3 pt-4 h-full w-full">
                            <h3 class="text-center text-white font-bold text-[30px] mb-6">
                                Request a callback from our immigration experts
                            </h3>
                            <?php echo do_shortcode('[contact-form-7 id="144c137" title="Top Banner Form"]'); ?>
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
                <?php echo esc_html( get_ri_field( 'services_section1_heading', 'What is a Business Visitor Visa, and do you need one?' ) ); ?>
            </h2>
            <!-- CONTENT -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                <p class="text-[18px] leading-relaxed text-[#000000]">
                    <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_section1_content_left', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ) ) ) ); ?>
                </p>
                <p class="text-[18px] leading-relaxed text-[#000000]">
                    <?php echo wp_kses_post( nl2br( esc_html( get_ri_field( 'services_section1_content_right', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ) ) ) ); ?>
                </p>
            </div>
            <!-- TRUST BADGES -->
            <div class="flex items-center justify-center gap-10">
                <div class="sra-iframe"> <div style="position: relative; padding-bottom: 59.1%; height: auto; overflow: hidden;"><iframe frameborder="0" scrolling="no" allowtransparency="true" src="https://cdn.yoshki.com/iframe/55847r.html" style="border: 0px; margin: 0px; padding: 0px; backgroundcolor: transparent; top: 0px; left: 0px; width: 100%; height: 100%; position: absolute;"></iframe></div> </div>
                <img src="/wp-content/uploads/2026/05/uk-leading-firm-2024.webp"
                    alt="Legal 500 Leading Firm" loading="lazy" decoding="async" fetchpriority="auto" width="108"
                    height="157" class="h-[110px] lg:h-[157px] w-auto object-contain">
            </div>
        </div>
    </section>



    <?php get_template_part( 'template-parts/common/testimonials' ); ?>

    <section class="main-content mx-auto py-10 bg-white">
        <div class="mx-auto max-w-6xl px-6">
            <?php the_content() ?>
        </div>
    </section>

    <?php /*
        <section class="py-16 bg-white border-y-2 border-[#884A83]">
            <div class="mx-auto max-w-7xl px-6">
                <!-- SECTION TITLE -->
                <h2 class="text-center text-[36px] font-semibold text-[#A3599D] mb-10">
                    How Getting a Visa Works with RLegal
                </h2>

                <!-- GREY PANEL -->
                <div class="bg-[#EFEFEF] rounded-md p-6 lg:p-10">

                    <!-- GRID -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
                                gap-x-8 gap-y-10 place-items-center">

                        <?php
                        $features = get_ri_field('services_features', array());
                        if (!empty($features)) {
                            foreach ($features as $feature) {
                                $title = isset($feature['feature_title']) ? $feature['feature_title'] : '';
                                $desc  = isset($feature['feature_description']) ? $feature['feature_description'] : '';
                        ?>
                        
                        <!-- CARD -->
                        <div class="bg-white rounded-md p-4 shadow-sm
                                    w-[200px] lg:w-[243px]">

                            <div class="mb-3 w-full h-[120px] lg:h-[150px] overflow-hidden rounded-md bg-gray-100">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail(
                                        'medium',
                                        [
                                            'class'   => 'h-full w-full object-cover',
                                            'loading' => 'lazy',
                                            'alt'     => esc_attr( get_the_title() ),
                                        ]
                                    ); ?>
                                <?php else : ?>
                                    <div class="h-full w-full flex items-center justify-center text-sm text-gray-400">
                                        No image available
                                    </div>
                                <?php endif; ?>
                            </div>

                            <h4 class="text-left text-[18px] lg:text-[26px]
                                    font-semibold text-[#884A83] mb-1
                                    line-clamp-2">
                                <?php echo esc_html($title); ?>
                            </h4>

                            <p class="text-[14px] text-left lg:text-[18px]
                                    leading-snug text-[#000000]
                                    line-clamp-3">
                                <?php echo esc_html($desc); ?>
                            </p>

                        </div>
                        <!-- END CARD -->

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
    */ ?>

    <section class="bg-[#9A5B9D] py-10">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-center text-[36px] font-semibold text-white mb-12">
               More Information About <?php echo esc_html(get_the_title()); ?>
            </h2>
            <div class="space-y-5">
        <?php
          $faqs = get_ri_field( 'services_faqs', array() );
          if ( ! empty( $faqs ) ) {
              foreach ( $faqs as $i => $faq ) {
                  $expanded = $i === 0 ? 'true' : 'false';
                  $hidden = $i === 0 ? 'block' : 'hidden';
                  $question = isset( $faq['question'] ) ? $faq['question'] : 'Question about business visitor visas?';
                  $answer = isset( $faq['answer'] ) ? $faq['answer'] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
                  ?>
                <div class="overflow-hidden rounded-md" data-accordion>
                    <button type="button" class="accordion-trigger w-full flex items-center justify-between
            px-6 p-4
            text-left text-[24px] lg:text-[30px] font-semibold text-white
            transition
            bg-[#6D3B69]" aria-expanded="<?php echo esc_attr( $expanded ); ?>">
                        <span class="max-w-[90%]"><?php echo esc_html( $question ); ?></span>
                        <span class="accordion-icon flex lg:h-[50px] lg:w-[50px] h-[30px] w-[30px] items-center justify-center
             bg-[#A3599D]
             rounded-full border border-white text-white text-sm lg:text-[24px]">
                            <?php echo $i === 0 ? '↑' : '↓'; ?>
                        </span>
                    </button>
                    <div class="accordion-content bg-white px-6 py-6
            text-[16px] lg:text-[18px] leading-[1.7] text-[#333333] space-y-4 <?php echo $hidden; ?>">
                        <p><?php echo wp_kses_post( nl2br( esc_html( $answer ) ) ); ?></p>
                    </div>
                </div>
                <?php
              }
          }
          ?>
            </div>
        </div>
        <!-- SCRIPT FRAGMENT -->
        <script src="/scripts/accordion.js"></script>
    </section>

    <?php get_template_part( 'template-parts/common/callout' ); ?>

    <?php get_template_part( 'template-parts/common/featured-article' ); ?>

    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>

<script>

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        const offset = 80;

        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = target.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    });
});
</script>