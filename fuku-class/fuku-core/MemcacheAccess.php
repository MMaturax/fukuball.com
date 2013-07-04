<?php
/**
 * MemcacheAccess.php is memcach class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fuku-cole/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * MemcacheAccess is memcache class
 *
 * An example of a MemcacheAccess is:
 *
 * <code>
 *   $memcache_obj = MemcacheAccess::getInstance($key);
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fuku-cole/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class MemcacheAccess
{

   protected static $memcache_server;
   protected static $memcache_connection;
   protected static $instance_count = 0;

   /**
    * Method init to initial memcache connection
    *
    * @return void
    */
   public static function init()
   {

      include SITE_ROOT."/fuku-config/private-param/memcache-param.php";

      foreach ($memcache_server_name as $key => $this_memcache_server_name) {
         $this->memcache_server[$this_memcache_server_name] = '';
      }

      if (    !self::$host1_memcache_obj
           || !isset(self::$host1_memcache_obj)
           || empty(self::$host1_memcache_obj)
      ) {

         self::$host1_memcache_obj = new Memcache();
         self::$host1_memcache_obj->pconnect(MEMCACHE_HOST1, MEMCACHE_PORT);
         self::$instance_count++;

      }

      if (    !self::$host2_memcache_obj
           || !isset(self::$host2_memcache_obj)
           || empty(self::$host2_memcache_obj)
      ) {

         self::$host2_memcache_obj = new Memcache();
         self::$host2_memcache_obj->pconnect(MEMCACHE_HOST1, MEMCACHE_PORT);
         self::$instance_count++;

      }

   }// end function init

   /**
    * Method getInstance to get memcache_obj
    *
    * @param string $memcache_key # the memcache key
    *
    * @return object $memcache_obj
    */
   public static function getInstance($memcache_key)
   {

      $memcache_key_array = explode('_', $memcache_key);

      switch ($memcache_key_array[1]) {

    case 'usergod':
    case 'user':
    case 'commercialgod':
    case 'commercial':

      return self::$host1_memcache_obj;

      break;

    default :

      return self::$host2_memcache_obj;

      break;

    }// end switch

   }// end function getInstance

  /**
    * Method connectMemcache delete from memory cache
    *
    * @param string $host # the host key
    *
    * @return boolean $is_success
    */
  public static function connectMemcache($host)
  {

      switch($host){

    case 'host1':

      return self::$host1_memcache_obj;

      break;

    default :

      return self::$host2_memcache_obj;

      break;

    }// end switch

   }// end function connectMemcache

   /**
    * Method getMemcacheKeys get all memcache key
    *
    * @param string $host # the host key
    *
    * @return array $memcache_key_value
    */
   public static function getMemcacheKeys($host)
   {

      $memcache_obj = MemcacheAccess::connectMemcache($host);

      $list = array();

      $all_slabs = $memcache_obj->getExtendedStats('slabs');
      $items = $memcache_obj->getExtendedStats('items');

      foreach ($all_slabs as $server => $slabs) {

         foreach ($slabs AS $slab_id => $slab_meta) {

            $cdump = $memcache_obj->getExtendedStats('cachedump', (int)$slab_id);

            foreach ($cdump AS $keys => $arr_val) {

               if (!is_array($arr_val)) {

                  continue;

               }// end if

               foreach ($arr_val AS $k => $v) {

                  $key_array = explode("_", $k);

                  if ($key_array[0] == substr(KEY_PREFIX, 0, -1)) {

                     array_push($list, $k);

                  }// end if

               }// end foreach

            }// end foreach

         }// end foreach

      }// end foreach

      unset($memcache_obj);

      return $list;

   }// end function getMemcacheKeys

   /**
    * Method __destruct unset instance value
    *
    * @return void
    */
   public function __destruct()
   {

   }// end function __destruct

}

// initial memcache connection
MemcacheAccess::init();
?>