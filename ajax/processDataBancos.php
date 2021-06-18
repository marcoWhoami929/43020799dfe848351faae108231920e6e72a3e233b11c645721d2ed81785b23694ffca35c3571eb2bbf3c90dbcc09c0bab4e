<?php
require 'dataBancos.php';
$action = (isset($_GET['action']) && $_GET['action'] != NULL) ? $_GET['action'] : '';

if ($action == 'banco') {

    $banco = $_GET["banco"];

    $table_data->obtenerBanco($banco, 'id', array('id', 'departamento', 'grupo', 'subgrupo', 'mes', 'fecha', 'descripcion', 'cargo', 'abono', 'saldo', 'ultimoSaldo', 'comprobacion', 'diferencia', 'parciales', 'serie', 'folio', 'numeroMovimiento', 'acreedor', 'concepto', 'numeroDocumento', 'importe', 'importeRetenciones', 'importeParciales', 'tieneIva', 'tieneRetenciones', 'tipoRetencion', 'iva', 'retIva', 'retIsr', 'retIva2', 'retIsr2', 'retIva3', 'retIsr3', 'iden'));
}
if ($action == 'bancoCredito') {

    $banco = $_GET["banco"];

    $table_data->obtenerBancoCredito($banco, 'id', array('id', 'departamento', 'grupo', 'subgrupo', 'mes', 'fecha', 'descripcion', 'cargo', 'abono', 'saldo', 'ultimoSaldo', 'comprobacion', 'diferencia', 'parciales', 'serie', 'folio', 'numeroMovimiento', 'acreedor', 'concepto', 'numeroDocumento', 'importe', 'importeRetenciones', 'importeParciales', 'tieneIva', 'tieneRetenciones', 'tipoRetencion', 'iva', 'retIva', 'retIsr', 'retIva2', 'retIsr2', 'retIva3', 'retIsr3', 'iden'));
}
