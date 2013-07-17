<?php
/**
 * show-case-5tunes-11.php
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
<!--<script type="text/javascript">
   $(document).ready(function(){

      $.ajax({
        url: "/show-case/5tunes11/album-data.json",
        dataType: 'json',
        success: function(data) {

          var albums = Mustache.to_html($('#albums').html(), data);
          var details = Mustache.to_html($('#details').html(), data);
          $('.app-folders-container').html(albums+details);

          $('.app-folders-container').appFolders({
             opacity: 1,                 // Opacity of non-selected items
             marginTopAdjust: true,             // Adjust the margin-top for the folder area based on row selected?
             marginTopBase: 0,               // If margin-top-adjust is "true", the natural margin-top for the area
             marginTopIncrement: 0,            // If margin-top-adjust is "true", the absolute value of the increment of margin-top per row
             animationSpeed: 200,            // Time (in ms) for transitions
             URLrewrite: false,               // Use URL rewriting?
             URLbase: "./",            // If URL rewrite is enabled, the URL base of the page where used. Example (include double-quotes): "/services/"
             internalLinkSelector: ".jaf-internal a"    // a jQuery selector containing links to content within a jQuery App Folder
          });

          // For each image:
          // Once image is loaded, get dominant color and palette and display them.
          $('.app-icon').bind('load', function (event) {
              var image = event.target;
              var $image = $(image);
              var imageSection = $image.closest('.imageSection');

              var colors = getColors(image);
              console.log(colors);
              styleBackground(colors[1], $image.parent().parent().attr('id'));
              styleText(colors[1], colors[0],$image.parent().parent().attr('id'));

          });
        }
      });
   });
</script>
<div class="app-folders-container">
   <script id="albums" type="text/x-mustache">
      {{#data}}
         {{#first}}
         <div class='jaf-row jaf-container'>
         {{/first}}
         <div class='folder' id='{{id}}'>
            <a href='#'>
               <img class='app-icon' src='/public/image/itunes-cover/{{image}}'>
               <p class='album-name'>{{album}}</p>
               <p class='artist-name'>{{artist}}</p>
            </a>
         </div>
         {{#last}}
            <br class='clear'>
         </div>
         {{/last}}
      {{/data}}
      </div>
   </script>

   <script id="details" type="text/x-mustache">
      {{#data}}
      <div class='folderContent {{id}}'>
         <div class='jaf-container'>
            <div>
               <div class='art-wrap'>
                  <img src='/public/image/itunes-cover/{{image}}'>
               </div>
               <h2 class="m-b-0"><a href="{{url}}" target="_blank" class="primaryColor">{{album}}</a></h2>
               <h3 class="secondaryColor m-t-0">{{artist}} ({{year}})</h3>
               <div class='multi'>
                  <ol class="secondaryColor">
                     {{#tracklist}}
                     <li><a href="{{url}}" target="_blank" class="primaryColor">{{.}}</a></li>
                     {{/tracklist}}
                  </ol>
               </div>
            </div>
            <br class='clear'>
         </div>
      </div>
      {{/data}}
   </script>
</div>
<script src="/public/javascript/library/expandingalbums/js/mustache.js"></script>
<script src="/public/javascript/library/expandingalbums/js/jquery.app-folders.js?v=0.0.13"></script>
<script src="/public/javascript/library/expandingalbums/js/quantize.js"></script>
<script src="/public/javascript/library/expandingalbums/js/color-thief.js"></script>-->
<div class="app-folders-container">
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
</div>
<script src="/public/javascript/library/app-folders/jquery.app-folders.js"></script>