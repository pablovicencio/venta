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
            <div class="container-fluid">


        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#ProductoExistente">Producto Existente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#NuevoProducto">Nuevo Producto</a>
          </li>
        </ul>
        <div class="tab-content">
              <div id="ProductoExistente" class="container tab-pane active">
              </div>



        <div id="NuevoProducto" class="container tab-pane">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h2 class="text-themecolor">Nuevo Producto</h2>
                </div>
            </div>
         <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <form class="formAgregarProd" role="form">
                                    <div class="form-body">
                                        <h3 class="box-title">Información General</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Nombre &nbsp;<i class="mdi mdi-file-document"></i></div>
                                                        <input type="number" class="form-control" id="nombreProd" name="nombreProd" placeholder="Nombre del Producto">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Código de Barra &nbsp;<i class="mdi mdi-barcode-scan"></i></div>
                                                        <input type="number" class="form-control" id="codigoBarra" name="codigoBarra" placeholder="Código de Barra">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Proveedor &nbsp;<i class="mdi mdi-clipboard-check"></i></div>
                                                            <input type="text" class="form-control" id="prov" name="prov" placeholder="Select">
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                          
                                        </div>
                                  

                                    </div>
                                    <div class="form-body">
                                        <h3 class="box-title">Información de Embalaje y Precio</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Unidad de Medida &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <input type="number" class="form-control" id="unidadMedida" name="unidadMedida" placeholder="Unidad de Medida">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Embalaje&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="text" class="form-control" id="embalaje" name="embalaje" placeholder="Select">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Familia &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <input type="number" class="form-control" id="familia" name="familia" placeholder="Select">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Marca&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca Producto">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Compra Neto &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PreComNeto" name="PreComNeto" placeholder="Precio Compra Neto">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Dscto Compra % &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PorcDsctoCom" name="PorcDsctoCom" placeholder="% Dscto compra">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Valor Dscto &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="ValorDsctoCompra" name="ValorDsctoCompra" placeholder="Precio Bruto">
                                                        </div>
                                                    </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Total Compra Neto &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PreComNetoDscto" name="PreComNetoDscto" placeholder="Precio Compra Neto con dscto">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio Compra &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioTotalCompra" name="PrecioTotalCompra" placeholder="Precio Total Compra">
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Iva Compra &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="IvaCompra" name="IvaCompra" placeholder="IVA Compra">
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Ganacia % &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PorcGanaProd" name="PorcGanaProd" placeholder="% Ganacia">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Ganacia &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="ValorGanacia" name="ValorGanacia" placeholder="Ganancia">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio Venta sin IVA &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioNetoProd" name="PrecioNetoProd" placeholder="Precio Venta sin IVA">
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">IVA Venta &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="IvaProd" name="IvaProd" placeholder="% Ganacia">
                                                        </div>
                                                    </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Precio de Venta &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="PrecioBrutoProd" name="PrecioBrutoProd" placeholder="Precio de Venta">
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
                                                        <div class="input-group-addon">Stock Inicial&nbsp;<i class="mdi mdi-database"></i></div>
                                                        <input type="number" class="form-control" id="stockInicial" name="stockInicial" placeholder="Stock Inicial del Producto">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Stock Mínimo&nbsp;<i class="mdi mdi-database-minus"></i></div>
                                                        <input type="number" class="form-control" id="stockMinimo" name="stockMinimo" placeholder="Stock Mínimo">
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div>

                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn btn-success"> <i class="fa fa-pencil"></i> Agregar Producto</button>
                                                        <button type="button" class="btn btn-inverse">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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