<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Restaurar Base de Datos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Gestor restauración</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

        </div>
        <div class="box-body">

            
            <?php 
             if (isset($_POST["direccion"])) {
                 /**
                 * Define database parameters here
                 */
                define("DB_USER", 'mat');
                define("DB_PASSWORD", 'matriz');
                define("DB_NAME", 'matriz');
                define("DB_HOST", 'localhost');
                define("BACKUP_DIR", 'Respaldos-matriz'); // Comment this line to use same script's directory ('.')
                define("BACKUP_FILE", $_POST["direccion"]); // Script will autodetect if backup file is gzipped based on .gz extension
                define("CHARSET", 'utf8');

                /**
                 * The Restore_Database class
                 */
                class Restore_Database {
                    /**
                     * Host where the database is located
                     */
                    var $host;

                    /**
                     * Username used to connect to database
                     */
                    var $username;

                    /**
                     * Password used to connect to database
                     */
                    var $passwd;

                    /**
                     * Database to backup
                     */
                    var $dbName;

                    /**
                     * Database charset
                     */
                    var $charset;

                    /**
                     * Database connection
                     */
                    var $conn;

                    /**
                     * Constructor initializes database
                     */
                    function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                        $this->host       = $host;
                        $this->username   = $username;
                        $this->passwd     = $passwd;
                        $this->dbName     = $dbName;
                        $this->charset    = $charset;
                        $this->conn       = $this->initializeDatabase();
                        $this->backupDir  = BACKUP_DIR ? BACKUP_DIR : '.';
                        $this->backupFile = BACKUP_FILE ? BACKUP_FILE : null;
                    }

                    protected function initializeDatabase() {
                        try {
                            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                            if (mysqli_connect_errno()) {
                                throw new Exception('ERROR conexión base de datos: ' . mysqli_connect_error());
                                die();
                            }
                            if (!mysqli_set_charset($conn, $this->charset)) {
                                mysqli_query($conn, 'SET NAMES '.$this->charset);
                            }
                        } catch (Exception $e) {
                            print_r($e->getMessage());
                            die();
                        }

                        return $conn;
                    }

                    /**
                     * Backup the whole database or just some tables
                     * Use '*' for whole database or 'table1 table2 table3...'
                     * @param string $tables
                     */
                    public function restoreDb() {
                        try {
                            $sql = '';
                            $multiLineComment = false;

                            $backupDir = $this->backupDir;
                            $backupFile = $this->backupFile;

                            /**
                             * Gunzip file if gzipped
                             */
                            $backupFileIsGzipped = substr($backupFile, -3, 3) == '.gz' ? true : false;
                            if ($backupFileIsGzipped) {
                                if (!$backupFile = $this->gunzipBackupFile()) {
                                    throw new Exception("ERROR: No se pudo rescomprimir el respaldo " . $backupDir . '/' . $backupFile);
                                }
                            }

                            /**
                            * Read backup file line by line
                            */
                            $handle = fopen($backupDir . '/' . $backupFile, "r");
                            if ($handle) {
                                while (($line = fgets($handle)) !== false) {
                                    $line = ltrim(rtrim($line));
                                    if (strlen($line) > 1) { // avoid blank lines
                                        $lineIsComment = false;
                                        if (preg_match('/^\/\*/', $line)) {
                                            $multiLineComment = true;
                                            $lineIsComment = true;
                                        }
                                        if ($multiLineComment or preg_match('/^\/\//', $line)) {
                                            $lineIsComment = true;
                                        }
                                        if (!$lineIsComment) {
                                            $sql .= $line;
                                            if (preg_match('/;$/', $line)) {
                                                // execute query
                                                if(mysqli_query($this->conn, $sql)) {
                                                    if (preg_match('/^CREATE TABLE `([^`]+)`/i', $sql, $tableName)) {
                                                        $this->obfPrint("Tabla creada exitosamente: `" . $tableName[1] . "`");
                                                    }
                                                    $sql = '';
                                                } else {
                                                    throw new Exception("ERROR: SQL ejecución de consulta: " . mysqli_error($this->conn));
                                                }
                                            }
                                        } else if (preg_match('/\*\/$/', $line)) {
                                            $multiLineComment = false;
                                        }
                                    }
                                }
                                fclose($handle);
                            } else {
                                throw new Exception("ERROR: No se pudo abrir el archivo " . $backupDir . '/' . $backupFile);
                            } 
                        } catch (Exception $e) {
                            print_r($e->getMessage());
                            return false;
                        }

                        if ($backupFileIsGzipped) {
                            unlink($backupDir . '/' . $backupFile);
                        }

                        return true;
                    }

                    /*
                     * Gunzip backup file
                     *
                     * @return string New filename (without .gz appended and without backup directory) if success, or false if operation fails
                     */
                    protected function gunzipBackupFile() {
                        // Raising this value may increase performance
                        $bufferSize = 4096; // read 4kb at a time
                        $error = false;

                        $source = $this->backupDir . '/' . $this->backupFile;
                        $dest = $this->backupDir . '/' . date("Ymd_His", time()) . '_' . substr($this->backupFile, 0, -3);

                        $this->obfPrint('Descomprimiendo respaldo ' . $source . '... ', 1, 1);

                        // Remove $dest file if exists
                        if (file_exists($dest)) {
                            if (!unlink($dest)) {
                                return false;
                            }
                        }
                        
                        // Open gzipped and destination files in binary mode
                        if (!$srcFile = gzopen($this->backupDir . '/' . $this->backupFile, 'rb')) {
                            return false;
                        }
                        if (!$dstFile = fopen($dest, 'wb')) {
                            return false;
                        }

                        while (!gzeof($srcFile)) {
                            // Read buffer-size bytes
                            // Both fwrite and gzread are binary-safe
                            if(!fwrite($dstFile, gzread($srcFile, $bufferSize))) {
                                return false;
                            }
                        }

                        fclose($dstFile);
                        gzclose($srcFile);

                        // Return backup filename excluding backup directory
                        return str_replace($this->backupDir . '/', '', $dest);
                    }

                    /**
                     * Prints message forcing output buffer flush
                     *
                     */
                    public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                        if (!$msg) {
                            return false;
                        }

                        $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                        $output = '';

                        if (php_sapi_name() != "cli") {
                            $lineBreak = "<br />";
                        } else {
                            $lineBreak = "\n";
                        }

                        if ($lineBreaksBefore > 0) {
                            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                                $output .= $lineBreak;
                            }                
                        }

                        $output .= $msg;

                        if ($lineBreaksAfter > 0) {
                            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                                $output .= $lineBreak;
                            }                
                        }

                        if (php_sapi_name() == "cli") {
                            $output .= "\n";
                        }

                        echo $output;

                        if (php_sapi_name() != "cli") {
                            ob_flush();
                        }

                        flush();
                    }
                }

                /**
                 * Instantiate Restore_Database and perform backup
                 */
                // Report all errors
                error_reporting(E_ALL);
                // Set script max execution time
                set_time_limit(900); // 15 minutes

                if (php_sapi_name() != "cli") {
                    echo '<div style="font-family: monospace;">';
                }

                $restoreDatabase = new Restore_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                $result = $restoreDatabase->restoreDb(BACKUP_DIR, BACKUP_FILE) ? 'Restauración exitosa' : 'No se puedo restaurar';
                $restoreDatabase->obfPrint("Resultado de restauración: ".$result, 1);

                if (php_sapi_name() != "cli") {
                    echo '</div>';
                }
             }
                
                ?>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-lg-12">
                <div class="row">
            <form action="restauracion.php" method="POST">
                <p style="font-weight: bold">Ingresar nombre del respaldo con extensión</p>
                <input type="text" name="direccion" id="direccion" class="form-control input-lg">
                <br>
                <button type="submit" class="btn btn-info">Enviar dirección</button>

            </form>
                </div>
               
            </div>
            
          <strong>Nota importante:</strong><p>Se recomienda realizar la resturación de la base de datos en caso de presentarse problemas de pérdidas de datos.</p>
          Cualquier duda sobre el manejo comunicarse con el administrador.
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->