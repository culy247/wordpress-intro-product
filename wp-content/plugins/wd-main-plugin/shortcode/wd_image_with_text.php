<?php
if(!function_exists('wd_image_with_text')){
  function wd_image_with_text($atts) {
              
    extract( shortcode_atts( array(
      'title' => '',
      'text'  => '',
      'layout' => '1',
      'extra_classes' => '',
      'url' => '#',
      'image_checkbox' => '',
      'image' => '',
      'css_animation' => 'no',
    ), $atts ) );
    

    $img_size="";
    $thumb_size="thumbnail";
    $post_thumbnail="";

    $animation_classes =  "";
    $data_animated = "";

    if(($css_animation != 'no')){
      $animation_classes =  " animated ";
      $data_animated = "data-animated=$css_animation";
    }

      $target = '';
      if($url != "#") {
          $href = vc_build_link($url);
          $url = $href['url'];
          $target = (isset($href['target']) && $href['target'] != '')? ' target=' . $href['target']  : '';
      }
    ob_start(); ?>



<?php if (isset($layout) && $layout== 1){ ?>

<section class="wd-section-blog text-center style2">
  <div class="wd-blog-post <?php echo esc_attr($animation_classes) . ' ' . esc_attr($extra_classes); ?>" <?php echo esc_attr($data_animated); ?>>
      <h4 class="wd-title-element"><?php echo $title; ?></h4>
      <p>
          <?php echo $text; ?>
      </p>
          <?php if($url!='' && $url!= '#') { ?>
    <a href="<?php echo $url; ?>"<?php echo $target; ?>>
              <?php } ?>
      <?php
              $img_id = preg_replace( '/[^\d]/', '', $image );
              $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail') );
               ?>
              <?php
              $img_path=$img['p_img_large'][0];
               ?>
               <img src="<?php echo $img_path  ?>" alt="icon"/>
          <?php if($url!='' && $url!= '#') { ?>
      </a>
    <?php } ?>
  </div>
</section>
<?php } else { ?>

          <section class="wd-section-blog text-center style2">
              <div class="wd-blog-post <?php echo esc_attr($animation_classes) . ' ' . esc_attr($extra_classes); ?>" <?php echo esc_attr($data_animated); ?>>
          <?php if($url!='' && $url!= '#') { ?>
                  <a href="<?php echo $url; ?>"<?php echo $target; ?>>
                      <?php } ?>
                      <?php
                      $img_id = preg_replace( '/[^\d]/', '', $image );
                      $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'full_size' => $img_size,'thumb_size' => 'thumbnail') );
                      ?>
                      <?php
                      $img_path=$img['p_img_large'][0];
                      ?>
                      <img src="<?php echo $img_path  ?>" alt="icon"/>
                      <h4 class="wd-title-element"><?php echo $title; ?></h4>
          <?php if($url!='' && $url!= '#') { ?>
                  </a>
             <?php } ?>
                  <p>
                      <?php echo $text; ?>
                  </p>
              </div>
          </section>
<?php } ?>
    <?php return ob_get_clean();
  }
  add_shortcode( 'wd_image_with_text', 'wd_image_with_text' );
}  
?>