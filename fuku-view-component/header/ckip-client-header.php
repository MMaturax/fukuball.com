<?php
/**
 * ckip-client-header.php
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
         <a class="brand" href="/">CKIP-Client Fukuball</a>
         <div class="nav-collapse collapse">
            <ul class="nav">
               <li class="<?php echo $ckip_client_active; ?>"><a href="/ckip-client/">線上中文斷詞首頁</a></li>
               <li class="<?php echo $ckip_client_record_list_active; ?>"><a href="/ckip-client/record-list">歷史紀錄</a></li>
               <li class="<?php echo $ckip_client_about_active; ?>"><a href="/ckip-client/about">關於我們</a></li>
            </ul>
         </div><!--/.nav-collapse -->
      </div>
   </div>
</div>