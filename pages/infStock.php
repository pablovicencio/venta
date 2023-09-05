<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtmlInfStock.php");
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
            //../includesPages de Header y LeftSidebar
            include("../includesPages/header.php");
            include("../includesMain/leftSideBar.php");
        ?>
        <!-- Contenido Principal -->
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Informe de Stock</h3>

                </div>
            </div>
                <div class="row">
   
                    <div class="col-lg-12">

                      <div id="loading" style="display: none;">
                        <center><img src="../assets/images/load.gif"></center>
                      </div>


                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#inf_stock_fec">Informe por Periodo</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#inf_stock_prod">Informe por Producto</a>
                        </li>
                      </ul>


                      <div class="tab-content">
                        <div id="inf_stock_fec" class="container tab-pane active"><br>
                            <form id="formBuscarPer" onsubmit="return false;"  >
                              <div class="form-group row">
                                  <label for="dias" class="col-sm-3 col-form-label">Periodo de ventas en dias:</label>
                                  <input type="number"  class="form-control col-sm-2 " id="dias" name="dias"  required>
                                  <div class="col-sm-6">
                                      <button type="submit"  class="btn btn-outline-primary" id="btn_bus_per" name="btn_bus_per" >Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                                  </div>   
                              </div>
                            </form>

                            <hr>

                              <div id="div_per" style="display: none;">
                                <div class="table-responsive">
                                 
                                  <table class="table table-striped table-bordered table-sm" id="tab_per" name="tab_per" style="font-size: 0.8rem;">
                                      <thead>
                                        <tr>
                                          <th scope="col" style="display: none;">ID Prod </th>
                                          <th scope="col" >Producto </th>
                                          <th scope="col" >Codigo Producto </th>
                                          <th scope="col" >Marca </th>
                                          <th scope="col" >Stock Minimo </th>
                                          <th scope="col" >Stock Actual </th>
                                          <th scope="col" >Precio Costo</th>
                                          <th scope="col" >Precio Venta </th>
                                          <th scope="col" >Venta en los ultimos <span id="dias_inf" name="dias_inf"></span> dias</th>
                                          <th scope="col" >Proveedor </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th scope="col" style="display: none;">ID Prod </th>
                                          <th scope="col" >Producto </th>
                                          <th scope="col" >Codigo Producto </th>
                                          <th scope="col" >Marca </th>
                                          <th scope="col" >Stock Minimo </th>
                                          <th scope="col" >Stock Actual </th>
                                          <th scope="col" >Precio Costo</th>
                                          <th scope="col" >Precio Venta </th>
                                          <th scope="col" >Venta en los ultimos <span id="dias_inf" name="dias_inf"></span> dias</th>
                                          <th scope="col" >Proveedor </th>
                                        </tr>
                                      </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                      
                        <div id="inf_stock_prod" class="container tab-pane fade"><br>
                            <form id="formBuscarProd" onsubmit="return false;"  >

                                <div class="form-group row">
                                    <label for="dias" class="col-sm-2 col-form-label">Producto:</label>
                                    <input type="text"  class="form-control col-sm-3 " id="prod" name="prod" placeholder="Escanéa el Código o Agrega el ID Fijo" required>
                                    <div class="col-sm-7">
                                        <button type="submit"  class="btn btn-outline-primary" id="btn_bus_prod" name="btn_bus_prod" >Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                             </form>

                            <hr>

                            <div id="div_prod" style="display: none;">
                              <div class="table-responsive">

                                <table class="table table-striped table-bordered table-sm" id="tab_prod" name="tab_prod" style="font-size: 0.8rem;">
                                      <thead>
                                        <tr>
                                          <th scope="col" style="display: none;">ID Prod </th>
                                          <th scope="col" >Producto </th>
                                          <th scope="col" >Codigo Producto </th>
                                          <th scope="col" >Marca </th>
                                          <th scope="col" >Stock Minimo </th>
                                          <th scope="col" >Stock Actual </th>
                                          <th scope="col" >Precio Costo</th>
                                          <th scope="col" >Precio Venta </th>
                                          <th scope="col" >Ventas </th>
                                          <th scope="col" >Proveedor </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th scope="col" style="display: none;">ID Prod </th>
                                          <th scope="col" >Producto </th>
                                          <th scope="col" >Codigo Producto </th>
                                          <th scope="col" >Marca </th>
                                          <th scope="col" >Stock Minimo </th>
                                          <th scope="col" >Stock Actual </th>
                                          <th scope="col" >Precio Costo</th>
                                          <th scope="col" >Precio Venta </th>
                                          <th scope="col" >Ventas </th>
                                          <th scope="col" >Proveedor </th>
                                        </tr>
                                      </tfoot>
                                    </table>

                              </div>
                            </div>
                        </div>
                      </div>







                        
                    </div>

                </div>
            <footer class="footer text-right"> © 2020 DashBoard By Andescode.cl</footer>
        </div>
    </div>



    <!-- All Jquery -->
    <?php
            include("../includesPages/recursoInferior.php");
    ?>
</body>

</html>