<?php
add_action( 'wp_enqueue_scripts', 'register_styles' );
function register_styles() {
    wp_enqueue_style( 'slick-slider', get_stylesheet_directory_uri() . '/libs/slick-slider/slick.css' );

    wp_enqueue_script( 'slick-slider',  get_stylesheet_directory_uri() .'/libs/slick-slider/slick.min.js');


}