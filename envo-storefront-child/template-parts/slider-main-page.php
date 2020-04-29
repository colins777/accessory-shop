<?php if(is_front_page()) :?>
    <section class="s-slider">

        <?php $sliderItems = new WP_Query(['category_name' => 'slider_main_page']);

        while ($sliderItems->have_posts()) :
            $sliderItems->the_post();?>
        <div class="slider-item" style="background-image: url(<?php echo get_the_post_thumbnail_url( $id, 'large' ); ?>)">
            <div class="container">
                <div class="slide-content-wrap">
                    <div class="slide-content">
                        <div class="slide-title">
                            <?php the_title();?>
                        </div>
                        <div class="slide-text">
                           <?php the_content();?>
                        </div>
                        <?php $link_to_page = get_field('link_to_page'); if ( !is_null($link_to_page) ) : ?>
                            <a href="<?php the_field('link_to_page');?>" class="slide-link">
                                <?php the_field('link_name');?>
                            </a>
                        <?php endif; ?>
                    </div>

                </div> <!--slide-content-->
            </div><!--container-->
        </div> <!--slider-item-->
        <?php endwhile;
				wp_reset_postdata();
				?>
    </section><!--s-slider-->
<?php endif;?>