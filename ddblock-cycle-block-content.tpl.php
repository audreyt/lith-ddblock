<?php
// $Id$ 

/**
 * @file
 * Default theme implementation to display a dynamic display blocks from a dynamic display block instance.
 *
 * Available variables:
 * - $ddblock_origin: Original module of the block.
 * - $ddblock_delta: Block number of the block.
 * - $ddblock_pager: Pager type to add the dynamic display block.
 * - $ddblock_pager_height: Pager container height.
 * - $ddblock_pager_width: Pager container width.
 * - $ddblock_imgcache_pager_item: Image cache preset name for the pager item.
 * - $ddblock_content: themed content.
 */
?>


<!-- block content. -->
<div id="ddblock-<?php print $ddblock_delta; ?>" class="ddblock-contents clear-block" >
 <div class="ddblock-content clear-block">
  <?php if ($ddblock_content): ?>
   <?php if (($ddblock_pager == 'number-pager')): ?>
    <!-- number pager. -->
    <div id="ddblock-<?php print $ddblock_pager ."-". $ddblock_delta ?>" class="ddblock-<?php print $ddblock_pager ?> ddblock-pager clear-block" style="height: <?php print $ddblock_pager_height ?>px; width:<?php print $ddblock_pager_width ?>px;">
     <?php $item_counter=1; ?>
     <?php if (($ddblock_pager2 == 1)): ?>
	  <ul>
       <li>
        <a class="prev" href="#"><?php print $ddblock_prev?></a>
       </li>
       <li>
        <a class="next" href="#"><?php print $ddblock_next ?></a>
       </li>
	  </ul>
     <?php endif; ?> 
     <ul>
      <?php foreach ($ddblock_content as $item): ?>
       <li class="number-pager-item">
        <a href="#" class="pager-link" title="click to navigate to topic">
         <?php print $item_counter; ?>
        </a>
       </li>
       <?php $item_counter++;?>
      <?php endforeach; ?>
     </ul>
    </div>
   <?php endif; ?>  

   <?php if (($ddblock_pager == 'image-pager')): ?>
    <!-- image pager. -->
    <div id="ddblock-<?php print $ddblock_pager ."-". $ddblock_delta ?>" class="ddblock-<?php print $ddblock_pager ?> ddblock-pager clear-block" style="height: <?php print $ddblock_pager_height ?>px; width:<?php print $ddblock_pager_width ?>px;">
     <?php if (($ddblock_pager2 == 1)): ?>
      <ul>
	   <li>
        <a class="prev" href="#"><?php print $ddblock_prev?></a>
       </li>
       <li>
        <a class="next" href="#"><?php print $ddblock_next?></a>
       </li>
	  </ul>  
     <?php endif; ?> 
     <ul>
      <?php if($ddblock_imgcache_pager_item != '<none>'):?>
       <?php foreach ($ddblock_content as $image_file): ?>
        <li class="image-pager-item">
         <a href="#" class="pager-link" title="click to navigate to topic">
          <?php print theme('imagecache', $ddblock_imgcache_pager_item, $image_file); ?>
         </a>
        </li>
       <?php endforeach; ?>    
      <?php else :?>
       <?php foreach ($ddblock_content as $image_file): ?>
        <li class="image-pager-item">
         <a href="#" class="pager-link" title="click to navigate to topic"><img src="<?php print base_path() . $image_file; ?>" alt="" width="55" height="55" /></a>
        </li>
       <?php endforeach; ?> 
      <?php endif;?>
     </ul>
    </div>
   <?php endif; ?>

   <?php if ($ddblock_pager2 == 1 && $ddblock_pager == 'none'): ?>  
    <!-- prev next pager. -->
    <div id="ddblock-<?php print $ddblock_pager ."-". $ddblock_delta ?>" class="ddblock-<?php print $ddblock_pager ?> ddblock-pager clear-block" style="height: <?php print $ddblock_pager_height ?>px; width:<?php print $ddblock_pager_width ?>px;">
     <a class="prev" href="#"><?php print $ddblock_prev?></a>
     <a class="next" href="#"><?php print $ddblock_next?></a>
    </div>
   <?php endif; ?>  
  
   <?php if ($ddblock_output_type == 'images') : ?>
    <div class="ddblock-container visibility:hidden"> 
     <?php if($ddblock_imgcache_slide != '<none>'):?>
      <?php foreach ($ddblock_content as $image_file): ?>
       <?php print theme('imagecache', $ddblock_imgcache_slide, $image_file); ?>
      <?php endforeach; ?>    
     <?php else :?>
      <?php foreach ($ddblock_content as $image_file): ?>
       <img src="<?php print base_path() . $image_file; ?>" alt=""/>
      <?php endforeach; ?>    
     <?php endif;?>
     </div>
   <?php endif; ?>
  
   <?php if ($ddblock_output_type == 'content_array') : ?>
    <div class="ddblock-container"> 
     <?php foreach ($ddblock_content as $item): ?>
      <?php print($item); ?>
     <?php endforeach; ?>
    </div>
   <?php endif; ?>

   <?php if ($ddblock_output_type == 'view_content') : ?>
    <div class="ddblock-container"> 
     <?php print($ddblock_content); ?>
    </div>
   <?php endif; ?>
  <?php endif; ?>
 </div>
</div>
