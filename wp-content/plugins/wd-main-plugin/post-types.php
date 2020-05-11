<?php


/*-------------- portfolio custom posttyp -----------------------*/
if( ! function_exists('portfolio_posttype')):
  function portfolio_posttype() {
    register_post_type( 'portfolio',
      array(
        'labels' => array(
          'name' => __( 'Portfolio', 'flooring' ),
          'singular_name' => __( 'portfolio', 'flooring' ),
          'add_new' => __( 'Add New Portfolio Item', 'flooring' ),
          'add_new_item' => __( 'Add New Portfolio Item', 'flooring' ),
          'edit_item' => __( 'Edit portfolio', 'flooring' ),
          'new_item' => __( 'Add New Portfolio Item', 'flooring' ),
          'view_item' => __( 'View Portfolio Item', 'flooring' ),
          'search_items' => __( 'Search Portfolio Item', 'flooring' ),
          'not_found' => __( 'No Portfolio Item found', 'flooring' ),
          'not_found_in_trash' => __( 'No Portfolio Item found in trash', 'flooring' )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'comments','editor' , 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "portfolio"), // Permalinks format
        'menu_position' => 5
      )
    );
      register_taxonomy( 'projet', 'portfolio', array( 'hierarchical' => true,
          'label' => 'Categories',
          'query_var' => true,
          'show_ui' => true,
          'rewrite' => true ) );
  }
  add_action( 'init', 'portfolio_posttype' );
endif;

//----------------------- Custom type Slider -----------------
if( ! function_exists('wd_slider_posttype')):
  function wd_slider_posttype() {
    register_post_type( 'wd-slider',
      array(
        'labels' => array(
          'name' => __( 'slides', 'flooring' ),
          'singular_name' => __( 'Slide', 'flooring' ),
          'add_new' => __( 'Add New Slide', 'flooring' ),
          'add_new_item' => __( 'Add New Slide', 'flooring' ),
          'edit_item' => __( 'Edit Slide', 'flooring' ),
          'new_item' => __( 'Add New Slider', 'flooring' ),
          'view_item' => __( 'View Slide', 'flooring' ),
          'search_items' => __( 'Search Slide', 'flooring' ),
          'not_found' => __( 'No Slide found', 'flooring' ),
          'not_found_in_trash' => __( 'No Slide found in trash', 'flooring' )
        ),
        'public' => true,
        'menu_icon'           =>      'dashicons-slides',
        'supports' => array( 'title'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "wd-slider"), // Permalinks format
        'menu_position' => 5
      )
    );

  }
  add_action( 'init', 'wd_slider_posttype' );
endif;

//----------------------- Custom type Team Member -----------------
if( ! function_exists('wd_teammember_posttype')):
  function wd_teammember_posttype() {
    register_post_type( 'team-member',
      array(
        'labels' => array(
          'name' => __( 'Team Members', 'flooring' ),
          'singular_name' => __( 'team member', 'flooring' ),
          'add_new' => __( 'Add New Team Member', 'flooring' ),
          'add_new_item' => __( 'Add New Team Member', 'flooring' ),
          'edit_item' => __( 'Edit Team Member', 'flooring' ),
          'new_item' => __( 'Add New Team Member', 'flooring' ),
          'view_item' => __( 'View Team Member', 'flooring' ),
          'search_items' => __( 'Search Team Member', 'flooring' ),
          'not_found' => __( 'No Team Member found', 'flooring' ),
          'not_found_in_trash' => __( 'No Team Member found in trash', 'flooring' )
        ),
        'public' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => array( 'title'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "team-member"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'wd_teammember_posttype' );
endif;
//----------------------- Custom type Testimonials -----------------
if( ! function_exists('wd_testimonials_posttype')):
  function wd_testimonials_posttype() {
    register_post_type( 'testimonials',
      array(
        'labels' => array(
          'name' => __( 'Testimonials', 'flooring' ),
          'singular_name' => __( 'testimonial', 'flooring' ),
          'add_new' => __( 'Add New Testimonial', 'flooring' ),
          'add_new_item' => __( 'Add New Testimonial', 'flooring' ),
          'edit_item' => __( 'Edit Testimonial', 'flooring' ),
          'new_item' => __( 'Add New Testimonial', 'flooring' ),
          'view_item' => __( 'View Testimonial', 'flooring' ),
          'search_items' => __( 'Search Testimonial', 'flooring' ),
          'not_found' => __( 'No Testimonials found', 'flooring' ),
          'not_found_in_trash' => __( 'No Testimonials found in trash', 'flooring' )
        ),
        'public' => true,
        'menu_icon' 					=> 			'dashicons-format-quote',
	      'supports' => array( 'title', 'excerpt', 'thumbnail'),
        'capability_type' => 'post',
        'rewrite' => array("slug" => "testimonials"), // Permalinks format
        'menu_position' => 5
      )
    );
  }
  add_action( 'init', 'wd_testimonials_posttype' );
endif;