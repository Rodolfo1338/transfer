<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['usuario'];
    $variable_rol = $_SESSION['rol'];
    $id_user=$_SESSION['idusuario'];

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



    <title> Mis Conceptos Pendientes</title>



    <!-- Bootstrap CSS CDN -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->

    <link rel="stylesheet" href="style.css">



    <!-- Font Awesome JS -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>



<body>

    <div id="classgeneral">
    

 <div class="wrapper">

    <!-- Sidebar  -->

    <nav id="sidebar">

        <div class="sidebar-header">

            <h3>UTHH TRANSFER</h3>

        </div>



        <ul class="list-unstyled components">

            <p><input type="text" id="rolsesion" style="display:none"  value="<?php echo $variable_rol  ?>"></p>
            <p><input type="text" style="display:none" id="iduser"  value="<?php echo $id_user  ?>"></p>
            <p> <i class="fas fa-user"></i> <?php echo $_SESSION['usuario']?></p>



            



            <li class="nav-item">

                <a class="nav-link" href="inicio.php"> <i class="fas fa-home"></i> Home</a>

            </li>



            <div id="menus">
                
                <li>
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

            </div>





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

                    <h3>Mis Pendientes</h3>

                </div>

                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <i class="fas fa-align-justify"></i>

                </button>







                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item">

                            <a class="nav-link" href="#"> <i class="fas fa-user"></i> Perfil</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link" href="cerrar_sesion.php"> <i class="fas fa-times-circle"></i> Cerrar sesión</a>

                        </li>



                    </ul>

                </div>

            </div>

        </nav>

        <div id="Idconceptospendientes">               
            <div class="container"> 

                <p v-for="(Adeud,indice) of Adeudo"> <i class="fas fa-user"  ></i> Adeudo Total: {{Adeud.adeudototal}}</p>

               
                <p></p>
                    <p class="heading" v-for="(datocuenta,indice) of datoscuenta"><i class="fa fa-credit-card"></i> Saldo disponible: $
                    <strong >{{datocuenta.fltsaldo}}</strong>
                    </p>
                
               <div align="center">
                   <p>Conceptos Pendientes</p>
               </div>

                <div class="row mt-5">
                    <div class="col-lg-12">                    
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th>Clave</th>                                    
                                    <th>Cuenta</th>
                                    <th>Concepto</th>
                                    <th>Materia</th>
                                    <th>Costo</th>
                                    
                                    
                                    <th>Estatus</th>
                                    <th>Acciones</th>

                                </tr>    
                            </thead>
                            <tbody>
                                <tr v-for="(dato,indice) of datos">                                
                                    <td>{{dato.intidconceptopendiente}}</td>                                
                                    <td>{{dato.vchmatricula}}</td>
                                    <td>{{dato.vchconcepto}}</td>
                                    <td>{{dato.vchmateria}}</td>
                                    <td>{{dato.intcosto}}</td>
                                    
                                    
                                    <td>{{dato.bolestadoconcepto}}</td>



                                    <td>
                                        <div class="btn-group" role="group">
                                            
                                            <button class="btn btn-success" title="Pagar" @click="btnPagar(dato.intidconceptopendiente,dato.intcosto,dato.vchmatricula)" ><i class="fa fa-check-circle" aria-hidden="true"></i> Pagar</button>      
                                        </div>
                                    </td>
                                </tr>   
                            </tbody>
                        </table>                    
                    </div>
                </div> 

                <!-- hasta aqui --> 

                  <div align="center">
                   <p>Conceptos Pagados</p>
               </div>

                <div class="row mt-5">
                    <div class="col-lg-12">                    
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th>Clave</th>                                    
                                    <th>Cuenta</th>
                                    <th>Concepto</th>
                                    <th>Materia</th>
                                    <th>Costo</th>
                                    
                                    
                                    <th>Estatus</th>
                                    

                                </tr>    
                            </thead>
                            <tbody>
                                <tr v-for="(dato,indice) of datospagados">                                
                                    <td>{{dato.intidconceptopendiente}}</td>                                
                                    <td>{{dato.vchmatricula}}</td>
                                    <td>{{dato.vchconcepto}}</td>
                                    <td>{{dato.vchmateria}}</td>
                                    <td>{{dato.intcosto}}</td>
                                    
                                    
                                    <td>{{dato.bolestadoconcepto}}</td>



                                                                    </tr>   
                            </tbody>
                        </table>                    
                    </div>
                </div> 

            </div>
            

</div>

</div>
</div>
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
<script  src="js/misconceptos.main.js"></script> 





<script type="text/javascript">

    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {

            $('#sidebar').toggleClass('active');

        });

    });

</script>

</body>

</html>