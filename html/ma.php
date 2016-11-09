<?php

session_start();

?>

<nav>
<button type="button" onclick="MostrarPlanilla()">Ver Grilla</button>
<button type="button" onclick="ModificarUsuario(
												<?php echo $_SESSION["id"];
												?>
												)">Editar Perfil</button>
<button type="button" onclick="AltaUsuario()">Crear Usuario</button>
<button type="button" onclick="TraerCDs()">Traer los CDS</button>												
<button type="button" onclick="DLlogin()">Logout</button>
</nav>


