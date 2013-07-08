<?php
/**
 * DBAccess.php is database class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fuku-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * DBAccess is database class
 *
 * An example of a DBAccess is:
 *
 * <code>
 *   $db_obj = DBAccess::getInstance();
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fuku-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class DBAccess
{

   protected static $db_obj;
   protected static $instance_count = 0;
   public    $current_mode;
   protected $db_name;
   protected $db_connection;

   protected $db_name_poll;
   protected $db_connection_poll;

   /**
    * Method __construct initialize instance
    *
    * @return void
    */
   private function __construct()
   {

      include SITE_ROOT."/fuku-config/private-param/db-param.php";

      $this->db_name_poll = array();
      $this->db_connection_poll = array();

      if (!empty($slave_database_name)) {

         $this->connectSlave();

      } else {

         $this->connectMaster();

      }

      self::$instance_count++;

   }// end function __construct

   /**
    * Method init to initial db connection
    *
    * @return void
    */
   public static function init()
   {

      if (!self::$db_obj || !isset(self::$db_obj) || empty(self::$db_obj)) {

         self::$db_obj = new DBAccess();

      }

   }// end function init

   /**
    * Method connectMaster
    *
    * @return void
    */
   public function connectMaster()
   {

      include SITE_ROOT."/fuku-config/private-param/db-param.php";

      // connect master
      $m_db_host       = $database_server['master']['db_host'];
      $m_db_name       = $database_server['master']['db_name'];
      $m_db_user       = $database_server['master']['db_user'];
      $m_db_password   = $database_server['master']['db_password'];

      try {

         $this->db_connection_poll['master']
             = new PDO(
                 'mysql:host=' . $m_db_host . ';dbname=' . $m_db_name,
                 $m_db_user,
                 $m_db_password
             );

         $this->db_name_poll['master'] = $m_db_name;
         $this->db_connection_poll['master']->query("SET time_zone='+8:00'");
         $this->db_connection_poll['master']->query("SET NAMES UTF8");

         // switch to master
         $this->current_mode  = 'master';
         $this->db_name       = $this->db_name_poll['master'];
         $this->db_connection = $this->db_connection_poll['master'];

      } catch (PDOException $e) {

         echo "<h2>".get_class($this)."</h2>";
         var_dump($e->getMessage());
         exit;

      } // end try

   }// end function connectMaster

   /**
    * Method connectSlave
    *
    * @return void
    */
   public function connectSlave()
   {

      include SITE_ROOT."/fuku-config/private-param/db-param.php";

      if (!empty($slave_database_name)) {

         // connect slave
         $slave_db_choose = $slave_database_name[array_rand($slave_database_name)];

         $s_db_host       = $database_server[$slave_db_choose]['db_host'];
         $s_db_name       = $database_server[$slave_db_choose]['db_name'];
         $s_db_user       = $database_server[$slave_db_choose]['db_user'];
         $s_db_password   = $database_server[$slave_db_choose]['db_password'];

         try {

            $this->db_connection_poll['slave']
                = new PDO(
                    'mysql:host=' . $s_db_host . ';dbname=' . $s_db_name,
                    $s_db_user,
                    $s_db_password
                );

            $this->db_name_poll['slave'] = $s_db_name;
            $this->db_connection_poll['slave']->query("SET time_zone='+8:00'");
            $this->db_connection_poll['slave']->query("SET NAMES UTF8");

            // switch to slave
            $this->current_mode  = 'slave';
            $this->db_name       = $this->db_name_poll['slave'];
            $this->db_connection = $this->db_connection_poll['slave'];

         } catch (PDOException $e) {

            echo "<h2>".get_class($this)."</h2>";
            var_dump($e->getMessage());
            exit;

         } // end try

      } else {

         $this->connectMaster();

      }

   }// end function connectSlave

   /**
    * Method getInstance to get db_obj
    *
    * @return object $db_obj
    */
   public static function getInstance()
   {

      return self::$db_obj;

   }// end function getInstance

   /**
    * Method changeMode to change connection mode
    *
    * $options['mode']
    *
    * @return void
    */
   public function changeMode($options=array())
   {

      include SITE_ROOT."/fuku-config/private-param/db-param.php";

      $defaults = array('mode'=>'slave');

      $options = array_merge($defaults, $options);

      switch ($options['mode']) {

      case 'master':

         if (  !$this->db_connection_poll['master']
            || !isset($this->db_connection_poll['master'])
            || empty($this->db_connection_poll['master'])
         ) {

            $this->connectMaster();

         } else {

            // switch to master
            $this->current_mode  = 'master';
            $this->db_name       = $this->db_name_poll['master'];
            $this->db_connection = $this->db_connection_poll['master'];

         }

         break;

      default:
      case 'slave':

         if (  !$this->db_connection_poll['slave']
            || !isset($this->db_connection_poll['slave'])
            || empty($this->db_connection_poll['slave'])
         ) {

            $this->connectSlave();

         } else {

            // switch to master
            $this->current_mode  = 'slave';
            $this->db_name       = $this->db_name_poll['slave'];
            $this->db_connection = $this->db_connection_poll['slave'];

         }

         break;

      }

   }// end function changeMode

   /**
    * Method getProcesslist to get process list
    *
    * @return array $process_list
    */
   public function getProcesslist()
   {

      $sql = "SHOW FULL PROCESSLIST";

      $list_array = array();

      foreach ($this->db_connection->query($sql) as $row) {

         $process_id = $row["Id"];

         if ($row["Time"] > 200 ) {

            $sql = "KILL $process_id";
            $this->db_connection->query($sql);

         } else {

            array_push($list_array, $row);

         }

      }

      return $list_array;

   }// end function getProcesslist

   /**
    * Method getTablelist to get table list
    *
    * @return array $table_list
    */
   public function getTablelist()
   {

      $sql = "SHOW TABLES FROM ".$this->db_name;

      $list_array = array();

      foreach ($this->db_connection->query($sql) as $row) {

         array_push($list_array, $row['Tables_in_'.$this->db_name]);

      }

      return $list_array;

   }// end function getTablelist

   /**
    * Method killProcess to kill process
    *
    * @param int $process_id # the process id
    *
    * @return boolean $success
    */
   public function killProcess($process_id)
   {

      $sql = "KILL $process_id";

      $this->query_result = $this->db_connection->query($sql);

      if (!$this->query_result) {

         echo "<h2>".get_class($this)."</h2>";
         var_dump($this->db_connection->errorInfo());
         return false;

         exit;

      } else {

         return true;

      }

   }// end function killProcess

   /**
    * Method getResultArray to get result array
    *
    * @param pdostat $query_result # the pdo result
    *
    * @return array $query_result
    */
   public function getResultArray($query_result)
   {

      return $query_result->fetchAll();

   }// end function getResultArray

   /**
    * Method insertCommand to execute insert sql command
    *
    * @param string $insert_sql # the sql statement
    *
    * @return int $insert_id
    */
   public function insertCommand($insert_sql)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      $query_result = $this->db_connection->query($insert_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $insert_id = $this->db_connection->lastInsertId();

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $insert_id;

   }// end function insertCommand

   /**
    * Method insertCommandPrepare to execute insert sql command
    *
    * @param string $insert_sql # the sql statement
    * @param array  $param      # the param
    *
    * @return int $insert_id
    */
   public function insertCommandPrepare($insert_sql, $param)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      if (SYSTEM_MODE=='test') {
         $this->db_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      }
      $this->db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $statement = $this->db_connection->prepare($insert_sql);
      $query_result = $statement->execute($param);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         echo "<p>".$insert_sql."</p>";
         print_r($param);
         print_r($this->db_connection->errorInfo());
         exit;
      }

      $insert_id = $this->db_connection->lastInsertId();

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $insert_id;

   }// end function insertCommand

   /**
    * Method selectCommand to execute select sql command
    *
    * @param string $select_sql # the sql statement
    *
    * @return pdostat $query_result
    */
   public function selectCommand($select_sql)
   {

      $query_result = $this->db_connection->query($select_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $query_result;

   }// end function selectCommand

   /**
    * Method selectCommandPrepare to execute select sql command
    *
    * @param string $select_sql # the sql statement
    * @param array  $param      # the param
    *
    * @return pdostat $query_result
    */
   public function selectCommandPrepare($select_sql, $param)
   {

      if (SYSTEM_MODE=='test') {
         $this->db_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      }
      $this->db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $statement = $this->db_connection->prepare($select_sql);
      $query_result = $statement->execute($param);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $fetch_query_result = $statement->fetchAll();

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $fetch_query_result;

   }// end function selectCommandPrepare

   /**
    * Method updateCommand to execute update sql command
    *
    * @param string $update_sql # the sql statement
    *
    * @return int $affected_rows
    */
   public function updateCommand($update_sql)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      $query_result = $this->db_connection->query($update_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $query_result->rowCount();

   }// end function updateCommand

   /**
    * Method updateCommandPrepare to execute update sql command
    *
    * @param string $update_sql # the sql statement
    * @param array  $param      # the param
    *
    * @return int $affected_rows
    */
   public function updateCommandPrepare($update_sql, $param)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      if (SYSTEM_MODE=='test') {
         $this->db_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      }
      $this->db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $statement = $this->db_connection->prepare($update_sql);
      $query_result = $statement->execute($param);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $statement->rowCount();

   }// end function updateCommandPrepare

   /**
    * Method deleteCommand to execute delete sql command
    *
    * @param string $delete_sql # the sql statement
    *
    * @return int $affected_rows
    */
   public function deleteCommand($delete_sql)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      $query_result = $this->db_connection->query($delete_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $query_result->rowCount();

   }// end function deleteCommand

   /**
    * Method deleteCommandPrepare to execute delete sql command
    *
    * @param string $delete_sql # the sql statement
    * @param array  $param      # the param
    *
    * @return int $affected_rows
    */
   public function deleteCommandPrepare($delete_sql, $param)
   {

      $options = array('mode'=>'master');
      $this->changeMode($options);

      if (SYSTEM_MODE=='test') {
         $this->db_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
      }
      $this->db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $statement = $this->db_connection->prepare($delete_sql);
      $query_result = $statement->execute($param);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this->changeMode($options);

      return $statement->rowCount();

   }// end function deleteCommandPrepare

   /**
    * Method __destruct unset instance value
    *
    * @return void
    */
   public function __destruct()
   {

   }// end function __destruct

}

// initial db connection
DBAccess::init();
?>