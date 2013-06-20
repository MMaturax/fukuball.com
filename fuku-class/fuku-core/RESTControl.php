<?php
/**
 * RESTControl.php is the controller
 * to dispatch all the rest action to it's controller
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
 * RESTControl is the controller
 * to dispatch all the rest action to it's controller
 *
 * An example of a RESTControl is:
 *
 * <code>
 *  # This will done by rest request
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fu-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class RESTControl
{

   /**
    * Method exceptionResponse output some default exception
    *
    * @param int    $statusCode # the http status code
    * @param string $message    # status message
    *
    * @return void
    */
   static function exceptionResponse($statusCode, $message)
   {

      header("HTTP/1.0 {$statusCode} {$message}");
      echo "{$statusCode} {$message}";
      exit;

   }// end function exceptionResponse

   /**
    * Method index can list all action
    *
    * @return void
    */
   function index()
   {

      echo 'Index will not open.';

   }// end function index

}// end class RESTControl
?>