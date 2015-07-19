/*

jQuery (document) .ready(function($){
	$('#add-answer').on ('submit' , function(){
		$.post(
			$(this).prop('action'),{
						"title" : $('#title').val(),
						"info" : $('#info').val(),
					},
					function(data) {

					},
					'json'
			);
		return false;
	});
});

jQuery (document) .ready(function($){
	$('#search').on ('submit' , function(){
		$.get(
			$(this).prop('action'),{
						"keyword" : $('#keyword').val(),
					},
					function(data) {

					},
					'json'
			);
		return false;
	});
});


*/