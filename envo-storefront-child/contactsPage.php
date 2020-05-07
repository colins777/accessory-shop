<?php
/* Template Name: Contacts Page */

?>

<?php get_header(); ?>

<div class="contact-page">
    <div class="container">
        <h1 class="main-page-block__title"><?php the_title()?></h1>
        <div class="contact-page__wrap">
            <div class="contact-page__col">

                <div class="contact-page__address">
                    <span>Наш адрес: г. Херсон, ул. Главная 2</span>
                </div>

                    <ul class="contact-page__address__list">
                        <li><a href="tel:+380992212234"><i class="fas fa-phone-square-alt"></i>+38
                                099-22-12-234</a></li>
                        <li><a href="tel:+380992212234"><i class="fas fa-phone-square-alt"></i>+38
                                099-22-12-234</a></li>
                        <li><a href="mail:accsessory.office@gmail.com"><i
                                    class="fas fa-envelope"></i></i>accsessory.office@gmail.com</a></li>
                    </ul>
                </div>


            <div class="contact-page__col">
                <div class="contact-page__address">
                    <span>Связаться с нами:</span>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="449" title="Без названия"]')?>
            </div>
        </div>
    </div> <!--container-->
</div>

<?php get_footer();?>
