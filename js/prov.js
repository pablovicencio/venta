//////////Mod proveedor
$(document).ready(function() {
  $("#formModProv").submit(function() { 

      $.ajax({
        type: "POST",
        url: '../controles/controlModProv.php',
        data:$("#formModProv").serialize(),
        success: function (result) { 

          var msg = result.trim();

                  switch(msg) {
                        case '-1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Modificar Proveedor","Proveedor Modificado correctamente!", "success");
                            $('#formModProv').trigger("reset");
                            $('#desc_prov_mod').text("");
                        }

        },
        error: function(jqXHR, textStatus, errorThrown){
                alert("ERROR: "+jqXHR.responseText);      
        }
      });

      return false;
  });
});

//////////Carga datos prov mod
  $(document).on("change", "#prov", function (){  

    prov = $("#prov").val();

      $.ajax({
        type: "POST",
        url: '../controles/controlCargarProveedor.php',
        data:{"prov" : prov},
        dataType:'json',
        success: function (result) { 

            $('#fono_prov_mod').val(result[0].fono);
            $('#mail_prov_mod').val(result[0].mail);
            $('#mail_prov_mod').val(result[0].mail);
            $('#web_prov_mod').val(result[0].pagina_web);
            $('#desc_prov_mod').text(result[0].desc_prov);


        },
        error: function(jqXHR, textStatus, errorThrown){
                alert("ERROR: "+jqXHR.responseText);      
        }
      });

      return false;
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


//////////Agregar proveedor
$(document).ready(function() {
  $("#formAgregarProv").submit(function() { 

      $.ajax({
        type: "POST",
        url: '../controles/controlCrearProv.php',
        data:$("#formAgregarProv").serialize(),
        success: function (result) { 

          var msg = result.trim();

                  switch(msg) {
                        case '-1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Agregar Proveedor","Proveedor Creado correctamente!", "success");
                            $('#formAgregarProv').trigger("reset");
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
                        }

        },
        error: function(jqXHR, textStatus, errorThrown){
                alert("ERROR: "+jqXHR.responseText);      
        }
      });

      return false;
  });
});