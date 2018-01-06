var upFront = false; 
var upBehind = false; 

function readURL(input,id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	if (id == 'fotoAtras') {
            	$('#foto-atras').attr('src', e.target.result);
            	upFront = true; 
        	} else {
            	$('#foto-frente').attr('src', e.target.result);
            	upBehind = true; 
        	}
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function precioValido(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}

jQuery(document).ready(function($) {
	

	var data = ["ciencia-ficción", "historia", "ficción", "matemáticas", "fantasía", "terror", 
	"poesía", "cuentos", "novela", "trilogía", "artes", "autoayuda", "ciencia", 
	"guerra", "deportes", "economía", "política", "religión", "música", "humor", 
	"cine", "cinematografía", "entretenimiento", "filosofía", "gastronomía", "psicología", 
	"leyes", "medicina", "química", "literatura", "ensayo", "romance", "muerte", "novela-histórica",
	"pintura", "robots", "derecho", "extraterrestres", "conspiración", "astronomía", "aventura", "clásicos", "policíaco"];

	

	var etiquetas = new Bloodhound({
	    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	    queryTokenizer: Bloodhound.tokenizers.whitespace,
	    local: $.map(data, function (city) {
	        return {
	            name: city
	        };
	    })
	});
	etiquetas.initialize();

	$('.etiquetas').tagsinput({
	    typeaheadjs: [{
	          minLength: 1,
	          highlight: true,
	    },{
	        minlength: 1,
	        name: 'etiquetas',
	        displayKey: 'name',
	        valueKey: 'name',
	        source: etiquetas.ttAdapter()
	    }],
	    freeInput: true, 
	    confirmKeys: [32, 44]
	});

	// $('.bootstrap-tagsinput').tagsinput({
	// 	confirmKeys: [32, 44]
	// });

	$('#autor').focus(function(event) {
		if (!upFront || !upBehind) {
			alert("Asegurate de subir las fotos primero!");
			$('#upload-frente').focus();
		}
	});

	$('#upload-frente').click(function(event) {
		let input = $('#frenteInput').find('.cloudinary-fileupload'); 
		input.click();
	});

	$('#upload-atras').click(function(event) {
		let input = $('#atrasInput').find('.cloudinary-fileupload'); 
		input.click();
	});

	$('input[type="file"]').change(function(evt){
		$this = $(evt.target);
		let id = $this.data('cloudinary-field');
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
	    } else if (!upFront || !upBehind) {
	    	$('#precio').removeClass('input-err');
	    	$(".err-msg").text('Asegurese de subir ambas fotos!')
	    	$(".err-msg").show('fast');
	    	return; 
	    } 

	    if (upFront) {
	    	let front = $('input[name="fotoFrente"]').val();
	    	if (!front) {
	    		alert("La foto aún no termina de subirse, espere unos segundos más");
	    		return;
	    	}
	    }

	    if (upBehind) {
	    	let atras = $('input[name="fotoAtras"]').val();
	    	if (!atras) {
	    		alert("La foto aún no termina de subirse, espere unos segundos más");
	    		return;
	    	}
	    }
	   this.submit(); 
	});
});