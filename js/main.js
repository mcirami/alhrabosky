jQuery(document).ready(function($){

    var windowWidth = $(window).width();
    var topHeaderSocial = $('.top_header .social').html();
    var topHeaderLinks = $('.top_header .links').html();
    var mobileMenu = $('header_menu').html();

    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: 6000,
        autoHeight: true,
        autoplayDisableOnInteraction: false,
        centeredSlides: true,
        // zoom: true,

        // If we need pagination
        // pagination: '.swiper-pagination',

        // Navigation arrows
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',

        // And if we need scrollbar
        //scrollbar: '.swiper-scrollbar',

        effect: 'coverflow',

        coverflow: {
            rotate: 90,
            stretch: 0,
            depth: 1200,
            modifier: 1,
            slideShadows : true
        }
    });


    $(".fancybox").click(function(e){
        e.preventDefault();
    });

    $(".fancybox").fancybox({
        autoPlay: true,
        playSpeed: 4000,
        fitToView: true,
        maxWidth: "90%",
    });

    if (windowWidth <= 550) {
        var heroBackgroundMobile = $('#hero_mobile').attr('href');
        var familyBackgroundMobile = $('#family_mobile').attr('href');
        //document.getElementById("hero_section").style.backgroundImage = "url(" + heroBackgroundMobile + ") no-repeat !important";
        $('#hero_section').css("background", "url(" + heroBackgroundMobile + ") no-repeat");
        $('#home_family').css("background", "url(" + familyBackgroundMobile + ") no-repeat");
    }

    $('.menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
    });

    if (windowWidth > 768) {
        $('.sub-menu').clearQueue();

        subMenuHover();

    } else {
        $('.menu-item-has-children').unbind('mouseenter');
        $('.menu-item-has-children').unbind('mouseleave');
        mobileSubMenu();

        $('.mobile_header_links').html(topHeaderLinks);
        $('.social.mobile').html(topHeaderSocial);

    }

    $(window).on('resize', function(){
        if ($(window).width() <= 550) {
            var heroBackgroundMobile = $('#hero_mobile').attr('href');
            var familyBackgroundMobile = $('#family_mobile').attr('href');
            $('#hero_section').css("background", "url(" + heroBackgroundMobile + ") no-repeat");
            $('#home_family').css("background", "url(" + familyBackgroundMobile + ") no-repeat");
        } else {
            var heroBackgroundDesktop = $('#hero_desktop').attr('href');
            var familyBackgroundDesktop = $('#family_desktop').attr('href');
            $('#hero_section').css("background", "url(" + heroBackgroundDesktop + ") no-repeat");
            $('#home_family').css("background", "url(" + familyBackgroundDesktop + ") no-repeat");
        }

        if ($(window).width() > 768) {

            $('.sub-menu').clearQueue();

            subMenuHover();

            if ($('.menu').hasClass('open')) {
                $('.menu').removeClass('open');
                $('.mobile_menu_icon').removeClass('open');
                $('.wrapper').removeClass('fixed');
            }

            if ($('.menu-item-has-children > a').hasClass('open')) {
                $('.menu-item-has-children > a').removeClass('open');
                $('.menu-item-has-children > a').parent('li').removeClass('open');
                $('.menu-item-has-children > a').next('.sub-menu').slideUp(400);
            }

        } else {
            $('.menu-item-has-children').unbind('mouseenter');
            $('.menu-item-has-children').unbind('mouseleave');
            mobileSubMenu();

            $('.mobile_header_links').html(topHeaderLinks);
            $('.social.mobile').html(topHeaderSocial);
        }

    });

    $('.mobile_menu_icon').click(function(e){
        e.preventDefault();
        $(this).toggleClass('open');


        if ($('.menu').hasClass('open')) {
            $('.wrapper').removeClass('fixed');
        } else {
            window.setTimeout(function(){$('.wrapper').addClass('fixed');}, 800);
        }

        $('.menu').toggleClass('open');
    });

    function mobileSubMenu() {
        $('.menu-item-has-children > a').click(function(e) {

            if (!$(this).hasClass('open')) {
                e.preventDefault();
                $(this).next('.sub-menu').not(":animated").slideDown(400);
                $(this).addClass('open');
                $(this).parent('li').addClass('open');

            } else {
                e.preventDefault();
                $(this).next('.sub-menu').not(":animated").slideUp(400);
                $(this).removeClass('open');
                $(this).parent('li').removeClass('open');
            }
        });
    }

    function subMenuHover() {
        $('.menu-item-has-children').mouseenter( function() {
                $(this).children('.sub-menu').slideDown(100);
            }
        );

        $('.menu-item-has-children').mouseleave( function() {
                $(this).children('.sub-menu').slideUp(100);
            }
        );
    }

    $('#arrow_scroll').on('click', function(e){
        e.preventDefault();
        $('html,body').animate({scrollTop: $('#video').offset().top },1000);
    });


    /*
    var youtube = document.querySelectorAll( ".youtube_video" );

    for (var i = 0; i < youtube.length; i++) {

        youtube[i].addEventListener( "click", function() {

        var iframe = document.createElement( "iframe" );

            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

            this.innerHTML = "";
            this.appendChild( iframe );
        } );

    }

    var vimeo = document.querySelectorAll( ".vimeo_video" );

    for (var i = 0; i < vimeo.length; i++) {

        vimeo[i].addEventListener( "click", function() {

            var iframe = document.createElement( "iframe" );

            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://player.vimeo.com/video/"+ this.dataset.embed + "?autoplay=1" );

            this.innerHTML = "";
            this.appendChild( iframe );
        } );

    }
    */


});