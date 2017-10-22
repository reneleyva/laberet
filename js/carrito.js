//Toma los precios de la tabla y calcula el total 
function calculateTotal() {
	var total = 100;
	$("tr.item").each( function(index) {
		var price = $(this).find(".price").data("price");
		total += price; //+100 del envio
	});
	$('#total').html("<b>" + "Total: $" + total + " MXN</b>");
}

function deleteFromCart(id) {
	// alert("Eliminando: " + id);
	// location.href = "./eliminarDelCarrito.php?id="+id;
	$.ajax({
        type: "GET",
        url: "eliminarDelCarrito.php",
        data : { id : id },
        success: function(html){
           window.location.reload(true);
        }
    });
}

jQuery(document).ready(function($) {
	calculateTotal();

	$('.eliminar').click(function(e) {
		var fila = $(this).closest('tr');
		deleteFromCart(fila.data('id'));
		fila.hide('slow').remove();
		calculateTotal();
	});

});