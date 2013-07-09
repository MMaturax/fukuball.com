<?php
/**
 * ckip-client-record.php
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
<div>
   <div class="row">
      <div class="span9 pull-left p-a-15">
         <div>
            <?php
            include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
            ?>
         </div>
         <div>
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
         </div>
      </div>
      <div class="span2 pull-left p-a-15">
         <?php
         include_once SITE_ROOT.'/fuku-view-component/commercial/160-commercial.php';
         ?>
      </div>
   </div>
</div>