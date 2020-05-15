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
            <p class="loader__label">Lubricenstro</p>
        </div>
    </div>

    <div id="main-wrapper">

        <?php
            //../includesPages de Header y LeftSidebar
            include("../includesPages/header.php");
            include("../includesPages/leftSideBar.php");
        ?>
        <!-- Contenido Principal -->
        <div class="page-wrapper">
            <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Nueva Venta</h3>

                </div>
            </div>
                <div class="row">
   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Producto</h4>
                                <form class="form-horizontal p-t-20">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-barcode-scan"></i></div>
                                                <input type="text" class="form-control" name="codigoBarra" id="codigoBarra" placeholder="Escanéa el Código o Agrega el ID Fijo">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <h5 class="card-title">Disponibilidad</h5>
                                    <div class="form-group row">
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="mdi mdi-numeric"></i></div>
                                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-1">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="stockActual" name="stockActual" placeholder="Stock ">
                                                <div class="input-group-addon"><i class="mdi mdi-database"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-1">
                                            <button type="" class="btn btn-inverse"> <i class="fa fa-pencil"></i> Agregar</button>
                                        </div>
                                       

                                    </div>
                                    <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                               
                                                    <h4 class="card-title">Resumen Compra &nbsp;<i class="mdi  mdi-cart"></i></h4>
                                                    <div class="table-responsive m-t-2">
                                                        <table id="resumenVenta" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Producto</th>
                                                                    <th>Marca</th>
                                                                    <th>Código</th>
                                                                    <th>Detalle</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Valor Unitario</th>
                                                                    <th>Total</th>
                                                                    <th>Editar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Aceite de motor</td>
                                                                    <td>Hyundai Xteer</td>
                                                                    <td>3481646</td>
                                                                    <td>Aceite de motor 20w50 2l</td>
                                                                    <td>2</td>
                                                                    <td>$15.200</td>
                                                                    <td>$30.400</td>
                                                                    <td>
                                                                    <button type="submit" class="btn btn-warning"> <i class="mdi mdi-table-edit"></i> Editar Campo</button>  
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Aceite de motor</td>
                                                                    <td>Hyundai Xteer</td>
                                                                    <td>3481646</td>
                                                                    <td>Aceite de motor 20w50 3l</td>
                                                                    <td>2</td>
                                                                    <td>$15.200</td>
                                                                    <td>$30.400</td>
                                                                    <td>
                                                                    <button type="submit" class="btn btn-warning"> <i class="mdi mdi-table-edit"></i> Editar Campo</button>  
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Aceite de motor</td>
                                                                    <td>Hyundai Xteer</td>
                                                                    <td>3481646</td>
                                                                    <td>Aceite de motor 20w50 4l</td>
                                                                    <td>2</td>
                                                                    <td>$15.200</td>
                                                                    <td>$30.400</td>
                                                                    <td>
                                                                    <button type="submit" class="btn btn-warning"> <i class="mdi mdi-table-edit"></i> Editar Campo</button>  
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    
                                                </div>

                                        </div>

                                        
                                    </div>
                                    <div class="col-12 mb-4 justify-content-end">
                                    
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Neto</i></div>
                                            <input type="text" class="form-control text-right" id="exampleInputEmail3" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">IVA</i></div>
                                            <input type="text" class="form-control text-right" id="exampleInputEmail3" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Total</i></div>
                                            <input type="text" class="form-control text-right" id="exampleInputEmail3" placeholder="">
                                        </div>
                                    </div>

               
                                </div>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ingresar Venta</button>
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