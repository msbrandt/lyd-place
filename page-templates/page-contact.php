<?php
 // Template Name: Contact
create_hero_reg('Contact');
?>

</section>
<section id="about-page-content">
	<div class="box-shadow"></div>
	<div id="page-container">
		<div id="page-content" class="contact-page">
<?php 
$the_cat_id = get_cat_ID('Contact');
$cat_args = array(
		'cat' => (int)$the_cat_id,
		'post_type' => 'post'
	);
$thisQuery = new WP_Query( $cat_args );
if ( have_posts() ) : 
	while ( $thisQuery->have_posts() ) : 
		$thisQuery->the_post();
	?>

	<h2 class="about-title"><?php the_title(); ?></h2>
	<?php
		the_content();
?>
<?php

	endwhile;
endif;
?>
		</div>
	</div>
</section>
<?php
  get_footer();
?>