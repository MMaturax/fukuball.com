<?php
/**
 * CkipProcessRecord.php is ckip_process_record model class
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
 * CkipProcessRecord is ckip_process_record model class
 *
 * An example of a CkipProcessRecord is:
 *
 * <code>
 *   $ckip_process_record_obj = new CkipProcessRecord($instance_key);
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fuku-model/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class CkipProcessRecord extends ActiveRecord
{

   // extends from ActiveRecord
   //
   // protected $db_obj;
   // protected $memcache_obj;
   // protected $use_cache;
   // protected $table_name;
   // protected $id;
   // protected $is_deleted;
   // protected $create_time;
   // protected $modify_time;
   // protected $delete_time;
   // protected $modify_unix_time;
   public $paragraph;
   public $paragraph_result;

}
?>