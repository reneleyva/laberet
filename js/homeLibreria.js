jQuery(document).ready(function($) {
	//$('#modal-venta').modal('show');

	//ELIMINAR
	$('.libro').on('click', '#eliminar', function() {
		var id = $(this).closest('.libro').data('id');

		swal({
		  title: '¿Estás seguro?',
		  text: "¿Eliminar este libro de forma permanente?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sí, eliminar!'
		}).then(function (result) {
		  if (result.value) {
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
		// if (confirm("¿Está seguro de eliminar este libro de forma permanente?")) {
			
		// }

	});

	$('.vendido').click(function() {
		// alert();
		var id = $(this).closest('.libro').data('id');
		$.ajax({
	        type: "GET",
	        url: "vendidoTienda.php",
	        data : { id : id },
	        success: function(html){
	        	swal({
				  position: 'top-right',
				  type: 'success',
				  title: 'Libro vendido en tienda!',
				  showConfirmButton: false,
				  timer: 1500
				});
	           window.location.reload(false);
	        }
	    });
	});

	//EDITAR LIBRO 
	$('.libro').on('click', '#editar', function(event) {
		var id = $(this).closest('.libro').data('id');
		window.location.href = "../editarLibro?id="+id;
	});
});