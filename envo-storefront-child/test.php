<div class="header-contacts">
    <div class="header-contact"><a href="tel:+380992212234"><i class="fas fa-phone-square-alt"></i>+38 099-22-12-234</a></div>
    <div class="mail-social-wrap">
        <div class="header-contact"><a href="mail:accsessory.office@gmail.com"><i class="fas fa-envelope"></i>accsessory.office@gmail.com</a></div>
        <div class="header-contact"><a href="#"><i class="fab fa-instagram"></i></a></div>
        <div class="header-contact"><a href="#"><i class="fab fa-viber"></i></a></div>
        <div class="header-contact"><a href="#"><i class="fab fa-telegram"></i></a></div>

    </div>
</div>

awooc-custom-order-wrap


function replace_widjets_content() {
remove_action( 'widgets_init', 'envo_storefront_widgets_init' );
add_action( 'widgets_init', 'childtheme_the_footer_content' );
}
add_action( 'init', 'child_envo_storefront_widgets_init' );


function child_envo_storefront_widgets_init () {

register_sidebar(
array(
'name' => esc_html__('Footer Section Left', 'envo-storefront'),
'id' => 'envo-storefront-footer-area-left',
'before_widget' => '<div id="%1$s">',
    'after_widget' => '</div>',
'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div>',
)
);
}


<ul class="products">
    <?php

    $searchQuery = get_search_query();
    $args = [
        's' => $searchQuery,
        'posts_per_page' => 4
    ];

    $search = new WP_Query($args);

    while ($search->have_posts()) :
        $search->the_post();
        wc_get_template_part('content', 'product');

    endwhile; ?>
    <?php else : ?>

    <?php get_template_part('template-parts/content', 'no-results'); ?>

    <?php endif;?>
</ul>


[woocommerce_my_account]