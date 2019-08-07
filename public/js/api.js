$(document).ready(function(){
    $('#addorden').click(function(){
        var table = document.getElementById("listaorden");
        var valores=$("#nombreorden").val();     
        table.insertRow(-1).innerHTML = "<td><input type=\"text\" name=\"datos[]\"  value=\""+valores+"\" class=\"form-control\" readonly> </td>";
    });
});

function eliminarFila(){
    var table = document.getElementById("listaorden");
  var rowCount = table.rows.length;
  //console.log(rowCount);  
  if(rowCount <= 1)
    alert('No se puede eliminar el encabezado');
  else
    table.deleteRow(rowCount -1);
  }