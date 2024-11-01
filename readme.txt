=== Xtreme Zoom Menu ===
Contributors: Flashtuning 
Tags: free menu, free flash, autoplay, flashvars, infinite, menu, scroll, scroller, tooltip, xml, zoom, zoom menu
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML Zoom Menu application. No Flash Knowledge required to insert the Zoom Menu SWF inside the HTML page(s) of your site.

== Description ==

XML Zoom Image Menu / XML Scroller Photo Menu & XML AutoPlay Menu.

**Features**

* No Flash Knowledge required to insert the Zoom Menu SWF inside the HTML page(s) of your site
* Fully customizable XML driven content
* Unlimited number of images ( JPG, PNG, BMP, GIF ) and SWF support
* Customizable width, height, position and item size for the zoom menu
* Easy to use XML file for images / tooltips / titles / descriptions and links
* AutoPlay ( AutoScroll ) with global or individual timer for each image
* The menu can be configured to support Infinite or normal scroller modes
* You can use images at fixed or custom size (images having variable width / height)
* Optional you can show / hide two navigation buttons and adjust the each button position
* Individual items selection or mouse roll over scroll effect options for AutoScroll mode
* Time period adjustable from the XML file (in seconds)
* Both horizontal and vertical menu orientation support
* Dynamic image reflection with transparency, distance and direction settings
* Image ToolTips with automatic text wrapping, font embedding, background and border color / size support
* HTML / CSS driven ToolTips description text and ToolTips position, offest support
* Items alignment and rollover mouse movement speed options
* Set URL links when pressing on individual images
* Display the items in the order they appear in your XML file or in a random order
* Optional image highlighting feature for the active / inactive items
* Define image borders size/color from within the XML configuration file
* Image tooltips, spacing, mouse roll over blur effect and click support
* Optionally set the XML settings file path in HTML using FlashVars


== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free XtremeZoomMenu](http://www.flashtuning.net/flash-samples/XtremeZoomMenuFree.zip "Xtreme Zoom Menu") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-zoom-menu")
3. Insert the swf into post or page using this tag: `[xtreme-zoom-menu]`. The default values for width and height are 600 220. If you want other values write the width and height attributes into the tag like so: `[xtreme-zoom-menu width="yourvalue" height="yourvalue"]`
4. To configure the zoom menu general parameters use the zoom-settings.xml. For individual zoom menu items use the zoom-contents.xml file (image path, image link and more). Enter [Flashtuning.net](http://www.flashtuning.net "Flashtuning") and play with the settings of the [Xtreme Zoom Menu](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-zoom-menu-xml-as3.html "Sample Xtreme Zoom Menu") online demo.
5. If you want to use multiple instances of Xtreme Dock Menu on different pages. Follow this steps:
   a. There are 2 xml files in **wp-content/flashtuning/xtreme-zoom-menu** folder: **zoom-settings.xml**, used for general settings, and **zoom-content.xml**, used for individual items.
   b. Modify the 2 xml files according to your needs and rename them (eg.: **zoom-settings2.xml**, **zoom-content2.xml**)
   c. Open the **zoom-settings2.xml**, search for this tag `< object param="contentXML"	value="zoom-content.xml" />` and change the attribute **value** to **zoom-content2.xml** .
   d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-zoom-menu** .
   e. Use the **xml** attribute `[xtreme-zoom-menu xml="zoom-settings2.xml"]` when you insert the zoom menu on a page.
6. Optionally for custom pages use this php function: `xtremeZoomMenuEcho(width,height,xmlFile)` (e.g: **xtremeZoomMenuEcho(600,220,'zoom-settings.xml')** )

= Remove the Flashtuning.net logo =

If you don’t want to have the Flashtuning.net logo on the bottom left corner, you'll have to purchase the [commercial package](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-zoom-menu-xml-as3.html "FT Xtreme Zoom Menu"). You'll also have access to the fla file. After downloading the commercial archive, overwrite the swf file from the `/wp-content/flashtuning/xtreme-zoom-menu` directory.

== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-zoom-menu-xml-as3.html "Sample Xtreme Zoom Menu") ). No Flash Knowledge required to insert the Zoom Menu SWF inside the HTML page(s) of your site.

