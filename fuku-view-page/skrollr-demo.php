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
            min-height: 3000px;
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
            position: absolute;
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
      <div class="drangon-ball-char" style="top:300px;" data-0="opacity: 1;right: -500px;" data-300="opacity: 1;right: 300px;" data-600="opacity: 0;right: 400px;">
         <img src="/public/image/show-case/skrollr-demo/wukon.png" style="width:400px;">
      </div>
      <div class="drangon-ball-char" style="top:600px;" data-300="opacity: 1;left: -500px;" data-600="opacity: 1;left: 300px;" data-900="opacity: 0;left: 400px;">
         <img src="/public/image/show-case/skrollr-demo/wukon3.png" style="width:400px;">
      </div>
      <div class="drangon-ball-char" style="top:900px;" data-600="opacity: 1;right: -500px;" data-900="opacity: 1;right: 300px;" data-1200="opacity: 0;right: 400px;">
         <img src="/public/image/show-case/skrollr-demo/fan.png" style="width:400px;">
      </div>
      <div class="drangon-ball-char" style="top:1200px;" data-900="opacity: 1;left: -500px;" data-1200="opacity: 1;left: 300px;" data-1500="opacity: 0;left: 400px;">
         <img src="/public/image/show-case/skrollr-demo/klin.png" style="width:400px;">
      </div>
      <div class="drangon-ball-char" style="top:1500px;" data-1200="opacity: 1;right: -500px;" data-1500="opacity: 1;right: 300px;" data-1800="opacity: 0;right: 400px;">
         <img src="/public/image/show-case/skrollr-demo/buwu.png" style="width:400px;">
      </div>
      <div class="drangon-ball-char" style="top:1800px;" data-1500="opacity: 1;left: -500px;" data-1800="opacity: 1;left: 300px;" data-2100="opacity: 0;left: 400px;">
         <img src="/public/image/show-case/skrollr-demo/dall3.png" style="width:400px;">
      </div>
      <script type="text/javascript">
      var skrollr_obj = skrollr.init();
      </script>
   </body>
</html>