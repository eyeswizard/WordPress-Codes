<?php
/*
just add this code to your functions.php file and you will have a full responsive facebook custom widget in your widgets list
*/
add_action( 'widgets_init', 'window_widget' );
function window_widget() {
	register_widget( 'window_facebook_box' );
}
/**
 * Adds Social media icons widget.
 */
class window_facebook_box extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'window_facebook_box', // Base ID
			WINDOW_THEME_NAME . esc_html__( ' Facebook box', 'window' ), // Name
			array( 'description' => esc_html__( 'add facebook page box', 'window' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		if ( ! empty( $instance['page_url'] ) ):
			$page_url = $instance['page_url'];
			$page_url = esc_url( $page_url );
			?>
			<div id="fb-container"></div>
			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));

				jQuery(window).bind("load resize", function(){
					var container_width = jQuery('#fb-container').width();
					jQuery('#fb-container').html('<div class="fb-like-box" ' +
						'data-href="<?php echo esc_url( $page_url ) ?>" ' +
						'data-width="' + container_width + '" data-height="730" data-show-faces="true" ' +
						'data-stream="false" data-header="true"></div>');
					FB.XFBML.parse( );
				});
			</script>

			<?php
		endif;

		wp_reset_query();
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title    = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Find us on Facebook', 'window' );
		$page_url = ! empty( $instance['page_url'] ) ? $instance['page_url'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'window' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>"><?php _e( 'Page url :', 'window' );
				?></label>
			<input id="<?php echo $this->get_field_id( 'page_url' ); ?>"
			       name="<?php echo $this->get_field_name( 'page_url' ); ?>" type="text" class="widefat"
			       value="<?php echo esc_attr( $page_url ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance             = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['page_url'] = ( ! empty( $new_instance['page_url'] ) ) ? strip_tags( esc_url( $new_instance['page_url'] ) ) : '';

		return $instance;
	}

}
