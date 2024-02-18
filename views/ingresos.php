<?php
session_start();
if (isset($_SESSION['session_datapagos'])) {
?>

    <?php require_once 'layouts/header.php' ?>

    <div class="page-wrapper">

        <?php require_once 'layouts/menu_principal.php' ?>
        <!-- MENU PRINCIPAL-->

        <div class="page-container2">
            <!-- CONTENIDO-->
            <?php require_once 'layouts/menu_control.php' ?>
            <!-- MENU PRINCIPAL-->
            <?php require_once 'layouts/menu_mobile.php' ?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-bottom-0">
                                        <h3 class="card-title">Listado de Ingresos</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive" id="Tableingresos">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Tercero</th>
                                                    <th>Monto</th>
                                                    <th>Medio de pago</th>
                                                    <th>Nota</th>
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
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    <!-- Modal -->
    <?php require_once 'modal/ingreso/modal_registrar_ingreso.php' ?>

    <!-- Jquery JS-->
    <?php require_once 'layouts/scripts.php' ?>
    <!-- FUNCIONES JS-->
    <script src="../ajax/ingreso.js"></script>
<?php
} else {
    header("location:../");
}
?>