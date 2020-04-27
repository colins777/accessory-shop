let $j = jQuery.noConflict();

$j(function () {
    $j(document).ready(function () {
        $j('.s-slider').slick({
            dots: true,
            autoplay: false,
            infinite: true,
            speed: 1000,
            fade: true,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dotsClass: "my-dots",
            prevArrow: '<div class="prev-arrow">12</div>',
            nextArrow: '<div class="next-arrow">123</div>'
        });


        let sidebarMoove = function () {
            $j('#button-sidebar').click(function () {
                //console.log('1234');
                $j('#sidebar').css({'display' : 'block', 'left' : 0});
            });
        };

        //sidebarMoove();

        $j(function() {
            $j('h2.woocommerce-loop-product__title').matchHeight();
        });

    });
})

