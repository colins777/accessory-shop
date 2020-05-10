</div><!-- end main-container -->
</div><!-- end page-area -->

<footer class="footer container-fluid">
    <div class="container">
        <div class="footer-descr">
            <div class="footer-column">
                <div class="footer-contacts">
                    <?php dynamic_sidebar( 'envo-storefront-footer-area-left' ); ?>
                </div>
            </div><!--footer-column-->


            <div class="footer-column">
                <?php dynamic_sidebar( 'envo-storefront-footer-area-center' ); ?>
            </div> <!--footer-column-->

            <div class="footer-column footer-column--right">
                <span class="icons-title">Работаем с системами платежей Visa и Mastercard</span>
                <a class="privacy-policy" href="<?php echo get_home_url() .'/privacy-policy';?>">Политика конфиденциальности</a>
                <div class="icons">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/icons/payment-systems/icons8-mastercard-logo.svg' ?>" alt="Работа с платежной системой Mastercard"/>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/icons/payment-systems/icons8-visa.svg' ?>" alt="Работа с платежной системой Mastercard"/>
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


<!--<div class="header-contacts">
    <div class="header-contact"><a href="tel:+380992212234"><i class="fa fa-phone-square"></i>+38 099-22-12-234</a></div>
    <div class="mail-social-wrap">
        <div class="header-contact"><a href="mail:accsessory.office@gmail.com"><i class="fa fa-phone-square"></i>accsessory.office@gmail.com</a></div>
        <div class="header-contact">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="header-contact">
            <a href="#"><i class="fa fa-telegram"></i></a>
        </div>
        <div class="header-contact"><a href="#"><img src="http://accessory-shop.loc/wp-content/uploads/2020/04/viber.png" alt="viber" /></a></div>
    </div>
</div>-->
<!-- header-contacts -->