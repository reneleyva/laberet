//Toma los precios de la tabla y calcula el total 
function calculateTotal() {
	var total = 0;
	let items = 0;
	$("tr.item").each( function(index) {
		var price = $(this).find(".price").data("price");
		total += price; //+100 del envio
		items++;
	});

	alert(items);
	var envio = 0;
	switch (items) {
		case 1: 
			envio = 50; 
			break; 
		case 2: 
			envio = 60; 
			break; 

		case 3: 
			envio = 70;
			break; 

		case 4: 
			envio = 80;
			break; 

		case 5: 
			envio = 100; 
			break;  

	}
	total += envio; 
	$('#envio').html(envio);
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