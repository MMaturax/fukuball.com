<?php
/**
 * system_environment.php initialize mode environment
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

// stage mode
define("SITE_ROOT", "/var/www/www.fukuball.com");
define("SITE_HOST", $host_protocol."://www.indievox.com");
define("SITE_DOMAIN", "www.indievox.com");
define("SYSTEM_MODE", 'test');
define("KEY_PREFIX", "www_");
?>
