<?php
/*
Template Name: Search
*/
?>

<?php get_header(); ?>

    <div class="search-page woocommerce woocommerce-page">
        <div class="container">
            <?php
            global $wp_query;

            if (have_posts()) : ?>

                <h1 class="main-page-block__title"><?php printf(__('Вы искали : %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h1>
            <h2>Найдено: <?php echo  $total_results = $wp_query->found_posts; ?></h2>


            <div class="page-description">
                <ul class="products">
                    <?php
                    $searchQuery = get_search_query();
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $args = array(
                        'paged' => $paged,
                        's' => $searchQuery,
                    );


                    $search = new WP_Query($args);

                    while ($search -> have_posts()) :
                        $search -> the_post();
                      wc_get_template_part( 'content', 'product' );

                    endwhile; wp_reset_postdata();?>
                    <?php else : ?>

                        <?php get_template_part('template-parts/content-no-results'); ?>

                    <?php endif; ?>
                </ul> <!--products-->
                <?php the_posts_pagination();  ?>
            </div>
        </div> <!-- container -->
    </div>
<?php get_footer(); ?>