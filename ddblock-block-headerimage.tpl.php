<?php
// $Id$ 

/**
 * @file
 * Default theme implementation to display a header image blocks.
 *
 * Available variables:
 * - $script: jQuery script for the dynamic display block module.
 * - $origin: From which module comes the block.
 * - $delta: Block number of the block.
 * - $pager: Add a pager to the dynamic display block.
 * - $pager_height: Height of the container of the pager.
 * - $pager_width: Width of the container of the pager.
 * - $node: rendered node object
 * - $unpublished: node is unpublished
 * - $content: node content (teaser)
 *
 * notes: don't change the ID names, they are used by the jQuery script
 */

// get module path to dynamic display block module.
$module_path = drupal_get_path('module', 'ddblock'); 

//add jcycle plugin.
drupal_add_js($module_path .'/jquery.cycle.all.pack.js', 'module');

// add Cascading style sheet.
drupal_add_css($module_path .'/ddblock.css', 'module', 'all', FALSE);

// add dynamic display block javascript.
drupal_add_js($script, 'inline');

?>
<?php //pager ?>
<?php if ($pager <> 'none'): ?>
  <div id="ddblock-<?php print $origin ."-". $pager ."-". $delta?>-nav" class="ddblock-<?php print $pager?>-nav ddblock-pager-nav" style="height: <?php print $pager_height?>px; width: <?php print $pager_width?>px;">
<?php if ($pager == 'image-pager'): ?>
  <?php foreach ($content_array as $image_file): ?>
  <li><a href="#"><img src="<?php print base_path() . $image_file; ?>" alt="" width="50" height="50" /></a></li>
<?php endforeach; ?>   
<?php endif; ?>
</div>
<?php endif; ?>

<?php //block content ?>
<?php if ($unpublished): ?>
  <div class="node-unpublished">
  <?php endif; ?>
<div id="ddblock<?php print "-". $origin ."-". $delta; ?>" class="headerimage-contents">
  <div class="headerimage-content">
       <?php print($content); ?>
  </div>
</div>
<?php if ($unpublished): ?>
  </div>
<?php endif; 



