<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "controlmatriz");//Configurar los datos de conexion
$columns = array('id','departamento', 'grupo', 'subgrupo', 'mes', 'fecha','descripcion', 'cargo', 'abono', 'saldo', 'comprobacion','diferencia','parcial','serie','folio','numeroMovimiento','acreedor','concepto','numeroDocumento','importe','iva','retIva', 'retIsr','retIva2','retIsr2','retIva3','retIsr3');
 
$query = "SELECT * FROM banco0198 WHERE ";
 
if($_POST["is_date_search"] == "yes")
{
 $query .= 'fecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}
 
if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR departamento LIKE "%'.$_POST["search"]["value"].'%"
  OR grupo LIKE "%'.$_POST["search"]["value"].'%"
  OR subgrupo LIKE "%'.$_POST["search"]["value"].'%"
  OR mes LIKE "%'.$_POST["search"]["value"].'%"
  OR fecha LIKE "%'.$_POST["search"]["value"].'%"
  OR descripcion LIKE "%'.$_POST["search"]["value"].'%"
  OR cargo LIKE "%'.$_POST["search"]["value"].'%" 
  OR abono LIKE "%'.$_POST["search"]["value"].'%" 
  OR saldo LIKE "%'.$_POST["search"]["value"].'%"
  OR comprobacion LIKE "%'.$_POST["search"]["value"].'%"
  OR parcial LIKE "%'.$_POST["search"]["value"].'%"
  OR serie LIKE "%'.$_POST["search"]["value"].'%"
  OR folio LIKE "%'.$_POST["search"]["value"].'%"
  OR numeroMovimiento LIKE "%'.$_POST["search"]["value"].'%"
  OR acreedor LIKE "%'.$_POST["search"]["value"].'%"
  OR concepto LIKE "%'.$_POST["search"]["value"].'%"
  OR numeroDocumento LIKE "%'.$_POST["search"]["value"].'%"
  OR importe LIKE "%'.$_POST["search"]["value"].'%")';
}
 
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
 
$query1 = '';
 
if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
 
$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
 
$result = mysqli_query($connect, $query . $query1);
 
$data = array();
 
while($row = mysqli_fetch_array($result))
{
						/*=============================================
			  			VALIDAR PARCIALES
			  			=============================================*/

						if ($row["parciales"] == 0) {

                           $verParcial = "Sin Parciales";
                            
                          }else{

                           $verParcial = "<button class='btn btn-info btnVerParciales' idPar='".$row["id"]."' data-toggle='modal' data-target='#modalVerParciales'>Ver</button>";

                          }

                     	/*=============================================
			  			VALIDAR IVA 
			  			=============================================*/

                           if ($row["tieneIva"] == "Si" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0) {
                            
                             $importe = '$ '.number_format(($row["importe"]/1.16),2).'';

                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 0) {

                            //echo '$ '.number_format(($row2["importeParciales"]/1.16),2).'';
                            $importe = '$ 0.00';
                            
                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 01) {

                           $importe = '$ 0.00';
                          
                          }else if ($row["tieneIva"] == "Si" && $row["tieneRetenciones"] == 01) {
                            $importe = '$ '.number_format(($row["importeRetenciones"]/1.16),2).'';
                          }
                          else if($row["tieneIva"] == "No" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0){ 

                               $importe = '$ '.number_format($row["importe"],2).'';

                          }else if($row["tieneIva"] == "No" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 0){

                              $importe = '$ 0.00';

                          }else if ($row["tieneIva"] == "No" && $row["tieneRetenciones"] == 01) {
                             $importe ='$ '.number_format($row["importeRetenciones"],2).'';
                          }
                          

                          if ($row["tieneIva"] == "Si" && $row["parciales"] == 0 && $row["tieneRetenciones"] == 0 ) {

                            $iva = '$'.number_format($row["iva"],2).'';

                          }else if ($row["tieneIva"] == "Si" && $row["parciales"] > 0 && $row["tieneRetenciones"] == 01) {

                           $iva = '$ 0.00';
                            
                          }else if ($row["tieneIva"] == "Si" && $row["tieneRetenciones"] == 01) {
                            $iva = '$'.number_format(($row["importeRetenciones"]/1.16)*0.16,2).'';
                          }
                          else{

                           $iva = '$ 0.00';

                          }

                          	/*=============================================
				  			VALIDAR RETENCIONES
				  			=============================================*/

                          /***************************************************/
                          if ($row["tieneRetenciones"] == 1 || $row["tieneRetenciones"] == 01 ) {

                            if ($row["tipoRetencion"] == "Arrendamiento" && $row["tieneRetenciones"] == 0) {

                              $retIva =  '$ '.number_format($row["retIva"],2).'';
                              $retIsr = '$ '.number_format($row["retIsr"],2).'';

                            }else if ($row["tipoRetencion"] == "Arrendamiento" && $row["tieneRetenciones"] == 01) {
                              $retIva = '$ '.number_format(($row["importeRetenciones"]* 10.6667)/100,2).'';
                              $retIsr = '$ '.number_format(($row["importeRetenciones"]*10)/100,2).'';
                            }
                            else {

                              $retIva = '$ 0.00';
                              $retIsr = '$ 0.00';

                            }if ($row["tipoRetencion"] == "Flete" && $row["tieneRetenciones"] == 0) {

                              $retIva2 = '$ '.number_format($row["retIva2"],2).'';
                              $retIsr2 = '$ '.number_format($row["retIsr2"],2).'';

                            }else if ($row["tipoRetencion"] == "Flete" && $row["tieneRetenciones"] == 01) {
                                
                              $retIva2 = '$ '.number_format(($row["importeRetenciones"]*4)/100,2).'';
                              $retIsr2 = '$ '.number_format(($row["importeRetenciones"]*0)/100,2).'';

                            }
                            else {

                              $retIva2 = '$ 0.00';
                              $retIsr2 = '$ 0.00';

                            }if ($row["tipoRetencion"] == "Honorarios" && $row["tieneRetenciones"] == 0) {
                            
                              $retIva3 = '$ '.number_format($row["retIva3"],2).'';
                              $retIsr3 = '$ '.number_format($row["retIsr3"],2).'';

	                          }else if($row["tipoRetencion"] == "Honorarios" && $row["tieneRetenciones"] == 01){

	                          $retIva3 = '$ '.number_format(($row["importeRetenciones"]*10)/100,2).'';
	                          $retIsr3 = '$ '.number_format(($row["importeRetenciones"]*10)/100,2).'';

	                          }
	                          else{

	                          $retIva3 = '$ 0.00';
	                          $retIsr3 = '$ 0.00';

	                          }
	      
	                          }else {

	                           $retIva = '$ 0.00';
	                           $retIsr = '$ 0.00';
	                           $retIva2 = '$ 0.00';
	                           $retIsr2 = '$ 0.00';
	                           $retIva3 = '$ 0.00';
	                           $retIsr3 = '$ 0.00';

	                          }

								/*=============================================
					  			VALIDAR ACCIONES DE BOTONES EDITAR
					  			=============================================*/
					  			if ($_SESSION["perfil"] == "Administrador General" || $_SESSION["perfil"] == "Bancos") {

                          			$acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$row["id"]."' data-toggle='modal' data-target='#modalEditarDatos'><i class='fa fa-pencil'></i>Editar</button>"; 
                       

				                      }else{

				                    $acciones = "<button class='btn btn-warning btnEditarDatos' idBanco='".$row["id"]."' data-toggle='modal' data-target='#modalEditarDatos' disabled><i class='fa fa-pencil'></i>Editar</button>";
				                      }    

			
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["departamento"];
 $sub_array[] = $row["grupo"];
 $sub_array[] = $row["subgrupo"];
 $sub_array[] = $row["mes"];
 $sub_array[] = $row["fecha"];
 $sub_array[] = $row["descripcion"];
 $sub_array[] = number_format($row["cargo"],2);
 $sub_array[] = number_format($row["abono"],2);
 $sub_array[] = number_format($row["saldo"],2);
 $sub_array[] = number_format($row["comprobacion"],2);
 $sub_array[] = number_format($row["diferencia"],2);
 $sub_array[] = $verParcial;
 $sub_array[] = $row["serie"];
 $sub_array[] = $row["folio"];
 $sub_array[] = $row["numeroMovimiento"];
 $sub_array[] = $row["acreedor"];
 $sub_array[] = $row["concepto"];
 $sub_array[] = $row["numeroDocumento"];
 $sub_array[] = $importe;
 $sub_array[] = $iva;
 $sub_array[] = $retIva;
 $sub_array[] = $retIsr;
 $sub_array[] = $retIva2;
 $sub_array[] = $retIsr2;
 $sub_array[] = $retIva3;
 $sub_array[] = $retIsr3;
 $sub_array[] = $acciones;

 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM banco0198";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}
 
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);
 
echo json_encode($output);
 
?>