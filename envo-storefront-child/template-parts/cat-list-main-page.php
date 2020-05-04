<?php if(is_front_page()) :?>
    <section class="main-page-cats">
        <div class="container">
            <?php
            $prod_cat_args = array(
                'taxonomy'    => 'product_cat',
                'orderby'     => 'id',
                'hide_empty'  => true,
                'parent'      => 0
            );

    $woo_categories = get_categories( $prod_cat_args );

    foreach ( $woo_categories as $woo_cat ) :
        $woo_cat_id = $woo_cat->term_id;
        $woo_cat_name = $woo_cat->name;
            $category_thumbnail_id = get_term_meta($woo_cat_id, 'thumbnail_id', true);
        $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);?>
        <a href="<?php echo get_term_link( $woo_cat_id, 'product_cat' )?>" class="main-page-cat">
                <div class="main-page__cat-img">
                    <img src="<?php echo $thumbnail_image_url?>" class="wp-image-202"/>
                </div>
                <h1><?php echo $woo_cat_name?></h1>
            </a>
        <?php endforeach; wp_reset_query(); ?>
        </div> <!--container-->
    </section>
<?php endif;?>