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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="">Categorías Artículos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_categoria">
                                                    <i class="fas fa-plus"></i> Nueva categoría
                                                </button>
                                            </div>
                                        </div>
                                        <table class="table table-hover table-striped table-sm nowrap dt-responsive" id="tablaCategorias">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center"></tbody>
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