<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from maquinas where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $maquina=$rw['maquina'];
            $marca=$rw['marca'];
            $modelo=$rw['modelo'];
            $cliente=$rw['cliente'];
            $Id_cliente=$rw['id_cliente'];
            $estado=$rw['estado'];
            $created_at=$rw['fecha_ingreso'];
		}
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Maquina: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="maquina" name="maquina" value="<?php echo $maquina;?>" placeholder="Maquina: ">
    </div>
</div>
<div class="form-group">
    <label for="cuit" class="col-sm-2 control-label">Marca: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="marca" name="marca" value="<?php echo $marca;?>" placeholder="Marca: ">
    </div>
</div>
<div class="form-group">
    <label for="direccion" class="col-sm-2 control-label">Modelo: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="modelo" name="modelo" value="<?php echo $modelo;?>" placeholder="Modelo: ">
    </div>
</div>
<div class="form-group">
    <label for="localidad" class="col-sm-2 control-label">Cliente: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="cliente" name="cliente" value="<?php echo $cliente;?>" placeholder="Cliente: ">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">Id Cliente: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $Id_cliente;?>" placeholder="Id Cliente: ">
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado: </label>
    <div class="col-sm-10">
        <select class="form-control" name="estado" id="estado">
			<option value="1" <?php if ($estado==1){echo "selected";}?>>En taller</option>
			<option value="2" <?php if ($estado==2){echo "selected";}?>>Fuera</option>
		</select>
    </div>
</div>
