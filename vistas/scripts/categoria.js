var tabla;

//funcion de inicio
function init(){
	
	
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
		
	}).DataTable();
	
}

init();