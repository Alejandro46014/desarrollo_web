var tabla;

//funcion de inicio
function init(){
	
	mostrarform(false);
	listar();
	
}

//funcion limpiar
function limpiar(){
	$("#nombre").val("");
	$("#descripcion").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	
	limpiar();
	if(flag){
		
		$("#listadoregistros").hide();
		$("#formularioregistros").hide();
		$("#btnGuardar").prop("disabled",false);
	}else{
		
		$("#listadoregistros").show();
		$("#formularioregistros").show();
	}
}

//función cancelar formulario

function cancelarform(){
	limpiar();
	mostrarform(false);
	
}

//función listar

function listar(){
	
	tabla=$('#tbllistado').dataTable({
		
		"aProcessing" : true,
		"aServerSide" : true,
		dom : 'Bfrtip',
		buttons : [
			
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
			
		],
		
		"ajax" :{
			
			url: '../ajax/Categoria.php?op=listar',
			type: "get",
			dataType: "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,
		"order": [[0,"desc"]]
		
	}).DataTable();
	
}

init();