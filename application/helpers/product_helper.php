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

?>