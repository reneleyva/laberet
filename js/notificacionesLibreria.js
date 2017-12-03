function check() {
	setTimeout(function() {
		$.ajax({
			url: 'compruebaVentas.php',
			type: 'POST'
		})
		.done(function(res) {
			alert(res);
			check();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}, 5000); 
}
jQuery(document).ready(function($) {
	// check();
	$('#modal-venta').modal('show');
});