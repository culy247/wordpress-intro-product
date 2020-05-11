<?php
/*============================= vc-gallery =====================================*/


$attributes = array(
  'type' => 'dropdown',
  'heading' => __( 'Gallery type', 'flooring' ),
  'param_name' => 'type',
  'value' => array(
    __( 'Flex slider fade', 'flooring' ) => 'flexslider_fade',
    __( 'Flex slider slide', 'flooring' ) => 'flexslider_slide',
    __( 'Nivo slider', 'flooring' ) => 'nivo',
    __( 'Image grid', 'flooring' ) => 'image_grid',
    __('Carousel', 'flooring') => 'Carousel',
  ),
  'description' => __( 'Select gallery type.', 'flooring' ),
);
vc_add_param( 'vc_gallery', $attributes ); // Note: 'vc-gallery' was used as a base for "Message box" element
