<?php
/**
 * slide-show-layout.php is the slide show layout
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-layout/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
      include_once SITE_ROOT."/fuku-view-component/meta-include.php";
      include_once SITE_ROOT."/fuku-view-component/icon-include.php";
      ?>
      <link rel="stylesheet" href="/public/javascript/library/reveal/css/reveal.min.css">
      <link rel="stylesheet" href="/public/javascript/library/reveal/css/theme/default.css" id="theme">
      <!-- For syntax highlighting -->
      <link rel="stylesheet" href="/public/javascript/library/reveal/lib/css/zenburn.css">
      <!--[if lt IE 9]>
         <script src="/public/javascript/library/reveal/lib/js/html5shiv.js"></script>
      <![endif]-->
      <style>
      body {
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
      }
      .reveal h1, .reveal h2, .reveal h3, .reveal h4, .reveal h5, .reveal h6 {
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
         text-transform: none;
      }
      .reveal .state-background {
         background: rgba(0,0,0,0.5);
      }
      .global-header {
         position: relative;
         width: 100%;
         height: 70px;
         line-height: 70px;
         margin: 0 auto;
         z-index: 2;
         font-size: 16px;
         background: #222;
         background: -moz-linear-gradient(top, #333 0%, #222 100%);
         background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #333), color-stop(100%, #222));
         background: -webkit-linear-gradient(top, #333 0%, #222 100%);
         background: -o-linear-gradient(top, #333 0%, #222 100%);
         background: -ms-linear-gradient(top, #333 0%, #222 100%);
         background: linear-gradient(to bottom, #333 0%, #222 100%);
         border-bottom: 1px solid #333;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
      }
      .global-header .wrapper {
         width: 100%;
         height: 100%;
         max-width: 1140px;
         margin: 0 auto;
         padding: 0 20px;
      }
      .global-header h1 {
         display: inline-block;
         top: 9px;
         margin: 0;
         float: left;
         vertical-align: middle;
      }
      .logo-animation {
         position: relative;
         height: 50px;
      }
      .logo-animation .word {
         display: inline-block;
         width: 80px;
         height: 30px;
         margin: 9px 0 0 8px;
         vertical-align: top;
         background-color: transparent;
         background-image: url(http://www.indievox.com/iv-asset/image/indievox-logo.png);
         background-size: 100%;
      }
      </style>
   </head>
   <body>
      <header class="global-header">
         <div class="wrapper">
            <h1 class="logo-animation">
               <a class="word" href="/"></a>
            </h1>
        </div>
      </header>
      <div class="reveal">
         <!-- Any section element inside of this container is displayed as a slide -->
         <div class="slides">
            <?php
            include_once SITE_ROOT.$yield_path;
            ?>
         </div>
      </div>
      <script src="/public/javascript/library/reveal/lib/js/head.min.js"></script>
      <script src="/public/javascript/library/reveal/js/reveal.min.js"></script>
      <script>
      // Full list of configuration options available here:
      // https://github.com/hakimel/reveal.js#configuration
      Reveal.initialize({
        controls: true,
        progress: true,
        history: true,
        center: true,

        theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
        transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

        // Optional libraries used to extend on reveal.js
        dependencies: [
          { src: '/public/javascript/library/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
          { src: '/public/javascript/library/reveal/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: '/public/javascript/library/reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: '/public/javascript/library/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
          { src: '/public/javascript/library/reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
          { src: '/public/javascript/library/reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
        ]
      });

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-41911929-1', 'fukuball.com');
        ga('send', 'pageview');
    </script>
  </body>
</html>