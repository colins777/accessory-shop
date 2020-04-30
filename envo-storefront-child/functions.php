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

/*вывод кнопки Купить в одтн клик в каталоге товаров*/

add_filter( 'woocommerce_after_shop_loop_item', 'awooc_html_custom_add_to_cart', 5 );

add_filter('woocommerce_product_tabs','change_tabs');
function change_tabs($tabs){

    //change tab name Review
    $tabs['additional_information']['title'] = 'Характеристики';
    return $tabs;
};

//add_action('woocommerce_before_shop_loop', 'add_mobile_button_filters', 40);

/*function add_mobile_button_filters () {
                  if ( is_tax( 'product_cat' ) || is_shop() ) {
              echo  '<a href="#" id="cat-panel">
                    <span class="mobile-filter">Фильтры</span>
                </a>';
               }
}*/

add_action( 'woocommerce_breadcrumb', 'add_mobile_button_filters', 1);

function add_mobile_button_filters () {
                  if ( is_tax( 'product_cat' ) || is_shop() ) { ?>
             <a href="#" id="cat-panel">
                 <span class="cat-panel-title">Фильтр товаров</span>
                    <!--<span class="mobile-filter">Фильтры</span>-->
                    <img class="mobile-filter" src="<?php echo get_stylesheet_directory_uri() . '/img/icons/icons8-slider-100.png'?>" alt="фильтр товаров" />
                </a>
              <?php }
}


//delete span in cf7
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    $fields['shipping']['shipping_postcode']['label'] = 'My new postcode title';
    $fields['shipping']['shipping_state']['label'] = 'My new state title';
    return $fields;
}



//remove_billing_company_field
add_filter( 'woocommerce_checkout_fields', 'remove_billing_company_field' );

function remove_billing_company_field( $fields ){
    unset( $fields['billing']['billing_company'] );
    unset( $fields['shipping']['shipping_company'] );

    return $fields;
}

//add_action('woocommerce_product_categories_widget_args','woo_current_product_category1');
//
//function woo_current_product_category1 ($arg) {
//    echo $arg = 123;
//}

add_filter('woocommerce_product_categories_widget_args','woo_current_product_category');
function woo_current_product_category( $args ){

    global $wp_query, $post;
    //var_dump($wp_query);
    $include = array();
    $category_parent     = '';
    $current_cat        = '';

    if ( is_tax( 'product_cat' ) ) {

        $cat_obj = $wp_query->get_queried_object();

        if( isset( $cat_obj->term_id ) ){

            $current_cat     = $cat_obj;
            $category_parent = $cat_obj->parent;
        }

    } /*elseif ( is_singular('product') ) {

        $product_category     = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'fields' => 'all' ) );
        $current_cat         = end( $product_category );
        $category_parent     = $current_cat->parent;

    }*/

    //check if current cat has children
    if( ! empty( $current_cat ) )
        $current_cat_children = get_terms(
                'product_cat',
                array(
                    'parent' => $current_cat->term_id,
                    'fields' => 'ids',
                    'hide_empty' => 0
                )
            );

    if( ! empty( $current_cat_children ) ){

        $terms_to_include = array_merge(
                array( $current_cat->term_id ),
                $current_cat_children
            );

    } else{

        if( ! empty( $category_parent ) ){
            $terms_to_include = array_merge(
                    array( $category_parent ),
                    get_terms( 'product_cat', array( 'parent' => $category_parent, 'fields' => 'ids', 'hide_empty' => 0 ) )
                );
        }
    }

    if( ! empty( $terms_to_include ) )
        $include = $terms_to_include;

    if( ! empty( $include ) )
        $args['include'] = $include;

    return $args;

}