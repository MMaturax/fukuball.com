<?php
/**
 * 5tunes11.php
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

$disc_data = json_decode(file_get_contents(SITE_HOST.'/show-case/5tunes11/disc-data.json'), true);

$count = 1;
foreach ($disc_data['data'] as $key=>$disc_item) {
   if (($count%4)==1) {
      echo '<div class="jaf-row jaf-container row m-l-0">';
   }
   ?>
   <div class="folder disc-cover-folder" id="<?php echo $disc_item['id']; ?>">
      <div>
         <a href='#'>
            <img class="disc-cover" src="<?php echo $disc_item['image']; ?>">
            <p class='disc-title'><?php echo $disc_item['disc_title']; ?></p>
            <p class='artist-name'><?php echo $disc_item['artist_name']; ?></p>
         </a>
      </div>
      <div id="current-indicator-<?php echo $disc_item['id']; ?>" class="current-indicator">
      </div>
   </div>
   <?php
   if (($count%4)==0) {
      echo '</div>';
   }
   $count++;
}

foreach ($disc_data['data'] as $key=>$disc_item) {
   ?>
   <div class="folderContent disc-folder-content <?php echo $disc_item['id']; ?>">
      <div class="jaf-container">
         <div class="row">
            <div class='disc-cover-detail pull-right'>
               <img id="disc-cover-detail-<?php echo $disc_item['id']; ?>" src='<?php echo $disc_item['image']; ?>'>
            </div>
            <h2 class="m-b-0">
               <a href="<?php echo $disc_item['url']; ?>" target="_blank" class="primary-color">
                  <?php echo $disc_item['disc_title']; ?>
               </a>
            </h2>
            <h3 class="secondary-color m-t-0">
               <?php echo $disc_item['artist_name']; ?> (<?php echo $disc_item['year']; ?>)
            </h3>
            <div class='track-list-block'>
               <ol class="secondary-color">
                  <?php
                  foreach ($disc_item['tracklist'] as $track_key=>$track_item) {
                     ?>
                     <li>
                        <a href="<?php echo $disc_item['url']; ?>" target="_blank" class="primary-color">
                           <?php echo $track_item; ?>
                        </a>
                     </li>
                     <?php
                  }
                  ?>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <?php
}
?>
<script>

$('.app-folders-container').ready(function() {

   $('.app-folders-container').appFolders({
      // Opacity of non-selected items
      opacity: 1,
      // Adjust the margin-top for the folder area based on row selected?
      marginTopAdjust: true,
      // If margin-top-adjust is "true", the natural margin-top for the area
      marginTopBase: 0,
      // If margin-top-adjust is "true", the absolute value of the increment of margin-top per row
      marginTopIncrement: 0,
      // Time (in ms) for transitions
      animationSpeed: 200,
      // Use URL rewriting?
      URLrewrite: false,
      // If URL rewrite is enabled, the URL base of the page where used.
      URLbase: "./",
      // a jQuery selector containing links to content within a jQuery App Folder
      internalLinkSelector: ".jaf-internal a",
      // Set to true to enable one-click folder switching rather than iOS-like two clicks
      instaSwitch: true
   });


   var colorThief = new ColorThief();
   var this_cover_image;
   <?php
   foreach ($disc_data['data'] as $key=>$disc_item) {
      ?>
      this_cover_image = $('#disc-cover-detail-<?php echo $disc_item["id"]; ?>');
      console.log(this_cover_image);
      if (!this_cover_image.complete) {
         this_cover_image.on("load", function(event){
            var dominant_color = colorThief.getColor(this_cover_image[0]);
            var this_color_string = 'rgb('+dominant_color[0]+', '+dominant_color[1]+', '+dominant_color[2]+')';
            this_cover_image.parent().css('box-shadow', this_color_string+' 12px 15px 20px inset, '+this_color_string+' -1px -1px 150px inset');
            this_cover_image.parent().css('-moz-box-shadow', this_color_string+' 12px 15px 20px inset, '+this_color_string+' -1px -1px 150px inset');
            this_cover_image.parent().css('-webkit-box-shadow', this_color_string+' 12px 15px 20px inset, '+this_color_string+' -1px -1px 150px inset');
            this_cover_image.parent().parent().parent().parent().css('background-color', this_color_string);
            $('#current-indicator-<?php echo $disc_item["id"]; ?>').css('border-color', 'transparent transparent '+this_color_string+' transparent');
            console.log(dominant_color);
         });
      } else {
          // handle image already loaded case
      }



      <?php
   }
   ?>

});
</script>