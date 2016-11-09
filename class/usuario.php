<?php 
	
class Usuario{

			public $Email;
			public $Password;

			function __construct($user,$pass){

				$this->Email = $user;
				$this->Password = $pass;
			}

			static function GuardarUsuario($user){

					require_once('AccesoDatos.php');
					$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso('US');

					$consulta =$objetoAccesoDato->RetornarConsulta('UPDATE usuarios 
																		SET nombre=:nom,
																		    email=:mai,
																		    perfil=:per,
																		    password=:cla
																	WHERE id=:id');
					$consulta->bindValue(':id',   $user[0], PDO::PARAM_INT);
					$consulta->bindValue(':nom',  $user[1], PDO::PARAM_INT);
					$consulta->bindValue(':mai',  $user[2], PDO::PARAM_INT);
					$consulta->bindValue(':per',  $user[3], PDO::PARAM_INT);
					$consulta->bindValue(':cla',  $user[4], PDO::PARAM_INT);


					$consulta->execute();

					
			}	

			static function InsertarUsuario($user){

					require_once('AccesoDatos.php');
					$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso('US');

					$consulta =$objetoAccesoDato->RetornarConsulta('INSERT INTO usuarios (nombre,email,password,perfil) 
																		 values (:nom,:mai,:per,:cla)');
					$consulta->bindValue(':nom',  $user[0], PDO::PARAM_INT);
					$consulta->bindValue(':mai',  $user[1], PDO::PARAM_INT);
					$consulta->bindValue(':cla',  $user[2], PDO::PARAM_INT);
					$consulta->bindValue(':per',  $user[3], PDO::PARAM_INT);

					$consulta->execute();

			}	
	
			static function EliminarUsuario($id){

					require_once('AccesoDatos.php');
					$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso('US');

					$consulta =$objetoAccesoDato->RetornarConsulta('DELETE FROM usuarios WHERE id=:id');
					$consulta->bindValue(':id',  $id, PDO::PARAM_INT);
					$consulta->execute();

			}	

			static function TraerUsuarios(){

					require_once('AccesoDatos.php');
					$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso('US');
				
					$sql = "SELECT nombre,email,password,perfil,id FROM usuarios";
				
					$consulta = $objetoAccesoDato->RetornarConsulta($sql);
					$consulta->execute();

					$array = $consulta->fetchall();
					$arrayfinal=array();

					if($array){
					foreach($array as $array2){

						$arrayfinal[] = array($array2["nombre"],$array2["email"],$array2["password"],$array2["perfil"],$array2["id"]);

					}}

					return $arrayfinal;

			}


}
?>