<?php
 require get_template_directory() . '/inc/my-navbar.php';
 require get_template_directory() . '/inc/templatetags.php';
 require get_template_directory() . '/inc/campsite-map.php';
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
function lyd_scripts() {

	// Load main stylesheet.
	wp_enqueue_style( 'lyd-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'lyd-style', get_stylesheet_uri());

	wp_enqueue_style( 'lyd-fonts', '//fonts.googleapis.com/css?family=Raleway|Open+Sans|Ubuntu|Ubuntu+Condensed|Oswald' );

	wp_enqueue_style( 'lyd-exp-fonts', '//fonts.googleapis.com/css?family=Exo|Poiret+One|Denk+One|Voltaire|Federo|Righteous|Snippet|Cabin' );


	wp_enqueue_script( 'lyd-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20131209', true );
	// wp_enqueue_script( 'lyd-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery', 'jquery-ui-datepicker' ), '20131209', true );

	wp_register_script( 'lyd-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery', 'jquery-ui-datepicker' ), '20140401', true );
	wp_localize_script( 'lyd-script', 'lyd', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'template_uri' => get_template_directory_uri(),
	) );
	wp_enqueue_script( 'lyd-script' );
}
add_action( 'wp_enqueue_scripts', 'lyd_scripts' );

function admin_scripts(){
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin-style.css');
	wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/js/admin-functions.js', array( 'jquery' ), '20131209', true );
}
add_action('admin_enqueue_scripts', 'admin_scripts');

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

	$hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( $the_page->ID ), 'full' );
	$the_image = $hero_image && $hero_image[0] ? "background-image:url('".$hero_image[0]."')" : ""; 
	return $the_image;
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
				 return get_post();


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

function setup_campsite_map_menu(){
	add_menu_page(
		__( 'Campsite Menu'),
		__( 'Campsite Menu' ),
		'manage_options',
		'campsite-menu',
		'campsite_menu',
		'dashicons-location-alt'
	);
}
add_action('admin_menu', 'setup_campsite_map_menu');

function campsite_menu(){
	include_once( 'admin/campsite-menu.php' );
}
function install_campsite_tables(){
	global $wpdb;
	$campsite_table = $wpdb->prefix . 'lyd_campsite_table';
	$client_table = $wpdb->prefix . 'lyd_client_table';
	$booking_table = $wpdb->prefix . 'lyd_booking_table';
	
	$campsite_sql = "CREATE TABLE " . $campsite_table . "(
		campsite_id MEDIUMINT NOT NULL AUTO_INCREMENT,
		campsite_number TINYTEXT NOT NULL,
		campsite_dates_booked TEXT,
		campsite_map_x DECIMAL(10,3) NOT NULL,
		campsite_map_y DECIMAL(10,3) NOT NULL,
		campsite_status TINYINT,
		campsite_booked_by TINYINT,
		PRIMARY KEY campsite_id (campsite_id)
	);";

	$client_sql = "CREATE TABLE " . $client_table . "(
		client_id MEDIUMINT NOT NULL AUTO_INCREMENT,
		client_name TINYTEXT NOT NULL,
		client_email TINYTEXT NOT NULL,
		client_phone TINYTEXT NOT NULL,
		client_booking_status TINYINT,
		PRIMARY KEY client_id (client_id)
	);";

	$booking_sql = "CREATE TABLE " . $booking_table . "(
		booking_id MEDIUMINT NOT NULL AUTO_INCREMENT,
		booking_client_id MEDIUMINT NOT NULL,
		booking_date_from MEDIUMTEXT NOT NULL,
		booking_date_to MEDIUMTEXT NOT NULL,
		booking_date_range TEXT NOT NULL,
		booking_campsite_number TINYTEXT NOT NULL,
		booking_status TINYINT,
		PRIMARY KEY booking_id (booking_id)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $campsite_sql );
	dbDelta( $booking_sql );

	dbDelta( $client_sql );
	// echo 'Tables installed';
	// create_campsites();

}
add_action( 'after_switch_theme', 'install_campsite_tables' );
function save_booking_info_handler(){
	
	global $wpdb;

	$form_inputs = json_decode(stripcslashes($_REQUEST['form_inputs']));
	$form_array = array('booking_id' => '');
	$info_array = array('client_id' => '');
	foreach ($form_inputs as $val) {
		$val = explode(':', $val);
		$key = $val[0];
		$val = $val[1];
		// $info_array['client_'.$key] = $val;

		switch ($key) {
			case 'name':
				$info_array['client_'.$key] = $val;
				$form_array['booking_client_id'] = '';
				break;
			case 'email':
				$info_array['client_'.$key] = $val;
				break;
			case 'phone':
				$info_array['client_'.$key] = $val;
				break;
			case 'from':
				$form_array['booking_date_'.$key] = $val;
				break;
			case 'to':
				$form_array['booking_date_'.$key] = $val;
				# code...
				break;
			case 'range':
				$form_array['booking_date_'.$key] = $val;
				# code...
				break;
			case 'number':
				$form_array['booking_campsite_'.$key] = $val;
				# code...
				break;		
			default:
				# code...
				break;
		}

		// echo $key .' - '.$val.'<br/>';
	}
	$info_array['client_booking_status'] = 1;
	$form_array['booking_status'] = 1;
	$the_ID = create_client($info_array);
	$form_array['booking_client_id'] = $the_ID;
	// echo $the_ID;

	create_booking_ticket($form_array);
	// echo ;
	

	exit();
}
add_action( 'wp_ajax_save_booking_info', 'save_booking_info_handler' );
add_action( 'wp_ajax_nopriv_save_booking_info', 'save_booking_info_handler' );

function create_booking_ticket($fp){
	global $wpdb;
	$campsite_table = $wpdb->prefix . 'lyd_campsite_table';
	$booking_table = $wpdb->prefix . 'lyd_booking_table';
	// var_dump($fp);
	$wpdb->insert(
		$booking_table,
		$fp,
		array(
			'%d',
			'%d',
			'%s',
			'%s',
			'%s',
			'%s',
			'%d'
			)
		);
	$cps = $wpdb->get_results("SELECT * FROM " . $campsite_table . " WHERE campsite_number='".$fp['booking_campsite_number']."'")[0];
	$cps->campsite_status = 2;
	$rs = array();
	foreach ($cps as $key => $val) {
		$rs[$key] = $val;
	}
	$wpdb->update( $campsite_table, $rs, array('campsite_id'=>$cps->campsite_id));
}
function create_client($info){
	global $wpdb;

	$client_table = $wpdb->prefix . 'lyd_client_table';

	$wpdb->insert(
		$client_table,
		$info,
		array(
			'%d',
			'%s',
			'%s',
			'%s',
			'%d'
			)
		);
	$client_ID = $wpdb->get_results("SELECT * FROM " . $client_table . " WHERE client_name='".$info['client_name']."'");
	// $client_ID = $wpdb->get_results("SELECT * FROM " . $client_table . " WHERE client_name='Me'");
	return $client_ID[0]->client_id;
	// var_dump($info);
	exit();
}
function create_campsites(){
	global $wpdb;

	class Campsite{
		public $x, $y, $available;
		public function __construct($x, $y){
			$this->x = $x;
			$this->y = $y;
		}
	};

	$campsite_table = $wpdb->prefix . 'lyd_campsite_table';
	$campsites = array(
		'A1' => new Campsite(398.663,257.435),
		'A2' => new Campsite(433.329,279.052),
		'A3' => new Campsite(467.996,250.666),
		'A4' => new Campsite(495.981,281.4722),
		'A5' => new Campsite(526.996,228.333),
		'A6' => new Campsite(527.330,269.836),
		'A7' => new Campsite(530.663,200.666),
		'A8' => new Campsite(522.663,172.333),
		'A9' => new Campsite(534.663,152.666),
		'A10' => new Campsite(557.997,162.667),
		'A11' => new Campsite(583.996,192),
		'A12' => new Campsite(630.663,209.333),
		'A13' => new Campsite(691.330,205.333),
		'A14' => new Campsite(623.330,282.666),
		'A15' => new Campsite(651.330,306.666),
		'A16' => new Campsite(725.330,323.333),
		'A17' => new Campsite(719.330,358.666),
		'A18' => new Campsite(544.663,323.333),
		'A19' => new Campsite(460.663,330),
		'A20' => new Campsite(397.329,336.666),
		'B1' => new Campsite(521.554,507.334),
		'B2' => new Campsite(565.330,504),
		'B3' => new Campsite(620.663,510.667),
		'B4' => new Campsite(672.663,523.333),
		'B5' => new Campsite(709.330,551.334),
		'B6' => new Campsite(716.663,590.667),
		'B7' => new Campsite(715.330,632.667),
		'B8' => new Campsite(685.996,657.333),
		'B9' => new Campsite(637.996,659.333),
		'B10' => new Campsite(591.663,659.333),
		'B11' => new Campsite(550.663,657.333),
		'B12' => new Campsite(512.996,668.333),
		'C1' => new Campsite(457.570,455.75),
		'C2' => new Campsite(425.353,426),
		'C3' => new Campsite(419.996,469.333),
		'C4' => new Campsite(354.662,488.666),
		'C5' => new Campsite(323.996,485.234),
		'C6' => new Campsite(296.592,482.666),
		'C7' => new Campsite(269.996,485.234),
		'C8' => new Campsite(243.357,490.666),
		'C9' => new Campsite(186.663,560.667),
		'C10' => new Campsite(169.329,602),
		'C11' => new Campsite(154.663,639.333),
		'C12' => new Campsite(145.329,675.333),
			);
	foreach ($campsites as $site => $val) {
		// echo $site;
		$wpdb->insert(
			$campsite_table,
			array(
				'campsite_id' => '',
				'campsite_number' => $site,
				'campsite_dates_booked' => '',
				'campsite_map_x' => (float)$val->x,
				'campsite_map_y' => (float)$val->y,
				'campsite_status' => 0,
				'campsite_booked_by' => ''
				
			), 
			array(
				'%d',
				'%s',
				'%s',
				'%d',
				'%d',
				'%d',
				'%s'
			)
		);	
	}

	exit();

}
// add_action('after_switch_theme', 'create_campsites');


// function get_months(){
// $month_array = array(
// '01' => 'January',
// '02' => 'Februay',
// '03' => 'March',
// '04' => 'April',
// '05' => 'May',
// '06' => 'June',
// '07' => 'July',
// '08' => 'August',
// '09' => 'September',
// '10' => 'October',
// '11' => 'November',
// '12' => 'December',
// );
// return $month_array;
// }

// 

?>