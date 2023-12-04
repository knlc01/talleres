<?php
	//session_start();
	//para iniciar la sesión y establecer un identificador de usuario
	//$_SESSION['user_id']=1;
	//si la variable de sesión user_id está definida. Esto se hace para asegurarse de que el usuario ha iniciado sesión antes de intentar cerrar la sesión
	if (isset($_SESSION['user_id'])) {
		//limpia las variables de sesión relacionadas con diferentes partes de la aplicación.
		unset($_SESSION['dashboard']);
		unset($_SESSION['maquinas']);
		unset($_SESSION['clientes']);
		unset($_SESSION['ordenes']);

		unset($_SESSION['taller']);
		
		unset($_SESSION['seguro']);
		unset($_SESSION['empresa']);
		unset($_SESSION['sector']);
		unset($_SESSION['vehiculo']);
		unset($_SESSION['tarjeta']);
		unset($_SESSION['reparaciones']);
		unset($_SESSION['choque']);
		unset($_SESSION['configuracion']);
		//destruye todos los datos registrados en una sesión y finaliza la sesión. Después de esta línea, el usuario ya no estará autenticado.
		session_destroy();
		//Redirige al usuario a la página de inicio (./?view=index) después de cerrar la sesión.	
		header("location: ./?view=index"); //estemos donde estemos nos redirije al index
	}

?>