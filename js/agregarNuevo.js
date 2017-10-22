function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function precioValido(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

jQuery(document).ready(function($) {
	//For test
	// var ran = Math.floor(Math.random() * (10000000000000));
	// $('#autor').val('Un vato locou');
	// $('#titulo').val('La vida de un vato locou');
	// $('#lenguaje').val('Espanglish');
	// $('#precio').val("$230");
	// $("#tags").text('Loco ');

	$('.bootstrap-tagsinput').tagsinput({
		confirmKeys: [32, 44]
	});


	$('input[type="file"]').change(function(){
	    readURL(this);
	});

	$('#precio').keyup(function() {
		var precio = $(this).val().replace("$", "");
		$(this).val("$" + precio);
	});

	$('#nuevo-libro').submit(function(ev) {
	    ev.preventDefault(); // to stop the form from submitting
	    var tags = $(".bootstrap-tagsinput").text();
	    var precio = $("#precio").val().replace("$", "");
	    $('#tags').val(tags);
	    $("#precio").val(precio);
	    var titulo = $('#titulo').val();
	    var autor = $('#autor').val();
	    // $('#titulo').val(titulo.replaceAll("'", "''"));
	    // $('#titulo').val(autor.replaceAll("'", "''"));
	    /*Checa si el precio es correcto*/
	    if (precioValido(precio)){
	    	this.submit(); // Go!

	    } else {
	    	$(".err-msg").show('fast');
	    	$('#precio').val("");
	    	$('#precio').addClass('input-err');
	    	$("#precio").focus();
	    }
	});


	//ISBN STUFF
	$('#isbn').keyup(function() {
		var isbn = $(this).val();
		$.getJSON('https://www.googleapis.com/books/v1/volumes?q=isbn:'+isbn, function(json, textStatus) {
			console.log(json.totalItems);
			if(json.totalItems != 0) {
				// console.log(json);
				console.log(json.items[0].volumeInfo);
				var titulo = json.items[0].volumeInfo.title;
				var autor = json.items[0].volumeInfo.authors[0];
				var lenguaje = json.items[0].volumeInfo.language;
				console.log(lenguaje);
				$('#titulo').val(titulo);
				$('#autor').val(autor);
				$('#lenguaje').val(lenguaje);
			}
		});
	});
});