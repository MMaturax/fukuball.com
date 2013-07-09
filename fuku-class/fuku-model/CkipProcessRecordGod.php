<?php
/**
 * CkipProcessRecordGod.php is ckip_process_record god class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fuku-model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * CkipProcessRecordGod is ckip_process_record god class
 *
 * An example of a CkipProcessRecordGod is:
 *
 * <code>
 *   $ckip_process_record_god_obj = new CkipProcessRecordGod();
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fuku-model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class CkipProcessRecordGod extends ActiveRecordGod
{

   /**
    * Method getList
    *
    * @return pdo_list $query_result
    */
   public function getList($options=array()) {

      $defaults = array();

      $options = array_merge($defaults, $options);

      $sql = "SELECT id ".
               "FROM ckip_process_record ".
               "ORDER BY id DESC ".
               "LIMIT 100";

      $param = array();

      $query_list = $this->db_obj->selectCommandPrepare($sql, $param);

      return $query_list;

   }// end function getList

}
?>