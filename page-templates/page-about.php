<?php
 // Template Name: lyd-about
       create_section_top('About', false);
       $about_post = lyd_get_post('About', false, 'post');

 ?> 
       <div class="col-md-9">
              <h1><?php echo $about_post->post_title; ?></h1>
              <p>
                     <?php echo lyd_get_content('About'); ?>
              </p>

       </div>
       <div class="col-md-3">
              <aside class="lyd-sidebar-wrapper">
              	 <?php dynamic_sidebar( 'sidebar-1' ); 
              	 ?>
              </aside>
       </div>
<?php create_section_bottom(); ?>

