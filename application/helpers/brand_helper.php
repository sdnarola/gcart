<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * get brand name
 * @param  int 		$id 	brand id
 *
 * @return string 	name of brand.
 */
function get_brand_name($id)
{
	$CI = &get_instance();
	$CI->load->model('brand_model', 'brands');
	$brand = $CI->brands->brands->get($id);

	return $brand['name'];
}

?>