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
                                                            <div class="input-group-addon">Vigencia &nbsp;<i class="mdi mdi-clipboard-check"></i></div>
                                                            <input type="text" class="form-control" id="vigencia" name="vigencia" placeholder="Vigencia del Producto">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Fecha de Ingreso &nbsp;<i class="mdi mdi-calendar"></i></div>
                                                            <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de Ingreso de Producto">
                                                        </div>
                                                    </div>
                                            </div>
                                          
                                        </div>
                                  

                                    </div>
                                    <div class="form-body">
                                        <h3 class="box-title">Información de Embalaje y Precio</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Neto &nbsp;<i class="mdi mdi-numeric-1-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="neto" name="neto" placeholder="Precio Neto">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">IVA &nbsp;<i class="mdi mdi-numeric-2-box-outline"></i></div>
                                                            <input type="number" class="form-control" id="iva" name="iva" placeholder="Valor IVA">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Bruto &nbsp;<i class="mdi mdi-numeric-3-box-multiple-outline"></i></div>
                                                            <input type="number" class="form-control" id="bruto" name="bruto" placeholder="Precio Bruto">
                                                        </div>
                                                    </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Unidad de Medida &nbsp;<i class="mdi mdi-weight-kilogram"></i></div>
                                                            <input type="text" class="form-control" id="unidadMedida" name="unidadMedida" placeholder="Unidad de Medida">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Embalaje&nbsp;<i class="mdi mdi-package"></i></div>
                                                            <input type="text" class="form-control" id="embalaje" name="embalaje" placeholder="Embalaje">
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
                                                        <button type="button" class="btn btn-inverse">Cancel</button>
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

        
            <footer class="footer text-right"> © 2020 DashBoard By Andescode.cl</footer>
            
        </div>
    </div>



    <!-- All Jquery -->
    <?php
            include("../includesPages/recursoInferior.php");
    ?>
</body>

</html>