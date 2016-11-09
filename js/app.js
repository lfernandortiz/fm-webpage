$(document).foundation()
$(window).scroll(function() {
      if ($(this).scrollTop() > 2){
        $('#stickyMenu').addClass("barMenuSticky");
      }
      else{
        $('#stickyMenu').removeClass("barMenu");
      }
      });