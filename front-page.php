<?php 
/**
*
* @subpackage LYDIAS PLACE
* @since Today
*/

create_hero('Home');

 get_template_part( '/page-templates/content-campsite', get_post_format() );

footer_navbar('Home');