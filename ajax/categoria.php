<?php

require_once("../modelos/Categoria.php");

$categoria=new Categoria();

$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]): "";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]): "";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]): "";


switch($_GET["op"]){
		
	case 'guardaryeditar':
		if(empty($idcategoria)){
			
			$respuesta=$categoria->insertar($nombre,$descripcion);
			echo($respuesta ? "Categoria registrada" : "La categoria no se pudo registrar");
			
		}else{
			
			$respuesta=$categoria->editar($idcategoria,$nombre,$descripcion);
			echo($respuesta ? "Categoria actualizada" : "La categoria no se pudo actualizar");
		}
		
		break;
		
	case 'desactivar':
		
		$respuesta=$categoria->desactivar($idcategoria);
			echo($respuesta ? "Categoria desactivada" : "La categoria no se pudo desactivar");
		
		break;
		
	case 'activar':
		$respuesta=$categoria->activar($idcategoria);
			echo($respuesta ? "Categoria activada" : "La categoria no se pudo activar");
		
		break;
		
		case 'mostrar':
		$respuesta=$categoria->mostrar($idcategoria);
			echo(json_encode($respuesta));
		
		break;
		
		case 'listar':
		$data=[];
		$respuesta=$categoria->listar();
			
		while($reg=$respuesta->fetch_object()){
			$data[]=array(
			
				"0"=>$reg->idcategoria,
				"1"=>$reg->nombre,
				"2"=>$reg->descripcion,
				"3"=>$reg->condicion
				
			);
		}
		
		$results=array(
		
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data
		);
		
		echo(json_encode($results));
		
		break;
}


?>