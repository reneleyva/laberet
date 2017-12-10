jQuery(document).ready(function($) {
	// Jalar los datos aquí.
	$("#total_compras").append($("#precio_total").val() + " MXN");
	$('#home-tab').tab('show'); // Select tab by name
});

