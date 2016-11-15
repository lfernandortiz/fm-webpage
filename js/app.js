$(document).foundation();
$('.off-canvas a').on('click', function() {
  $('.off-canvas').foundation('close');
});


  $('.menu li a').click(function(){
    $('li a').removeClass("activation");
    $(this).addClass("activation");
});
