<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * get all categories name
 * @param  int 		$id 	category id
 *
 * @return array details of categories.
 */
function get_all_categories()
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$CI->categories->order_by('name','ASC');
	$category = $CI->categories->get_all();


	return $category;
}

/**
 * get category data
 * @param  int 		$id 	category id
 *
 * @return string 	name of category.
 */
function get_category($id)
{
	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');
	$category = $CI->categories->get($id);

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
	$category = $CI->categories->get_by('name',$name);

	return $category['id'];
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

/**
 * Uploads an icon.
 *
 * @return     array  ( returns uploaded data path else return error )
 */
function upload_icon()
{

	$CI = &get_instance();
	$CI->load->model('category_model', 'categories');

	$config['upload_path']   = 'assets/uploads/main_categories/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = 100;
	$config['file_name']     = time().'-'.$_FILES['icon']['name'];

	$CI->upload->initialize($config);

	if (!$CI->upload->do_upload('icon'))
	{
		$error = array('error' => $CI->upload->display_errors());
		set_alert('danger', ucwords($error['error']));
		return false;
	}

	$uploadData          =$CI->upload->data();
	print_r($uploadData);
	$data['icon'] = $uploadData['full_path'];

	return $data;
}

?>