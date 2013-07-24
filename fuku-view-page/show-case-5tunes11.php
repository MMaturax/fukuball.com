<?php
/**
 * show-case-5tunes11.php
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
<script src="/public/javascript/library/color-thief/js/color-thief.js"></script>
<script src="/public/javascript/library/app-folders/jquery.app-folders.js"></script>
<script>
function getDominantColors(sourceImage) {

    var image = new CanvasImage(sourceImage),
        image_data = image.getImageData(),
        pixels = image_data.data,
        pixel_count = image.getPixelCount();

    var pixel_array = [];
    var bg_pixel_array = [];
    for (var i = 0, offset, r, g, b, a; i < pixel_count; i=i+4) {
       r = pixels[i + 0];
       g = pixels[i + 1];
       b = pixels[i + 2];
       a = pixels[i + 3];

       if (a >= 125) {
          pixel_array.push([r, g, b]);

          if ( (i<(pixel_count*0.30)) || ((i%(image.width*4))<(image.width*0.30)) || (i>(pixel_count*0.70)) ) {
             bg_pixel_array.push([r, g, b]);
          }
       }

    }

    var cmap = MMCQ.quantize(pixel_array, 5);
    var palette = cmap.palette();

    var bg_cmap = MMCQ.quantize(bg_pixel_array, 5);
    var bg_palette = bg_cmap.palette();

    // Clean up
    image.removeCanvas();

    return [palette, bg_palette];

}
</script>
<div class="app-folders-container">
   <?php
   include_once SITE_ROOT.'/fuku-view-page/show-case-partial-view/5tunes11-folder.php';
   ?>
</div>