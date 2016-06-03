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

   public $paragraph;
   public $paragraph_result;
   public $user_ip;

   /**
    * Method getUrl get page url
    *
    * @return string $url
    */
   public function getUrl()
   {

      return '/ckip-client/record/'.$this->id;

   }// end function getUrl

}
?>