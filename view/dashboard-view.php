<?php
    $active1="active";  
    include "resources/header.php";

    if ($_SESSION['dashboard']==1){

        $maquinas = mysqli_query($con, "select * from maquinas");
        $clientes = mysqli_query($con, "select * from cliente");
        $ordenes = mysqli_query($con, "select * from ordenes");
        $repuestos = mysqli_query($con, "select * from repuestos");
        $presupuesto = mysqli_query($con, "select * from presupuesto");


        $empleados = mysqli_query($con, "select * from empleado");
        $talleres = mysqli_query($con, "select * from taller");
        $empresas = mysqli_query($con, "select * from empresa");
        $vehiculos = mysqli_query($con, "select * from vehiculo");

        function suma_reparaciones($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from reparaciones where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }
        function suma_choques($month){
            global $con;
            $year=date('Y');
            $sql="select count(id) as id from choque where year(fecha_carga) = '$year' and month(fecha_carga)= '$month' ";
            $query = mysqli_query($con, $sql);
            $reg=mysqli_fetch_array($query);
            return $total=number_format($reg['id'],2,'.','');
        }

?>
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <h3>EL-ROI</h3>
                <h4>/view/dashboard-view.php (seccion con estos cuadros)</h4>
                <h4>cada seccion modificar view\logout-view.php - view\resources\login.php - view\dashboard-view.php - view\resources\header.php</h4>
                <!--tiles start-->
                <div class="row">
                   <!-- MI EDIT -->
                   <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($maquinas) ?>" data-speed="2500"> </h1>
                                <p>Maquinas</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($clientes) ?>" data-speed="2500"> </h1>
                                <p>Clientes</p>
                            </div>
                            <div class="icon"><i class="fa fa-indent"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($ordenes) ?>" data-speed="2500"> </h1>
                                <p>Ordenes</p>
                            </div>
                            <div class="icon"><i class="fa fa-indent"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                <h1 class="text-left timer" data-to="<?php echo mysqli_num_rows($repuestos) ?>" data-speed="2500"> </h1>
                                <p>Repuestos</p>
                            </div>
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="<?php echo mysqli_num_rows($presupuesto) ?>" data-speed="2500"> </h1>
                                <p>Presupuesto</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tiles end-->
                <!--dashboard charts and map start-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datos Estadisticos</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body text-center">
                                <p class="text-center">
                                    <strong><span class="text-muted">Taller</span> & <span class="text-info">Mecánico</span> <b><?php echo date('Y');?></b></strong>
                                </p>
                                <canvas id="bar" height="300" width="1050px"></canvas><!-- datos estadisticos finales -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--dashboard charts and map end-->
            </section>
        </section>
        <!--main content end-->
    </section>
<?php
    include "resources/footer.php";
?>
<script src="assets/plugins/chartjs/Chart.min.js"></script> 
<!--Page Level JS-->
<script src="assets/plugins/countTo/jquery.countTo.js"></script>
<script src="assets/plugins/weather/js/skycons.js"></script>
<script>
var barChartData = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : [<?php echo suma_reparaciones(1);?>, <?php echo suma_reparaciones(2);?>, <?php echo suma_reparaciones(3);?>, <?php echo suma_reparaciones(4);?>, <?php echo suma_reparaciones(5);?>, <?php echo suma_reparaciones(6);?>, <?php echo suma_reparaciones(7);?>,<?php echo suma_reparaciones(8);?>,<?php echo suma_reparaciones(9);?>,<?php echo suma_reparaciones(10);?>,<?php echo suma_reparaciones(11);?>,<?php echo suma_reparaciones(12);?>]
        }
    ]
    
}
var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>

<!-- Morris  -->
<script src="assets/plugins/morris/js/morris.min.js"></script>
<script src="assets/plugins/morris/js/raphael.2.1.0.min.js"></script>

<!--Load these page level functions-->
<script>
    $(document).ready(function() {
        app.timer();
        app.weather();
    });
</script>
<?php     
    }else{
      require 'resources/acceso_prohibido.php';
    }
    ob_end_flush(); 
?>