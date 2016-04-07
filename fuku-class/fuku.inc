<?php
/**
 * fuku.inc is fuku-class include file
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

// core
require SITE_ROOT.'/fuku-class/fuku-core/RESTControl.php';
require SITE_ROOT.'/fuku-class/fuku-core/RESTfulInterface.php';
require SITE_ROOT.'/fuku-class/fuku-core/ErrorMessenger.php';
require SITE_ROOT.'/fuku-class/fuku-core/GlobalHelper.php';
require SITE_ROOT.'/fuku-class/fuku-core/UploadHelper.php';
require SITE_ROOT.'/fuku-class/fuku-core/MemcacheAccess.php';
require SITE_ROOT.'/fuku-class/fuku-core/DBAccess.php';
require SITE_ROOT.'/fuku-class/fuku-core/ActiveRecordGod.php';
require SITE_ROOT.'/fuku-class/fuku-core/ActiveRecord.php';

// model
require SITE_ROOT.'/fuku-class/fuku-model/CkipProcessRecord.php';
require SITE_ROOT.'/fuku-class/fuku-model/CkipProcessRecordGod.php';
?>