	/*=============================================
	EGRESOS SUBGRUPOS FEBRERO
	=============================================*/
	static public function mdlAcreedoresBancariosF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Acreedores Bancarios' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAcreedoresBancariosM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Acreedores Bancarios' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAcreedoresBancariosA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Acreedores Bancarios' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	/***************************************************/
	static public function mdlPrestamosBancarios($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prestamos Bancarios' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrestamosBancariosF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prestamos Bancarios' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrestamosBancariosM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prestamos Bancarios' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrestamosBancariosA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prestamos Bancarios' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIVAAcreditable($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'I.V.A Acreditable' and mes = 'ENERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIVAAcreditableF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'I.V.A Acreditable' and mes = 'FEBRERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIVAAcreditableM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'I.V.A Acreditable' and mes = 'MARZO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIVAAcreditableA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'I.V.A Acreditable' and mes = 'ABRIL'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Computo-Accesorio)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Computo-Accesorio)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Computo-Accesorio)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Computo-Accesorio)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Transporte)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Transporte)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Transporte)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Equipo Transporte)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Maquinaria y Equipo)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Maquinaria y Equipo)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Maquinaria y Equipo)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Maquinaria y Equipo)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos4($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Mobiliario y Equipo Oficina)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos4F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Mobiliario y Equipo Oficina)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos4M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Mobiliario y Equipo Oficina)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAdquisiciondeActivos4A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '02. Adquisición de Activos (Mobiliario y Equipo Oficina)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Desperdicio Industrial' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Desperdicio Industrial' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Desperdicio Industrial' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Desperdicio Industrial' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Fletes y Acarreos' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Fletes y Acarreos' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Fletes y Acarreos' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Fletes y Acarreos' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Honorarios Personas Fisicas' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones4($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Fisica' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones4F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Fisica' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones4M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Fisica' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones4A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Fisica' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones5($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Moral' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones5F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Moral' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones5M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Moral' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosConRetenciones5A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '03. Gastos Operativos con Retenciones  Renta Local Persona Moral' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Administ y Servicio Personal' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Administ y Servicio Personal' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Administ y Servicio Personal' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Administ y Servicio Personal' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Atencion Clientes-Proveedores' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Atencion Clientes-Proveedores' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Atencion Clientes-Proveedores' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Atencion Clientes-Proveedores' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Capacitacion al Personal' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Capacitacion al Personal' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Capacitacion al Personal' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Capacitacion al Personal' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados4($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Casetas Autopistas' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados4F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Casetas Autopistas' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados4M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Casetas Autopistas' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados4A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Casetas Autopistas' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados5($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Cerrajeria' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados5F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Cerrajeria' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados5M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Cerrajeria' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados5A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Cerrajeria' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados6($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Combustibles y Lubricantes' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados6F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Combustibles y Lubricantes' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados6M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Combustibles y Lubricantes' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados6A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Combustibles y Lubricantes' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados7($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Convenciones' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados7F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Convenciones' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados7M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Convenciones' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados7A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Convenciones' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados8($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Demostracion de Productos' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados8F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Demostracion de Productos' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados8M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Demostracion de Productos' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados8A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Demostracion de Productos' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados9($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Energia Electrica' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados9F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Energia Electrica' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados9M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Energia Electrica' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados9A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Energia Electrica' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados10($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados10F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados10M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados10A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Equipos y Accesorios Uso Almacen' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados11($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Farmaceuticas Laboral' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados11F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Farmaceuticas Laboral' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados11M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Farmaceuticas Laboral' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados11A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Farmaceuticas Laboral' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados12($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Ferreteria y Herramientas' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados12F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Ferreteria y Herramientas' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados12M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Ferreteria y Herramientas' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados12A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Ferreteria y Herramientas' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados13($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados13F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados13M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados13A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gastos Diversos (CON IVA)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados14($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados14F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados14M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados14A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Gestoria Recuperacion Cartera' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados15($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Limpieza y Accesorios' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados15F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Limpieza y Accesorios' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados15M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Limpieza y Accesorios' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados15A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Limpieza y Accesorios' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados16($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Computo' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados16F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Computo' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados16M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Computo' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados16A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Computo' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados17($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Instalacion Electrica' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados17F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Instalacion Electrica' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados17M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Instalacion Electrica' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados17A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Instalacion Electrica' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados18($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Local y Mejoras' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados18F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Local y Mejoras' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados18M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Local y Mejoras' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados18A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Local y Mejoras' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados19($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados19F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados19M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados19A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Maquinaria y Equipos' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados20($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados20F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados20M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados20A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Mobiliario y Equipo Oficina' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados21($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Transporte' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados21F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Transporte' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados21M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Transporte' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados21A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mantto Transporte' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados22($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio Electrico' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados22F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio Electrico' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados22M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio Electrico' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados22A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio Electrico' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados23($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio para Computo' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados23F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio para Computo' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados23M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio para Computo' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados23A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Material y Accesorio para Computo' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados24($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mercadotecnia' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados24F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mercadotecnia' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados24M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mercadotecnia' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados24A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Mercadotecnia' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados25($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Papeleria y Articulos Oficina' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados25F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Papeleria y Articulos Oficina' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados25M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Papeleria y Articulos Oficina' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados25A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Papeleria y Articulos Oficina' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados26($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Propaganda y Publicidad' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados26F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Propaganda y Publicidad' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados26M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Propaganda y Publicidad' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados26A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Propaganda y Publicidad' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados27($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Reclutamiento Personal' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados27F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Reclutamiento Personal' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados27M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Reclutamiento Personal' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados27A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Reclutamiento Personal' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados28($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Renta Auto-Carga' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados28F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Renta Auto-Carga' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados28M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Renta Auto-Carga' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados28A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Renta Auto-Carga' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados29($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguridad Industrial y Salud' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados29F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguridad Industrial y Salud' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados29M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguridad Industrial y Salud' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados29A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguridad Industrial y Salud' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados30($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguros y Fianza' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados30F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguros y Fianza' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados30M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguros y Fianza' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados30A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Seguros y Fianza' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados31($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Sistema Software/Datos' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados31F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Sistema Software/Datos' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados31M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Sistema Software/Datos' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados31A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Sistema Software/Datos' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados32($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Telefonia' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados32F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Telefonia' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados32M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Telefonia' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados32A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Telefonia' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados33($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Uniformes' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados33F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Uniformes' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados33M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Uniformes' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados33A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Uniformes' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados34($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados34F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados34M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados34A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Viaticos (Cosumo-Hospedaje-Pasaje-Vias)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados35($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Vigilancia y Seguridad' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados35F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Vigilancia y Seguridad' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados35M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Vigilancia y Seguridad' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosGravados35A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '04. Gastos Operativos Gravados  Vigilancia y Seguridad' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Agua' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Agua' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Agua' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Agua' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Control y Verificacion Vehicular' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Control y Verificacion Vehicular' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Control y Verificacion Vehicular' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Control y Verificacion Vehicular' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativosExentos3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '05. Gastos Operativos Exentos  Gastos Diversos (SIN IVA)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Cuotas SIEM Empresarial' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Cuotas SIEM Empresarial' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Cuotas SIEM Empresarial' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Cuotas SIEM Empresarial' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Servicios Limpia' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Servicios Limpia' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Servicios Limpia' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Servicios Limpia' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto Vehicular Tenencia/Control' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales4($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto y Derechos' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales4F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto y Derechos' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales4M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto y Derechos' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosImpuestosLocales4A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '06. Gastos Impuestos Locales  Impuesto y Derechos' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones Bancarias' and mes = 'ENERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones Bancarias' and mes = 'FEBRERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones Bancarias' and mes = 'MARZO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones Bancarias' and mes = 'ABRIL'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones NO Bancarias' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones NO Bancarias' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones NO Bancarias' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Comisiones NO Bancarias' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros3($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Intereses a Cargo Bancarios' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros3F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Intereses a Cargo Bancarios' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros3M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Intereses a Cargo Bancarios' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosFinancieros3A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '07. Gastos Financieros  Intereses a Cargo Bancarios' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos1($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  Multas' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos1F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  Multas' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos1M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  Multas' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos1A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  Multas' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos2($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos2F($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos2M($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlGastosOperativos2A($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = '99. Gastos Operativos NO Deducibles  SIN Requisitos Fiscales' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSueldosySalarios($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Sueldos y Salarios' and mes = 'ENERO' and departamento != 'MGA' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSueldosySalariosF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Sueldos y Salarios' and mes = 'FEBRERO' and departamento != 'MGA' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSueldosySalariosM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Sueldos y Salarios' and mes = 'MARZO' and departamento != 'MGA' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSueldosySalariosA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Sueldos y Salarios' and mes = 'ABRIL' and departamento != 'MGA' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSAT($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SAT' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSATF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SAT' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSATM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SAT' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSATA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SAT' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSUA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SUA' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSUAF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SUA' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSUAM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SUA' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlImpuestosFederalesSUAA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Impuestos Federales SUA' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAguinaldo($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Aguinaldo' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAguinaldoF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Aguinaldo' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAguinaldoM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Aguinaldo' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlAguinaldoA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Aguinaldo' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlDespensa($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Despensa' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlDespensaF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Despensa' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlDespensaM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Despensa' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlDespensaA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Despensa' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlVacaciones($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Vacaciones' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlVacacionesF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Vacaciones' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlVacacionesM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Vacaciones' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlVacacionesA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Vacaciones' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaVacacional($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Vacacional' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaVacacionalF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Vacacional' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaVacacionalM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Vacacional' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaVacacionalA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Vacacional' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaAntiguedad($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Antigüedad' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaAntiguedadF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Antigüedad' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaAntiguedadM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Antigüedad' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPrimaAntiguedadA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Prima Antigüedad' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeptimoDia($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Septimo Día' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeptimoDiaF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Septimo Día' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeptimoDiaM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Septimo Día' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeptimoDiaA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Septimo Día' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeparacion($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Separacion' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeparacionF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Separacion' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeparacionM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Separacion' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSeparacionA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Separacion' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIndemnizacion($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Indemnizacion' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIndemnizacionF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Indemnizacion' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIndemnizacionM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Indemnizacion' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlIndemnizacionA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Indemnizacion' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSubsidioEmpleo($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Subsidio Empleo (SP)' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSubsidioEmpleoF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Subsidio Empleo (SP)' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSubsidioEmpleoM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Subsidio Empleo (SP)' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlSubsidioEmpleoA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'Subsidio Empleo (SP)' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPTU($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'PTU' and mes = 'ENERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPTUF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'PTU' and mes = 'FEBRERO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPTUM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'PTU' and mes = 'MARZO' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlPTUA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE subgrupo = 'PTU' and mes = 'ABRIL' and departamento != 'MGA'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlMGA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE departamento = 'MGA' and mes = 'ENERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlMGAF($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE departamento = 'MGA' and mes = 'FEBRERO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlMGAM($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE departamento = 'MGA' and mes = 'MARZO'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	static public function mdlMGAA($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
			
		}else {

			$stmt =  Conexion::conectar()->prepare("SELECT (SUM(abono)-SUM(cargo)) as egresos FROM $tabla WHERE departamento = 'MGA' and mes = 'ABRIL'");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
	}
	/*=============================================
	EGRESOS SUBGRUPOS **********************************************************************************************************************************
	=============================================*/