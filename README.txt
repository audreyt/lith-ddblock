// $Id$

Note: This is an beta version of the module for testing and review purpose only.
      Although the module functionally works. Don't use it on a production site.
      Please test and review the module and post your issues on the project page
      http://drupal.org/project/ddblock to help improve the module.

      
SUMMARY 
-------
Dynamic display block is a block module which enables you to create blocks to present
content in a dynamic way using the jQuery Cycle plug-in and optionally the jQuery 
easing plug-in.

You can select images as the content of a dynamic display block by specifying a
folder that contains the image files or select a node from a content type.
The teaser of the node of this content type will be used as the content of the
dynamic display block. A third way to provide content for the dynamic display block
is making an instance of an existing block and use the content of this block.

Several effects and other setting can be set in the configuration settings of a
dynamic display block.


MORE INFORMATION
----------------
You can find more information in the handbook pages on Drupal.org 
http://drupal.org/node/293714

You can see a demo of the module at http://ddblock.myalbums.biz/


REQUIREMENTS
------------
jQuery-update module.

Note: Drupal 6.3 already has the jQuery 1.2.6., but still we prefer to install
      jQuery update module for future versions of jQuery.

See INSTALL.txt


INSTALLATION
------------
See INSTALL.txt


COLLABORATION WITH OTHER MODULES
--------------------------------
The dynamic display block module can work together with all modules that provide
blocks. The content of the block can be displayed dynamically (one by one width
transition effects) if the content consist of e.g. Images, A list of listitems,
A table with tablerows, etc.

Example modules and blocks you can use

Module       - blocks
---------------------
Headerimage  - blocks with images
Comments     - Recent comments
Forum        - Active forum topics
Forum        - New forum topics
Views        - blocks with images, lists, tables
Worldclock   - World clock
etc.

* Set the blocks you want to use with the dynamic display block module in
  Administer >> Site configuration >> Dynamic display block - Settings tab.

* Make an instance of the block you want to use in Administer >> Site
  configuration >> Dynamic display block - Instance tab.

* Configure the block in Administer >> Site configuration >> Dynamic display
  block - List tab.

  Dont forget to set the Container value to the tag you want to show

* Add the block to a region in in Administer >> Site Building >> Blocks.

CONFIGURATION
-------------
* Configure user permissions in Administer >> User management >> Permissions  
  >> ddblock module:

  - administer dynamic display blocks:

  - view dynamic display blocks:

* Customize module settings in Administer >> Site configuration >> Dynamic
  display block.

  - Create a dynamic display block and configure the block (leave all default settings).

  - Place some pictures in the /files/images/ddblock folder (.jpg, .gif or .png) files.

  - Navigate to Administer > Site building > Blocks

  - Place the block in one of the regions of your Site.

* Settings:

Input type: Which content to use with the dynamic display block

Image folder settings:

 - Image Folder: The folder containing image files to be used as the content of
   dynamic display block. Use a relative path. The default is files/images/ddblock

 - Number of images: The number of images to show in the block.

Content type settings:

 - Content Type: The nodes of the content type to be used as content of dynamic display
   block.

 - Node: The node to show in the Dynamic display block.

Content container settings:

 - Content container: Container of the content to show, eg. img, to show images.

 - Height: Height of the content to show.

 - Width: Width of the content to show.

Image settings:

 - Height: Height of the image to show.

 - Width: Width of the image to show.

Settings:

 - Transition Effect: The transition effect between content.

 - Speed: Speed of the transitions (1000 = 1 second).

 - Timeout: The time (in Milliseconds) between transitions (1000 = 1 second, 0 to
   disable auto advance).

 - Sort Order: The display order of the content.

 - Pause: Enable users to pause the cycle by hovering on the content.

 - Next: Enable users to advanced to the next content by clicking on the content.

 - Pager: Add a number pager or an image pager to a dynamic display block.
          You can only add a image pager if your use images from an image folder.

 - Pager_height: Height of the pager.

 - Pager_width: Width of the pager.

Custom Settings:

 - Custom Options: Add or override custom options for the cycle plug-in.
                   The settings transition effect, container and pager from
                   the settings are used, but can be overriden.

TROUBLESHOOTING
---------------
* If a dynamic display block is not displayed, check the following steps:

  - Is the 'view dynamic display blocks' permission enabled?

  - Did you put the block in one of the regions?


FAQ
---

CONTACT
-------
Original idea cycle module by roopletheme - http://drupal.org/user/164625

Major rewrite by current Maintainers:
* Philip Blaauw (ppblaauw) - http://drupal.org/user/155138
* Iren T. Biasong (iren_cruz) - http://drupal.org/user/305000

We also offer installation, development, theming, customization.
Visit http://ddblock.myalbums.biz for more information.