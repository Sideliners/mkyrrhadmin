<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['sitename'] = 'Makaya Admin';

// 1=windows , 2=linux
$_ENV['os_type'] = "2";

if ($_ENV['os_type'] == 1) {
	// windows config
	$config['product_upload_path'] = getcwd().'\\uploads\\images\\products\\';
	$config['articles_upload_path'] = getcwd().'\\uploads\\images\\articles\\';
	$config['artisans_upload_path'] = getcwd().'\\uploads\\images\\artisans\\';
	$config['enterprise_upload_path'] = getcwd().'\\uploads\\images\\artisans\\';
}

else if ($_ENV['os_type'] == 2) {
	// linux config
	$config['product_upload_path'] = getcwd().'/uploads/images/products/';
	$config['article_upload_path'] = getcwd().'/uploads/images/articles/';
	$config['artisans_upload_path'] = getcwd().'/uploads/images/artisans/';
	$config['enterprise_upload_path'] = getcwd().'/uploads/images/enterprises/';
}
