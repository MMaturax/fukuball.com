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

global $current_page_full_url;

switch ($meta_type) {

case 'ckip':
   $og_title = $page_title;
   $og_type = "website";
   $og_url = $current_page_full_url;
   $og_image = SITE_HOST."/public/image/avatar4.jpg";
   $og_description = "自然語言處理系統最基本需要讓電腦能夠分辨文本中字詞的意義，才能夠更進一步發展出自然語言處理系統的相關演算法，其中斷詞處理便是一個重要的前置技術， CKIP Client 線上中文斷詞服務網站使用了中研院斷詞系統的 Client 端程式，讓有中文斷詞需求的研究者或程式人員可以專注於開發自己的核心演算法。";
   $keywords = "fukuball, Fukuball Lin, 林志傑, CKIP-Client, CKIPClient-PHP, 中研院斷詞系統客戶端程式, 中文斷詞, 自然語言處理";
   break;

default:
   $og_title = $page_title;
   $og_type = "website";
   $og_url = $current_page_full_url;
   $og_image = SITE_HOST."/public/image/avatar4.jpg";
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