<?php defined('BASEPATH') or exit('No direct script access allowed');

// =========================== Bhavik ==================================//

/**
 * Gets the requested info of brand.
 *
 * @param  int  $id    The id of the brand.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_brand($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('brand_model', 'brands');
	$brand = $CI->brands->get($id);

	if ($info != '')
	{
		return $brand[$info];
	}
	else
	{
		return $brand;
	}
}

// =========================== Bhavik ==================================//

?>