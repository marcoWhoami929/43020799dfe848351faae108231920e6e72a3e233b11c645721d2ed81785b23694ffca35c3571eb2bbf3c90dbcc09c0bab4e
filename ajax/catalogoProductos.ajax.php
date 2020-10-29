<?php 
error_reporting(0);
require_once "../controladores/controlMuestras.controlador.php";
require_once "../modelos/controlMuestras.modelo.php";


class TablaCatalogoProductos{
	/*=============================================
	  MOSTRAR LA TABLA PRODUCTOS
	=============================================*/
	public function mostrarCatalogoProductos(){
		$item = null;
 		$valor = null;

 		$productos = ControladorControlMuestras::ctrMostrarProductos($item, $valor);
 		//var_dump($productos);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($productos); $i++){


	 		$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' ><i class='fa fa-times'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$productos[$i]["codigo"].'",
				      "'.$productos[$i]["descripcion"].'",
				      "'.$productos[$i]["cubeta"].'",
				      "'.$productos[$i]["galon"].'",
				      "'.$productos[$i]["litro"].'",
				      "'.$productos[$i]["medio"].'",
				      "'.$productos[$i]["cuart"].'",
				      "'.$productos[$i]["octav"].'",
				      "'.$productos[$i]["unidadMedida"].'",
				      "'.$acciones.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}

	/*=============================================
	  MOSTRAR LA TABLA PRODUCTOS
	=============================================*/
	public function mostrarMarcas(){
		$item = null;
 		$valor = null;

 		$marca = ControladorControlMuestras::ctrMostrarMarcas($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($marca); $i++){

	 		$img = "<img class='img-thumbnail img' src='".$marca[$i]["rutaFoto"]."' width='50px'>";

	 		$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarcas='".$marca[$i]["idMarca"]."' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMarca' idMarca='".$marca[$i]["idMarca"]."' ><i class='fa fa-times'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$marca[$i]["nombre"].'",
				      "'.$img.'",
				      "'.$acciones.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}

	/*=============================================
	  MOSTRAR LA TABLA SUBCATEGORIA MARCAS
	=============================================*/
	public function mostrarSubcategoria(){
		$item = null;
 		$valor = null;

 		$subcategoria = ControladorControlMuestras::ctrMostrarSubcategoria($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($subcategoria); $i++){

	 		$img = "<img class='img-thumbnail img' src='".$subcategoria[$i]["rutaFotoSubcategoria"]."' width='50px'>";

	 		$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubcategoria' idSubMarca='".$subcategoria[$i]["idSubcategoria"]."' data-toggle='modal' data-target='#modalEditarSubcategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubcategoria' idSubMarca='".$subcategoria[$i]["idSubcategoria"]."' ><i class='fa fa-times'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$subcategoria[$i]["nombreSubcategoria"].'",
				      "'.$img.'",
				      "'.$subcategoria[$i]["nombre"].'",
				      "'.$acciones.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}

	/*=============================================
	  MOSTRAR LA TABLA SUBCATEGORIA DESGLOSE
	=============================================*/
	public function mostrarSubcategoriaDesglose(){
		$item = null;
 		$valor = null;

 		$subcategoriaDesglose = ControladorControlMuestras::ctrMostrarSubcategoriaDesglose($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($subcategoriaDesglose); $i++){


	 		$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubcategoriaDesglose' idDesglose='".$subcategoriaDesglose[$i]["id"]."' data-toggle='modal' data-target='#modalEditarDesglose'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubcategoriaDesglose' idDesglose='".$subcategoriaDesglose[$i]["id"]."' ><i class='fa fa-times'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$subcategoriaDesglose[$i]["descripcion"].'",
				      "'.$subcategoriaDesglose[$i]["nombreSubcategoria"].'",
				      "'.$acciones.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}

	/*=============================================
	  MOSTRAR LA TABLA SUBCATEGORIA SUBDESGLOSE
	=============================================*/
	public function mostrarSubdesglose(){
		$item = null;
 		$valor = null;

 		$Subdesglose = ControladorControlMuestras::ctrMostrarSubdesglose($item, $valor);

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($Subdesglose); $i++){


	 		$acciones = "<div class='btn-group'><button class='btn btn-warning btnEditarSubdesglose' idSub='".$Subdesglose[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubDesglose'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubdesglose' idSub='".$Subdesglose[$i]["id"]."' ><i class='fa fa-times'></i></button>";

		
	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$Subdesglose[$i]["descripcion"].'",
				      "'.$Subdesglose[$i]["nombre"].'",
				      "'.$Subdesglose[$i]["marca"].'",
				      "'.$acciones.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

	}


}

/*===============================
 ACTIVAR TABLA PRODUCTOS
 ==============================*/
if (isset($_GET["Productos"])) {
	$activar = new TablaCatalogoProductos();
	$activar -> mostrarCatalogoProductos();

/*===============================
 ACTIVAR TABLA MARCAS
 ==============================*/
}else if (isset($_GET["Marca"])) {
	$activar = new TablaCatalogoProductos();
	$activar -> mostrarMarcas();

/*===============================
 ACTIVAR TABLA SUBCATEGORIAS MARCAS
 ==============================*/

}else if (isset($_GET["Subcategoria"])) {
	$activar = new TablaCatalogoProductos();
	$activar -> mostrarSubcategoria();

/*===============================
 ACTIVAR TABLA SUBCATEGORIAS DESGLOSE
 ==============================*/
}else if (isset($_GET["Desglose"])) {
	$activar = new TablaCatalogoProductos();
	$activar -> mostrarSubcategoriaDesglose();

/*===============================
 ACTIVAR TABLA SUBCATEGORIAS SUBDESGLOSE
 ==============================*/
}else if (isset($_GET["Subdesglose"])) {
	$activar = new TablaCatalogoProductos();
	$activar -> mostrarSubdesglose();

}




 ?>


