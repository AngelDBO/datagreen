<?php
session_start();
if (isset($_SESSION['session_datapagos'])) {
?>

<!DOCTYPE html>
<html lang="es">
<?php require_once 'layouts/header.php'?>

<div class="page-wrapper">

    <?php require_once 'layouts/menu_principal.php'?>
    <!-- MENU PRINCIPAL-->

    <div class="page-container2">
        <!-- CONTENIDO-->
        <?php require_once 'layouts/menu_control.php'?>
        <!-- MENU PRINCIPAL-->
        <?php require_once 'layouts/menu_mobile.php'?>
        <!-- END HEADER DESKTOP-->

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
                                        <li class="list-inline-item active">Pagos</li>
                                    </ul>
                                </div>
                                <button class="btn text-white btn-modal" data-toggle="modal"
                                    data-target="#modalRegistrar">
                                    <i class="fas fa-plus-circle"></i> Nuevo
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->
        <section class="mt-4">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pt-2 pb-2">
                                    <h4 class="card-title text-white">Listado de pagos</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover nowrap"
                                        id="tablaPagos">
                                        <thead class="text-thead">
                                            <tr>
                                                <th>Tercero</th>
                                                <th>Mes</th>
                                                <th>Monto</th>
                                                <th>Fecha pago</th>
                                                <th>Medio pago</th>
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
        </section>
    </div>
</div>

<!---=========== Modales de modulo pago ====-->

<!---=========== Modal registar ============-->
<?php require_once 'modal/pago/modal_registrar_pago.php'?>
<!--============ Modal editar ==============-->
<?php require_once 'modal/pago/modal_editar_pago.php'?>
<!--============ Modal Imagen ==============-->
<?php require_once 'modal/pago/modal_ver_comprobante_pago.php'?>

<!---=== Fin de Modales de modulo pago =====-->


<!--============Scripts JS =================-->
<?php require_once 'layouts/scripts.php'?>
<!--===== Funciones JS del modulo pago =====-->
<script src="../ajax/pagos.js"></script>

<?php
} else {
    header("location:../");
}
?>