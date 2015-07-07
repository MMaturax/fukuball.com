<?php
/**
 * GameViewController.php is the controller
 * to dispatch game actions with game view
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
 * GameViewController.php is the controller
 * to dispatch game actions with game view
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
class GameViewController
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

      case 'roll-a-dice':
         ?>
         <!DOCTYPE html>
         <html lang='en' xmlns:fb='https://www.facebook.com/2008/fbml' xmlns:og='http://ogp.me/ns#'>
            <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
               <?php
               include_once SITE_ROOT."/fuku-view-component/meta-include.php";
               include_once SITE_ROOT."/fuku-view-component/icon-include.php";
               include_once SITE_ROOT."/fuku-view-component/style-include.php";
               ?>
               <link href="/public/stylesheet/home.css?v=0.0.11" rel="stylesheet">
               <?php
               include_once SITE_ROOT."/fuku-view-component/javascript-include.php";
               ?>
            </head>
            <body class="row-fluid p-a-0">
               <?php
               include_once SITE_ROOT."/fuku-view-component/header/header.php";
               ?>
               <div>
                  <?php
                  //include_once SITE_ROOT.$yield_path;
                  ?>
               </div>
               <?php
               include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
               include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
               ?>
            </body>
         </html>
         <?php
         break;

      case 'rock-paper-scissors':
         ?>
         <!DOCTYPE html>
         <html lang='en' xmlns:fb='https://www.facebook.com/2008/fbml' xmlns:og='http://ogp.me/ns#'>
            <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
               <?php
               include_once SITE_ROOT."/fuku-view-component/meta-include.php";
               include_once SITE_ROOT."/fuku-view-component/icon-include.php";
               include_once SITE_ROOT."/fuku-view-component/style-include.php";
               ?>
               <link href="/public/stylesheet/home.css?v=0.0.11" rel="stylesheet">
               <?php
               include_once SITE_ROOT."/fuku-view-component/javascript-include.php";
               ?>
            </head>
            <body class="row-fluid p-a-0">
               <?php
               include_once SITE_ROOT."/fuku-view-component/header/header.php";
               ?>
               <div>
                  <?php
                  //include_once SITE_ROOT.$yield_path;
                  ?>
               </div>
               <?php
               include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
               include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
               ?>
            </body>
         </html>
         <?php
         break;

      default:

         $page_title = 'Fukuball Lin';
         $yield_path = '/fuku-view-page/home-default.php';
         require_once SITE_ROOT.'/fuku-view-layout/full-page-layout.php';

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