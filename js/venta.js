//////////funcion ingresar venta
$(document).on("click", "#btn_ing_venta", function (){  


            var precio_total_venta = $("#resTotal").val();
            //var tipo_doc_venta = $("#tipoDoc").val();

            var obs_venta = $("#obs_ven").val();
            var patente_cli = $("#patente_cli").val();
            var km_venta = $("#km_veh_cli").val();

        
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
                data:   { "data" : TableData, "obs_venta":obs_venta,"patente_cli":patente_cli,"km_venta":km_venta, "precio_total_venta":precio_total_venta},
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
										  window.open('impVenta.php?id='+msg, '_blank'); 
										  

										  

							            }     
                      },
                      error: function(){
                              alert('Verifique los datos');      
                      }

            });
            
 
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
											        console.log (filas);
											     
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


}



//////////funcion agregar producto
$(document).on("click", "#btn_agr_prod", function () {

    if ((cantidad!= '')&&(cantidad != 'NaN')) {

         	var cod_prod = $("#codigoBarra").val();
         	var stockActual = parseInt($("#stockActual").val());
         	var cantidad = parseInt($("#cantidad").val());

         	var sumNeto = 0;
    		var sumIva = 0;
    		var sumTotal = 0;



         	if (cantidad < stockActual) {

		         	 $.ajax({
					        type: "POST",
					        url: '../controles/controlCargarProd.php',
					        data:{"prod":cod_prod},
					        dataType:'json',
					        success: function (result) { 

					        		 if (result[0].stock_min_prod < (stockActual-cantidad)) {
					        		 	swal("Stock Minimo", "Luego de esta venta el producto "+result[0].nom_prod+" quedara bajo el stock minimo configurado, contacte al proveedor", "warning"); 
					        		 }
					        	

					        		 var nuevafila= "<tr><td style='display:none'>" +
                        							result[0].id_prod + "</td><td>" +
                       	 							result[0].nom_prod + "</td><td>" +
                        							result[0].marca_prod + "</td><td>" +
                        							result[0].cod_barra_prod + "</td><td>" +
                        							cantidad + "</td><td>" +
                        							numeral(result[0].precio).format('$000,000,000,000') + "</td><td>" +
                        							numeral(result[0].precio * cantidad).format('$000,000,000,000') + "</td><td style='display:none' class='neto'>" +
                        							(result[0].precio_neto_prod * cantidad) + "</td><td style='display:none' class='iva'>" +
                        							(result[0].iva_prod * cantidad) + "</td><td style='display:none' class='total'>" +
                        							(result[0].precio * cantidad) + "</td><td style='display:none'>" +
                        							(result[0].id_prov_prod) + "</td><td>" +
                        							'<button id="btn__prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

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
									$("#codigoBarra").focus();        

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

});


//////////funcion buscar producto
$(document).ready(function() {
  $("#formBusProd").submit(function() { 

         	
         	var cod_prod = $("#codigoBarra").val();


         	 $.ajax({
			        type: "POST",
			        url: '../controles/controlCargarProd.php',
			        data:{"prod":cod_prod},
			        dataType:'json',
			        success: function (result) {
			        if (result != '') {
			        	$('#stockActual').val(result[0].stock_prod);
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

