<?php
/**
 * meta-include.php is head include meta
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

switch ($meta_type) {

default:
   $og_title = $page_title;
   $og_type = "website";
   $og_url = $current_page_full_url;
   $og_image = SITE_HOST."/public/image/avatar3.jpg";
   $og_description = SITE_HOST." CTO of iNDIEVOX 獨立音樂網, the largest indie music web site in Taiwan. / I'm also a happy guitar player.";
   $keywords = "fukuball, Fukuball Lin, 林志傑";
   break;

}
?>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<title><?php echo htmlspecialchars($page_title); ?></title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="description" content="<?php echo htmlspecialchars($og_description); ?>" />
<meta name="author" content="Fukuball" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@fukuball" />
<meta property="og:title" content="<?php echo htmlspecialchars($og_title); ?>" />
<meta property="og:type" content="<?php echo $og_type; ?>" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<meta property="og:image" content="<?php echo $og_image; ?>" />
<meta property="og:description" content="<?php echo htmlspecialchars($og_description); ?>" />