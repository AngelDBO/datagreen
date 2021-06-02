<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../public/images/favicon/favicon.png" sizes="any">
    <!-- Title Page-->
    <title>DATAGREEN</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <!-- Fontfaces CSS-->
    <link href="../public/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../public/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <!-- Bootstrap CSS-->
    <!--<link href="../public/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">-->
    <!-- Vendor CSS-->
    <link href="../public/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="../public/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../public/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../public/css/theme.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="../public/images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-home"></i>Inicio
                            </a>
                        </li>
                        <li>
                            <a href="terceros">
                                <i class="fas fa-chart-bar"></i>Terceros
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>Pagos
                            </a>
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
                                        <i class="fas fa-table"></i>Egresos
                                    </a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Ingresos
                                    </a>
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
                                        <i class="fas fa-sign-in-alt"></i>Login
                                    </a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register
                                    </a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password
                                    </a>
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
                                                <i class="zmdi zmdi-account"></i>Account
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing
                                            </a>
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
                                            <li class="list-inline-item active">Gastos</li>
                                        </ul>
                                    </div>
                                    <button class="btn text-white btn-modal" data-toggle="modal"
                                        data-target="#registroGasto">
                                        <i class='fas fa-plus-circle'></i> Nuevo</span>
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
                                        <h4 class="card-title text-white">Listado de gastos</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless table-hover nowrap dt-responsive"
                                            id="TableGastos">
                                            <thead class="text-thead">
                                                <tr>
                                                    <th>Tercero</th>
                                                    <th>Monto</th>
                                                    <th>Medio de pago</th>
                                                    <th>Categoria</th>
                                                    <th>Nota</th>
                                                    <th>Acciones</th>
                                                    <th>Fecha registro</th>
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
    <div class="modal fade" data-backdrop="static" id="registroGasto" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-right rounded-left">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Registrar gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmGasto" onsubmit="return registrarGasto()" method="post" autocomplete="off">
                        <input type="hidden" name="IDusuario" value="1">
                        <div class="form-group">
                            <label for="terceroGasto" class="text-body col-form-label-sm">Tercero</label>
                            <select class="form-control form-control-sm" name="terceroGasto" id="terceroGasto" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="monto" class="text-body col-form-label-sm">Monto</label>
                            <input type="text" name="monto" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="medioGasto" class="text-body col-form-label-sm">Medio de pago</label>
                            <select class="form-control form-control-sm" name="medioGasto" id="medioGasto" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaGasto" class="text-body col-form-label-sm">Categoria</label>
                            <select class="form-control form-control-sm" name="categoriaGasto" id="categoriaGasto"
                                required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcionGasto" class="text-body col-form-label-sm">Descripción</label>
                            <textarea class="form-control form-control-sm" rows="3" name="descripcionGasto"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-modal text-white">
                                <i class='fas fa-save'></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
                <div id="erroresIngreso"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" data-backdrop="static" id="EditarGasto" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header pt-2 pb-2">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Editar gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizarGasto" onsubmit="return actualizarGasto()" method="post" autocomplete="off">
                        <input type="hidden" name="registroIDU" id="registroIDU" readonly>
                        <div class="form-group">
                            <label for="terceroGastoU" class="text-body col-form-label-sm">Tercero</label>
                            <select class="form-control form-control-sm" name="terceroGastoU" id="terceroGastoU"
                                required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="montoU" class="text-body col-form-label-sm">Monto</label>
                            <input type="text" name="montoU" class="form-control form-control-sm" id="montoU" required>
                        </div>
                        <div class="form-group">
                            <label for="medioGastoU" class="text-body col-form-label-sm">Medio de pago</label>
                            <select class="form-control form-control-sm" name="medioGastoU" id="medioGastoU" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaGastoU" class="text-body col-form-label-sm">Categoria</label>
                            <select class="form-control form-control-sm" name="categoriaGastoU" id="categoriaGastoU"
                                required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcionGastoU" class="text-body col-form-label-sm">Descripción</label>
                            <textarea class="form-control form-control-sm" rows="3" name="descripcionGastoU"
                                id="descripcionGastoU"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-modal  text-white">
                                <i class='fas fa-save'></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
                <div id="erroresIngreso"></div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="../public/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../public/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../public/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <!-- Vendor JS       -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../public/vendor/animsition/animsition.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Main JS-->
    <script src="../public/js/main.js"></script>
    <script src="../ajax/gastos.js"></script>

</body>

</html>
<!-- end document-->