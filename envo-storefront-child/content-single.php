<!-- start content container -->
<div class="row">
    <article class="col-md-12">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                         
                <div <?php post_class(); ?>>
                    <?php envo_storefront_thumb_img('envo-storefront-single', '', false, true); ?>
                    <div class="single-head <?php echo esc_attr(has_post_thumbnail() ? 'has-thumbnail' : 'no-thumbnail' ) ?>">
                        <?php envo_storefront_widget_date(); ?>
                        <?php the_title('<h1 class="single-title">', '</h1>'); ?>
                    </div>
                    <div class="single-content">
                        <div class="single-entry-summary">
                            <?php do_action('envo_storefront_before_content'); ?> 
                            <?php the_content(); ?>
                            <?php do_action('envo_storefront_after_content'); ?> 
                        </div><!-- .single-entry-summary -->
                        <?php wp_link_pages(); ?>

                    </div>
                    <?php envo_storefront_prev_next_links(); ?>
            <?php endwhile; ?>        
        <?php else : ?>            
            <?php get_template_part('content', 'none'); ?>        
        <?php endif; ?>    
    </article>
</div>
<!-- end content container -->
