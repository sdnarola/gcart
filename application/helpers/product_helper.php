<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * [get_star_rating description]
 * @param  [int] $product_id [product id]
 * @return procucts star rating
 */
function get_star_rating($product_id)
{
	$CI = &get_instance();
	$CI->load->model('Review_model', 'review');

	$star = $CI->review->get_products_star_rating($product_id);

	return $star;
}

function get_wishlist_data($product_id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('wishlist_model', 'wishlist');
	$where['product_id'] = $product_id;
	$where['user_id']    = $CI->session->userdata('user_id');
	$product_data        = $CI->wishlist->get_wishlist_data($where);

	if ($info != '')
	{
		return $product_data[$info];
	}
	else
	{
		return $product_data;
	}
}

?>