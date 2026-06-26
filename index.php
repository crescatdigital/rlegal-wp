<?php
/**
 * Main template file
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<main id="main" class="site-main">
    <?php if ( have_posts() ) : ?>

        <?php if ( ! is_singular() ) : ?>
            <header class="page-header">
                <h1 class="entry-title">
                    <?php
                    if ( is_search() ) {
                        printf( esc_html__( 'Search results for: %s', 'ri-legal-theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
                    } elseif ( is_archive() ) {
                        the_archive_title();
                    } else {
                        bloginfo( 'name' );
                    }
                    ?>
                </h1>
            </header>
        <?php endif; ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    // A single post falling through to index.php keeps the H1;
                    // in a listing each post title is an H2 under the page H1.
                    // (Markup kept identical to before aside from the tag level.)
                    if ( is_singular() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    } else {
                        the_title( '<h2 class="entry-title">', '</h2>' );
                    }
                    ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

    <?php else : ?>
        <p><?php esc_html_e( 'No posts found.', 'ri-legal-theme' ); ?></p>
    <?php endif; ?>
</main>

<?php
get_footer();
