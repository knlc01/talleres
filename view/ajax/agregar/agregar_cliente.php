<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['nombre'])){
			$errors[] = "Nombre está vacío.";
	}
    elseif (empty($_POST['telefono'])) {
        $errors[] = "Telefóno vacío.";
    } 
	require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
    $dni = mysqli_real_escape_string($con,(strip_tags($_POST["dni"],ENT_QUOTES)));
    $telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));

    $sql = "INSERT INTO cliente (nombre, apellido, dni, telefono) VALUES ('$nombre', '$apellido', '$dni', '$telefono')";

	$query_new = mysqli_query($con,$sql);
    // if has been added successfully
    if ($query_new) {
        $messages[] = "Cliente ha sido agregado con éxito.";
    }
    else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.".mysqli_error($con);;
    }
	
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			