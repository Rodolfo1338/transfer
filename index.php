<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Iniciar sesión</title>



        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>



        <link rel="stylesheet" href="style-login.css">

    </head>

    <body>

        <div class="sidenav">

            <div class="login-main-text">

                <h2>UTHH TRANSFER</h2><br>

                <p>Inicie sesión o regístrese desde aquí para acceder.</p>

            </div>

        </div>

        <div class="main">



            <div class="container-fluid cont-bienvenido">

                <h2 class="msg-bienvenido">Bienvenido</h2>

            </div>

            

            <div class="col-md-6 col-sm-12">

                <div class="login-form">

                    <form>

                        <div class="form-group">

                            <label>Usuario</label>

                            <input type="text" class="form-control" placeholder="User Name">

                        </div>

                        <div class="form-group">

                            <label>Contraseña</label>

                            <input type="password" class="form-control" placeholder="Password">

                        </div>

                        <button type="submit" class="btn btn-entrar">Entrar</button>

                        <button type="submit" class="btn btn-registrar">Registrarme</button>

                        <input type="button" class="btn btn-entrar" onclick=" location.href='inicio.php' " value="Vamos" name="boton" /> 

                        <label>Login aun no implemetado, clic en Vamos...</label>

                    </form>

                </div>

            </div>

        </div>   

    </body>

</html>