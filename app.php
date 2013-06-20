<?php
echo 'test';
///**
// * app.php is the controller of whole app
// *
// * PHP version 5
// *
// * @category PHP
// * @package  /
// * @author   Fukuball Lin <fukuball@gmail.com>
// * @license  Licence
// * @version  Release: <1.0>
// * @link     http://www.fukuball.com
// */
//
//require_once dirname(__FILE__)."/fuku-config/app-setter.php";
//
///**
// * AppContainer is the controller
// * to dispatch all the rest app action to it's controller
// *
// * @category PHP
// * @package  /
// * @author   Fukuball Lin <fukuball@gmail.com>
// * @license  Licence
// * @version  Release: <1.0>
// * @link     http://www.fukuball.com
// */
//class AppContainer extends RESTControl
//{
//
//   private $_controller = false;
//   private $_segments = false;
//
//   /**
//    * AppContainer construct
//    *
//    * @return void
//    */
//   function __construct()
//   {
//
//      print_r($_SERVER['PATH_INFO']);
//      if ( !isset($_SERVER['PATH_INFO']) or $_SERVER['PATH_INFO'] == '/') {
//
//         include_once DEFAULT_VIEW_CONTROLLER_PATH;
//
//         $default_view_controller = DEFAULT_VIEW_CONTROLLER;
//         $this->_controller = new $default_view_controller;
//         $this->_segments = false;
//
//         return;
//
//      }
//
//      $this->_segments = explode('/', $_SERVER['PATH_INFO']);
//      array_shift($this->_segments); // first element always is an empty string.
//      $the_class_string = array_shift($this->_segments);
//
//      $raw_controller_name_array = explode('-', $the_class_string);
//      $controller_name = '';
//
//      foreach ($raw_controller_name_array as $controller_name_partial) {
//
//         $controller_name = $controller_name.ucfirst($controller_name_partial);
//
//      }
//
//      if ( !class_exists($controller_name) ) {
//         $controller_file_path = SITE_ROOT . '/fuku-view-controller/' . $controller_name . 'ViewController.php';
//
//         if ( file_exists($controller_file_path) ) { // load controler
//
//            include_once $controller_file_path;
//
//         } else { // can't find controler
//
//            include_once DEFAULT_VIEW_CONTROLLER_PATH;
//
//         }
//      }
//
//      $this->_controller = new $controller_name;
//
//   }// end function __construct()
//
//   /**
//    * Run AppContainer to get the resource
//    *
//    * @return void
//    */
//   function run()
//   {
//
//      //request resource by RESTful way.
//      //$method = $this->restMethodname;
//      $method = 'rest'.ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
//
//      if ( !method_exists($this->_controller, $method) ) {
//
//         self::exceptionResponse(405, 'Method not Allowed!');
//
//      }
//
//      $arguments = $this->_segments;
//      $this->_controller->$method($arguments);
//
//   }// end function run
//
//}// end class AppContainer
//
//$app_container = new AppContainer();
//$app_container->run();
?>