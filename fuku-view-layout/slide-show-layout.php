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
      </style>
   </head>
   <body>
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
    </script>
  </body>
</html>