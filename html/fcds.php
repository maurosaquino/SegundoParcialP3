<?php

		require_once('../SERVIDOR/lib/nusoap.php');
		require_once('../class/Cd.php');

		$host = 'http://localhost/2P/SERVIDOR/ws.php';
		
		$client = new nusoap_client($host . '?wsdl');

		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}else{

		$cds = $client->call('ObtenerTodosLosCds', array());

		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
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
			}
		}

	}
	?>