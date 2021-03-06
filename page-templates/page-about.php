<?php
 // Template Name: Learn More
create_hero_reg('Learn More');


?>
</section>
<section id="about-page-content">
	<div class="box-shadow"></div>
	
	<div id="page-container">
		<div id="page-content">
<?php 
$the_cat_id = get_cat_ID('About');
$cat_args = array(
		'cat' => (int)$the_cat_id,
		'post_type' => 'post'
	);
$thisQuery = new WP_Query( $cat_args );
if ( have_posts() ) : 
	while ( $thisQuery->have_posts() ) : 
		$thisQuery->the_post();
	?>
	<div>
	<h2 class="about-title"><?php the_title(); ?></h2>
	<?php
		the_content();
?>
	</div>
<hr>
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