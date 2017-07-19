function shorten(text, maxLength) {
    var ret = text;
    if (ret.length > maxLength) {
        ret = ret.substr(0,maxLength-3) + "…";
    }
    return ret;
}
//Para acortar el titulo de los libros si estan muy largos 
jQuery(document).ready(function($) {
	 //Truncate! para libros .libro con titulos muy largos
  //For each .libro cambia el book title.
  $(".libro").each(function(el) {
        var title =  $(this).find('.book-title').text();
        // console.log(title.trim());
        $(this).find('.book-title').text(shorten(title.trim(), 32));
  });
});