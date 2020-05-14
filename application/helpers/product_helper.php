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

/**
 * Gets the requested info of procucts.
 *
 * @param  int  $id    The id of the product.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_products_info($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('Product_model', 'products');

	$product = $CI->products->get($id);

	if ($info != '')
	{
		return $product[$info];
	}
	else
	{
		return $product;
	}
}

/**
 * [get_products_id_foreach description]
 * @param  [array] $recode [products detail in array]
 *
 */
function get_products_id_foreach($recode)
{
	$ids = array();

	foreach ($recode as $key => $value)
	{
		$ids[] = $value['product_id'];
	}

	$ids = implode(',', $ids);
	$ids = explode(',', $ids);

	return $ids;
}

/**
 * [get_hot_deals_data description]
 * @return hot deals data in array
 */
function get_hot_deals_data()
{
	$CI = &get_instance();
	$CI->load->model('Product_model', 'products');

	$get_hot_deals = $CI->products->get_hot_deals_data();

	if ($get_hot_deals)
	{
		return $get_hot_deals;
	}
}

?>