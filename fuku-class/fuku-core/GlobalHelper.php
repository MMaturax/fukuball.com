<?php
/**
 * GlobalHelper.php is site helper class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fu-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * GlobalHelper is site helper class
 *
 * An example of a GlobalHelper is:
 *
 * <code>
 *   GlobalHelper::function();
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fu-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class GlobalHelper
{

   /**
    * Method static currentFullPageURL get current full page url
    *
    * @return string $current_page_url
    */
   public static function currentFullPageURL()
   {

      $pageURL = 'http';

      if ($_SERVER["HTTPS"] == "on") {

         $pageURL .= "s";

      }// end if

      $pageURL .= "://";

      if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443") {

         $pageURL .= SITE_DOMAIN.":".
         $_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

      } else {

         $pageURL .= SITE_DOMAIN.$_SERVER["REQUEST_URI"];

      }// end if

      return $pageURL;

   }// end function currentFullPageURL

   /**
    * Method static getUserIP get current user ip
    *
    * @return string $ip
    */
   public static function getUserIP()
   {
      if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {

         if ($_SERVER["HTTP_CLIENT_IP"]) {

            $proxy = $_SERVER["HTTP_CLIENT_IP"];

         } else {

            $proxy = $_SERVER["REMOTE_ADDR"];

         }// end if

         $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];

      } else {

         if ($_SERVER["HTTP_CLIENT_IP"]) {

            $ip = $_SERVER["HTTP_CLIENT_IP"];

         } else {

            $ip = $_SERVER["REMOTE_ADDR"];

         }// end if

      }// end if

      return $ip;

   }// end function getUserIP

   /**
    * Method static detectAgentIsMobile
    *
    * @return boolean $is_mobile
    */
   public static function detectAgentIsMobile()
   {

      if (preg_match('/(alcatel|amoi|android|avantgo|blackberry'.
                     '|benq|cell|cricket|docomo|elaine|htc|iemobile'.
                     '|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp'.
                     '|mobi|motorola|nec-|nokia|palm|panasonic|philips'.
                     '|phone|playbook|sagem|sharp|sie-|silk|smartphone'.
                     '|sony|symbian|t-mobile|telus|up\.browser|up\.link'.
                     '|vodafone|wap|webos|wireless|xda|xoom|zte)/i',
                     $_SERVER['HTTP_USER_AGENT'])
      ) {
          return true;
      } else {
          return false;
      }

   }// end function detectAgentIsMobile

   /**
    * Method doGet get do get request
    *
    * @param stirng url
    *
    * @return string $response
    */
   public static function doGet($url)
   {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

      $response = curl_exec($ch);
      curl_close($ch);

      return $response;
   }// end function doGet

   /**
    * Method doPost get do post request
    *
    * @param stirng url
    * @param array fields
    *
    * @return string $response
    */
   public static function doPost($url, $fields)
   {
      $fields_string = '';

      foreach ($fields as $key => $value) {
         $fields_string .= $key . '=' . $value . '&';
      }
      $fields_string = rtrim($fields_string, '&');

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, count($fields));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
      $response = curl_exec($ch);
      curl_close($ch);

      return $response;
   }// end function doPost

}// end class GlobalHelper
?>