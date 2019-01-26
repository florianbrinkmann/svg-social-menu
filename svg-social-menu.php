<?php
defined( 'ABSPATH' ) or die( "Nothing to see!" );
/*
Plugin Name: SVG Social Menu
Plugin URI: https://florianbrinkmann.de/2000/ein-social-icons-menue-mit-svgs-in-wordpress-umsetzen/
Description: Display your social media profile links with vector icons using a custom navigation menu.
Version:     1.3.0
Author:      Florian Brinkmann
Author URI:  https://florianbrinkmann.com/en/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: svg-social-menu

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

/**
 * Load the language files
 */
function svg_social_menu_load_translation() {
	load_plugin_textdomain( 'svg-social-menu' );
}

add_action( 'plugins_loaded', 'svg_social_menu_load_translation' );

/**
 * Register Theme Location
 */
function svg_social_menu_register_theme_location() {
	if ( ! array_key_exists( 'svg-social-menu', get_registered_nav_menus() ) ) {
		register_nav_menu( 'svg-social-menu', __( 'SVG Social Menu', 'svg-social-menu' ) );
	}
}

add_action( 'after_setup_theme', 'svg_social_menu_register_theme_location' );

/**
 * Adds the scripts and styles
 */
function svg_social_menu_scripts_styles() {
	if ( has_nav_menu( 'svg-social-menu' ) ) {
		wp_enqueue_script( 'svg-social-menu-svg4everybody', plugins_url( 'js/svg4everybody.js', __FILE__ ),
			array( 'jquery' ), false, true );
	}
}

add_action( 'wp_enqueue_scripts', 'svg_social_menu_scripts_styles' );

/**
 * Adds inline styles to the header
 *
 * You can filter the styles via the svg_social_menu_inline_style filter (see readme for examples)
 */

function svg_social_menu_inline_style() {
	$styles = '<style>.svg-social-menu .screen-reader-text {clip: rect(1px, 1px, 1px, 1px);height: 1px;overflow: hidden;position: absolute !important;word-wrap: normal !important;
	}.svg-social-menu {padding-left: 0;}.svg-social-menu li {display: inline-block; list-style-type: none;margin: 0 0.5em 0.5em 0;line-height: 0;font-size: .9em;}.svg-social-menu li::before {display: none;}.svg-social-menu svg {fill: currentColor; height: 2em; width: 2em;}.svg-social-menu a, .svg-social-menu li {background: none; border: none; box-shadow: none;}.svg-social-menu a:hover,.svg-social-menu a:focus,.svg-social-menu a:active {background:none;border:none;box-shadow:none;color:currentColor;}.svg-social-menu a:hover svg,.svg-social-menu a:focus svg,.svg-social-menu a:active svg {opacity: .7;}</style>';
	echo apply_filters( 'svg_social_menu_inline_style', $styles );
}

add_action( 'wp_head', 'svg_social_menu_inline_style' );

require_once 'classes/class-svg-social-menu-walker.php';
require_once 'classes/class-svg-social-menu-widget.php';

function svg_social_menu_register_widget() {
	register_widget( 'Svg_Social_Menu_Widget' );
}

add_action( 'widgets_init', 'svg_social_menu_register_widget' );
