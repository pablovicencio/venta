//////////funcion btn agregar codigo de barra
$(document).on("click", "#btn_agregar_cod_barra", function (){  
  cod = $("#cod_barra_agregar").val();
  prod = $("#codigoBarra").val();
  $.ajax({
    type: "POST",
    url: '../controles/controlCrearCodProdBarra.php',
    data:{ "cod":cod, "prod":prod},
    success: function (result) { 
            var msg = result.trim();

            switch(msg) {
              case '-1':
                  swal("Error", "No se ha agregado el código de barra, comuniquese con el administrador", "warning");
                  break;
              default:
                swal("Código registrado correctamente", '', "success");
                $("#cod_barra_agregar").val("");
                $('#tabla_cod_barra tbody tr').remove();
                $.ajax({
                  type: "POST",
                  url: '../controles/controlCargarCodsBarraProd.php',
                  data:{"prod":prod},
                  dataType:'json',
                  success: function (result) { 

                    var filas = Object.keys(result).length;

                    for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

                          var nuevafila= "<tr><td>" +
                                                        result[i].cod_barra + "</td><td>" +
                                                        '<a  class="btn btn-danger" href="impVenta.php?id='+result[i].id_venta+'&imp=1" target="_blank"><i class="fa fa-close" aria-hidden="true"></i></a></td></tr>'

                          $("#tabla_cod_barra").append(nuevafila);

                    }
                  },
                        error: function(jqXHR, textStatus, errorThrown){
                                alert("ERROR: "+jqXHR.responseText);      
                        }
                });
                }          

    },
            error: function(jqXHR, textStatus, errorThrown){
                    alert("ERROR: "+jqXHR.responseText);      
            }
  });
});

//////////funcion registro ingreso
$(document).on("click", "#btn_reg_ing", function (){  


if (($("#resTotal").val()!= '')&&($("#resTotal").val() != 'NaN') && ($("#tipoDoc").val()!= '')&&($("#tipoDoc").val() != 'NaN') &&  ($("#nrodoc").val()!= '')&&($("#nrodoc").val() != 'NaN')) {


            var precio_total_venta = $("#resTotal").val();
            //var tipo_doc_venta = $("#tipoDoc").val();

            

            var tipo_doc = $("#tipoDoc").val();
            var nro_doc = $("#nrodoc").val();

        
            var TableData = new Array();



        
                                  $('#resumenIng tr').each(function(row, tr){
                                        TableData[row]={
                                          "prod" : $(tr).find('td:eq(0)').text()
                                            ,"cant" : $(tr).find('td:eq(4)').text()
                                            , "pre_total" : $(tr).find('td:eq(9)').text()
                                            , "prov" : $(tr).find('td:eq(10)').text()
                                        }
                                        

                                    }); 
                            

            TableData.shift();  // first row will be empty - so remove
            TableData = JSON.stringify(TableData);

            $('#tbConvertToJSON').val('JSON array: \n\n' + TableData.replace(/},/g, "},\n"));
            $.ajax({
                type: "POST",
                url: "../controles/controlRegIng.php",
                data:   { "data" : TableData, "tipo_doc":tipo_doc,"nro_doc":nro_doc, "precio_total_venta":precio_total_venta},
                cache: false,
                      success: function (result) { 
                        var msg = result.trim();

                  switch(msg) {
                        case '-1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Registro de Ingreso","Ingreso de productos registrado correctamente!", "success");


                      $('#cantidad').val("");
                      $("#codigoBarra").prop('readonly', false);
                      $("#btn_volver_buscar").hide();
                      $("#codigoBarra").focus(); 

                      $("#btn_mod_prod").show();
                      $("#btn_agr_prod").show();
                      $("#cantidad").prop('readonly', false);

                      $("#btn_guar_prod").hide();

                      $(".ro").prop('readonly', true);
                      $('#formModProd').trigger("reset");
                      $('#id_prod').val(""); 
                      $('#resumenIng tbody').empty();

                      $('#tipoDoc').val("");
                      $('#nrodoc').val("");

                      $('#resTotal').val("");
                      $('#resNeto').val("");
                      $('#resIva').val("");
                      

                      

                          }     
                      },
                      error: function(){
                              alert('Verifique los datos');      
                      }

            });
}else{
  swal("Datos Ingresados", "Revisa los datos ingresados (Tipo de Doc, Nro. Doc o Productos)", "error");
}
 
  });


//////////funcion eliminar producto
function del_prod(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("resumenIng").deleteRow(i);
    
    var sumNeto = 0;
    var sumIva = 0;
    var sumTotal = 0; 

                  $(".total").each(function() {
                      var total = $(this).text();
                      // add only if the value is number
                      if(!isNaN(total) && total.length != 0) {
                          sumTotal += parseInt(total);
                      }

                  });

                  $(".neto").each(function() {
                      var neto = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(neto) && neto.length != 0) {
                          sumNeto += parseInt(neto);
                      }
                  });

                  $(".iva").each(function() {
                      var iva = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(iva) && iva.length != 0) {
                          sumIva += parseInt(iva);
                      }
                  });

                  $('#resTotal').val(numeral(sumTotal).format('$000,000,000,000')); 
                  $('#resNeto').val(numeral(sumNeto).format('$000,000,000,000'));
                  $('#resIva').val(numeral(sumIva).format('$000,000,000,000')); 


}


//////////funcion agregar producto
$(document).on("click", "#btn_agr_prod", function () {

    if (($("#cantidad").val()!= '')&&($("#cantidad").val() != 'NaN') && ($("#codigoBarra").val()!= '')&&($("#codigoBarra").val() != 'NaN')) {

          var cod_prod = $("#codigoBarra").val();
          
          var cantidad = parseFloat($("#cantidad").val());
          var preCom = parseInt($("#PrecioTotalCompra").val());
          var preNetoCom = parseInt($("#PreComNetoDscto").val());
          var ivaCom = parseInt($("#IvaCompra").val());
          var prov = $("#prov").val();

          var sumNeto = 0;
          var sumIva = 0;
          var sumTotal = 0;




               $.ajax({
                  type: "POST",
                  url: '../controles/controlCargarProd.php',
                  data:{"prod":cod_prod},
                  dataType:'json',
                  success: function (result) { 
                    

                       var nuevafila= "<tr><td style='display:none'>" +
                                      result[0].id_prod + "</td><td>" +
                                      result[0].nom_prod + "</td><td>" +
                                      result[0].marca_prod + "</td><td>" +
                                      result[0].cod_barra_prod + "</td><td>" +
                                      cantidad + "</td><td>" +
                                      numeral(preCom).format('$000,000,000,000') + "</td><td>" +
                                      numeral(preCom * cantidad).format('$000,000,000,000') + "</td><td style='display:none' class='neto'>" +
                                      (preNetoCom * cantidad) + "</td><td style='display:none' class='iva'>" +
                                      (ivaCom * cantidad) + "</td><td style='display:none' class='total'>" +
                                      (parseInt(preNetoCom + ivaCom) * cantidad) + "</td><td style='display:none'>" +
                                      (prov) + "</td><td>" +
                                      '<button id="btn__prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

                              $("#resumenIng").append(nuevafila);

                  $(".total").each(function() {
                      var total = $(this).text();
                      // add only if the value is number
                      if(!isNaN(total) && total.length != 0) {
                          sumTotal += parseInt(total);
                      }

                  });

                  $(".neto").each(function() {
                      var neto = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(neto) && neto.length != 0) {
                          sumNeto += parseInt(neto);
                      }
                  });

                  $(".iva").each(function() {
                      var iva = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(iva) && iva.length != 0) {
                          sumIva += parseInt(iva);
                      }
                  });

                  $('#resTotal').val(numeral(sumTotal).format('$000,000,000,000')); 
                  $('#resNeto').val(numeral(sumNeto).format('$000,000,000,000'));
                  $('#resIva').val(numeral(sumIva).format('$000,000,000,000')); 

                  
                  $('#codigoBarra').val("");
                  $('#id_prod').val("");
                  $('#cantidad').val("");
                  $("#codigoBarra").prop('readonly', false);
                  $("#btn_volver_buscar").hide();
                  $("#codigoBarra").focus(); 

                  $("#btn_mod_prod").show();
                  $("#btn_agr_prod").show();
                  $("#cantidad").prop('readonly', false);

                  $("#btn_guar_prod").hide();

                  $(".ro").prop('readonly', true);
                  $('#formModProd').trigger("reset");  
                  
     

          },
                  error: function(jqXHR, textStatus, errorThrown){
                          alert("ERROR: "+jqXHR.responseText);      
                  }
          });
          
  }else{
    swal("Datos Ingresados", "Revisa los datos ingresados (Cantidad, Producto)", "error");
  }


});


 //////////funcion calculos cambio precio venta
  function calc2() {

      var preVen = parseInt($("#PrecioBrutoProd").val());
      var ivaVenta = parseInt(preVen * 0.19);
      $("#IvaProd").val(ivaVenta);

      var preNetoVen = parseInt(preVen - ivaVenta);
      $("#PrecioNetoProd").val(preNetoVen);
  }


  //////////funcion calculos precios
  function calc() {

    var comNeto = parseInt($("#PreComNeto").val());
    if (($("#PorcDsctoCom").val()!= '')&&($("#PorcDsctoCom").val() != 'NaN')) {
      var porcDsctoCom = parseInt($("#PorcDsctoCom").val());
      var valorDsctoCom = parseInt(comNeto * (porcDsctoCom / 100));
      
      $("#ValorDsctoCompra").val(valorDsctoCom);

    }else{
      var porcDsctoCom = 0;
      var valorDsctoCom = 0;
    }
    
    
    $("#PreComNetoDscto").val( parseInt(comNeto - valorDsctoCom));
    
    comNeto = parseInt($("#PreComNetoDscto").val());

    var ivaCompra = parseInt(comNeto * 0.19);
    $("#IvaCompra").val(ivaCompra);

    var PreTotalCom = parseInt(comNeto + ivaCompra)

    $("#PrecioTotalCompra").val(PreTotalCom);

    var porcGana = parseInt($("#PorcGanaProd").val());
    var valorGana = parseInt(PreTotalCom * (porcGana / 100));
    $("#ValorGanacia").val(valorGana);

    var preVen = parseInt(PreTotalCom + valorGana);

    var ivaVenta = parseInt(preVen * 0.19);
    $("#IvaProd").val(ivaVenta);

    var preNetoVen = parseInt(PreTotalCom + valorGana - ivaVenta);
    $("#PrecioNetoProd").val(preNetoVen);

    var preVenCalc = parseInt(preNetoVen + ivaVenta);
    $("#PrecioVentaCalc").val(preVenCalc);

    $("#PrecioBrutoProd").val(preVenCalc);


  }


//////////funcion modificar prod
$(document).ready(function() {
  $("#formModProd").submit(function() { 

        var btn = $(document.activeElement).attr('id');

        if (btn == 'btn_guar_prod') {
            
            
           $.ajax({
              type: "POST",
              url: '../controles/controlModProd.php',
              data:$("#formModProd").serialize(),
              success: function (result) { 
                          var msg = result.trim();

                      switch(msg) {
                        case '-1':
                            swal("Error", "No se ha modificado el producto, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Producto Modificado", msg, "success");
                                    $("#btn_mod_prod").show();
                                    $("#btn_agr_prod").show();
                                    $("#cantidad").prop('readonly', false);

                                    $("#btn_guar_prod").hide();

                                    $(".ro").prop('readonly', true);
                                    $("#codigoBarra").prop('readonly', true);
                          }          

              },
                      error: function(jqXHR, textStatus, errorThrown){
                              alert("ERROR: "+jqXHR.responseText);      
                      }
              });
              
        }else if(btn == 'btn_cre_prod'){

                var codigoBarra = $("#codigoBarra").val();

            $.ajax({
              type: "POST",
              url: '../controles/controlCrearProd.php',
              data:$("#formModProd").serialize()+ "&codigoBarra="+codigoBarra,
              success: function (result) { 
                          var msg = result.trim();

                      switch(msg) {
                        case '-1':
                            swal("Error", "No se ha creado el producto, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Producto Creado", msg, "success");
                                    

                                    $("#btn_cre_prod").hide();

                                    $("#btn_agr_prod").trigger("click");
                          }          

            },
                    error: function(jqXHR, textStatus, errorThrown){
                            alert("ERROR: "+jqXHR.responseText);      
                    }
            });


      }
   });
});


//////////funcion btn mod prod
$(document).on("click", "#btn_mod_prod", function (){  

if ( ($("#codigoBarra").val()!= '')&&($("#codigoBarra").val() != 'NaN')) {


        $("#btn_mod_prod").hide();
        $("#btn_agr_prod").hide();
        $("#cantidad").prop('readonly', true);

        $("#btn_guar_prod").show();

        $(".ro").prop('readonly', false);
        $("#codigoBarra").prop('readonly', true);
}else{
  swal("Datos Ingresados", "Selecciona un Producto", "warning");
}
           
            
 
  });


//volver buscar prod
$(document).on("click", "#btn_volver_buscar", function () {

    
    $('#cantidad').val("");
    $("#codigoBarra").prop('readonly', false);
    $("#btn_volver_buscar").hide();
    $("#btn_cre_prod").hide();
    $("#codigoBarra").focus(); 

    $("#btn_mod_prod").show();
    $("#btn_agr_prod").show();
    $("#cantidad").prop('readonly', false);

    $("#btn_guar_prod").hide();

    $(".ro").prop('readonly', true);
    $('#formModProd').trigger("reset");
    $('#id_prod').val("");
    $('#tabla_cod_barra tbody tr').remove();


});



//////////funcion busqueda predictiva por nombre
 $(document).ready(function(){
        $("#codigoBarra").keydown(function(e){

          $("#lista_prod").empty();
        if(e.which == 13) { 

            $('#formBusProd').submit();
            $("#lista_prod").empty();

        }else{  

                                      
              //obtenemos el texto introducido en el campo de búsqueda
              prod = $("#codigoBarra").val();
                
              lenprod = prod.length;
              

              if ((prod!= '')&&(prod != 'NaN')&& (lenprod < 10) && (lenprod > 2)) { 
                  //hace la búsqueda                                                                                  
                $.ajax({
                      async: false,
                      type: "POST",
                      url: "../controles/controlBuscarProd.php",
                      data:  { "prod" : prod},
                      dataType:'json',
                        success: function(result){


                        var filas = Object.keys(result).length;
                                
                             
                                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
                                  var nuevafila= '<a href="#" class="list-group-item list-group-item-action" onclick="$(\'#codigoBarra\').val('+result[i].id_prod+'); $(\'#formBusProd\').submit()">' +
                                  result[i].nom_prod + "</a>"
                             
                                  $("#lista_prod").append(nuevafila);

                                }
                                $("#lista_prod").show();
                                                              
                        },
                        error: function(){
                        alert("error petición ajax");
                        }
                      
                });  
              }
            }                                                                        
        }); 

}); 


//////////funcion buscar producto
$(document).ready(function() {
  $("#formBusProd").submit(function() { 

          
          var cod_prod = $("#codigoBarra").val();
          $("#lista_prod").hide();


           $.ajax({
              type: "POST",
              url: '../controles/controlCargarProdIng.php',
              data:{"prod":cod_prod},
              dataType:'json',
              success: function (result) {
              if (result != '') {
                $("#prov").val(result[0].id_prov_prod);
            $('#id_prod').val(result[0].id_prod);
            $('#nombreProd').val(result[0].nom_prod);
            $('#uniMed').val(result[0].uni_med_pro);
            $("#embalaje").val(result[0].embalaje_prod);
            $("#familia").val(result[0].familia_prod);
            $("#marca").val(result[0].marca_prod);
            $("#PreComNeto").val(result[0].precio_compra_neto);
            $("#PorcDsctoCom").val(result[0].porc_dscto_compra);
            $("#ValorDsctoCompra").val(result[0].valor_dcto_compra);
            $("#PreComNetoDscto").val(result[0].precio_compra_neto_dscto);
            $("#PrecioTotalCompra").val(result[0].precio_total_compra);
            $("#IvaCompra").val(result[0].iva_compra);
            $("#PorcGanaProd").val(result[0].proc_ganan_prod);
            $("#ValorGanacia").val(result[0].valor_ganancia);
            $("#PrecioNetoProd").val(result[0].precio_neto_prod);
            $("#IvaProd").val(result[0].iva_prod);
            $("#PrecioVentaCalc").val(result[0].precio_venta_calc);
            $("#PrecioBrutoProd").val(result[0].precio_bruto_prod);
            $("#stockInicial").val(result[0].stock_prod);
            $("#stockMinimo").val(result[0].stock_min_prod);

                            $.ajax({
                              type: "POST",
                              url: '../controles/controlCargarCodsBarraProd.php',
                              data:{"prod":cod_prod},
                              dataType:'json',
                              success: function (result) { 
                                $('#tabla_cod_barra tbody tr').remove();

                                var filas = Object.keys(result).length;

                                for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

                                      var nuevafila= "<tr><td>" +
                                                                    result[i].cod_barra + "</td><td>" +
                                                                    '<a  class="btn btn-danger" href="impVenta.php?id='+result[i].id_venta+'&imp=1" target="_blank"><i class="fa fa-close" aria-hidden="true"></i></a></td></tr>'

                                      $("#tabla_cod_barra").append(nuevafila);

                                }
                              },
                                    error: function(jqXHR, textStatus, errorThrown){
                                            alert("ERROR: "+jqXHR.responseText);      
                                    }
                            });

            
            $("#btn_volver_buscar").show();
            $("#codigoBarra").prop('readonly', true);
            $("#nombreProd").prop('readonly', false);
            //$("#cantidad").focus(); 
              }else{
                swal("Producto no encontrado", "Debe crear el Producto", "warning"); 
                $("#btn_mod_prod").hide();
                $("#btn_agr_prod").hide();
                $("#btn_guar_prod").hide();
                //$("#cantidad").prop('readonly', true);

                $("#btn_cre_prod").show();

                $(".ro").prop('readonly', false);
                $("#codigoBarra").prop('readonly', true);
                $("#nombreProd").prop('readonly', false);

              }

                       

      },
              error: function(jqXHR, textStatus, errorThrown){
                      alert("ERROR: "+jqXHR.responseText);      
              }
      });


   });
});


 //Carga de lista despegable Proveedores
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarProv.php',
      data:  { "vig" : 1},
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].nom_prov,
              value: result[i].id_prov,
          });
          $('#prov').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });


 //Carga de lista despegable Familia productos
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarFamProd.php',
      data:  { "vig" : 1},
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].desc_item,
              value: result[i].cod_item,
          });
          $('#familia').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });



 //Carga de lista despegable Unidad Medida
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarUniMed.php',
      data:  { "vig" : 1},
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].desc_item,
              value: result[i].cod_item,
          });
          $('#uniMed').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });


 //Carga de lista despegable tipo doc
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarTipoDoc.php',
      data:  { "vig" : 1},
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].desc_item,
              value: result[i].cod_item,
          });
          $('#tipoDoc').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });