=== SVG Social Menu ===
Contributors: FlorianBrinkmann
Tags: widget, social, menu, svg, vector, custom nav menu
Requires at least: 3.4.0
Tested up to: 4.6.1
Stable tag: 1.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display your social media profile links with vector icons using a custom navigation menu.

== Description ==

This plugin adds a Widget that allows you to show show the social media links as vector icons.

To use it, follow these steps after activation:

1. Create a menu with links to your social media channels
2. Select “SVG Social Menu” as menu location and save it
3. Drag the widget “SVG Social Menu” in one of your widget areas

You can filter the custom CSS with the following code in your theme, where `$styles` is the CSS:

`function slug_edit_svg_social_menu_styles( $styles ) {
    $styles = '';
}

add_filter( 'svg_social_menu_inline_style', 'slug_edit_svg_social_menu_styles' );`

The following social network URLs are supported:

* plus.google.com
* wordpress.org
* wordpress.com
* facebook.com
* twitter.com
* dribbble.com
* pinterest.com
* github.com
* tumblr.com
* youtube.com
* flickr.com
* vimeo.com
* instagram.com
* linkedin.com
* xing.de
* xing.com
* /feed
* mailto:

If you want more or have other problems, you can create an issue on [GitHub](https://github.com/FlorianBrinkmann/svg-social-menu).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/svg-social-menu` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the “Plugins” screen in WordPress
3. Create a menu with links to your social media channels
4. Select “SVG Social Menu” as menu location and save it
5. Drag the widget “SVG Social Menu” in one of your widget areas

== Changelog ==

= 1.1.1 =
* prefix class names for svg elements to prevent ad blocker from hiding icons

= 1.1 =
* tested with 4.6
* added email icon for mailto: links

= 1.0.6 =
* moved span after the svg element (before it was inside accidently) and added missing closing tag

= 1.0.5 =
* better accessibility of svgs, added screen reader span to the link element instead of using the title element inside the svg

= 1.0.4 =
* removed filter which causes the deletion of the standard styles

= 1.0.3 =
* added changelog notice for 1.0.2

= 1.0.2 =
* replaced wrong translation function

= 1.0.1 =
* load textdomain for translation

= 1.0 =
* initial release