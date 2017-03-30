var json = {};

function saveJSON(json) {
	 $.ajax({
    	url: 'checklist.php',
    	type: 'POST',
    	data: {json: json},
    })
    .done(function() {
    	console.log("success");
    })
    .fail(function() {
    	console.log("error");
    })
    .always(function() {
    	console.log("complete");
    });
}


jQuery(document).ready(function($) {
	$(document).bind('IssuesReceived', IssuesReceived)
	
	$.getJSON('checklist.json', function(data, textStatus) {
		$(document).trigger('IssuesReceived', data);
	});

    // console.log(json);
	$('.checklist').on('click', 'input[type="checkbox"]', function() {
		// console.log(json);
		var item = $(this).closest('.item');

		if (!$(this).is(':checked')) {
			//Regresa a normal
			// $(this).closest('.item').css('background', '#A4E0FF');

			item.removeClass('complete');
			if (item.data('important')) {
				item.addClass('important');
			} else {
				$(this).closest('.item').addClass('not-complete');
			}
			
		} else {
			// $(this).closest('.item').css('background', '#89FE83');
			item.removeClass('not-complete');
			item.removeClass('important');
			$(this).closest('.item').addClass('complete');
		}
	});

	$('#agregar').submit(function(event) {
		event.preventDefault();
		var title = $('#title').val();
		var description = $('#description').val();
		var important = $('#important').is(':checked');
		item = {};
		item.title = title;
		item.description = description;
		item.important = important;
		item.complete = false; 
		json.items.push(item);
		saveJSON(json);
		window.location.reload();
	});
});

function IssuesReceived(evt, data) {
	json = data;
	//Genera vistas
	var items = json.items;
	for (var i = 0; i < items.length; i++) {
		var task = items[i];
		console.log(task);
		var html = "";
		if (task.complete == "true") {
			html = '<li class="item complete" data-important="'+task.important+'"><label><input type="checkbox" checked="true" name="" value=""> '+task.title+'</label><p class="description">'+task.description+'</p></li>';
		} else if (task.important){
			html = '<li class="item important" data-important="'+task.important+'"><label><input type="checkbox" name="" value=""> '+task.title+'</label><p class="description">'+task.description+'</p></li>';
		} else {
			html = '<li class="item not-complete" data-important="'+task.important+'"><label><input type="checkbox" name="" value=""> '+task.title+'</label><p class="description">'+task.description+'</p></li>';
		}
		
		$('.checklist').append(html);
	}
}