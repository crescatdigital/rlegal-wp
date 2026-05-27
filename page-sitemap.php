<?php
/*
 * Template Name: HTML Sitemap
 * Description: Lists all published pages, posts, and services.
 */

/**
 * Recursively render a nested list of pages.
 */
if ( ! function_exists( 'ri_legal_render_page_tree' ) ) {
    function ri_legal_render_page_tree( $pages, $parent_id = 0, $all_pages = null ) {
        if ( $all_pages === null ) {
            $all_pages = get_pages( array(
                'sort_column' => 'menu_order,post_title',
                'sort_order'  => 'ASC',
            ) );
        }

        foreach ( $pages as $page ) {
            $children = array_filter( $all_pages, function( $p ) use ( $page ) {
                return (int) $p->post_parent === (int) $page->ID;
            } );
            ?>
            <li>
                <a href="<?php echo esc_url( get_permalink( $page->ID ) ); ?>"
                    class="text-[#333333] hover:text-[#884A83] hover:underline transition-colors">
                    <?php echo esc_html( $page->post_title ); ?>
                </a>
                <?php if ( ! empty( $children ) ) : ?>
                    <ul class="pl-5 mt-2 space-y-2 border-l-2 border-gray-200">
                        <?php ri_legal_render_page_tree( $children, $page->ID, $all_pages ); ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php
        }
    }
}

get_header();
?>

<main class="flex-grow">

    <section class="relative bg-white overflow-hidden">
        <div class="mx-auto max-w-[1440px] px-6 py-12 lg:py-16">

            <!-- HEADER -->
            <div class="max-w-3xl mx-auto text-center mb-12">
                <p class="text-[18px] lg:text-[20px] font-medium text-[#884A83] mb-3">
                    Site Map
                </p>
                <h1 class="text-[32px] lg:text-[40px] leading-tight text-black mb-4">
                    <?php the_title(); ?>
                </h1>
                <?php if ( get_the_content() ) : ?>
                    <div class="text-[16px] lg:text-[18px] text-[#333333] leading-[1.7]">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12">

                <!-- PAGES -->
                <div>
                    <h2 class="text-[24px] lg:text-[28px] font-semibold text-[#884A83] border-b-2 border-[#884A83] pb-3 mb-5">
                        Pages
                    </h2>
                    <?php
                    $pages = get_pages( array(
                        'sort_column' => 'menu_order,post_title',
                        'sort_order'  => 'ASC',
                        'parent'      => 0,
                    ) );

                    if ( $pages ) :
                        echo '<ul class="space-y-2 text-[16px] lg:text-[18px]">';
                        ri_legal_render_page_tree( $pages );
                        echo '</ul>';
                    else :
                        echo '<p class="text-[16px] text-[#333333]">No pages found.</p>';
                    endif;
                    ?>
                </div>

                <!-- SERVICES -->
                <div>
                    <h2 class="text-[24px] lg:text-[28px] font-semibold text-[#884A83] border-b-2 border-[#884A83] pb-3 mb-5">
                        Services
                    </h2>
                    <?php
                    $services = new WP_Query( array(
                        'post_type'      => 'service',
                        'posts_per_page' => -1,
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                        'no_found_rows'  => true,
                    ) );

                    if ( $services->have_posts() ) :
                        echo '<ul class="space-y-2 text-[16px] lg:text-[18px]">';
                        while ( $services->have_posts() ) : $services->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"
                                    class="text-[#333333] hover:text-[#884A83] hover:underline transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-[16px] text-[#333333]">No services found.</p>';
                    endif;
                    ?>
                </div>

                <!-- POSTS -->
                <div>
                    <h2 class="text-[24px] lg:text-[28px] font-semibold text-[#884A83] border-b-2 border-[#884A83] pb-3 mb-5">
                        Posts
                    </h2>
                    <?php
                    $posts_q = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => -1,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'no_found_rows'  => true,
                    ) );

                    if ( $posts_q->have_posts() ) :
                        echo '<ul class="space-y-2 text-[16px] lg:text-[18px]">';
                        while ( $posts_q->have_posts() ) : $posts_q->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"
                                    class="text-[#333333] hover:text-[#884A83] hover:underline transition-colors">
                                    <?php the_title(); ?>
                                </a>
                                <span class="block text-[14px] text-gray-500">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </span>
                            </li>
                        <?php endwhile;
                        echo '</ul>';
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-[16px] text-[#333333]">No posts found.</p>';
                    endif;
                    ?>
                </div>

            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/common/callout' ); ?>
    <?php get_template_part( 'template-parts/common/newsletter' ); ?>

</main>

<?php get_footer(); ?>
