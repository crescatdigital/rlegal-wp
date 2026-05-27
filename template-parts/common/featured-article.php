<?php
/**
 * Featured Article block used across pages
 */
?>

<?php
// Get latest post dynamically
$latest_post = get_posts(['numberposts' => 1, 'post_status' => 'publish']);
$latest = $latest_post[0] ?? null;

$featured_image = get_field('featured_article_image');
$image_src = $latest && get_the_post_thumbnail_url($latest->ID, 'large') 
    ? get_the_post_thumbnail_url($latest->ID, 'large') 
    : ($featured_image ?: '/wp-content/uploads/2026/02/pexels-mrpixelwala-4165811-1.webp');

$fa_subtitle = $latest ? $latest->post_title : 'Understanding Visit Visas';
$fa_excerpt = $latest ? wp_trim_words($latest->post_excerpt ?: $latest->post_content, 40) : 'Join your civil partner in the UK with the right to live and work legally under a recognised civil partnership route.';
$fa_link = $latest ? get_permalink($latest->ID) : '/articles';
?>

<section class="py-12 bg-white">
  <div class="mx-auto max-w-7xl pl-[23px] lg:px-[114px]">
    <?php $fa_title = get_ri_field( 'featured_article_title', '', 'option' );
    if ( ! $fa_title ) {
        $fa_title = get_ri_field( 'featured_article_title', 'Keep up to date with the latest information in immigration law' );
    }
    ?>
    <h2 class="text-left lg:text-center text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-12">
      Keep up to date with the latest information in immigration law
    </h2>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

      <div class="lg:w-full lg:h-[350px] h-[203px] w-[330px]">
        <div class="flex items-center justify-center h-full bg-[#F2F2F2] rounded-lg overflow-hidden">
          <img 
            src="<?php echo esc_url( $image_src ); ?>" 
            alt="UK Student Visa"
            class="w-full h-full object-cover rounded-lg"
          >
        </div>
      </div>

      <div class="w-full">
        <h3 class="text-[32px] lg:text-[36px] font-semibold text-[#884A83] mb-3"><?php echo esc_html( $fa_subtitle ); ?></h3>
        <p class="text-[18px] leading-relaxed text-[#000000] mb-6"><?php echo wp_kses_post( nl2br( esc_html( $fa_excerpt ) ) ); ?></p>

        <div class="flex flex-wrap gap-4 justify-center lg:justify-start pb-5">
          <a href="<?php echo esc_url( $fa_link ); ?>" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed bg-[#4A884F] text-white hover:bg-[#3d7242] px-4 py-2 text-[18px] bg-[#6D3B69] rounded-[15px] lg:w-[225px]">Read this article</a>
          <a href="/articles" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed bg-[#884A83] text-white hover:bg-[#7a4275] px-4 py-2 text-[18px] bg-[#A3599D] rounded-[15px] lg:w-[225px]">See all articles</a>
        </div>
      </div>
    </div>
  </div>
</section>