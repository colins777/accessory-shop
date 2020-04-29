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
                        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]')?>
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


<?php get_template_part( 'template-parts/slider-main-page' );?>

<?php get_template_part( 'template-parts/cat-list-main-page' );?>
