<?php
/**
 * ckip-process-result.php
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
<h2>
   中研院斷詞結果：
</h2>
<div>
   <pre class="prettyprint">
      <?php
print_r($ckip_process_result_term);
      ?>
   </pre>
</div>
<section>
   <?php
   include_once SITE_ROOT.'/fuku-view-component/commercial/full-width-commercial.php';
   ?>
</section>