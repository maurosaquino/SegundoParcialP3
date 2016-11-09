<?php
class verificar_sesion{


	static function verificar($parametro){
	
		require_once('servicios.php');

		$cliente = servicios::generarServicioF();

		$array = array($parametro[0],$parametro[1]);
		$retorno = servicios::llamarServicio('LoginWS',$array,$cliente);

		if(!empty($retorno)){

					$_SESSION["registrado"] = "si";
					$_SESSION["perfil"] = $retorno[0]["perfil"];
					$_SESSION["nombre"] = $retorno[0]["nombre"];
					$_SESSION["id"] = $retorno[0]["id"];

					setcookie("registrado","si",time()+36000 , '/');
					setcookie("perfil",$retorno[0]["perfil"],  time()+36000 , '/');
					setcookie("nombre",$retorno[0]["nombre"],  time()+36000 , '/');
					setcookie("id",$retorno[0]["id"],  time()+36000 , '/');

					return "si";
			}else{

					return "no";

		}
	}

	static function cerrar(){

					$_SESSION["registrado"] = "no";
					$_SESSION["perfil"] = "";
					$_SESSION["nombre"] = "";
					$_SESSION["id"] = "";
					$_SESSION["modificar"]="";
	}
	

}

?>