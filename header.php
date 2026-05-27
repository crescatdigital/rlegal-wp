<?php
/**
 * The header for the theme
 * 
 * @package RI_Legal_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="u2UZv-JirMyZN8n6OCM35OzhzNu0zbzzFl-FlK22mjs" />
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen flex flex-col font-sans' ); ?>>
    <?php wp_body_open(); ?>

    <header class="lg:px-[51px] w-full lg:w-[1440px] mx-auto bg-white relative z-50">
        <!-- ================= MOBILE HEADER ================= -->
        <div class="flex items-center justify-between px-4 py-4 lg:hidden">
            
            <!-- LEFT: PHONE ICON -->
            <?php $ri_phone = get_ri_field( 'phone_number', '0207 038 3880', 'option' ); ?>
            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ri_phone ) ); ?>" class="flex h-[53px] w-[53px] items-center justify-center rounded-full bg-[#884A83]" aria-label="Call us">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call h-6 w-6 stroke-white">
                    <path d="M13 2a9 9 0 0 1 9 9"></path><path d="M13 6a5 5 0 0 1 5 5"></path><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                </svg>
            </a>

            <!-- CENTER: LOGO -->
            <?php 
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<img src="' . esc_url( ri_legal_image_url( 'logo.webp' ) ) . '" alt="' . esc_attr( bloginfo( 'name' ) ) . '" class="h-[109px] w-auto">';
            }
            ?>

            <!-- RIGHT: HAMBURGER -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="mobile-menu-open" class="lucide lucide-menu h-[53px] w-[53px] stroke-[#884A83] stroke-2">
                <path d="M4 5h16"></path><path d="M4 12h16"></path><path d="M4 19h16"></path>
            </svg>
        </div>

        <!-- ================= MOBILE NAV DRAWER ================= -->
       <div id="mobile-nav" class="fixed inset-0 z-40 hidden lg:hidden">
            
            <!-- OVERLAY -->
            <div id="mobile-nav-overlay" class="absolute inset-0 bg-black/40"></div>

            <!-- DRAWER -->
            <div class="absolute right-0 top-0 h-full w-[80%] max-w-[320px] bg-white shadow-xl translate-x-full transition-transform duration-300 flex flex-col" id="mobile-nav-panel" style="overflow: auto;">
                
                <!-- HEADER: Logo + Close -->
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<span class="text-[#884A83] font-bold text-xl">' . get_bloginfo( 'name' ) . '</span>';
                        }
                        ?>
                    </a>
                    <button id="mobile-nav-close" class="text-gray-400 hover:text-[#884A83] transition-colors p-1" aria-label="Close menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                </div>

                <!-- NAV LINKS (accordion) -->
                <nav class="flex-1 overflow-y-auto py-2 text-[#884A83]" id="mobile-nav-accordion">
                    <?php
                    $menu_locations = get_nav_menu_locations();
                    $menu_obj = isset( $menu_locations['primary'] ) ? wp_get_nav_menu_object( $menu_locations['primary'] ) : false;

                    if ( $menu_obj ) {
                        $menu_items = wp_get_nav_menu_items( $menu_obj->term_id );
                        $top_level  = array_filter( $menu_items, fn( $item ) => $item->menu_item_parent == 0 );

                        foreach ( $top_level as $item ) {
                            $children     = array_filter( $menu_items, fn( $child ) => $child->menu_item_parent == $item->ID );
                            $has_children = ! empty( $children );
                            $item_id      = 'nav-item-' . $item->ID;
                            ?>
                            <div class="border-b border-gray-100">
                                <?php if ( $has_children ) : ?>
                                    <button
                                        class="w-full flex items-center justify-between px-5 py-4 text-left text-[16px] font-medium text-gray-800 hover:text-[#884A83] transition-colors"
                                        onclick="toggleMobileAccordion('<?php echo esc_attr( $item_id ); ?>')"
                                        aria-expanded="false"
                                        aria-controls="<?php echo esc_attr( $item_id ); ?>"
                                    >
                                        <?php echo esc_html( $item->title ); ?>

                                        <svg id="chevron-<?php echo esc_attr( $item_id ); ?>" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 transition-transform duration-300 flex-shrink-0">
                                            <polyline points="6 9 12 15 18 9"/>
                                        </svg>

                                    </button>

                                    <div id="<?php echo esc_attr( $item_id ); ?>" class="overflow-hidden max-h-0 transition-all duration-300 bg-gray-50"                style="max-height:0">

                                    <?php foreach ( $children as $child ) : ?>
                                        <a href="<?php echo esc_url( $child->url ); ?>" class="block px-8 py-3 text-[15px] text-gray-600 hover:text-[#884A83] hover:bg-gray-100 transition-colors border-b border-gray-100/60 last:border-0">
                                            <?php echo esc_html( $child->title ); ?>
                                        </a>
                                    <?php endforeach; ?>

                                    </div>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( $item->url ); ?>" class="flex items-center justify-between px-5 py-4 text-[16px] font-medium text-gray-800 hover:text-[#884A83] transition-colors">
                                        <?php echo esc_html( $item->title ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </nav>

                <!-- CTA -->
                <div class="flex flex-col gap-4 p-6 border-t border-gray-100">
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ri_phone ) ); ?>" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer bg-[#4A884F] text-white hover:bg-[#3d7242] px-4 py-3 text-[16px] w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call h-5 w-5 stroke-white mr-2">
                            <path d="M13 2a9 9 0 0 1 9 9"></path><path d="M13 6a5 5 0 0 1 5 5"></path><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                        </svg>
                        Call Us
                    </a>
                    <a href="/contact-us" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer bg-[#884A83] text-white hover:bg-[#7a4275] px-4 py-3 text-[16px] w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-messages-square h-5 w-5 stroke-white mr-2">
                            <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path><path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                        </svg>
                        Free Consultation
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= DESKTOP HEADER ================= -->
        <div class="mx-auto max-w-screen px-5 pt-10 hidden lg:block">
            <div class="flex h-[72px] items-center justify-between">
                <!-- LOGO -->
                <div class="relative z-50 pr-1">
                    <?php 
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<img src="' . esc_url( ri_legal_image_url( 'logo.webp' ) ) . '" alt="' . esc_attr( bloginfo( 'name' ) ) . '" class="h-[120px]">';
                    }
                    ?>
                </div>

                <!-- NAV -->
                <nav class="flex space-evenly items-center gap-8 text-[18px] font-medium">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'fallback_cb'    => false,
                        'depth'          => 2,
                        'container'      => false,
                        'menu_class'     => 'menu flex justify-evenly items-center gap-8 text-[18px] font-medium',
                    ) );
                    ?>
                </nav>

                <!-- CTA -->
                <div class="flex items-center gap-3">
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ri_phone ) ); ?>" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed bg-[#4A884F] text-white hover:bg-[#3d7242] px-4 py-2 text-[18px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call h-4 w-4 stroke-white mr-2">
                            <path d="M13 2a9 9 0 0 1 9 9"></path><path d="M13 6a5 5 0 0 1 5 5"></path><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                        </svg>
                        <?php echo esc_html( $ri_phone ); ?>
                    </a>

                    <?php $cta_text = get_ri_field( 'hero_cta_text', '', 'option' ); if ( ! $cta_text ) { $cta_text = 'Free Consultation'; } ?>
                    <a href="/contact-us" class="inline-flex items-center justify-center rounded-lg font-bold transition duration-200 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed bg-[#884A83] text-white hover:bg-[#7a4275] px-4 py-2 text-[18px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-messages-square h-4 w-4 stroke-white mr-2">
                            <path d="M16 10a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 14.286V4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path><path d="M20 9a2 2 0 0 1 2 2v10.286a.71.71 0 0 1-1.212.502l-2.202-2.202A2 2 0 0 0 17.172 19H10a2 2 0 0 1-2-2v-1"></path>
                        </svg>
                        <?php echo esc_html( $cta_text ); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>
