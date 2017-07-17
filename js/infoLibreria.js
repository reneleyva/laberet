//Para truncate 
function shorten(text, maxLength) {
    var ret = text;
    if (ret.length > maxLength) {
        ret = ret.substr(0,maxLength-3) + "…";
    }
    return ret;
}

jQuery(document).ready(function($) {
	$(".libro").each(function(el) {
        var title =  $(this).find('.book-title').text();
        $(this).find('.book-title').text(shorten(title, 25));
  });
});