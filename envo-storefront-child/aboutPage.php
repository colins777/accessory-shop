<?php /* Template Name: About Page */


get_header();
?>

<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_title()?></h1>
                <?php the_post(); the_content();?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">

                <?php the_post(); the_content();?>
            </div>
        </div>
    </div>
</section>




<?php get_footer();?>