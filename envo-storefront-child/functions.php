<?php
add_action( 'wp_enqueue_scripts', 'register_styles' );
function register_styles() {
    wp_enqueue_style( 'slick-slider', get_stylesheet_directory_uri() . '/libs/slick-slider/slick.css' );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/libs/fontawesome/css/all.min.css' );

    wp_enqueue_script( 'slick-slider',  get_stylesheet_directory_uri() .'/libs/slick-slider/slick.min.js');
    wp_enqueue_script( 'main',  get_stylesheet_directory_uri() .'/libs/main-js/main.js');
    wp_enqueue_script( 'equil-height',  get_stylesheet_directory_uri() .'/libs/equal-height/jquery.matchHeight.js');

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
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 39;' ), 20 );


//Discounts goods

add_filter( 'the_title', 'remove_page_title', 10, 2 );
function remove_page_title( $title, $id ) {
    $hide_title_page_ids = array(257);//Page IDs
    foreach($hide_title_page_ids as $page_id) {
        if( $page_id == $id ) return '';
    }
    return $title;
}


/*Add news block before footer*/
add_action('get_footer', 'add_news_block_before_footer');
function add_news_block_before_footer () {
    if (is_front_page()) {
        echo '<div class="container"><h1 class=\'main-page-block__title\'>Новости</h1></div>';
        get_template_part( 'news-main-page' );

    }
}

/*вывод кнопки Купить в один клик в каталоге товаров*/

add_filter( 'woocommerce_after_shop_loop_item', 'awooc_html_custom_add_to_cart', 5 );

add_filter('woocommerce_product_tabs','change_tabs');
function change_tabs($tabs){

    //change tab name Review
    $tabs['additional_information']['title'] = 'Характеристики';
    return $tabs;
};


/*Mobile Filter button for sidebar*/

add_action( 'woocommerce_breadcrumb', 'add_mobile_button_filters', 1);

function add_mobile_button_filters () {
                  if ( is_tax( 'product_cat' ) || is_shop() ) { ?>
             <a href="#" id="cat-panel">
                 <span class="cat-panel-title">Фильтр товаров</span>
                    <img class="mobile-filter" src="<?php echo get_stylesheet_directory_uri() . '/img/icons/icons8-slider-90.png'?>" alt="фильтр товаров" />
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

    }

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


add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated) {
    $translated = str_ireplace('Подытог', 'Итого', $translated);
    return $translated;
}


/*Change buttons in pagination page blog default storefront function*/
if (!function_exists('envo_storefront_prev_next_links')) :

    function envo_storefront_prev_next_links() {
        the_post_navigation(
            array(
                'prev_text' => '<span class="screen-reader-text">' . __('Previous Post', 'envo-storefront') . '</span><span class="nav-title"><span class="nav-title-icon-wrapper"><i class="fa fa-arrow-left"></i></span>%title</span>',
                'next_text' => '<span class="screen-reader-text">' . __('Next Post', 'envo-storefront') . '</span><span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="fa fa-arrow-right"></i></span></span>',
            )
        );
    }

endif;



/*Add custom sidebar to footer*/

function replace_widjets_content() {
    remove_action( 'widgets_init', 'envo_storefront_widgets_init' );
}
add_action( 'wp_loaded', 'replace_widjets_content' );
add_action( 'widgets_init', 'child_envo_storefront_widgets_init' );

function child_envo_storefront_widgets_init () {


    register_sidebar(
        array(
            'name' => 'Footer Section Center',
            'id' => 'envo-storefront-footer-area-center',
            'before_widget' => '<div id="%1$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title"><h3>',
            'after_title' => '</h3></div>',
        )
    );
}


add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

    global $wp_the_query;

//    if ((is_category('news')) && ( $query->is_search() ) ) {
    if (is_category('news'))   {
        $query->set( 'posts_per_page', 4 );
    }
    elseif ( ( $query->is_search() )) {
        $query->set( 'posts_per_page', 12 );
    }
    // Etc..

    return $query;
}
