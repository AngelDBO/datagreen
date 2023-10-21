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
                                        <li class="list-inline-item active"><span class="h4">Terceros</span></li>
                                    </ul>
                                </div>
                                <button class="btn text-white btn-modal" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="zmdi zmdi-plus-circle"></i><span> Nuevo</span>
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#e">
                                    Launch demo modal
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
                                    <h4 class="card-title text-white">Listado de terceros</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless table-hover nowrap dt-responsive"
                                        id="tablaTerceros">
                                        <thead class="text-thead">
                                            <tr>
                                                <th>Tercero:</th>
                                                <th>Representante:</th>
                                                <th>Telefono:</th>
                                                <th>Celular:</th>
                                                <th>Estado:</th>
                                                <th>Fecha Registro:</th>
                                                <th>Acciones:</th>
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


<!-- Modal Registro -->
<?php require_once 'modal/tercero/modal_registro_tercero.php'?>
<!-- Modal Detalle -->
<?php require_once 'modal/tercero/modal_informacion_tercero.php'?>
<!-- Modal Update -->
<?php require_once 'modal/tercero/modal_actualizar_tercero.php'?>
<!-- Modal Actualizar Estado -->
<?php require_once 'modal/tercero/modal_actualizar_estado_tercero.php'?>
<!-- Jquery JS-->
<?php require_once 'layouts/scripts.php'?>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="e" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informacion del tercero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- FUNCIONES JS-->
<script src="../ajax/terceros.js"></script>
</body>

</html>
<!-- end document-->
<?php
} else {
    header("location:../");
}
?>