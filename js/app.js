$(document).foundation();

//close off-canvas
$('.off-canvas a').on('click', function() {
  $('.off-canvas').foundation('close');
});

//activa menu
 $('.menu li a').click(function(){
    $('li a').removeClass("activation");
    $(this).addClass("activation");
});


//activa menu
 $('.vertical .menu li a').click(function(){
    $('li a').removeClass("activation");
    $(this).addClass("activation");
});
