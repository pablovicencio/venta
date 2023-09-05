
$(document).ready(function () {


var graf = "vdia";


  $.ajax({
     url: 'controles/controlCargarGraf.php', 
     type: 'POST',
     data: {"graf":graf},
     dataType:'json',
     success:function(result)
     {
        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'vdia',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['venta','ing'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Ventas $','Costo $'],
        hideHover: 'auto',
        pointStrokeColors: ['white'],
        lineWidth: '6px',
        parseTime: false,
        lineColors: ['Blue', 'Red'],
        xLabelAngle: 0,

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
  });
});

$(document).ready(function () {


var graf = "vmen";


  $.ajax({
     url: 'controles/controlCargarGraf.php', 
     type: 'POST',
     data: {"graf":graf},
     dataType:'json',
     success:function(result)
     {
        new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'vmen',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: result,
        // The name of the data record attribute that contains x-values.
        xkey: 'periodo',
        // A list of names of data record attributes that contain y-values.
         ykeys: ['venta','ing'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Ventas $','Costo $'],
        hideHover: 'auto',
        pointStrokeColors: ['white'],
        lineWidth: '6px',
        parseTime: false,
        lineColors: ['Blue', 'Red'],
        xLabelAngle: 0,

      });
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
  });
});

$(document).ready(function () {

  var d = new Date();
  var n = d.getMonth();
   n=n+1;

  switch(n) {
    case 1:
      $('#mesact').text("Enero");
    break;
    case 2:
      $('#mesact').text("Febrero");
    break;
    case 3:
      $('#mesact').text("Marzo");
    break;
    case 4:
      $('#mesact').text("Abril");
    break;
    case 5:
      $('#mesact').text("Mayo");
    break;
    case 6:
      $('#mesact').text("Junio");
    break;
    case 7:
      $('#mesact').text("Julio");
    break;
    case 8:
      $('#mesact').text("Agosto");
    break;
    case 9:
      $('#mesact').text("Septiembre");
    break;
    case 10:
      $('#mesact').text("Octubre");
    break;
    case 11:
      $('#mesact').text("Noviembre");
    break;
    case 12:
      $('#mesact').text("Diciembre");
    break;
  }

  

  $.ajax({
     url: 'controles/controlCargarDatRes.php', 
     dataType:'json',
     success:function(result)
     {
            $('#spnVtaDia').text(Number(parseInt(result[0].vtadia)).toLocaleString());
            $('#spnNroVtaDia').text(Number(parseInt(result[0].cantvtadia)).toLocaleString());
            $("#spnNroCli").text(Number(parseInt(result[0].clivtadia)).toLocaleString());
            $("#spnVtaMes").text(Number(parseInt(result[0].vtames)).toLocaleString());
            $("#spnVtaSem").text(Number(parseInt(result[0].vtasem)).toLocaleString());
            $("#spnVtaMesMO").text(Number(parseInt(result[0].vtasemmo)).toLocaleString());
            $("#spnVtaSemMO").text(Number(parseInt(result[0].vtasemmo)).toLocaleString());
  },
  error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
  });


  $.ajax({
    type: "POST",
    url: 'controles/controlTabRes.php',
    data: {"tab":1},
    dataType:'json',
    success: function (result) { 
       //$("#tab_prod").dataTable().fnDestroy();
        $('#tab_prod tbody').empty();

        var filas = Object.keys(result).length;

        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

              var nuevafila= "<tr><td>" +
                                            result[i].nom_prod + "</td><td>" +
                                            result[i].cantidad + "</td><td>" +
                                            result[i].familia + "</td><td>" +
                                            result[i].marca_prod + "</td><td>" +
                                            result[i].stock_prod + "</td></tr>" 

              $("#tab_prod").append(nuevafila);
        }


        $('#tab_prod').DataTable({
              "order": [[ 1, "desc" ]],
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              }
          });
        $('.dataTables_length').addClass('bs-select');

    },
    error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
  });


  $.ajax({
    type: "POST",
    url: 'controles/controlTabRes.php',
    data: {"tab":2},
    dataType:'json',
    success: function (result) { 
       //$("#tab_prod").dataTable().fnDestroy();
        $('#tab_fam tbody').empty();

        var filas = Object.keys(result).length;

        for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de registros

              var nuevafila= "<tr><td>" +
                                            result[i].familia + "</td><td>" +
                                            result[i].cantidad + "</td><tr>" 

              $("#tab_fam").append(nuevafila);
        }

    },
    error: function(){
              swal("Error", "favor verifique sus datos e intente nuevamente o comuniquese con su Administrador de Sistema", "warning");      
      }
  });



});