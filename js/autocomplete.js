jQuery(document).ready(function($) {		
	$( "#keyword" ).autocomplete({
	    source: '/vis/buscar/autocomplete.php'
	});
});	