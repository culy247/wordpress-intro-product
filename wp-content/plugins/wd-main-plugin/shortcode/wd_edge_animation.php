<?php 
function wd_edge_animation($atts) {
           
  extract( shortcode_atts( array(), $atts ) );
  
  ob_start(); 
  
 include("edge-animation/index.php"); 
 return ob_get_clean();
}
add_shortcode( 'wd_edge_animation', 'wd_edge_animation' );