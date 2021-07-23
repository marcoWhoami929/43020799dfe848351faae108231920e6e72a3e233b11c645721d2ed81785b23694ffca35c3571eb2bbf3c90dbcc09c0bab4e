<?php
/* Database connection start */
include_once("db_connect.php");


if (isset($_POST['import_data'])) {


    // validate to check uploaded file is a valid csv file
    $file_mimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel'
    );
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
            //fgetcsv($csv_file);
            // get data records from csv file
            while (($emp_record = fgetcsv($csv_file, 1000, ",")) !== FALSE) {

                $sql_query = "SELECT id, fecha, descripcion, cargo, abono, saldo FROM banco7338 WHERE iden = '" . $emp_record[8] . "'";
                $resultset = mysqli_query($conn, $sql_query) or die("database error:" . mysqli_error($conn));

                if (mysqli_num_rows($resultset)) {

                    foreach ($resultset as $key => $value) {


                        $busquedaFecha = $value['fecha'];
                        setlocale(LC_TIME, 'es_MX.UTF-8');
                        $numero = substr($busquedaFecha, -7, 2);
                        $mes = strftime("%B", mktime(0, 0, 0, $numero, 1, 2000));


                        $sql_update = "UPDATE banco7338 set mes = '" . strtoupper($mes) . "', fecha='" . $emp_record[0] . "', descripcion='" . $emp_record[3] . "', cargo='" . str_replace(',', '', $emp_record[4]) . "', abono='" . str_replace(',', '', $emp_record[5]) . "', saldo = '" . str_replace(',', '', $emp_record[6]) . "' WHERE iden='" . $emp_record[8] . "'";
                        mysqli_query($conn, $sql_update) or die("database error:" . mysqli_error($conn));
                    }
                } else {

                        if ($emp_record[4] == "") {
                            $cargo = 0;
                        }else{
                            $cargo = (str_replace(',','',$emp_record[4]));
                        }

                        if ($emp_record[5] == "") {
                            $abono = 0;
                        }else{
                            $abono = (str_replace(',','',$emp_record[5]));
                        }
                        
                    $importe = $cargo + $abono;

                    $iva = ($importe/1.16) * 0.16;
                    $retIva = (($importe * 10.6667)/100);
                    $retIsr = (($importe * 10)/100);
                    $retIva2 = (($importe * 4)/100);
                    $retIsr2 = (($importe * 0)/100);
                    $retIva3 = (($importe * 10.6667)/100);
                    $retIsr3 = (($importe * 10)/100);
                    $consulta = mysqli_query($conn, 'SELECT MAX(numeroMovimiento) as numeroMovimiento FROM banco7338 LIMIT 1');
                    $consulta = mysqli_fetch_array($consulta, MYSQLI_ASSOC);

                    // Si el codigo actual esta vacio o es 0, se convierte en 1.
                    // En caso contrario se le suma +1.
                    //$codigo = (empty($consulta['numeroMovimiento']) ? 1 : $consulta['numeroMovimiento'] += 1);
                    $codigo = $emp_record[1];

                    setlocale(LC_TIME, 'es_MX.UTF-8');
                    $busquedaFecha = $emp_record[0];
                   
                    $numero = substr($busquedaFecha, -7, 2);
                 
                    $mes = strftime("%B", mktime(0, 0, 0, $numero, 1, 2000));
                    $mesFinal = strtoupper($mes);
                   
                    $mysql_insert = "INSERT INTO banco7338 (mes,fecha,descripcion,cargo,abono,saldo,ultimoSaldo,iden,tieneIva, tieneRetenciones, numeroMovimiento,importe,iva,retIva,retIsr,retIva2,retIsr2,retIva3,retIsr3)VALUES('" . $mesFinal . "','" . $emp_record[0] . "','" . $emp_record[3] . "','" . str_replace(',', '', $emp_record[4]) . "','" . str_replace(',', '', $emp_record[5]) . "','" . str_replace(',', '', $emp_record[6]) . "','" . str_replace(',', '', $emp_record[7]) . "','" . $emp_record[8] . "','No',0,'" . $codigo . "','".$importe."','".$iva."','".$retIva."','".$retIsr."','".$retIva2."','".$retIsr2."','".$retIva3."','".$retIsr3."')";


                    mysqli_query($conn, $mysql_insert) or die("database error:" . mysqli_error($conn));
                }
            }
            fclose($csv_file);
            $import_status = '?import_status=success';
        } else {
            $import_status = '?import_status=error';
        }
    } else {
        $import_status = '?import_status=invalid_file';
    }
}
header("Location: banco7338" . $import_status);
