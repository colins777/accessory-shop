<?php /* Template Name: About Page */


get_header();
?>

<section class="about-page">
    <div class="container">

                <h1 class="main-page-block__title"><?php the_title()?></h1>
        <h2 class="about-advantages__title">Преимущества работы с нами</h2>
        <div class="about-advantages__wrap">


            <div class="about-advantages__item">
                <div class="about-advantages__square--wrap">
                    <div class="about-advantages__square--main">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="about-advantages__square--top">
                    </div>
                    <div class="about-advantages__square--bottom">
                    </div>
                </div> <!--about-advantages__square--wrap-->
                <div class="about-advantages__descr">
                    <p>Регулярные поставки комплектующих</p>
                </div>
            </div> <!--about-advantages__item-->


            <div class="about-advantages__item">
                <div class="about-advantages__square--wrap">
                    <div class="about-advantages__square--main">
                        <i class="fa fa-shield-alt"></i>
                    </div>
                    <div class="about-advantages__square--top">
                    </div>
                    <div class="about-advantages__square--bottom">
                    </div>
                </div> <!--about-advantages__square--wrap-->
                <div class="about-advantages__descr">
                    <p>Гарантия на товар</p>
                </div>
            </div> <!--about-advantages__item-->

            <div class="about-advantages__item">
                <div class="about-advantages__square--wrap">
                    <div class="about-advantages__square--main">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="about-advantages__square--top">
                    </div>
                    <div class="about-advantages__square--bottom">
                    </div>
                </div> <!--about-advantages__square--wrap-->
                <div class="about-advantages__descr">
                    <p>Широкий асортимент</p>
                </div>
            </div> <!--about-advantages__item-->

            <div class="about-advantages__item">
                <div class="about-advantages__square--wrap">
                    <div class="about-advantages__square--main">
                        <i class="fa fa-percent"></i>
                    </div>
                    <div class="about-advantages__square--top">
                    </div>
                    <div class="about-advantages__square--bottom">
                    </div>
                </div> <!--about-advantages__square--wrap-->
                <div class="about-advantages__descr">
                    <p>Скидки постоянным клиентам</p>
                </div>

            </div> <!--about-advantages__item-->
        </div> <!--container-->

        <div class="about-page__content"><?php the_post(); the_content();?></div>



    </div>
</section>




<?php get_footer();?>