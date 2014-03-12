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
date_default_timezone_set('Asia/Taipei');

session_start();

if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
   $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

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

$current_page_full_url = GlobalHelper::currentFullPageURL();
?>