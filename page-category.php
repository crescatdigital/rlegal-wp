<?php
/**
 * Template Name: Category Template 
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<?php the_content(); ?>

<?php
$page         = get_queried_object();

$slug_map = array(
    'visas-for-work-business-investment' => 'corporate',
    'visa-for-individuals'               => 'private',
    'british-citizenship'                => 'british-citizenship',
    'uk-visa-refusal'                    => 'visa-refusal-appeals',
);

$current_slug = isset($slug_map[$page->post_name]) ? $slug_map[$page->post_name] : $page->post_name;

$args = array(
    'post_type'      => 'service',
    'posts_per_page' => -1,
    'orderby'        => 'title',
    'order'          => 'ASC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'service-category',
            'field'    => 'slug',
            'terms'    => $current_slug,
        ),
    ),
);
$services = new WP_Query($args);
?>

<section class="bg-[#faf8fa]">
    <div class="mx-auto max-w-7xl px-6">

        <div class="text-center mb-10">
            <h2 class="text-[28px] lg:text-[32px] font-semibold text-[#884A83] mb-4">Our Services</h2>
            <div class="mx-auto mt-4 h-1 w-24 rounded-full bg-[#884A83] opacity-40"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if ($services->have_posts()) : ?>
                <?php while ($services->have_posts()) : $services->the_post(); ?>

                    <div class="group flex gap-0 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 bg-white border border-[#884A83]/20">
                        <div class="w-2 bg-[#884A83] shrink-0 group-hover:w-3 transition-all duration-300"></div>
                        <div class="flex flex-col justify-between p-6 w-full">
                            <div>
                                <h3 class="text-[16px] font-bold text-[#884A83] mb-2 leading-snug">
                                    <?php the_title(); ?>
                                </h3>

                                <p class="text-[13px] text-[#555] leading-relaxed line-clamp-3">
                                    <?php echo wp_trim_words(get_field('services_section1_content_left'), 15, '...'); ?>
                                </p>

                            </div>
                            <a href="<?php the_permalink(); ?>" class="mt-6 self-start inline-flex items-center gap-2 bg-[#884A83] text-white text-[13px] font-semibold px-4 py-2 rounded-lg hover:bg-[#6d3a69] transition-colors duration-200">
                                Learn more <span>→</span>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/common/callout'); ?>
<?php get_template_part('template-parts/common/newsletter'); ?>

<?php get_footer(); ?>