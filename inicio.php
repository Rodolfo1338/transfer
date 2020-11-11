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



                <ul class="list-unstyled components">

                    

                    <p> <i class="fas fa-user"></i> Ricardo Alarcón</p>



                    <li class="nav-item">

                        <a class="nav-link" href="inicio.php"> <i class="fas fa-home"></i> Home</a>

                    </li>



                    <li>

                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-users-cog"></i> Administrar</a>

                        <ul class="collapse list-unstyled" id="homeSubmenu">

                            <li class="active">

                                <a href="alumnos.php"> <i class="fas fa-user-graduate"></i> </i> Alumnos</a>

                            </li>

                            <li>

                                <a href="empleados.php"> <i class="fas fa-user-tie"> </i> Empleados</a>

                            </li>

                            <li>

                                <a href="cuentas.php"> <i class="fas fa-address-book"></i> Cuentas</a>

                            </li>
                            <li>

                                <a href="conceptos.php"> <i class="fas fa-address-book"></i> Conceptos</a>

                            </li>
                            <li>

                                <a href="carreras.php"> <i class="fas fa-address-book"></i> Carreras</a>

                            </li>
                            <li>

                                <a href="conceptospendientes.php"> <i class="fas fa-address-book"></i> Conceptos Pendientes</a>

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

                            <h3 align="center">UTHH-Transfer</h3>

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

                                    <a class="nav-link" href="#"> <i class="fas fa-times-circle"></i> Cerrar sesión</a>

                                </li>

                                

                            </ul>

                        </div>

                    </div>

                </nav>

                <div class="contenedor-carrusel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="https://www.theeconomyjournal.com/images/showid2/1030637?w=981&zc=5&r=7:4&zc=5&r=59:29" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://tech.blogstar.hu/pages/tech/contents/blog/67279/pics/lead_800x600.jpg" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://positivevoice.gr/wp-content/uploads/2018/12/data-regulation-rules-ss-1920_pyoujo.jpg" alt="Third slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.addislaw.co.uk/wp-content/uploads/2018/10/Data-Protection.jpg" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
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
    

  



        <script type="text/javascript">

            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {

                    $('#sidebar').toggleClass('active');

                });

            });

        </script>

    </body>

</html>