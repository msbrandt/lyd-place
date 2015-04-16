<?php 
 // Template Name: lyd-getting-here

create_hero_reg('Getting Here');
?>
	<div id="map-container" >
		<div id="lyd-map">

		</div>
			<div id="map-decp">
		      <div id="primary-sidebar-1" class="primary-sidebar widget-area" role="complementary">
		            <?php dynamic_sidebar( 'sidebar-1' ); ?>
		      </div><!-- #primary-sidebar -->        

			</div>
	</div>

</section>

<section id="getting-container">
	<div>
		<div class="row">
			<div class="col-md-4">
				<h1>Places Near By</h1>
		           <?php dynamic_sidebar( 'sidebar-2' ); ?>

			</div>
			<div class="col-md-8">
				<?php lyd_photo_gallery(); ?>
			</div>
		</div>
	</div>
</section>
<?php 
  get_footer();

 ?>
