//Toma los precios de la tabla y calcula el total 
function calculateTotal() {
	var total = 0;
	$("tr.item").each( function(index) {
		var price = $(this).find(".price").data("price");
		total += price + 100; //+100 del envio
	});
	$('#total').html("<b>" + "Total: $" + total + " MXN</b>");
	if (total > 0) {
		$(".continue button").removeClass("disabled");
	} else {
		$(".continue button").addClass("disabled");
	}
}

jQuery(document).ready(function($) {
	calculateTotal();

	$('.eliminar').click(function(e) {
		$(this).closest('tr').hide('slow').remove();
		calculateTotal();
	});

});