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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h3 class="text-muted">Categorías Artículos</h3>
                                            </div>
                                            <div class="col-md-2 float-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_categoria"><i class="fas fa-plus"></i> Nueva categoría</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive" id="tablaCategorias">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Estado</th>
                                                    <th>Fecha registro</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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