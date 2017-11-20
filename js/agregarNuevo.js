function readURL(input,id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	if (id == 'fotoAtras')
            	$('#foto-atras').attr('src', e.target.result);
            else
            	$('#foto-frente').attr('src', e.target.result);
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

	$('#upload-frente').click(function(event) {
		let input = $('#fotoFrente'); 
		input.click();
	});

	$('#upload-atras').click(function(event) {
		let input = $('#fotoAtras'); 
		input.click();
	});

	$('input[type="file"]').change(function(evt){
		$this = $(evt.target);
		let id = $this.attr('id');
	    readURL(this,id);
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
	    let fotoFrente = $('#fotoFrente').val();
	    let fotoAtras = $('#fotoAtras').val();
	    // $('#titulo').val(titulo.replaceAll("'", "''"));
	    // $('#titulo').val(autor.replaceAll("'", "''"));
	    /*Checa si el precio es correcto*/
	    if (!precioValido(precio)){
	    	// this.submit(); // Go!
	    	$(".err-msg").text('Precio no válido!')
	    	$(".err-msg").show('fast');
	    	$('#precio').val("");
	    	$('#precio').addClass('input-err');
	    	$("#precio").focus();
	    	return; 
	    } else if (!fotoFrente || !fotoAtras) {
	    	$('#precio').removeClass('input-err');
	    	$(".err-msg").text('Asegurese de subir ambas fotos!')
	    	$(".err-msg").show('fast');
	    	return; 
	    }

	   this.submit(); 
	});


	//ISBN STUFF
	$('#isbn').keyup(function() {
		// var isbn = $(this).val();
		// $.getJSON('https://www.googleapis.com/books/v1/volumes?q=isbn:'+isbn, function(json, textStatus) {
		// 	console.log(json.totalItems);
		// 	if(json.totalItems != 0) {
		// 		// console.log(json);
		// 		console.log(json.items[0].volumeInfo);
		// 		var titulo = json.items[0].volumeInfo.title;
		// 		var autor = json.items[0].volumeInfo.authors[0];
		// 		var lenguaje = json.items[0].volumeInfo.language;
		// 		console.log(lenguaje);
		// 		$('#titulo').val(titulo);
		// 		$('#autor').val(autor);
		// 		$('#lenguaje').val(lenguaje);
		// 	}
		// });
	});
});