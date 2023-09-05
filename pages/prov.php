<?php 
  include("../includesPages/validaSesion.php")
?>
<!-- Include del Head HTML INCLUYE LIBRERIAS EXTERNAS -->
<?php
 include("../includesPages/headHtmlProv.php");
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
                    <h3 class="text-themecolor">Proveedores</h3>

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
                          <a class="nav-link active" data-toggle="tab" href="#agregar_prov">Agregar</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#mod_prov">Modificar</a>
                        </li>
                      </ul>


                      <div class="tab-content">
                        <div id="agregar_prov" class="container tab-pane active"><br>
                            <form id="formAgregarProv" onsubmit="return false;"  >
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                                        
                                                            <label for="nom" class="col-form-label">Nombre Proveedor:</label>
                                                            <input type="text" class="form-control" id="nom_prov" name="nom_prov" autocomplete="off" required>
                                                        
                                  </div>
                                  <div class="form-group">
                                                        
                                                            <label for="fono" class="col-form-label">Fono Proveedor:</label>
                                                            <input type="text" class="form-control" id="fono_prov" name="fono_prov" autocomplete="off" required>
                                                        
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                                          
                                                              <label for="mail" class="col-form-label">Mail Proveedor:</label>
                                                              <input type="text" class="form-control" id="mail_prov" autocomplete="off" name="mail_prov">
                                                          
                                  </div>
                                  <div class="form-group">
                                                          
                                                              <label for="web" class="col-form-label">Sitio web Proveedor:</label>
                                                              <input type="text" class="form-control" id="web_prov" autocomplete="off" name="web_prov">
                                                          
                                  </div>
                                </div>
                                <div class="col-12">
                                  <label for="desc" class="col-form-label">Descripción Proveedor:</label>
                                  <textarea class="form-control" maxlength="200" name="desc_prov" id="desc_prov"></textarea>
                                </div>
                                <button type="submit"  class="btn btn-info" id="btn_agregar_prov" name="btn_agregar_prov" >Agregar Proveedor <i class="fa fa-user-plus" aria-hidden="true"></i></button>
                             </div>
                            </form>
                        </div>
                      
                        <div id="mod_prov" class="container tab-pane fade"><br>
                            <form id="formModProv" onsubmit="return false;" >
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                                            <label for="fono" class="col-form-label">Proveedor:</label>
                                                            <select class="form-control" name="prov" id="prov" required>
                                                                  <option value="" selected disabled>Seleccione el Proveedor</option>
                                                                </select>
                                                        
                                  </div>
                                  <div class="form-group">
                                                        
                                                            <label for="fono" class="col-form-label">Fono Proveedor:</label>
                                                            <input type="text" class="form-control" id="fono_prov_mod" name="fono_prov_mod" autocomplete="off" required>
                                                        
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                                          
                                                              <label for="mail" class="col-form-label">Mail Proveedor:</label>
                                                              <input type="text" class="form-control" id="mail_prov_mod" autocomplete="off" name="mail_prov_mod">
                                                          
                                  </div>
                                  <div class="form-group">
                                                          
                                                              <label for="web" class="col-form-label">Sitio web Proveedor:</label>
                                                              <input type="text" class="form-control" id="web_prov_mod" autocomplete="off" name="web_prov_mod">
                                                          
                                  </div>
                                </div>
                                <div class="col-12">
                                  <label for="desc" class="col-form-label">Descripción Proveedor:</label>
                                  <textarea class="form-control" maxlength="200" name="desc_prov_mod" id="desc_prov_mod"></textarea>
                                </div>
                                <button type="submit"  class="btn btn-info" id="btn_mod_prov" name="btn_mod_prov" >Modificar Proveedor <i class="fa fa-user-circle-o" aria-hidden="true"></i></button>
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