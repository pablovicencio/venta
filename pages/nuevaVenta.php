<?php 
  include("../includesPages/validaSesion.php")
?>
<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtml.php");
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
          <!-- Nav tabs -->

            <div class="container-fluid">


            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#nueva_venta">Venta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#nueva_cotizacion">Cotización</a>
              </li>
            </ul>

            <div class="tab-content">
            <div id="nueva_venta" class="container tab-pane active"><br>
                <div class="row">
                    <div class="row page-titles">
                        <div class="col-md-3 align-self-center">
                            <h3 class="text-themecolor">Venta</h3>
                        </div>
                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                                <input type="number" class="form-control" name="id_cot" id="id_cot" placeholder="Buscar Cotización">
                                                <button class="btn btn-success" type="button" id="btn_buscar_cot"
                                                name="btn_buscar_cot" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                <div id="fec_cot_div" name="fec_cot_div" style="display: none">
                                                        <label for="fec_cot">Fecha Cotizacion </label>
                                                        <span id="fec_cot" name="fec_cot"></span>
                                                  </div>

                                            </div>

                        </div>
                    </div>
   
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">

                            <h4 class="card-title">Producto</h4>
                                <form id="formCodProd" name="formCodProd" onsubmit="return false;" class="form-horizontal p-t-20"  autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-barcode-scan"></i></div>
                                                <input type="text" class="form-control" name="codBarra" id="codBarra" placeholder="Escanéa el código de barras">
                                                <button class="btn btn-warning" type="button" id="btn_volver_buscar"
                                                name="btn_volver_buscar" style="display: none"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                            </div>
                                        </div>                                   
                                    </div>
                                </form>
                                <form id="formBusProd" name="formBusProd" onsubmit="return false;" class="form-horizontal p-t-20"  autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-account-search"></i></div>
                                                <input type="text" class="form-control" name="codigoBarra" id="codigoBarra" placeholder="Busca por el nombre">
                                                 <span id="nom_prod" name="nom_prod"></span>
                                            </div>

                                            <div class="row">
                                                <div class="list-group" id="lista_prod" name="lista_prod">
                                                </div>
                                            </div>

                                        </div>
                                        
                                                                                
                                    </div>
                                </form>
                                    <h5 class="card-title">Disponibilidad</h5>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-numeric"></i></div>
                                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="0.0" step="any">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="stockActual" name="stockActual" placeholder="Stock " readonly>
                                                <div class="input-group-addon"><i class="mdi mdi-database"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-cash"></i></div>
                                                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
                                            </div>
                                        </div>


                                        <div class="col-sm-2 mt-1">
                                            <button type="" class="btn btn-inverse" id="btn_agr_prod" name="btn_agr_prod"> <i class="fa fa-pencil"></i> Agregar</button>
                                        </div>
                                       

                                    </div>
                                    <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                               
                                                    <h4 class="card-title">Resumen Compra &nbsp;<i class="mdi  mdi-cart"></i></h4>
                                                    <div class="table-responsive m-t-2">
                                                        <table id="resumenVenta" name="resumenVenta" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Producto</th>
                                                                    <th>Marca</th>
                                                                    <th>Código</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Valor Unitario</th>
                                                                    <th>Total</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    
                                                </div>

                                        </div> 
                                    </div>
                                  <div class="col-12 mb-4 justify-content-end">
                                    <div class="col-sm-8 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Descuento</i></div>
                                            <input type="number" class="form-control " id="dscto" name="dscto"><span> *Presiona Enter para aplicar el Descuento</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Neto</i></div>
                                            <input type="text" class="form-control text-right" id="resNeto" name="resNeto" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">IVA</i></div>
                                            <input type="text" class="form-control text-right" id="resIva" name="resIva" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Total</i></div>
                                            <input type="text" class="form-control text-right" id="resTotal" name="resTotal" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4 mt-0 justify-content-end">
                                  <div class="form-group">
                                      <label for="cond_pago">Condición de Pago </label>
                                          <select class="form-control" name="cond_pago" id="cond_pago">
                                              <option value="" selected disabled>Seleccione la condición</option>    
                                          </select>
                                  </div>
                                </div>

                                    <input type="radio" id="impDet" name="optradioImp" value="impDet" checked >
                                      <label for="impDet">Imprimir Detalle total </label><br>
                                    <input type="radio" id="impRes" name="optradioImp" value="impRes">
                                      <label for="impRes">Imprimir solo total venta</label><br><br>

                                
                                    <input type="checkbox" style="position: static; opacity: 100;"  name="datCta" id="datCta" value="1">Incluir Datos Cuenta

                                    <br><br>
                                  



                                <div class="row">
                                  <div class="col-12">
                                    <h5 class="card-title">Observaciones <i class="fa fa-clipboard" aria-hidden="true"></i></h5>
                                    <textarea class="form-control" id="obs_ven" name="obs_ven" rows="4" maxlength="200"></textarea>
                                  </div>
                                </div>

                                    <a id="btn_modal_cli" class="link-modal btn btn-outline-info" data-toggle="modal" data-target="#modal_cli"> <i class="fa fa-address-card"></i> Cliente</a>
                                    <button type="button" class="btn btn-success" id="btn_ing_venta" name="btn_ing_venta"> <i class="fa fa-check"></i> Ingresar Venta</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="nueva_cotizacion" class="container tab-pane"><br>
                <div class="row">
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3 class="text-themecolor">Cotización</h3>
                        </div>
                    </div>
   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Producto</h4>
                                <form id="formBusProdCot" name="formBusProdCot" onsubmit="return false;" class="form-horizontal p-t-20"  autocomplete="off">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-barcode-scan"></i></div>
                                                <input type="text" class="form-control" name="codigoBarraCot" id="codigoBarraCot" placeholder="Escanéa el Código o Agrega el ID Fijo">
                                                <button class="btn btn-warning" type="button" id="btn_volver_buscar_cot"
                                                name="btn_volver_buscar_cot" style="display: none"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                                 <span id="nom_prod_cot" name="nom_prod_cot"></span>
                                            </div>

                                            <div class="row">
                                                <div class="list-group" id="lista_prod_cot" name="lista_prod_cot">
                                                </div>
                                            </div>

                                        </div>
                                        
                                                                                
                                    </div>
                                </form>
                                    <h5 class="card-title">Disponibilidad</h5>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-numeric"></i></div>
                                                <input type="number" class="form-control" id="cantidad_cot" name="cantidad_cot" placeholder="0.0" step="any">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="stockActualCot" name="stockActualCot" placeholder="Stock " readonly>
                                                <div class="input-group-addon"><i class="mdi mdi-database"></i></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-cash"></i></div>
                                                <input type="number" class="form-control" id="precioCot" name="precioCot" placeholder="Precio">
                                            </div>
                                        </div>


                                        <div class="col-sm-2 mt-1">
                                            <button type="" class="btn btn-inverse" id="btn_agr_prod_cot" name="btn_agr_prod_cot"> <i class="fa fa-pencil"></i> Agregar</button>
                                        </div>
                                       

                                    </div>
                                    <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                               
                                                    <h4 class="card-title">Resumen Cotización &nbsp;<i class="mdi  mdi-cart"></i></h4>
                                                    <div class="table-responsive m-t-2">
                                                        <table id="resumenCot" name="resumenCot" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Producto</th>
                                                                    <th>Marca</th>
                                                                    <th>Código</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Valor Unitario</th>
                                                                    <th>Total</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    
                                                </div>

                                        </div> 
                                    </div>
                                  <div class="col-12 mb-4 justify-content-end">
                                    <div class="col-sm-8 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Descuento</i></div>
                                            <input type="number" class="form-control " id="dscto_cot" name="dscto_cot"><span> *Presiona Enter para aplicar el Descuento</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Neto</i></div>
                                            <input type="text" class="form-control text-right" id="resNetoCot" name="resNetoCot" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">IVA</i></div>
                                            <input type="text" class="form-control text-right" id="resIvaCot" name="resIvaCot" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Total</i></div>
                                            <input type="text" class="form-control text-right" id="resTotalCot" name="resTotalCot" readonly>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                  <div class="col-12">
                                    <h5 class="card-title">Observaciones <i class="fa fa-clipboard" aria-hidden="true"></i></h5>
                                    <textarea class="form-control" id="obs_cot" name="obs_cot" rows="4" maxlength="200"></textarea>
                                  </div>
                                </div>

                                    <a id="btn_modal_cli_cot" class="link-modal btn btn-outline-info" data-toggle="modal" data-target="#modal_cli"> <i class="fa fa-address-card"></i> Cliente</a>
                                    <button type="button" class="btn btn-success" id="btn_ing_cot" name="btn_ing_cot"> <i class="fa fa-check"></i> Ingresar Cotización</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>







            </div>
            <footer class="footer text-right"> © 2020 DashBoard By Andescode.cl</footer>

        </div>
    </div>




<div class="modal fade" id="modal_cli" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">





              
                     <form id="formBusCli" name="formBusCli" onsubmit="return false;" autocomplete="off">


                          <div class="row">
                          <div class="form-group mx-sm-3 mb-2 mb-3">
                                  <label for="patente_cli" class="font-weight-bold" > Patente: </label>
                              </div>
                                <div class="form-group mx-sm-3 mb-2 mb-3">
                                             <input class="form-control" type="text" name="patente_cli" id="patente_cli"  placeholder="xxxxxx" maxlength="6" style="text-transform: uppercase;" required>
                                </div>
                                <div class="form-group   mb-3">
                                  <button class="btn btn-success" type="button" id="btn_buscar_cli" name="btn_buscar_cli"><i class="fa fa-search" aria-hidden="true"></i></button>
                                  <button class="btn btn-info" type="button" id="btn_volver_buscar_cli" style="display: none"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                </div>
                            </div>



                             <input type="hidden" class="form-control" id="id_cli" name="id_cli">

                          <div id="dat_bus_cli" name="dat_bus_cli" style="display: none">
                            <div class="row" >
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="nom_cli">Nombre</label>
                                                        <input type="text" class="form-control" id="nom_cli" name="nom_cli" maxlength="150" style="text-transform: uppercase;" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="mail_cli">Mail</label>
                                                        <input type="text" class="form-control" id="mail_cli" name="mail_cli" maxlength="100" style="text-transform: uppercase;">
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="fono_cli">Fono </label>
                                                        <input type="number" class="form-control" id="fono_cli" name="fono_cli" required>
                                                  </div>
                                      </div>
                                    </div>

                                  <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="marca_veh">Marca Vehiculo </label>
                                                                  <select class="form-control" name="marca_veh_cli" id="marca_veh_cli" required>
                                                                    <option value="" selected disabled>Seleccione la marca</option>    
                                                                  </select>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="modelo_veh">Modelo Vehiculo</label>
                                                        <input type="text" class="form-control" id="modelo_veh_cli" name="modelo_veh_cli" maxlength="45" style="text-transform: uppercase;" required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="anio_veh">Año Vehiculo</label>
                                                        <input type="number" class="form-control" id="anio_veh_cli" name="anio_veh_cli"  required>
                                                  </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="km_veh">KM Actuales </label>
                                                        <input type="number" class="form-control nro" id="km_veh_cli" name="km_veh_cli"  required>
                                                  </div>
                                      </div>
                                      <div class="col-4">
                                                  <div class="form-group">
                                                        <label for="km_veh">KM Proxima Mantención </label>
                                                        <input type="number" class="form-control nro" id="km_prox_cli" name="km_prox_cli"  required>
                                                  </div>
                                      </div>
                                      
                                      
                                    </div>

                                    <div class="col-12">
                                      <div class="table-responsive">
                                         <table class="table table-striped table-bordered" id="tabla_mov" name="tabla_mov">
                                            <thead>
                                              <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">KM</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                      </div>
                                    </div>
 
    
                                            <div class="row" >
                                                <div class="col">
                                                  <div class="form-group">
                                                        <button class="btn btn-outline-info" type="button" id="btn_mod_cli" name="btn_mod_cli" style="display: none">
                                                          Modificar
                                                        </button>
                                                        <button class="btn btn-outline-info" type="button" id="btn_cre_cli" name="btn_cre_cli" style="display: none">
                                                          Crear
                                                        </button>
                                                  </div>
                                                </div>
                                                <div class="col">
                                                  <div class="form-group">
                                                        
                                                  </div>
                                                </div>
                                           </div>
                                </form>
                              </div>
                      
                      













 

                        
 
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>






    <!-- All Jquery -->
    <?php
            include("../includesPages/recursoInferior.php");
    ?>
</body>

</html>