<?php

	/*Datos de conexion a la base de datos*/
/*	define('DB_HOST', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1"
	define('DB_USER', 'root');//Usuario de tu base de datos
	define('DB_PASS', '');//Contraseña del usuario de la base de datos
	define('DB_NAME', 'taller_mecanico');//Nombre de la base de datos
  */
    $DB_HOST='127.0.0.1:33065';
    $DB_USER='root';
    $DB_PASS='';
    $DB_NAME='taller_mecanico';

	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)){
        die("<h2 style='text-align:center'>Imposible conectarse a la base de datos! </h2>".mysqli_error(mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME)));
    }
    if (mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>