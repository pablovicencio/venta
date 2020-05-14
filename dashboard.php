<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Lubricentro - Dashboard</title>


    <?php
        include("includes/recursoSuperior.php");
    ?>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - estilo en spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Lubricentro</p>
        </div>
    </div>

    <div id="main-wrapper">

        <?php
            //Includes de Header y LeftSidebar
            include("includes/header.php");
            include("includes/leftSideBar.php");
        ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Sistema de Administración</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/income.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Total Venta Diaria</h6>
                                        <h2 class="m-t-0">$953.000</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/expense.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Ordenes de Compra</h6>
                                        <h2 class="m-t-0">232</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/assets.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Ordenes Pendientes</h6>
                                        <h2 class="m-t-0">243</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/staff.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Clientes Hoy</h6>
                                        <h2 class="m-t-0">23</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="card-title m-b-5"><span class="lstick"></span>Resúmen Ventas </h3>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">
                                            <option selected="">Enero 2020</option>
                                            <option value="1">Febrero 2020</option>
                                            <option value="2">Marzo 2020</option>
                                            <option value="3">Abril 2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme stats-bar">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20 active">
                                            <h6 class="text-white">Total Ventas</h6>
                                            <h3 class="text-white m-b-0">$18.654.548</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">Este Mes</h6>
                                            <h3 class="text-white m-b-0">$8.000.000</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">Esta Semana</h6>
                                            <h3 class="text-white m-b-0">$650.000</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales-overview2" class="p-relative" style="height:360px;"></div>
                            </div>
                        </div>
                    </div>
                    </div>   
                <!-- ============================================================== -->
                <!-- Projects of the month -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="card-title"><span class="lstick"></span>Últimas Recepciones Proveedores</h4></div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">
                                            <option selected="">Enero 2020</option>
                                            <option value="1">Febrero 2020</option>
                                            <option value="2">Marzo 2020</option>
                                            <option value="3">Abril 2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-20">
                                    <table class="table vm no-th-brd no-wrap pro-of-month">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Transportista</th>
                                                <th>Proveedor</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width:50px;"><span class="round"><i class="mdi mdi-truck-delivery"></i></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 1</td>
                                                <td><span class="label label-success label-rounded">Low</span></td>
                                            </tr>
                                            <tr class="active">
                                                <td><span class="round"><i class="mdi mdi-truck-delivery"></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 2</td>
                                                <td><span class="label label-info label-rounded">Medium</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-success"><i class="mdi mdi-truck-delivery"></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 3</td>
                                                <td><span class="label label-primary label-rounded">High</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-primary"><i class="mdi mdi-truck-delivery"></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 4</td>
                                                <td><span class="label label-danger label-rounded">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-warning"><i class="mdi mdi-truck-delivery"></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 5</td>
                                                <td><span class="label label-success label-rounded">High</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-danger"><i class="mdi mdi-truck-delivery"></span></td>
                                                <td>
                                                    <h6>Chofer Nombre Apellido</h6><small class="text-muted">Patente:GFFX85</small></td>
                                                <td>Proveedor 6</td>
                                                <td><span class="label label-info label-rounded">High</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Activity widget find scss into widget folder-->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2020 DashBoard By Andescode.cl</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
            include("includes/recursoInferior.php");
    ?>
    <!-- ============================================================== -->
    <!-- End Jquery -->
    <!-- ============================================================== -->
</body>

</html>