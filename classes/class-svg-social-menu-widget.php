<?php

/**
 * Class Svg_Social_Menu_Widget
 */
class Svg_Social_Menu_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname'   => 'widget-svg-social-menu',
			'description' => __( 'Widget to display social network profile link as SVGs (uses the menu from position “SVG Social Menu”)', 'svg-social-menu' )
		);
		parent::__construct( 'svg_social_menu_widget', __( 'SVG Social Menu', 'svg-social-menu' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? false : $instance['title'] );
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		if ( has_nav_menu( 'svg-social-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'svg-social-menu',
					'menu_class'     => 'svg-social-menu',
					'container'      => '',
					'walker'         => new Svg_Social_Menu_Walker(),
					'depth'          => 1
				)
			);
		}
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		?>
		<p><label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'svg-social-menu' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>"/>
		</p>
	<?php }
}
