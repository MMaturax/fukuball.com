<?php
/**
 * jieba-home.php
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
      <h1>Jieba 線上中文斷詞服務</h1>
      <p class="m-t-10">自然語言處理系統最基本需要讓電腦能夠分辨文本中字詞的意義，才能夠更進一步發展出自然語言處理系統的相關演算法，其中斷詞處理便是一個重要的前置技術， Jieba 線上中文斷詞服務網站使用了 Jieba 斷詞程式，讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法。</p>
      <p><a href="https://github.com/fxsjy/jieba" target="_blank" class="btn btn-primary btn-large">Fork Jieba »</a></p>
   </div>
</section>
<section>
   <?php
   include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
   ?>
</section>
<section class="span11 m-t-10">
   <h2>
      請輸入要斷詞的短文：
   </h2>
   <div class="well span11 m-l-0">
      <form id="jieba-process-form" name="jieba_process_form" accept-charset="utf-8" action="/jieba/jieba-process" method="post">
         <div class="control-group">
            <div class="controls">
               <textarea style="font-size: 30px;line-height: 50px;" class="span11" id="paragraph" name="paragraph" placeholder="請輸入要斷詞的短文，限140字短文" rows="5"></textarea>
               <div class="help-inline hide">
                  請輸入 1~140 字的短文
               </div>
            </div>
         </div>
         <h4 class="pull-right"><span id="paragraph-char-counter">140</span> characters remaining</h4>
         <button id="jieba-process-submit-btn" class="btn btn-primary btn-large" type="submit">
            取得斷詞結果
         </button>
      </form>
   </div>
   <div id="jieba-result-block">
   </div>
</section>
<script type="text/javascript" charset="utf-8">
   $(document).ready(function()
   {
      $('#paragraph').simplyCountable({
         counter: '#paragraph-char-counter',
         countType:          'characters',
         maxCount:           140,
         strictMax:          true,
         countDirection:     'down',
         safeClass:          'safe',
         overClass:          'over',
         thousandSeparator:  ',',
         onOverCount:        function(count, countable, counter){},
         onSafeCount:        function(count, countable, counter){},
         onMaxCount:         function(count, countable, counter){}
      });

      function jiebaProcessValidate(formData, jqForm, options){

         var is_validated = true;

         if (!$('#paragraph').val() || $('#paragraph').val().length>140) {
            $('#paragraph').parent().parent().addClass('error');
            $('#paragraph').next().removeClass('hide');
            is_validated = false;
         } else {
            $('#paragraph').parent().parent().removeClass('error');
            $('#paragraph').next().addClass('hide');
         }

         if (is_validated) {
            $('#jieba-process-submit-btn').attr("disabled", "disabled");
         }

         return is_validated;

      }// end function jiebaProcessValidate

      // prepare Options Object
      var options = {
          target:       '#jieba-result-block',
          url:          '/jieba/jieba-process',
          type:         'post',
          beforeSubmit: jiebaProcessValidate,
          success: function() {
             $('#jieba-process-submit-btn').removeAttr("disabled");
          }
      };

      // pass options to ajaxForm
      $('#jieba-process-form').ajaxForm(options);
  });
</script>
<script type="text/javascript" charset="utf-8" src="/public/javascript/library/jquery-simply-countable/jquery.simplyCountable.js"></script>