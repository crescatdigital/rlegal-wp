<?php
/**
 * Newsletter signup block
 */
?>
<section class="bg-[#A3599D] py-6  hidden lg:block newsletter__block ">
  <div class="mx-auto max-w-3xl px-6">
    <div class="flex flex-col items-center text-center gap-4">
      <?php
      $newsletter_title = get_ri_field( 'newsletter_title', '', 'option' );
      if ( ! $newsletter_title ) {
          $newsletter_title = get_ri_field( 'newsletter_title', 'The RLegal Immigration Newsletter' );
      }
      $newsletter_sub = get_ri_field( 'newsletter_subheading', '', 'option' );
      if ( ! $newsletter_sub ) {
          $newsletter_sub = get_ri_field( 'newsletter_subheading', 'Get the latest immigration law news, updates and advice straight to your inbox' );
      }
      ?>
      <!-- HEADING -->
      <h2 class="text-[32px] font-bold text-white">
        <?php echo esc_html( $newsletter_title ); ?>
      </h2>
      <!-- SUBTEXT -->
      <p class="text-[26px] text-[#FFFFFF] lg:w-[564px]">
        <?php echo esc_html( $newsletter_sub ); ?>
      </p>
      <!-- FORM -->
      <?php echo do_shortcode('[contact-form-7 id="8e7bd15" title="Newsletter"]'); ?>
      
    </div>
  </div>
</section>