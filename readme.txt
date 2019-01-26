=== SVG Social Menu ===
Contributors: FlorianBrinkmann
Tags: widget, social, menu, svg, vector, custom nav menu
Requires at least: 3.4.0
Tested up to: 5.0.3
Stable tag: 1.3.0
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
    $styles = '<style>yourStyles</style>';

    return $styles;
}

add_filter( 'svg_social_menu_inline_style', 'slug_edit_svg_social_menu_styles' );`

If you want to add CSS to the default rules, try this:

`function slug_edit_svg_social_menu_styles( $styles ) {
    $styles .= '<style>additionalStyles</style>';

    return $styles;
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
* amazon.de
* amazon.com
* amazon.co.uk
* amazon.es
* telegram.me
* t.me
* behance.net

If you want more or have other problems, you can create an issue on [GitHub](https://github.com/FlorianBrinkmann/svg-social-menu).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/svg-social-menu` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the “Plugins” screen in WordPress
3. Create a menu with links to your social media channels
4. Select “SVG Social Menu” as menu location and save it
5. Drag the widget “SVG Social Menu” in one of your widget areas

== Changelog ==

= 1.3.0 – 26.01.2019 =

**Added**

* Support for Amazon, Telegram, Behance, and Codepen.

**Changed**

* Updated the existing icons to the latest versions.

= 1.2.3 — 08.11.2017 =

**Changed**

* Updated »Tested up to« version to 4.9.
* Modified inline styles to make them also work if the theme does not use the feature to add identifying classes to the widget wrapper.

= 1.2.2 — 26.05.2017 =
* tested with 4.8
* CSS improvements (use currentColor for Icons)
* Updated svg4everybody to 2.1.8

= 1.2.1 =
* tested with 4.7.3
* fixed filter doc in readme

= 1.2 =
* tested with 4.7
* added Grunt for creating the svg sprite (thanks to Stefan Brechbühl aka pixelstrolch)

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
