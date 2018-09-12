(function ($) {

    var load = null;

    $(window).on('load', function(){

        $('#status').delay(300).fadeOut();
        $('#pre-loader').delay(500).fadeOut('slow');
        $('body').delay(100).css({'overflow':'visible'});
        load = false;

    });

    load = true;

    //header nav page offre d'emploi
    var go = true;

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100 && go) {
            $("#nav-header-offre").animate({top:'0px'}, 800);
            go = false;
        } else if ($(this).scrollTop() === 0 && !go) {
            $("#nav-header-offre").animate({top :'-176px'}, 500);
            go = true;
        }
    });

    // Open nav filter prestations
    $('.selected').click(function() {
        $('.submenu-secteurs').hide();
        $('.submenu-prestations').hide();
        return false;
    });

    $('.test-prestations').click(function() {
        $('.submenu-prestations').slideToggle( "slow");
        $('.submenu-secteurs').hide();
        return false;
    });

    $('.test-secteurs').click(function() {
        $('.submenu-secteurs').slideToggle( "slow");
        $('.submenu-prestations').hide();
        return false;
    });

    // Match height bloc
    $('.bloc-offre-emploi, .bg-bloc-newsroom, .bloc-newsroom').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        }
    );

    $('.bloc-adresse, .bloc-contact').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        }
    );

    // Mansonry realisations
    var $container = $('.content-realisations');
    $container.isotope({
        itemSelector: '.bloc-offre-realisations, .bloc-newsroom',
        layoutMode: 'masonry',
        margin:15
    });

    $container.imagesLoaded().progress( function() {
        $container.isotope('layout');
    });

    // filter realisations
    $('.selected, .submenu-prestations a, .submenu-secteurs a').click(function() {
        var selector = $(this).attr('data-filter');
        $('.content-realisations').isotope({ filter: selector });
        return false;
    });

    // Open modal project

    var titleClick = $('.hover-realisations');
    var modal = $('#modal');
    var modal_target = $('#modal_target');

    titleClick.click(function(event) {

        event.preventDefault();
        var id = $(this).attr('id');
        console.log(id);
        var ville = '';
        var video = '';

        $.ajax({
            url: adminAjax,
            data: {
                'action' : 'fetch_modal_content',
                'id' : id,
                'ville' : ville,
                'video' : video
            },

            success:function(data) {
                modal_target.html(data);
                modal.fadeIn(500);
                $('body').css({'overflow' : 'hidden'});

                $('.close-modal-realisation').click(() => {
                    $('.modal').fadeOut(500);
                    setTimeout(() => {
                        $('.modal-body').remove();
                    }, 600);
                    $('body').css({'overflow' : 'scroll'});
                });
            }
        });
    });


    $('#col-left-offre .owl-carousel').owlCarousel({
        autoHeight: false,
        smartSpeed: 900,
        autoplay: true,
        loop:true,
        dots: true,
        nav: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('#plus-offres-mobile .owl-carousel').owlCarousel({
        smartSpeed: 900,
        loop:true,
        dots: false,
        nav: true,
        navText:["<img src='https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-left.png'>","<img src='https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-right.png'>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    // Owl carousel
    $('#nos-offres .owl-carousel').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        dots:false,
        navText:["<img src='https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-left.png'>","<img src='https://demo.elle-et-la.com/infime/wp-content/themes/genesis-sample/images/arrow-slide-right.png'>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            900:{
                items:4
            },
            1000:{
                items:6
            }
        }
    });

    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        dots:false,
        navText:["<img src='wp-content/themes/genesis-sample/images/arrow-slide-left.png'>","<img src='wp-content/themes/genesis-sample/images/arrow-slide-right.png'>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    const body = document.querySelector('body');
    const navOffer = document.querySelector('#menu-item-393');
    const offers = document.querySelector('#plus-offres');
    const mobileOffers = document.querySelector('#plus-offres-mobile');
    const siteTitle = document.querySelector('.site-title a');
    const hideOfferNav = document.querySelector('#hideOfferNav');
    const socialNetwork = document.querySelectorAll('.custom-html-widget p a');
    const genesisNavMenu = document.querySelectorAll('.genesis-nav-menu a');


    hideOfferNav.addEventListener('click', e => {
        e.preventDefault();
        e.stopPropagation();
        mobileOffers.classList.toggle("display-offers-mobile");

    });

    //Toggle the two navbar according to the width
    if (screen.width < 800) {
        offers.style.display = 'none';
    } else {
        mobileOffers.style.display = 'none';
    }

    // Check URL and choose the infime logo
    let url = window.location.href.split('/');
    if (url[url.length -2] == 'realisations' || url[url.length -2] == 'newsroom') {
        siteTitle.setAttribute('style', "background: center url('http://localhost:8888/infime/wp-content/uploads/2018/09/infime_blue@2x.png') no-repeat !important; background-size: contain !important");
    }

    navOffer.addEventListener('click', e => {
        e.preventDefault();

        if (screen.width < 800) {
            mobileOffers.classList.toggle("display-offers-mobile");
        } else {
            offers.classList.toggle("display-offers");
        }

        if (body.className.indexOf("post-type-archive-realisations") != -1 || body.className.indexOf("blog") != -1) {
            return;
        } else if (offers.className.indexOf("display-offers") != -1) {
            siteTitle.setAttribute('style', "background: url('http://localhost:8888/infime/wp-content/uploads/2018/09/infime_blue@2x.png') no-repeat !important");
            siteTitle.style.backgroundSize = "contain";
            siteTitle.style.backgroundPosition= "center";
            genesisNavMenu.forEach(elem => elem.style.color = "#001DC0");
            socialNetwork.forEach(elem => elem.style.color = "#001DC0");
        } else if (mobileOffers.className.indexOf("display-offers-mobile") != -1 & screen.width < 800) {
            siteTitle.style.backgroundImage = "url('http://localhost:8888/infime/wp-content/uploads/2018/09/infime_logotransparence@2x.png')";
            genesisNavMenu.forEach(elem => elem.style.color = "#001DC0");
            socialNetwork.forEach(elem => elem.style.color = "#001DC0");
        } else {
            siteTitle.style.backgroundImage = "url('http://localhost:8888/infime/wp-content/uploads/2018/09/infime_logotransparence@2x.png')";
            genesisNavMenu.forEach(elem => elem.style.color = "white");
            socialNetwork.forEach(elem => elem.style.color = "white");
        }

        siteTitle.style.backgroundRepeat = "no-repeat";
    });

    // play video page offres
    if(load === true && $("#video video")[0]){
        $("#video video")[0].play();
    }

})(jQuery);