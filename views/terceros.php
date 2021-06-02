<?php require_once 'layouts/cabecera.php' ?>

<body>
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="javascript:void(0)" onclick="location.href = 'inicio'">
                    <img src="../public/images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="javascript:void(0)" onclick="location.href = 'inicio'">
                                <i class="fa fa-home"></i>Inicio
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="fas fa-chart-bar"></i>Terceros</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="location.href = 'pagos'">
                                <i class="fas fa-shopping-basket"></i>Pagos</a>

                        </li>
                        <li class="has-sub">
                            <a class="js-arrow">
                                <i class="fas fa-trophy"></i>Tesoreria
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-suitcase"></i>Egresos</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="location.href = 'ingresos'">
                                        <i class="fa fa-pencil-square-o"></i>Ingresos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow">
                                <i class="fas fa-copy"></i>Configuraciones
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="javascript:void(0)" onclick="location.href = 'usuarios'">
                                        <i class="fas fa-user"></i>Usuarios
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="location.href = 'medios'">
                                        <i class="fa fa-calculator"></i>Medios Pagos</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="../public/images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--MENU MOBILE-->
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="../public/images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="inicio">
                                    <i class="fa fa-home"></i>Inicio
                                </a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-chart-bar"></i>Terceros
                                </a>
                            </li>
                            <li>
                                <a href="pagos">
                                    <i class="fas fa-shopping-basket"></i>Pagos
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-credit-card"></i>Tesoreria
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="egresos">
                                            <i class="fa fa-usd"></i>Egresos</a>
                                    </li>
                                    <li>
                                        <a href="ingresos">
                                            <i class="fa fa-usd"></i>Ingresos</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="medios">
                                    <i class="fa fa-cubes"></i>Medios Pagos
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
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
                                            <li class="list-inline-item active"><span class="h4">Terceros</span></li>
                                        </ul>
                                    </div>
                                    <button class="btn text-white btn-modal" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="zmdi zmdi-plus-circle"></i><span> Nuevo</span>
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
                                        <table class="table table-borderless table-hover nowrap dt-responsive" id="tablaTerceros">
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
    <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h4 class="modal-title text-white">Registro Terceros</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmTercero" onsubmit="return registrarTercero()" method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="identificacion" class="text-body col-form-label-sm">Identificacion</label>
                                <select class="form-control form-control-sm" name="identificacion">
                                    <option disabled selected value=""></option>
                                    <option value="NIT">NIT</option>
                                    <option value="CC">Cedula</option>
                                    <option value="NUIP">Numero Unico de Identificacion Personal</option>
                                    <option value="RC">Registro Civil</option>
                                    <option value="PP">Pasaporte</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="TE">Tarjeta Extranjera</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="numero" class="text-body col-form-label-sm">Numero</label>
                                <input type="text" class="form-control form-control-sm" name="numero">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label for="empresa" class="text-body col-form-label-sm">Empresa</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="empresa"
                                        value="La romana">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="representante" class="text-body col-form-label-sm">Representante</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="representante"
                                        value="Angel">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="tipoNegocio" class="text-body col-form-label-sm">Tipo Negocio</label>
                                <input type="text" class="form-control form-control-sm" name="tipoNegocio"
                                    value="Farmacia">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="correo" class="text-body col-form-label-sm">Correo</label>
                                <input type="text" class="form-control form-control-sm" name="correo"
                                    value="a@hotmail.com">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="web" class="text-body col-form-label-sm">Web</label>
                                <input type="text" class="form-control form-control-sm" name="web"
                                    value="https://www.minv.co/minvs/minv/view/login.php">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="tipoNegocio" class="text-body col-form-label-sm">Factura Electrónico</label>
                                <select name="facturaElectronico" class="form-control form-control-sm">
                                    <option value="" disabled></option>
                                    <option value="Si" selected>Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="correo" class="text-body col-form-label-sm">Direccion</label>
                                <input type="text" class="form-control form-control-sm" name="direccion"
                                    value="cd 33-34-3">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="telefono1" class="text-body col-form-label-sm">Telefono 1</label>
                                <input type="text" class="form-control form-control-sm" name="telefono1"
                                    value="7899090">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="telefono2" class="text-body col-form-label-sm">Telefono 2</label>
                                <input type="text" class="form-control form-control-sm" name="telefono2"
                                    value="7806060">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="celular1" class="text-body col-form-label-sm">Celular 1</label>
                                <input type="text" class="form-control form-control-sm" name="celular1"
                                    value="3217899090">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="celular2" class="text-body col-form-label-sm">Celular 2</label>
                                <input type="text" class="form-control form-control-sm" name="celular2"
                                    value="3007899090">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="departamento" class="text-body col-form-label-sm">Departamento</label>
                                <select class="form-control form-control-sm" name="departamento" id="departamento"
                                    onchange="listarMunicipio(this);"></select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="municipio" class="text-body col-form-label-sm">Municipio</label>
                                <select class="form-control form-control-sm" name="municipio" id="municipio"></select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="cuenta" class="text-body col-form-label-sm">Cuentas</label>
                                <input type="number" class="form-control form-control-sm" name="cuenta" value="2">
                            </div>
                            <input type="hidden" class="form-control" name="usuario" readonly value="1">
                        </div>
                        <div class="form-row pt-2">
                            <button class="btn ml-1 btn-sm text-white" type="submit">
                                <i class="zmdi zmdi-floppy"></i> Registrar</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer" id="errores">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Detalle -->
    <div class="modal fade" id="ModalSee" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title text-white">Detalle Tercero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">General</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Contacto</a>
                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Info</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="form-row pt-2">
                                <div class="form-group col-md-6">
                                    <label for="Identificación">Identificación</label>
                                    <input type="text" class="form-control form-control-sm" id="Identificacion"
                                        readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Numero">Numero</label>
                                    <input type="text" class="form-control form-control-sm" id="Numero" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Empresa">Empresa</label>
                                    <input type="text" class="form-control form-control-sm" id="Empresa" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Representante">Representante</label>
                                    <input type="text" class="form-control form-control-sm" id="Representante"
                                        readonly="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="facturaElectronico">Factura electronico</label>
                                    <input type="text" class="form-control form-control-sm" id="facturaElectronico"
                                        readonly="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tipoNegocio">Tipo negocio</label>
                                    <input type="text" class="form-control form-control-sm" id="tipoNegocio"
                                        readonly="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control form-control-sm" id="estado" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-row pt-2">
                                <div class="form-group col-md-6">
                                    <label for="Telefono">Telefono 1</label>
                                    <input type="text" class="form-control form-control-sm" id="Telefono1" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Telefono2">Telefono 2</label>
                                    <input type="text" class="form-control form-control-sm" id="Telefono2" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Celular1">Celular 1</label>
                                    <input type="text" class="form-control form-control-sm" id="Celular1" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Celular2">Celular 1</label>
                                    <input type="text" class="form-control form-control-sm" id="Celular2" readonly="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Direccion">Direccion</label>
                                    <input type="text" class="form-control form-control-sm" id="Direccion" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Correo">Correo</label>
                                    <input type="text" class="form-control form-control-sm" id="Correo" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="form-row pt-2">
                                <div class="form-group col-md-6">
                                    <label for="web">Web</label>
                                    <input type="urk" class="form-control form-control-sm" id="web" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Cuenta">Cuentas</label>
                                    <input type="text" class="form-control form-control-sm" id="Cuenta" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Departamento">Departamento</label>
                                    <input type="text" class="form-control form-control-sm" id="Departamento" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Municipio">Municipio</label>
                                    <input type="text" class="form-control form-control-sm" id="Municipio" readonly="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fechaRegistro">Fecha Registro</label>
                                    <input type="text" class="form-control form-control-sm" id="fechaRegistro"
                                        readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update -->
    <div class="modal fade" id="ModalUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h4 class="modal-title text-white">Actualizar Tercero</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmTerceroUpdate" onsubmit="return actualizarTercero()" method="post" autocomplete="off">
                        <div class="form-row">
                            <input type="hidden" readonly="" name="idU" id="idU">
                            <div class="col-md-6">
                                <label for="identificacionU" class="text-body col-form-label-sm">Identificacion</label>
                                <select class="form-control form-control-sm" name="identificacionU"
                                    id="identificacionU">
                                    <option disabled selected value=""></option>
                                    <option value="NIT">NIT</option>
                                    <option value="CC">Cedula</option>
                                    <option value="NUIP">Numero Unico de Identificacion Personal</option>
                                    <option value="RC">Registro Civil</option>
                                    <option value="PP">Pasaporte</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="TE">Tarjeta Extranjera</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="numeroU" class="text-body col-form-label-sm">Numero</label>
                                <input type="text" class="form-control form-control-sm" name="numeroU" id="numeroU">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-2">
                                <label for="Empresa" class="text-body col-form-label-sm">Empresa</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="empresaU"
                                        id="empresaU">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="Representante" class="text-body col-form-label-sm">Representante</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="representanteU"
                                        id="representanteU">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="tipoNegocioU" class="text-body col-form-label-sm">Tipo Negocio</label>
                                <input type="text" class="form-control form-control-sm" name="tipoNegocioU"
                                    id="tipoNegocioU">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="correoU" class="text-body col-form-label-sm">Correo</label>
                                <input type="text" class="form-control form-control-sm" name="correoU" id="correoU">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="WebU" class="text-body col-form-label-sm">Web</label>
                                <input type="" class="form-control form-control-sm" name="webU" id="webU">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="facturaElectronico" class="text-body col-form-label-sm">Factura
                                    Electrónico</label>
                                <select name="facturaElectronicoU" class="form-control form-control-sm"
                                    id="facturaElectronicoU">
                                    <option value="" disabled></option>
                                    <option value="Si" selected>Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="direccionU" class="text-body col-form-label-sm">Direccion</label>
                                <input type="text" class="form-control form-control-sm" name="direccionU"
                                    id="direccionU">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="telefono1U" class="text-body col-form-label-sm">Telefono 1</label>
                                <input type="text" class="form-control form-control-sm" name="telefono1U"
                                    id="telefono1U">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="telefono2U" class="text-body col-form-label-sm">Telefono 2</label>
                                <input type="text" class="form-control form-control-sm" name="telefono2U"
                                    id="telefono2U">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="celular1" class="text-body col-form-label-sm">Celular 1</label>
                                <input type="text" class="form-control form-control-sm" name="celular1U" id="celular1U">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="celular2" class="text-body col-form-label-sm">Celular 2</label>
                                <input type="text" class="form-control form-control-sm" name="celular2U" id="celular2U">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="departamento" class="text-body col-form-label-sm">Departamento</label>
                                <input type="text" class="form-control form-control-sm" name="departamentoU"
                                    id="departamentoU">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="municipio" class="text-body col-form-label-sm">Municipio</label>
                                <input type="text" class="form-control form-control-sm" name="municipioU"
                                    id="municipioU">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="cuenta" class="text-body col-form-label-sm">Cuentas</label>
                                <input type="number" class="form-control form-control-sm" name="cuentaU" id="cuentaU">
                            </div>
                            <input type="hidden" class="form-control" name="usuario" readonly value="1">
                        </div>
                        <div class="form-row pt-2">
                            <div class="col-md-4">
                                <button class="btn btn-sm text-white" type="submit">
                                    <i class="zmdi zmdi-floppy"></i> Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer" id="erroresEdit">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Actualizar Estado -->
    <div class="modal fade" id="ModalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Actualizar estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEstado" onsubmit="return updateEstado()" method="post">
                        <input type="hidden" name="idEstado" id="idEstado" required>
                        <div class="form-group">
                            <label for="actualizarEstado">Seleccione:</label>
                            <select class="form-control form-control-sm" name="actualizarEstado" id="actualizarEstado"
                                required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm text-white">
                                <i class="zmdi zmdi-floppy"></i> Actualizar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="erroresEstado">

                </div>
            </div>
        </div>
    </div>

    <?php require_once 'layouts/scripts.php' ?>