<?php
/**
 * ActiveRecordGod.php is model god class
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
 * ActiveRecordGod is model god class
 *
 * An example of a ActiveRecordGod is:
 *
 * <code>
 *   # this class can't be use directly
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fuku-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
abstract class ActiveRecordGod
{

   protected $db_obj;
   protected $table_name;

   /**
    * Method __construct initialize god instance
    *
    * @return void
    */
   public function __construct()
   {

      // set database connection
      $this->setDBAccess();
      // find this class's table name
      $temp_table_name = str_replace("God", "", get_class($this));

      $this->table_name
          = strtolower(
               preg_replace('/([^\s])([A-Z])/', '\1_\2', $temp_table_name)
          );

   }// end function __construct

   /**
    * Method setDBAccess set the database connection
    *
    * @param string $type # the database type
    *
    * @return void
    */
   public function setDBAccess($type='normal')
   {

      switch ($type) {

      case 'normal':

         $this->db_obj = DBAccess::getInstance();

         break;

      default:

         $this->db_obj = DBAccess::getInstance();

         break;

      }// end switch($type)

   }// end function setDBAccess

   /**
    * Method getDBAccess get the database connection
    *
    * @return db_obj
    */
   public function getDBAccess()
   {

      return $this->db_obj;

   }// end function getDBAccess

   /**
    * Method getMaxId get the max id of this table
    *
    * @return void
    */
   public function getMaxId()
   {

      $select_sql = 'SELECT MAX(id) max_id FROM '.$this->table_name;
      $param = array();
      $query_max_id = $this->db_obj->selectCommandPrepare($select_sql, $param);

      foreach ($query_max_id as $query_max_id_data) {

         $max_id = $query_max_id_data['max_id'];

      }

      return $max_id;

   }// end function getMaxId

   /**
    * Static method deleteListCache to delete all list cache
    *
    * @return void
    */
   public static function deleteListCache()
   {

   }// end function deleteListCache

   /**
    * Method create create one record in database
    *
    * @param array $parameter # the key value array of the instance
    *
    * @return int $id
    */
   public function create($parameter)
   {

      $now = date('Y-m-d H:i:s');
      $sql = 'INSERT INTO '.$this->table_name.' ';
      $key_sql = '(';
      $value_sql = '(';
      $param = array();

      foreach ($parameter as $property_key => $property_value) {

         switch ($property_key) {

         case 'id':
            break;

         case 'create_time':
            break;

         case 'modify_time':
            break;

         default:

            if (!is_null($property_value)) {
               $key_sql = $key_sql.$property_key.', ';
               $value_sql = $value_sql.':'.$property_key.', ';
               $param[':'.$property_key] = $property_value;
            }

            break;

         }// end switch($property_key)

      }// end foreach

      $key_sql = $key_sql.'create_time, modify_time)';
      $value_sql = $value_sql.':create_time, :modify_time)';
      $param[':create_time'] = $now;
      $param[':modify_time'] = $now;
      $sql = $sql.$key_sql.' VALUES '.$value_sql;

      $result = $this->db_obj->insertCommandPrepare($sql, $param);

      return $result;

   }// end function create

   /**
    * Method createWithTime create one record in database
    *
    * @param array $parameter # the key value array of the instance
    *
    * @return int $id
    */
   public function createWithTime($parameter)
   {

      $now = date('Y-m-d H:i:s');
      $sql = 'INSERT INTO '.$this->table_name.' ';
      $key_sql = '(';
      $value_sql = '(';
      $param = array();

      foreach ($parameter as $property_key => $property_value) {

         switch ($property_key) {

         case 'id':
            break;

         default:

            if (!is_null($property_value)) {
               $key_sql = $key_sql.$property_key.', ';
               $value_sql = $value_sql.':'.$property_key.', ';
               $param[':'.$property_key] = $property_value;
            }

            break;

         }// end switch($property_key)

      }// end foreach

      $key_sql = $key_sql.' modify_time)';
      $value_sql = $value_sql.' :modify_time)';
      $param[':modify_time'] = $parameter['create_time'];
      $sql = $sql.$key_sql.' VALUES '.$value_sql;

      $result = $this->db_obj->insertCommandPrepare($sql, $param);

      return $result;

   }// end function createWithTime

   /**
    * Method __destruct unset commercialgod instance value
    *
    * @return void
    */
   public function __destruct()
   {

      $class_property_array = get_object_vars($this);

      foreach ($class_property_array as $property_key => $property_value) {

         switch ($property_key) {

         case 'db_obj':
            break;

         default:

            unset($this->$property_key);

            break;

         }// end switch($property_key)

      }// end foreach

   }// end function __destruct

}
?>