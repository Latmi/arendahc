$(function () {
   console.log('jQuery ready');
    if ($('.slider_main').length) {
        $('.slider_main').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                    loop:false
                }
            }
        });
    }

    if ($('.slider_object').length) {
        $('.slider_object').owlCarousel({
            loop:true,
            margin:10,
            dots: false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    loop:false
                }
            }
        });

        $('.owl-next').html('<i class="fas fa-caret-right"></i>');
        $('.owl-prev').html('<i class="fas fa-caret-left"></i>');



    }

    if ($('.slider_objects').length) {
        $('.slider_objects').owlCarousel({
            loop:true,
            margin:80,
            dots: false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    loop:false
                },
                768:{
                    items:2,
                    nav:true,
                    loop:false
                }
            }
        });

        $('.owl-prev').html('<img style="width: 30px;" src="/local/templates/ARENDA_HC_test/images/arrow-red.svg" />');
        $('.owl-next').html('<img style="width: 30px; transform: scale(-1,1)" src="/local/templates/ARENDA_HC_test/images/arrow-red.svg" />');

    }
    function triangleWhite() {
        let triangleWhite = $('.triangle-white');
        let widthTriangleWhite = triangleWhite.parent().width();
        triangleWhite.css({
            borderLeft: widthTriangleWhite / 2  + 'px solid rgba(255, 255, 255, 0.58)'
        });
    }

    function triangleRed() {
        let triangleRed = $('.triangle-red');
        let widthTriangleRed = triangleRed.parent().width();
        triangleRed.css({
            border: widthTriangleRed + 'px solid transparent',
            borderTop: '220px solid rgba(230, 0, 1, 0.58)',
            borderRight: '0px solid rgba(230, 0, 1, 0.58)'
        });
    }


    triangleRed();
     triangleWhite();

    $(window).resize(function () {
        triangleRed();
        triangleWhite();
    });


    let navLink = $('.nav-link');
    navLink.each(function () {
        if ($(this).hasClass('active')) {
            console.log('active');
            $(this).css({ fontFamily: 'ProximaNovaBold, sans-serif' }).children().show();
        }
    });

    const hWindow = $(window).height();
    console.log('hWindow', hWindow);
    let hBxPanel = 0;
    if ($('#bx-panel').length) {
        hBxPanel = $('#bx-panel').height();
    }
    const hHeader = $('.header').height();
    const hFooter = $('.foot').height();
    const main = $('#main');

    let hMain = hWindow - (hBxPanel + hHeader + hFooter);

    main.css({ minHeight: hMain });

    /**
     * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
     *
     * @private
     * @author Todd Motto
     * @link https://github.com/toddmotto/foreach
     * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
     * @callback requestCallback      callback   - Callback function for each iteration.
     * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
     * @returns {}
     */
    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    var mobileMenu = document.querySelectorAll(".mobile-menu-container")[0];
    if (hamburgers.length > 0) {
        forEach(hamburgers, function(hamburger) {
            hamburger.addEventListener("click", function() {
                this.classList.toggle("is-active");
                mobileMenu.classList.toggle("is-active-menu");
            }, false);
        });
    }


});


