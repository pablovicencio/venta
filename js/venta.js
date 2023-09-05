//////////Desasociar cotizacion
 $(document).ready(function(){
        $("#id_cot").keyup(function(e){
            var str = $("#id_cot").val();

            if(e.which == 13) {
              $("#btn_buscar_cot").trigger("click");
            }



            if (str.length == 0) {
                              $("#patente_cli").prop('readonly', false);
                              $("#btn_buscar_cli").show();
                              $("#btn_volver_buscar_cli").hide();
                              $("#dat_bus_cli").hide();
                              $("#btn_mod_cli").hide();
                              $("#btn_cre_cli").hide();
        
                              $('#tabla_mov tbody').empty();
                              $('#formBusCli').trigger("reset");
        
                              $('#stockActual').val("");
                              $('#cantidad').val("");
                              $('#codigoBarra').val("");
                              $("#codigoBarra").prop('readonly', false);
                              $("#btn_volver_buscar").hide();
                              $('#obs_ven').val("");  
                              $('#resumenVenta tbody').empty();
                              $('#resNeto').val("");
                              $('#resIva').val("");
                              $('#resTotal').val("");
                              $("#dscto").val("");


                              $('#fec_cot').text("");

                          

                              $("#fec_cot_div").hide();
            }
                                                                        
        }); 

});       


//////////funcion buscar cot
$(document).on("click", "#btn_buscar_cot", function () {

    if (($("#id_cot").val()!= '')&&($("#id_cot").val() != 'NaN')) {

          var cot = $("#id_cot").val();



          $("#patente_cli").prop('readonly', false);
          $("#btn_buscar_cli").show();
          $("#btn_volver_buscar_cli").hide();
          $("#dat_bus_cli").hide();
          $("#btn_mod_cli").hide();
          $("#btn_cre_cli").hide();
        
          $('#tabla_mov tbody').empty();
          $('#formBusCli').trigger("reset");
        
          
          $('#obs_ven').val("");
                              
          $('#resumenVenta tbody').empty();
          $('#resNeto').val("");
          $('#resIva').val("");
          $('#resTotal').val("");
          $("#dscto").val("");



          var sumNeto = 0;
          var sumIva = 0;
          var sumTotal = 0;




                $.ajax({
                      type: "POST",
                      url: "../controles/controlCargarCabCot.php",
                      data:  {"cot":cot},
                      dataType:'json',
                        success: function(result){

                          if (result != '') {
                          $('#dscto').val(result[0].dscto_cot);
                          $('#obs_ven').val(result[0].obs_cot);
                          $('#fec_cot').text(result[0].fec_cot);

                          

                          $("#fec_cot_div").show();


                                      if (result[0].patente_veh_cli != 0) {


                                        $("#patente_cli").val(result[0].patente_veh_cli);

                                        $("#btn_buscar_cli").trigger("click");

                                        
                                      }



                              $.ajax({
                                      type: "POST",
                                      url: '../controles/controlCargarDetCot.php',
                                      data:{"cot":cot},
                                      dataType:'json',
                                      success: function (result) { 


                                          var filas = Object.keys(result).length;


                                          for (  i = 0 ; i < filas; i++){


                                          var precio = parseInt(result[i].precio_uni_dcot);
                                          var iva = parseInt(precio * 0.19);
                                          var neto = parseInt(precio - iva);

                                          var cantidad = parseFloat(result[i].cant_dcot);

                                        

                                           var nuevafila= "<tr><td style='display:none'>" +
                                                          result[i].id_prod_det_cot + "</td><td>" +
                                                          result[i].nom_prod + "</td><td>" +
                                                          result[i].marca_prod + "</td><td>" +
                                                          result[i].cod_barra_prod + "</td><td>" +
                                                          cantidad + "</td><td>" +
                                                          numeral(precio).format('$000,000,000,000') + "</td><td>" +
                                                          numeral(precio * cantidad).format('$000,000,000,000') + "</td><td style='display:none' class='neto'>" +
                                                          (neto * cantidad) + "</td><td style='display:none' class='iva'>" +
                                                          (iva * cantidad) + "</td><td style='display:none' class='total'>" +
                                                          (precio * cantidad) + "</td><td style='display:none'>" +
                                                          (result[i].id_prov_prod) + "</td><td>" +
                                                          '<button id="btn_prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

                                                          $("#resumenVenta").append(nuevafila);

                                          }
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

                                      $('#stockActual').val("");
                                      $('#cantidad').val("");
                                      $('#codigoBarra').val("");
                                      $("#codigoBarra").prop('readonly', false);
                                      $("#btn_volver_buscar").hide();
                                      $('#nom_prod').text(""); 
                                      $("#codigoBarra").focus();   
                                      var e = jQuery.Event("keypress");
                                      e.which = 13; // # Some key code value
                                      $("#dscto").trigger(e);



                                      
                         

                              },
                                      error: function(jqXHR, textStatus, errorThrown){
                                              alert("ERROR: "+jqXHR.responseText);      
                                      }
                              });
      
                        }else{
                          swal("Cotización no encontrada", "Verifique el numero de la cotización", "error"); 
                        }
                                  
                        },
                          error: function(){
                            alert("error petición ajax");
                        }
                                
              }); 





          
  }else{
    swal("Error Cantidad", "Ingrese un valor valido", "error"); 
  }


});



//////////funcion ingresar cotizacion
$(document).on("click", "#btn_ing_cot", function (){ 



if (($("#resTotalCot").val()!= '')&&($("#resTotalCot").val() != 'NaN')) {
  


        if (($("#patente_cli").val()== '')||($("#patente_cli").val() == 'NaN')) {
          swal({
              title: "Cliente",
              text: "La cotización no tiene un cliente asociado. Esta seguro de registrarla sin cliente?",
              icon: "warning",
              buttons: ["Cancelar", "Registrar sin cliente"],
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                    var precio_total_cot = $("#resTotalCot").val();
                    //var tipo_doc_venta = $("#tipoDoc").val();
        
                    var dscto_cot = $("#dscto_cot").val();
        
                    var obs_cot = $("#obs_cot").val();
                    var patente_cli = $("#patente_cli").val();
                    var km_cot = $("#km_veh_cli").val();
                
                    var TableData = new Array();
        
        
        
                
                                          $('#resumenCot tr').each(function(row, tr){
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
                        url: "../controles/controlIngCot.php",
                        data:   { "data" : TableData, "obs_cot":obs_cot,"patente_cli":patente_cli,"km_cot":km_cot, "precio_total_cot":precio_total_cot, "dscto_cot":dscto_cot},
                        cache: false,
                              success: function (result) { 
                                var msg = result.trim();
        
                          switch(msg) {
                                case '-1':
                                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                                    break;
                                default:
                                    swal("Registro de Cotización","Cotización registrada correctamente!", "success");
                                    $("#patente_cli").prop('readonly', false);
                              $("#btn_buscar_cli").show();
                              $("#btn_volver_buscar_cli").hide();
                              $("#dat_bus_cli").hide();
                              $("#btn_mod_cli").hide();
                              $("#btn_cre_cli").hide();
        
                              $('#tabla_mov tbody').empty();
                              $('#formBusCli').trigger("reset");
        
                              $('#stockActualCot').val("");
                              $('#cantidad_cot').val("");
                              $('#codigoBarraCot').val("");
                              $("#codigoBarraCot").prop('readonly', false);
                              $("#btn_volver_buscar_cot").hide();
                              $('#obs_cot').val("");
                              $("#codigoBarraCot").focus();  
                              $('#resumenCot tbody').empty();
                              $('#resNetoCot').val("");
                              $('#resIvaCot').val("");
                              $('#resTotalCot').val("");
                              $("#dscto_cot").val("");
                              window.open('impCot.php?id='+msg, '_blank'); 
                              
        
                              
        
                                  }     
                              },
                              error: function(){
                                      alert('Verifique los datos');      
                              }
        
                    });
              } 
            });
        }else{
                  var precio_total_cot = $("#resTotalCot").val();
                    //var tipo_doc_venta = $("#tipoDoc").val();
        
                    var dscto_cot = $("#dscto_cot").val();
        
                    var obs_cot = $("#obs_cot").val();
                    var patente_cli = $("#patente_cli").val();
                    var km_cot = $("#km_veh_cli").val();
          
        
                
                    var TableData = new Array();
        
        
        
                
                                          $('#resumenCot tr').each(function(row, tr){
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
                        url: "../controles/controlIngCot.php",
                        data:   { "data" : TableData, "obs_cot":obs_cot,"patente_cli":patente_cli,"km_cot":km_cot, "precio_total_cot":precio_total_cot, "dscto_cot":dscto_cot},
                        cache: false,
                              success: function (result) { 
                                var msg = result.trim();
        
                          switch(msg) {
                                case '-1':
                                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                                    break;
                                default:
                                    swal("Registro de Cotización","Cotización registrada correctamente!", "success");
                                    $("#patente_cli").prop('readonly', false);
                              $("#btn_buscar_cli").show();
                              $("#btn_volver_buscar_cli").hide();
                              $("#dat_bus_cli").hide();
                              $("#btn_mod_cli").hide();
                              $("#btn_cre_cli").hide();
        
                              $('#tabla_mov tbody').empty();
                              $('#formBusCli').trigger("reset");
        
                              $('#stockActualCot').val("");
                              $('#cantidad_cot').val("");
                              $('#codigoBarraCot').val("");
                              $("#codigoBarraCot").prop('readonly', false);
                              $("#btn_volver_buscar_cot").hide();
                              $('#obs_cot').val("");
                              $("#codigoBarraCot").focus();  
                              $('#resumenCot tbody').empty();
                              $('#resNetoCot').val("");
                              $('#resIvaCot').val("");
                              $('#resTotalCot').val("");
                              $("#dscto_cot").val("");
                              window.open('impCot.php?id='+msg, '_blank'); 
                              
        
                              
        
                                  }     
                              },
                              error: function(){
                                      alert('Verifique los datos');      
                              }
        
                    });
        }

}else{
  swal("Ingresa los datos", "Revisa los datos ingresados", "error");
}
            
 
  });



//////////funcion calculo descuento cot
 $(document).ready(function(){
        $("#dscto_cot").keypress(function(e){

          if(e.which == 13) {

            dscto = $("#dscto_cot").val();

            var sumTotal = 0;


            $(".totalCot").each(function() {
          var total = $(this).text();
          // add only if the value is number
          if(!isNaN(total) && total.length != 0) {
            sumTotal += parseInt(total);
          }

        });

            if ( (dscto!= '')&&(dscto != 'NaN')&&(parseInt(dscto) != 0)) {
                
              dscto = parseInt(dscto);

                  if ((sumTotal!= '')&&(sumTotal != 'NaN')) {
                    
                    resTotal = parseInt(sumTotal - dscto);
                    $("#resTotalCot").val(numeral(resTotal).format('$000,000,000,000'));

                    resIva = parseInt(resTotal * 0.19);
                    $("#resIvaCot").val(numeral(resIva).format('$000,000,000,000'));

                    resNeto = parseInt(resTotal - resIva);
                    $("#resNetoCot").val(numeral(resNeto).format('$000,000,000,000'));
                    
                      
                  } 
            }else if((parseInt(dscto) == 0)||(dscto == '')){

                      var sumNeto = 0;
                  var sumIva = 0;
                  var sumTotal = 0;


                              $(".totalCot").each(function() {
                      var total = $(this).text();
                      // add only if the value is number
                      if(!isNaN(total) && total.length != 0) {
                          sumTotal += parseInt(total);
                      }

                  });

                  $(".netoCot").each(function() {
                      var neto = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(neto) && neto.length != 0) {
                          sumNeto += parseInt(neto);
                      }
                  });

                  $(".ivaCot").each(function() {
                      var iva = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(iva) && iva.length != 0) {
                          sumIva += parseInt(iva);
                      }
                  });

                  $('#resTotalCot').val(numeral(sumTotal).format('$000,000,000,000')); 
                  $('#resNetoCot').val(numeral(sumNeto).format('$000,000,000,000'));
                  $('#resIvaCot').val(numeral(sumIva).format('$000,000,000,000')); 
            }
        }                                                                      
        }); 

});       




//////////funcion busqueda predictiva por nombre cot
 $(document).ready(function(){
        $("#codigoBarraCot").keydown(function(e){

            $("#lista_prod_cot").empty();
            if(e.which == 13) {

            $('#formBusProdCot').submit();
            $("#lista_prod_cot").empty();

        }else{     

                                      
              //obtenemos el texto introducido en el campo de búsqueda
              prod = $("#codigoBarraCot").val();
              
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
                                  var nuevafila= '<a href="#" class="list-group-item list-group-item-action" onclick="$(\'#codigoBarraCot\').val('+result[i].id_prod+'); $(\'#formBusProdCot\').submit()">' +
                                  result[i].nom_prod + "</a>"
                             
                                  $("#lista_prod_cot").append(nuevafila);

                                }
                                $("#lista_prod_cot").show();
                                                              
                        },
                        error: function(){
                        alert("error petición ajax");
                        }
                      
                });  
              }
            }                                                                         
        }); 

});  


//////////funcion eliminar producto cot
function del_prod_cot(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("resumenCot").deleteRow(i);
    
    var sumNeto = 0;
    var sumIva = 0;
    var sumTotal = 0; 

                              $(".totalCot").each(function() {
                      var total = $(this).text();
                      // add only if the value is number
                      if(!isNaN(total) && total.length != 0) {
                          sumTotal += parseInt(total);
                      }

                  });

                  $(".netoCot").each(function() {
                      var neto = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(neto) && neto.length != 0) {
                          sumNeto += parseInt(neto);
                      }
                  });

                  $(".ivaCot").each(function() {
                      var iva = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(iva) && iva.length != 0) {
                          sumIva += parseInt(iva);
                      }
                  });

                  $('#resTotalCot').val(numeral(sumTotal).format('$000,000,000,000')); 
                  $('#resNetoCot').val(numeral(sumNeto).format('$000,000,000,000'));
                  $('#resIvaCot').val(numeral(sumIva).format('$000,000,000,000')); 


                  var e = jQuery.Event("keypress");
                  e.which = 13; // # Some key code value
                  $("#dscto_cot").trigger(e);


}



//////////funcion agregar producto cot
$(document).on("click", "#btn_agr_prod_cot", function () {

    if (($("#cantidad_cot").val()!= '')&&($("#cantidad_cot").val() != 'NaN')) {

          var cod_prod = $("#codigoBarraCot").val();
          var stockActual = parseFloat($("#stockActualCot").val());
          var precio = parseInt($("#precioCot").val());
          var iva = parseInt(precio * 0.19);
          var neto = parseInt(precio - iva);

          var cantidad = parseFloat($("#cantidad_cot").val());

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
                                      numeral(precio).format('$000,000,000,000') + "</td><td>" +
                                      numeral(precio * cantidad).format('$000,000,000,000') + "</td><td style='display:none' class='netoCot'>" +
                                      (neto * cantidad) + "</td><td style='display:none' class='ivaCot'>" +
                                      (iva * cantidad) + "</td><td style='display:none' class='totalCot'>" +
                                      (precio * cantidad) + "</td><td style='display:none'>" +
                                      (result[0].id_prov_prod) + "</td><td>" +
                                      '<button id="btn_prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod_cot(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

                              $("#resumenCot").append(nuevafila);

                              $(".totalCot").each(function() {
                      var total = $(this).text();
                      // add only if the value is number
                      if(!isNaN(total) && total.length != 0) {
                          sumTotal += parseInt(total);
                      }

                  });

                  $(".netoCot").each(function() {
                      var neto = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(neto) && neto.length != 0) {
                          sumNeto += parseInt(neto);
                      }
                  });

                  $(".ivaCot").each(function() {
                      var iva = $(this).text(); 
                      // add only if the value is number
                      if(!isNaN(iva) && iva.length != 0) {
                          sumIva += parseInt(iva);
                      }
                  });

                  $('#resTotalCot').val(numeral(sumTotal).format('$000,000,000,000')); 
                  $('#resNetoCot').val(numeral(sumNeto).format('$000,000,000,000'));
                  $('#resIvaCot').val(numeral(sumIva).format('$000,000,000,000')); 

                  $('#stockActualCot').val("");
                  $('#cantidad_cot').val("");
                  $('#codigoBarraCot').val("");
                  $("#codigoBarraCot").prop('readonly', false);
                  $("#btn_volver_buscar_cot").hide();
                  $('#nom_prod_cot').text(""); 
                  $("#codigoBarraCot").focus();   
                  var e = jQuery.Event("keypress");
                  e.which = 13; // # Some key code value
                  $("#dscto_cot").trigger(e);
     

          },
                  error: function(jqXHR, textStatus, errorThrown){
                          alert("ERROR: "+jqXHR.responseText);      
                  }
          });
          
  }else{
    swal("Error Cantidad", "Ingrese un valor valido", "error"); 
  }


});



//volver buscar prod cot
$(document).on("click", "#btn_volver_buscar_cot", function () {

    $('#stockActualCot').val("");
    $('#cantidad_cot').val("");
    $('#codigoBarraCot').val("");
    $("#codigoBarraCot").prop('readonly', false);
    $("#btn_volver_buscar_cot").hide();
    $("#codigoBarraCot").focus(); 
    $('#nom_prod_cot').text(""); 
    $('#precioCot').val("");

});


//////////funcion buscar producto cot
$(document).ready(function() {
  $("#formBusProdCot").submit(function() { 

          
          var cod_prod = $("#codigoBarraCot").val();
          $("#lista_prod_cot").hide();


           $.ajax({
              type: "POST",
              url: '../controles/controlCargarProd.php',
              data:{"prod":cod_prod},
              dataType:'json',
              success: function (result) {
              if (result != '') {
                $('#stockActualCot').val(result[0].stock_prod);
                $('#precioCot').val(result[0].precio);
                $('#nom_prod_cot').text(result[0].nom_prod);
            $("#codigoBarraCot").prop('readonly', true);
            $("#btn_volver_buscar_cot").show();
            $("#cantidad_cot").focus(); 
              }else{
                swal("Producto no encontrado", "Verifique el codigo del producto", "error"); 
              }

                       

      },
              error: function(jqXHR, textStatus, errorThrown){
                      alert("ERROR: "+jqXHR.responseText);      
              }
      });


   });
});




 //////////funcion calculo descuento
 $(document).ready(function(){
        $("#dscto").keypress(function(e){

	        if(e.which == 13) {

	        	dscto = $("#dscto").val();

	        	var sumTotal = 0;


	        	$(".total").each(function() {
					var total = $(this).text();
					// add only if the value is number
					if(!isNaN(total) && total.length != 0) {
						sumTotal += parseInt(total);
					}

				});

		        if ( (dscto!= '')&&(dscto != 'NaN')&&(parseInt(dscto) != 0)) {
		        	  
		        	dscto = parseInt(dscto);

		              if ((sumTotal!= '')&&(sumTotal != 'NaN')) {
		              	
		              	resTotal = parseInt(sumTotal - dscto);
		              	$("#resTotal").val(numeral(resTotal).format('$000,000,000,000'));

		              	resIva = parseInt(resTotal * 0.19);
		              	$("#resIva").val(numeral(resIva).format('$000,000,000,000'));

		              	resNeto = parseInt(resTotal - resIva);
		              	$("#resNeto").val(numeral(resNeto).format('$000,000,000,000'));
		              	
		              	  
		              } 
		        }else if((parseInt(dscto) == 0)||(dscto == '')){

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
		    }                                                                      
        }); 

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







//////////funcion ingresar venta
$(document).on("click", "#btn_ing_venta", function (){ 

var imp = $("input[name='optradioImp']:checked").val();

var cta = 0;

if ($('#datCta').is(":checked"))
{
  var cta = 1;
}

if (($("#resTotal").val()!= '')&&($("#resTotal").val() != 'NaN')) {
  


        if (($("#patente_cli").val()== '')||($("#patente_cli").val() == 'NaN')) {
        	swal({
        		  title: "Cliente",
        		  text: "La venta no tiene un cliente asociado. Esta seguro de registrarla sin cliente?",
        		  icon: "warning",
        		  buttons: ["Cancelar", "Registrar sin cliente"],
        		  dangerMode: true,
        		})
        		.then((willDelete) => {
        		  if (willDelete) {
                    var precio_total_venta = $("#resTotal").val();
                    //var tipo_doc_venta = $("#tipoDoc").val();
        
                    var dscto = $("#dscto").val();
        
                    var obs_venta = $("#obs_ven").val();
                    var patente_cli = $("#patente_cli").val();
                    var km_venta = $("#km_veh_cli").val();
                    var km_prox_venta = $("#km_prox_cli").val();
                    var cond_pago = $("#cond_pago").val();
                
                    var TableData = new Array();
        
        
        
                
                                          $('#resumenVenta tr').each(function(row, tr){
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
                        url: "../controles/controlIngVenta.php",
                        data:   { "data" : TableData, "obs_venta":obs_venta,"patente_cli":patente_cli,"km_venta":km_venta, "precio_total_venta":precio_total_venta, "dscto":dscto, "km_prox":km_prox_venta , "cond_pago":cond_pago},
                        cache: false,
                              success: function (result) { 
                                var msg = result.trim();
        
        									switch(msg) {
        							          case '-1':
        							              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
        							              break;
        							          default:
        							              swal("Registro de Venta","Venta registrada correctamente!", "success");
        							              $("#patente_cli").prop('readonly', false);
        										  $("#btn_buscar_cli").show();
        										  $("#btn_volver_buscar_cli").hide();
        										  $("#dat_bus_cli").hide();
        										  $("#btn_mod_cli").hide();
        										  $("#btn_cre_cli").hide();
        
        										  $('#tabla_mov tbody').empty();
        										  $('#formBusCli').trigger("reset");
        
        										  $('#stockActual').val("");
        										  $('#cantidad').val("");
        										  $('#codigoBarra').val("");
        										  $("#codigoBarra").prop('readonly', false);
        										  $("#btn_volver_buscar").hide();
        										  $('#obs_ven').val("");
        										  $("#codigoBarra").focus();  
        										  $('#resumenVenta tbody').empty();
        										  $('#resNeto').val("");
        										  $('#resIva').val("");
        										  $('#resTotal').val("");
        										  $("#dscto").val("");


                              $('#fec_cot').text("");

                          

                              $("#fec_cot_div").hide();
        										  window.open('impVenta.php?id='+msg+'&imp='+imp+'&cta='+cta, '_blank'); 
        										  
        
        										  
        
        							            }     
                              },
                              error: function(){
                                      alert('Verifique los datos');      
                              }
        
                    });
        		  } 
        		});
        }else{
        	        var precio_total_venta = $("#resTotal").val();
                    //var tipo_doc_venta = $("#tipoDoc").val();
        
                    var dscto = $("#dscto").val();
        
                    var obs_venta = $("#obs_ven").val();
                    var patente_cli = $("#patente_cli").val();
                    var km_venta = $("#km_veh_cli").val();
                    var km_prox_venta = $("#km_prox_cli").val();
                    var cond_pago = $("#cond_pago").val();
        
                
                    var TableData = new Array();
        
        
        
                
                                          $('#resumenVenta tr').each(function(row, tr){
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
                        url: "../controles/controlIngVenta.php",
                        data:   { "data" : TableData, "obs_venta":obs_venta,"patente_cli":patente_cli,"km_venta":km_venta, "precio_total_venta":precio_total_venta, "dscto":dscto,"km_prox":km_prox_venta, "cond_pago":cond_pago},
                        cache: false,
                              success: function (result) { 
                                var msg = result.trim();
        
        									switch(msg) {
        							          case '-1':
        							              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
        							              break;
        							          default:
        							              swal("Registro de Venta","Venta registrada correctamente!", "success");
        							              $("#patente_cli").prop('readonly', false);
        										  $("#btn_buscar_cli").show();
        										  $("#btn_volver_buscar_cli").hide();
        										  $("#dat_bus_cli").hide();
        										  $("#btn_mod_cli").hide();
        										  $("#btn_cre_cli").hide();
        
        										  $('#tabla_mov tbody').empty();
        										  $('#formBusCli').trigger("reset");
        
        										  $('#stockActual').val("");
        										  $('#cantidad').val("");
        										  $('#codigoBarra').val("");
        										  $("#codigoBarra").prop('readonly', false);
        										  $("#btn_volver_buscar").hide();
        										  $('#obs_ven').val("");
        										  $("#codigoBarra").focus();  
        										  $('#resumenVenta tbody').empty();
        										  $('#resNeto').val("");
        										  $('#resIva').val("");
        										  $('#resTotal').val("");
        										  $("#dscto").val("");
        										  window.open('impVenta.php?id='+msg+'&imp='+imp+'&cta='+cta, '_blank'); 
        										  
        
        										  
        
        							            }     
                              },
                              error: function(){
                                      alert('Verifique los datos');      
                              }
        
                    });
        }

}else{
	swal("Ingresa los datos", "Revisa los datos ingresados", "error");
}
            
 
  });




//////////funcion crear cli
$(document).on("click", "#btn_cre_cli", function (){  

         	 $.ajax({
			        type: "POST",
			        url: '../controles/controlCrearCli.php',
			        data:$("#formBusCli").serialize(),
			        success: function (result) { 
			        		        var msg = result.trim();

							        switch(msg) {
							          case '-1':
							              swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
							              break;
							          default:
							              swal("Cliente Creado", msg, "success");
							            }          

			},
			        error: function(jqXHR, textStatus, errorThrown){
			                alert("ERROR: "+jqXHR.responseText);      
			        }
			});


   });



//Carga de lista despegable Condicion Pago
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarCond.php',
      data:   { "vig" : 1},
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].desc_item,
              value: result[i].cod_item,
          });
          $('#cond_pago').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });


//Carga de lista despegable Marcas
$(document).ready(function () {
      $.ajax({
      type: "POST",
      url: '../controles/controlCargarMarcas.php',
      dataType:'json',
      success: function (result) { 
        var filas = Object.keys(result).length;
        for (  i = 0 ; i < filas; i++){ 
           let $option = $('<option />', {
              text: result[i].nom_marca,
              value: result[i].id_marca,
          });
          $('#marca_veh_cli').prepend($option);
        }
      },
      error: function(jqXHR, textStatus, errorThrown){
              alert("ERROR: "+jqXHR.responseText);      
      }
    });
  });



//////////funcion modificar cli
$(document).on("click", "#btn_mod_cli", function (){  

         	 $.ajax({
			        type: "POST",
			        url: '../controles/controlModCli.php',
			        data:$("#formBusCli").serialize(),
			        success: function (result) { 
			        		        var msg = result.trim();

							        switch(msg) {
							          case '-1':
							              swal("Error", "No se han actualizado los datos del cliente, comuniquese con el administrador", "warning");
							              break;
							          default:
							              swal("Cliente Modificado", msg, "success");
							            }          

			},
			        error: function(jqXHR, textStatus, errorThrown){
			                alert("ERROR: "+jqXHR.responseText);      
			        }
			});


   });







//volver buscar cli
$(document).on("click", "#btn_volver_buscar_cli", function () {


		$("#patente_cli").prop('readonly', false);
		$("#btn_buscar_cli").show();
		$("#btn_volver_buscar_cli").hide();
		$("#dat_bus_cli").hide();
		$("#btn_mod_cli").hide();
		$("#btn_cre_cli").hide();

		 $('#tabla_mov tbody').empty();
		 $("#lista_prod").empty();
		 $('#formBusCli').trigger("reset");



});



//////////funcion buscar cliente
$(document).on("click", "#btn_buscar_cli", function () { 

	var cli = $("#patente_cli").val();

		if ((cli!= '')&&(cli != 'NaN')) {

			 $.ajax({
			        type: "POST",
			        url: '../controles/controlCargarCli.php',
			        data:{"cli":cli},
			        dataType:'json',
			        success: function (result) { 

			        	if (result != '') {

			        	
			        		$('#id_cli').val(result[0].id_cli);
			        		$('#nom_cli').val(result[0].nom_cli);
			        		$('#mail_cli').val(result[0].mail_cli);
			        		$('#fono_cli').val(result[0].fono_cli);
			        		$('#marca_veh_cli').val(result[0].id_marca);
			        		$('#modelo_veh_cli').val(result[0].modelo_veh_cli);
			        		$('#anio_veh_cli').val(result[0].anio_veh_cli);
			        		$('#km_veh_cli').val(result[0].km_act_cli);

							
							$("#patente_cli").prop('readonly', true);
							$("#btn_buscar_cli").hide();
							$("#btn_volver_buscar_cli").show();
							$("#dat_bus_cli").show();
							$("#btn_mod_cli").show();

							$.ajax({
							        type: "POST",
							        url: '../controles/controlCargarVentas.php',
							        data:{"cli":result[0].id_cli},
							        dataType:'json',
							        success: function (result) { 


							        		        var filas = Object.keys(result).length;
											        
											     
											        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros
											          var nuevafila= "<tr><td>" +
											          result[i].fec_venta + "</td><td>" +
											          
											          numeral(result[i].km_venta).format('000,000,000,000') + "</td></tr>"
											     
											          $("#tabla_mov").append(nuevafila);

											        }


							},
							        error: function(jqXHR, textStatus, errorThrown){
							                alert("ERROR: "+jqXHR.responseText);      
							        }
							});
 					 }else{
 					 		swal("Crear Cliente", "Cliente no encontrado, favor crear", "warning");
 					 		$("#patente_cli").prop('readonly', true);
							$("#btn_buscar_cli").hide();
							$("#btn_volver_buscar_cli").show();
							$("#dat_bus_cli").show();
							$("#btn_cre_cli").show();
 					 }

			},
			        error: function(jqXHR, textStatus, errorThrown){
			                alert("ERROR: "+jqXHR.responseText);      
			        }
			});






		}else{
			swal("Error Cliente", "Ingrese una patente valida", "error"); 
		}

   });




//////////funcion eliminar producto
function del_prod(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("resumenVenta").deleteRow(i);
    
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


									var e = jQuery.Event("keypress");
									e.which = 13; // # Some key code value
									$("#dscto").trigger(e);


}



//////////funcion agregar producto
$(document).on("click", "#btn_agr_prod", function () {

    if (($("#cantidad").val()!= '')&&($("#cantidad").val() != 'NaN')) {

         	var cod_prod = $("#codigoBarra").val();
         	var stockActual = parseFloat($("#stockActual").val());
          var precio = parseInt($("#precio").val());
          var iva = parseInt(precio * 0.19);
          var neto = parseInt(precio - iva);

         	var cantidad = parseFloat($("#cantidad").val());

         	var sumNeto = 0;
    		var sumIva = 0;
    		var sumTotal = 0;



         	if (cantidad <= stockActual) {

		         	 $.ajax({
					        type: "POST",
					        url: '../controles/controlCargarProd.php',
					        data:{"prod":cod_prod},
					        dataType:'json',
					        success: function (result) { 


					        		 if (parseFloat(stockActual-cantidad) < parseFloat(result[0].stock_min_prod)) {
					        		 	swal("Stock Minimo", "Luego de esta venta el producto "+result[0].nom_prod+" quedara bajo el stock minimo configurado, contacte al proveedor", "warning"); 
					        		 }
					        	

					        		 var nuevafila= "<tr><td style='display:none'>" +
                        							result[0].id_prod + "</td><td>" +
                       	 							result[0].nom_prod + "</td><td>" +
                        							result[0].marca_prod + "</td><td>" +
                        							result[0].cod_barra_prod + "</td><td>" +
                        							cantidad + "</td><td>" +
                        							numeral(precio).format('$000,000,000,000') + "</td><td>" +
                        							numeral(precio * cantidad).format('$000,000,000,000') + "</td><td style='display:none' class='neto'>" +
                        							(neto * cantidad) + "</td><td style='display:none' class='iva'>" +
                        							(iva * cantidad) + "</td><td style='display:none' class='total'>" +
                        							(precio * cantidad) + "</td><td style='display:none'>" +
                        							(result[0].id_prov_prod) + "</td><td>" +
                        							'<button id="btn_prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

                        			$("#resumenVenta").append(nuevafila);

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

									$('#stockActual').val("");
									$('#cantidad').val("");
									$('#codigoBarra').val("");
									$("#codigoBarra").prop('readonly', false);
									$("#btn_volver_buscar").hide();
									$('#nom_prod').text(""); 
									$("#codigoBarra").focus();   
									var e = jQuery.Event("keypress");
									e.which = 13; // # Some key code value
									$("#dscto").trigger(e);
     

					},
					        error: function(jqXHR, textStatus, errorThrown){
					                alert("ERROR: "+jqXHR.responseText);      
					        }
					});
         	}else{
         		swal("Stock Insuficiente", "La cantidad a vender es mayor que el stock actual, verifique los datos", "error"); 
         	}
	}else{
		swal("Error Cantidad", "Ingrese un valor valido", "error"); 
	}


});




//volver buscar prod
$(document).on("click", "#btn_volver_buscar", function () {

		$('#stockActual').val("");
		$('#cantidad').val("");
		$('#codigoBarra').val("");
		$("#codigoBarra").prop('readonly', false);
		$("#btn_volver_buscar").hide();
		$("#codigoBarra").focus(); 
		$('#nom_prod').text(""); 
    $('#precioCot').val("");

});


//////////funcion buscar producto
$(document).ready(function() {
  $("#formBusProd").submit(function() { 

         	
         	var cod_prod = $("#codigoBarra").val();
         	$("#lista_prod").hide();


         	 $.ajax({
			        type: "POST",
			        url: '../controles/controlCargarProd.php',
			        data:{"prod":cod_prod},
			        dataType:'json',
			        success: function (result) {
			        if (result != '') {
			        	$('#stockActual').val(result[0].stock_prod);
                $('#precio').val(result[0].precio);
			        	$('#nom_prod').text(result[0].nom_prod);
						$("#codigoBarra").prop('readonly', true);
						$("#btn_volver_buscar").show();
						$("#cantidad").focus(); 
			        }else{
			        	swal("Producto no encontrado", "Verifique el codigo del producto", "error"); 
			        }

							         

			},
			        error: function(jqXHR, textStatus, errorThrown){
			                alert("ERROR: "+jqXHR.responseText);      
			        }
			});


   });
});

