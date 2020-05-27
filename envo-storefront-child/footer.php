</div><!-- end main-container -->
</div><!-- end page-area -->

<footer class="footer container-fluid">
    <div class="container">
        <div class="footer-descr">
            <div class="footer-column">
                <div class="footer-contacts">
                   <!-- --><?php /*dynamic_sidebar( 'envo-storefront-footer-area-left' ); */?>
                    <div class="header-contact"><a href="tel:<?php the_field('contact_page_phone1', 146); ?>"><i class="fas fa-phone-square-alt"></i><?php the_field('contact_page_phone1', 146); ?></a></div>
                    <div class="header-contact"><a href="tel:<?php the_field('contact_page_phone2', 146); ?>"><i class="fas fa-phone-square-alt"></i><?php the_field('contact_page_phone1', 146); ?></a></div>
                    <div class="mail-social-wrap">
                        <div class="header-contact"><a href="mailto:<?php the_field('contact_page_email', 146); ?>"><i class="fas fa-envelope"></i><?php the_field('contact_page_email', 146); ?></a></div>

                    </div>
                </div>
            </div><!--footer-column-->


            <div class="footer-column">
                <?php dynamic_sidebar( 'envo-storefront-footer-area-center' ); ?>
            </div> <!--footer-column-->

            <div class="footer-column footer-column--right">
                <span class="icons-title">Работаем с системами платежей Visa и Mastercard</span>
                <a class="privacy-policy" href="<?php echo get_home_url() .'/privacy-policy';?>">Политика конфиденциальности</a>
                <div class="icons">
<!--                    <img src="--><?php //echo get_stylesheet_directory_uri() . '/img/icons/payment-systems/icons8-mastercard-logo.svg' ?><!--" alt="Работа с платежной системой Mastercard"/>-->
<!--                    <img src="--><?php //echo get_stylesheet_directory_uri() . '/img/icons/payment-systems/icons8-visa.svg' ?><!--" alt="Работа с платежной системой Mastercard"/>-->
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/icons/master_visa_fondy.png' ?>" alt="Работа с платежной системой Mastercard"/>

                </div>
            </div> <!--footer-column-->
        </div> <!--footer-descr-->


    </div>
    </div>
</footer>
</div><!-- end page-wrap -->
<?php wp_footer(); ?>
</body>
</html>