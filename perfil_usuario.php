<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['usuario'];
    $variable_rol = $_SESSION['rol'];

    if($varsesion == null || $varsesion = ''){
        header('location:index.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>UTHH-Transfer</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div class="sidebar-header">
                    <h3>UTHH TRANSFER</h3>
                </div>

                <div id="Idinicio">
                    <ul class="list-unstyled components">
                        
                        <p> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario']?> - <?php echo $variable_rol?></p>


                        <li class="nav-item">
                            <a class="nav-link" href="inicio.php"> <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li v-if="tipousuario==1">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users-cog"></i> Administracion</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="alumnos.php"> <i class="fas fa-user-graduate"></i> </i> Alumnos</a>
                                </li>

                                <li>
                                    <a href="empleados.php"> <i class="fas fa-user-tie"> </i> Empleados</a>
                                </li>
                                
                                <li>
                                    <a href="conceptos.php"> <i class="fa fa-briefcase" aria-hidden="true"></i> Conceptos</a>
                                </li>

                                <li>
                                    <a href="carreras.php"> <i class="fa fa-university" aria-hidden="true"></i> Carreras</a>
                                </li>

                                <li>
                                    <a href="materias.php"><i class="fa fa-book" aria-hidden="true"></i> Materias</a>
                                </li>
                            </ul>
                        </li>

                        <li v-if="tipousuario==2">
                            <a href="#SubmenuDocentes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-users" aria-hidden="true"></i> Docentes</a> 
                            <ul class="collapse list-unstyled" id="SubmenuDocentes">

                                <li>
                                    <a href="conceptospendientes.php"> <i class="fas fa-address-book"></i> Conceptos Pendientes</a>
                                </li>

                            </ul>
                        </li>
                        <li v-if="tipousuario==3">
                            <a href="#SubmenuCajeros" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fa fa-user-plus" aria-hidden="true"></i> Cajeros</a> 
                            <ul class="collapse list-unstyled" id="SubmenuCajeros">

                                <li>
                                    <a href="cuentas.php"> <i class="fas fa-address-book"></i> Cuentas</a>
                                </li>
                    
                            </ul>

                        </li>
                        <li v-if="tipousuario==4">
                            <a href="#SubmenuAlumnos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users-cog"></i> Alumnos</a> 
                            <ul class="collapse list-unstyled" id="SubmenuAlumnos">

                                <li class="active">
                                    <a href="micuenta.php"> <i class="fas fa-user-graduate"></i> </i> Mi Cuenta</a>
                                </li>

                                <li class="active">
                                    <a href="misconceptos.php"> <i class="fas fa-user-graduate"></i> </i> Mis Pendientes</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>

                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="about.html">Acerca de nosotros</a>
                    </li>
                </ul>
            </nav>

            <!-- Contenido de la pagina  -->
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-menu">
                            <i class="fas fa-align-left"></i>
                            <span>Menú</span>
                        </button>

                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">

                                <li class="nav-item">
                                    <a class="nav-link active" href="perfil_usuario.php"> <i class="fas fa-user"></i> Perfil</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="cerrar_sesion.php"> <i class="fas fa-times-circle"></i> Cerrar sesión</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="row justify-content-around">
                        
                        <div class="col-4">
                            <input class="form-control form-control-sm" type="text" placeholder="Nombre">
                        </div>
                        
                        

                        <div class="col-4">
                            <input class="form-control form-control-sm" type="text" placeholder="Apellido Paterno">
                        </div>

                        <div class="col-4">
                            <input class="form-control form-control-sm" type="text" placeholder="Apellido Materno">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>         
        <!--Vue.JS -->    
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>              
        <!--Axios -->      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>    
        <!--Sweet Alert 2 -->        
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <!--Código custom -->  
        <script src="js/inicio.main.js"></script>        
         
        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });

            });

        </script>
    </body>
</html>