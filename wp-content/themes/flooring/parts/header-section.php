<?php 
$flooring_menu_style = flooring_get_option('flooring_menu_style','corporate');

if(isset($_GET['header']) && $_GET['header'] ){
	$flooring_menu_style = $_GET['header'];
}

if($flooring_menu_style == 'simple') {
	get_template_part('parts/header-1');
}else{
	get_template_part('parts/header-2');
}