<?php 
  include("../includesPages/validaSesion.php")
?>
<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtmlInfVen.php");
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
                    <h3 class="text-themecolor">Informe de Ventas</h3>

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
                          <a class="nav-link active" data-toggle="tab" href="#inf_venta_fec">Informe por Periodo</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#inf_venta_cli">Informe por Cliente</a>
                        </li>
                      </ul>


                      <div class="tab-content">
                        <div id="inf_venta_fec" class="container tab-pane active"><br>
                            <form id="formBuscarPer" onsubmit="return false;"  >
                              <div class="form-group row">
                                  <label for="rut" class="col-sm-1 col-form-label">Desde:</label>
                                  <input type="date"  class="form-control col-sm-2 " id="desde" name="desde"  required>
                                  <label for="rut" class="col-sm-1 col-form-label">Hasta:</label>
                                  <input type="date"  class="form-control col-sm-2 " id="hasta" name="hasta"  required>
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
                                          <th scope="col" >ID Venta </th>
                                          <th scope="col" >Fecha </th>
                                          <th scope="col" >Hora </th>
                                          <th scope="col" >Estado </th>
                                          <th scope="col" >Descuento </th>
                                          <th scope="col" >Precio </th>
                                          <th scope="col" >Observación</th>
                                          <th scope="col" >Cliente </th>
                                          <th scope="col" >Detalle </th>
                                          <th scope="col" >Imprimir </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th scope="col" >ID Venta </th>
                                          <th scope="col" >Fecha </th>
                                          <th scope="col" >Hora </th>
                                          <th scope="col" >Estado </th>
                                          <th scope="col" >Descuento </th>
                                          <th scope="col" >Precio </th>
                                          <th scope="col" >Observación</th>
                                          <th scope="col" >Cliente </th>
                                          <th scope="col" >Detalle </th>
                                          <th scope="col" >Imprimir </th>
                                        </tr>
                                      </tfoot>
                                    </table>

                                </div>
                            </div>
                        </div>
                      
                        <div id="inf_venta_cli" class="container tab-pane fade"><br>
                            <form id="formBuscarCli" onsubmit="return false;"  >

                                <div class="form-group row">
                                    <label for="rut" class="col-sm-2 col-form-label">Patente:</label>
                                    <input type="text"  class="form-control col-sm-3 " id="patente" name="patente" maxlength="6" placeholder="xxxxxx" required>
                                    <div class="col-sm-7">
                                        <button type="submit"  class="btn btn-outline-primary" id="btn_bus_cli" name="btn_bus_cli" >Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                             </form>

                            <hr>

                            <div id="div_cli" style="display: none;">
                              <div class="table-responsive">

                                <table class="table table-striped table-bordered table-sm" id="tab_cli" name="tab_cli" style="font-size: 0.8rem;">
                                      <thead>
                                        <tr>
                                          <th scope="col" >ID Venta </th>
                                          <th scope="col" >Fecha </th>
                                          <th scope="col" >Hora </th>
                                          <th scope="col" >Estado </th>
                                          <th scope="col" >Descuento </th>
                                          <th scope="col" >Precio </th>
                                          <th scope="col" >Observación</th>
                                          <th scope="col" >Cliente </th>
                                          <th scope="col" >Detalle </th>
                                          <th scope="col" >Imprimir </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th scope="col" >ID Venta </th>
                                          <th scope="col" >Fecha </th>
                                          <th scope="col" >Hora </th>
                                          <th scope="col" >Estado </th>
                                          <th scope="col" >Descuento </th>
                                          <th scope="col" >Precio </th>
                                          <th scope="col" >Observación</th>
                                          <th scope="col" >Cliente </th>
                                          <th scope="col" >Detalle </th>
                                          <th scope="col" >Imprimir </th>
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


<div class="modal fade" id="modal_det_venta" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Venta Nro: <span id="id_venta" name="id_venta"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">





              
                     <form id="formAnuVenta" name="formAnuVenta" onsubmit="return false;" autocomplete="off">



                             <input type="hidden" class="form-control" id="id_venta_anu" name="id_venta_anu">

                          
                            <div class="row" >
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="patente_cli">Patente</label>
                                                        <input type="text" class="form-control" id="patente_mod" name="patente_mod" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="nom_cli">Cliente</label>
                                                        <input type="text" class="form-control" id="nom_cli" name="nom_cli" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="marca">Marca</label>
                                                        <input type="text" class="form-control" id="marca" name="marca" readonly>
                                                  </div>
                                      </div>
                                    </div>

                                  <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="modelo_veh">Modelo Vehiculo</label>
                                                        <input type="text" class="form-control" id="modelo_veh_cli" name="modelo_veh_cli" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="km_veh">KM Venta </label>
                                                        <input type="number" class="form-control nro" id="km_veh_cli" name="km_veh_cli"  readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="km_veh">KM Proxima Mantención </label>
                                                        <input type="number" class="form-control nro" id="km_prox_cli" name="km_prox_cli" readonly>
                                                  </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="fec_ven">Fecha Venta </label>
                                                        <input type="text" class="form-control" id="fec_ven" name="fec_ven"  readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="hora_ven">Hora Venta</label>
                                                        <input type="text" class="form-control" id="hora_ven" name="hora_ven" readonly>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="est_ven">Estado Venta</label>
                                                        <input type="text" class="form-control" id="est_ven" name="est_ven" readonly>
                                                  </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-12">
                                        <label for="obs_ven">Observaciones </label>
                                        <textarea class="form-control" id="obs_ven" name="obs_ven" rows="4" maxlength="200" readonly></textarea>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="table-responsive">
                                         <table class="table table-striped table-bordered" id="tabla_det_ven" name="tabla_det_ven">
                                            <thead>
                                              <tr>
                                                <th scope="col">Cod Producto</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Marca</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio Uni</th>
                                                <th scope="col">Precio Total</th>                                                
                                              </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-6">
                                                  <div class="form-group">
                                                        <label for="dscto">Descuento</label>
                                                        <input type="text" class="form-control nro" id="dscto" name="dscto"  readonly>
                                                  </div>
                                      </div>
                                      <div class="col-6">
                                                  <div class="form-group">
                                                        <label for="pre_total">Precio Total</label>
                                                        <input type="text" class="form-control nro" id="pre_total" name="pre_total" readonly>
                                                  </div>
                                      </div>
                                    </div>



                                    <div class="modal-footer">
                                      <button class="btn btn-outline-danger" type="submit" id="btn_anu_ven" name="btn_anu_ven">Anular Venta</button>
                                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>

      
    </div>
  </div>
</div>





    <!-- All Jquery -->
    <?php
            include("../includesPages/recursoInferior.php");
    ?>
</body>

</html>