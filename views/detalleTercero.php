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

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <?php require_once 'layouts/menu_control.php'?>
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
                                                <a href="javascript:void(0)"
                                                    onclick="location.href = 'inicio'">Inicio</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item active"><span class="h4">Detalle tercero</span>
                                            </li>
                                        </ul>
                                    </div>
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
                                    <div class="card-header pt-2 pb-2" style="background: #492ab3">
                                        <h4 class="card-title text-white">Historial de tercero</h4>
                                    </div>
                                    <div class="card-body">
                                        <form id="frmDetalle" method="post">
                                            <div class="row align-items-end">
                                                <div class="form-group col-5 col-md-4 ">
                                                    <label for="tercero"
                                                        class="text-body col-form-label-sm">Tercero</label>
                                                    <select class="form-control form-control-sm" id="listadoTercero"
                                                        name="terceroID" required></select>
                                                </div>
                                                <div class="form-group col-5 col-md-3">
                                                    <label for="Fecha" class="text-body col-form-label-sm">Fecha</label>
                                                    <input class="form-control form-control-sm" type="text" id="fechaC"
                                                        name="fecha">
                                                </div>
                                                <div class="form-group col-6 col-md-2">
                                                    <button type="button" class="btn text-white btn-sm btn-consultar" onclick="getDT()">
                                                        <i class="fas fa-search"></i> Consultar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr style="background-color: #434190">
                                        <div id='imgSpinner1'></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-borderless table-hover nowrap dt-responsive" 
                                                    id="tablaDetalle">
                                                    <thead class="text-thead">
                                                        <tr>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Fecha registro</th>
                                                            <th scope="col">Monto</th>
                                                            <th scope="col">Medio Pago</th>
                                                            <th scope="col">Nota</th>
                                                            <th scope="col">Usuario</th>
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
            </section>
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pt-2 pb-2">
                                        <h4 class="card-title text-white">Grafico detalle tercero</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="graficaDetalle"></canvas>
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

    <!-- Jquery JS-->
    <?php require_once 'layouts/scripts.php'?>
    <!-- FUNCIONES JS-->
    <script src="../ajax/detalleTercero.js"></script>
<?php
} else {
    header("location:../");
}
?>