<?php
/**
 * full-page-layout.php is the full page layout
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-layout/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
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
      <div id="main-content">
         <?php
         include_once SITE_ROOT.$yield_path;
         ?>
      </div>
      <?php
      include_once SITE_ROOT."/fuku-view-component/footer/footer.php";
      include_once SITE_ROOT."/fuku-view-component/javascript-include-bottom.php";
      ?>
   </body>
</html>