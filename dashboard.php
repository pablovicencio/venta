<?php 
session_start(); 
if( isset($_SESSION['id']) ){
    //Si la sesión esta seteada no hace nada
    $id = $_SESSION['id'];
    $nom_usu = $_SESSION['nom'];
    $correo_usu = $_SESSION['correo'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: index.html");
  }   

  
?>
<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("includesPages/headHtmlMain.php");
?>
<!-- FIN Include del Head HTML -->

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
            include("includesMain/header.php");
            include("includesMain/leftSideBar.php");
        ?>

        <!-- Contenido Principal -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Sistema de Administración</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/income.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Total Venta Diaria</h6>
                                        <h2 class="m-t-0">$<span id="spnVtaDia"></span></h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/expense.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Ventas Hoy</h6>
                                        <h2 class="m-t-0"><span id="spnNroVtaDia"></span></h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="assets/images/icon/staff.png" alt="Income" /></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Clientes Hoy</h6>
                                        <h2 class="m-t-0"><span id="spnNroCli"></span></h2></div>
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
                                        <h3 class="card-title m-b-5">Resúmen Ventas <span id="mesact"></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-theme stats-bar">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20" active>
                                            <h6 class="text-white">Este Mes</h6>
                                            <h3 class="text-white m-b-0">$<span id="spnVtaMes"></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">Esta Semana</h6>
                                            <h3 class="text-white m-b-0">$<span id="spnVtaSem"></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20" active>
                                            <h6 class="text-white">Este Mes M.O</h6>
                                            <h3 class="text-white m-b-0">$<span id="spnVtaMesMO"></span></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="p-20">
                                            <h6 class="text-white">Esta Semana M.O</h6>
                                            <h3 class="text-white m-b-0">$<span id="spnVtaSemMO"></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                    
                             
                        
                            <br>
                            <div class="row">

                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h5>Ventas Diarias</h5>
                                    <div id="vdia" class="graf"></div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                    <h5>Ventas Mensuales</h5>
                                    <div id="vmen" class="graf"></div>
                                    </div>


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
                                        <h4 class="card-title"><span class="lstick"></span>Ranking de productos</h4></div>
                                </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-sm" id="tab_prod" name="tab_prod" style="font-size: 0.9rem;">
                                          <thead>
                                            <tr>
                                              <th scope="col" >Producto </th>
                                              <th scope="col" >Cantidad </th>
                                              <th scope="col" >Familia Producto </th>
                                              <th scope="col" >Marca </th>
                                              <th scope="col" >Stock Actual </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                              <th scope="col" >Producto </th>
                                              <th scope="col" >Cantidad </th>
                                              <th scope="col" >Familia Producto </th>
                                              <th scope="col" >Marca </th>
                                              <th scope="col" >Stock Actual </th>
                                            </tr>
                                          </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-sm" id="tab_fam" name="tab_fam" style="font-size: 0.9rem;">
                                          <thead>
                                            <tr>
                                              <th scope="col" >Familia </th>
                                              <th scope="col" >Cantidad </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                              <th scope="col" >Familia </th>
                                              <th scope="col" >Cantidad </th>
                                            </tr>
                                          </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2020 DashBoard By Andescode.cl</footer>
        </div>
        <!-- FIN Contenido Principal -->

    </div>



    <!-- All Jquery -->
    <?php
            include("includesMain/recursoInferior.php");
    ?>
</body>

</html>