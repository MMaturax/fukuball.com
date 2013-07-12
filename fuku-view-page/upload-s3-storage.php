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
         <h2>
            Upload S3 Storage
         </h2>
         <div>
            <?php
            include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
            ?>
         </div>
         <div>
            <div id="upload-block" class="well">
               <div class="row" style="width: 230px; margin: 0px auto;">
                  <div class="pull-left" style="width: 100px;">
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
            <div class="progress progress-success progress-striped active m-a-15 hide">
               <div class="bar" style="width: 0%"></div>
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

   var s3_uploader = new plupload.Uploader({
      runtimes : 'html5,flash,gears,silverlight,browserplus',
      browse_button : 'pick-file',
      container: 'upload-block',
      max_file_size : '10mb',
      chunk_size : '200kb',
      url : '<?php echo SITE_HOST; ?>/show-case/s3-upload/upload-file',
      flash_swf_url : '/public/javascript/library/plupload/js/plupload.flash.swf',
      silverlight_xap_url : '/public/javascript/library/plupload/js/plupload.silverlight.xap',
      multiple_queues : false,
      multi_selection : false,
      max_file_count : 1,
      multipart : true,
      filters : [
         {title : "Pic files", extensions : "jpg,png,jpeg,gif"}
      ],
      multipart_params : {},
      init : {
         FilesAdded: function(up, files) {
            $('.progress').removeClass('hide');
            up.start();
         },
         BeforeUpload: function (up, file) {
            s3_uploader.settings.multipart_params = {s3fs_on: $("#on_off_on_hidden").val()};
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

         }

      }

   });

   s3_uploader.init();

});
</script>
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.gears.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.silverlight.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.flash.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.browserplus.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.html4.js"></script>
<script type="text/javascript" src="/public/javascript/library/plupload/js/plupload.html5.js"></script>