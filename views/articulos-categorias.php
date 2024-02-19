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
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_categoria">Nueva categoría</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Categorías artículos</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive" id="tablaEgresos">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
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

    <!-- ====================== MODALS ====================-->
    <?php require_once 'modal/articulos_categorias/agregar_categoria.php' ?>

    <!--JS-->
    <?php require_once 'layouts/scripts.php' ?>
    <script src="../ajax/articulos_categoria.js"></script>

<?php
} else {
    header("location:../");
}
?>