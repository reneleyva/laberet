function check() {
	setTimeout(function() {
		$.ajax({
			url: 'compruebaVentas.php',
			type: 'POST'
		})
		.done(function(res) {
			if (parseInt(res) == 1)
				window.location.reload(true);
			else 
				check();
		})
		
	}, 30000); 
}
jQuery(document).ready(function($) {
	check();
	$('#modal-venta').modal('show');

	$('#modal-venta').on('hidden.bs.modal', function () {
		let ids = "";	
		$('#modal-venta .libro').each(function(index, el) {
			let id = $(el).data('id');
			ids += id + ",";
			console.log(id);
		});

		ids = ids.slice(0, ids.length-1);
		console.log(ids);
		$.ajax({
			url: 'marcarLibrosVisto.php',
			type: 'POST',
			data: {ids: ids},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});