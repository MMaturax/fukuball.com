<?php
/**
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
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
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
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
class HomeViewController
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

      default:

         echo "page_not_found";

         break;

      }// end switch ($action_id)

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

      default:

         require_once SITE_ROOT.'/fuku-view-template/home-template.php';

         break;

      }// end switch ($action_id)

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
      str_parse( file_get_contents( 'php://input' ), $_PUT);

      print_r($segments);
      $param = file_get_contents('php://input'); // read the raw put data.
      print_r($_PUT);

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
      str_parse( file_get_contents( 'php://input' ), $_DELETE);

      print_r($segments);
      $param = file_get_contents('php://input'); // read the raw put data.
      print_r($_DELETE);

   }// end function restDelete

}
?>