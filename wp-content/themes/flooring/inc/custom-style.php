<?php

$flooring_custom_css = "";
	$flooring_custom_css .= "";
	//______________ background header pages ______________________________
	global $wp_query;
	define ('flooring_PAGE_ID' , 0 );
    if (function_exists( 'WC' )) {
        if (is_shop()){
            $GLOBALS['flooring_PageID'] = get_option( 'woocommerce_shop_page_id' );

        }else{
            $GLOBALS['flooring_PageID'] = $wp_query->post->ID;
        }
	}elseif ( is_object( $wp_query ) && is_object( $wp_query->post ) && isset( $wp_query->post->ID ) ) {
		$GLOBALS['flooring_PageID'] = $wp_query->post->ID;

	} else {

		$GLOBALS['flooring_PageID'] = '';
	}

	$flooring_page_bg_img = get_post_meta( $GLOBALS['flooring_PageID'], 'flooring_page_title_area_bg_img', true );
	if ( $flooring_page_bg_img != '' ) {
		$flooring_custom_css .= "
			body .wd-title-bar {
				background:url(" . $flooring_page_bg_img . ") no-repeat #6DD676;
				background-size:cover;
			}
		";
	}
	$flooring_page_title_color = get_post_meta( $GLOBALS['flooring_PageID'], 'flooring_page_title_color', true );
	if ( $flooring_page_title_color != '' ) {
		$flooring_custom_css .= "
			.wd-title-bar div h2,
			.wd-title-bar div h5 {
				color: " . $flooring_page_title_color . ";
			}
		";
	}
$blog_page_id = get_option('page_for_posts');
	if(isset($blog_page_id) && $blog_page_id != '') {
        $blog_flooring_page_bg_img = get_post_meta($blog_page_id, 'flooring_page_title_area_bg_img', true);
        if ($blog_flooring_page_bg_img != '') {
            $flooring_custom_css .= "
			.blog .wd-title-bar {
				background:url(" . $blog_flooring_page_bg_img . ") no-repeat #6DD676 !important;
				background-size:cover;
			}
		";
        }
        $blog_flooring_page_title_color = get_post_meta($blog_page_id, 'flooring_page_title_color', true);
        if ($blog_flooring_page_title_color != '') {
            $flooring_custom_css .= "
			.wd-title-bar div h2,
			.wd-title-bar div h5 {
				color: " . $blog_flooring_page_title_color . " !important;
			}
		";
        }
    }
	//______________ background header single pages ______________________________
	
	$flooring_single_post_bg_img = flooring_get_option( 'flooring_bg_single_post_path','');
	if($flooring_single_post_bg_img != ''){
		$flooring_custom_css .= "
			.single-post .wd-title-bar {
				background:url(".$flooring_single_post_bg_img .") no-repeat #6DD676;
				background-size:cover;
			}
		";
	}
	$flooring_bg_single_page = flooring_get_option( 'flooring_bg_single_page','');
	if($flooring_bg_single_page != ''){
		$flooring_custom_css .= "
			.wd-title-bar {
				background:url(".$flooring_bg_single_page .") no-repeat #6DD676;
				background-size:cover;
			}
		";
	}

	//______________ Typography  ______________________________
	if((flooring_get_option('flooring_body_font_familly','Open Sans')!='default') && (flooring_get_option('flooring_body_font_familly' ,'Open Sans')!= false)){
		$flooring_custom_css .= "body ,body p {
    	font-family :'". flooring_get_option('flooring_body_font_familly', 'Open Sans')."';
    	font-weight :" . flooring_get_option('flooring_body_font_weight', '400').";
    }";
	}else {
		$flooring_custom_css .= "body ,body p {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . flooring_get_option('flooring_body_font_weight', '400').";
    }";
	}
	if((flooring_get_option('flooring_body-font-size','14')!='default') && (flooring_get_option('flooring_body-font-size','14')!= false) ){
		$flooring_custom_css .= "body p {
    	font-size :". flooring_get_option('flooring_body-font-size','14')."px;
    }";
	}
	if((flooring_get_option('flooring_head_font_familly','Open Sans')!='default') && (flooring_get_option('flooring_head_font_familly','Open Sans')!= false) ){
		$flooring_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family :'". flooring_get_option('flooring_head_font_familly','Open Sans')."';
    	font-weight :" . flooring_get_option('flooring_heading-font-weight-style','700').";
    }";
	}else {
		$flooring_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
    	font-family: 'Open Sans', sans-serif;
    	font-weight :" . flooring_get_option('flooring_heading-font-weight-style','400').";
    }";
	}

	if( flooring_get_option('flooring_navigation_font_familly', 'Open Sans') != "default") {
		$flooring_custom_css .= ".top-bar-section ul li > a {
				font-family : '" . flooring_get_option( 'flooring_navigation_font_familly', 'Open Sans' ) . "';
			}";
	}
	else {
		$flooring_custom_css .= ".top-bar-section ul li > a {
				font-family: 'Open Sans', sans-serif;
			}";
	}
	if( flooring_get_option('flooring_navigation-font-weight-style', '400') != "") {
		$flooring_custom_css .= ".top-bar-section ul li > a {
				font-weight : " . flooring_get_option( 'flooring_navigation-font-weight-style' ,'400') . ";
			}";
	}

	if( flooring_get_option('flooring_navigation-transform' ,'normal') != "") {
		$flooring_custom_css .= ".top-bar-section ul li > a {
				text-transform : " . flooring_get_option( 'flooring_navigation-transform' ,'normal' ) . ";
			}";
	}
	if((flooring_get_option('flooring_navigation-font-size', '14')!='default') && (flooring_get_option('flooring_navigation-font-size', '14')!= false) ){
		$flooring_custom_css .= ".top-bar-section ul li > a {
    	font-size :". flooring_get_option('flooring_navigation-font-size', '14')."px;
    }";
	}
	if( flooring_get_option('flooring_heading-transform', 'normal') != "") {
		$flooring_custom_css .= "h1, h2, h3, h4, h5, h6, .menu-list a {
				text-transform : " . flooring_get_option( 'flooring_heading-transform', 'normal') . ";
			}";
	}
	if( flooring_get_option('flooring_text-transform', 'normal') != "") {
		$flooring_custom_css .= "body ,body p {
				text-transform : " . flooring_get_option( 'flooring_text-transform', 'normal') . ";
			}";
	}


	//_______________ background Primary color___________________________
	$flooring_custom_css .= "
					.primary-color,#filters li:hover,#filters li:first-child, #filters li:focus, #filters li:active,
					.wd-section-blog-services.style-3 .wd-blog-post h4:after,
					.box-icon img, .box-icon i,
					button:hover, button:focus, .button:hover, .button:focus,
					button, .button,
					.wd-latest-news .wd-image-date span strong,
					.wd-section-blog.style2 h4:after,
					.pricing-table.featured .title,
					.accordion .accordion-navigation > a, .accordion dd > a,
					.searchform #searchsubmit,.wd-pagination span,.blog-page .quote-format blockquote,
					.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
					.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range,
					.products .product .button,
					.woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt,
					.woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt,
					.woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt,
					.woocommerce-page button.button.alt, .woocommerce-page input.button.alt,
					.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, 
					.woocommerce a.button:hover, .woocommerce button.button:hover, 
					.woocommerce input.button:hover, .woocommerce-page #content input.button:hover, 
					.woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover,
					.woocommerce-page button.button:hover, .woocommerce-page input.button:hover,
					.woocommerce span.onsale, .woocommerce-page span.onsale,
					.woocommerce-page button.button, .widget_product_search #searchsubmit, .widget_product_search #searchsubmit:hover,
					.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
					.wd-text-icon-style3 .box-icon img, .wd-text-icon-style3 .box-icon i, .show-cart-btn span.min-cart-count
					{
						background:".flooring_get_option('flooring_primary_color','#83ca13').";
					}
	";
	//_______________ svg stroke Primary color___________________________
	$flooring_custom_css .= "
	.wd-section-blog-services.style-3 .wd-blog-post .shape {
		stroke: ".flooring_get_option('flooring_primary_color','#83ca13')."
	}
	";

	$flooring_custom_css .= "
	.wd-menu3-logo {
		border-top: 70px solid ".flooring_get_option('flooring_nav_bg_color','#83ca13')."
	}
	";

	$flooring_custom_css .= "
	.triongle {
		background-color: ".flooring_get_option('flooring_nav_bg_color','#83ca13')."
	}
	";


	//_______________ text Primary color___________________________
	$flooring_custom_css .= "
			
			.blog-page .read-more-link,
			#wp-calendar a,.wd-testimonail blockquote cite,
			.list-icon li:before, .creative-layout .creative-social ul.social-icons .call span
			{
				color:".flooring_get_option('flooring_primary_color','#83ca13').";
			}
	
	";
	//_______________ background secondary Primary color___________________________
	$flooring_custom_css .= "
		.hvr-underline-from-center:before,
		.hvr-outline-in:before {
				border-color:".flooring_get_option('flooring_secondary_color','#83ca13').";
		}
	";

	$flooring_custom_css .= "
		.wd-footer {
		    background: url(".flooring_get_option('flooring_footer_bg_path').");
		    background-color: ". flooring_get_option('footer_bg_color', "#383838") .";
		    background-size: cover;
		    background-position: bottom;
		    color: ". flooring_get_option('footer_text_color', "#FFF") .";
		}
	";
	//_______________ custom css ___________________________
	$flooring_custom_css .= flooring_get_option('flooring_theme_custom_css','');

  $flooring_custom_css .= "
  .wd-title-section_c h2::after, .wd-title-section_l h2::after, .wd-latest-news .wd-title-element::after, .hvr-underline-from-center::before  {
    background-color: ".flooring_get_option('flooring_primary_color', '#B6702A').";
  }
  .wd-latest-news .hvr-pop.read-more {
    color: ".flooring_get_option('flooring_primary_color', '#B6702A').";
  }

  button.alert, .button.alert, .wd-newsletter .newslettersubmit {
    background-color: ".flooring_get_option('flooring_primary_color', '#B6702A').";
    border-color: ".flooring_get_option('flooring_primary_color', '#B6702A').";
  }
  a:hover, a:focus {
    color: ".flooring_get_option('flooring_primary_color', '#B6702A').";
  }
  .wd-latest-news .wd-image-date span {
    background-color: ".flooring_get_option('flooring_secondary_color', '#FBD232').";
  }
  @media (min-width: 900px) {
    .creative-layout .contain-to-grid.sticky {
      background: linear-gradient(180deg, ".flooring_get_option('flooring_nav_bg_color','rgba(0,0,0,0.45)')." 0px,rgba(0,0,0,0) 97%);
    }
  }
  .creative-layout .contain-to-grid.sticky.fixed {
    background-color: ".flooring_get_option('navigation_bg_color_sticky').";
  }
  .creative-layout .top-bar-section ul li > a {
    color: ".flooring_get_option('flooring_nav_color').";
  }
  .creative-layout .top-bar-section ul li:hover:not(.has-form) > a,
   .top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button),
   .creative-layout .top-bar-section ul li.active_menu > a {
    color: ". flooring_get_option('flooring_nav_hover_color') .";
  }
  .creative-layout .fixed .top-bar-section ul li > a {
    color: ".flooring_get_option('navigation_color_sticky').";
  }
  .creative-layout .fixed .top-bar-section ul li > a:hover,
  .creative-layout .fixed .top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button),
  .creative-layout .fixed .top-bar-section ul li.active_menu > a {
    color: ".flooring_get_option('navigation_color_hover_sticky').";
  }

  ";