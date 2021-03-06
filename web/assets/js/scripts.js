(function($) {
    "use strict";
    /*==============================
        Is mobile
    ==============================*/
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    }

    // Tabs
    Tabs();
    function Tabs() {

        $('.tab .tab__nav').on('click', 'a', function(event) {

            event.preventDefault();

            var $this = $(this),
                $tabs = $this.closest('.tab'),
                $panel = $( $this.attr('href') ),
                $li = $this.closest('li');

            if( !$li.hasClass('active') ) {
                $('.tab__panel.active, .tab__nav .active', $tabs).removeClass('active');
                $li.addClass('active');
                $panel.addClass('active');
            }

        });

        if( $('.listing-single-bar').length ) {

            $('.listing-single-bar .tab__nav').on('click', 'a', function(event) {
                event.preventDefault();
                
                var $this = $(this),
                    offsetTop = $('.listing-single__tab').offset().top,
                    $wrap = $this.closest('.tab__nav'),
                    index = $this.parent('li').index();

                $('body').stop().animate({scrollTop: offsetTop - 30}, 300);

                if( $this.parent('li').hasClass('active') ) {
                    return false;
                } else {
                    $wrap.find('.active').removeClass('active');
                    $this.parent().addClass('active');
                    $('.listing-single .tab .tab__nav li').eq(index).find('a').trigger('click');
                }

            });

            $('.listing-single__tab .tab__nav').on('click', 'a', function(event) {
                event.preventDefault();
                var $this = $(this),
                    index = $this.parent('li').index();

                $('.listing-single-bar .tab__nav .active').removeClass('active');
                $('.listing-single-bar .tab__nav li').eq(index).addClass('active');
            });
        }
    }

    // Accordion
    Accordion();
    function Accordion() {

        $('.wil_accordion').on('click', '.wil_accordion__header a', function(event) {
            event.preventDefault();

            var $this = $(this),
                $accordion = $this.closest('.wil_accordion'),
                $header = $this.closest('.wil_accordion__header'),
                $panel = $($this.attr('href'), $accordion),
                $headerActive = $('.wil_accordion__header.active', $accordion),
                $panelActive = $('.wil_accordion__content.active', $accordion);

            if( $header.hasClass('active') ) {
                $panel.slideToggle(300).toggleClass('active');
                $header.toggleClass('active');
            } else {

                $panelActive.slideUp(300).removeClass('active');
                $headerActive.removeClass('active');

                $panel.slideDown(300).addClass('active');
                $header.addClass('active');
            }

        });
    }

    owlCarousel();
    function owlCarousel() {

        if( $('.twitter-slider').length ) {
            $('.twitter-slider').owlCarousel({
                items: 1,
                nav: true,
                // loop: true,
                navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>']
            })
        }

        if( $('.events-carousel').length ) {
            $('.events-carousel').owlCarousel({
                items: 1,
                nav: true,
                // loop: true,
                navText: ['<i class="arrow_left"></i>', '<i class="arrow_right"></i>']
            })
        }

        if( $('.blog-carousel').length ) {
            $('.blog-carousel').owlCarousel({
                nav: true,
                margin: 30,
                loop: true,
                navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>'],
                responsive: {
                    1200 : {
                        items: 3
                    },
                    768 : {
                        items: 2
                    },
                    0 : {
                        items: 1
                    }
                }
            })
        }

        $('.testimonials').each(function(index, el) {
            var self = $(this),
                $owl1 = self.find('.testimonial__avatars'),
                $owl2 = self.find('.testimonials-carousel');

            if( $owl1.length ) {

                $owl1.owlCarousel({
                    center: true,
                    items: 3,
                    loop: true,
                    nav: false,
                    autoplay: true,
                    margin: 10,
                    smartSpeed: 700
                });
            }

            if( $owl2.length ) {

                $owl2.owlCarousel({
                    items: 1,
                    nav: false,
                    loop: true,
                    autoplay: false,
                    smartSpeed: 700,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false,
                    freeDrag: false
                });
            }

            $owl1.on('changed.owl.carousel', function(event) {
                $owl2.trigger('to.owl.carousel', [event.item.index, 300]);
            }); 

            $owl1.on('click', '.owl-item', function(event) {

                var index = $(this).index(),
                    carousel = $owl1.data('owl.carousel');

               index = carousel.relative(index);

                $owl1.trigger('to.owl.carousel', [index, 300]);
                $owl2.trigger('to.owl.carousel', [index, 300]);
            });

        });

    }

    toggleDropDown();
    function toggleDropDown() {
        $('.header__user').on('click', '.user__avatar', function(event) {
            event.preventDefault();
            $(this).closest('.header__user').toggleClass('active');
        });

        $('.header__user').on('click', '.user__icon', function(event) {
            event.preventDefault();
            
        });

        $('.header__notifications').on('click', '.notifications__icon', function(event) {
            event.preventDefault();
            $(this).closest('.header__notifications').toggleClass('active');
        });

        $('.account-nav__toggle').on('click', function(event) {
            event.preventDefault();
            
            $('.account-nav').toggleClass('active');
        });

        $('.listing-filter__button').on('click', function(event) {
            event.preventDefault();
            
            $('.from-wide-listing').slideToggle();
        });

        $('.label--dropdown').on('click', function(event) {
            event.preventDefault();
            $(this).toggleClass('active');
        });

    }

    formEvent();
    function formEvent() {

        $('.settings-more__icon, .action-ok, .action-cancel').on('click', function(event) {
            event.preventDefault();

            var wrap = $(this).closest('.listgo-mapsearch');

            if( wrap.length ) {
                $(this).closest('.item--settings-more').find('.settings-more').slideToggle();
            }

            $(this).closest('.item--settings-more').find('.settings-more').toggleClass('active');
        });

        $('.input-slider').each(function(index, el) {
            var self = $(this),
                $wrap = self.closest('.item--radius'),
                $number = $('.label-number', $wrap);

            self.slider({
                value: 50,
                slide: function( event, ui ) {
                    $(this).find('input').val(ui.value);
                    $number.text( ui.value );
                }
            });
        });

        $('.input-datepicker').each(function(index, el) {

            var self = $(this);

            self.datepicker({
                beforeShow: function(input, inst) {
                    $('#ui-datepicker-div').addClass('wo_datepicker');
                }
            });
        });

        // $('.icon-search-map, .mapsearch__close').on('click', function(event) {
        //     event.preventDefault();
        //     $('.listgo-mapsearch, .icon-search-map').toggleClass('active');
        // });

        $('.dropdown').on('click', 'span' , function(event) {
            event.preventDefault();
            var $this = $(this),
                target = $this.data('tagert');

            if($this.hasClass('active'))
                return false;

            $this.parent().find('.active').removeClass('active');
            $this.addClass('active');
            $('#leave-now, #depart-at').removeClass('active');
            $(target).addClass('active');
            $this.closest('.label--dropdown').find('.label-dropdown--text').text($this.text());
        });
            
    }

    // Modal Popup
    ModaPopup();
    function ModaPopup() {

        $('[data-modal]').on('click', function(event) {

            var $this   = $(this),
                id      = $this.data().modal;

            if( typeof id != 'undefined' && $(id).length ) {
                $(id).addClass('wil-modal--open');

                return false;
            }

        });

        $('.wil-modal__close').on('click', function(event) {
            $(this).closest('.wil-modal').removeClass('wil-modal--open');
        });
    }

    // Scroll Bar
    scrollBar();
    function scrollBar() {

        if(isMobile.any() == null) {

            if( $('.header__notifications .notifications__list').length ) {
                $('.header__notifications .notifications__list').perfectScrollbar();
            }

            if ($('.mapsearch__form').length) {
                $('.mapsearch__form').perfectScrollbar();
            }
        }
    }

    // Mobile addClass
    mobileClass();
    function mobileClass() {
        if(isMobile.any() !== null) {
            $('.notifications__scrollbar').addClass('notifications__scrollbar--mobile');
        } else {
            $('.notifications__scrollbar').removeClass('notifications__scrollbar--mobile');
        }
    }

    // Menu
    menuResponsive();
    function menuResponsive() {

        if( $('#header').length ) {
            var self = $('#header'),
                dataBreak = self.data('breakMobile');

            if(!dataBreak) {
                dataBreak = 991;
            }

            $(window).on('resize', function(event) {
                event.preventDefault();

                if( $(window).innerWidth() <= dataBreak ) {
                    self.addClass('header-responsive')
                } else {
                    self.removeClass('header-responsive')
                }

            }).trigger('resize');
        }

        $('.header__toggle, .header-mobile__close').on('click', function(event) {
            event.preventDefault();
            
            $('body').toggleClass('menu-mobile__open');
        });
    }

    // Popup Gallery
    PopupGallery();
    function PopupGallery() {
        if( $('.popup-gallery').length ) {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                closeBtnInside: false,
                closeMarkup: '<div class="popup-gallery__close pe-7s-close"></div>',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1],
                    arrowMarkup: '<div title="%title%" class="popup-gallery__nav arrow_%dir%"></div>',
                    tCounter: '%curr%<span>/</span>%total%' // markup of counter
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(item) {
                        if(typeof item.el.attr('data-title') != 'undefined')
                            return item.el.attr('data-title');
                        return '';
                    }
                }
            });
        }
    }

    // Background Video Youtube
    bgVideoYoutube();
    function bgVideoYoutube() {

        if( $('.bg_video').length ) {

            $('.bg_video').each(function(index, el) {

                var self = $(this),
                    container = self.closest('.bg-video');

                self.mb_YTPlayer({
                    containment: container
                });
            });
            
        }
    }

    // masonry
    Masonry();
    function Masonry() {
        if( $('.wil_masonry').length ) {
            $('.wil_masonry').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }
    }

    // Select2
    select2();
    function select2() {
        if($('.wil-select2').length) {
            $('.wil-select2').select2();
        }
    }

    // Single Listing Bar
    listingBar();
    function listingBar() {

        if( $('.listing-single__tab').length && $('.listing-single-bar').length ) {

            var offset = $('.listing-single__tab').offset().top,
                offsetFooter = $('#footer').offset().top,
                windowScroll;
                
            $(window).on('scroll', function(event) {
                event.preventDefault();
                windowScroll = $(this).scrollTop();

                if(windowScroll > offset ) {
                    $('.listing-single-bar').addClass('active');
                } else {
                    $('.listing-single-bar').removeClass('active');
                }
            }).trigger('scroll');
        }
    }

	$(window).on('resize', function() {

        var widow_w = $(window).innerWidth();

        if(widow_w > 480) {
            
            if( $('.from-wide-listing') ) {
                $('.from-wide-listing').css('display', '');
            }
        }
	});

    // ToogleCreateAccount
    createAccountToggle();
    function createAccountToggle() {
        $('#createaccount').on('change', function(event) {

            var self = $(this);

            if(self.is(':checked')) {
                $('.create-account-field').show();
            } else {
                $('.create-account-field').hide();
            }

        });
    }

    // Select Rating
    selectRating();
    function selectRating() {
        $('.comment__rate').on('click', 'a', function(event) {
            event.preventDefault();

            var self = $(this),
                index = self.index() + 1,
                $parent = self.parent();

            $parent.addClass('selected');
            $parent.find('.active').removeClass('active');
            self.addClass('active');
        });
    }

    // Map Widget
    widgetMap();
    function widgetMap() {

        if( $('.widget-map').length ) {

            $('.widget-map').each(function(index, el) {

                var self = $(this),
                    location = self.data('location'),
                    markerIcon = self.data('marker');

                if(location) {

                    var center = new google.maps.LatLng(location[0],location[1]);

                    var options = {
                        zoom: 18,
                        center: center,
                        scrollwheel: false
                    };

                    var map = new google.maps.Map(self[0], options);

                    google.maps.event.addDomListener(window, 'resize', function() {
                        map.setCenter(center);
                    });

                    if(markerIcon) {
                        var marker = new google.maps.Marker({
                            position: center,
                            map: map,
                            zIndex: 1,
                            icon: markerIcon
                        });

                        marker.setMap(map);
                    }
                }

            });
        }
    }

    // Team Preview Sticky
    teamPreviewSticky();
    function teamPreviewSticky() {

        if( $('.wil-team__left').length ) {
            $('.wil-team__left').theiaStickySidebar({
                containerSelector: '.wil-team',
                additionalMarginTop: 50
            });

            $('.wil-team__carousel').owlCarousel({
                items:1,
                loop:false,
                nav: false,
                dots: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                URLhashListener:true,
                autoplayHoverPause:true,
                startPosition: 'URLHash'
            });
        }
    }

    // GridRatio
    GridRatio();
    function GridRatio() {

        if( $('.wil-gridratio').length ) {

            $('.wil-gridratio').each(function(index, el) {

                var self = $(this);

                

                self.gridrotator({
                    rows : 2,
                    columns : 6,
                    w1400: { rows: 3, columns: 3 },
                    w1024 : { rows : 3, columns : 6 },
                    w768 : {rows : 3, columns : 5 },
                    w480 : {rows : 3, columns : 5 },
                    w320 : {rows : 2, columns : 4 },
                    w240 : {rows : 2, columns : 3 },
                    step: "random",
                    maxStep: 3,
                    animType: "random",
                    animSpeed: 500,
                    interval: 2000,
                    nochange: [],
                    preventClick: false,
                    resize: function() {
                        self.find('li').hoverdir({
                            speed: 250,
                            hoverElem: '.wil-gridratio__caption'
                        });
                    },
                    replaceItem: function(i) {
                        
                        $('.wil-gridratio__caption',i).css('left', '-100%');

                        $(i).hoverdir({
                            speed: 250,
                            hoverElem: '.wil-gridratio__caption'
                        });

                    }
                });

                

                
            });
            
        }
    }


})(jQuery);