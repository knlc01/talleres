<?php
	//Inicia el búfer de salida. Esto se utiliza para almacenar temporalmente la salida del script en un búfer antes de enviarla al navegador. Puede ser útil para evitar problemas con las cabeceras HTTP que se deben enviar antes de la salida.
	ob_start();
	//Inicia o reanuda la sesión actual. Es necesario si se están utilizando variables de sesión en la aplicación.
	session_start();
	//Verifica si hay un parámetro "view" en la URL. Si existe, se asigna su valor a la variable $view; de lo contrario, se asigna el valor 'index'. Esto determina qué vista se cargará.
	$view = isset($_GET['view']) ? $_GET['view'] : 'index';
	//Incluye el archivo 'config/config.php', que contiene configuraciones importantes para la aplicación, como la configuración de la base de datos u otras variables globales.	
	require('config/config.php');

	//cargo la vista
	if (file_exists('view/'.$view.'-view.php')) {
		include("view/".$view."-view.php");
	}else{
		include("view/error-view.php");
		//echo "No existe";
	}
