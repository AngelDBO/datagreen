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
            <?php require_once 'layouts/menu_control.php'?><!-- MENU PRINCIPAL-->
            <?php require_once 'layouts/menu_mobile.php'?>
            <?php require_once 'layouts/seccion_estadisticas.php'?>

            <!-- SECCIONES-->
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pt-2 pb-2">
                                        <h4 class="card-title text-white">Listado de terceros</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive"
                                            id="tablaPrincipal">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Tercero</th>
                                                    <th>Web</th>
                                                    <th>Representante</th>
                                                    <th>Email</th>
                                                    <th>Estado</th>
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
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header pt-2 pb-2">
                                        <h4 class="card-title text-white">Pagos registrados</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="miGrafico"></canvas>
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header pt-2 pb-2">
                                        <h4 class="card-title text-white">Ingresos registrados</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="graficoIngreso"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header pt-2 pb-2">
                                        <h4 class="card-title text-white">Egresos registrados</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="graficoEgreso"></canvas>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div
                                        class="card-header pt-2 pb-2 d-flex justify-content-between align-items-center">
                                        <h4 class="card-title text-white">Agenda</h4>
                                        <button class="btn btn-sm btn-light float-right text-body" data-toggle="modal"
                                            data-target="#modalActividad">
                                            <i class="fa fa-plus-circle"></i> Nuevo </button>
                                    </div>

                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive"
                                            id="Tableagenda">
                                            <thead class="font-weight-normal text-thead">
                                                <tr>
                                                    <th width="2%" class="text-center"></th>
                                                    <th class="text-left">Actividad</th>
                                                    <th width="10%">Periodo</th>
                                                    <th width="10%" class="text-center">Fechas</th>
                                                    <th width="10%" class="text-center">Estado</th>
                                                    <th width="5%"><i class="far fa-edit"></i></th>
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


    <?php require_once 'modal/inicio/modal_crear_tareas.php'?><!-- MODAL CREAR TAREAS -->
    <?php require_once 'modal/inicio/modal_actualizar_tarea.php'?><!-- Modal Update-->


    <!-- Jquery JS-->
    <?php require_once 'layouts/scripts.php'?>
    <!-- FUNCIONES JS-->
    <script src="../ajax/inicio.js"></script>
    <?php
} else {
    header("location:../");
}
?>