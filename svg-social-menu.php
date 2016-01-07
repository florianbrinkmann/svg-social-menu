<?php
defined( 'ABSPATH' ) or die( "Nothing to see!" );
/*
Plugin Name: SVG Social Menu
Plugin URI:
Description: This describes my plugin in a short sentence
Version:     1.0
Author:      Florian Brinkmann
Author URI:  https://florianbrinkmann.de
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
		wp_enqueue_script( 'svg-social-menu-svg4everybody', plugins_url( 'js/svg4everybody.js', __FILE__ ), array( 'jquery' ), false, true );
	}
}

add_action( 'wp_enqueue_scripts', 'svg_social_menu_scripts_styles' );

/**
 * Adds inline styles to the header
 *
 * You can filter the styles via the svg_social_menu_inline_style filter
 */

function svg_social_menu_inline_style() {
	$styles = '<style>.widget-svg-social-menu ul {padding-left: 0;}.widget-svg-social-menu ul li {float: left;list-style-type: none;margin: 0.7em;line-height: 0;font-size: .9em;}.widget-svg-social-menu ul svg {fill: #444; height: 2em; width: 2em;}.widget-svg-social-menu ul a:hover svg,.widget-svg-social-menu ul a:focus svg,.widget-svg-social-menu ul a:active svg {fill: #999;}</style>';
	echo apply_filters( 'svg_social_menu_inline_style', $styles );
}

add_action( 'wp_head', 'svg_social_menu_inline_style' );

require_once 'classes/class-svg-social-menu-walker.php';
require_once 'classes/class-svg-social-menu-widget.php';

function svg_social_menu_register_widget() {
	register_widget( 'Svg_Social_Menu_Widget' );
}

add_action( 'widgets_init', 'svg_social_menu_register_widget' );

function svg_social_menu_inline_style_change( $styles ) {
	$styles = '';
}

add_filter( 'svg_social_menu_inline_style', 'svg_social_menu_inline_style_change' );