$(document).ready(function () {
  

  
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  var width_container_left=0;
  var left_item_button=width_container_left;
  
  if(screen.width <=1024) {
    width_container_left=screen.width;
    left_item_button=-width_container_left;

    $(".topmenu").click(function() {
        console.log('da');

        if($('.sidenav').hasClass('afisat')) {
          $('.sidenav').removeClass('afisat');

          $(".sidenav").css( {
              right:left_item_button+'px'
            }

          );
        }
      }

    );
  }



//   $('.hidden-element-button').click(function () {
//     if ($(this).parent().find($('.hidden-text-container')).hasClass('element-afisat')) {
//         $(this).find('.hidden-element-plus').find('.plus-sign').css('left', '14px');
//         $(this).find('.hidden-element-plus').find('.minus-sign').css('right', '100%');
//         $(this).parent().find($('.hidden-text-container')).removeClass('element-afisat');
//         $(this).parent().find($('.hidden-text-container')).slideUp();
//     } else {
//         $(this).find('.hidden-element-plus').find('.plus-sign').css('left', '100%');
//         $(this).find('.hidden-element-plus').find('.minus-sign').css('right', '14px');
//         $('.hidden-text-container').slideUp();
//         $('.hidden-text-container').removeClass('element-afisat');
//         $(this).parent().find($('.hidden-text-container')).addClass('element-afisat');
//         $(this).parent().find($('.hidden-text-container')).slideDown();
//     }
// });

  $('.footer-element-mobile').click(function () {
    if ($(this).find($('.footer-element-mobile-container')).hasClass('element-afisat')) {
      $(this).find($('.footer-element-mobile-container')).removeClass('element-afisat');
      $(this).find($('.footer-element-mobile-container')).slideUp();
      $(this).find($('.footer-element-image-mobile')).css('transform','rotate(0deg)');
    } else {
      $('.footer-element-mobile-container').slideUp();
      $('.footer-element-mobile-container').removeClass('element-afisat');
      $(this).find($('.footer-element-image-mobile')).css('transform','rotate(180deg)');
        $(this).find($('.footer-element-mobile-container')).addClass('element-afisat');
        $(this).find($('.footer-element-mobile-container')).slideDown();
    }
});

  $(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
      $(".scroll-up").css("display", "block");
    } else {
      $(".scroll-up").css("display", "none");
    }
  });

  $(".scroll-up").click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  });


  function getPathUrlParameter() {
    var getUrl = window.location;
    return getUrl.pathname
  }

  if (getPathUrlParameter() == '/' || window.location.href.indexOf("recruit") > -1 || window.location.href.indexOf("steps") > -1 || window.location.href.indexOf("terms") > -1 || window.location.href.indexOf("cookies") > -1 || window.location.href.indexOf("politica") > -1) {
    $("linie").css('visibility', 'hidden');
  } else {
    $("linie").css('visibility', 'visible');
  }

  
  $(".header-item").mouseover(function () {
    if (getPathUrlParameter() == '/' || window.location.href.indexOf("recruit") > -1 || window.location.href.indexOf("steps") > -1 || window.location.href.indexOf("terms") > -1 || window.location.href.indexOf("cookies") > -1 || window.location.href.indexOf("politica") > -1) {
      $("linie").css('visibility', 'visible');
    } else {
      $("linie").css('visibility', 'visible');
    }
  });
  $(".header-item").mouseleave(function () {
    if (getPathUrlParameter() == '/' || window.location.href.indexOf("recruit") > -1 || window.location.href.indexOf("steps") > -1 || window.location.href.indexOf("terms") > -1 || window.location.href.indexOf("cookies") > -1 || window.location.href.indexOf("politica") > -1) {
      $("linie").css('visibility', 'hidden');
    } else {
      $("linie").css('visibility', 'visible');
    }
  });

  if (screen.width <= 1024) {
    width_container_left = screen.width;
    left_item_button = +width_container_left;
  
    $(".topmenu").click(function () {
        console.log('da');
  
        if ($('.sidenav').hasClass('afisat')) {
          $('.sidenav').removeClass('afisat');
  
          $(".sidenav").css({
              right: left_item_button + 'px'
            }
  
          );
        }
      }
  
    );
  }
  
  $(".back-button").click(function() {
    if($('.sidenav').hasClass('afisat')) {
      $('.sidenav').removeClass('afisat');

      $(".sidenav").css( {
          right:'100%'
        }

      );
    }
  }
);


  $(".sidenav-lang").click(function() {
    console.log('da');
    if($('.sidenav-change-language').hasClass('afisat')) {
      $('.sidenav-change-language').removeClass('afisat');

      $(".sidenav-change-language").css( {
          left:'-50%'
        }

      );
    }

    else{
      $('.sidenav-change-language').addClass('afisat');
      $(".sidenav-change-language").css( {
        left:'0%'
      }

    );
    }



  }
);



  
  $(".topmenu").click(function () {
      if ($('.sidenav').hasClass('afisat')) {
        $('.sidenav').removeClass('afisat');
  
        $(".sidenav").css({
            right: left_item_button + 'px'
          }
  
        );
      } else {
        $('.sidenav').addClass('afisat');
  
        $(".sidenav").css({
            right: '0'
          }
  
        );
      }
    }
  
  );
    
});