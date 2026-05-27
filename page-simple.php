<?php
/**
 * Template Name: Simple Page Template
 * 
 * @package RI_Legal_Theme
 */

get_header();
?>

<?php the_content(); ?>

<?php get_template_part( 'template-parts/common/callout' ); ?>
<?php get_template_part( 'template-parts/common/newsletter' ); ?>

<?php get_footer(); ?>