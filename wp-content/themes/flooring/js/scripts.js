jQuery(document).ready(function($) {

  "use strict";


if($(window).width() > '900' ){
    jQuery('.animated').each(function(i, obj) {
        var anim_class = jQuery(this.element).data('animated');
        if(!jQuery(this).hasClass(anim_class)){
            jQuery('.animated').css('opacity', 0);
        }
    });
}


  //___________ animate Element when it visible
  $('.animated').waypoint(function() {
      var that = $(this.element).length > 0 ? $(this.element) : $(this);
      that.css('opacity', 1);
      that.addClass(that.data('animated'));
  },
  { offset: 'bottom-in-view' });


  /*_________________________________  Carousel ___________________*/
  $(".carousel_client").owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    loop:true,
    items:3,
    responsiveClass:true,
    responsive:{
      0:{
        items:2,
        nav:true
      },
      600:{
        items:3,
        nav:false
      },
      1000:{
        items:6,
        nav:true,
        loop:false
      },
      1200:{
        items:6,
        nav:true,
        loop:false
      }
    }
  });

  $(".owl-testimonail").owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items: 1,
    autoPlay: true,
    stopOnHover: true,
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav:true
      },
      800:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:true,
        loop:false
      }
    }
  });

/*_________________________________  Parallax ___________________*/

    if (!isMobile.apple.phone && !isMobile.android.phone && !isMobile.seven_inch) {
        $('.wd-form-image2').parallax("10%", -0.3);
        $('.wd-section-clients').parallax("30%", -0.3);
    }

  
/*__________________________portfolio masonry____________*/
// isotop on gallery

// cache container

var $container = $('#gallery-items');
// initialize isotope
$container.isotope({
  filter: '*',
 	itemSelector : '.element',
   animationEngine : 'best-available',
});

// filter items when filter link is clicked
  jQuery('#filters a').on('click',function (e) {
  $('.gallery-filter .current').removeClass('current');
  $(this).addClass('current');
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;


 });

  /*_________________________________ Slider  ________________________*/

    $(window).load(function() {
    $('.fullscreen .swiper-slide').height( window.innerHeight );
    $(window).resize(function() {
      $('.fullscreen .swiper-slide').height( window.innerHeight );
    });

    var mc = $(".swiper-container").data("mousewheel-control");
    var swiper = new Swiper('.swiper-container', {

        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        speed: 1000,
        effect: 'slide',
        autoplay: 8000,
        autoplayDisableOnInteraction: false,
        loop: true,
        mousewheelControl: mc,
        grabCursor: true,
        
        // Disable preloading of all images
    preloadImages: false,
    // Enable lazy loading
    lazyLoading: true,
    watchSlidesVisibility : true
        
    });
    $(window).trigger('resize');



    /*_________________________________ Waypoints ___________________*/





$('.wd-section-blog-services.style-3').waypoint(function() {
      $('.wd-section-blog-services.style-3').addClass('anim-on');
      $('.wd-section-blog-services.style-3 .wd-blog-post').addClass('nohover');
  },
  { offset: 'bottom-in-view' });

  $('.animated').css('opacity', 0);


  //___________ Add animation delay
  var thisParent     = $(this).closest( '.animation-parent'),
      animationDelay = thisParent.data('animation-delay');

  // find ".animation-parent"
  $('.animation-parent').each(function( index, element ) {
    // find each ".animated" in the current ".animation-parent"
    $('.animated', $(this)).each(function ( index, element ) {
      thisParent     = $(this).closest( '.animation-parent' );
      animationDelay = thisParent.data('animation-delay');
      animationDelay = animationDelay * index;
      $(this).css('animation-delay', animationDelay + 'ms');
    });
  });



    });





  

	
    /*_________________________________ Carousel  ________________________*/

    $("#owl-example").owlCarousel({
      items: 5,
    });
    var owl_blog = $('.wd-gallery-images-holder');
    owl_blog.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
    owl_blog.find('.owl-stage-outer').children().unwrap();


    $('.wd-gallery-images-holder').owlCarousel({
        items: 1,
        nav: true,
        rtl: true,
        margin: 0,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplay: true,
        autoplayTimeout: 5000,
    });



    /*_________________________________ fields animation  ________________________*/


    (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
            (function() {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                    return this.replace(rtrim, '');
                };
            })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
            // in case the input is already filled..
            if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.parentNode, 'input--filled' );
            }

            // events:
            inputEl.addEventListener( 'focus', onInputFocus );
            inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
            classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
            if( ev.target.value.trim() === '' ) {
                classie.remove( ev.target.parentNode, 'input--filled' );
            }
        }
    })();



  // _________________Empty Spaces

  if( $('.wd_empty_space').length ) {

    $('.wd_empty_space').each(function(i, obj) {
      wd_empty_space_padding(this);
    });

    window.addEventListener('resize', function () {
      $('.wd_empty_space').each(function(i, obj) {
        wd_empty_space_padding(this);
      });
    }, true);
  }

  function wd_empty_space_padding(el){
    var $mobile_height = $(el).data("heightmobile"),
      $tablet_height = $(el).data("heighttablet"),
      $desktop_height = $(el).data("heightdesktop");

    if (Modernizr.mq("(max-width: 40em)")) {
      $(el).css("height", $mobile_height);
    } else if (Modernizr.mq("(min-width: 40.063em) and (max-width: 64em)")) {
      $(el).css("height", $tablet_height);
    } else if (Modernizr.mq("(min-width: 64.063em)")) {
      $(el).css("height", $desktop_height);
    }
    $(document).foundation('equalizer', 'reflow');
  }

 


// -------------------------------------------------------------
//   min cart
// -------------------------------------------------------------
//
    var show_cart_btn = $(".show-cart-btn");

    show_cart_btn.on( "click", function() {
        $('.xoo-wsc-modal').toggleClass('xoo-wsc-active');
    });

    // Remove Close Cart Text

    setTimeout(function () {
        $('.xoo-wsc-remove').html('<span></span>');
    }, 4000);


    $("hidden-cart").on("mouseover", function () {
        $(this).css("display", "block");
    });

    $("hidden-cart").on("mouseout", function () {
        $(this).css("display", "none");
    });


    $(".show-search-btn").hoverIntent({
        over: searchover,
        out: searchout,
        timeout: 500
    });

    function searchover() {
        $('.hidden-search')
            .stop(true, true)
            .fadeIn({duration: 500, queue: false})
            .css('display', 'none')
            .slideDown(500);
    }

    function searchout() {
        $('.hidden-search')
            .stop(true, true)
            .fadeOut({duration: 100, queue: false})
            .slideUp(100);
    }


    $("hidden-search").on("mouseover", function () {
        $(this).css("display", "block");
    });

    $("hidden-search").on("mouseout", function () {
        $(this).css("display", "none");
    });
    $("hidden-search").on("mouseover", function () {
        $(this).css("display", "block");
    });

    // show cart button count
    var productCount = $(".woocommerce-mini-cart li").size();
    if(productCount == 0) {
        $(".show-cart-btn").append("<span class='min-cart-count'></span>");
        $('.min-cart-count').text(productCount);
    } else {
        $('.min-cart-count').text(productCount);
    }
    $('.widget_shopping_cart').bind("DOMSubtreeModified", function(){
        productCount = $(".woocommerce-mini-cart li").size();
        $('.min-cart-count').text(productCount);
    });


});
