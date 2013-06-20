<?php
/**
 * error-redirect.php is the view of error redirect
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /iv-class/message/IndievoxErrorMessengerView
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  Release: <1.0>
 * @link     http://www.indievox.com
 */
?>
<script>
   window.location = "<?php echo $error_redirect_url; ?>";
</script>