$(document).on('click','.pagination a',function(e){
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	var route = "http://blog.app/usuario";

	$.ajax({
		url: route,
		data: {page: page},
		type: 'GET',
		dataType: 'json',
		success: function(data){
			$(".users").html(data);
		}
	});
});