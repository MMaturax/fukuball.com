<?php
/**
 * ErrorMessenger.php is error messenger class
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
 * ErrorMessenger.php is error messenger class
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
class ErrorMessenger
{

   protected $version = "0.1";
   protected $type;
   protected $code;
   protected $parameter;
   protected $message;
   public    $readable_title;
   public    $readable_description;
   public    $return_data;

   /**
    * Method __construct initialize instance
    *
    * @param string $type      # the error type
    * @param array  $parameter # option parameter to use
    *
    * @return void
    */
   public function __construct($type, $parameter)
   {

      try {

         $this->type = $this->validateNotEmpty($type);

      } catch (Exception $e) {

         echo "<h2>".get_class($this)."</h2>";
         var_dump($e->getMessage());
         exit;

      }// end try

      $this->getMyErrorCode();
      $this->parameter = $parameter;
      $this->return_data = array();

   }// end function __construct

   /**
    * Method validateNotEmpty validate type not empty
    *
    * @param string $property # the error type
    *
    * @return string $property
    */
   protected function validateNotEmpty($property)
   {

      if (empty($property)) {

         throw new Exception('Empty value exception.');

      } else {

         return $property;

      }

   }// end function validateNotEmpty

   /**
    * Method getMyErrorCode to initialize some member property
    *
    * @return void
    */
   protected function getMyErrorCode()
   {

      switch ($this->type) {

      case 'page_not_found':

         $this->code = '404';
         $this->message = $this->type.' - Page not found';
         $this->readable_title = 'This page is no longer exist.';
         $this->readable_description = 'This page is no longer exist.';

         break;

      case 'success':

         $this->code = '0';
         $this->message = 'Success';
         $this->readable_title = 'Success!';
         $this->readable_description = 'Success!';

         break;

      case 'unknow_error':
      default:

         $this->code = "1";
         $this->message = $this->type." - Error happens";
         $this->readable_title = 'Unknown error.';
         $this->readable_description = 'Unknown error.';

         break;

      }// end switch

   }// end function getMyErrorCode

   /**
    * Method printErrorRedirect print error redirect
    *
    * @param string $url
    *
    * @return void
    */
   public function printErrorRedirect($url='')
   {
      if ($url == '') {
         $error_redirect_url = SITE_HOST.'/error/'.$this->type;
      } else {
         $error_redirect_url = $url;
      }

      include 'ErrorMessenger/error-redirect.php';

   }// end function printErrorRedirect

   /**
    * Method printErrorJSON print error json
    *
    * @return void
    */
   public function printErrorJSON()
   {

      $version = $this->version;
      $error_code = $this->code;
      $error_type = $this->type;
      $message = $this->message;
      $parameter = $this->parameter;
      $return_data = $this->return_data;

      include 'ErrorMessenger/error-json.php';

   }// end function printErrorJSON

   /**
    * Method printErrorText print error text
    *
    * @return void
    */
   public function printErrorText()
   {

      $error_title = $this->readable_title;
      $error_description = $this->readable_description;

      include 'ErrorMessenger/error-text.php';

   }// end function printErrorJSON

   /**
    * Method setReturnData
    *
    * @param string $key
    * @param mix    $value
    *
    * @return void
    */
   public function setReturnData($key, $value) {

      $this->return_data[$key] = $value;

   }// end function setReturnData

   /**
    * Method __destruct unset instance value
    *
    * @return void
    */
   public function __destruct()
   {

      unset($this->version);
      unset($this->type);
      unset($this->code);
      unset($this->parameter);
      unset($this->message);
      unset($this->readable_title);
      unset($this->readable_description);

   }// end function __destruct

}// end class ErrorMessenger
?>