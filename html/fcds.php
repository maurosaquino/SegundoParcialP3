<?php

		require_once('../class/servicios.php');
		require_once('../class/Cd.php');

		$client = servicios::generarServicioL();

		$cds = servicios::llamarServicio('ObtenerTodosLosCds',array(),$client);

				echo '	<div class="table-title">
						<table class="table-fill">
						<tr>
							<th class="text-left">ID</th><th class="text-left">CANTANTE</th><th class="text-left">A&Ntilde;O</th><th>TITULO</th>
						</tr>';
				
				foreach($cds as $cd)
				{
					echo '<tr>
							<td class="text-left">'.$cd['id'].'</td><td class="text-left">'.$cd['interpret'].'</td><td class="text-left">'.$cd['jahr'].'</td><td class="text-left">'.$cd['titel'].'</td>
						  </tr>';
				}
				echo '</table>
					  </div>';
?>