<?php
/**
 * ckip-client-footer.php
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
<footer>
   <div class="container">
      <div class="row">
         <div class="span5 pull-left">
            <h3>CKIP Client 線上中文斷詞</h3>
            <p>
               若您有使用本系統，請幫忙點擊廣告，讓本服務有微薄的收入可以維持運作，謝謝！
            </p>
            <ul class="footer-links">
               <li><a href="/ckip-client/">線上中文斷詞首頁</a></li>
               <li><a href="/ckip-client/about">關於我們</li>
            </ul>
            <div>
               <a href="https://twitter.com/fukuball" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @fukuball</a>
               <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            </div>
            <div class="m-t-10">
               <!-- Place this tag where you want the +1 button to render. -->
               <div class="g-plusone"></div>
               <!-- Place this tag after the last +1 button tag. -->
               <script type="text/javascript">
                 (function() {
                   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                   po.src = 'https://apis.google.com/js/plusone.js';
                   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                 })();
               </script>
            </div>
         </div>
         <div class="span4 pull-right">
            <?php
            include_once SITE_ROOT.'/fuku-view-component/commercial/336-commercial.php';
            ?>
         </div>
      </div>
   </div>
</footer>