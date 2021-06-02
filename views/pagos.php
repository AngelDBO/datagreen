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
                            <a href="javascript:void(0)" onclick="location.href = 'terceros'">
                                <i class="fas fa-chart-bar"></i>Terceros</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
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
                                    <a href="javascript:void(0)" onclick="location.href = 'egresos'">
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
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="../public/images/icon/avatar-big-01.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-home"></i>Dashboard
                                </a>
                                <span class="inbox-num-green">1</span>
                            </li>
                            <li>
                                <a href="pedidos.php">
                                    <i class="fas fa-chart-bar"></i>Terceros</a>
                                <span class="inbox-num">5</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>Pagos</a>
                                <span class="inbox-num-blue">3</span>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Tesoreria
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="table.html">
                                            <i class="fas fa-table"></i>Egresos</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Ingresos</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Configuraciones
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="login.html">
                                            <i class="fas fa-sign-in-alt"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="register.html">
                                            <i class="fas fa-user"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">
                                            <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                    </li>
                                </ul>
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
                                        <table class="table table-borderless table-hover nowrap dt-responsive"
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

            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <!-- Modal registar -->
    <div class="modal fade" data-backdrop="static" id="modalRegistrar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white pt-2 pb-2">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmPago" onsubmit="return registrarPago()" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="nombreTercero" name="NombreTercero" readonly>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tercero">Tercero</label>
                                <select class="form-control form-control-sm" name="tercero" id="tercero">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mes">Mes de pago</label>
                                <select class="form-control form-control-sm" name="mes" id="mes">
                                    <option value="" disabled selected>Seleccione mes</option>
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="monto">Monto</label>
                                <input type="text" class="form-control form-control-sm" id="monto" name="monto">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medioPago">Medio de pago</label>
                                <select class="form-control form-control-sm" id="medioPago" name="medioPago"></select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fechaPago">Fecha de pago</label>
                                <input type="date" class="form-control form-control-sm" id="fechaPago" name="fechaPago">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="comprobante">Comprobante</label>
                                <input accept="image/*" type="file" class="form-control form-control-sm"
                                    id="comprobante" name="comprobante">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control form-control-sm" name="descripcion" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm text-white btn-modal">
                            <i class="fas fa-save"></i> Registrar</button>
                    </form>
                </div>
                <div class="modal-footer" id="erroresPago">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal editar -->
    <div class="modal fade" data-backdrop="static" id="modalEditar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Editar pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmPagoUpdate" onsubmit="return ActualizarPago()" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" id="nombreTerceroU" name="NombreTerceroU" readonly>
                        <input type="hidden" id="TerceroUpdate" name="idRegistro" readonly>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tercero">Tercero</label>
                                <select class="form-control form-control-sm" name="terceroU" id="terceroU">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mes">Mes de pago</label>
                                <select class="form-control form-control-sm" name="mesU" id="mesU">
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="monto">Monto</label>
                                <input type="text" class="form-control form-control-sm" id="montoU" name="montoU">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medioPago">Medio de pago</label>
                                <select class="form-control form-control-sm" id="medioPagoU" name="medioPagoU"></select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fechaPago">Fecha de pago</label>
                                <input type="date" class="form-control form-control-sm" id="fechaPagoU"
                                    name="fechaPagoU">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="comprobante">Comprobante</label>
                                <input accept="image/*" type="file" class="form-control form-control-sm"
                                    id="comprobante" name="comprobanteU">
                                <input type="hidden" id="comprobanteU" name="comprobanteU" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control form-control-sm" name="descripcionU" rows="3"
                                    id="descripcionU"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm text-white btm-modal">
                            <i class="fas fa-save"></i> Guardar</button>
                    </form>
                </div>
                <div class="modal-footer" id="erroresPago">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Imagen -->
    <div class="modal fade" data-backdrop="static" id="modalImagen" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header pt-2 text-white pb-2">
                    <h5 class="modal-title text-white">Ver comprobante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="imagenData"></div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'layouts/scripts.php' ?>