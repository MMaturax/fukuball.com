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

$disc_data = json_decode(file_get_contents(SITE_HOST.'/show-case/5tunes11/disc-data.json'));

$count = 1;
foreach ($disc_data as $key=>$disc_item) {
   if (($count%4)==1) {
      echo '<div class="jaf-row jaf-container row">';
   }
   print_r($disc_item);
   if (($count%4)==0) {
      echo '</div>';
   }
   $count++;
}
?>
<div class="jaf-row jaf-container row">
   <div class='folder disc-cover-folder' id='uno'>
      <a href='#'>
         <img class='disc-cover' src='/public/image/itunes-cover/KuwosEX1gI480X480.jpg'>
         <p class='disc-title'>disc-title</p>
         <p class='artist-name'>artist-name</p>
      </a>
   </div>
</div>
<div class="folderContent uno">
   <div class="jaf-container">
      <div class="row">
         <div class='disc-cover-detail'>
            <img src='/public/image/itunes-cover/KuwosEX1gI480X480.jpg'>
         </div>
         <h2 class="m-b-0">
            <a href="/" target="_blank" class="primary-color">
               disc-title
            </a>
         </h2>
         <h3 class="secondary-color m-t-0">
            artist-name (year)
         </h3>
         <div class='track-list-block'>
            <ol class="secondary-color">
               <li>
                  <a href="/" target="_blank" class="primary-color">
                     track title
                  </a>
               </li>
            </ol>
         </div>
      </div>
   </div>
</div>
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
      instaSwitch: false
   });
});
</script>