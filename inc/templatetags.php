<?php
function lyd_header(){
	?>
  <header>
    <button type="button" class="navbar-toggle collapsed non-frontpage" >
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <nav class="lyd-nav">
      <span class="close-nav">x</span>
      <h2><a href="<?php echo get_home_url(); ?>">Lydia's Place Inc</a></h2>

      <?php wp_nav_menu();?>

    </nav>

  </header>


	<?php
}
function create_hero($the_page){
  get_header();
  $featured_img = lyd_get_featured_img($the_page);
  $the_post = lyd_get_post($the_page, false, 'post');

  ?>
   <section id="lyd-<?php echo (string)$the_page; ?>" class="lyd-page" style="<?php echo $featured_img; ?>" >
      <div class="content-wrapper">
        <div class="page-padding">
          <h1><?php echo $the_post->post_title; ?></h1>
          <?php lyd_get_content($the_page); ?>
          <?php if($the_page == "Home"): ?>
          <div class="lyd-btn" id="book-now"><a href="#reserve-now">book now</a></div>
          <div class="lyd-btn" id="lean-more"><a href="<?php echo get_permalink( get_page_by_path( 'Learn More' ) ); ?>">learn more</a></div>
          <?php endif; ?>
        </div>
      </div>  
      <div class="hero-border">
        <div id="hero-btn-container">
          <button type="button" class="navbar-toggle collapsed" >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </div>
   </section>

<?php

}
function create_hero_reg($the_page){
  get_header();
  // echo $the_page;
  $featured_img = lyd_get_featured_img($the_page);
  $the_post = lyd_get_post($the_page, false, 'post');
  $the_id="";
  $x = preg_match('/\s/', $the_page);
  if($x){
    $raw_id = explode(" ", strtolower($the_page));
    $last_str = end($raw_id);

    foreach ($raw_id as $id) {
      if($id != $last_str){
        $the_id = $the_id . $id.'-';
      }else{
        $the_id = $the_id . $id;
      }
    }
  }else{
    $the_id = $the_page;
  }

?>
   <section id="lyd-<?php echo (string)$the_id; ?>" class="lyd-page-reg" style="<?php echo $featured_img; ?>" >
          <div class="page-title-container">
            <h1><?php echo $the_page; ?></h1>
          </div>
<?php  
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
<h1>Photo Gallary</h1>

       <ul id="lyd-photos">
       <?php
       foreach ($photos as $key => $val) {
              $pp = json_decode($val);
              $the_id = $pp->ID;
              $title = $pp->post_title;
              $src = wp_get_attachment_image_src( get_post_thumbnail_id( $the_id ), 'full' );;




              ?>
              <li data-toggle="modal" data-target="#myModal-<?php echo $the_id; ?>" class="lyd-photo" id="photo-<?php echo $the_id; ?>">
              		<div class="picture-padding" style="background-image: url('<?php echo $src[0]; ?>')">
                    <div class="pg-txt"><?php echo $title; ?></div>
                  </div>
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
function footer_navbar($the_page){
  ?>
  <div class="row footer-nav">
  <a class="footer-nav-bo tt" href="<?php echo get_permalink( get_page_by_path( 'Learn More' ) ); ?>" >
    <div class="nav-bg-img" id="nav-about"></div>
    <div class="footer-nav-container">
      Learn More  
    </div>
  </a>
  <a class="footer-nav-bo tt" href="<?php echo get_permalink( get_page_by_path( 'Getting Here' ) ); ?>">
    <div class="nav-bg-img" id="nav-gh"></div>
    <div class="footer-nav-container">
      Getting here and around 
    </div>
  </a>
  <a class="footer-nav-bo tt" href="<?php echo get_permalink( get_page_by_path( 'Contact' ) ); ?>">
    <div class="nav-bg-img" id="nav-contact"></div>
    <div class="footer-nav-container">
      contact us 
    </div>
  </a>

  </div>

<?php
  get_footer(); 

}
function real_footer_nav(){
  ?>
  <div id="real-footer-l">
    <h5><a href="<?php echo get_home_url(); ?>"> Lydia's Place inc</a></h5>
    <?php wp_nav_menu();?>
  </div>
  <div id="real-footer-r">
    <h4> Designed and Developed by <a target="_blank" href="http://michaelbrandt.info">mikey brandt</a></h4>
  </div>

  <?php 
}


?>