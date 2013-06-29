<?php
/**
 * ShowCaseViewController.php is the controller
 * to dispatch show-case actions with show-case view
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
 * ShowCaseViewController.php is the controller
 * to dispatch show-case actions with show-case view
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
class ShowCaseViewController
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


      case 'itunes11':

         $action_level_two_id = $segments[1];

         switch ($action_level_two_id) {

         case 'album-data.json':

            header('Content-type: application/json');

            $json_data = array (
               "data"=>
               array(
                  array(
                     "id"=>"5311",
                     "album"=>"今夜的秘密集會 Acoustic Live EP",
                     "artist"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"http://music.indievox.com/indievox_music/mp3/30000/1/php3fXH12480X480.jpg?1353495034",
                     "tracklist"=>
                        array(
                           "處女空氣",
                           "Here We Are",
                           "等待著愛的人",
                           "耍堅強",
                           "Dear John"
                        ),
                     "url"=>"http://www.indievox.com/disc/5311",
                     "first"=>true
                  ),
                  array(
                     "id"=>"4975",
                     "album"=>"今夜的祕密集會",
                     "artist"=>"回聲樂團",
                     "year"=>"2012",
                     "image"=>"http://music.indievox.com/indievox_music/mp3/30000/1/phptkWMy4480X480.jpg?1347597422",
                     "tracklist"=>
                        array(
                           "今夜的祕密集會",
                           "今夜的祕密集會(DJ Afro&Will Remix)"
                        ),
                     "url"=>"http://www.indievox.com/disc/4975",
                  )
               )
            );

            echo json_encode($json_data);

            break;

         default:
            $page_title = 'HTML5 iTunes 11 | Show Case';
            $itunes11_active = 'active';
            $yield_path = '/fuku-view-page/show-case-itunes-11.php';
            require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';
            break;

         }

         break;

      default:

         $page_title = 'HTML5 iTunes 11 | Show Case';
         $itunes11_active = 'active';
         $yield_path = '/fuku-view-page/show-case-itunes-11.php';
         require_once SITE_ROOT.'/fuku-view-layout/show-case-page-layout.php';

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