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
        <!--MENU MOBIL-->

        <!-- SECCIONES-->
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
                                        <li class="list-inline-item active">
                                            <span class="h4">Archivos</span>
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
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-header pt-2 pb-2">
                                    <h4 class="card-title text-white align-items-md-stretch">Gestion</h4>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-upload" data-toggle="modal"
                                            data-target="#modalNuevo">
                                            <i class="fas fa-cloud-upload-alt"></i> Nuevo</button>
                                    </div>
                                    <hr>
                                    <button type="button"
                                        class="btn btn-block btn-sm btn-link  text-left text-decoration-none"
                                        data-toggle="modal" data-target="#modalFileShareded"
                                        onclick="obtenerArchivosCompartidos()"><i class="uil uil-cloud-share"></i>
                                        Compartidos conmigo</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-header pt-2 pb-2">
                                    <h4 class="card-title text-white">Archivos</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover nowrap dt-responsive"
                                        id="tableArchivos">
                                        <thead class="text-thead">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Categoria</th>
                                                <th>Visualizar</th>
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
    </div>
</div>

<!--MODALS-->
<?php require_once 'modal/archivo/modal_nuevo_archivo.php'?>
<!--MODAL NUEVO ARCHIVO-->
<?php require_once 'modal/archivo/modal_ver_archivo.php'?>
<!--MODAL VER ARCHIVO-->
<?php require_once 'modal/archivo/modal_compartir_archivo.php'?>
<!--MODAL COMPARTIR ARCHIVO-->
<?php require_once 'modal/archivo/modal_archivos_compartidos.php'?>
<!--MODAL ARCHIVOS COMPARTIDOS-->
<?php require_once 'modal/archivo/modal_ver_archivos_compartidos.php'?>
<!--MODAL ARCHIVOS COMPARTIDOS-->

<!--JS-->
<?php require_once 'layouts/scripts.php'?>
<script src="../ajax/archivo.js"></script>

<?php
} else {
    header("location:../");
}
?>