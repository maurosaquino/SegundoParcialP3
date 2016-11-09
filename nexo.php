<?php
	session_start();
	
	if(isset($_POST)){

		require_once('class/usuario.php');
		require_once('class/servicios.php');
		require_once('class/verificar_sesion.php');
		
		switch($_POST['queHacer']){

			case "Login": 

				$array = array($_POST["us"],$_POST["ps"]);
				
				echo verificar_sesion::verificar($array); 
			break;

			case "DLogin":
		
				 verificar_sesion::cerrar();
			break;

			case "mGrilla":

				if($_SESSION['registrado']=="si"){

					if($_SESSION['perfil']=='administrador'){

						$header = "Usuario:".$_SESSION["nombre"]." Perfil:".$_SESSION["perfil"];
						$array2 = array("cabecera"=>$header,"navegacion"=>'admin');
						echo json_encode($array2);

					}elseif($_SESSION['perfil']=='usuario'){

						$header = "Usuario:".$_SESSION["nombre"]." Perfil:".$_SESSION["perfil"];
						$array2 = array("cabecera"=>$header,"contenido"=>"content","navegacion"=>'user');
						echo json_encode($array2);

					}else{

						$header = "Usuario:".$_SESSION["nombre"]." Perfil:".$_SESSION["perfil"];
						$array2 = array("cabecera"=>$header,"navegacion"=>'invi');
						echo json_encode($array2);


					}

				}else{

						$header = "Usuario:";
						$array2 = array("cabecera"=>$header,"navegacion"=>'nl');
						echo json_encode($array2);
					}

			break;

			case 'mfMod':

				$_SESSION["modificar"]=$_POST["parametro"];
			break;
			
			case 'gfMod':
			
				if($_POST["parametro"]=="" || $_POST["nombre"]=="" ||  $_POST["email"]=="" || $_POST["perfil"]=="" ||$_POST["password"]==""){

						echo "error";	
	
					}else{	

						$array=array($_POST["parametro"],
									 $_POST["nombre"],
									 $_POST["email"],
									 $_POST["perfil"],
									 $_POST["password"]);

						$resultado = usuario::GuardarUsuario($array);

						if($resultado==""){$resultado="Cambios guardados correctamente";}else{$resultado="Error de guardado";}

						echo $resultado;

				}
			break;	

			case 'cNuev':

				if($_POST["nombre"]=="" ||  $_POST["email"]=="" || $_POST["perfil"]=="" ||$_POST["password"]==""){

							echo "error";	
		
						}else{	

							$array=array($_POST["nombre"],
										 $_POST["email"],
										 $_POST["perfil"],
										 $_POST["password"]);

							$resultado = usuario::InsertarUsuario($array);

							if($resultado==""){$resultado="Usuario creado correctamente";}else{$resultado="Error de creacion";}

							echo $resultado;

					}
			break;

			case 'elUs':

				$resultado = usuario::EliminarUsuario($_POST["parametro"]);
				if($resultado==""){$resultado="Usuario eliminado correctamente";}

				echo $resultado;

			break;




		}
	}

