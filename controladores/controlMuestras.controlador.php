<?php
class ControladorControlMuestras{



	/*=============================================
	MOSTRAR MUESTRAS
	=============================================*/

	static public function ctrMostrarMuestras($item, $valor){

		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarMuestras($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR MUESTRAS PDF
	=============================================*/

	static public function ctrMostrarMuestrasPdf($item, $valor){

		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarMuestrasPdf($tabla, $item, $valor);

		return $respuesta;
	
	}
	
	/*=============================================
	MOSTRAR DATOS DEL PRODUCTO
	=============================================*/

	static public function ctrMostrarDatosProducto($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloControlMuestras::mdlMostrarDatosProducto($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	AGREGAR RUTA DE ARCHIVO
	=============================================*/

	static public function ctrAgregarRutaSolicitud($item, $valor){

		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlAgregarRutaSolicitud($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR SOLCITUDES TOTALES
	=============================================*/

	static public function ctrMostrarTotalSolicitudes($item, $valor){
		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarTotalSolicitudes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SOLCITUDES EN CAMINO
	=============================================*/

	static public function ctrMostrarTotalEnCamino($item, $valor){
		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarTotalEnCamino($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SOLCITUDES EN PROCESO
	=============================================*/

	static public function ctrMostrarTotalEnProceso($item, $valor){
		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarTotalEnProceso($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SOLCITUDES EN ENTREGA
	=============================================*/

	static public function ctrMostrarTotalEnEntrega($item, $valor){
		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarTotalEnEntrega($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR SOLCITUDES CONCLUIDO
	=============================================*/

	static public function ctrMostrarTotalConcluido($item, $valor){
		$tabla = "solicitudes";

		$respuesta = ModeloControlMuestras::mdlMostrarTotalConcluido($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PROMOCIONES
	=============================================*/

	static public function ctrMostrarPromociones($item, $valor){

		$tabla = "promociones";

		$respuesta = ModeloControlMuestras::mdlMostrarPromociones($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR DATOS CLIENTE
	=============================================*/

	static public function ctrMostrarDatosCliente($item, $valor){

		$tabla = "user";

		$respuesta = ModeloControlMuestras::mdlMostrarDatosCliente($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	DESCARGAR SOLICITUD
	=============================================*/

	static public function ctrDescargarSolicitud(){

		if(isset($_GET["idSolicitud"]) && $_GET["opcion"] == 1){

			$tabla = "solicitudes";
			$datos = array("id" => $_GET["idSolicitud"]);


			$respuesta = ModeloControlMuestras::mdlDescargarSolicitud($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La solicitud ha sido descargada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "controlMuestras";

								}
							})

				</script>';

			}		

		}

	}
	/*=============================================
	EDITAR PROMOCIÓN
	=============================================*/

	static public function ctrEditarPromocion(){

		if(isset($_POST["idPromocion"])){


				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){
					/*
					// Open image as a string 
					$data = file_get_contents($_FILES["editarFoto"]["tmp_name"]); 
					  
					// getimagesizefromstring function accepts image data as string 
					list($width, $height) = getimagesizefromstring($data); 

					$nuevoAncho = $width;
					$nuevoAlto = $height;
					*/
					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = $ancho;
					$nuevoAlto = $alto;


					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/promocionesApp/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/promocionesApp/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "promociones";
			
				$datos = array("id" => $_POST["idPromocion"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "activa" => $_POST["editarEstado"],
							   "imagen" => $ruta);

				$respuesta = ModeloControlMuestras::mdlEditarPromocion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La promoción ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "controlMuestras";

									}
								})

					</script>';

				}

		}

	}
/*=============================================
	MOSTRAR DATOS DEL CLIENTE
	=============================================*/

	static public function ctrMostrarDatosClienteMuestras($item2, $valor2){

		$tabla = "user";

		$respuesta = ModeloControlMuestras::mdlMostrarDatosClienteMuestras($tabla, $item2, $valor2);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR CRTERA DE CLIENTES
	=============================================*/

	static public function ctrMostrarCarteraClientes($item, $valor){

		$tabla = "user";

		$respuesta = ModeloControlMuestras::mdlMostrarCarteraClientes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR DATOS DE SUCURSALES
	=============================================*/

	static public function ctrMostrarSucursales($item, $valor){

		$tabla = "sucursales";

		$respuesta = ModeloControlMuestras::mdlMostrarSucursales($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CATALOGO DE PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productoscatalogo";

		$respuesta = ModeloControlMuestras::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR SUBCATEGORIAS
	=============================================*/

	static public function ctrMostrarCatalogo($item, $valor){

		$tabla = "subcategoriamarca";

		$respuesta = ModeloControlMuestras::mdlMostrarCatalogo($tabla, $item, $valor);

		return $respuesta;
	
	}
	static public function ctrMostrarSubcategoria($item, $valor){

		$tabla = "subcategoriamarca";

		$respuesta = ModeloControlMuestras::mdlMostrarSubcategoria($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SUBCATEGORIA DESGLOSE
	=============================================*/
	static public function ctrMostrarSubcategoriaDesglose($item, $valor){

		$tabla = "subcategoriadesglose";

		$respuesta = ModeloControlMuestras::mdlMostrarSubcategoriaDesglose($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SUBCATEGORIA SUBDESGLOSE
	=============================================*/
	static public function ctrMostrarSubdesglose($item, $valor){

		$tabla = "subcategoriasubdesglose";

		$respuesta = ModeloControlMuestras::mdlMostraraSubdesglose($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CATALOGO DE PRODUCTOS
	=============================================*/

	static public function ctrMostrarMarcas($item, $valor){

		$tabla = "categoriasmarca";

		$respuesta = ModeloControlMuestras::mdlMostrarMarcas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	AGREGAR NUEVO PRODUCTO
	=============================================*/
	static public function ctrAgregarProducto(){

		if(isset($_POST["addDescripcion"])){

			$tabla = "productoscatalogo";

				$datos = array("codigo" => $_POST["addCodigo"],
							   "descripcion" => $_POST["addDescripcion"],
							   "cubeta" => $_POST["addPrecioCubeta"],
							   "galon" => $_POST["addPrecioGalon"],
							   "litro" => $_POST["addPrecioLitro"],
							   "medio" => $_POST["addPrecioMedio"],
							   "cuart" => $_POST["addPrecioCuarto"],
							   "octav" => $_POST["addPrecioOctavo"],
							   "unidadMedida" => $_POST["addUnidadMedida"],
							   "valorMedida" => $_POST["addValorMedida"],
							   "gramaje" => $_POST["addGramaje"],
							   "nombre" => $_POST["addNombreUnidad"],
							   "idSubcategoriaDesglose" => $_POST["addCatalogo"]);

				$respuesta = ModeloControlMuestras::mdlAgregarProducto($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "catalogoProductos";

						}

					});
				

					</script>';
			}
				

		}
	}

	/*=============================================
	AGREGAR NUEVA MARCA
	=============================================*/
	static public function ctrAgregarMarca(){

		if(isset($_POST["addNombre"])){

			$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

			$tabla = "categoriasmarca";

				$datos = array("nombre" => $_POST["addNombre"],
							   "rutaFoto" => $ruta);

				$respuesta = ModeloControlMuestras::mdlAgregarMarca($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
			}
				

		}
	}

	/*=============================================
	AGREGAR NUEVA SUBCATEGORIA MARCA
	=============================================*/
	static public function ctrAgregarSubcategoria(){

		if(isset($_POST["addNombreSub"])){

			$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"]) && !empty($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

			$tabla = "subcategoriamarca";

				$datos = array("nombreSubcategoria" => $_POST["addNombreSub"],
							   "rutaFotoSubcategoria" => $ruta,
							   "idMarca" => $_POST["addMarcaSub"]);

				$respuesta = ModeloControlMuestras::mdlAgregarSubcategoria($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({

						type: "success",
						title: "¡ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
			}
				

		}
	}

	/*=============================================
	AGREGAR NUEVA SUBCATEGORIA DESGLOSE
	=============================================*/
	static public function ctrAgregarSubcategoriaDesglose(){

		if(isset($_POST["addDescripcion"])){


			$tabla = "subcategoriadesglose";

				$datos = array("descripcion" => $_POST["addDescripcion"],
							   "idSubcategoria" => $_POST["addCategoria"]);

				$respuesta = ModeloControlMuestras::mdlAgregarSubcategoriaDesglose($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({

						type: "success",
						title: "¡Ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
			}
				

		}
	}

	/*=============================================
	AGREGAR NUEVA SUBCATEGORIA SUBDESGLOSE
	=============================================*/
	static public function ctrAgregarSubcategoriaSubdesglose(){

		if(isset($_POST["addDescripcionSub"])){


			$tabla = "subcategoriasubdesglose";

				$datos = array("descripcion" => $_POST["addDescripcionSub"],
							   "idDesglose" => $_POST["addSubdesglose"],
								"marca" => $_POST["addMarca"]);

				$respuesta = ModeloControlMuestras::mdlAgregarSubcategoriaSubdesglose($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({

						type: "success",
						title: "¡Ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "subcategoriasProducto";

						}

					});
				

					</script>';
			}
				

		}
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){
		if(isset($_POST["idProducto"])){	

				$tabla = "productoscatalogo";
				$datos = array("id" => $_POST["idProducto"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "cubeta" => $_POST["editarPrecioCubeta"],
							   "galon" => $_POST["editarPrecioGalon"],
							   "litro" => $_POST["editarPrecioLitro"],
							   "medio" => $_POST["editarPrecioMedio"],
							   "cuart" => $_POST["editarPrecioCuarto"],
							   "octav" => $_POST["editarPrecioOctavo"],
							   "unidadMedida" => $_POST["editarUnidadMedida"],
							   "valorMedida" => $_POST["editarValorMedida"],
							   "gramaje" => $_POST["editarGramaje"],
							   "nombre" => $_POST["editarNombreUnidad"],
							   "idSubcategoriaDesglose" => $_POST["editarCatalogoDesglose"]
							);
				$respuesta = ModeloControlMuestras::mdlEditarProducto($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "catalogoProductos";
									}
								})
					</script>';

				}
		}
	}

	/*=============================================
	EDITAR MARCA
	=============================================*/

	static public function ctrEditarMarca(){
		if(isset($_POST["idMarcas"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){
					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
					if(!empty($_POST["fotoActual"])){
						unlink($_POST["fotoActual"]);
					}else{
						mkdir($directorio, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
				}

				$tabla = "categoriasmarca";

				$datos = array("idMarca" => $_POST["idMarcas"],
							   "nombre" => $_POST["editarNombre"],
							   "rutaFoto" => $ruta
							);
				$respuesta = ModeloControlMuestras::mdlEditarMarca($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';

				}
		}
	}

	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

	static public function ctrEditarSubcategoria(){
		if(isset($_POST["idSubMarca"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){
					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/
					if(!empty($_POST["fotoActual"])){
						unlink($_POST["fotoActual"]);
					}else{
						mkdir($directorio, 0755);
					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
				}

				$tabla = "subcategoriamarca";

				$datos = array("idSubcategoria" =>$_POST["idSubMarca"],
								"nombreSubcategoria" => $_POST["editarSubcategoria"],
							   "rutaFotoSubcategoria" => $ruta,
							   "idMarca" => $_POST["editarMarcaSub"]);

				$respuesta = ModeloControlMuestras::mdlEditarSubcategoria($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';

				}
		}
	}

	/*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/

	static public function ctrEditarSubcategoriaDesglose(){
		if(isset($_POST["idDesglose"])){
			
				$tabla = "subcategoriadesglose";

				$datos = array("id" =>$_POST["idDesglose"],
								"descripcion" => $_POST["editarDescripcion"],
							    "idSubcategoria" => $_POST["editarSubcategoriaD"]);

				$respuesta = ModeloControlMuestras::mdlEditarSubcategoriaDesglose($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';

				}
		}
	}
	/*=============================================
	EDITAR SUBCATEGORIA DESGLOSE
	=============================================*/

	static public function ctrEditarSubDesglose(){
		if(isset($_POST["idSub"])){
			
				$tabla = "subcategoriasubdesglose";

				$datos = array("id" =>$_POST["idSub"],
								"descripcion" => $_POST["editarDescripcionSub"],
							    "idDesglose" => $_POST["editarSubDesglose"],
								"marca" => $_POST["editarMarca"]);

				$respuesta = ModeloControlMuestras::mdlEditarSubDesglose($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {
									window.location = "subcategoriasProducto";
									}
								})
					</script>';

				}
		}
	}

	/*==============================================
			ELIMINAR PRODUCTO
	==============================================*/

	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productoscatalogo";

			$datos = $_GET["idProducto"];

			$respuesta = ModeloControlMuestras::mdlEliminarProducto($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "catalogoProductos";

								}
							})

				</script>';

			}

		}

	}

	/*==============================================
			ELIMINAR MARCA
	==============================================*/

	static public function ctrEliminarMarca(){

		if(isset($_GET["idMarca"])){

			$tabla ="categoriasmarca";

			$datos = $_GET["idMarca"];

			$respuesta = ModeloControlMuestras::mdlEliminarMarca($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';

			}

		}

	}

	/*==============================================
			ELIMINAR SUBCATEGORIA
	==============================================*/

	static public function ctrEliminarSubcategoria(){

		if(isset($_GET["idSubMarca"])){

			$tabla ="subcategoriamarca";

			$datos = $_GET["idSubMarca"];

			$respuesta = ModeloControlMuestras::mdlEliminarSubcategoria($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';

			}

		}

	}

	/*==============================================
			ELIMINAR SUBCATEGORIA
	==============================================*/

	static public function ctrEliminarSubcategoriaDesglose(){

		if(isset($_GET["idDesglose"])){

			$tabla ="subcategoriadesglose";

			$datos = $_GET["idDesglose"];

			$respuesta = ModeloControlMuestras::mdlEliminarSubcategoriaDesglose($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';

			}

		}

	}

	/*==============================================
			ELIMINAR SUBCATEGORIA SUBDESGLOSE
	==============================================*/

	static public function ctrEliminarSubDesglose(){

		if(isset($_GET["idSub"])){

			$tabla ="subcategoriasubdesglose";

			$datos = $_GET["idSub"];

			$respuesta = ModeloControlMuestras::mdlEliminarSubDesglose($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategoriasProducto";

								}
							})

				</script>';

			}

		}

	}

	/*==============================================
			ELIMINAR CLIENTE
	==============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="user";

			$datos = $_GET["idCliente"];

			$respuesta = ModeloControlMuestras::mdlEliminarCliente($tabla, $datos);


			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "Ha sido borrado",
					  showConfirmButton: true,
					  confirmButtonText: "Aceptar"
					  }).then(function(result){
								if (result.value) {

								window.location = "carteraClientes";

								}
							})

				</script>';

			}

		}

	}

}


?>