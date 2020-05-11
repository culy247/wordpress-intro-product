<?php
if(!function_exists('wd_slider')){
  function wd_slider($atts) {
              
    extract( shortcode_atts( array(
      'wd_slider_layout' =>'large'
    ), $atts ) );
    
  


    ob_start(); ?>



  <div class="clearfix wd-slider clearfix">
    <div class="swiper-container <?php echo esc_attr($wd_slider_layout); ?>" >
      
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <?php
          $loop = new WP_Query( array( 'post_type' => 'wd-slider' ) );
          while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <!-- Slides -->
        <div class="swiper-slide">
        <?php $image_url = get_post_meta(get_the_ID(), 'slide_image', true); ?>
          <div class="slide-bg swiper-lazy" style="background-image:url(<?php echo $image_url; ?>)"></div>
          <div class="swiper-lazy-preloader"></div>
          <div class="slider-text">
            <h4 class="title"><?php the_title(); ?></h4>

            <h2 class="subtitle"><?php echo esc_attr(get_post_meta(get_the_ID(), 'slide_subtitle', true)); ?></h2>

            <div class="text">
              <p><?php echo esc_attr(get_post_meta(get_the_ID(), 'slide_description', true)); ?></p>
            </div>
          </div>
        </div>
        <?php endwhile;?>
      </div>
      
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
      <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
      <!-- If we need scrollbar -->
      <div class="swiper-scrollbar"></div>
    </div>
  </div>



        
      
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_slider', 'wd_slider' );
}  
?>