<?php
function lyd_header(){
	?>
       <header>
              <nav class="navbar lyd-nav" role="navigation">

                     <div class="lyd-nav-container row">

												<div id="container"> <!-- Main Container -->    

							<div class="rectangle">
		                     	<div class="col-md-4">
		                     		<h1><a href="<?php echo get_home_url(); ?>">Lydia's Place</a></h1>
		                     	</div>
		                     	<div class="col-md-8">
		                            <?php lyd_nav(); ?> 
								</div> <!-- Rectangle with a title -->
							</div>
						</div>
		                <div id="lyd-swingdown" class="row">
							<div class="col-md-7">
		                		<h4>R/V Campsite</h4>
							</div>
		                	<div class="col-md-5">
		                		<h5 class="reserve-btn"><a href="<?php echo get_permalink(get_page_by_path('Campsite') ); ?>">Reserve Now</a></h5>
		                	</div>	
		                </div>
                     </div>
              </nav>



       </header>
              <div class="my-nav-temp"></div>

	<?php
}
function create_section_top($the_page, $is_page){
	get_header();
	$featured_img = lyd_get_featured_img($the_page, $is_page);
	?>
   <div class="corner-ribbon">Full site coming soon!</div>

   <section id="lyd-<?php echo (string)$the_page; ?>" class="lyd-page" >

          <div class="lyd-hero" id="lyd-hero-<?php echo (string)$the_page; ?>" style="<?php echo $featured_img; ?>"></div>
                <div class="page-wraper">
                        <div class="content-wrapper">
                               <div class="lyd-content row" id="home-content">	
<?php 
}

function create_section_bottom(){
?>
                               </div>
                        </div>
                 </div>
   </section>
<?php
	get_footer(); 
}
function lyd_photo_gallery(){

       $photos = lyd_get_photos();
       // $photo_count = echo count($photos); 
       // $size_classes = array(
       // 		'ani-left',
       // 		'ani-top',
       // 		'ani-right'
       // 	);

       //  switch ($photo_count) {
       //    	case $photo_count % 3 === 0:
          		
       //    		break;
          	
       //    	default:
       //    		# code...
       //    		break;
       //    }
       ?>
<h1>PHOTO GALARRY</h1>

       <ul id="lyd-photos" class="row">
       <?php
       foreach ($photos as $key => $val) {
              $pp = json_decode($val);
              $the_id = $pp->ID;
              $title = $pp->post_title;
              $src = wp_get_attachment_image_src( get_post_thumbnail_id( $the_id ), 'full' );;




              ?>
              <li data-toggle="modal" data-target="#myModal-<?php echo $the_id; ?>" class="lyd-photo" id="photo-<?php echo $the_id; ?>"style="background-image: url('<?php echo $src[0]; ?>')">
              		<div class="pg-txt"><?php echo $title; ?></div>
              </li>  
			  <!-- Modal -->
			<div class="modal fade" id="myModal-<?php echo $the_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel"><?php echo $title; ?></h4>
			      </div>
			      <div class="modal-body">
			        <div class="lyd-modal-img" id="m-<?php echo $the_id; ?>" style="background-image: url('<?php echo $src[0]; ?>')"></div>
			      </div>
			    </div>
			  </div>
			</div>            
              <?php

       }


}



?>