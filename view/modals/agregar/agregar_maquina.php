<button class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class='fa fa-plus'></i> Nuevo</button>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- form  -->
        <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"> Nueva Maquina (view\modals\agregar\agregar_maquina.php)</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="maquina" class="col-sm-2 control-label">Maquina: </label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="maquina" name="maquina" placeholder="Maquina: ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="marca" class="col-sm-2 control-label">Marca: </label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="marca" name="marca" placeholder="Marca: ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="modelo" class="col-sm-2 control-label">Modelo: </label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="modelo" name="modelo" placeholder="Modelo: ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" id="cliente" name="cliente" placeholder="Cliente: ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_cliente" class="col-sm-2 control-label">ID Cliente: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="ID Cliente: ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">En taller</option>
                            <option value="2">fuera</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_ingreso" class="col-sm-2 control-label">Fecha Ingreso: </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required="" placeholder="DD/MM/YYYY">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        <!-- /end form  -->
        </div>
    </div>
</div>
<!-- End Form Modal -->