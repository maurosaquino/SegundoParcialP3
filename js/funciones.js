//Funcion de interaccion entre Login.php y verficar_sesion.php
function Login(){

	var usuario =  $("#usuario").val();
	var password = $("#clave").val();

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"Login",us:usuario,ps:password}}).then(
		function(exito){

		if(exito=="si"){

		$("#contenedor").html("");	
		window.location.replace("index.html");	
			
		}else{

		$("#contenedor").html("El usuario o clave son incorrectos");	

		}	

		},function(error){

		$("#contenedor").html(error);	

		});
}

//Funcion de deslogueo
function DLlogin(){

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"DLogin"}}).then(
			function(exito){

			window.location.replace("login.php");		
		

			},function(error){

			$("#contenido").html(error);	

			});
}

//Funcion de carga de index segun variable de sesion usuario
function MostrarPlanilla(){

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"mGrilla"}}).then(
		function(exito){

		var t = JSON.parse(exito);

		switch (t.navegacion){

			case "admin":

			$( "#head").html(t.cabecera);
			$( "#contenido" ).load('html/pu.php');
			$( "#nv" ).load('html/ma.php');

			break;

			case "user":

			$("#head").html(t.cabecera);
			$( "#contenido" ).load('html/pu.php');
			$( "#nv" ).load('html/mu.php');

			break;

			case "invi":

			$("#head").html(t.cabecera);
			$( "#nv" ).load('html/mi.html');
			$("#contenido").load('html/fcds.php');

			break;

			case "nl":

			window.location.replace("login.php");	

			break;

		}

		},function(error){

		$("#contenido").html(error);

		});
}

//Funcion de mostrar planilla modificacion
function ModificarUsuario($id){

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"mfMod",parametro:$id}}).then(
			function(exito){

			$( "#contenido" ).load('html/pm.php');	
		

			},function(error){

			$("#contenido").html(error);	

			});
}

//Funcion Guardado Cambios modificacion
function GuardarCambios($id){
	
	var n = $("#nom").val();
	var e = $("#ema").val();
	var p = $("#perf").val();
	var c = $("#pass").val();

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"gfMod",
											 parametro:$id,
											 nombre:n,
											 email:e,
											 perfil:p,
											 password:c}}).then(
			function(exito){

			if(exito=="error"){
			
			alert("Los Datos no pueden estar vacios");	
			MostrarPlanilla();
				
			}else{

			alert(exito);	
			MostrarPlanilla();

			}

			},function(error){

			$("#contenido").html(error);	

			});
}

//Funcion mostrar formulario alta usuario
function AltaUsuario(){

	$( "#contenido" ).load('html/fa.html');	
}

//Funcion de guardado del usuario creado
function CrearUsuario(){

	var n = $("#nom").val();
	var e = $("#ema").val();
	var p = $("#perf").val();
	var c = $("#cla").val();

	$.ajax({url:"nexo.php",type:"post",data:{queHacer:"cNuev",
											 nombre:n,
											 email:e,
											 perfil:p,
											 password:c}}).then(
			function(exito){

			if(exito=="error"){
			
			alert("Los Datos no pueden estar vacios");	
			MostrarPlanilla();
				
			}else{

			alert(exito);	
			MostrarPlanilla();

			}

			},function(error){

			$("#contenido").html(error);	

			});
}

//Funcion de guardado del usuario creado
function ElUs($id){

	var c= confirm("Seguro que desea eliminar el usuario? No podra recuperarse");

	if(c){

			$.ajax({url:"nexo.php",type:"post",data:{queHacer:"elUs",
											 		 parametro:$id}}).then(
			function(exito){

			alert(exito);	
			MostrarPlanilla();

			},function(error){

			$("#contenido").html(error);	

			});

	}
}

function TraerCDs(){

		$("#contenido").load('html/fcds.php');

}



