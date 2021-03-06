<?php
/**
 * show-case-header.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-component/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
?>
<div class="navbar navbar-inverse navbar-fixed-top">
   <div class="navbar-inner">
      <div class="container">
         <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a class="brand" href="/">Show Case Fukuball</a>
         <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="<?php echo $itunes11_active; ?>"><a href="/show-case/5tunes11">5Tunes11</a></li>
            </ul>
         </div><!--/.nav-collapse -->
         <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="<?php echo $s3_storage_active; ?>"><a href="/show-case/s3-upload">Upload S3 Storage</a></li>
            </ul>
         </div><!--/.nav-collapse -->
         <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="<?php echo $skrollr_active; ?>"><a href="/show-case/skrollr-demo">Skrollr Demo</a></li>
            </ul>
         </div><!--/.nav-collapse -->
      </div>
   </div>
</div>