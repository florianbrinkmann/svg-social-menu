<?php

/**
 * Class Svg_Social_Menu_Walker
 *
 * Extends the Walker_Nav_Menu and displays SVG for social media channels
 */
class Svg_Social_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 3.0.0
	 * @since 4.4.0 'nav_menu_item_args' filter was added.
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param array $args An array of arguments. @see wp_nav_menu()
	 * @param int $id Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent    = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		/**
		 * Filter the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param array $args An array of arguments.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item The current menu item.
		 * @param array $args An array of {@see wp_nav_menu()} arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		/**
		 * Filter the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param object $item The current menu item.
		 * @param array $args An array of {@see wp_nav_menu()} arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $class_names . '>';
		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';
		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 * @type string $title Title attribute.
		 * @type string $target Target attribute.
		 * @type string $rel The rel attribute.
		 * @type string $href The href attribute.
		 * }
		 *
		 * @param object $item The current menu item.
		 * @param array $args An array of {@see wp_nav_menu()} arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 */
		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		/**
		 * Filter a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string $title The menu item's title.
		 * @param object $item The current menu item.
		 * @param array $args An array of {@see wp_nav_menu()} arguments.
		 * @param int $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		/**
		 * Build array to get the class name for the social network in the SVG
		 */
		$social_media_channels = array(
			'plus.google.com' => array(
				'id'                 => 'icon-google-plus',
				'screen-reader-text' => __( 'Google Plus', 'hannover' )
			),
			'wordpress.org'   => array(
				'id'                 => 'icon-wordpress',
				'screen-reader-text' => __( 'WordPress.org', 'hannover' )
			),
			'wordpress.com'   => array(
				'id'                 => 'icon-wordpress',
				'screen-reader-text' => __( 'WordPress.com', 'hannover' )
			),
			'facebook.com'    => array(
				'id'                 => 'icon-facebook',
				'screen-reader-text' => __( 'Facebook', 'hannover' )
			),
			'twitter.com'     => array(
				'id'                 => 'icon-twitter',
				'screen-reader-text' => __( 'Twitter', 'hannover' )
			),
			'dribbble.com'    => array(
				'id'                 => 'icon-dribbble',
				'screen-reader-text' => __( 'Dribbble', 'hannover' )
			),
			'pinterest.com'   => array(
				'id'                 => 'icon-pinterest',
				'screen-reader-text' => __( 'Pinterest', 'hannover' )
			),
			'github.com'      => array(
				'id'                 => 'icon-github',
				'screen-reader-text' => __( 'GitHub', 'hannover' )
			),
			'tumblr.com'      => array(
				'id'                 => 'icon-tumblr',
				'screen-reader-text' => __( 'Tumblr', 'hannover' )
			),
			'youtube.com'     => array(
				'id'                 => 'icon-youtube',
				'screen-reader-text' => __( 'YouTube', 'hannover' )
			),
			'flickr.com'      => array(
				'id'                 => 'icon-flickr',
				'screen-reader-text' => __( 'Flickr', 'hannover' )
			),
			'vimeo.com'       => array(
				'id'                 => 'icon-vimeo',
				'screen-reader-text' => __( 'Vimeo', 'hannover' )
			),
			'instagram.com'   => array(
				'id'                 => 'icon-instagram',
				'screen-reader-text' => __( 'Instagram', 'hannover' )
			),
			'linkedin.com'    => array(
				'id'                 => 'icon-linkedin',
				'screen-reader-text' => __( 'LinkedIn', 'hannover' )
			),
			'xing.de'         => array(
				'id'                 => 'icon-xing',
				'screen-reader-text' => __( 'Xing', 'hannover' )
			),
			'xing.com'        => array(
				'id'                 => 'icon-xing',
				'screen-reader-text' => __( 'Xing', 'hannover' )
			),
			'/feed'           => array(
				'id'                 => 'icon-feed',
				'screen-reader-text' => __( 'Feed', 'hannover' )
			),
		);

		$svg_id = "";

		foreach ( $social_media_channels as $key => $value ) {
			$pattern = "|$key|";
			preg_match( $pattern, $atts['href'], $matches );
			if ( ! empty( $matches[0] ) ) {
				$match                  = $matches[0];
				$svg_id                 = $social_media_channels[ $match ]['id'];
				$svg_screen_reader_text = $social_media_channels[ $match ]['screen-reader-text'];
				break;
			}
		}

		if ( $svg_id != "" ) {
			$icon_url    = plugins_url( "svg/social-media-icons.svg#$svg_id", __DIR__ );
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= '<svg class="' . $svg_id . '"><use xlink:href="' . $icon_url . '"></use></svg><span class="screen-reader-text">' . $svg_screen_reader_text . '</span>';
			$item_output .= '</a>';
			$item_output .= $args->after;
		} else {
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		}
		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param array $args An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}