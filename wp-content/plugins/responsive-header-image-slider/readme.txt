=== WP Responsive header image slider ===
Contributors: wponlinesupport, anoopranawat 
Donate link: http://www.slidesjs.com/
Tags: responsive image slider, mobile tuch image slider, image slider, responsive header image slider, header image slider, responsive banner slider, banner slider, responsive header banner slider, header banner slider, responsive slideshow,  slideshow, custom post type, header image slideshow
Requires at least: 3.5
Tested up to: 4.7
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A quick, easy way to add an Responsive header image slider OR Responsive image slider inside wordpress page OR Template. Also mobile tuch image slider

== Description ==

This plugin add a Responsive header image slider in your website. Also you can add Responsive image slider page and mobile tuch slider in to your wordpress website.

View [DEMO](http://wponlinesupport.com/wp-plugin/sp-responsive-header-image-slider/) for additional information.

Check [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/sp-responsive-header-image-slider/) to know more.

Download our all [FREE 34 WordPress Plugins](https://www.wponlinesupport.com/wp-online-support-all-free-34-plugins/?utm_source=wp&event=fd).

The plugin adds a "Responsive header image slider" tab to your admin menu, which allows you to enter Image Title, Content, Link and image items just as you would regular posts.

Also added 3 designs "Responsive image slider-> Slider Designs". Select the design that you like and use shortcode. Also given complete shortcode.

To use this plugin just copy and past this code in to your header.php file or template file 
<code><div class="headerslider">
 <?php echo do_shortcode('[sp_responsiveslider]'); ?>
 </div></code>

You can also use this image slider inside your page with following shortcode 
<code>[sp_responsiveslider] </code>

If you want to select the design then you can use following parameter :
<code>[sp_responsiveslider design="design-1"] </code>
Where design: design-1, design-2, design-3

Display Image slider catagroies wise :
<code>[sp_responsiveslider cat_id="cat_id"]</code>
You can find this under  "Responsive image slider-> Slider Category".

= Complete shortcode is =
<code>[sp_responsiveslider design="design-1" cat_id="2" width="1024"
 first_slide="1" height="300" effect="fade" pagination="true" navigation="true"
 speed="3000" autoplay="true" autoplay_interval="3000"]</code>
 
Parameters are :

* **limit** : [sp_responsiveslider limit="-1"] (Limit define the number of images to be display at a time. By default set to "-1" ie all images. eg. if you want to display only 5 images then set limit to limit="5")
* **design** : [sp_responsiveslider design="design-1"] (Display image slider with 3 designs. value is design-1, design-2, design-3)
* **cat_id** : [sp_responsiveslider cat_id="2"] (Display Image slider catagroies wise.) 
* **first_slide** : [sp_responsiveslider first_slide="1"] (Set slider number that you want to display first)
* **effect** : [sp_responsiveslider effect="slide"] (Image slider effect. value is "slide" OR "fade")
* **pagination** : [sp_responsiveslider pagination="true"] (Display pagination or not. value is "true" OR "false")
* **navigation** : [sp_responsiveslider navigation="true"] (Display navigation or not. value is "true" OR "false")
* **speed** : [sp_responsiveslider speed="3000"] (Set slider speed)
* **autoplay** : [sp_responsiveslider autoplay="true"] (Set autoplay or not. value is "true" OR "false")
* **autoplay_interval** : [sp_responsiveslider autoplay_interval="3000"] (Set autoplay interval)

= Added new Features =
* 3 Design.
* Shortcode parameters. 
* Add custom link to image.
* Display muliple image slider on your website.
* Display Image slider catagroies wise  

= PRO Features Added : =
> <strong>Premium Version</strong><br>
>
> * WP header image slider is replaced with WP Slick Slider and Carousel
> * Added 16 Pro designs
> * 10 Image Slider Designs
> * 6 Image Carousel Slider
> * Display content with image and link in Carousel mode   
> * Simple & Easy to Use
>
> Check [PRO DEMO and Features](http://wponlinesupport.com/wp-plugin/sp-responsive-header-image-slider/) to know more.
> 

= Features include: =
* Mobile tuch slide
* Responsive
* Shortcode <code>[sp_responsiveslider]</code>
* Php code for place image slider into your website header  <code><div class="headerslider"> <?php echo do_shortcode('[sp_responsiveslider]'); ?></div></code>
* Image slider inside your page with following shortcode <code>[sp_responsiveslider] </code>
* Easy to configure
* Smoothly integrates into any theme
* CSS and JS file for custmization

== Installation ==

1. Upload the 'responsive-header-image-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the 'SP Responsive header image slider' list plugin through the 'Plugins' menu in WordPress.
3. If you want to place image slider into your website header, please copy and paste following code in to your header.php file  <code><div class="headerslider"> <?php echo do_shortcode('[sp_responsiveslider limit="-1"]'); ?></div></code>
4. You can also display this Image slider inside your page with following shortcode <code>[sp_responsiveslider limit="-1"] </code>


== Frequently Asked Questions ==

= Are there shortcodes for Image slider items? =

If you want to place image slider into your website header, please copy and paste following code in to your header.php file  <code><div class="headerslider"> <?php echo do_shortcode('[sp_responsiveslider limit="-1"]'); ?></div>  </code>

You can also display this Image slider inside your page with following shortcode <code>[sp_responsiveslider limit="-1"] </code>



== Screenshots ==

1. Design-1
2. Design-2
3. Design-3
4. Designs Views from admin side
5. Catagroies shortcode

== Changelog ==

= 3.0.3 =
* Added 'How it Work' for better user interface.
* Removed 'Design' page.

= 3.0.2 =
* Fixed some css issues.
* Resolved multiple slider jquery conflict issue.

= 3.0.1 =
* Added link for pro design.
* Fixed some bugs.
* Added support for language 

= 3.0 =
* Added 3 News Designs.
* Fixed some bugs.

= 2.1 =
* Fixed some bugs

= 2.0.1 =
* Fixed navigation ture OR false setting

= 2.0 =
* Fixed some bugs

= 1.3 =
* Added Slide and Fade effect option
* Added New setting options

= 1.2 =
* Fixed some bugs

= 1.1 =
* Add custom link to image
* Enable Or Disable custom link from setting 

= 1.0 =
* Initial release.


== Upgrade Notice ==

= 3.0.3 =
* Added 'How it Work' for better user interface.
* Removed 'Design' page.

= 3.0.2 =
* Fixed some css issues.
* Resolved multiple slider jquery conflict issue.

= 3.0.1 =
* Added link for pro design.
* Fixed some bugs.
* Added support for language 

= 3.0 =
* Added 3 News Designs.
* Fixed some bugs.

= 2.1 =
* Fixed some bugs

= 2.0.1 =
* Fixed navigation ture OR false setting

= 2.0 =
* Fixed some bugs

= 1.3 =
* Added Slide and Fade effect option
* Added New setting options

= 1.2 =
* Fixed some bugs

= 1.1 =
* Add custom link to image
* Enable Or Disable custom link from setting 

= 1.0 =
Initial release.