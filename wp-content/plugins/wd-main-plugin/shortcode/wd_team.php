<?php 

if(!function_exists('wd_team_scode')){
  function wd_team_scode($atts) {
	  $show_description = $columns = $itemperpage = $team_collapse = "";
  	extract( shortcode_atts( array(
    'columns_mobile' => '1',
    'columns_tablet' => '2',
    'columns_desktop' => '3',
    'itemperpage' => '10',
    'css_animation' => 'no',
    'show_description' => 'yes',
    'team_collapse' => 'yes'
  ), $atts ) );

    $animation_classes =  "";
    $data_animated = "";
    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }

    ob_start(); ?>


  <ul class="wd-section-team team-list small-block-grid-<?php echo esc_attr($columns_mobile); ?> large-block-grid-<?php echo esc_attr($columns_desktop); ?> medium-block-grid-<?php echo esc_attr($columns_tablet); ?> <?php if($team_collapse == "") echo "collapse"; ?>">
    <?php $loop = new WP_Query( array( 'post_type' => 'team-member', 'posts_per_page' => $itemperpage, ) );
          while ( $loop->have_posts() ) : $loop->the_post();  ?> 
      <li class="wd-team-member-item">
      <div class="wd-team-member">
        <?php 
            $image_url = get_post_meta(get_the_ID(), 'picture', true);
        $image_url=image_from_url_relative($image_url);
            $image_id = wd_get_image_id($image_url);
            print wp_get_attachment_image( $image_id, 'wd_team' );
          ?>
          <h4 class="wd-title-element"><?php the_title(); ?></h4>
          <?php if ( $show_description == "yes" && get_post_meta(get_the_ID(), 'description', true) != ""){ ?>
          <p>
              <?php echo get_post_meta(get_the_ID(), 'description', true); ?>
          </p>
          <?php } ?>
      </div>
          
      </li>
    <?php endwhile; ?>
  </ul>
    
   <?php  
      return ob_get_clean();
      }
  add_shortcode( 'wd_team', 'wd_team_scode' );
}