<?php
session_start();
if (isset($_SESSION["session_datapagos"])) {
    header('Location: views/inicio');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">
        <!-- Title Page-->
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"> 
        <link href="public/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="public/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <!-- Bootstrap CSS-->
        <link href="public/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="public/css/theme.css" rel="stylesheet" media="all">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <img src="public/images/icon/logo.png" alt="CoolAdmin">
                            </div>
                            <div class="login-form">
                                <form id="frmIniciar" onsubmit="return inciarSesion()" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input class="form-control" type="text" name="usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" pattern="[A-Za-z0-9_-]{6,16}" type="password" name="password" required>
                                    </div>
                                    <button class="btn text-white btn-modal mt-2"type="submit">
                                        <i class="fas fa-sign-in-alt"> Iniciar sesión</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jquery JS-->
        <script src="public/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="public/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="public/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="ajax/login.js"></script>
        <script src="public/vendor/sweetalert/sweetalert2.js"></script>
    </body>
</html>
<!-- end document-->