<?php
/* Template Name: Contacts Page */

?>

<?php get_header(); ?>

<div class="contact-page">
    <div class="container">
        <h1 class="main-page-block__title"><?php the_title() ?></h1>
        <div class="contact-page__wrap">
            <div class="contact-page__col">

                <div class="contact-page__address">
                    <!--                    <span>Наш адрес: г. Херсон, ул. Главная 2</span>-->
                    <span><?php the_field('contact_page_address'); ?></span>
                </div>

                <ul class="contact-page__address__list">
                    <li><a href="tel:<?php the_field('contact_page_phone1'); ?>">
                            <i class="fas fa-phone-square-alt"></i><?php the_field(contact_page_phone1); ?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?php the_field('contact_page_phone2'); ?>">
                            <i class="fas fa-phone-square-alt"></i><?php the_field('contact_page_phone2'); ?>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:accsessory.office@gmail.com">
                            <i class="fas fa-envelope"></i><?php the_field('contact_page_email'); ?>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="contact-page__col">
                <div class="contact-page__address">
                    <span>Связаться с нами:</span>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="449" title="Без названия"]') ?>
            </div>
        </div>
    </div> <!--container-->


    <div class="map">
        <div class="container">
<!--            <iframe src="https://www.google.com/maps/d/embed?mid=1RHqOFWsKbx96tdzdoGB8OiL2kIgcRCCn" width="100%" height="480"></iframe>-->
            <?php echo do_shortcode('[leaflet-map lat=46.639843 lng=32.610383 zoom=17 zoomcontrol scrollwheel detect-retina] [leaflet-marker]Адрес магазина:  г. Херсон, ул. Потемкинская 42А[/leaflet-marker]')?>
        </div>

    </div>

</div>

<?php get_footer(); ?>

