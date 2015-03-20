<?php
 require get_template_directory() . '/inc/my-navbar.php';
 require get_template_directory() . '/inc/templatetags.php';
 require get_template_directory() . '/wid/weather-widget.php';

/**
 * myTheme setup.
 *
 * @since myTheme 1.0
 */
function myTheme_setup(){
	/**
	* Register wp nav menu to create custom navbars
	*
	* @since myTheme 1.0 
	*
	*/
	add_theme_support( 'html5' );

	register_nav_menu( 'primary', __( 'Primary Menu', 'myTheme') );

	add_theme_support( 'post-thumbnails');

}
add_action( 'after_setup_theme', 'myTheme_setup' );
/**
 * Register Lato Google font 
 *
 * @since myTheme
 *
 * @return string
 */
// function myTheme_font_url() {
// 	$font_url = '';
// 	/*
// 	 * Translators: If there are characters in your language that are not supported
// 	 * by Lato, translate this to 'off'. Do not translate into your own language.
// 	 */
// 	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'myTheme' ) ) {
// 		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
// 	}

// 	return $font_url;
// }

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since myTheme 1.0
 *
 * @return void
 */
function myTheme_scripts() {
	// Add Lato font, used in the main stylesheet.
	// wp_enqueue_style( 'myTheme-lato', myTheme_font_url(), array(), null );

	// Load main stylesheet.
	wp_enqueue_style( 'myTheme-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'myTheme-style', get_stylesheet_uri());

	wp_enqueue_style( 'myTheme-fonts', '//fonts.googleapis.com/css?family=Raleway|Open+Sans|Ubuntu|Ubuntu+Condensed|Oswald' );

	wp_enqueue_style( 'myTheme-exp-fonts', '//fonts.googleapis.com/css?family=Exo|Poiret+One|Denk+One|Voltaire|Federo|Righteous|Snippet|Cabin' );


	wp_enqueue_script( 'myTheme-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20131209', true );
	wp_enqueue_script( 'myTheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery', 'jquery-ui-core', 'jquery-effects-bounce' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'myTheme_scripts' );

function lyd_widgets_init() {
	register_sidebar( array (
		'name' => 'Page Sidebar',
		'id'   => 'sidebar-1',
		'description' => 'Page sidebar text',
		'before_widget' => '<ul id="%1$s" class="widget %2$s">',
		'after_widget' => '</ul>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	) );
	register_sidebar( array (
		'name' => 'Weather Widget',
		'id'   => 'sidebar-2',
		'description' => 'Page sidebar text',
		'before_widget' => '<ul id="%1$s" class="widget %2$s">',
		'after_widget' => '</ul>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	) );
}
add_action( 'widgets_init', 'lyd_widgets_init' );

function lyd_get_featured_img($page_title){
	$the_page = get_page_by_title($page_title);

	$hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( $the_page->ID ), 'single-post-thumbnail' );
	return $hero_image[0];
}

function lyd_get_post($cat, $is_page, $post_type){
	// if(!$is_page):
		$numpost = $is_page ? -1 : 1;
	// echo $numpost;
		$the_cat_id = get_cat_ID($cat);
		$cat_args = array(
				'cat' => (int)$the_cat_id,
				'post_type' => $post_type,
				'numberposts'=> (int)$numpost
			);
		$thisQuery = new WP_Query( $cat_args );
		if ( have_posts() ) : 
			while ( $thisQuery->have_posts() ) : 
				$thisQuery->the_post();
				 // return get_post();


			endwhile;
		endif;
	// else if:

	// endif;
	
}
function lyd_get_photos(){
		$the_id = get_cat_ID('Photos');
		$photo_array = array();

		$args = array(
				'cat' => (int)$the_id,
				'post_type' => 'photo_gallery',
				'numberposts'=> -1
			);
		$this_query = new WP_Query( $args );
		if ( have_posts() ) : 
			while ( $this_query->have_posts() ) : 
				$this_query->the_post();
				$p = json_encode(get_post());
				array_push($photo_array, $p);

				 // return get_post();


			endwhile;
			return $photo_array;

		endif;
}
function lyd_get_content($cat_id){
	$the_cat_id = get_cat_ID($cat_id);
	$cat_args = array(
			'cat' => $the_cat_id,
			'post_type' => 'post',
			'numberposts'=> 1
		);
	// return $cat_args;

	$thisQuery = new WP_Query( $cat_args );
	// return $thisQuery;
	if ( have_posts() ) : 
		while ( $thisQuery->have_posts() ) : 
			$thisQuery->the_post();
			 get_post();
			 return the_content();

		endwhile;
	endif;
}

add_action( 'init', 'photo_post_type' );

function photo_post_type() {
  register_post_type( 'photo_gallery',
    array(
      'menu_icon' => 'dashicons-camera',
      'menu_position' => 5,
      'taxonomies' => array('category'),
      'supports' => array( 
      				'thumbnail',
      				'title',
      				'editor',
      				'page-attributes',
      				'excerpt'
      				 ),
      'labels' => array(
        'name' => __( 'Photo Gallery' ),
        'singular_name' => __( 'photos' ),
         'add_new' => __( 'Add New' ),
		 'add_new_item' => __( 'Add New Photo' ),
		 'edit' => __( 'Edit' ),
		 'edit_item' => __( 'Edit Photo' ),
		 'new_item' => __( 'New Photo' ),
		 'view' => __( 'View Photo' ),
		 'view_item' => __( 'View Photo' ),
		 'search_items' => __( 'Search Photo' ),
		 'not_found' => __( 'No Events found' ),
		 'not_found_in_trash' => __( 'No Events found in Trash' ),
		 'parent' => __( 'Parent Event' ), 
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}



?>