<?php
	session_start();
	require_once ("../../../config/config.php");
	if (isset($_GET["id"])){
		$id=$_GET["id"];
		$id=intval($id);
		$sql="select * from cliente where id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num==1){
			$rw=mysqli_fetch_array($query);
			$id=$rw['id'];
            $nombre=$rw['nombre'];
            $apellido=$rw['apellido'];
            $dni=$rw['dni'];
            $telefono=$rw['telefono'];
        }
	}	
	else{exit;}
?>
<input type="hidden" value="<?php echo $id;?>" name="id" id="id">
<div class="form-group">
    <label for="nombre" class="col-sm-2 control-label">Nombre: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="nombre" name="nombre" value="<?php echo $nombre;?>" placeholder="Nombre: ">
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="col-sm-2 control-label">Apellido: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="apellido" name="apellido" value="<?php echo $apellido;?>" placeholder="Apellido: ">
    </div>
</div>
<div class="form-group">
    <label for="dni" class="col-sm-2 control-label">DNI: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="dni" name="dni" value="<?php echo $dni;?>" placeholder="Dni: ">
    </div>
</div>
<div class="form-group">
    <label for="telefono" class="col-sm-2 control-label">Telefono: </label>
    <div class="col-sm-10">
        <input type="text" required class="form-control" id="telefono" name="telefono" value="<?php echo $telefono;?>" placeholder="Telefono: ">
    </div>
</div>