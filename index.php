<?php 
/**
*
* @subpackage LYDIAS PLACE
* @since Today
*/

       create_section_top('Home', false);
       $home_post = lyd_get_post('Home', false);
?>
<h1>Helaa cheese</h1>

<!--        <div class="col-md-9">
              <h1><?php echo $home_post->post_title; ?></h1>
              <p>
                     <?php echo lyd_get_content('Home'); ?>
              </p>

       </div>
       <div class="col-md-3">
              <div class="lyd-sidebar-wrapper">
                     <h3>Weather coming soon!</h3>
              </div>
       </div>
       </div>
       <div id="lyd-featured-content">
              <ul>
                     <a href="<?php echo get_permalink( get_page_by_path( 'Campsite' ) ); ?>"><li><b class="border-bg">Campsite</b></li></a>
                     <a href="<?php echo get_permalink( get_page_by_path( 'Getting Here' ) ); ?>"><li><b class="border-bg">Getting Here</b></li></a>
                     <li><span class="glyphicon glyphicon-play-circle"></span><b class="reserve-btn border-bg"><a href="#">Reserve a spot</b></li>
              </ul>
       </div> -->
       

 
<?php create_section_bottom('Home'); ?>