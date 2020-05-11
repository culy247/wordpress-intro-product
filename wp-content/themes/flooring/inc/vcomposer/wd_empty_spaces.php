<?php 
vc_map( array(
    "name" => esc_html__("Wd Empty Space", 'flooring'),
    "base" => "wd_empty_spaces",
    "icon" => get_template_directory_uri()."/inc/images/icon/flooring_icon.png",
    "content_element" => true,
    "is_container" => FALSE,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Mobile", 'flooring'),
            "param_name" => "height_mobile",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Tablet", 'flooring'),
            "param_name" => "height_tablet",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Desktop", 'flooring'),
            "param_name" => "height_desktop",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Classes", 'flooring'),
            "param_name" => "extra_classes",
        )
    )
) );