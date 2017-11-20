$(document).ready(function($) {
    console.log("Administrador totalmente cargada.");   
    // $(".glyphicon-plus-sign").on('click', function(event) {
        
    // });
});

// Abre el modal alv
function abreModal() {
    $('#myModal').modal('show');
}

// Da el detalle de un pedido
function detalle(id_pedido) {
    $.ajax({
        data:  {
            accion: "getDetalle",
            id_pedido: id_pedido
        },
        url:   'detalle.php',
        type:  'get',
        dataType: 'json',
        beforeSend: function () {
        },
        success:  function (response) {
            // Borramos los datos de la tabla.
            $("#tablaLibros").text("");
            // La cabecera de la tabla;
            var cabecera = " <tr class='header'> \n" + 
                           "    <th style='width:50%;'>Título</th> \n"+
                           "    <th style='width:20%;'>Precio</th> \n" +
                           "    <th style='width:20%;'>Librería</th> \n" +
                           " </tr>";
            $("#tablaLibros").html(cabecera);
            // Itera sobre el json de jsons :v
            $.each(response, function(index, element) {
                var myObj, titulo,precio,libreria,fila;
                myObj = element.info;
                titulo = myObj.titulo;
                precio = myObj.costo;
                libreria = myObj.libreria;
                fila = " <tr> \n" +
                       "     <td>"+titulo+"</td> \n" +
                       "     <td>$"+precio+"</td> \n" +
                       "     <td>"+libreria+"</td> \n" +
                       " </tr>";
                $("#tablaLibros").append(fila);
            });
            abreModal();
        }
    });
}

// Para buscar en la tabla
function myFunction() {
    // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        } 
    }
}