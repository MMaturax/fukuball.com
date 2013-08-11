<?php
/**
 * show-case-color-quantication.php
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
<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <title><?php echo $page_title; ?></title>
     <meta name="description" content="<?php echo $page_title; ?>">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <script src="/public/javascript/library/color-thief/js/libs/modernizr.custom.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="/public/javascript/library/color-thief/css/app.css">
     <style>
        .get-color{
           display: none;
        }
        .color-thief-output {
           -moz-border-radius-bottomleft: 0px;
           -webkit-border-bottom-left-radius: 0px;
           border-bottom-left-radius: 0px;
           -moz-border-radius-bottomright: 0px;
           -webkit-border-bottom-right-radius: 0px;
           border-bottom-right-radius: 0px;
           -webkit-box-shadow: 0 0px 0 #333333;
           -moz-box-shadow: 0 0px 0 #333333;
           box-shadow: 0 0px 0 #333333;
        }
     </style>
   </head>
   <body>
      <div class="wrapper">

        <section class="intro">
            <header>
              <h1 class="logo">Color Q</h1>
            </header>
            <h4>Modify from color thief created by <a href="http://lokeshdhakar.com">Lokesh Dhakar</a></small></h4>
            <h2>About Color Thief</h2>
            <p class="description">A script for grabbing the color palette from an image. Uses Javascript and the canvas tag to make it happen.</p>
            <p class="read-more-links"><a href="http://www.lokeshdhakar.com/color-thief/">Read more about it on Lokesh Dhakar's blog</a> or <a href="https://github.com/lokesh/color-thief">get the code on Github</a></p>
        </section>

        <section id="drag-drop" class="drag-drop">
          <header>
            <h2 class="section-header">Upload Image</h2>
            <h3 class="section-header">Use <input id="use-color" name="use_color" value="8" style="margin: 0px 0px 10px 0px;width: 30px;border: 0px;text-align: right;" /> Color</h3>
          </header>
          <div id="drop-zone" class="drop-zone">
            <div class="drop-zone-label default-label">Drag an image here</div>
            <div class="drop-zone-label dragging-label">Drop it here!</div>
          </div>
          <div id="dragged-images" class="dragged-images"></div>
        </section>

      </div>

      <script src="/public/javascript/library/color-thief/js/libs/jquery-2.0.2.min.js"></script>
      <script src="/public/javascript/library/color-thief/js/libs/jquery.lettering.js"></script>
      <script src="/public/javascript/library/color-thief/js/libs/mustache.js"></script>
      <script src="/public/javascript/library/color-thief/js/color-thief.js"></script>

      <!-- Mustache templates -->
      <script id='image-section-template' type='text/x-mustache'>
        {{#images}}
        <div class="image-section {{class}}">
          <div class="image-wrap">
            <button class="run-functions-button">
              <span class="no-touch-label">Click</span>
              <span class="touch-label">Tap</span>
            </button>
            <img class="target-image" src="{{file}}" />
          </div>
          <div class="color-thief-output"></div>
          <div>
            <canvas id="output-canvas" style="display:block; margin-bottom: 30px;">
            </canvas>
          </div>
        </div>
        {{/images}}
      </script>

      <script id="color-thief-output-template" type="text/x-mustache">
        <div class="function get-color">
          <h3 class="function-title">Dominant Color</h3>
          <div class="swatches">
            <div class="swatch" style="background-color: rgb({{color.0}}, {{color.1}}, {{color.2}})"></div>
          </div>
          <div class="function-code">
            <code>colorThief.getColor(image):{{elapsedTimeForGetColor}}ms</code>
          </div>
        </div>
        <div class="function get-palette">
          <h3 class="function-title">Palette</h3>
          <div class="function-output">
            <div class="swatches">
              {{#palette}}
                <div class="swatch" style="background-color: rgb({{0}}, {{1}}, {{2}})"></div>
              {{/palette}}
            </div>
          </div>
          <div class="function-code">
            <code>colorThief.getPalette(image):{{elapsedTimeForGetPalette}}ms</code>
          </div>
        </div>
      </script>

      <script type="text/javascript">

      $(document).ready(function () {

        // Use lettering.js to generate spans for each letter in the logo.
        // This is used to create the on hover animated rainbow effect.
        $('.logo').lettering();

        var colorThief = new ColorThief();

        // Run Color Thief functions and display results below image.
        // We also log execution time of functions for display.
        var showColorsForImage = function($image, $imageSection ) {

          var color_num = parseInt($('#use-color').val())+1;
          if (color_num>256) {
             color_num = 256;
          } else if (color_num<=4) {
             color_num = 4;
          }

          var image                    = $image[0];
          var start                    = Date.now();
          var color                    = colorThief.getColor(image);
          var elapsedTimeForGetColor   = Date.now() - start;
          var palette                  = colorThief.getPalette(image, color_num);
          var elapsedTimeForGetPalette = Date.now() - start + elapsedTimeForGetColor;

          var colorThiefOutput = {
            color: color,
            palette: palette,
            elapsedTimeForGetColor: elapsedTimeForGetColor,
            elapsedTimeForGetPalette: elapsedTimeForGetPalette
          };
          var colorThiefOuputHTML = Mustache.to_html($('#color-thief-output-template').html(), colorThiefOutput);
          $imageSection.addClass('with-color-thief-output');
          $imageSection.find('.run-functions-button').addClass('hide');
          $imageSection.find('.color-thief-output').append(colorThiefOuputHTML).slideDown();

          // If the color-thief-output div is not in the viewport or cut off, scroll down.
          var windowHeight          = $(window).height();
          var currentScrollPosition = $('body').scrollTop()
          var outputOffsetTop       = $imageSection.find('.color-thief-output').offset().top
          if ((currentScrollPosition < outputOffsetTop) && (currentScrollPosition + windowHeight - 250 < outputOffsetTop)) {
             $('body').animate({scrollTop: outputOffsetTop - windowHeight + 200 + "px"});
          }

          //redrawImageWithColor(image, palette);
          redrawImageWithColorWithBlock(image, palette, 4);

        };

        // Drag'n'drop demo
        // Thanks to Nathan Spady (http://nspady.com/) who did the bulk of the drag'n'drop work.

        // Setup the drag and drop behavior if supported
        if (Modernizr.draganddrop && !!window.FileReader && !isMobile()) {

          $('#drag-drop').show();
          var $dropZone = $('#drop-zone');
          var handleDragEnter = function(event){
            $dropZone.addClass('dragging');
            return false;
          };
          var handleDragLeave = function(event){
            $dropZone.removeClass('dragging');
            return false;
          };
          var handleDragOver = function(event){
            return false;
          };
          var handleDrop = function(event){
            $dropZone.removeClass('dragging');
            handleFiles(event.originalEvent.dataTransfer.files);
            return false;
          };
          $dropZone
            .on('dragenter', handleDragEnter)
            .on('dragleave', handleDragLeave)
            .on('dragover', handleDragOver)
            .on('drop', handleDrop);
        }

        function handleFiles(files) {
          var $draggedImages = $('#dragged-images');
          var imageType      = /image.*/;
          var fileCount      = files.length;

          for (var i = 0; i < fileCount; i++) {
            var file = files[i];

            if (file.type.match(imageType)) {
              var reader = new FileReader();
              reader.onload = function(event) {
                  imageInfo = { images: [
                      {'class': 'dropped-image', file: event.target.result}
                    ]};

                  var imageSectionHTML = Mustache.to_html($('#image-section-template').html(), imageInfo);
                  $draggedImages.prepend(imageSectionHTML);

                  var $imageSection = $draggedImages.find('.image-section').first();
                  var $image        = $('.dropped-image .target-image');

                  // Must wait for image to load in DOM, not just load from FileReader
                  $image.on('load', function() {
                    showColorsForImage($image, $imageSection);
                  });
                };
              reader.readAsDataURL(file);
            } else {
              alert('File must be a supported image type.');
            }
          }
        }

        // This is not good practice. :-P
        function isMobile(){
          // if we want a more complete list use this: http://detectmobilebrowsers.com/
          // str.test() is more efficent than str.match()
          // remember str.test is case sensitive
          var isMobile = (/iphone|ipod|ipad|android|ie|blackberry|fennec/).test
               (navigator.userAgent.toLowerCase());
          return isMobile;
        }

        function redrawImageWithColor(image, palette) {

           var temp_canvas_image = new CanvasImage(image),
               temp_canvas_image_data = temp_canvas_image.getImageData(),
               pixels = temp_canvas_image_data.data,
               pixel_count = temp_canvas_image.getPixelCount();

           canvas_element = document.getElementById("output-canvas");
           canvas_context = canvas_element.getContext("2d");
           // read the width and height of the canvas
           canvas_element.width  = image.width;
           canvas_element.height = image.height;
           canvas_image_data = canvas_context.createImageData(image.width, image.height);

           for (var i = 0; i<pixels.length; i=i+4) {

              r = pixels[i + 0];
              g = pixels[i + 1];
              b = pixels[i + 2];
              a = pixels[i + 3];

              var abs_ary = [];
              for (var j = 0; j < palette.length; j++) {

                 var r_abs = Math.abs(r - palette[j][0]);
                 var g_abs = Math.abs(g - palette[j][1]);
                 var b_abs = Math.abs(b - palette[j][2]);
                 var abs = r_abs+g_abs+b_abs;
                 abs_ary.push(abs);

              }

              var min_index = abs_ary.indexOf(Math.min.apply(Math, abs_ary));

              canvas_image_data.data[i + 0] = palette[min_index][0];
              canvas_image_data.data[i + 1] = palette[min_index][1];
              canvas_image_data.data[i + 2] = palette[min_index][2];
              canvas_image_data.data[i + 3] = a;

           }

           // copy the image data back onto the canvas
           canvas_context.putImageData(canvas_image_data, 0, 0); // at coords 0,0

           // Clean up
           temp_canvas_image.removeCanvas();
        }

        function redrawImageWithColorWithBlock(image, palette, block_size) {

             var temp_canvas_image = new CanvasImage(image),
                 temp_canvas_image_data = temp_canvas_image.getImageData(),
                 pixels = temp_canvas_image_data.data,
                 pixel_count = temp_canvas_image.getPixelCount();

             canvas_element = document.getElementById("output-canvas");
             canvas_context = canvas_element.getContext("2d");
             // read the width and height of the canvas
             canvas_element.width  = image.width;
             canvas_element.height = image.height;
             canvas_image_data = canvas_context.createImageData(image.width, image.height);

             var pixels_index = 0;

             for (var y = 0; y < image.height; y += block_size) {

                for (var x = 0; x < image.width; x += block_size) {

                   var r_sum = 0;
                   var g_sum = 0;
                   var b_sum = 0;
                   var a_sum = 0;
                   var block_sum = 0;

                   for (var bi=0; bi<block_size; bi++) {

                      for (var bj=0; bj<block_size; bj++) {
                         r_sum = r_sum+pixels[((image.width * (y+bi)) + (x+bj) ) * 4];
                         g_sum = g_sum+pixels[((image.width * (y+bi)) + (x+bj) ) * 4 + 1];
                         b_sum = b_sum+pixels[((image.width * (y+bi)) + (x+bj) ) * 4 + 2];
                         a_sum = a_sum+pixels[((image.width * (y+bi)) + (x+bj) ) * 4 + 3];
                         block_sum++;
                      }

                   }

                   var r_avg = parseInt(r_sum/block_sum);
                   var g_avg = parseInt(g_sum/block_sum);
                   var b_avg = parseInt(b_sum/block_sum);
                   var a_avg = parseInt(a_sum/block_sum);

                   var abs_ary = [];
                     for (var j = 0; j < palette.length; j++) {

                        var r_abs = Math.abs(r_avg - palette[j][0]);
                        var g_abs = Math.abs(g_avg - palette[j][1]);
                        var b_abs = Math.abs(b_avg - palette[j][2]);
                        var abs = r_abs+g_abs+b_abs;
                        abs_ary.push(abs);

                   }

                   var min_index = abs_ary.indexOf(Math.min.apply(Math, abs_ary));

                   console.log(min_index);

                   for (var bi=0; bi<block_size; bi++) {
                       for (var bj=0; bj<block_size; bj++) {
                          canvas_image_data.data[((image.width * (y+bi)) + (x+bj) ) * 4] = palette[min_index][0];
                          canvas_image_data.data[((image.width * (y+bi)) + (x+bj) ) * 4 + 1] = palette[min_index][1];
                          canvas_image_data.data[((image.width * (y+bi)) + (x+bj) ) * 4 + 2] = palette[min_index][2];
                          //canvas_image_data.data[((image.width * (y+bi)) + (x+bj) ) * 4 + 3] = 1;
                       }
                   }


                }

             }


             // copy the image data back onto the canvas
             canvas_context.putImageData(canvas_image_data, 0, 0); // at coords 0,0

             // Clean up
             temp_canvas_image.removeCanvas();
          }

      });

      </script>

   </body>
</html>
