$(document).ready(function(){
	Carga();
});

function Carga(){
	var tablaDatos = $("#datos");
	var route = "http://blog.app/generos";

	$("#datos").empty();
	$.get(route, function(res){
		$(res).each(function(key,value){
			tablaDatos.append("<tr><td>"+value.genre+"</td><td><button value="+value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-toggle='modal' data-target='#myModal'﻿>Editar</buton><button class='btn btn-danger'  value="+value.id+" OnClick='Eliminar(this);'>Eliminar</buton></td></tr>");
		});
	});
}

function Eliminar(btn){
	var route = "http://blog.app/genero/"+btn.value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			Carga();
			$('#msj-success').fadeIn(); 
		}
	});	
}

function Mostrar(btn){
	//console.log sirve para visualizar en la consola el valor del id seleccionado
	//console.log(btn.value);
	var route = "http://blog.app/genero/"+btn.value+"/edit";

	$.get(route, function(res){
		$("#genre").val(res.genre);
		$("#id").val(res.id);
	});
}

$("#actualizar").click(function(){
	var value = $("#id").val();
	var dato = $("#genre").val();
	var route = "http://blog.app/genero/"+value+"";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'json',
		data: {genre: dato},
		success: function(){
			Carga();
			$("#myModal").modal('toggle');
			$('#msj-success').fadeIn(); 
		}
	});
});