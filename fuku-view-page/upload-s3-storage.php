<?php
/**
 * upload-s3-storage.php
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
<div id="upload-s3-storage-block">
   <div class="row">
      <div class="span9 pull-left p-a-15">
         <div>
            <?php
            include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
            ?>
         </div>
         <div>
            <div id="upload-block" class="row well">
               <div class="row" style="width: 300px; margin: 0px auto;">
                  <div class="pull-left" style="width: 170px;">
                     <a id="pick-file">
                        <button type="submit" class="btn btn-primary start">
                           <span>
                              Upload File
                           </span>
                        </button>
                     </a>
                  </div>
                  <div class="on_off pull-left" style="width:100px;margin-top:1px;">
                     <input type="checkbox" checked="checked" id="on_off_on"/>
                     <input type="hidden" id="on_off_on_hidden" value="on" />
                  </div>
               </div>
            </div>
            <div style="width:920px;margin: 10px auto;">
               <div class="progress progress-success progress-striped margin-all hide" style="width: 900px;">
                  <div class="bar" style="width: 0%"></div>
               </div>
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
<script>
$('#upload-s3-storage-block').ready(function() {

   $('.on_off :checkbox').iphoneStyle({
      checkedLabel: 'S3FS',
      uncheckedLabel: 'S3API',
      onChange: function(elem, value) {
         if (value.toString()=='true') {
            $('#on_off_on_hidden').val("on");
         } else {
            $('#on_off_on_hidden').val("off");
         }
      }
   });

   /*var audio_uploader = new plupload.Uploader({
      runtimes : 'html5,flash,gears,silverlight,browserplus',
      browse_button : 'pick-audio-file',
      container: 'midi-upload-block',
      max_file_size : '100mb',
      chunk_size : '200kb',
      url : '<?=SITE_HOST?>/ajax-action/song-action/upload-recommendation',
      flash_swf_url : '<?=SITE_HOST?>/p-library/plupload/js/plupload.flash.swf',
      silverlight_xap_url : '<?=SITE_HOST?>/p-library/plupload/js/plupload.silverlight.xap',
      multiple_queues : false,
      multi_selection : false,
      max_file_count : 1,
      multipart : true,
      filters : [
         {title : "Audio files", extensions : "mp3"}
      ],
      multipart_params : {},
      init : {
         FilesAdded: function(up, files) {
            $('.progress').removeClass('hide');
            up.start();
            $('#system-message').html('Processing...');
            $('#system-message').show();
         },
         BeforeUpload: function (up, file) {
            $('#rec-block').html('');
            audio_uploader.settings.multipart_params = {cache_on: $("#on_off_on_hidden").val()};
         },
         UploadProgress: function(up, file) {
            $('.progress .bar').css('width' , file.percent+'%');
         },
         UploadComplete: function(up, files) {
            $('.progress').addClass('hide').delay(500);
            $.each(files, function(i, file) {
               // Do stuff with the file. There will only be one file as it uploaded straight after adding!
            });
         },
         FileUploaded: function(up, file, resp) {

            //console.log(resp);
            $('.progress .bar').css('width' , '0%');
            $('#system-message').html('完成');
            $('#system-message').fadeOut();

            if (resp.response=='alert-no-licence') {

               $.ajax({
                     url: '<?=SITE_HOST?>/ajax-action/box-action/alert-no-licence',
                     type: "GET",
                     data: {},
                     dataType: "html",
                     beforeSend: function( xhr ) {
                     },
                     success: function( html_block ) {
                        $('#p-modal-block').html(html_block);
                     }
               });
            } else {
               $('#rec-block').html(resp.response);
            }

         }
      }

   });

   audio_uploader.init();*/

});
</script>