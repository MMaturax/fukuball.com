<?php
/**
 * error-redirect.php is the view of error redirect
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fuku-core/ErrorMessenger/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
?>
<script>
   window.location = "<?php echo $error_redirect_url; ?>";
</script>