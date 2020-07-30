<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtmlIng.php");
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
                    <h2 class="text-themecolor">Ingreso Productos</h2>
                </div>
            </div>
         <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                
                                    <div class="form-body">
                                        <h3 class="box-title">Información General</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                      
        
                                        </div>
                                        <div class="row">
                                            <form id="formBusProd" name="formBusProd" onsubmit="return false;" class="form-horizontal p-t-20"  >
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Código de Barra &nbsp;<i class="mdi mdi-barcode-scan"></i></div>
                                                        <input type="text" class="form-control" id="codigoBarra" name="codigoBarra" placeholder="Código de Barra">
                                                        
                                                        <button class="btn btn-warning" type="button" id="btn_volver_buscar"
                                                name="btn_volver_buscar" style="display: none"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                        <div class="row">
                                                            <div class="list-group" id="lista_prod" name="lista_prod">
                                                            </div>
                                                        </div>
                                            </div>
                                        </form>
                                        </div>
                                    <form id="formModProd" name="formModProd" onsubmit="return false;"  >
                                        <input type="hidden" class="form-control" id="id_prod" name="id_prod" >
                                            <div class="row">
                                             <div class="form-group ">
                                                <div class="col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nombre &nbsp;<i class="mdi mdi-file-document"></i></div>
                                                            <input type="text" class="form-control" id="nombreProd" name="nombreProd" placeholder="Nombre del Producto" readonly>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Proveedor &nbsp;<i class="mdi mdi-clipboard-check"></i></div>
                                                                <select class="form-control" name="prov" id="prov" required>
                                                                  <option value="" selected disabled>Seleccione el Proveedor</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!--/row-->
       
                                  

                                    </div>
                                    <div class="form-body">
                                        <h3 class="box-title">Información de Embalaje y Precio</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Unidad de Medida &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <select class="form-control ro" name="uniMed" id="uniMed" readonly required>
                                                                  <option value="" selected disabled>Seleccione la U. Medida</option>    
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Embalaje&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="number" class="form-control ro" id="embalaje" name="embalaje" placeholder="Embalaje" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Familia &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <select class="form-control ro" name="familia" id="familia" readonly required>
                                                                  <option value="" selected disabled>Seleccione la Familia</option>    
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Marca&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="text" class="form-control ro" id="marca" name="marca" placeholder="Marca Producto" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Compra Neto &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control ro" id="PreComNeto" name="PreComNeto" placeholder="Precio Compra Neto" onkeyup="calc()" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Dscto Compra % &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control ro" id="PorcDsctoCom" name="PorcDsctoCom" placeholder="% Dscto compra" onkeyup="calc()" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Valor Dscto &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="ValorDsctoCompra" name="ValorDsctoCompra" placeholder="Precio Bruto" readonly>
                                                        </div>
                                                    </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Total Compra Neto &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PreComNetoDscto" name="PreComNetoDscto" placeholder="Precio Compra Neto con dscto" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio Compra &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioTotalCompra" name="PrecioTotalCompra" placeholder="Precio Total Compra" readonly>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Iva Compra &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="IvaCompra" name="IvaCompra" placeholder="IVA Compra" readonly>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Ganacia % &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control ro" id="PorcGanaProd" name="PorcGanaProd" placeholder="% Ganacia" onkeyup="calc()" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Ganacia &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="ValorGanacia" name="ValorGanacia" placeholder="Ganancia" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio Venta sin IVA &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioNetoProd" name="PrecioNetoProd" placeholder="Precio Venta sin IVA" readonly>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">IVA Venta &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="IvaProd" name="IvaProd" placeholder="% Ganacia" readonly>
                                                        </div>
                                                    </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio de Venta Calculado &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioVentaCalc" name="PrecioVentaCalc" placeholder="Precio Calculado" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio de Venta &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control ro" id="PrecioBrutoProd" name="PrecioBrutoProd" placeholder="Precio de Venta" onkeyup="calc2()" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                            


                                        </div>


                                    </div>
                                    <div class="form-body">
                                        <h3 class="box-title">Información de Stock</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Stock Actual&nbsp;<i class="mdi mdi-database"></i></div>
                                                        <input type="number" class="form-control" id="stockInicial" name="stockInicial" placeholder="Stock Actual del Producto" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Stock Mínimo&nbsp;<i class="mdi mdi-database-minus"></i></div>
                                                        <input type="number" class="form-control ro" id="stockMinimo" name="stockMinimo" placeholder="Stock Mínimo" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Cantidad a Ingresar&nbsp;<i class="mdi mdi-database"></i></div>
                                                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="0.0" step="any" >
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div>

                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn btn-inverse" name="btn_agr_prod" id="btn_agr_prod"> <i class="fa fa-pencil"></i> Agregar</button>

                                                        <button type="button" class="btn btn-warning" name="btn_mod_prod" id="btn_mod_prod" >Modificar Producto</button>
                                                      
                                                        <button type="submit" class="btn btn-success" name="btn_guar_prod" id="btn_guar_prod" style="display: none"> <i class="fa fa-pencil"></i> Guardar Producto</button>

                                                        <button type="submit" class="btn btn-success" name="btn_cre_prod" id="btn_cre_prod" style="display: none"> <i class="fa fa-pencil"></i> Crear Producto</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                    <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                               
                                                    <h4 class="card-title">Resumen Ingreso &nbsp;<i class="mdi  mdi-cart"></i></h4>
                                                    <div class="table-responsive m-t-2">
                                                        <table id="resumenIng" name="resumenIng" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                <div class="col-12 mb-4 justify-content-end">
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

                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Tipo Documento &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <select class="form-control" name="tipoDoc" id="tipoDoc" readonly required>
                                                                  <option value="" selected disabled>Seleccione Tipo Doc</option>    
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Nro. Doc&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="number" class="form-control" id="nrodoc" name="nrodoc" placeholder="Nro Doc" >
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                <button type="button" class="btn btn-success" id="btn_reg_ing" name="btn_reg_ing"> <i class="fa fa-check"></i> Registrar Ingreso</button>
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