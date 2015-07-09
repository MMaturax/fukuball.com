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

      case 'find-ru-ru':
        ?>
         <!DOCTYPE html>
         <html lang='en' xmlns:fb='https://www.facebook.com/2008/fbml' xmlns:og='http://ogp.me/ns#'>
            <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
               <meta charset="utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>我找嚕嚕</title>
               <meta name="description" content="我找嚕嚕" />
               <meta name="author" content="Fukuball" />
               <meta name="keywords" content="fukuball, Fukuball Lin, 林志傑" />
               <meta name="twitter:card" content="summary" />
               <meta name="twitter:site" content="@fukuball" />
               <meta property="og:title" content="我找嚕嚕" />
               <meta property="og:type" content="website" />
               <meta property="og:url" content="<?php echo $current_page_full_url; ?>" />
               <meta property="og:image" content="<?php echo SITE_HOST; ?>/public/image/avatar5.jpg" />
               <meta property="og:description" content="我找嚕嚕" />
               <?php
               include_once SITE_ROOT."/fuku-view-component/icon-include.php";
               include_once SITE_ROOT."/fuku-view-component/style-include.php";
               ?>
               <link href="/public/stylesheet/animate.css" rel="stylesheet">
               <link href="/public/stylesheet/home.css?v=0.0.11" rel="stylesheet">
               <?php
               include_once SITE_ROOT."/fuku-view-component/javascript-include.php";
               ?>
            </head>
            <body class="row-fluid p-a-0">
               <?php
               //include_once SITE_ROOT."/fuku-view-component/header/header.php";
               ?>
               <div class="text-center m-t-10">
                  <button id="find-ru-ru-btn" class="btn btn-large" type="button" style="margin-top: 200px;">
                     我找嚕嚕
                  </button>
               </div>
               <div id="ru-ru-block" class="hide animated" style="position: fixed; top: 0px; z-index: 1; width: 100%;">
                  <div class="text-center">
                     <img id="ru-ru-image" src="/public/image/game/ruru.png" style="cursor:pointer;" />
                  </div>
               </div>
               <?php
               //include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
               //include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
               ?>
            </body>
            <script>

            var ruru_action = ["hide", "hide", "hide", "stay", "hide", "hide", "hide", "stay", "hide", "hide", "hide"];
            var in_action = ["bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp", "fadeInDown", "fadeInDownBig", "fadeInLeft", "fadeInLeftBig", "fadeInRight", "fadeInRightBig", "fadeInUp", "fadeInUpBig", "lightSpeedIn"];
            var out_action = ["bounceOutDown", "bounceOutLeft", "bounceOutRight", "bounceOutUp", "fadeOutDown", "fadeOutDownBig", "fadeOutLeft", "fadeOutLeftBig", "fadeOutRight", "fadeOutRightBig", "fadeOutUp", "fadeOutUpBig", "lightSpeedOut"];
            var current_in_action = '';
            var current_out_action = '';

            $("#find-ru-ru-btn").on("click", function(){

               var rand_action = ruru_action[Math.floor(Math.random() * ruru_action.length)];
               var rand_in_action = in_action[Math.floor(Math.random() * in_action.length)];

               current_in_action = rand_in_action;

               if (rand_action=='hide') {
                  $('#ru-ru-block').removeClass('hide').addClass(current_in_action);
                  if ($('#ru-ru-block').hasClass(current_out_action)) {
                     $('#ru-ru-block').removeClass(current_out_action).addClass(current_in_action);
                  }
                  setTimeout(function(){
                     var rand_out_action = out_action[Math.floor(Math.random() * out_action.length)];
                     current_out_action = rand_out_action;
                     $('#ru-ru-block').removeClass(current_in_action).addClass(current_out_action);
                  }, 500);

               } else {
                  $('#ru-ru-block').removeClass('hide').addClass(current_in_action);
                  if ($('#ru-ru-block').hasClass(current_out_action)) {
                     $('#ru-ru-block').removeClass(current_out_action).addClass(current_in_action);
                  }
               }


            });

            $("#ru-ru-image").on("click", function(){
               var rand_out_action = out_action[Math.floor(Math.random() * out_action.length)];
               current_out_action = rand_out_action;
               $('#ru-ru-block').removeClass(current_in_action).addClass(current_out_action);
            });

            </script>
         </html>
         <?php
        break;

      case 'roll-a-dice':

         global $current_page_full_url;

         $dice = array('dice1', 'dice2', 'dice3', 'dice4', 'dice5', 'dice6');

         $q = $_GET['q'];
         $hash_value = substr(base_convert(md5($q), 16, 10) , -5);
         $mode_num = intval($hash_value)%6;
         $random_get = $dice[$mode_num];

         ?>
         <!DOCTYPE html>
         <html lang='en' xmlns:fb='https://www.facebook.com/2008/fbml' xmlns:og='http://ogp.me/ns#'>
            <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
               <meta charset="utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
               <title>Roll a Dice</title>
               <meta name="description" content="Random Roll a Dice" />
               <meta name="author" content="Fukuball" />
               <meta name="keywords" content="fukuball, Fukuball Lin, 林志傑" />
               <meta name="twitter:card" content="summary" />
               <meta name="twitter:site" content="@fukuball" />
               <meta property="og:title" content="Roll a Dice" />
               <meta property="og:type" content="website" />
               <meta property="og:url" content="<?php echo $current_page_full_url; ?>" />
               <meta property="og:image" content="<?php echo SITE_HOST; ?>/public/image/game/<?php echo $random_get; ?>.png" />
               <meta property="og:description" content="Random Roll a Dice" />
               <?php
               include_once SITE_ROOT."/fuku-view-component/icon-include.php";
               include_once SITE_ROOT."/fuku-view-component/style-include.php";
               ?>
               <link href="/public/stylesheet/home.css?v=0.0.11" rel="stylesheet">
               <?php
               //include_once SITE_ROOT."/fuku-view-component/javascript-include.php";
               ?>
            </head>
            <body class="row-fluid p-a-0">
               <?php
               //include_once SITE_ROOT."/fuku-view-component/header/header.php";
               ?>
               <div class="text-center m-t-10">
                  <img src="/public/image/game/<?php echo $random_get; ?>.png" />
               </div>
               <?php
               //include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
               //include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
               ?>
            </body>
         </html>
         <?php
         break;

      case 'rock-paper-scissors':

         global $current_page_full_url;

         $rock_paper_scissors = array('rock', 'paper', 'scissors');

         $q = $_GET['q'];
         $hash_value = substr(base_convert(md5($q), 16, 10) , -5);
         $mode_num = intval($hash_value)%3;
         $random_get = $rock_paper_scissors[$mode_num];

         ?>
         <!DOCTYPE html>
         <html lang='en' xmlns:fb='https://www.facebook.com/2008/fbml' xmlns:og='http://ogp.me/ns#'>
            <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
               <meta charset="utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
               <title>Rock Paper Scissors</title>
               <meta name="description" content="Random Rock Paper Scissors" />
               <meta name="author" content="Fukuball" />
               <meta name="keywords" content="fukuball, Fukuball Lin, 林志傑" />
               <meta name="twitter:card" content="summary" />
               <meta name="twitter:site" content="@fukuball" />
               <meta property="og:title" content="Rock Paper Scissors" />
               <meta property="og:type" content="website" />
               <meta property="og:url" content="<?php echo $current_page_full_url; ?>" />
               <meta property="og:image" content="<?php echo SITE_HOST; ?>/public/image/game/<?php echo $random_get; ?>.png" />
               <meta property="og:description" content="Random Rock Paper Scissors" />
               <?php
               include_once SITE_ROOT."/fuku-view-component/icon-include.php";
               include_once SITE_ROOT."/fuku-view-component/style-include.php";
               ?>
               <link href="/public/stylesheet/home.css?v=0.0.11" rel="stylesheet">
               <?php
               //include_once SITE_ROOT."/fuku-view-component/javascript-include.php";
               ?>
            </head>
            <body class="row-fluid p-a-0">
               <?php
               //include_once SITE_ROOT."/fuku-view-component/header/header.php";
               ?>
               <div class="text-center m-t-10">
                  <img src="/public/image/game/<?php echo $random_get; ?>.png" />
               </div>
               <?php
               //include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
               //include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
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