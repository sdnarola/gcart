<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * get category name
 * @param  int 		$id 	category id
 *
 * @return string 	name of category.
 */
function get_category_name($id)
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$category = $CI->categories->get($id);

	return $category['name'];
}

/**
 * get sub category name
 * @param  int 		$id 	sub category id
 *
 * @return string 	name of sub category.
 */
function get_sub_category_name($id)
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$sub_category = $CI->categories->get_sub_category($id);

	return $sub_category['name'];
}

?>