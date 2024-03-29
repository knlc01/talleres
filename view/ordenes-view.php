<?php 
    $active5="active";
    include "resources/header.php";
    
    if ($_SESSION['ordenes']==1){
?>
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <div class="row">
                <div class="col-md-12">
                        <!--breadcrumbs start -->
                        <ul class="breadcrumb  pull-right">
                            <li><a href="./?view=dashboard">Dashboard</a></li>
                            <li class="active">Ordenes</li>
                        </ul>
                        <!--breadcrumbs end -->
                        <br>
                    <h1 class="h1">Ordenes view\ordenes-view.php</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-3">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Buscar por nombre" id='q' onkeyup="load(1);">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick='load(1);'><i class='fa fa-search'></i></button>
                      </span>
                    </div><!-- /input-group -->
                </div>
                <div class="col-xs-3"></div>
                <div class="col-xs-1">
                    <div id="loader" class="text-center"></div>
                </div>

                <!-- con esto se seleccionara en que estado se escuentra la orden -->
                <div class="col-xs-3">
                    <div class="input-group">
                        <select class="form-control" id="cars">
                            <option value="1">Ingreso</option><!-- Valor 1 -->
                            <option value="2">Chequeo</option><!-- Valor 2 -->
                            <option value="3">Presupuesto</option><!-- Valor 3 -->
                            <option value="4">Repuestos</option><!-- Valor 4 -->
                            <option value="5">Aceptado</option><!-- Valor 5 -->
                            <option value="6">Rechazado</option><!-- Valor 6 -->
                            <option value="7">En reparacion</option><!-- Valor 7 -->
                            <option value="8">Terminados</option><!-- Valor 8 -->
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick='load(1);'><i class='fa fa-search'></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
                <div class="col-xs-3"></div>
                <div class="col-xs-1">
                    <div id="loader" class="text-center"></div>
                </div>

                
                <div class="col-md-offset-10">
                    <!-- modals -->
                        <?php 
                                include "modals/agregar/agregar_orden.php";//Acá esta el boton <Nuevo>
                                include "modals/editar/editar_orden.php";
                                include "view/ajax/pdf_orden.php";
                        ?>
                    <!-- /end modals -->
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Mostrar <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class='active' onclick='per_page(15);' id='15'><a href="#">15</a></li>
                            <li  onclick='per_page(25);' id='25'><a href="#">25</a></li>
                            <li onclick='per_page(50);' id='50'><a href="#">50</a></li>
                            <li onclick='per_page(100);' id='100'><a href="#">100</a></li>
                            <li onclick='per_page(1000000);' id='1000000'><a href="#">Todos</a></li>
                        </ul>
                    </div>
                    <input type='hidden' id='per_page' value='15'>
                </div>
            </div>

            <div id="resultados_ajax"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datos de las ordenes ("en la ultima columna agregar btn ver orden, La tabla seria una vista previa de la orden")</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="outer_div"></div><!-- Datos ajax Final --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>       

        </section>
    </section><!--main content end-->
<?php
    include "resources/footer.php";
?>
      
<script>
    $(function() {
        load(1);
    });

    function load(page){
        var query=$("#q").val();
        var per_page=$("#per_page").val();
        var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
        $("#loader").fadeIn('slow');
        $.ajax({
            // url:'view/ajax/seguros_ajax.php',//Aca se ve la tabla borra este archivo
            url:'view/ajax/ordenes_ajax.php',//Aca se ve la tabla
            data: parametros,
             beforeSend: function(objeto){
            $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
          },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $("#loader").html("");
            }
        })
    }
    
    function per_page(valor){
        $("#per_page").val(valor);
        load(1);
        $('.dropdown-menu li' ).removeClass( "active" );
        $("#"+valor).addClass( "active" );
    }
</script>
<script>
    function eliminar(id){
        if(confirm('Esta acción  eliminará de forma permanente el seguro \n\n Desea continuar?')){
            var page=1;
            var query=$("#q").val();
            var per_page=$("#per_page").val();
            var parametros = {"action":"ajax","page":page,"query":query,"per_page":per_page,"id":id};
            
            $.ajax({
                url:'view/ajax/seguros_ajax.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $("#loader").html("");
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();});}, 5000);
                }
            })
        }
    }
</script>
<script>
    $( "#new_register" ).submit(function( event ) {
      $('#guardar_datos').attr("disabled", true);
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "view/ajax/agregar/agregar_orden.php",
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("Enviando...");
                  },
                success: function(datos){
                $("#resultados_ajax").html(datos);
                $('#guardar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                $('#formModal').modal('hide');
              }
        });
      event.preventDefault();
    })
</script>

<script>
    $( "#update_register" ).submit(function( event ) {
      $('#actualizar_datos').attr("disabled", true);
     var parametros = $(this).serialize();
         $.ajax({
                type: "POST",
                url: "view/ajax/editar/editar_orden.php",//aca va para conectar con la bd
                data: parametros,
                 beforeSend: function(objeto){
                    $("#resultados_ajax").html("Enviando...");
                  },
                success: function(datos){
                $("#resultados_ajax").html(datos);
                $('#actualizar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();});}, 5000);
                $('#nm').modal('hide');
              }
        });
      event.preventDefault();
    });

// Función para buscar máquinas
function buscarMaquinas() {
        $('#actualizar_datos').attr("disabled", true);
        var parametros = $('#update_register').serialize();
        $.ajax({
            type: "POST",
            url: "view/ajax/agregar/agregar_maquina.php",  // Reemplaza con la ruta correcta
            //url: "view/ajax/editar/editar_orden.php",
            data: parametros,
            beforeSend: function (objeto) {
                $("#resultados_ajax").html("Enviando...");
            },
            success: function (datos) {
                $("#resultados_ajax").html(datos);
                $('#actualizar_datos').attr("disabled", false);
                load(1);
                window.setTimeout(function () {
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 5000);
                $('#nm').modal('hide');
            }
        });
        // Evitar el envío del formulario
        event.preventDefault();
    }

</script>
<script>

    function editar(id){
//        console.log(id);si me muestra el id 
        var parametros = {"action":"ajax","id":id};
        $.ajax({
                url: 'view/modals/editar/orden.php',
                data: parametros,
                 beforeSend: function(objeto){
                $("#loader2").html("<img src='./assets/img/ajax-loader.gif'>");
              },
                success:function(data){
                    $(".outer_div2").html(data).fadeIn('slow');
                    $("#loader2").html("");
                }
            })
    }
    function nuevaMaquina(id){
        <?php echo "oka"; ?>
    }
</script>

<?php     
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>