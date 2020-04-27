<div class="row">
    <div class="container">
        <div class="aks-news-main">
        <?php $news = new WP_Query(array('category_name' => 'news', 'posts_per_page' => 3));
        //var_dump($news);
        while ($news->have_posts()) :
            $news->the_post(); ?>


            <div class="col-md-4">
                <div class="news-item has-thumbnail">
                <div class="news-thumb">
                    <?php the_post_thumbnail() ?>
                    <div class="news-text-wrap">
                        <span class="posted-date"><?php envo_storefront_widget_date(); ?></span>
                        <h2 class="aks-entry-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p><?php the_excerpt(); ?></p>

                    </div>
                </div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
        ?>
        </div>
        <div class="row">
            <div class="aks-button-wrap">
                <a href="<?php echo get_site_url() . '/news/' ?>" class="aks-button">Все новости</a>
            </div>
        </div>

    </div> <!--container-->
</div>
<!-- end content container -->