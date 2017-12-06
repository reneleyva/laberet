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
	
	// Contruye tags 
	let tags = $('#tags').data('values').split(" ");
	$('#tags').tagsinput({
		confirmKeys: [32, 44]
	});

	for (let i = 0; i < tags.length; i++) {
		$('#tags').tagsinput('add', tags[i]);	
	}

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
	    } 

	   this.submit(); 
	});
});