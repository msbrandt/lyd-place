<?php
/**
* Adds weather widget.
*/
class Weather_Widget extends WP_Widget {
	/**
	* Register widget with WordPress.
	*/
	function __construct() {
		parent::__construct(
			'weather_widget', // Base ID
			__( 'Weather Widget', 'Lydia' ), // Name
			array( 'description' => __( 'Load current weather', 'Lydia' ), ) // Args
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
		footer_imgs_wrapper($instance);
	}
	/**
	* Back-end widget form.
	*
	* @see WP_Widget::form()
	*
	* @param array $instance Previously saved values from database.
	*/
	public function form( $instance ) {
		$alt = ! empty( $instance['alt'] ) ? $instance['alt'] : __( 'New alt', 'text_domain' );
		$i_id = ! empty( $instance['i_id'] ) ? $instance['i_id'] : __( 'New i_id', 'text_domain' );
		$src = ! empty( $instance['src'] ) ? $instance['src'] : __( 'no', 'text_domain' );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$href = ! empty( $instance['href'] ) ? $instance['href'] : __( 'New href', 'text_domain' );
		?>
		<h4>Loaded Image</h4>
		<?php if($src != 'no'): ?>
		<div class="prev-img" style="height:50px; background-repeat:no-repeat; background-image: url('<?php echo esc_url( $src ); ?>')"></div>
		<?php else: ?>
		<div class="prev-img" style="height:50px; background-repeat:no-repeat;"><i>No image loaded</i></div>
		<?php endif; ?>
		<ul id="loaded-imgs"></ul>
		<p>
			<div id="add-imgs-btn" class="x-btn button-primary" name="add-btn">Add New</div>
			<input class="hidden-img" data-img_info="alt" id="<?php echo esc_attr( $this->get_field_id('alt') ); ?>" name="<?php echo esc_attr( $this->get_field_name('alt') ); ?>" type="hidden" value="<?php echo esc_attr( $alt ); ?>">
			<input class="hidden-img" data-img_info="src" id="<?php echo esc_attr( $this->get_field_id('src') ); ?>" name="<?php echo esc_attr( $this->get_field_name('src') ); ?>" type="hidden" value="<?php echo esc_attr( $src ); ?>">
			<input class="hidden-img" data-img_info="id" id="<?php echo esc_attr( $this->get_field_id('i_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('i_id') ); ?>" type="hidden" value="<?php echo esc_attr( $i_id ); ?>">
			<input class="hidden-img" data-img_info="title" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="hidden" value="<?php echo esc_attr( $title ); ?>">
			<input class="hidden-img" data-img_info="href" id="<?php echo esc_url( $this->get_field_id('href') ); ?>" name="<?php echo esc_url( $this->get_field_name('href') ); ?>" type="hidden" value="<?php echo esc_url( $href ); ?>">
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
		$instance = array();
		$instance['alt'] = ( ! empty( $new_instance['alt'] ) ) ? strip_tags( $new_instance['alt'] ) : '';
		$instance['src'] = ( ! empty( $new_instance['src'] ) ) ? strip_tags( $new_instance['src'] ) : '';
		$instance['i_id'] = ( ! empty( $new_instance['i_id'] ) ) ? strip_tags( $new_instance['i_id'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['href'] = get_post_meta($instance['i_id'], 'imgHref', true);
		return $instance;
	}
} // class image_Widget
// register image_Widget widget
function register_weather_widget() {
	register_widget( 'weather_Widget' );
}
add_action( 'widgets_init', 'register_weather_widget' );
?>