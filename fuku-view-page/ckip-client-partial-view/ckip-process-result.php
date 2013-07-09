<?php
/**
 * ckip-process-result.php
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
<section id="ckip-process-result-block">
   <h2>
      中研院斷詞結果：
   </h2>
   <div>
      <pre class="prettyprint">
         <?php
print_r($return_result);
         ?>
      </pre>
   </div>
   <div>
      <label>
         轉貼連結
      </label>
      <input id="ckip-process-share-link" type="text" style="width:100%;" value="<?php echo SITE_HOST.$ckip_process_record_obj->getUrl(); ?>" readonly="readonly" />
   </div>
   <div>
      <label>
         JSON格式連結
      </label>
      <input id="ckip-process-share-link" type="text" style="width:100%;" value="<?php echo SITE_HOST.$ckip_process_record_obj->getUrl().'.json'; ?>" readonly="readonly" />
   </div>
</section>
<section>
   <?php
   include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
   ?>
</section>
<script>
$('#ckip-process-result-block').ready(function() {

   $.scrollTo( $('#ckip-process-result-block'), 400, {offset:350} );

   $(document.body).off('click.ckip_process_share_link', '#ckip-process-share-link');
   $(document.body).on('click.ckip_process_share_link', '#ckip-process-share-link', function() {
      $(this).select();
   });

});
</script>