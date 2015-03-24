<?php 
 // Template Name: lyd-getting-here

      create_section_top('Getting Here', false);
      $directions = lyd_get_post('getting-here', false, 'post');

?>
	<div class="col-md-3">
		<h2><?php echo $directions->post_title; ?></h2>
		<?php echo $directions->post_content; ?>
	</div>
	<div class="col-md-9">
		<div class="google-map">
			<h1>google map!</h1>
		</div>
	</div>

<?php create_section_bottom(); ?>
