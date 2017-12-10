jQuery(document).ready(function($) {
	console.log("Historial ventas totalmente cargada.");
	// Jalar los datos aquí.
	$("#total_compras").append($("#precio_total").val() + " MXN");
	$('#home-tab').tab('show'); // Select tab by name
});

