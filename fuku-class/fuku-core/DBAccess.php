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
   protected $current_mode;
   protected $db_name;
   protected $db_connection;

   protected $s_db_host;
   protected $s_db_name;
   protected $s_db_user;
   protected $s_db_password;
   protected $s_db_connection;

   protected $m_db_host;
   protected $m_db_name;
   protected $m_db_user;
   protected $m_db_password;
   protected $m_db_connection;


   /**
    * Method __construct initialize instance
    *
    * @return void
    */
   private function __construct()
   {

      include SITE_ROOT."/fuku-config/private-param/db-param.php";

      // connect master
      $this->m_db_host       = $database['master']['db_host'];
      $this->m_db_name       = $database['master']['db_name'];
      $this->m_db_user       = $database['master']['db_user'];
      $this->m_db_password   = $database['master']['db_password'];

      try {

         $this->m_db_connection
             = new PDO(
                 'mysql:host=' . $this->m_db_host . ';dbname=' . $this->m_db_name,
                 $this->m_db_user,
                 $this->m_db_password
             );

         $this->m_db_connection->query("SET time_zone='+8:00'");
         $this->m_db_connection->query("SET NAMES UTF8");

      } catch (PDOException $e) {

         echo "<h2>".get_class($this)."</h2>";
         var_dump($e->getMessage());
         exit;

      } // end try


      // connect slave
      if (!empty($slave_database)) {

         $slave_db_choose = $slave_database[array_rand($slave_database)];

         $this->s_db_host       = $database[$slave_db_choose]['db_host'];
         $this->s_db_name       = $database[$slave_db_choose]['db_name'];
         $this->s_db_user       = $database[$slave_db_choose]['db_user'];
         $this->s_db_password   = $database[$slave_db_choose]['db_password'];

      } else {

         $this->s_db_host       = $this->m_db_host;
         $this->s_db_name       = $this->m_db_name;
         $this->s_db_user       = $this->m_db_user;
         $this->s_db_password   = $this->m_db_password;

      }

      try {

         $this->s_db_connection
             = new PDO(
                 'mysql:host=' . $this->s_db_host . ';dbname=' . $this->s_db_name,
                 $this->s_db_user,
                 $this->s_db_password
             );

         $this->s_db_connection->query("SET time_zone='+8:00'");
         $this->s_db_connection->query("SET NAMES UTF8");

      } catch (PDOException $e) {

         echo "<h2>".get_class($this)."</h2>";
         var_dump($e->getMessage());
         exit;

      } // end try

      // default use slave
      $this->current_mode  = 'slave';
      $this->db_name       = $this->s_db_name;
      $this->db_connection = $this->s_db_connection;

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
   public static function changeMode($options=array())
   {

      $defaults = array('mode'=>'slave');

      $options = array_merge($defaults, $options);

      switch ($options['mode']) {
      case 'master':
         $this->current_mode  = 'master';
         $this->db_name       = $this->m_db_name;
         $this->db_connection = $this->m_db_connection;
         break;
      default:
      case 'slave':
         $this->current_mode  = 'slave';
         $this->db_name       = $this->s_db_name;
         $this->db_connection = $this->s_db_connection;
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
      $this::changeMode($options);

      $query_result = $this->db_connection->query($insert_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $insert_id = $this->db_connection->lastInsertId();

      $options = array('mode'=>'slave');
      $this::changeMode($options);

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
      $this::changeMode($options);

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
      $this::changeMode($options);

      return $insert_id;

   }// end function insertCommand

   /**
    * Method selectCommand to execute select sql command
    *
    * @param string $select_sql # the sql statement
    * @param string $mode       # the connection mode
    *
    * @return pdostat $query_result
    */
   public function selectCommand($select_sql, $mode='slave')
   {

      if ($mode=='master') {
         $options = array('mode'=>'master');
         $this::changeMode($options);
      } else {
         $options = array('mode'=>'slave');
         $this::changeMode($options);
      }

      $query_result = $this->db_connection->query($select_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this::changeMode($options);

      return $query_result;

   }// end function selectCommand

   /**
    * Method selectCommandPrepare to execute select sql command
    *
    * @param string $select_sql # the sql statement
    * @param array  $param      # the param
    * @param string $mode       # the connection mode
    *
    * @return pdostat $query_result
    */
   public function selectCommandPrepare($select_sql, $param, $mode='slave')
   {

      if ($mode=='master') {
         $options = array('mode'=>'master');
         $this::changeMode($options);
      } else {
         $options = array('mode'=>'slave');
         $this::changeMode($options);
      }

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
      $this::changeMode($options);

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
      $this::changeMode($options);

      $query_result = $this->db_connection->query($update_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this::changeMode($options);

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
      $this::changeMode($options);

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
      $this::changeMode($options);

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
      $this::changeMode($options);

      $query_result = $this->db_connection->query($delete_sql);

      if (!$query_result) {
         echo "<h2>".get_class($this)."</h2>";
         //echo "<p>".$select_sql."</p>";
         var_dump($this->db_connection->errorInfo());
         exit;
      }

      $options = array('mode'=>'slave');
      $this::changeMode($options);

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
      $this::changeMode($options);

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
      $this::changeMode($options);

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