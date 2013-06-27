<?php
/**
 * ckip-client-home.php
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
<section>
   <div class="hero-unit m-a-15">
      <h1>CKIP Client 線上中文斷詞服務</h1>
      <p class="m-t-10">自然語言處理系統最基本需要讓電腦能夠分辨文本中字詞的意義，才能夠更進一步發展出自然語言處理系統的相關演算法，其中斷詞處理便是一個重要的前置技術， CKIP Client 線上中文斷詞服務網站使用了中研院斷詞系統的 Client 端程式，讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法。</p>
      <p><a href="https://github.com/fukuball/CKIPClient-PHP" target="_blank" class="btn btn-primary btn-large">Fork CKIPClient-PHP »</a></p>
   </div>
</section>
<section>
   <?php
   include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
   ?>
</section>
<h2>
   請輸入要斷詞的短文：
</h2>
<div class="well span10">
   <form accept-charset="UTF-8" action="" method="POST">
      <textarea class="span10" id="paragraph" name="paragraph" placeholder="請輸入要斷詞的短文，限140字短文" rows="10">
      </textarea>
      <h6 class="pull-right">140 characters remaining</h6>
      <button class="btn btn-info" type="submit">
         取得斷詞結果
      </button>
   </form>
</div>