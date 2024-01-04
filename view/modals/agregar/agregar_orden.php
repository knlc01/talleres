<button class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    <i class='fa fa-plus'></i> Nueva
</button>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" id="new_register" name="new_register">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nueva Orden view\modals\agregar\agregar_orden.php</h4>
                </div>
                <div class="modal-body">
                    <!-- Input para el nombre de la máquina -->
                    <div class="form-group">
                        <label for="maquina" class="col-sm-2 control-label">Maquina: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="maquina" name="maquina" placeholder="Maquina: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_maquina" class="col-sm-2 control-label">Id Maquina: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="id_maquina" name="id_maquina" placeholder="Id Maquina: ">
                        </div>
                    </div>

                    <!-- Búsqueda de máquina -->
                    <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Buscar Máquina: </label>
                        <div class="col-sm-8">
                            <input type="text" required class="form-control" id="nombre_busqueda" name="nombre_busqueda" placeholder="Nombre: ">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" onclick="buscarMaquina()">
                                <i class='fa fa-search'></i> Buscar
                            </button>
                        </div>
                    </div>
                    
                    <!-- Contenedor para los resultados de la búsqueda -->
                    <div id="resultados_ajax_contenedor"></div>

                    <!-- Input para identificar al cliente -->
                    <div class="form-group">
                        <label for="cliente" class="col-sm-2 control-label">Cliente: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="cliente" name="cliente" placeholder="Cliente: ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_cliente" class="col-sm-2 control-label">Id Cliente: </label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="id_cliente" name="id_cliente" placeholder="Id_Cliente: ">
                        </div>
                    </div>

                    <!-- Input para la fecha de ingreso de la orden -->
                    <div class="form-group">
                        <label for="fecha_ingreso" class="col-sm-2 control-label">Fecha Ingreso: </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" required="" placeholder="DD/MM/YYYY">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nota" class="col-sm-2 control-label">Nota: </label>
                        <div class="col-sm-10">
                            <textarea rows="10" cols="33" type="text" required class="form-control" id="nota" name="nota" placeholder="Nota: ">
                                </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado: </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="estado" id="estado">
                        <option value="1">Ingreso</option><!-- Valor 1 -->
                            <option value="2">Chequeo</option><!-- Valor 2 -->
                            <option value="3">Presupuesto</option><!-- Valor 3 -->
                            <option value="4">Repuestos</option><!-- Valor 4 -->
                            <option value="5">Aceptado</option><!-- Valor 5 -->
                            <option value="6">Rechazado</option><!-- Valor 6 -->
                            <option value="7">En reparacion</option><!-- Valor 7 -->
                            <option value="8">Terminados</option><!-- Valor 8 -->
                        </select>
                    </div>
                </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar_datos" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Form Modal -->

<!-- Script para buscar la máquina -->
<script>
    <!-- ... (tu código anterior) ... -->
    function buscarMaquina() {
        var query = $("#nombre_busqueda").val();

        $.ajax({
            type: "GET",
            url: "view/ajax/maquina_ajax.php",
            data: {
                action: "ajax_resultadosMaquinasOrden",//de aca se le dice que me muestre solo la tabla de maquinas con 6 columas
                query: query,
                per_page: 15,
                page: 1,
                from_agregar_orden: 1  // Nuevo parámetro para indicar que viene desde agregar_orden.php
            },
            success: function (data) {
                $("#resultados_ajax_contenedor").html(data);
            }
        });
    }
</script>
