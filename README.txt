
Note: This is dev verison of the module. Please test and review the module and post
your issues on the project page http://drupal.org/project/ddblock to help improve
the module.


SUMMARY
-------
The Dynamic display block module enables you to create blocks to present content
in a dynamic way. For creating slideshow effects it uses the jQuery Cycle plug-in.

There are four ways to specify content for the Dynamic display block module:

* A folder containing image files
* A node from a content type with multiple input
* Views
* An instance of any created block

Several effects and other setting can be set in the configuration settings of the
Dynamic display block module.


MORE INFORMATION
----------------
Documentation in progress


REQUIREMENTS
------------
None


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
* Configure user permissions in the modules page: Modules

  - administer dynamic display blocks:

  - view dynamic display blocks:

* Manage module settings in Structure >> Dynamic display block.


ADVANCED SLIDESHOWS
-------------------
Documentation in progress

FAQ
---
For Frequently Asked Questions - http://ddblock.myalbums.biz/faq

CONTACT
-------
Original idea cycle module by roopletheme - http://drupal.org/user/164625

Major rewrite by current Maintainers:
* Philip Blaauw (ppblaauw) - http://drupal.org/user/155138

We also offer installation, development, theming, customization.
You can contact us via the contact form on http://ddblock.myalbums.biz.
or via email to ppblaauw (at) gmail.com