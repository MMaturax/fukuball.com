<?php
/**
 * app-setter.php initialize application settings
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-config/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error.log');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();

// http or https
$host_protocol = 'http';
if ($_SERVER['HTTPS'] == 'on') {
   $host_protocol = 'https';
}
require_once dirname(__FILE__).'/system-environment.php';

// some settings
define('DEFAULT_VIEW_CONTROLLER_PATH', SITE_ROOT.'/fuku-view-controller/HomeViewController.php');
define('DEFAULT_VIEW_CONTROLLER', 'HomeViewController');

// library
require_once SITE_ROOT.'/fuku-class/fuku.inc';
?>