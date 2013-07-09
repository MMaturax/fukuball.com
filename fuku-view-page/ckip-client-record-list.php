<?php
/**
 * ckip-client-record-list.php
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
            <?php
            foreach ($ckip_process_record_list as $ckip_process_record_list_data) {
               $ckip_process_record_id = $ckip_process_record_list_data['id'];
               $ckip_process_record_obj = new CkipProcessRecord($ckip_process_record_id);
               ?>
               <div class="thumbnail clearfix">
                  <div class="pull-left clearfix ckip-process-num m-b-10">
                     <?php echo $ckip_process_record_obj->getId(); ?>
                  </div>
                  <div class="caption">
                     <a href="<?php echo SITE_HOST.$ckip_process_record_obj->getUrl(); ?>" class="btn btn-primary icon  pull-right">
                        查看斷詞結果
                     </a>
                     <h4>
                        短文：<br/>
                        <?php echo nl2br($ckip_process_record_obj->paragraph); ?>
                     </h4>
                  </div>
               </div>
               <?php
               unset($ckip_process_record_obj);
            }
            ?>
         </div>
      </div>
      <div class="span2 pull-left p-a-15">
         <?php
         include_once SITE_ROOT.'/fuku-view-component/commercial/160-commercial.php';
         ?>
      </div>
   </div>
</div>