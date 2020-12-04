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

    <title>Empleados</title>

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

            <ul class="list-unstyled components">

                <p> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario']?></p>

                <li class="nav-item">
                    <a class="nav-link" href="inicio.php"> <i class="fas fa-home"></i> Home</a>
                </li>

                <li>
                    <a id="open_submenu" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users-cog"></i> Administracion</a>

                    <ul class="collapse list-unstyled" id="homeSubmenu">

                        <li>
                            <a href="alumnos.php"> <i class="fas fa-user-graduate"></i> </i> Alumnos</a>
                        </li>

                        <li class="active">
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
            </ul>

            <ul class="list-unstyled CTAs">

                <li>
                    <a href="#">Contactanos</a>
                </li>

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

                    <div class="col titulo_pagina">
                        Empleados
                    </div>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="inicio.php"> <i class="fas fa-user"></i> Perfil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="cerrar_sesion.php"> <i class="fas fa-times-circle"></i> Cerrar sesión</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Tabla empleados -->
            <div id="Idempleados">               
                <div class="container-fluid">                
                    <div class="row">       
                        <div class="col">        
                            <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#exampleModalCenter">Agregar Empleado</button>
                        </div>
                    </div> 

                    <div class="row mt-5">
                        <div class="col-lg-12"> 

                            <!-- Modal Editar -->
                            <div class="modal fade" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Editar Empleado</h5>
                                        </div>

                                        <div class="modal-body">
                                           
                                            <label class="col-sm-3 col-form-label">Clave</label><div class="col-sm-7"><input id="edclave" type="text" readonly=»readonly» v-model="elegido.intidempleado" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="ednombre" maxlength="25" type="text" v-model="elegido.vchnombre" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="edapaterno" type="text" maxlength="20" v-model="elegido.vchapp" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="edamaterno" type="text" maxlength="20" v-model="elegido.vchapm" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">RFC</label><div class="col-sm-7"><input id="edrfc" type="text" maxlength="15" v-model="elegido.vchrfc" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="eddireccion" type="text" maxlength="30" v-model="elegido.vchdireccion" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">Puesto</label>

                                            <div class="col-sm-7">
                                                <select v-model="selected" id="edpuesto">

                                                    <option v-for="roledit in rolesedit" v-bind:value="roledit.intidrol">
                                                        {{ roledit.vchrol }}
                                                    </option>

                                                </select>

                                            </div>

                                            <label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="edusuario" readonly=»readonly» maxlength="15" type="text" v-model="elegido.vchusuario" class="form-control"></div>
                                            <label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="edpassword" type="text" maxlength="15" class="form-control"></div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="editar=false;btnEditar()">Editar</button>
                                            <button type="button" class="btn btn-secondary"  data-dismiss="modal" @click="editar=false">Cancelar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>                   
                            <table class="table table-striped table-hover shadow">
                                <thead>
                                    <tr class="bg-primary text-light">
                                        <th>Clave</th>                                    
                                        <th></th>
                                        <th>Nombre</th>
                                        <th></th> 
                                        <th>Rfc</th>   
                                        <th>Dirección</th>
                                        <th>Puesto</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>

                                    </tr>    
                                </thead>
                                <tbody>
                                    <tr v-for="(dato,indice) of datos">                                
                                        <td>{{dato.intidempleado}}</td>                                
                                        <td>{{dato.vchnombre}}</td>
                                        <td>{{dato.vchapp}}</td>
                                        <td>{{dato.vchapm}}</td>
                                        <td>{{dato.vchrfc}}</td>
                                        <td>{{dato.vchdireccion}}</td>
                                        <td>{{dato.vchrol}}</td>
                                        <td>{{dato.vchusuario}}</td>



                                        <td class="size-bottons-table">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-secondary"  @click="elegirEmpleado(dato)" data-toggle="modal" data-target="#exampleModalCentered"><i class="fas fa-pencil-alt"></i></button>   
                                                <button class="btn btn-danger" title="Eliminar" @click="btnBorrar(dato.intidempleado,dato.vchnombre)"><i class="fas fa-trash-alt"></i></button>      
                                            </div>
                                        </td>
                                    </tr>   
                                </tbody>
                            </table>                    
                        </div>
                    </div>  


                    <!-- Modal Alta -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Empleado</h5>
                                </div>

                                <div class="modal-body">

                                    <label class="col-sm-3 col-form-label">Nombre</label><div class="col-sm-7"><input id="nombre" maxlength="25" type="text" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">A Paterno</label><div class="col-sm-7"><input id="apaterno" type="text" maxlength="20" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">A Materno</label><div class="col-sm-7"><input id="amaterno" type="text" maxlength="20" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">RFC</label><div class="col-sm-7"><input id="rfc" type="text" maxlength="15" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">Direccion</label><div class="col-sm-7"><input id="direccion" type="text" maxlength="30" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">Puesto</label>

                                    <div class="col-sm-7">
                                        <select v-model="selected" id="puesto">

                                            <option v-for="rol in roles" v-bind:value="rol.intidrol">
                                                {{ rol.vchrol }}
                                            </option>

                                        </select>

                                    </div>

                                    <label class="col-sm-3 col-form-label">Usuario</label><div class="col-sm-7"><input id="usuario" maxlength="15" type="text" class="form-control"></div>
                                    <label class="col-sm-3 col-form-label">Contraseña</label><div class="col-sm-7"><input id="password" type="text" maxlength="15" class="form-control"></div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="NuevoEmpleado">Aceptar</button>
                                    <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
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
    <script src="js/empleados.main.js"></script> 
    <script src="js/submenu-sidevar.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {

                $('#sidebar').toggleClass('active');

            });

        });

    </script>
     <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fc69bb5920fc91564cc80d4/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>