<?php
/**
 * slide-show-5tunes11.php
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
<section data-background="#000000">
   <h1>5Tunes11</h1>
   <br/>
   <h3>利用開源套件組出 iTunes11 專輯設計</h3>
   <br/>
   <h3>Fukuball Lin</h3>
   <br/>
   <br/>
   <br/>
   <br/>
   <br/>
   <h4>HappyDesigner Mini 分享會 <span style="color: rgb(170, 136, 238);">#3</span></h4>
</section>
<section data-background="#000000">
   <div style="position: absolute; top: 100%;">
      <img src="/public/image/slide-show/indievox_logo_outline.png" style="background: none;border: none;box-shadow: none;">
   </div>
   <h2 style="font-weight: bold; position: absolute; top: 1000%;">I am fukuball</h2>
   <div style="font-weight: bold; position: absolute; top: 1200%; left: 0.5%;">
      CTO at iNDIEVOX
   </div>
</section>
<section data-background="#000000">
   <h2 class="absolute-element" style="position: absolute; z-index: 1; width: 100%; left: 0px; top: 7%; font-weight: bold; -webkit-text-stroke-width: 15px; -webkit-text-stroke-color: black; -webkit-transform: scaleX(0.9);">iTunes 11</h2>
   <h2 class="absolute-element" style="position: absolute; z-index: 2; width: 100%; left: 0px; top: 7%; font-weight: bold; -webkit-transform: scaleX(0.9);">iTunes 11</h2>
   <img style="border:none;" src="/public/image/slide-show/itunes-11-album-details.png">
   <h2 class="absolute-element" style="position: absolute; z-index: 1; width: 100%; left: 0px; bottom: 5%; font-weight: bold; -webkit-text-stroke-width: 15px; -webkit-text-stroke-color: black; -webkit-transform: scaleX(0.9);">something like this</h2>
   <h2 class="absolute-element" style="position: absolute; z-index: 2; width: 100%; left: 0px; bottom: 5%; font-weight: bold; -webkit-transform: scaleX(0.9);">something like this</h2>
</section>
<section data-background="#000000">
   <h2>Can we build itunes design in web page?</h2>
   <p class="fragment" data-fragment-index="0">
      <img style="border:none;" src="/public/image/slide-show/5tunes-11-album-details.png">
   </p>
</section>
<section data-background="#000000">
   <h2>Take a close look</h2>
   <img style="border:none;" src="/public/image/slide-show/detail.png">
   <p style="position: absolute;z-index: 1;top: 73%;left: 25%;" class="fragment" data-fragment-index="0">the same background color as cover</p>
   <p style="position: absolute;z-index: 1;top: 30%;left: 45%;" class="fragment" data-fragment-index="1">background color mask on cover</p>
   <p style="position: absolute;z-index: 1;top: 60%;left: 5%;" class="fragment" data-fragment-index="2">use cover color theme to paint text color</p>
</section>
<section data-background-color="rgba(255, 255, 255, 0.8)">
   <h2 class="absolute-element" style="position: absolute; z-index: 1; width: 100%; left: 0px; top: -450%; font-weight: bold; -webkit-text-stroke-width: 15px; -webkit-text-stroke-color: black; -webkit-transform: scaleX(0.9);">Create cover mask</h2>
   <h2 class="absolute-element mask-action" style="position: absolute; z-index: 2; width: 100%; left: 0px; top: -450%; font-weight: bold; -webkit-transform: scaleX(0.9);">Create cover mask</h2>
   <div class="mask-left" style="position: absolute;z-index: 2;left: 0px;top: 0%;width: 300px;height: 300px;box-shadow: rgb(9, 8, 9) 14px 17px 25px inset, rgb(9, 8, 9) -1px -1px 170px inset;-webkit-transition: all 0.2s ease-in;-moz-transition: all 0.2s ease-in;transition: all 0.2s ease-in;">
   </div>
   <div class="mask-right" style="position: absolute;z-index: 1;left: 700px;top: 0%;width: 300px;height: 300px;-webkit-transition: all 0.2s ease-in;-moz-transition: all 0.2s ease-in;transition: all 0.2s ease-in;">
      <img width="300px" height="300px" src="/public/image/itunes-cover/phptkWMy4480X480.jpg" style="margin:0px;border:none;max-width:100%;max-height:100%;" />
   </div>
</section>
<section data-background="#000000">
   <h2>The mask CSS3 code</h2>
   <pre>
      <code data-trim="" contenteditable="" class="css">
.mask {
   box-shadow: rgb(9, 8, 9) 14px 17px 25px inset,
               rgb(9, 8, 9) -1px -1px 170px inset;
               /* color h-offset v-offset blur inner-shadow */
}
      </code>
   </pre>
</section>
<section data-background-color="rgba(50, 200, 90, 0.4)">
   <h3>
      <a style="font-weight: bold;" href="/show-case/5tunes11-v1" target="_blank">
         demo v1
      </a>
   </h3>
</section>
<section data-background="#000000">
   <h2>Extract main color - color quantization</h2>
   <img src="/public/image/slide-show/2419753793_273fd26a3e_b.jpg" />
   <h3 class="absolute-element" style="position: absolute; z-index: 1; width: 100%; left: 0px; bottom: 50%; font-weight: bold; -webkit-text-stroke-width: 15px; -webkit-text-stroke-color: black; -webkit-transform: scaleX(0.9);">How to redraw true color image by only 256 colors?</h3>
   <h3 class="absolute-element" style="position: absolute; z-index: 2; width: 100%; left: 0px; bottom: 50%; font-weight: bold; -webkit-transform: scaleX(0.9);">How to redraw true color image by only 256 colors?</h3>
</section>
<section data-background="#000000">
   <h2 class="absolute-element" style="position: absolute; z-index: 1; width: 100%; left: 0px; top: -450%;">True color vs 256 color</h2>
   <div style="position: absolute;z-index: 2;left: 0px;top: 0%;width: 300px;height: 300px;box-shadow: rgb(9, 8, 9) 14px 17px 25px inset, rgb(9, 8, 9) -1px -1px 170px inset;-webkit-transition: all 0.2s ease-in;-moz-transition: all 0.2s ease-in;transition: all 0.2s ease-in;">
      <img width="300px" src="/public/image/slide-show/lenna512.bmp" style="margin:0px;border:none;max-width:100%;max-height:100%;" />
   </div>
   <div style="position: absolute;z-index: 1;left: 660px;top: 0%;width: 300px;height: 300px;-webkit-transition: all 0.2s ease-in;-moz-transition: all 0.2s ease-in;transition: all 0.2s ease-in;">
      <img width="300px" src="/public/image/slide-show/MedianCutAlgorithm1.bmp" style="margin:0px;border:none;max-width:100%;max-height:100%;" />
   </div>
   <p style="position: absolute;z-index: 2;top: -150%;left: -5%;">True color : 24bit/pixel</p>
   <p style="position: absolute;z-index: 2;top: -150%;left: 65%;">256 color : 8bit/pixel</p>
   <p style="position: absolute;z-index: 2;top: 73%;left: 1%;" class="fragment" data-fragment-index="0">True color 791KB</p>
   <p style="position: absolute;z-index: 2;top: 73%;left: 70%;" class="fragment" data-fragment-index="0">256 color 266KB</p>
   <div class="fragment" data-fragment-index="1" style="position: absolute;z-index: 1;left: 330px;top: 0%;width: 300px;height: 300px;-webkit-transition: all 0.2s ease-in;-moz-transition: all 0.2s ease-in;transition: all 0.2s ease-in;">
      <img width="300px" src="/public/image/slide-show/MedianCutAlgorithm2.bmp" style="margin:0px;border:none;max-width:100%;max-height:100%;" />
   </div>
   <p style="position: absolute;z-index: 2;top: 500%;left: 35%;" class="fragment" data-fragment-index="1">256 color choose</p>
   <p style="position: absolute;z-index: 2;top: 600%;left: 28%;" class="fragment" data-fragment-index="1">how to choose these colors?</p>
</section>
<section data-background="#000000" data-background-transition="fade">
   <section data-background-transition="fade">
      <h3>Color Quantization - Median Cut Algorithm</h3>
      <img style="background-color:#fff" src="/public/image/slide-show/MedianCutAlgorithm2.png" />
      <img style="background-color:#fff" src="/public/image/slide-show/MedianCutAlgorithm3.png" />
      <a href="http://www.csie.ntnu.edu.tw/~u91029/Image.html" target="_blank">資料來源: http://www.csie.ntnu.edu.tw/~u91029/Image.html</a>
   </section>
   <section data-background-transition="fade">
      <h3>Color Quantization - Median Cut Algorithm</h3>
      <img style="background-color:#fff" src="/public/image/slide-show/MedianCutAlgorithm4.png" />
      <img style="background-color:#fff" src="/public/image/slide-show/MedianCutAlgorithm5.png" />
      <a href="http://www.csie.ntnu.edu.tw/~u91029/Image.html" target="_blank">資料來源: http://www.csie.ntnu.edu.tw/~u91029/Image.html</a>
   </section>
</section>
<section data-background="#000000">
   <h2>Use color theif to Extract main color</h2>
   <br/>
   <h3>
      <a style="font-weight: bold;" href="http://lokeshdhakar.com/projects/color-thief/" target="_blank">
      Color Thief
      </a>
   </h3>
   <pre>
      <code data-trim="" contenteditable="" class="js">
var colorThief = new ColorThief();
var palette_color = colorThief.getPalette(image, 5);
      </code>
   </pre>
   <h3>
   <a style="font-weight: bold;" href="/show-case/color-quantization" target="_blank">
      Color Q
   </a>
   </h3>
</section>
<section data-background-color="rgba(50, 200, 90, 0.4)">
   <h3>
      <a style="font-weight: bold;" href="/show-case/5tunes11-v2" target="_blank">
         demo v2
      </a>
   </h3>
</section>
<section data-background="#000000">
   <h2>Extract background color</h2>
   <img style="border:none;" src="/public/image/slide-show/background-part.png">
</section>
<section data-background="#000000">
   <h2>Heuristic Algorithm</h2>
   <pre>
      <code data-trim="" contenteditable="" class="js">
for (var i = 0; i&lt;image_data.length; i=i+4) {

   r = image_data[i + 0];
   g = image_data[i + 1];
   b = image_data[i + 2];
   a = image_data[i + 3];

   if ( i&lt;(image_data.length*0.30) || (i%(image.width*4))&lt;(image.width*0.30) ) {
      bg_image_data_array.push([r, g, b]);
   }

}

var bg_cmap = MMCQ.quantize(bg_image_data_array, 5);
var bg_palette = bg_cmap.palette();
      </code>
   </pre>
</section>
<section data-background-color="rgba(50, 200, 90, 0.4)">
   <h3>
      <a style="font-weight: bold;" href="/show-case/5tunes11" target="_blank">
         demo final
      </a>
   </h3>
</section>
<section data-background="#000000">
   <h2>
      所使用的開源套件
   </h2>
   <h3>
      <a href="http://lokeshdhakar.com/projects/color-thief/" target="_blank">Color Thief</a>
   </h3>
   <h3>
      <a href="http://app-folders.com/" target="_blank">App Folders</a>
   </h3>
</section>
<section data-background="#000000">
   <h2>
      什麼？早就有人做好了！
   </h2>
   <h3>
      <a href="http://owo.tw/ColorTunes" target="_blank">ColorTunes</a>
   </h3>
   <h3>
      <a href="http://thomaspark.me/project/expandingalbums/" target="_blank">Expanding Albums</a>
   </h3>
</section>
<section data-background="#000000">
   <h1>THE END</h1>
   <br/>
   <h3>We are hiring!</h3>
   <h3>job@indievox.com</h3>
</section>
<script>
   $(document.body).off('click.mask_action', '.mask-action');
   $(document.body).on('click.mask_action', '.mask-action', function() {
      $('.mask-left').css('left','350px');
      $('.mask-right').css('left','350px');
   });
</script>