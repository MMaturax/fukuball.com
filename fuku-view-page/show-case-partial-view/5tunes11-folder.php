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
      <div class="current-indicator">
      </div>
      <div class="current-indicator-back">
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
               <img src='<?php echo $disc_item['image']; ?>'>
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
<div id="load-more" class="row span4" style="margin: 30px auto 20px auto;">
   <button class="btn span4 m-a-15">
      載入更多
   </button>
</div>
<script>

$('.disc-cover').bind('load', function (event) {

     var image = event.target;
     var $image = $(image);

     var modify_palette_color = getDominantColors(image);

     var this_color_string = 'rgb('+modify_palette_color[1][0][0]+', '+modify_palette_color[1][0][1]+', '+modify_palette_color[1][0][2]+')';
     var this_cover_id = $image.parent().parent().parent().attr('id');
     $image.parent().parent().parent().find('.current-indicator').css('border-color', 'transparent transparent '+this_color_string+' transparent');
     $('.' + this_cover_id)
       .css('background-color', this_color_string)
       .find('.disc-cover-detail').css('box-shadow', 'inset 14px 17px 25px ' + this_color_string + ', inset -1px -1px 170px ' + this_color_string);

     $('.' + this_cover_id + ' .primary-color').css('color', 'rgb(' + modify_palette_color[0][0].join(',') + ')');
     $('.' + this_cover_id + ' .secondary-color').css('color', 'rgb(' + modify_palette_color[0][1].join(',') + ')');

     console.log(getDominantColors(image));
});

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

});
</script>