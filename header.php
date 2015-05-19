<?php 
?>
<!DOCTYPE HTML>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> >
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> >
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no width=device-width" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<title>
		<?php
		 wp_title( '|', ture, 'right');
		 bloginfo( 'name');
		 ?>
	</title>

	<?php wp_head(); ?>


</head>
<!-- Start of navbar -->
<body <?php body_class(); ?>>
	

	<!-- <div class="clear"></div> -->
<div class="main_content">
	<?php 
	$this_name = get_the_title(); 
  	$the_id="";

	 $x = preg_match('/\s/', $this_name);
	  if($x){
	    $raw_id = explode(" ", strtolower($this_name));
	    $last_str = end($raw_id);

	    foreach ($raw_id as $id) {
	      if($id != $last_str){
	        $the_id = $the_id . $id.'-';
	      }else{
	        $the_id = $the_id . $id;
	      }
	    }
	  }else{
	    $the_id = $this_name;
	  }

	 ?>
	<main id="<?php echo $the_id; ?>">
		<?php lyd_header(); ?>
