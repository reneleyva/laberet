jQuery(document).ready(function($) {
	// Jalar los datos aquí.
	$("#total_compras").append($("#precio_total").val() + " MXN");
	$('#home-tab').tab('show'); // Select tab by name
});


$('#myTab a').on('click', function (e) {
	e.preventDefault();
	$(this).tab('show');
});