<?php
/**
 * ckip-client-about.php
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
   <div class="row">
      <div class="span7 pull-left p-a-15">
         <h2>
            關於 CKIP Client 線上中文斷詞
         </h2>
         <p>
            自然語言處理系統最基本需要讓電腦能夠分辨文本中字詞的意義，才能夠更進一步發展出自然語言處理系統的相關演算法，其中斷詞處理便是一個重要的前置技術， CKIP Client 線上中文斷詞服務網站使用了中研院斷詞系統的 Client 端程式，讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法。
         </p>
         <p>
            CKIP Client 線上中文斷詞是使用 <a href="https://github.com/fukuball/CKIPClient-PHP" target="_blank">CKIPClient-PHP 中研院斷詞系統客戶端程式</a> 來完成線上的斷詞服務，除了作為展示網站之外，也可提供一個簡易、小量的斷詞服務，讓有需要的人可以方便使用，而不用自行安裝伺服器及撰寫程式。但若希望可以有更完整的功能，歡迎至 <a href="https://github.com/fukuball/CKIPClient-PHP" target="_blank">Github</a> 下載相關原始碼。
         </p>
      </div>
      <div class="span4 pull-right p-a-15">
         <?php
         include_once SITE_ROOT.'/fuku-view-component/sidebar/profile-card.php';
         ?>
      </div>
   </div>
</section>
<section>
   <div id="full-width-commercial" class="commercial-box text-center">
      <script type="text/javascript"><!--
      google_ad_client = "ca-pub-9402461567510680";
      /* 728x90廣告 */
      google_ad_slot = "7650184668";
      google_ad_width = 728;
      google_ad_height = 90;
      //-->
      </script>
      <script type="text/javascript"
      src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
   </div>
</section>