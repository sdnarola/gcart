<?php defined('BASEPATH') or exit('No direct script access allowed');

// ====================================WORK BY KOMAL ============================================================
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
	$CI->load->model('Deal_model', 'deals');
	$get_hot_deals = $CI->deals->get_many_by(array('is_deleted' => 0, 'end_date >' => date('Y-m-d h:i:s'), 'start_date <' => date('Y-m-d h:i:s')));

	if ($get_hot_deals)
	{
		return $get_hot_deals;
	}
}

// ====================================END WORK BY KOMAL ============================================================
/**================vixuti patel====================================================================================*
 * [get_product_review_by_user description]
 * @param  [int] $product_id [product_id]
 * @param  [int] $user_id    [user_id ]
 * @return [array]   $result  [review details]
 */
function get_product_review_by_user($product_id, $user_id)
{
	$CI = &get_instance();
	$CI->load->model('Review_model', 'review');
	$where['product_id'] = $product_id;
	$where['user_id']    = $user_id;
	$result              = $CI->review->get_products_by_review($where);

	return $result;
}

/**
 * [display_product_ratings stars]
 * @param  [type] $product_id [product id]
 */
function display_product_ratings($product_id)
{
	$CI = &get_instance();
	$CI->load->model('product_model', 'product');
	$reviews = $CI->product->get_all_reviews();

	if (empty(get_star_rating($product_id)))
	{
		for ($i = 1; $i <= 5; $i++)
		{
			echo '<div class="fa fa-star-o"></div>';
		}
	}

	foreach ($reviews as $review)
	{
		if ($review['product_id'] == $product_id)
		{
			$i = 1;

			for ($i; $i <= $review['star_ratings']; $i++)
			{
				echo '<div class="fa fa-star" style="color: orange"></div>';
			}

			for ($i = $i; $i <= 5; $i++)
			{
				echo '<div class="fa fa-star-o"></div>';
			}
		}
	}
}

/**
 * [get_grand_total  <get grand total by coupon id  and total amount>]
 * @param  [type] $coupon_id [coupon id]
 * @param  [mixed] $total_amount [total amount]
 * @return [mixed]  $grand_total_amount  [amount]
 */
function get_grand_total($coupon_id, $total_amount)
{
	$CI = &get_instance();
	$CI->load->model('coupon_model', 'coupon');
	$coupon_data = $CI->coupon->get_by(array('id' => $coupon_id, 'start_date <' => date('Y-m-d h:i:s'), 'end_date >' => date('Y-m-d h:i:s')));

	if (!empty($coupon_data))
	{
		if ($coupon_data['quantity'] > $coupon_data['used'])
		{
			if ($coupon_data['type'] == 1)
			{
				$coupon_amount      = floor(($total_amount * $coupon_data['amount']) / 100);
				$grand_total_amount = floor($total_amount - $coupon_amount);

				return $grand_total_amount;
			}
			elseif ($coupon_data['type'] == 0)
			{
				$coupon_amount      = $coupon_data['amount'];
				$grand_total_amount = $total_amount - $coupon_amount;

				return $grand_total_amount;
			}
			else
			{
				return 0;
			}
		}
	}
	else
	{
		return 0;
	}
}

/**===================================code end by vixuti patel=======================================**/

?>