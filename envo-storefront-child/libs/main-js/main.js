/*Preloader*/

function loadData() {
    return new Promise((resolve, reject) => {
        setTimeout(resolve, 1000);
    })
}

loadData()
    .then(() => {
        let preloaderEl = document.getElementById('preloader');
        preloaderEl.classList.add('hidden');
        preloaderEl.classList.remove('visible');
    });




// let $ = jQuery.noConflict();

jQuery(function($) {

    $(document).ready(function () {
        $('.s-slider').slick({
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
            $('#cat-panel').click(function () {
                let button = $('#sidebar');
                if((button.hasClass('active')) === false) {
                    $('#sidebar').addClass('active');
                }
                else $('#sidebar').removeClass('active');
            });
        };


        /*Equal height for prod cards*/

        $(function() {
            $('h2.woocommerce-loop-product__title').matchHeight();
            $('.products .price').matchHeight();
            $('.product').matchHeight();
            $('.about-advantages__descr p').matchHeight();
            $('.woocommerce .equal-height').matchHeight();

        });


        let changeTranslation = function () {
            $('.woocommerce-mini-cart__total strong').html('Всего:');
        };


        let nextProductCategoryArrow = function () {

            let lastChildCat = $('.col-md-9 > ul.products');
            let cloned = $('.woocommerce-pagination .next').clone().html('<i class="fa fa-arrow-circle-right"></i>');
            cloned.wrap('<li class="product pagination-cat-arrow"></li>').parent()
                .appendTo(lastChildCat);

            let productHeight = $('.product').outerHeight();
            //console.log(productHeight);
            let calcHeight = (productHeight/2)-42;

            $('.pagination-cat-arrow a .fa').css({'margin-top' : calcHeight});

        };

        let newPaginationArrows = function () {

            let nextArrow = '<i class="fa fa-arrow-right"></i>';
            let prevArrow = '<i class="fa fa-arrow-left"></i>'
            $('.navigation.pagination .next.page-numbers').html(nextArrow);
            $('.navigation.pagination .prev.page-numbers').html(prevArrow);

            $('.woocommerce-pagination .next.page-numbers').html(nextArrow);
            $('.woocommerce-pagination .prev.page-numbers').html(prevArrow);


        };

        let stickFooter = function () {
            let windowHeight = $(window).outerHeight();
            let headerHeight = $('.site-header').outerHeight();
            let headerHeightMenu = $('#site-navigation').outerHeight();
            let centerSection = $('#site-content').outerHeight();
            let footerHeight = $('.footer.container-fluid').outerHeight();

            let newCenterSectionHeight =  windowHeight - headerHeight - footerHeight - headerHeightMenu;

            if (centerSection < newCenterSectionHeight) {
                $('#site-content').outerHeight(newCenterSectionHeight);
            }

        };


        let filterCategoriesAjax = function () {
            let $mainBox = $('.products.columns-4');

            $('.widget_product_categories a').click(function (e) {
                e.preventDefault();

                let linkCat = $(this).attr('href');
                let titleCat = $(this).text();

                document.title = titleCat;
                //записуємо в історію браузера переходи по посиланню
                history.pushState({
                    page_title: titleCat
                }, titleCat, linkCat);

                ajaxCat(linkCat);
            });


            //Відслідковування подій натиснення кнопок в браузері вперед назад

            window.addEventListener("popstate", function (event) {
                document.title = event.state.page_title;
                ajaxCat(location.href);
            }, false);

            //making ajax request

            function ajaxCat (linkCat) {
                $mainBox.animate({opacity: 0.5}, 300);

                $.post (
                    myPlugin.ajaxurl,
                    {
                        action: 'get_cat',
                        link: linkCat
                    },

                    function (response) {
                        $mainBox
                            .html(response)
                            .animate({opacity: 1}, 300);
                    });

            };

        }

        sidebarMoove();
        changeTranslation();
        nextProductCategoryArrow();
        newPaginationArrows();
        stickFooter();
        filterCategoriesAjax();
    });

});

