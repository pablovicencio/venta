//////////funcion eliminar producto
function del_prod(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("resumenVenta").deleteRow(i);
}



//////////funcion agregar producto
$(document).on("click", "#btn_agr_prod", function () {

    if ((cantidad!= '')&&(cantidad != 'NaN')) {

         	var cod_prod = $("#codigoBarra").val();
         	var stockActual = parseInt($("#stockActual").val());
         	var cantidad = parseInt($("#cantidad").val());


         	if (cantidad < stockActual) {

		         	 $.ajax({
					        type: "POST",
					        url: '../controles/controlCargarProd.php',
					        data:{"prod":cod_prod},
					        dataType:'json',
					        success: function (result) { 
					        	

					        		 var nuevafila= '<tr><td style="display:none">' +
                        							result[0].id_prod + "</td><td>" +
                       	 							result[0].nom_prod + "</td><td>" +
                        							result[0].marca_prod + "</td><td>" +
                        							result[0].cod_barra_prod + "</td><td>" +
                        							cantidad + "</td><td>" +
                        							numeral(result[0].precio).format('$000,000,000,000') + "</td><td>" +
                        							numeral(result[0].precio * cantidad).format('$000,000,000,000') + "</td><td>" +
                        							'<button id="btn__prod" name="btn_del_prod" class="btn btn-warning" onclick="del_prod(this)"><i class="mdi mdi-table-edit" aria-hidden="true"></i></button></td></tr>'

                        			$("#resumenVenta").append(nuevafila);

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

							$('#stockActual').val(result[0].stock_prod);
							$("#codigoBarra").prop('readonly', true);
							$("#btn_volver_buscar").show();
							$("#cantidad").focus();          

			},
			        error: function(jqXHR, textStatus, errorThrown){
			                alert("ERROR: "+jqXHR.responseText);      
			        }
			});


   });
});

