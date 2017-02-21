jQuery(document).ready(function($) {
	//$('#modal-venta').modal('show');

	//ELIMINAR
	$('.libro').on('click', '#eliminar', function() {
		var id = $(this).closest('.libro').data('id');

		if (confirm("¿Está seguro de eliminar este libro de forma permanente?")) {
			$.ajax({
		        type: "GET",
		        url: "eliminar.php",
		        data : { id : id },
		        success: function(html){
		           window.location.reload(false);
		        }
		    });
		}

	});

	//EDITAR LIBRO 
	$('.libro').on('click', '#editar', function(event) {
		var id = $(this).closest('.libro').data('id');
		window.location.href = "../editarLibro?id="+id;
	});
});