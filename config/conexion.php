<?php

require("global.php");


		$conexion= new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
		
		mysqli_query($conexion,'SET NAMES "'.DB_ENCODE.'"');

//COMPROBAMOS SI SE PRODUCE ERROR DE CONEXIÓN

if(mysqli_errno()){
	
	printf("Falló la conexión a la base de datos: %s\n",mysqli_error());
}

if(function_exists("ejecutarConsulta")){
	
	function ejecutarConsulta($sql){
		
		global $conexion;
		$query = $conexion-> query($sql);
		
		return($query);
		
	}
	
	function ejecutarConsultaSimpleFila($sql){
		
		global $conexion;
		$query = $conexion-> query($sql);
		$row = $query->fetch_assoc();
		
		return($row);
	}
	
	function ejecutarConsulta_retornar_ID($sql){
		
		global $conexion;
		$query = $conexion-> query($sql);
		
		return($conexion->insert_id);
	}
	
	function limpiarCadena($str){
		
		global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		
		return(htmlspecialchars($str));
		
	}











}//cierre condicion no existe función