<?php defined('BASEPATH') or exit('No direct script access allowed');

// =========================== Bhavik ==================================//

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
	$sub_category = $CI->categories->get_sub_category($id);

	if ($info != '')
	{
		return $sub_category[$info];
	}
	else
	{
		return $sub_category;
	}
}

// =========================== Bhavik ==================================//

?>