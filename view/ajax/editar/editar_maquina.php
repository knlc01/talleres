<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
    if (empty($_POST['maquina'])){
            $errors[] = "Maquina está vacío.";
        }  elseif (empty($_POST['marca'])) {
            $errors[] = "Marca está vacío.";
        }  elseif (empty($_POST['modelo'])) {
            $errors[] = "Modelo está vacío.";
        }  elseif (empty($_POST['cliente'])) {
            $errors[] = "Cliente está vacío.";
        }  elseif (empty($_POST['id_cliente'])) {
            $errors[] = "Id Cliente vacío.";
        }  elseif (empty($_POST['estado'])) {
            $errors[] = "Estado está vacío.";
        } elseif (
            !empty($_POST['maquina'])
            && !empty($_POST['marca'])
            && !empty($_POST['modelo'])
            && !empty($_POST['cliente'])
            && !empty($_POST['id_cliente'])
            && !empty($_POST['estado'])
        ){
		require_once ("../../../config/config.php");//Contiene las variables de configuracion para conectar a la base de datos

       // escaping, additionally removing everything that could be (html/javascript-) code
        $maquina = mysqli_real_escape_string($con,(strip_tags($_POST["maquina"],ENT_QUOTES)));
        $marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
        $modelo = mysqli_real_escape_string($con,(strip_tags($_POST["modelo"],ENT_QUOTES)));
        $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
        $id_cliente = mysqli_real_escape_string($con,(strip_tags($_POST["id_cliente"],ENT_QUOTES)));
        $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
        $fecha_carga=date("Y-m-d H:i:s");
        $id=intval($_POST['id']);
	// UPDATE data into database
    $sql = "UPDATE maquinas SET maquina='".$maquina."', marca='".$marca."', modelo='".$modelo."', cliente='".$cliente."', id_cliente='".$id_cliente."', estado='".$estado."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "La Maquina ha sido actualizado con éxito.";
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