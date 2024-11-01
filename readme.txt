=== them.es Plus ===
Contributors: them.es
Tags: bootstrap, slideshow, slider, gallery, portfolio filter, google maps, google analytics, count down, count up, progressbar, grid
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Useful Add-ons for WordPress Themes built with Bootstrap.

== Description ==

= Target Group? =

* __With the release of WordPress 5.0 in December 2018 this Plugin is no longer maintained. Most features from this Plugin have been added by default in the new block based [WordPress Editor](https://wordpress.org/gutenberg/handbook/). Other features are planned to be included in a future WordPress release or can be added by installing one of the awesome Plugins which are compatible with WordPress 5.0:__ [Atomic Blocks](https://wordpress.org/plugins/atomic-blocks), [Stackable – Gutenberg Blocks](https://wordpress.org/plugins/stackable-ultimate-gutenberg-blocks), [Editor Blocks](https://wordpress.org/plugins/editor-blocks), [Block Gallery](https://wordpress.org/plugins/block-gallery)
* WordPress Themes built with the [Bootstrap](http://getbootstrap.com/ "Bootstrap") framework
* Installing this Plugin is recommended for [them.es](http://them.es/starter-bootstrap "them.es") Starter Bootstrap Theme users who want to implement the featured Modules

= Looking for a compatible Theme? =

* Generate your customized __Bootstrap Starter Theme__ under [http://them.es/starter-bootstrap](http://them.es/starter-bootstrap "them.es") - It's free!

= What you get? =

* `[Shortcodes]` and Customization
* Demos and Docs can be found under [http://them.es/plus](http://them.es/plus/ "them.es+")
* Recent Posts, Progress bars/charts, Count down to date, Funny Count up Stats, Carousel, Grid, etc.
* Google Maps, Google Analytics
* WordPress Standard Image Gallery hooks, Slider, Portfolio Filter
* TinyMCE Button

= Compatibility? =

* Some Styles and Javascripts depend on Bootstrap - __Please note that the required Bootstrap components are not included in the Plugin!__
* __In order to work properly the Plugin needs to be installed on systems with Bootstrap powered Themes__

= Feedback/Help/Contribution? =

* The Development of this Plugin can be followed via GitHub <3
* We are happy to receive feedback, questions, feature suggestions and pull requests: [https://github.com/them-es/themes-plus](https://github.com/them-es/themes-plus "GitHub")

== Screenshots ==

1. TinyMCE Button
2. Shortcodes WYSIWYG
3. Edit a Post Element
4. WordPress Image Gallery hooks

== Installation ==

1. Upload the Plugin to the `/wp-content/plugins/` directory
2. Activate it through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= What modules are included? Where can I find the Developer Documentation? =

* __Demos and Docs can be found here:__
  * [http://them.es/plus](http://them.es/plus "them.es+")
* __Modules__ can be added and setup using the them.es+ button in the TinyMCE Editor
* __Image Galleries__, __Slideshows__ and the __Portfolio__ are built upon WordPress galleries

= How can I add Image Galleries and slideshows? =
* Gallery hooks can be activated by __Creating a new WordPress Gallery__, adding images and selecting the __Type__ in the Gallery settings

= How can I setup a Portfolio Filter? =
* Upload all images which should appear in the Portfolio to the Media library
* __Name__ and __Tag__ them accordingly. Images are grouped in the filter by using the same tag!
* Create a new WordPress Gallery and select Type __Portfolio Filter__

= Does this Plugin work with my Theme? =
* The Plugin has been primarily developed to bring additional features into [them.es](http://them.es/ "them.es") Themes
* It should work out-of-the-box if your WordPress Theme has been built with Bootstrap and if all Bootstrap components are included in your Theme

= Where can I get help? =
* You can ask questions in the Support forums
  * [https://wordpress.org/support/plugin/themes-plus](https://wordpress.org/support/plugin/themes-plus "WordPress Support")
  * [http://them.es/support](http://them.es/support "them.es Support")
* WordPress developers are welcome to help us improve the Plugin via [GitHub](https://github.com/them-es "GitHub")
  
== Upgrade Notice ==

= 1.3.1 =
* Added WordPress 5.0 deprecation notice

= 1.3 =
* Feature: Compatible with Bootstrap 4
* Spring Cleanup: Google Analytics API, Progressbar type "Easy-pie-chart" and the Carousels have been removed.

= 1.2.7 =
* Bugfix: Portfolio Filter now working with Shuffle.js 5.0

= 1.2.4 =
* Ensure future PHP compatibility

= 1.2.0 =
* Important change: The simple Contact Form has been removed. We recommend to installing the Ninja Forms builder or the Contact Form 7 Plugin instead.

= 1.1.9 =
* Bugfixes: Google Maps and Animated Progress chart were not initialized

= 1.1.7 =
* Bugfix: Fixed Animations flickering in Progress charts

= 1.1.2 =
* Important change: For consistency reasons the inner Content Carousel shortcode [item] got replaced with [carouselslide]

= 1.1.1 =
* Support for custom Marker images in Maps

= 1.1 =
* Public Release in the WordPress Plugin directory
* Updated documentation

== Changelog ==

= 1.3 =
* Spring Cleanup
* Webpack bundling

= 1.2.7 =
* Filter: Added latest release of Shuffle.js
* Animated Progress Chart: Added latest release of Easy Pie Chart
* Gallery Grid: Added latest release of Salvattore Masonry
* Shortcake: Added latest release

= 1.2.6 =
* Filter: Added latest release of Shuffle.js
* Countdown: Added latest release of jquery-countDown
* Shortcake: Added latest release

= 1.2.5 =
* Google Maps: Optional API Key
* Portfolio-Filter: Added latest release of Shuffle.js

= 1.2.4 =
* Ensure future PHP compatibility

= 1.2.3 =
* Portfolio-Filter: Added Init-Javascript in own file (will work with Autoptimize-Plugin now)

= 1.2.2 =
* Shortcake: Added latest release

= 1.2.1 =
* Shortcake: Added latest release

= 1.2.0 =
* Shortcake: Added latest release
* Contact form: Removed in this release

= 1.1.9 =
* Shortcake: Added latest release

= 1.1.8 =
* Recent Posts Shortcode: Add posts array via "ids" attribute (similar to Galleries)
* Shortcake: Added latest release to improve WordPress 4.2 compatibility

= 1.1.7 =
* Changes: Smooth height transitions in Content Slider
* Shortcake: Added latest release

= 1.1.6 =
* Changes: New type "Chart" in Progress bar. Added a title attribute.
* Shortcake: Added latest release
* Added license.txt

= 1.1.5 =
* Contactform: Optional custom email as recipient `[contactform email="email@domain.tld"]`
* Shortcake: Added latest release. Moved files to /inc/shortcake. Only load if class doesn't exist already!

= 1.1.4 =
* WordPress Customizer API: Google Analytics, Google Maps (Add a Marker image, Default latlng/zoom, Map styles)

= 1.1.3 =
* New feature: Animated Progress bar `[progressbar]40[/progressbar]`

= 1.1.2 =
* New features: Countdown Timer shortcode `[timer]January 01, 2020 12:00:00[/timer]`, Count up Stats shortcode `[countup]123456[/countup]`
* Changes: Content Carousel shortcode pattern `[carousel][carouselslide]...[/carouselslide][carouselslide]...[/carouselslide][/carousel]`
* Updates: Shortcake Plugin, Minor CSS changes in Gallery Grids (fixed glitch w/ Twentyfourteen Theme)

= 1.1.1 =
* New feature: Maps now support a Marker image URL attribute, Contact form and Map shortcodes now allow custom class/style attributes
* Updates: Shortcake Plugin, JS changes
* Minor bugfixes

= 1.1 =
* New feature: Integrated the Shortcake Plugin
* Minor bugfixes

= 1.1a =
* New feature: Portfolio Filter
* Updates: Minor CSS changes, Translations
* Docs: Added Dependencies and Licence information

= 1.0 =
* Initial Release
* GitHub repository