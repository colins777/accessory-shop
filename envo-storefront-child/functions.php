<?php
add_action( 'wp_enqueue_scripts', 'register_styles' );
function register_styles() {
    wp_enqueue_style( 'slick-slider', get_stylesheet_directory_uri() . '/libs/slick-slider/slick.css' );

    wp_enqueue_script( 'slick-slider',  get_stylesheet_directory_uri() .'/libs/slick-slider/slick.min.js');
    wp_enqueue_script( 'equil-height',  get_stylesheet_directory_uri() .'/libs/main-js/main-js.js');
    wp_enqueue_script( 'main-js',  get_stylesheet_directory_uri() .'/libs/equal-height/jquery.matchHeight.js');

}


//Hide Title on Main PAge
add_filter('woocommerce_page_title', 'ma_hide_title_shop');

function ma_hide_title_shop ($hide) {
    if(is_shop) {
        $hide = false;
    }

    return $hide;
}

//Output products pagination after showing 12 cards
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


//Discounts goods
//



add_filter( 'the_title', 'remove_page_title', 10, 2 );
function remove_page_title( $title, $id ) {
    $hide_title_page_ids = array(257);//Page IDs
    foreach($hide_title_page_ids as $page_id) {
        if( $page_id == $id ) return '';
    }
    return $title;
}

add_action('get_footer', 'aks_news_block');

function aks_news_block () {
    if (is_front_page()) {
        echo '<h1 class=\'main-page-block__title\'>Новости</h1>';
        get_template_part( 'news-main-page' );

    }
}




//remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
//
//add_action('woocommerce_sidebar', 'aks_sidebar_in_cat_shop_page', 10);
//
//function aks_sidebar_in_cat_shop_page () {
//    if (! is_product() || ! is_front_page()) {
//        woocommerce_get_sidebar();
//    }
//}

/*add_filter('dynamic_sidebar_params', function($params) {
    if (is_page(257)) { // 100 id страницы
        return array("id" => "");
    }
    return $params;
    var_dump($params);
});*/