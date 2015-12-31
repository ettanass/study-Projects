(function($){

$('.addPanier').click(function(event){

	event.preventDefault();
	$.get($(this).attr('href'),{},function(data){
	if(confirm(data.message + ". Voulez vous consulter le panier ?") ){

			location.href= 'cart.php';
	}else{
		$('#total').empty().append(data.total);
		$('#count').empty().append(data.count);
	}

	},'json');
	return false;
});

})(jQuery);