<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('wp_nav_menu_args', function ($args) {
    if ($args['theme_location'] === 'primary') {
        $args['menu_class'] .= ' flex justify-evenly items-center gap-8 text-[20px] font-medium my-custom-class';
    }
    return $args;
});