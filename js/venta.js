//////////funcion buscar producto
$(document).ready(function() {
  $("#formBusProd").submit(function() {  
         	console.log('entra');
         	var cod_prod = $("#codigoBarra").val();


         	 $.ajax({
			        type: "POST",
			        url: 'controles/controlCargarProd.php',
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