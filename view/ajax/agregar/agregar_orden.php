<?php
	include("../is_logged.php");//Archivo comprueba si el usuario esta logueado
	if (empty($_POST['maquina'])){
			$errors[] = "maquina está vacío.";
		}  elseif (
        	!empty($_POST['maquina'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos
			
			// escaping, additionally removing everything that could be (html/javascript-) code
            $maquina = mysqli_real_escape_string($con,(strip_tags($_POST["maquina"],ENT_QUOTES)));
            $id_maquina = mysqli_real_escape_string($con,(strip_tags($_POST["id_maquina"],ENT_QUOTES)));
            $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
            $id_cliente = mysqli_real_escape_string($con,(strip_tags($_POST["id_cliente"],ENT_QUOTES)));
            $fecha_ingreso=date("Y-m-d H:i:s");
            $nota = mysqli_real_escape_string($con,(strip_tags($_POST["nota"],ENT_QUOTES)));
            $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));


			//Write register in to database 
		//	$sql = "INSERT INTO taller (nombre, cuit, direccion, localidad, telefono, celular, estado, fecha_carga) VALUES('".$nombre."','".$cuit."','".$direccion."','".$localidad."','".$telefono."','".$celular."','".$estado."','".$fecha_carga."');";
			$sql = "INSERT INTO ordenes (maquina, id_maquina, cliente, id_cliente, fecha_ingreso, nota, estado) VALUES ('$maquina','$id_maquina','$cliente','$id_cliente','$fecha_ingreso','$nota','$estado');";
            $query_new = mysqli_query($con,$sql);
            // if has been added successfully
            if ($query_new) {
                $messages[] = "La Orden ha sido agregada con éxito.";
				//save_log('Categorías','Registro de categoría',$_SESSION['user_id']);
            } else {
                $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
            }
		} else {
			$errors[] = "desconocido.";	
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