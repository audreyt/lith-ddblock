// $Id$

Note: This is an alpha version of the module for testing and review purpose only. 
      Although the module functionally works. Don't use it on a production site.

      
-- SUMMARY --

Dynamic display block is a block module which creates a block that presents 
content in a dynamic way using the jQuery Cycle plug-in and optionally 
the jQuery easing plug-in. 

You can select images as the content of a dynamic display block by specifying a 
folder that contains the image files or select a content type. The teaser of the 
nodes of this content type will be used as the content of the dynamic display 
block. 

Also header image blocks from the Header Image module can be used. To use the 
functionality of the Header Image module a small patch has to be applied to this 
module. (We have contacted the maintainer of the Header Image module to let the 
Dynamic Display block module cooperate with the Header Image module to avoid 
using a patch)

The module does not attempt to size, scale, crop, or otherwise alter images. 
It will be displayed exactly as it exists. You can use CSS and/or HTML to have 
the browser scale the images if necessary. The best option is to size the images 
before you use them in a dynamic display block.

The module uses the teaser of content types and doesn't show extra links if a 
content type is chosen as the content of a dynamic display block.

Several effects and other setting can be set in the configuration settings of a 
dynamic display block.


-- REQUIREMENTS --

The dynamic display block depends on the jQuery-update module.

Note: Drupal 6.3 already has the jQuery 1.2.6., but still we prefer to install 
  jQuery update module for future versions of jQuery.

See INSTALL.txt


-- INSTALLATION --

See INSTALL.txt 


-- CONFIGURATION --

* Configure user permissions in Administer >> User management >> Permissions  >> ddblock module:

  - administer dynamic display blocks:

  - view dynamic display blocks:

* Customize module settings in Administer >> Site configuration >> Dynamic 
  display block.
  
  - Create a dynamic display block and configure the block (leave all default settings). 

  - Place some pictures in the /files/images/ddblock folder (.jpg, .gif or .png) files.

  - Navigate to Administer > Site building > Blocks 

  - Place the block in one of the regions of your Site.

* Settings:

Image Folder: The folder containing image files to be used as the content of 
dynamic display block. Use a relative path. The default is files/images/ddblock

Height: Height of the image to show.

Width: Width of the image to show.

Content Types: The nodes of the content type to be used as content of dynamic display block.

Node: The node to show in the Dynamic display block.

Content container: Container of the content to show, eg. img, to show images.

Height: Height of the content to show.

Width: Width of the content to show.

Settings:

Transition Effect: The transition effect between content.

Speed: Speed of the transitions (1000 = 1 second).

Timeout: The time (in Milliseconds) between transitions (1000 = 1 second, 0 to 
disable auto advance).

Sort Order: The display order of the content.

Pause: Enable users to pause the cycle by hovering on the content.

Next: Enable users to advanced to the next content by clicking on the content.

Pager: Add a number pager or an image pager to a dynamic display block. 
       You can only add a image pager if your use images from an image folder.

Pager_height: Height of the pager.

Pager_width: Width of the pager.

Custom Settings:

Custom Options: Add or override custom options for the cycle plug-in. 
                The settings transition effect, container and pager from 
                the settings are used, but can be overriden.  


-- TROUBLESHOOTING --

* If a dynamic display block is not displayed, check the following steps:

  - Is the 'view dynamic display blocks' permission enabled?

  - Did you put the block in one of the regions?


-- FAQ --


-- CONTACT --

Original idea cycle module by roopletheme - http://drupal.org/user/164625

Major rewrite by current Maintainers:
* Philip Blaauw (ppblaauw) - http://drupal.org/user/155138
* Iren T. Biasong (iren_cruz) - http://drupal.org/user/305000

We also offer installation, development, theming, customization.
Visit http://ddblock.myalbums.biz for more information.
