$(document).foundation();

var currentElement = null;

//burger menu movil
$(".btn-nav").on("click tap", function(){
	$(".bar").toggleClass("animated");
 })

 $('#consulta-div').on('click', function() {
    window.open('https://tawk.to/chat/585959ccddb8373fd2b14f8e/default/?$_tawk_popout=true', 
                            '_blank', 'location=no,hidden=yes,closebuttoncaption=Done,toolbar=no');
  });