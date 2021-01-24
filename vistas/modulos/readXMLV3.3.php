<?php
$xml = simplexml_load_file("gastos/xml/SGM-5555.xml");
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);
 
 
//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA 
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
      echo $cfdiComprobante['Version']; 
      echo "<br />"; 
      echo $cfdiComprobante['Fecha']; 
      echo "<br />"; 
      echo $cfdiComprobante['Sello']; 
      echo "<br />"; 
      echo $cfdiComprobante['Total']; 
      echo "<br />"; 
      echo $cfdiComprobante['SubTotal']; 
      echo "<br />"; 
      echo $cfdiComprobante['Certificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['FormaDePago']; 
      echo "<br />"; 
      echo $cfdiComprobante['NoCertificado']; 
      echo "<br />"; 
      echo $cfdiComprobante['TipoDeComprobante']; 
      echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
   echo $Emisor['Rfc']; 
   echo "<br />"; 
   echo $Emisor['Nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
   echo $DomicilioFiscal['Pais']; 
   echo "<br />"; 
   echo $DomicilioFiscal['Calle']; 
   echo "<br />"; 
   echo $DomicilioFiscal['Estado']; 
   echo "<br />"; 
   echo $DomicilioFiscal['Colonia']; 
   echo "<br />"; 
   echo $DomicilioFiscal['Municipio']; 
   echo "<br />"; 
   echo $DomicilioFiscal['NoExterior']; 
   echo "<br />"; 
   echo $DomicilioFiscal['CodigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
   echo $ExpedidoEn['Pais']; 
   echo "<br />"; 
   echo $ExpedidoEn['Calle']; 
   echo "<br />"; 
   echo $ExpedidoEn['Estado']; 
   echo "<br />"; 
   echo $ExpedidoEn['Colonia']; 
   echo "<br />"; 
   echo $ExpedidoEn['NoExterior']; 
   echo "<br />"; 
   echo $ExpedidoEn['CodigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
   echo $Receptor['Rfc']; 
   echo "<br />"; 
   echo $Receptor['Nombre']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
   echo $ReceptorDomicilio['Pais']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['Calle']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['Estado']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['Colonia']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['Municipio']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['NoExterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['NoInterior']; 
   echo "<br />"; 
   echo $ReceptorDomicilio['CodigoPostal']; 
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
   echo "<br />"; 
   echo $Concepto['Unidad']; 
   echo "<br />"; 
   echo $Concepto['Importe']; 
   echo "<br />"; 
   echo $Concepto['Cantidad']; 
   echo "<br />"; 
   echo $Concepto['Descripcion']; 
   echo "<br />"; 
   echo $Concepto['ValorUnitario']; 
   echo "<br />";   
   echo "<br />"; 
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
   echo $Traslado['Tasa']; 
   echo "<br />"; 
   echo $Traslado['Importe']; 
   echo "<br />"; 
   echo $Traslado['Impuesto']; 
   echo "<br />";   
   echo "<br />"; 
} 
 
//ESTA ULTIMA PARTE ES LA QUE GENERABA EL ERROR
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   echo $tfd['SelloCFD']; 
   echo "<br />"; 
   echo $tfd['FechaTimbrado']; 
   echo "<br />"; 
   echo $tfd['UUID']; 
   echo "<br />"; 
   echo $tfd['NoCertificadoSAT']; 
   echo "<br />"; 
   echo $tfd['Version']; 
   echo "<br />"; 
   echo $tfd['SelloSAT']; 
} 
?>