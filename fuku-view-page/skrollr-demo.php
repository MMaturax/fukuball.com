<?php
/**
 * skrollr-demo.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-page/
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
      ?>
      <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
      <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
      <style>
         body {
            min-height: 2000px;
         }
         #bg-block {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 0;
            min-width: 100%;
            min-height: 100%;
            background: url(/public/image/show-case/skrollr-demo/b01.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -webkit-filter: blur(5px);
         }
         .drangon-ball-char {
            z-index: 10;
         }
      </style>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
      <script src="/public/javascript/library/skrollr/dist/skrollr.min.js"></script>
   </head>
   <body>
      <?php
      include_once SITE_ROOT."/fuku-view-component/header/show-case-header.php";
      ?>
      <div id="bg-block">
      </div>
      <img class="drangon-ball-char" src="/public/image/show-case/skrollr-demo/wukon.png" style="top:100px;">
   </body>
</html>