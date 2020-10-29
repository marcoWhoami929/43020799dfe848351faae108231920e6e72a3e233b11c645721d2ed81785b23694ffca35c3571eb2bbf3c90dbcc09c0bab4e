<?php 
  
  if (isset($_GET['funcion']) && !empty($_GET['funcion'])) {

    $funcion = $_GET['funcion'];

    switch ($funcion) {
      case 'respaldo0198':
                      /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco0198'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco0198'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco0198-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco0198') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();

                    
        break;
        case 'respaldo6278':
           /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco6278'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco6278'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco6278-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco6278') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();
          break;
          case 'respaldo3450':
                  /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco3450'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco3450'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco3450-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco3450') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();
            
            break;
            case 'respaldoCaja':
               /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Caja'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'caja'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'caja-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'caja') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();
              break;
              case 'respaldo1286':
                      /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco1286'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco1286'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco1286-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco1286') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();

                    
        break;
        case 'respaldo1219':
                      /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco1219'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco1219'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco1219-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco1219') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();

                    
            break;
            case 'respaldo0840':
                      /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco0840'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco0840'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco0840-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco0840') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();

                    
            break;
            case 'respaldo1340':
                      /**
                       * Define database parameters here
                       */
                      define("DB_USER", 'mat');
                      define("DB_PASSWORD", 'matriz');
                      define("DB_NAME", 'matriz');
                      define("DB_HOST", 'localhost');
                      define("BACKUP_DIR", 'Respaldo-Banco1340'); // Comment this line to use same script's directory ('.')
                      define("TABLES", 'banco1340'); // Full backup
                      //define("TABLES", 'table1, table2, table3'); // Partial backup
                      define("CHARSET", 'utf8');
                      define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
                      define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                                                  // Also number of rows per INSERT statement in backup file

                      /**
                       * The Backup_Database class
                       */
                      class Backup_Database {
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
                           * Backup directory where backup files are stored 
                           */
                          var $backupDir;

                          /**
                           * Output backup file
                           */
                          var $backupFile;

                          /**
                           * Use gzip compression on backup file
                           */
                          var $gzipBackupFile;

                          /**
                           * Content of standard output
                           */
                          var $output;

                          /**
                           * Batch size, number of rows to process per iteration
                           */
                          var $batchSize;

                          /**
                           * Constructor initializes database
                           */
                          public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
                              $this->host            = $host;
                              $this->username        = $username;
                              $this->passwd          = $passwd;
                              $this->dbName          = $dbName;
                              $this->charset         = $charset;
                              $this->conn            = $this->initializeDatabase();
                              $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
                              $this->backupFile      = 'banco1340-'.date("Ymd_His", time()).'.sql';
                              $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
                              $this->batchSize       = defined('BATCH_SIZE') ? BATCH_SIZE : 1000; // default 1000 rows
                              $this->output          = '';
                          }

                          protected function initializeDatabase() {
                              try {
                                  $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                  if (mysqli_connect_errno()) {
                                      throw new Exception('ERROR conexion con base de datos: ' . mysqli_connect_error());
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
                          public function backupTables($tables = 'banco1340') {
                              try {
                                  /**
                                  * Tables to export
                                  */
                                  if($tables == '*') {
                                      $tables = array();
                                      $result = mysqli_query($this->conn, 'SHOW TABLES');
                                      while($row = mysqli_fetch_row($result)) {
                                          $tables[] = $row[0];
                                      }
                                  } else {
                                      $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
                                  }

                                  $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
                                  $sql .= 'USE `'.$this->dbName."`;\n\n";

                                  /**
                                  * Iterate tables
                                  */
                                  foreach($tables as $table) {
                                      $this->obfPrint("Copia de seguridad `".$table."` tabla...".str_repeat('.', 50-strlen($table)), 0, 0);

                                      /**
                                       * CREATE TABLE
                                       */
                                      $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                                      $sql .= "\n\n".$row[1].";\n\n";

                                      /**
                                       * INSERT INTO
                                       */

                                      $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                                      $numRows = $row[0];

                                      // Split table in batches in order to not exhaust system memory 
                                      $numBatches = intval($numRows / $this->batchSize) + 1; // Number of while-loop calls to perform

                                      for ($b = 1; $b <= $numBatches; $b++) {
                                          
                                          $query = 'SELECT * FROM `' . $table . '` LIMIT ' . ($b * $this->batchSize - $this->batchSize) . ',' . $this->batchSize;
                                          $result = mysqli_query($this->conn, $query);
                                          $realBatchSize = mysqli_num_rows ($result); // Last batch size can be different from $this->batchSize
                                          $numFields = mysqli_num_fields($result);

                                          if ($realBatchSize !== 0) {
                                              $sql .= 'INSERT INTO `'.$table.'` VALUES ';

                                              for ($i = 0; $i < $numFields; $i++) {
                                                  $rowCount = 1;
                                                  while($row = mysqli_fetch_row($result)) {
                                                      $sql.='(';
                                                      for($j=0; $j<$numFields; $j++) {
                                                          if (isset($row[$j])) {
                                                              $row[$j] = addslashes($row[$j]);
                                                              $row[$j] = str_replace("\n","\\n",$row[$j]);
                                                              $sql .= '"'.$row[$j].'"' ;
                                                          } else {
                                                              $sql.= 'NULL';
                                                          }
                          
                                                          if ($j < ($numFields-1)) {
                                                              $sql .= ',';
                                                          }
                                                      }
                          
                                                      if ($rowCount == $realBatchSize) {
                                                          $rowCount = 0;
                                                          $sql.= ");\n"; //close the insert statement
                                                      } else {
                                                          $sql.= "),\n"; //close the row
                                                      }
                          
                                                      $rowCount++;
                                                  }
                                              }
                          
                                              $this->saveFile($sql);
                                              $sql = '';
                                          }
                                      }

                                      /**
                                       * CREATE TRIGGER
                                       */

                                      // Check if there are some TRIGGERS associated to the table
                                      /*$query = "SHOW TRIGGERS LIKE '" . $table . "%'";
                                      $result = mysqli_query ($this->conn, $query);
                                      if ($result) {
                                          $triggers = array();
                                          while ($trigger = mysqli_fetch_row ($result)) {
                                              $triggers[] = $trigger[0];
                                          }
                                          
                                          // Iterate through triggers of the table
                                          foreach ( $triggers as $trigger ) {
                                              $query= 'SHOW CREATE TRIGGER `' . $trigger . '`';
                                              $result = mysqli_fetch_array (mysqli_query ($this->conn, $query));
                                              $sql.= "\nDROP TRIGGER IF EXISTS `" . $trigger . "`;\n";
                                              $sql.= "DELIMITER $$\n" . $result[2] . "$$\n\nDELIMITER ;\n";
                                          }

                                          $sql.= "\n";

                                          $this->saveFile($sql);
                                          $sql = '';
                                      }*/
                       
                                      $sql.="\n\n\n";

                                      $this->obfPrint('Tabla respaldada');
                                  }

                                  if ($this->gzipBackupFile) {
                                      $this->gzipBackupFile();
                                  } else {
                                      $this->obfPrint('Archivo de respaldo guardado correctamente: ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
                                  }
                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /**
                           * Save SQL to file
                           * @param string $sql
                           */
                          protected function saveFile(&$sql) {
                              if (!$sql) return false;

                              try {

                                  if (!file_exists($this->backupDir)) {
                                      mkdir($this->backupDir, 0777, true);
                                  }

                                  file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

                              } catch (Exception $e) {
                                  print_r($e->getMessage());
                                  return false;
                              }

                              return true;
                          }

                          /*
                           * Gzip backup file
                           *
                           * @param integer $level GZIP compression level (default: 9)
                           * @return string New filename (with .gz appended) if success, or false if operation fails
                           */
                          protected function gzipBackupFile($level = 9) {
                              if (!$this->gzipBackupFile) {
                                  return true;
                              }

                              $source = $this->backupDir . '/' . $this->backupFile;
                              $dest =  $source . '.gz';

                              $this->obfPrint('Compresion de respaldo en -> ' . $dest . '... ', 1, 0);

                              $mode = 'wb' . $level;
                              if ($fpOut = gzopen($dest, $mode)) {
                                  if ($fpIn = fopen($source,'rb')) {
                                      while (!feof($fpIn)) {
                                          gzwrite($fpOut, fread($fpIn, 1024 * 256));
                                      }
                                      fclose($fpIn);
                                  } else {
                                      return false;
                                  }
                                  gzclose($fpOut);
                                  if(!unlink($source)) {
                                      return false;
                                  }
                              } else {
                                  return false;
                              }
                              
                              $this->obfPrint('Archivo generado exitosamente');
                              return $dest;
                          }

                          /**
                           * Prints message forcing output buffer flush
                           *
                           */
                          public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
                              if (!$msg) {
                                  return false;
                              }

                              if ($msg != 'Respaldado' and $msg != 'No respaldado') {
                                  $msg = date("Y-m-d H:i:s") . ' - ' . $msg;
                              }
                              $output = '';

                              if (php_sapi_name() != "cli") {
                                  $lineBreak = "\n";
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


                              // Save output for later use
                              $this->output .= str_replace('', '\n', $output);

                              echo $output;


                              if (php_sapi_name() != "cli") {
                                  ob_flush();
                              }

                              $this->output .= " ";

                              flush();
                          }

                          /**
                           * Returns full execution output
                           *
                           */
                          public function getOutput() {
                              return $this->output;
                          }
                      }

                      /**
                       * Instantiate Backup_Database and perform backup
                       */

                      // Report all errors
                      error_reporting(E_ALL);
                      // Set script max execution time
                      set_time_limit(900); // 15 minutes

                      $backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
                      $result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'Respaldo exitoso' : 'No respaldado';
                      $backupDatabase->obfPrint('Resultado de respaldo: ' . $result, 1);

                      // Use $output variable for further processing, for example to send it by email
                      $output = $backupDatabase->getOutput();

                    
        break;
            default:
              // code...
              break;
    }
    
  }




 ?>