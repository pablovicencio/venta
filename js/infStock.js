 //CARGA DE GIF INF PER
  $(document).ajaxStart(function() {
    $("#formBuscarprod").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formBuscarprod").show();
    }); 



//////////funcion buscar informe Producto
$(document).ready(function() {
  $("#formBuscarProd").submit(function() {  

    var tipo = 4


    $.ajax({
      type: "POST",
      url: '../controles/controlInf.php',
      data:$("#formBuscarProd").serialize()+ "&tipo="+tipo,
      dataType:'json',
      success: function (result) { 
       $("#tab_prod").dataTable().fnDestroy();
        $('#tab_prod tbody').empty();

        var filas = Object.keys(result).length;

        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

              var nuevafila= "<tr><td style='display: none;'>" +
                                            result[i].id_prod + "</td><td>" +
                                            result[i].nom_prod + "</td><td>" +
                                            result[i].cod_barra_prod + "</td><td>" +
                                            result[i].marca_prod + "</td><td>" +
                                            result[i].stock_min_prod + "</td><td>" +
                                            result[i].stock_prod + "</td><td>" +
                                            numeral(result[i].precio_total_compra).format('$000,000,000,000') + "</td><td>" +
                                            numeral(result[i].precio_bruto_prod).format('$000,000,000,000') + "</td><td>" +
                                            result[i].venta_semanal + "</td><td>" +
                                            result[i].nom_prov + "</td></tr>" 


              $("#tab_prod").append(nuevafila);

        }


          $('#tab_prod').DataTable({
              buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel'
                }
           ],
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
                dom: 'Bfrtip'
          });
          $('.dataTables_length').addClass('bs-select');

         $("#div_prod").show();

      },
      error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
}); 


 //CARGA DE GIF INF PER
  $(document).ajaxStart(function() {
    $("#formBuscarPer").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formBuscarPer").show();
    }); 



//////////funcion buscar informe Periodo
$(document).ready(function() {
  $("#formBuscarPer").submit(function() {  

    var tipo = 3
    
    $("#dias_inf").text($("#dias").val());

    $.ajax({
      type: "POST",
      url: '../controles/controlInf.php',
      data:$("#formBuscarPer").serialize()+ "&tipo="+tipo,
      dataType:'json',
      success: function (result) { 
       $("#tab_per").dataTable().fnDestroy();
        $('#tab_per tbody').empty();

        var filas = Object.keys(result).length;

        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

              var nuevafila= "<tr><td style='display: none;'>" +
                                            result[i].id_prod + "</td><td>" +
                                            result[i].nom_prod + "</td><td>" +
                                            result[i].cod_barra_prod + "</td><td>" +
                                            result[i].marca_prod + "</td><td>" +
                                            result[i].stock_min_prod + "</td><td>" +
                                            result[i].stock_prod + "</td><td>" +
                                            numeral(result[i].precio_total_compra).format('$000,000,000,000') + "</td><td>" +
                                            numeral(result[i].precio_bruto_prod).format('$000,000,000,000') + "</td><td>" +
                                            result[i].venta_semanal + "</td><td>" +
                                            result[i].nom_prov + "</td></tr>" 

              $("#tab_per").append(nuevafila);

        }


          $('#tab_per').DataTable({
              buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Excel'
                }
           ],
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
                dom: 'Bfrtip'
          });
          $('.dataTables_length').addClass('bs-select');

         $("#div_per").show();

      },
      error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
    });
    return false;
  });
}); 