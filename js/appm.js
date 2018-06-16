/**| @lfernandortiz - @SoftDromedicas*/
$(document).foundation();
console.log("%cDesarrollado por @Softdromedicas ( @lfernandortiz - @SaidRodriguezC )", "background: #000a7b; color: white; font-size: normal");

//burger menu movil
var burger = document.querySelector('#content-burgermenu');

// create a simple instance
// by default, it only adds horizontal recognizers
var mc = new Hammer(burger);

// listen to events...
mc.on("panleft panright tap press", function(ev) {
    $(".bar").toggleClass("animated");
    $(".offcanvas").toggleClass("view");
    $(".burger__menu li").toggleClass("view");
    $("#logo-offcanvas").toggleClass("view");
    document.body.classList.toggle("open");
  console.log( ev.type +" gesture detected.");
});

$("#content-burgermenu").on("click tap", function(){
  
 })

 //mantiene la ventana del chat en la aplicacion
 $('#consulta-div').on('click', function() {
    window.open('https://tawk.to/chat/585959ccddb8373fd2b14f8e/default/?$_tawk_popout=false', 
                            '_blank', 'location=no,hidden=yes,closebuttoncaption=Done,toolbar=no');
  });

