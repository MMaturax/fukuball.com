<?php
/**
 * ErrorViewController.php is the controller
 * to dispatch error actions with error view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * ErrorViewController.php is the controller
 * to dispatch error actions with error view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
class ErrorViewController
   extends RESTControl
      implements RESTfulInterface
{

   /**
    * Dispatch post actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPost($segments)
   {

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      case '404':
      case 'page_not_found':
      case 'page-not-found':
      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPost

   /**
    * Dispatch get actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restGet($segments)
   {

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      case '404':
      case 'page_not_found':
      case 'page-not-found':
      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restGet

   /**
    * Dispatch put actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPut($segments)
   {

      $_PUT = array();
      parse_str(file_get_contents('php://input'), $_PUT);

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPut


   /**
    * Dispatch delete actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restDelete($segments)
   {

      $_DELETE = array();
      parse_str(file_get_contents('php://input'), $_DELETE);

      $action_level_one_id = $segments[0];

      switch ($action_level_one_id) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messanger = new ErrorMessenger($type, $parameter);
         $error_messanger->printErrorJSON();
         unset($error_messanger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restDelete

}
?>