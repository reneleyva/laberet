jQuery(document).ready(function($) {		
	$( "#keyword" ).autocomplete({
	    source: 'user/buscar/autocomplete.php'
	});

});	