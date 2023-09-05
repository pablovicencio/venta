//////////funcion anular venta
$(document).ready(function() {
  $("#formAnuVenta").submit(function() { 

      var id_ven = $('#id_venta_anu').val();

           $.ajax({
              type: "POST",
              url: '../controles/controlAnuVenta.php',
              data:$("#formAnuVenta").serialize(),
              success: function (result) { 
                          var msg = result.trim();

                      switch(msg) {
                        case '-1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Venta " +id_ven+ " Anulada", msg, "success");
                          }          

      },
              error: function(jqXHR, textStatus, errorThrown){
                      alert("ERROR: "+jqXHR.responseText);      
              }
      });


   });
});




 //////////funcion cargar detalle informe venta modal
$(document).on("click", "#btn_modal_det_inf_ven", function () {
     var id_ven = $(this).data('id');
     
        
        $('#formAnuVenta').trigger("reset");   
        $('#tabla_det_ven tbody').empty();

     
    $.ajax({
      url: '../controles/controlCabVenMod.php',
      type: 'POST',
      data: {"id_ven":id_ven},
      dataType:'json',
      success:function(result){
         $('#id_venta').text(result[0].id_venta);
         $('#id_venta_anu').val(result[0].id_venta);
         $('#patente_mod').val(result[0].patente_veh_cli);
         $('#nom_cli').val(result[0].nom_cli);
         $('#marca').val(result[0].nom_marca);
         $('#modelo_veh_cli').val(result[0].modelo_veh_cli);
         $('#km_veh_cli').val(result[0].km_venta);
         $('#km_prox_cli').val(result[0].km_prox_venta);
         $('#fec_ven').val(result[0].fec_venta);
         $('#hora_ven').val(result[0].hora);
         $('#est_ven').val(result[0].estado);
         $('#obs_ven').val(result[0].obs_venta);
         $('#dscto').val(numeral(result[0].dscto_venta).format('$000,000,000,000'));
         $('#pre_total').val(numeral(result[0].precio_total_venta).format('$000,000,000,000'));


             $.ajax({
                type: "POST",
                url: '../controles/controlDetVenMod.php',
                data: {"id_ven":id_ven},
                dataType:'json',
                success: function (result) { 

                  var filas = Object.keys(result).length;

                  for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

                        var nuevafila= "<tr><td>" +
                                                      result[i].cod_barra_prod + "</td><td>" +
                                                      result[i].nom_prod + "</td><td>" +
                                                      result[i].marca_prod + "</td><td>" +
                                                      result[i].cant_dventa + "</td><td>" +
                                                      numeral(result[i].precio_uni_dventa).format('$000,000,000,000') + "</td><td>" +
                                                      numeral(result[i].precio_total_dventa).format('$000,000,000,000') + "</td></tr>"

                        $("#tabla_det_ven").append(nuevafila);

                  }
                },
                error: function(){
                        swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
                }
              });
      },
        error: function(){
                swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
        }
      });

    $('#modal_det_venta').modal('show');
});

 //CARGA DE GIF INF PER
  $(document).ajaxStart(function() {
    $("#formBuscarCli").hide();
    $("#loading").show();
       }).ajaxStop(function() {
    $("#loading").hide();
    $("#formBuscarCli").show();
    }); 



//////////funcion buscar informe Cliente
$(document).ready(function() {
  $("#formBuscarCli").submit(function() {  

    var tipo = 2

    $.ajax({
      type: "POST",
      url: '../controles/controlInf.php',
      data:$("#formBuscarCli").serialize()+ "&tipo="+tipo,
      dataType:'json',
      success: function (result) { 
       $("#tab_cli").dataTable().fnDestroy();
        $('#tab_cli tbody').empty();

        var filas = Object.keys(result).length;

        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

              var nuevafila= "<tr><td>" +
                                            result[i].id_venta + "</td><td>" +
                                            result[i].fec_venta + "</td><td>" +
                                            result[i].hora + "</td><td>" +
                                            result[i].estado + "</td><td>" +
                                            numeral(result[i].dscto_venta).format('$000,000,000,000') + "</td><td>" +
                                            numeral(result[i].precio_total_venta).format('$000,000,000,000') + "</td><td>" +
                                            result[i].obs_venta + "</td><td>" +
                                            result[i].patente_veh_cli + "</td><td>" +
                                            '<a id="btn_modal_det_inf_ven" class="link-modal btn btn-outline-success" data-id="'+result[i].id_venta+'" data-toggle="modal" ><i class="fa fa-plus-square" aria-hidden="true"></i></a></td><td>'+
                                            '<a  class="btn btn-outline-info" href="impVenta.php?id='+result[i].id_venta+'&imp=1" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a></td></tr>'

              $("#tab_cli").append(nuevafila);

        }


          $('#tab_cli').DataTable({
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

         $("#div_cli").show();

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

    var tipo = 1

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

              var nuevafila= "<tr><td>" +
                                            result[i].id_venta + "</td><td>" +
                                            result[i].fec_venta + "</td><td>" +
                                            result[i].hora + "</td><td>" +
                                            result[i].estado + "</td><td>" +
                                            numeral(result[i].dscto_venta).format('$000,000,000,000') + "</td><td>" +
                                            numeral(result[i].precio_total_venta).format('$000,000,000,000') + "</td><td>" +
                                            result[i].obs_venta + "</td><td>" +
                                            result[i].patente_veh_cli + "</td><td>" +
                                            '<a id="btn_modal_det_inf_ven" class="link-modal btn btn-outline-success" data-id="'+result[i].id_venta+'" data-toggle="modal" ><i class="fa fa-plus-square" aria-hidden="true"></i></a></td><td>'+
                                            '<a  class="btn btn-outline-info" href="impVenta.php?id='+result[i].id_venta+'&imp=1" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a></td></tr>'

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