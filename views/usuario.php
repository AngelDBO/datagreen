<?php
session_start();
if (isset($_SESSION['session_datapagos'])) {
?>

    <?php require_once 'layouts/header.php' ?>

    <div class="page-wrapper">

        <!-- END MENU SIDEBAR-->
        <?php require_once 'layouts/menu_principal.php' ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <?php require_once 'layouts/menu_control.php' ?>
            <!-- MENU PRINCIPAL-->
            <?php require_once 'layouts/menu_mobile.php' ?>
            <!-- END HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="overview-wrap">
                            <h2 class="title-1">Usuarios</h2>
                            <button class="au-btn au-btn-icon btn-modal" data-toggle="modal" data-target="#modalNuevo">
                                <i class="zmdi zmdi-plus"></i>Nuevo Usuario
                            </button>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-xl-12">
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive" id="tablaUsuarios">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Usuario</th>
                                                    <th>Correo</th>
                                                    <th>Rol</th>
                                                    <th>Estado</th>
                                                    <th>Fecha registro</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTAINER-->
    </div>
    </div>

    <!-- Modal -->
    <?php require_once 'modal/usuario/modal_registrar_usuario.php' ?>
    <!-- Modal update-->
    <?php require_once 'modal/usuario/modal_editar_usuario.php' ?>
    <!-- Modal editar passwword-->
    <?php require_once 'modal/usuario/modal_editar_password_usuario.php' ?>


    <!-- Jquery JS-->
    <?php require_once 'layouts/scripts.php' ?>
    <!-- FUNCIONES JS-->
    <script src="../ajax/usuario.js"></script>
<?php
} else {
    header("location:../");
}
?>