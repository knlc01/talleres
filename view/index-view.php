<?php
//Este código PHP y HTML forma parte de una página de inicio de sesión.
    // Verifica si existe una sesión iniciada 
    if (isset($_SESSION['user_id']) && $_SESSION!==null) {
    //if (isset($_SESSION['user_id']) && $_SESSION) {
        //Esta línea esta redirigiendo a los usuarios que ya han iniciado sesión a la página de inicio (dashboard). Si la sesión ya está establecida, la redirección se realiza antes de renderizar el HTML.
        header("location: ./?view=dashboard");
    }
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Se incluyen varios archivos CSS y JS para estilos y funcionalidades. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Iniciar Sesión</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Fonts from Font Awsome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- CSS Animate -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- Custom styles for this theme -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Feature detection -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <!-- Se muestra un formulario de inicio de sesión con campos para correo electrónico (email) y contraseña (password). -->
        <section id="login-container" style="width: 95%"><!-- utilizo un ancho para no desajustarlo  -->
            <div class="row">
                <div class="col-md-3" id="login-wrapper">
                    <div class="panel panel-primary animated flipInY">
                        <div class="panel-heading">
                            <h3 class="panel-title">     
                               Iniciar Sessión
                            </h3>      
                        </div>
                        <div class="panel-body">
                        <?php 
                            
                            if (isset($_GET['invalid'])) {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                    <strong>Error!</strong> Contraseña o correo Electrónico invalido
                                    </div>";
                            }
                        ?>
                           <p> Ingresa Tus Datos.</p>
                           <!-- El formulario tiene una acción (action="view/resources/login.php") que indica que los datos se enviarán al archivo login.php en el directorio view/resources/ cuando se envíe el formulario. -->
                            <form class="form-horizontal" role="form" method="post" action="view/resources/login.php">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="email" id="email" value="admin@admin.com" autofocus>
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" id="password" value="admin">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                   <div class="col-md-12">
                                        <button name="token" class="btn btn-primary btn-block" type="submit">Acceder</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Global JS-->
        <!-- se incluyen varios archivos JS que se utilizan para diversas funciones, como animaciones y seguimiento de Google Analytics. -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="assets/plugins/nanoScroller/jquery.nanoscroller.min.js"></script>
        <script src="assets/js/application.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-46627904-1', 'authenticgoods.co');
            ga('send', 'pageview');
        </script>
    </body>
</html>