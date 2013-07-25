<?php
/**
 * javascript-include-bottom.php is bottom include javascript
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-view-component/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
?>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/javascript/library/form/jquery.form.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/javascript/library/jquery.scrollTo-1.4.3.1-min.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/javascript/library/iphone-style-checkboxes/jquery/iphone-style-checkboxes.js"></script>
<script>

   // live more
   $(document.body).off('click.show_more', '.show-more');
   $(window).off('scroll.show_more');
   function morePage(element) {

      if (element.length != 0) {

         var action_url = element.attr("data-action-url");
         var offset = element.attr("data-offset");
         var length = element.attr("data-length");

         $.ajax({
            url: action_url,
            type: "GET",
            data: {offset : offset, length : length},
            dataType: "html",
            beforeSend: function( xhr ) {
               element.html('<img src="/iv-asset/image/ui-icon/load-more.gif" />');
               $(document.body).off('click.show_more', '.show-more');
               $(window).off('scroll.show_more');
            },
            success: function( html_block ) {

               if (html_block!='') {
                  element.parent().append(html_block);
                  element.remove();
               } else {
                  element.remove();
               }

               $(window).on('scroll.show_more', function() {
                  if (($(window).scrollTop()+10) > $(document).height() - $(window).height()) {
                     if ($('.show-more').length) {
                        var this_element = $('.show-more');
                        morePage(this_element);
                     }
                  }
               });
               $(document.body).on('click.show_more', '.show-more', function() {
                  morePage($(this));
               });
            }
         });

      }

   }
   $(window).on('scroll.show_more', function() {
      if (($(window).scrollTop()+10) > $(document).height() - $(window).height()) {
         if ($('.show-more').length) {
            var this_element = $('.show-more');
            morePage(this_element);
         }
      }
   });
   $(document.body).on('click.show_more', '.show-more', function() {
      morePage($(this));
   });

   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

   ga('create', 'UA-41911929-1', 'fukuball.com');
   ga('send', 'pageview');

</script>