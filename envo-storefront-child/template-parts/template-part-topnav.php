<?php //if (is_active_sidebar('envo-storefront-top-bar-area')) { ?>
<!--    <div class="top-bar-section container-fluid">-->
<!--        <div class="--><?php //echo esc_attr(get_theme_mod('top_bar_content_width', 'container')); ?><!--">-->
<!--            <div class="row">-->
<!--                --><?php //dynamic_sidebar('envo-storefront-top-bar-area'); ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php //} ?>
<div class="site-header container-fluid">
    <div class="<?php echo esc_attr(get_theme_mod('header_content_width', 'container')); ?>" >
        <div class="heading-row row" >
            <div class="site-heading <?php echo esc_attr(class_exists('WooCommerce') == true ? 'col-md-4' : 'col-md-6' ); ?> col-xs-12" >
                <div class="site-branding-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="site-branding-text">
                    <?php if (is_front_page()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>

                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description">
                            <?php echo esc_html($description); ?>
                        </p>
                    <?php endif; ?>
                </div><!-- .site-branding-text -->
            </div>
            <div class="search-heading col-md-6 col-xs-12">
                <?php if (class_exists('WooCommerce')) { ?>
                    <div class="header-search-form">
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="hidden" name="post_type" value="product" />
                            <input class="header-search-input" name="s" type="text" placeholder="<?php esc_attr_e('Search products...', 'envo-storefront'); ?>"/>
                            <select class="header-search-select" name="product_cat">
                                <option value=""><?php esc_html_e('All Categories', 'envo-storefront'); ?></option>
                                <?php
                                $categories = get_categories('taxonomy=product_cat');
                                foreach ($categories as $category) {
                                    $option = '<option value="' . esc_attr($category->category_nicename) . '">';
                                    $option .= esc_html($category->cat_name);
                                    $option .= ' (' . absint($category->category_count) . ')';
                                    $option .= '</option>';
                                    echo $option; // WPCS: XSS OK.
                                }
                                ?>
                            </select>
                            <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                <?php } ?>
                <?php if (is_active_sidebar('envo-storefront-header-area')) { ?>
                    <div class="site-heading-sidebar" >
                        <?php dynamic_sidebar('envo-storefront-header-area'); ?>
                    </div>
                <?php } ?>
            </div>
            <?php if (function_exists('envo_storefront_header_cart') && class_exists('WooCommerce')) { ?>
                <div class="header-right col-md-2 hidden-xs" >
                    <?php envo_storefront_header_cart(); ?>
                    <?php envo_storefront_my_account(); ?>
                </div>	
            <?php } ?>
        </div>
    </div>
</div>
<?php do_action('envo_storefront_before_menu'); ?> 
<div class="main-menu">
    <nav id="site-navigation" class="navbar navbar-default">     
        <div class="container">   
            <div class="navbar-header">
                <?php if (function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('main_menu')) : ?>
                <?php elseif (has_nav_menu('main_menu')) : ?>
                    <span class="navbar-brand brand-absolute visible-xs"><?php esc_html_e('Menu', 'envo-storefront'); ?></span>
                    <?php if (function_exists('envo_storefront_header_cart') && class_exists('WooCommerce')) { ?>
                        <div class="mobile-cart visible-xs" >
                            <?php envo_storefront_header_cart(); ?>
                        </div>	
                    <?php } ?>
                    <?php if (function_exists('envo_storefront_my_account') && class_exists('WooCommerce')) { ?>
                        <div class="mobile-account visible-xs" >
                            <?php envo_storefront_my_account(); ?>
                        </div>
                    <?php } ?>
                    <a href="#" id="main-menu-panel" class="open-panel" data-panel="main-menu-panel">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php
            $menu_pos = get_theme_mod('main_menu_float', 'left');
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'depth' => 5,
                'container_id' => 'my-menu',
                'container' => 'div',
                'container_class' => 'menu-container',
                'menu_class' => 'nav navbar-nav navbar-' . $menu_pos,
                'fallback_cb' => 'Envo_Storefront_WP_Bootstrap_Navwalker::fallback',
                'walker' => new Envo_Storefront_WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
        <?php do_action('envo_storefront_menu'); ?>
    </nav> 
</div>
<?php do_action('envo_storefront_after_menu'); ?>

<?php if(is_front_page()) :?>
    <section class="s-slider">
        <div class="slider-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/img/slide1.jpg'?>)">
            <div class="container">
                <div class="slide-content-wrap">
                    <div class="slide-content">
                        <div class="slide-title">
                            Запчасти и аксессуары скидки до 50%!
                        </div>
                        <div class="slide-text">
                            <a href="#">Заказывайте прямо сейчас!</a>
                        </div>
                    </div>

                </div> <!--slide-content-->
            </div><!--container-->
        </div> <!--slider-item-->

        <div class="slider-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/img/slide2.jpg'?>)">
            <div class="container">
                <div class="slide-content-wrap">
                    <div class="slide-content">
                        <div class="slide-title">
                            Защитные стекла и аксессуары скидки до 50%!
                        </div>
                        <div class="slide-text">
                            <a href="#">Заказывайте прямо сейчас!</a>
                        </div>
                    </div>

                </div> <!--slide-content-->
            </div><!--container-->
        </div> <!--slider-item-->
    </section><!--s-slider-->

    <section class="main-page-cats">
        <div class="container">
            <a href="#" class="main-page-cat">
                <div class="main-page__cat-img">
                    <img src="http://accessory-shop.loc/wp-content/uploads/2020/04/1-3.jpg" alt=""
                         class="wp-image-202"/>
                </div>
                <h1>Защитные стекла</h1>
            </a>

            <a href="#" class="main-page-cat">
                <div class="main-page__cat-img">
                    <img src="http://accessory-shop.loc/wp-content/uploads/2020/04/Spicy_Orange-700x1-1.png" alt=""
                         class="wp-image-202"/>
                </div>
                <h1>Чехлы</h1>
            </a>

            <a href="#" class="main-page-cat">
                <div class="main-page__cat-img">
                    <img src="http://accessory-shop.loc/wp-content/uploads/2020/04/3-2.jpg" alt=""
                         class="wp-image-202"/>
                </div>
                <h1>Аккумуляторы</h1>
            </a>
        </div> <!--container-->
    </section>
<?php endif;?>


