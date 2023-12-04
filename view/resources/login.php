<?php
//Este script PHP maneja la autenticación de un usuario.
	//inicia o reanuda la sesión actual. Es necesario para utilizar variables de sesión.
	session_start();

	/*if (isset($_POST['token']) && $_POST['token']!=='') {*/
			
	//Contiene las variables de configuracion para conectar a la base de datos
	include "../../config/config.php";
	
	//Se obtienen y sanitizan las credenciales del usuario a partir de los datos enviados mediante el método POST
	//Se obtiene el valor del campo "email" del formulario y se escapan caracteres especiales.
	$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
	// Se obtiene el valor del campo "password" del formulario, se aplica la función strip_tags y luego se realiza un hash mediante md5 y sha1. Nota: El uso de md5 y sha1 para almacenar contraseñas no se considera seguro hoy en día. Se recomienda el uso de funciones más seguras como password_hash y password_verify MODIFICAR.
	$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));
	//Se ejecuta una consulta SQL para verificar las credenciales en la base de datos
    $query = mysqli_query($con,"SELECT * FROM empleado WHERE username=\"$email\" OR email =\"$email\" AND password = \"$password\";");
	//Si la consulta devuelve al menos una fila
	if ($row = mysqli_fetch_array($query)) {
		/*
		las credenciales son válidas. Se procede a:
			Obtener los permisos del empleado desde la tabla empleado_permisos.
			Establecer variables de sesión basadas en los permisos del empleado.
			Redirigir al usuario a la página de inicio (dashboard) o a su perfil, dependiendo de sus permisos.
		*/
		//$marcados = $user->list_mark($fetch->iduser);
		$idempleado=intval($row['id']);
		$marcados=mysqli_query($con, "SELECT * FROM empleado_permisos WHERE idempleado=$idempleado");
		$valores=array();

		while ($per = mysqli_fetch_object($marcados)){
			array_push($valores, $per->idpermiso);
		}

		in_array(1,$valores)?$_SESSION['dashboard']=1:$_SESSION['dashboard']=0;
		in_array(2,$valores)?$_SESSION['maquinas']=1:$_SESSION['maquinas']=0;
		in_array(2,$valores)?$_SESSION['clientes']=1:$_SESSION['clientes']=0;
		in_array(2,$valores)?$_SESSION['ordenes']=1:$_SESSION['ordenes']=0;

		in_array(3,$valores)?$_SESSION['taller']=1:$_SESSION['taller']=0;
		in_array(4,$valores)?$_SESSION['seguro']=1:$_SESSION['seguro']=0;
		in_array(5,$valores)?$_SESSION['empresa']=1:$_SESSION['empresa']=0;
		in_array(6,$valores)?$_SESSION['sector']=1:$_SESSION['sector']=0;
		in_array(7,$valores)?$_SESSION['vehiculo']=1:$_SESSION['vehiculo']=0;
		in_array(8,$valores)?$_SESSION['tarjeta']=1:$_SESSION['tarjeta']=0;
		in_array(9,$valores)?$_SESSION['reparaciones']=1:$_SESSION['reparaciones']=0;
		in_array(10,$valores)?$_SESSION['choque']=1:$_SESSION['choque']=0;
		in_array(11,$valores)?$_SESSION['configuracion']=1:$_SESSION['configuracion']=0;

		$_SESSION['user_id'] = $idempleado;
		if($_SESSION['dashboard']==1){
			header("location: ../../?view=dashboard");
		}else{
			header("location: ../../?view=perfil");
		}
				
	}else{//Si las credenciales no son válidas, se redirige al usuario de nuevo a la página de inicio 
		header("location: ../../index.php?invalid");
		//echo mysqli_error($con);
	}
	/*}else{
		//header("location: ../../");
	}*/

?>