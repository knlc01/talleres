<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){//Verifica si el parámetro "id" está presente en la URL.
		$id=$_GET["id"];// Obtiene el valor del parámetro "id" desde la URL y lo asigna a la variable $id.
		$id=intval($id);//Convierte el valor de $id a un entero utilizando la función intval.
		$sql="select * from ordenes where id='$id'";//Consulta SQL
		$query=mysqli_query($con,$sql);//Ejecuta la consulta SQL utilizando la función mysqli_query, $con representa la conexión válida a la base de datos.
		$num=mysqli_num_rows($query);//Obtiene el número de filas devueltas por la consulta
		if ($num==1){//Si exactamente una fila es devuelta
			$rw=mysqli_fetch_array($query);//Recupera la fila de resultados como un array asociativo y la asigna a la variable $rw.
			$id=$rw['id'];//Actualiza el valor de $id con el valor de la columna "id" de la fila recuperada.
            $maquina=$rw['maquina'];
            $id_maquina=$rw['id_maquina'];
            $cliente=$rw['cliente'];
            $id_cliente=$rw['id_cliente'];
            $created_at=$rw['fecha_ingreso'];
            $nota=$rw['nota'];
            $estado=$rw['estado'];
		}
	}	
	else{exit;}//Si el parámetro "id" no está presente, el script se detiene con exit;.
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="maquina" class="col-sm-2 control-label">Maquina: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="maquina" name="maquina" value="<?php echo $maquina;?>" placeholder="Maquina: ">
    </div>
</div>
<div class="form-group">
    <label for="id_maquina" class="col-sm-2 control-label">Id Maquina: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="id_maquina" name="id_maquina" value="<?php echo $id_maquina;?>" placeholder="Id Maquina: ">
    </div>
</div>
<div class="form-group">
    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="cliente" name="cliente" value="<?php echo $cliente;?>" placeholder="Cliente: ">
    </div>
</div>
<div class="form-group">
    <label for="id_cliente" class="col-sm-2 control-label">Id Cliente: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente;?>" placeholder="Id Cliente: ">
    </div>
</div>
<div class="form-group">
    <label for="fecha_ingreso" class="col-sm-2 control-label">Fecha Ingreso: </label>
    <div class="col-sm-10">
        <?php $formattedDate = date("Y-m-d", strtotime($created_at));?>
        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required="" placeholder="YYYY-MM-DD" value="<?php echo $formattedDate; ?>">
    </div>
</div>

<div class="form-group">
    <label for="nota" class="col-sm-2 control-label">Nota: </label>
    <div class="col-sm-10">
        <textarea rows="10" cols="33" type="text" required class="form-control" id="nota" name="nota" placeholder="Nota: ">
            <?php echo $nota;?>
        </textarea>
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
    <div class="col-sm-10">
        <select class="form-control" name="estado" id="estado">
			<option value="1" <?php if ($estado==1){echo "selected";}?>>En Taller</option>
			<option value="2" <?php if ($estado!=1){echo "selected";}?>>Fuera</option>
		</select>
    </div>
</div>
<div class="form-group">
    <label for="fecha_salida" class="col-sm-2 control-label">Fecha Salida: </label>
    <div class="col-sm-10">
        <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" placeholder="DD/MM/YYYY">
    </div>
</div>
