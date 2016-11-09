<?php
	
	session_start();
	require_once('../class/usuario.php');
	$arrayUsuarios = usuario::TraerUsuarios();

?>

	<div class="table-title">
		 <table class="table-fill">
			 <thead>	
				 <tr><th class="text-left">NOMBRE</th>
				 	 <th class="text-left">EMAIL</th>
				 	 <th class="text-left">PERFIL</th>
				 	 <th class="text-left">PASSWORD</th>
				     <th class="text-left">ACCIONES</th>
			 </thead>
		 <tbody class="table-hover">

<?php 

		foreach($arrayUsuarios as $usuario){

				if($_SESSION["modificar"]==$usuario[4]){

					echo '<tr><td class="text-left"><input type="text" id="nom" value="'.$usuario[0].'"></td>
						  <td class="text-left"><input id="ema" type="text" value="'.$usuario[1].'"></td>
						  <td class="text-left">';

					switch($usuario[3]){

					case "administrador":
					echo '<select id="perf">
  							<option value="administrador" selected>ADMIN</option>
  							<option value="usuario">USER</option>
  							<option value="invitado">INVITADO</option>
						  </select>
						  </td>';
					break;

					case "usuario":
					echo '<select id="perf">
  							<option value="administrador">ADMIN</option>
  							<option value="usuario" selected>USER</option>
  							<option value="invitado">INVITADO</option>
						  </select>
						  </td>';
					break;

					case "invitado":
						echo '<select id="perf">
	  							<option value="administrador">ADMIN</option>
	  							<option value="usuario">USER</option>
	  							<option value="invitado" selected>INVITADO</option>
							  </select>
							  </td>';
					break;

					}	  

					echo '<td class="text-left"><input id="pass" type="text" value="'.$usuario[2].'"></td>
					      <td class="text-left"><button type="button" id="boton_tabla" onclick="GuardarCambios('.$usuario[4].')">Guardar</button><br><button type="button" id="boton_tabla" onclick="MostrarPlanilla()">Cancelar</button></td></tr>';

				}else{

					if($_SESSION["perfil"]=="administrador"){
					echo '<tr><td class="text-left">'.$usuario[0].'</td>
						  <td class="text-left">'.$usuario[1].'</td>
						  <td class="text-left">'.$usuario[3].'</td>
						  <td class="text-left">'.$usuario[2].'</td>
					      <td class="text-left"><button type="button" id="boton_tabla" onclick="ModificarUsuario('.$usuario[4].')">Modificar</button></td></tr>';
					}else{

					echo '<tr><td class="text-left">'.$usuario[0].'</td>
						  <td class="text-left">'.$usuario[1].'</td>
						  <td class="text-left">'.$usuario[3].'</td>
						  <td class="text-left">'.$usuario[2].'</td>
					      <td class="text-left"></td></tr>';	
					}      
				}
			}

			$_SESSION["modificar"]="";
?>			

			</tbody>	
			</table>
			