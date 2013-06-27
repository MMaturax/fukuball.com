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
         <p class="m-v-20">
            CKIP Client 線上中文斷詞是使用 <a href="https://github.com/fukuball/CKIPClient-PHP" target="_blank">CKIPClient-PHP 中研院斷詞系統客戶端程式</a> 來完成線上的斷詞服務，除了作為展示網站之外，也可提供一個簡易、小量的斷詞服務，讓有需要的人可以方便使用，而不用自行安裝伺服器及撰寫程式。但若希望可以有更完整的功能，歡迎至 <a href="https://github.com/fukuball/CKIPClient-PHP" target="_blank">Github</a> 下載相關原始碼。
         </p>
         <div class="alert alert-info m-v-20">
            自然語言處理系統最基本需要讓電腦能夠分辨文本中字詞的意義，才能夠更進一步發展出自然語言處理系統的相關演算法，其中斷詞處理便是一個重要的前置技術， CKIP Client 線上中文斷詞服務網站使用了中研院斷詞系統的 Client 端程式，讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法。
         </div>
         <h2>
            作者的話
         </h2>
         <p class="m-v-20">
            重新撰寫中研院斷詞系統的客戶端程式，主要是想讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法，中研院官方提供的客戶端程式已有很長一段時間沒有更新維護，以我自己的經驗是用得非常不愉快， CKIPClient-PHP 可以將這些不愉快都趕走！
         </p>
         <p class="m-v-20">
            中文斷詞系統還有 Stanford Word Segmenter 這個選擇，不過需要先將文本轉成簡體字再給 <a href="http://nlp.stanford.edu/software/segmenter.shtml" target="_blank">Stanford Word Segmenter</a> 進行斷詞才會有比較好的效果，但為了支持國產還是鼓勵大家多多使用中研院的斷詞系統，或許多多使用未來中研院的斷詞系統會就變得越來越好（？）
         </p>
         <h2>
            注意事項
         </h2>
         <h3>
            中研院斷詞系統每天上午六點進行系統維護
         </h3>
         <p class="m-v-20">
            請注意中研院斷詞系統每天上午六點進行系統維護，每次維護期間大概半小時，這段時間請不要執行程式或是進行重要的排程工作，否則可能會得到非預期的結果。
         </p>
         <h3>
            不要一次送出大量資料，也不要密集送出資料
         </h3>
         <p class="m-v-20">
            這點是我個人經驗，若一次送出大量資料，得到的回傳 xml 會不完整，造成 parse error，所以我會先自行將文章進行斷句（利用標點符號斷句），再送出給斷詞系統。也請注意不要密集送出資料給中研院斷詞系統，否則會暫時被鎖住帳號，可以在每次送出資料後，讓 script sleep 幾秒鐘，如此就不會被鎖住帳號了。
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