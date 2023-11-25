<?php
    include("../is_logged.php");//Archivo comprueba si el usuario esta logueado	
    if (empty($_POST['id'])){
		//echo $_POST['id'];
		$errors[] = "id está vacío.";
	}elseif (!empty($_POST['id'])){
	require_once ("../../../config/config.php");
       // escaping, additionally removing everything that could be (html/javascript-) code
        //$maquina = mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));
        $id=intval($_POST['id']);
        $maquina = mysqli_real_escape_string($con,(strip_tags($_POST["maquina"],ENT_QUOTES)));
        $id_maquina = mysqli_real_escape_string($con,(strip_tags($_POST["id_maquina"],ENT_QUOTES)));
        $cliente = mysqli_real_escape_string($con,(strip_tags($_POST["cliente"],ENT_QUOTES)));
        $id_cliente = mysqli_real_escape_string($con,(strip_tags($_POST["id_cliente"],ENT_QUOTES)));
		$fecha_ingreso=date("Y-m-d H:i:s");
		$nota = mysqli_real_escape_string($con,(strip_tags($_POST["nota"],ENT_QUOTES)));
        $estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$fecha_ingreso=date("Y-m-d H:i:s");
		
	// UPDATE data into database
	$sql = "UPDATE ordenes SET maquina='".$maquina."', id_maquina = '".$id_maquina."', cliente = '".$cliente."', id_cliente = '".$id_cliente."', fecha_ingreso = '".$fecha_ingreso."', nota = '".$nota."', estado = '".$estado."' WHERE id='".$id."' ";
    $query = mysqli_query($con,$sql);

    if ($query) {
        $messages[] = "La Orden ha sido actualizado con éxito.";
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