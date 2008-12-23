<?php
// $Id$ 

/**
 * @file
 * Default theme implementation to display a dynamic display blocks from a dynamic display block instance.
 *
 * Available variables:
 * - $origin: Original module of the block.
 * - $delta: Block number of the block.
 * - $pager: Pager type to add the dynamic display block.
 * - $pager_height: Pager container height.
 * - $pager_width: Pager container width.
 * - $content: themed content
 * - custom content from view
 *
 * notes: don't change the ID names, they are used by the jQuery script.
 */
?>

<?php //number pager. ?>
<?php if (($pager == 'number-pager')): ?>
 <!-- number pager. -->
 <div id="ddblock-ddblock-<?php print $pager ."-". $delta ?>-nav" class="ddblock-<?php print $pager ?>-nav ddblock-pager-nav clear-block" style="height: <?php print $pager_height ?>px; width:<?php print $pager_width ?>px;">
 </div>
<?php endif; ?>  


<?php if (($pager == 'image-pager')): ?>
 <!-- image pager. -->
 <ul id="ddblock-ddblock-<?php print $pager ."-". $delta ?>-nav" class="ddblock-<?php print $pager ?>-nav ddblock-pager-nav clear-block" style="height: <?php print $pager_height ?>px; width:<?php print $pager_width ?>px;">
  <?php foreach ($content as $image_file): ?>
   <li>
    <a href="#" title="click to navigate to topic"><img src="<?php print base_path() . $image_file; ?>" alt="" width="55" height="55" /></a>
   </li>
  <?php endforeach; ?> 
 </ul>
<?php endif; ?>
<?php if ($pager == 'prev-next-pager'): ?>  
 <!-- prev next pager. -->
 <div class="nav">
  <a id="prev2" href="#">Previous</a>
  <a id="next2" href="#">Next</a>
 </div>
<?php endif; ?>  


<!-- block content. -->
<div id="ddblock-ddblock-<?php print $delta; ?>" class="ddblock-contents clear-block" style="visibility:hidden">
 <div class="ddblock-content clear-block">
  
  <?php if ($output_type == 'images') : ?>
   <?php foreach ($content as $image_file): ?>
    <img src="<?php print base_path() . $image_file; ?>" alt="" width="<?php print $image_width;?>px" height="<?php print $image_height; ?>px" />
   <?php endforeach; ?>    
  <?php endif; ?>
  
  <?php if ($output_type == 'content_array') : ?>
    <?php foreach ($content as $item): ?>
      <?php print($item); ?>
  <?php endforeach; ?>
  <?php endif; ?>


  <?php if ($output_type == 'view_content') : ?>
   <?php print($content); ?>
  <?php endif; ?>
 </div>
</div>




