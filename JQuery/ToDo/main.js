$('input').keypress(function(event){
     if (event.which == 13) 
     {
     	var todoTxt = $(this).val();
     	$(this).val("");
     	$('ul').append("<li>" + todoTxt + " <span><i class='fa fa-trash'></i></span></li>");
     }
});

$('ul').on('click', 'span', function(event){
	$(this).parent().fadeOut(500, function(){
		$(this).remove();
	});
	event.stopPropagation();
});

$('ul').on('click', 'li', function(){
	$(this).toggleClass('done');
});