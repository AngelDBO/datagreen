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
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">   
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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    </head>
    <body>
        <div class="page-wrapper">
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar2">
                <div class="logo">
                    <a href="javascript:void(0)" onclick="location.href = 'inicio'">
                        <img src="../public/images/icon/logo-white.png" alt="Cool Admin"/>
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
                                        <img src="../public/images/icon/logo-white.png" alt="CoolAdmin"/>
                                    </a>
                                </div>
                                <div class="header-button2">
                                    <div class="header-button-item mr-0 js-sidebar-btn">
                                        <i class="zmdi zmdi-menu"></i>
                                    </div>
                                    <div class="setting-menu js-right-sidebar d-none d-block">
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
                            <img src="../public/images/icon/logo-white.png" alt="Cool Admin"/>
                        </a>
                    </div>
                    <div class="menu-sidebar2__content js-scrollbar2">
                        <div class="account2">
                            <div class="image img-cir img-120">
                                <img src="../public/images/icon/avatar-big-01.jpg" alt="John Doe"/>
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
                                                    <a href="javascript:void(0)" onclick="location.href = 'inicio'">Inicio</a>
                                                </li>
                                                <li class="list-inline-item seprate">
                                                    <span>/</span>
                                                </li>
                                                <li class="list-inline-item active"><span class="">Reporte Egresos - Gastos</span></li>
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
                                            <h4 class="card-title text-white">Reporte Egresos - Gastos</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="frmDetalle" method="post">
                                                <div class="row align-items-end">
                                                    <div class="form-group col-8 col-md-3">
                                                        <label for="Fecha" class="text-body col-form-label-sm">Fecha</label>
                                                        <input class="form-control form-control-sm" type="text" id="FechaConsulta" name="fecha">
                                                    </div>
                                                    <div class="form-group col-6 col-md-2">
                                                        <button type="button" class="btn btn-sm text-white"  style="background: #492ab3">
                                                            <i class="fas fa-search"></i> Consultar
                                                        </button>
                                                    </div>
                                                </div> 
                                            </form>
                                            <hr style="border: solid 2px; opacity: .2" >

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header pt-1 pb-1" style="background: #492ab3">
                                                            <h4 class="card-title text-white">Egresos</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered nowrap dt-responsive table-sm" id="tablaEgresos">
                                                                <thead class="font-weight-normal" style="color: #492ab3">
                                                                    <tr>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Mes</th>
                                                                        <th scope="col">Tercero</th>
                                                                        <th scope="col">Nota</th>
                                                                        <th scope="col">Monto</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">Last updated 3 mins ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header pt-1 pb-1" style="background: #492ab3">
                                                            <h4 class="card-title text-white">Ingresos</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered nowrap dt-responsive table-sm" id="tablaIngresos">
                                                                <thead class="font-weight-normal" style="color: #492ab3">
                                                                    <tr>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Mes</th>
                                                                        <th scope="col">Tercero</th>
                                                                        <th scope="col">Nota</th>
                                                                        <th scope="col">Monto</th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">Last updated 3 mins ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header pt-1 pb-1" style="background: #492ab3">
                                                            <h4 class="card-title text-white">Resultado mensual</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered nowrap table-sm"
                                                                   id="tablaresultados">
                                                                <thead class="font-weight-normal" style="color: #492ab3">
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col">Enero</th>
                                                                        <th scope="col">Febrero</th>
                                                                        <th scope="col">Marzo</th>
                                                                        <th scope="col">Abril</th>
                                                                        <th scope="col">Mayo</th>
                                                                        <th scope="col">Junio</th>
                                                                        <th scope="col">Julio</th>
                                                                        <th scope="col">Agosto</th>
                                                                        <th scope="col">Septiembre</th>
                                                                        <th scope="col">Octubre</th>
                                                                        <th scope="col">Noviembre</th>
                                                                        <th scope="col">Diciembre</th>                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th style="color: #dc3545" scope="row">Egresos</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>@mdo</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="color: #38ef7d" scope="row">Ingresos</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>Otto</td>
                                                                        <td>@mdo</td>
                                                                        <td>@mdo</td>
                                                                    </tr>     
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="card-footer">
                                                            <small class="text-muted">Last updated 3 mins ago</small>
                                                            <br>
                                                            <small class="text-muted">Last updated 3 mins ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
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

        <script src="../public/vendor/animsition/animsition.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="../ajax/reporteEgresos.js"></script>
        <!-- Main JS-->
        <script src="../public/js/main.js"></script>

    </body>
</html>
<!-- end document-->

