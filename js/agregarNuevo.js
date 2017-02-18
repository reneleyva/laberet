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
	    $('#titulo').val(titulo.replaceAll("'", "''"));
	    $('#titulo').val(autor.replaceAll("'", "''"));
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

});