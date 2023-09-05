<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtml.php");
 $id = stripcslashes ($_GET['id']);

  require_once '../class/Funciones.php';
  
  

  $fun = new Funciones();    
?>
<!-- FIN Include del Head HTML -->

<body class="fix-header fix-sidebar card-no-border" style="font-size: 0.7em;">
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

        <!-- Contenido Principal -->
        <div >
            <div class="container-fluid">
          
                
                   <div class="row">
                    <div class="col-3">
                                  <button class="btn btn-warning" type="button" id="btn_imp"
                                                name="btn_imp" onclick='$("#btn_imp").hide(); window.print();'><i class="fa fa-print" aria-hidden="true"></i></button>
                      <img src="../assets/images/logo.png"  width="64" height="79">
                    </div>
                    <div class="col-6 text-center">
                          <h2>Felipe Vicencio Arias</h2>
                            Rut 15.555.084-8<br>
                            El Molino 49- San Esteban Fono: 552840892
                    </div>
                    <div class="col-3">
                      <?php
                          $re = $fun ->cargar_datos_cab_cot($id);

                         foreach($re as $row)
                            {

                            }

                        
                      ?>
                      Cotización N° <?php echo $id;?><br>
                      Fecha <?php echo date("d-m-Y", time());?><br>

                    </div>
                  </div>

                  
                    
                <hr>
                <div class="row">
                  <div class="col">
                    Nombre: <?php echo $row['nom_cli']?><br>
                    Mail: <?php echo $row['mail_cli']?><br>
                    Teléfono: <?php echo $row['fono_cli']?><br>
                    Kilometraje: <?php echo $row['km_cot']?><br>
                  </div>
                  <div class="col">
                    Vehiculo: <?php echo $row['nom_marca']?><br>
                    Modelo: <?php echo $row['modelo_veh_cli']?><br>
                    Año: <?php echo $row['anio_veh_cli']?><br>
                    Patente: <?php echo $row['patente_veh_cli']?>
                  </div>
                </div>
            
                <div class="row">
   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                     
                           
                                    <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                               
                                                    <h4 class="card-title">Resumen Cotización &nbsp;<i class="mdi  mdi-cart"></i></h4>
                                                    <div class="table-responsive m-t-2">
                                                        <table id="resumenCotImp" name="resumenCot" class="table-striped table-bordered table-responsive-sm" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Producto</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Unidad</th>
                                                                    <th>Precio Unitario</th>
                                                                    <th>Precio Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php
                                                                $re1 = $fun ->cargar_datos_det_cot($id,1);
                                                                $i=0;
                                                               foreach($re1 as $row1)
                                                                  {
                                                                    $i++;
                                                                  
                                                                ?>

                                                                <tr>
                                                                
                                                                  <td><?php echo $i ?></td>
                                                                  <td><small><?php echo $row1['nom_prod']?></small></td>
                                                                  <td><?php echo $row1['cant_dcot']?></td>
                                                                  <td><?php echo $row1['desc_item']?></td>
                                                                  

                                                                  <td><?php echo "<script>var string = numeral(". $row1['precio_uni_dcot'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                                                                  <td><?php echo "<script>var string = numeral(". $row1['precio_total_dcot'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                                                                  
                                                                 
                                                                

                                                  
                                                      </tr>

                                                              </tr>

                                                <?php } ?>  
                                                                
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    
                                                </div>

                                        </div>

                                        
                                    </div>
                                    <div class="col-12 mb-4 justify-content-end">

                                    


                                    <div class="col-sm-4 mt-0 justify-content-end text-right">
                                        <div class="input-group">
                                            <div class="input-group-addon">Total</i></div>
                                            <input type="text" class="form-control text-right" id="resTotal" name="resTotal" value="<?php echo $row['precio_total_cot']?>" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                  <div class="col-12">
                                    <h5 class="card-title">Observaciones <i class="fa fa-clipboard" aria-hidden="true"></i></h5>
                                    <textarea class="form-control" id="obs_ven" name="obs_ven" rows="4" maxlength="200"><?php echo $row['obs_cot']?></textarea>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col-12 text-center" >
                                    <img src="../assets/images/logo-shell.png" height="40px" width="40px"  class="rounded">
                                    <img src="../assets/images/logo-mann-filter.jpg" height="24px" width="48px"  class="rounded">
                                    <img src="../assets/images/logo-total.jpg" height="24px" width="48px">
                                    <img src="../assets/images/logo-mobil.png" height="14px" width="48px">
                                    <img src="../assets/images/logo-amalie.png" height="48px" width="48px">
                                    <img src="../assets/images/logo-pennzoil.png" height="26px" width="48px">
                                    <img src="../assets/images/logo-versachem.jpg" height="38px" width="48px">
                                    <img src="../assets/images/logo-ngk.png" height="48px" width="48px">
                                    <br>
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