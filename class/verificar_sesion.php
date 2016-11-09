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


					setcookie('sesion', json_encode($_SESSION), time()+3600,'/');

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