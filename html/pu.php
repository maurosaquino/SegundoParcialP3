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
<?php
			if($_SESSION["perfil"]=='administrador'){
			
				echo '<th class="text-left">ACCIONES</th>';
			
			}
?>				 	 
				
			 </thead>
			 <tbody class="table-hover">

<?php 

		foreach($arrayUsuarios as $usuario){

				echo '<tr><td class="text-left">'.$usuario[0].'</td>
						  <td class="text-left">'.$usuario[1].'</td>
						  <td class="text-left">'.$usuario[3].'</td>';
						  
				
				if($_SESSION["perfil"]=='administrador'){
					echo '	<td class="text-left">'.$usuario[2].'</td>
							<td class="text-left"><button type="button" id="boton_tabla" onclick="ModificarUsuario('.$usuario[4].')">Modificar</button><br><button type="button" id="boton_tabla" onclick="ElUs('.$usuario[4].')">Eliminar</button></td></tr>';
				}else{
					echo '<td class="text-left"></td>';
				}
		
			}

?>			

			</tbody>	
			</table>
			