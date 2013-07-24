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

function getContrastYIQ(color) {

    var r = color[0],
        g = color[1],
        b = color[2];

    var yiq = ((r*299)+(g*587)+(b*114))/1000;

    // return (yiq >= 128) ? 'light' : 'dark';
    return yiq;

}

function getDefaultColor(yiq) {
    return (yiq >= 128) ? [0, 0, 0] : [255, 255, 255];
}

function inverseColors(color, palette) {

    var yiq = getContrastYIQ(color);
    var colors = [],
        primary_color,
        secondary_color;

    for (var i = 0; i < palette.length; i++) {

        if (Math.abs(getContrastYIQ(palette[i]) - yiq) > 50) {
            colors.push(palette[i]);
        }
    }

    primary_color = colors[0] ? colors[0] : getDefaultColor(yiq);
    secondary_color = colors[1] ? colors[1] : getDefaultColor(yiq);

    return [primary_color, secondary_color];
}

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

          if ( (i<(pixel_count*0.30)) || ((i%(image.width*4))<(image.width*0.30)) || (i>(pixel_count*0.60)) ) {
             bg_pixel_array.push([r, g, b]);
          }
       }

    }

    var cmap = MMCQ.quantize(pixel_array, 5);
    var palette = cmap.palette();

    var bg_cmap = MMCQ.quantize(bg_pixel_array, 5);
    var bg_palette = bg_cmap.palette();

    var inverse_palette = inverseColors(bg_palette[0], palette);

    // Clean up
    image.removeCanvas();

    return [inverse_palette, bg_palette];

}
</script>
<div class="app-folders-container">
   <?php
   include_once SITE_ROOT.'/fuku-view-page/show-case-partial-view/5tunes11-folder.php';
   ?>
</div>