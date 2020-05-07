<?php get_header(); ?> 

<!-- start content container -->
<div class="container">
<div class="row">

        <div class="aks-news-main top">
        <?php

        if (have_posts()) :

            while (have_posts()) : the_post();

                get_template_part('content', get_post_format());

            endwhile;
            the_posts_pagination();

        else :

            get_template_part('content', 'none');

        endif;
        ?>
        </div> <!--aks-news-main top-->


</div> <!--row-->
</div>

<?php get_footer(); ?>
