<?php
session_start();
include '../modelos/conexion.php';
class BancosData extends Conexion
{
    private $_db;
    public function __construct()
    {
        $this->_db = $this->conectar();
    }
    public function obtenerBanco($table, $index_column, $columns)
    {
        // Paging
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
        }

        // Ordering
        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sortDir = (strcasecmp($_GET['sSortDir_' . $i], 'ASC') == 0) ? 'ASC' : 'DESC';
                    $sOrder .= "`" . $columns[intval($_GET['iSortCol_' . $i])] . "` " . $sortDir . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($columns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "`" . $columns[$i] . "` LIKE :search OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        // Individual column filtering
        for ($i = 0; $i < count($columns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "`" . $columns[$i] . "` LIKE :search" . $i . " ";
            }
        }
        if (isset($_GET['filtro1']) && $_GET['filtro1'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            $sWhere .= "departamento LIKE '%" . $_GET['filtro1'] . "%' ";
        }
        if (isset($_GET['fechaInicio'])) {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }

            if ($_GET['fechaInicio'] === '' && $_GET['fechaFinal'] === "") {

                $fecha1 = date('Y-m-d', strtotime("- 5 month"));
                $fInicio = str_replace('-', '/', $fecha1);
                $fechaInicio = date('d/m/Y', strtotime($fInicio));

                $fecha2 = date('Y-m-d', strtotime("- 0 days"));
                $fFin = str_replace('-', '/', $fecha2);
                $fechaFinal = date('d/m/Y', strtotime($fFin));
            } else {


                $fInicio = str_replace('-', '/', $_GET["fechaInicio"]);
                $fechaInicio = date('d/m/Y', strtotime($fInicio));

                $fFin = str_replace('-', '/', $_GET["fechaFinal"]);
                $fechaFinal = date('d/m/Y', strtotime($fFin));
            }

            $sWhere .= "STR_TO_DATE(fecha,'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $fechaInicio . "','%d/%m/%Y') AND STR_TO_DATE('" . $fechaFinal . "','%d/%m/%Y') ";
        }
        if (isset($_GET['filtro2']) && $_GET['filtro2'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            switch ($_GET['filtro2']) {
                case 'CARGOS':
                    $sWhere .= "cargo != 0";
                    break;
                case 'ABONOS':
                    $sWhere .= "abono != 0";
                    break;
            }
        }
        if (isset($_GET['filtro3']) && $_GET['filtro3'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            $sWhere .= "grupo = 'INGRESOS' and subgrupo = 'CLIENTES' and (importe-importeParciales) > 0 and STR_TO_DATE(fecha,'%d/%m/%Y') > STR_TO_DATE('01/01/2021','%d/%m/%Y') ";
        }
        // SQL queries get data to display
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS `" . str_replace(" , ", " ", implode("`, `", $columns)) . "` FROM `" . $table . "` " . $sWhere . " " . $sOrder . " " . $sLimit;
        $statement = $this->_db->prepare($sQuery);

        // Bind parameters
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $statement->bindValue(':search', '%' . $_GET['sSearch'] . '%', PDO::PARAM_STR);
        }
        for ($i = 0; $i < count($columns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                $statement->bindValue(':search' . $i, '%' . $_GET['sSearch_' . $i] . '%', PDO::PARAM_STR);
            }
        }

        $statement->execute();
        $rResult = $statement->fetchAll();

        $iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());

        // Get total number of rows in table
        $sQuery = "SELECT COUNT(`" . $index_column . "`) FROM `" . $table . "`";
        $iTotal = current($this->_db->query($sQuery)->fetch());

        // Output
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        // Return array of values
        foreach ($rResult as $aRow) {
            $row = array();
            /*=============================================
			VALIDAR PARCIALES
			=============================================*/

            if ($aRow["parciales"] == 0) {

                $verParcial = "Sin Parciales";
            } else {

                $verParcial = "<button class='btn btn-info btnVerParciales' idPar='" . $aRow["id"] . "' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";
            }

            /*=============================================
            VALIDAR IVA 
             =============================================*/

            if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ ' . number_format(($aRow["importe"] / 1.16), 2) . '';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 0) {

                //echo '$ '.number_format(($aRow2["importeParciales"]/1.16),2).'';
                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 01) {

                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["tieneRetenciones"] == 01) {
                $importe = '$ ' . number_format(($aRow["importeRetenciones"]), 2) . '';
            } else if ($aRow["tieneIva"] == "No" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ ' . number_format($aRow["importe"], 2) . '';
            } else if ($aRow["tieneIva"] == "No" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "No" && $aRow["tieneRetenciones"] == 01) {
                $importe = '$ ' . number_format($aRow["importeRetenciones"], 2) . '';
            }


            if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $iva = '$' . number_format($aRow["iva"], 2) . '';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 01) {

                $iva = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["tieneRetenciones"] == 01) {
                $iva = '$' . number_format(($aRow["importeRetenciones"]) * 0.16, 2) . '';
            } else {

                $iva = '$ 0.00';
            }

            /*=============================================
            VALIDAR RETENCIONES
           =============================================*/

            /***************************************************/
            if ($aRow["tieneRetenciones"] == 1 || $aRow["tieneRetenciones"] == 01) {

                if ($aRow["tipoRetencion"] == "Arrendamiento" && $aRow["tieneRetenciones"] == 0) {

                    $retIva =  '$ ' . number_format($aRow["retIva"], 2) . '';
                    $retIsr = '$ ' . number_format($aRow["retIsr"], 2) . '';
                } else if ($aRow["tipoRetencion"] == "Arrendamiento" && $aRow["tieneRetenciones"] == 01) {
                    $retIva = '$ ' . number_format(($aRow["importeRetenciones"] * 10.6667) / 100, 2) . '';
                    $retIsr = '$ ' . number_format(($aRow["importeRetenciones"] * 10) / 100, 2) . '';
                } else {

                    $retIva = '$ 0.00';
                    $retIsr = '$ 0.00';
                }
                if ($aRow["tipoRetencion"] == "Flete" && $aRow["tieneRetenciones"] == 0) {

                    $retIva2 = '$ ' . number_format($aRow["retIva2"], 2) . '';
                    $retIsr2 = '$ ' . number_format($aRow["retIsr2"], 2) . '';
                } else if ($aRow["tipoRetencion"] == "Flete" && $aRow["tieneRetenciones"] == 01) {

                    $retIva2 = '$ ' . number_format(($aRow["importeRetenciones"] * 4) / 100, 2) . '';
                    $retIsr2 = '$ ' . number_format(($aRow["importeRetenciones"] * 0) / 100, 2) . '';
                } else {

                    $retIva2 = '$ 0.00';
                    $retIsr2 = '$ 0.00';
                }
                if ($aRow["tipoRetencion"] == "Honorarios" && $aRow["tieneRetenciones"] == 0) {

                    $retIva3 = '$ ' . number_format($aRow["retIva3"], 2) . '';
                    $retIsr3 = '$ ' . number_format($aRow["retIsr3"], 2) . '';
                } else if ($aRow["tipoRetencion"] == "Honorarios" && $aRow["tieneRetenciones"] == 01) {

                    $retIva3 = '$ ' . number_format(($aRow["importeRetenciones"] * 10.6667) / 100, 2) . '';
                    $retIsr3 = '$ ' . number_format(($aRow["importeRetenciones"] * 10) / 100, 2) . '';
                } else {

                    $retIva3 = '$ 0.00';
                    $retIsr3 = '$ 0.00';
                }
            } else {

                $retIva = '$ 0.00';
                $retIsr = '$ 0.00';
                $retIva2 = '$ 0.00';
                $retIsr2 = '$ 0.00';
                $retIva3 = '$ 0.00';
                $retIsr3 = '$ 0.00';
            }
            $diferencia = $aRow["importe"] - $aRow["importeParciales"];
            if ($diferencia > 0 and $diferencia < 1) {
                $class = 'btn-warning';
            } else if ($diferencia > 1) {
                $class = 'btn-danger';
            } else {
                $class = 'btn-info';
            }


            $totalDiferencia = '<button class="btn ' . $class . '">$' . number_format($diferencia, 2) . '</button>';
            /*=============================================
             VALIDAR ACCIONES DE BOTONES EDITAR
            =============================================*/
            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza") {

                $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='" . $aRow["id"] . "' abono = '" . $aRow["abono"] . "' fechaAbono = '" . $aRow["fecha"] . "' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>";
            } else {

                $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='" . $aRow["id"] . "' abono = '" . $aRow["abono"] . "' fechaAbono = '" . $aRow["fecha"] . "' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
            }


            $row = [$aRow["id"], $aRow["departamento"], $aRow["grupo"], $aRow["subgrupo"], $aRow["mes"], $aRow["fecha"], $aRow["descripcion"], number_format($aRow["cargo"], 2), number_format($aRow["abono"], 2), number_format($aRow["saldo"], 2), number_format($aRow["comprobacion"], 2), number_format($aRow["diferencia"], 2), $verParcial, $aRow["serie"], $aRow["folio"], $aRow["numeroMovimiento"], $aRow["acreedor"], $aRow["concepto"], $aRow["numeroDocumento"], $importe, $iva, $retIva, $retIsr, $retIva2, $retIsr2, $retIva3, $retIsr3, $acciones, $totalDiferencia];

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
    public function obtenerBancoCredito($table, $index_column, $columns)
    {
        // Paging
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
        }

        // Ordering
        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sortDir = (strcasecmp($_GET['sSortDir_' . $i], 'ASC') == 0) ? 'ASC' : 'DESC';
                    $sOrder .= "`" . $columns[intval($_GET['iSortCol_' . $i])] . "` " . $sortDir . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($columns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "`" . $columns[$i] . "` LIKE :search OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        // Individual column filtering
        for ($i = 0; $i < count($columns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "`" . $columns[$i] . "` LIKE :search" . $i . " ";
            }
        }
        if (isset($_GET['filtro1']) && $_GET['filtro1'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            $sWhere .= "departamento LIKE '%" . $_GET['filtro1'] . "%' ";
        }
        if (isset($_GET['fechaInicio'])) {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }

            if ($_GET['fechaInicio'] === '' && $_GET['fechaFinal'] === "") {

                $fecha1 = date('Y-m-d', strtotime("- 5 month"));
                $fInicio = str_replace('-', '/', $fecha1);
                $fechaInicio = date('d/m/Y', strtotime($fInicio));

                $fecha2 = date('Y-m-d', strtotime("- 0 days"));
                $fFin = str_replace('-', '/', $fecha2);
                $fechaFinal = date('d/m/Y', strtotime($fFin));
            } else {


                $fInicio = str_replace('-', '/', $_GET["fechaInicio"]);
                $fechaInicio = date('d/m/Y', strtotime($fInicio));

                $fFin = str_replace('-', '/', $_GET["fechaFinal"]);
                $fechaFinal = date('d/m/Y', strtotime($fFin));
            }

            $sWhere .= "STR_TO_DATE(fecha,'%d/%m/%Y') BETWEEN STR_TO_DATE('" . $fechaInicio . "','%d/%m/%Y') AND STR_TO_DATE('" . $fechaFinal . "','%d/%m/%Y') ";
        }
        if (isset($_GET['filtro2']) && $_GET['filtro2'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            switch ($_GET['filtro2']) {
                case 'CARGOS':
                    $sWhere .= "cargo != 0";
                    break;
                case 'ABONOS':
                    $sWhere .= "abono != 0";
                    break;
            }
        }
        if (isset($_GET['filtro3']) && $_GET['filtro3'] != "") {
            if ($sWhere == "") {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            $sWhere .= "grupo = 'INGRESOS' and subgrupo = 'CLIENTES' and (importe-importeParciales) > 0 and STR_TO_DATE(fecha,'%d/%m/%Y') > STR_TO_DATE('01/01/2021','%d/%m/%Y') ";
        }
        // SQL queries get data to display
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS `" . str_replace(" , ", " ", implode("`, `", $columns)) . "` FROM `" . $table . "` " . $sWhere . " and abono > 0 " . $sOrder . " " . $sLimit;
        $statement = $this->_db->prepare($sQuery);

        // Bind parameters
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $statement->bindValue(':search', '%' . $_GET['sSearch'] . '%', PDO::PARAM_STR);
        }
        for ($i = 0; $i < count($columns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                $statement->bindValue(':search' . $i, '%' . $_GET['sSearch_' . $i] . '%', PDO::PARAM_STR);
            }
        }

        $statement->execute();
        $rResult = $statement->fetchAll();

        $iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());

        // Get total number of rows in table
        $sQuery = "SELECT COUNT(`" . $index_column . "`) FROM `" . $table . "`";
        $iTotal = current($this->_db->query($sQuery)->fetch());

        // Output
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        // Return array of values
        foreach ($rResult as $aRow) {
            $row = array();

            /*=============================================
			VALIDAR PARCIALES
			=============================================*/

            if ($aRow["parciales"] == 0) {

                $verParcial = "Sin Parciales";
            } else {

                $verParcial = "<button class='btn btn-info btnVerParciales' idPar='" . $aRow["id"] . "' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";
            }

            /*=============================================
             VALIDAR IVA 
             =============================================*/

            if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ ' . number_format(($aRow["importe"] / 1.16), 2) . '';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 0) {

                //echo '$ '.number_format(($banco0198[$i]2["importeParciales"]/1.16),2).'';
                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 01) {

                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["tieneRetenciones"] == 01) {
                $importe = '$ ' . number_format(($aRow["importeRetenciones"]), 2) . '';
            } else if ($aRow["tieneIva"] == "No" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ ' . number_format($aRow["importe"], 2) . '';
            } else if ($aRow["tieneIva"] == "No" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 0) {

                $importe = '$ 0.00';
            } else if ($aRow["tieneIva"] == "No" && $aRow["tieneRetenciones"] == 01) {
                $importe = '$ ' . number_format($aRow["importeRetenciones"], 2) . '';
            }


            if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] == 0 && $aRow["tieneRetenciones"] == 0) {

                $iva = '$' . number_format($aRow["iva"], 2) . '';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["parciales"] > 0 && $aRow["tieneRetenciones"] == 01) {

                $iva = '$ 0.00';
            } else if ($aRow["tieneIva"] == "Si" && $aRow["tieneRetenciones"] == 01) {
                $iva = '$' . number_format(($aRow["importeRetenciones"]) * 0.16, 2) . '';
            } else {

                $iva = '$ 0.00';
            }


            /*=============================================
            VALIDAR ACCIONES DE BOTONES EDITAR
             =============================================*/
            if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos" || $_SESSION["perfil"] == "Credito y Cobranza") {

                $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='" . $aRow["id"] . "'  abono = '" . $aRow["abono"] . "' fechaAbono = '" . $aRow["fecha"] . "' data-toggle='modal' data-target='#modalEditarDatos' id='editarBanco'><i class='fa fa-pencil'></i>Editar</button>";
            } else {

                $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='" . $aRow["id"] . "'  abono = '" . $aRow["abono"] . "' fechaAbono = '" . $aRow["fecha"] . "' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
            }

            $diferencia = $aRow["importe"] - $aRow["importeParciales"];
            if ($diferencia > 0 and $diferencia < 1) {
                $class = 'btn-warning';
            } else if ($diferencia > 1) {
                $class = 'btn-danger';
            } else {
                $class = 'btn-info';
            }

            $totalDiferencia = '<button class="btn ' . $class . '">$' . number_format($diferencia, 2) . '</button>';



            $row = [$aRow["id"], $aRow["departamento"], $aRow["grupo"], $aRow["subgrupo"], $aRow["mes"], $aRow["fecha"], $aRow["descripcion"], number_format($aRow["abono"], 2), $verParcial, $aRow["serie"], $aRow["folio"], $aRow["numeroMovimiento"], $aRow["acreedor"], $aRow["concepto"], $aRow["numeroDocumento"], $importe, $iva, $acciones, $totalDiferencia];

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
}
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
// Create instance of BancosData class
$table_data = new BancosData();
