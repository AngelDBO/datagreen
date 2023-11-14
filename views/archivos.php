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
                            <div class="col-3">
                                <div class="dropdown">
                                    <button class="btn btn btn-upload btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Nuevo
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalNuevo">Archivo</a>
                                        <a class="dropdown-item" href="#">Carpeta</a>
                                        <a class="dropdown-item" href="#">Categoría</a>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush mt-4" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="zmdi zmdi-view-dashboard"></i> Todos</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="zmdi zmdi-time"></i> Recientes</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="zmdi zmdi-star-outline"></i> Favoritos</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="zmdi zmdi-account-box-o"></i> Compartidos</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><i class="zmdi zmdi-cloud-outline-alt"></i> Mi disco  <span class="badge badge-light badge-pill">10%</span></a>
                                </div>
                                <hr>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary active">
                                                        <input type="radio" name="options" id="option1" checked> <i class="zmdi zmdi-format-list-bulleted"></i>
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="options" id="option2"> <i class="zmdi zmdi-border-all"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Buscar un archivo">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="zmdi zmdi-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-2">
                                            <div class="card-body">
                                                <div class="card-group">
                                                    <div class="card folder mr-2">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a href="#" class="stretched-link">nomina 2023</a></h5>
                                                            <p class="card-text">additional content. This content is a little bit longer.</p>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between">
                                                            <small class="text-muted">3 mins ago</small>
                                                            <small class="text-muted">15kb</small>
                                                        </div>
                                                    </div>
                                                    <div class="card folder mr-2">
                                                        <div class="card-body">
                                                        <h5 class="card-title"><a href="#" class="stretched-link">nomina 2022</a></h5>
                                                            <p class="card-text">additional content.</p>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between">
                                                            <small class="text-muted">3 mins ago</small>
                                                            <small class="text-muted">15kb</small>
                                                        </div>
                                                    </div>
                                                    <div class="card folder mr-2">

                                                        <div class="card-body">
                                                        <h5 class="card-title"><a href="#" class="stretched-link">nomina 2021</a></h5>
                                                            <p class="card-text"></p>
                                                        </div>
                                                        <div class="card-footer d-flex justify-content-between">
                                                            <small class="text-muted">3 mins ago</small>
                                                            <small class="text-muted">15kb</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <table class="table table-borderless table-hover nowrap dt-responsive" id="tableArchivos">
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
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--MODALS-->
    <?php require_once 'modal/archivo/modal_nuevo_archivo.php' ?>
    <!--MODAL NUEVO ARCHIVO-->
    <?php require_once 'modal/archivo/modal_ver_archivo.php' ?>
    <!--MODAL VER ARCHIVO-->
    <?php require_once 'modal/archivo/modal_compartir_archivo.php' ?>
    <!--MODAL COMPARTIR ARCHIVO-->
    <?php require_once 'modal/archivo/modal_archivos_compartidos.php' ?>
    <!--MODAL ARCHIVOS COMPARTIDOS-->
    <?php require_once 'modal/archivo/modal_ver_archivos_compartidos.php' ?>
    <!--MODAL ARCHIVOS COMPARTIDOS-->

    <!--JS-->
    <?php require_once 'layouts/scripts.php' ?>
    <script src="../ajax/archivo.js"></script>

<?php
} else {
    header("location:../");
}
?>