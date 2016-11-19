var asyncRequest;
function iniciar() {
	var sonido = document.getElementById("jigle");
	sonido.play();

	var botonForm = document.getElementById("enviarForm");
	var botonFormSmall = document.getElementById("enviarFormSmall");
	botonForm.addEventListener("click",  enviarFormulario, false);
	botonFormSmall.addEventListener("click",  enviarFormulario, false);
}

function enviarFormulario(){	
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
			document.getElementById("nombreCliente").value = "";
			document.getElementById("emailCliente").value = "";
			document.getElementById("telefonoCliente").value = "";
			document.getElementById("comentarioCliente").value = "";
			document.getElementById("calloutForm").style.display = 'block';
		}			 
	} 
}

window.addEventListener("load", iniciar, false);