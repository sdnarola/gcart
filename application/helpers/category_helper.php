<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * get all categories
 * @param  int 		$id 	category id
 *
 * @return array details of categories.
 */
function get_all_categories()
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$CI->categories->order_by('name', 'ASC');
	$category = $CI->categories->get_all();

	return $category;
}

/**
 * Gets the category identifier.
 *
 * @param      <string>  $name   The category name
 *
 * @return     <int>  The category identifier.
 */
function get_category_id($name)
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$category = $CI->categories->get_by('name', $name);

	return $category['id'];
}

/**
 * Gets the requested info of category.
 *
 * @param  int  $id    The id of category.
 * @param  str  $info  The key of information required.
 *
 * @return mixed The information required.
 */
function get_category($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$category = $CI->categories->get($id);

	if ($info != '')
	{
		return $category[$info];
	}
	else
	{
		return $category;
	}
}

/**
 * Gets the requested info of sub category.
 *
 * @param  int  $id    The id of parent category.
 * @param  str  $info  The key of information required.
 *
 * @return mixed The information required.
 */
function get_sub_category($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$sub_category = $CI->categories->get_sub_category_info($id);

	if ($info != '')
	{
		return $sub_category[$info];
	}
	else
	{
		return $sub_category;
	}
}

/**
 * Gets the banners.
 *
 * @return     <array>  The banners.
 */
function get_banners()
{
	$CI = &get_instance();
	$CI->load->model('banner_model', 'banners');
	$CI->banners->order_by('title','ASC');
	$banners = $CI->banners->get_all();

 	return $banners;
}

?>