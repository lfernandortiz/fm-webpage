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

//activa menu off-canvas
 $('.vertical .menu li a').click(function(){
    $('li a').removeClass("activation");
    $(this).addClass("activation");                                            
});


//eventos para la multimedia y procesamiento del formulario
var asyncRequest;
var mensajes = [ "Ingrese su nombre completo",
				 "Ingrese una direccion de correo valida" , 
				 "Es necesario una direccion de correo eletrónico",
				 "Debe colocar un número de telefono de contacto",
				 "Ingrese su comentario"];

function iniciar() {
	var sonido = document.getElementById("jigle");
	sonido.play();
	//registro de eventos de envio del formulario
	var botonForm = document.getElementById("enviarForm");
	var botonFormSmall = document.getElementById("enviarFormSmall");
	botonForm.addEventListener("click",  enviarFormulario, false);
	botonFormSmall.addEventListener("click",  enviarFormulario, false);

	document.getElementById("nombreCliente").addEventListener( "blur" , validarNombre, false),
}

function enviarFormulario(){	
	validarFormulario();
	var url = "modules/processform.php?";
	var nombre = document.getElementById("nombreCliente").value;
	var email = document.getElementById("emailCliente").value;
	var telefono = document.getElementById("telefonoCliente").value;
	var comentario = document.getElementById("comentarioCliente").value;
	url += "name="+nombre+"&email="+email+"&telefono="+telefono+"&comentario="+comentario;	
	console.log(url)
	try{
		asyncRequest = new XMLHttpRequest();
		asyncRequest.addEventListener(
			"readystatechange", stateChange, false);
		asyncRequest.open("GET", url, true); 
		asyncRequest.send(null);
	}catch(excepcion){}
}

function stateChange() {
	if (asyncRequest.readyState == 4 && asyncRequest.status == 200) {		
		var response = asyncRequest.responseText;
		console.log(">"+response);
		if(response === "true"){	
			// reestablece el formulario		
			document.getElementById("nombreCliente").value = "";
			document.getElementById("emailCliente").value = "";
			document.getElementById("telefonoCliente").value = "";
			document.getElementById("comentarioCliente").value = "";
			document.getElementById("calloutForm").style.display = 'block';
			document.getElementById("span0").setAttribute("class","input input--yoshiko") ;
			document.getElementById("span1").setAttribute("class","input input--yoshiko") ;
			document.getElementById("span2").setAttribute("class","input input--yoshiko") ;
			document.getElementById("span3").setAttribute("class","input input--yoshiko") ;
		}			 
	} 
}

function validarFormulario(){
	var nombre  = document.getElementById("nombreCliente").value;
	if(nombre == " " || nombre == ""){
		
		return false

	}
}

function validateEmail(email){        
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return emailPattern.test(email);   
 }  

window.addEventListener("load", iniciar, false);
