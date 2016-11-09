<?php

class servicios{

	static function generarServicio(){

		require_once('SERVIDOR/lib/nusoap.php');

        $host = 'http://maxineiner.tuars.com/webservice/ws_segundo_parcial.php?wsdl';
        
        $client = new nusoap_client($host);
        $err = $client->getError();
        if ($err) {
                        die();
                        return '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
                    }
        return $client;

	}	

	static function llamarServicio($parametro,$servicio){

		 require_once('usuario.php');

		 $client = $servicio;
		 
		 $user = new Usuario($parametro[0],$parametro[1]);

		 $resultado = $client->call('LoginWS', array($user));

         if ($client->fault) {
                     
         			$mensaje ='<h2>ERROR AL INVOCAR METODO:</h2><pre>'.print_r($resultado).'</pre>';

         			return $mensaje;

                        } else {

		                            $err = $client->getError();
		                            
		                            if ($err) {
		                                $mensaje = '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
		                    			
		                    			return $mensaje;

		                    			}else{ 
		                            	
		                            		return $resultado;

		                         	} 
                     			
		                         	
                     			}


	}

}


?>