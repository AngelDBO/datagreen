<?php
session_start();
if (isset($_SESSION['session_datapagos'])) {
?>

<?php require_once 'layouts/header.php'?>

<div class="page-wrapper">

    <?php require_once 'layouts/menu_principal.php'?>
    <!-- MENU PRINCIPAL-->

    <div class="page-container2">
        <!-- CONTENIDO-->
        <?php require_once 'layouts/menu_control.php'?>
        <!-- MENU PRINCIPAL-->
        <?php require_once 'layouts/menu_mobile.php'?>
        <!-- BREADCRUMB-->
        <section class="au-breadcrumb m-t-75">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">Direccion:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="javascript:void(0)" onclick="location.href = 'inicio'">Inicio</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item active">Ingresos</li>
                                    </ul>
                                </div>
                                <button class="btn text-white btn-modal" data-toggle="modal"
                                    data-target="#registroIngreso">
                                    <i class='fas fa-plus-circle'></i> Nuevo
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->
        <section class="mt-5">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pt-2 pb-2">
                                    <h4 class="card-title text-white">Listado de Ingresos</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover nowrap dt-responsive"
                                        id="Tableingresos">
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
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
</div>
<!-- Modal -->
<?php require_once 'modal/ingreso/modal_registrar_ingreso.php'?>

<!-- Jquery JS-->
<?php require_once 'layouts/scripts.php'?>
<!-- FUNCIONES JS-->
<script src="../ajax/ingreso.js"></script>
<?php
} else {
    header("location:../");
}
?>