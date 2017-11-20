jQuery(document).ready(function($) {		
	// $( "#autor" ).autocomplete({
	//     source: '../agregaLibro/autocomplete.php', 
	//     name: 'autor'
	// });

	$("#autor").autocomplete({
	     source: function (request, response) {
	         // request.term is the term searched for.
	         // response is the callback function you must call to update the autocomplete's 
	         // suggestion list.
	         $.ajax({
	             url: '../agregarLibro/autocomplete.php',
	             data: { autor: request.term },
	             dataType: "json",
	             success: response,
	             error: function () {
	                 response([]);
	             }
	         });
		}
	});	

});