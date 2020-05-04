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
            $j('#cat-panel').click(function () {
                    let button = $j('#sidebar');
                    if((button.hasClass('active')) === false) {
                        $j('#sidebar').addClass('active');
                    }
                    else $j('#sidebar').removeClass('active');
            });
        };


        /*Equal height for prod cards*/

        $j(function() {
            $j('h2.woocommerce-loop-product__title').matchHeight();
            $j('.products .price').matchHeight();
            $j('.product').matchHeight();
        });


        let changeTranslation = function () {
            $j('.woocommerce-mini-cart__total strong').html('Всего:');
        };


        let nextProductCategoryArrow = function () {

            let lastChildCat = $j('.col-md-9 > ul.products');
                let cloned = $j('.woocommerce-pagination .next').clone().html('<i class="fa fa-arrow-circle-right"></i>');
                    cloned.wrap('<li class="product pagination-cat-arrow"></li>').parent()
                    .appendTo(lastChildCat);

                   let productHeight = $j('.product').outerHeight();
                   //console.log(productHeight);
                   let calcHeight = (productHeight/2)-22;

                    $j('.pagination-cat-arrow a .fa').css({'margin-top' : calcHeight});

        };



        sidebarMoove();
        changeTranslation();
        nextProductCategoryArrow();

    });



})

