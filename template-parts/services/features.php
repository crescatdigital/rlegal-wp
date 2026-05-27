<?php
/**
 * Services features grid partial
 */
$features = get_ri_field( 'services_features', array() );
?>
<!-- GREY PANEL -->
<div class="bg-[#EFEFEF] rounded-md p-6 lg:p-10">
  <!-- GRID -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
         gap-x-8 gap-y-10
         place-items-center gap-1 lg:gap-y-[49px]">
    <?php if ( ! empty( $features ) ) : ?>
      <?php foreach ( $features as $feature ) :
        $title = isset( $feature['feature_title'] ) ? $feature['feature_title'] : '';
        $desc  = isset( $feature['feature_description'] ) ? $feature['feature_description'] : '';
      ?>
        <div class="bg-white rounded-md p-4 text-center shadow-sm h-[200px] lg:h-[243px] w-[200px] lg:w-[243px]">
          <!-- Image Placeholder -->
          <div class="mb-3 flex justify-center">
            <div class="h-[60px] lg:h-[90px] w-[60px] lg:w-[90px]
           rounded-md
           flex items-center justify-center">
              <svg class="h-full w-full text-[#B3B3B3]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                <path d="M21 15l-5-5L5 21"></path>
              </svg>
            </div>
          </div>

          <h4 class="text-left pl-[28px] text-[18px] lg:text-[26px] font-semibold text-[#884A83] mb-1"><?php echo esc_html( $title ); ?></h4>
          <p class="text-[14px] text-left pl-[28px] lg:text-[18px] leading-relaxed text-[#000000]"><?php echo esc_html( $desc ); ?></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
