<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for all front-end controllers
 */
class Frontend_Controller extends MY_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		if (get_settings('maintenance') == 1)
		{
			redirect(site_url('authentication/maintenance'));
		}

		$this->load->model('category_model', 'category');
		$this->load->model('brand_model', 'brands');
		$this->load->model('City_model', 'city');
		$this->load->model('State_model', 'state');
		$this->load->model('Banner_model', 'banners');
		$this->load->model('comment_model', 'comments');
		$this->load->model('wishlist_model', 'wishlist');
		$this->load->model('product_model', 'products');
		$this->load->model('user_model', 'users');
		$this->load->model('coupon_model', 'coupons');
		$this->load->model('Order_model', 'order');
		$this->load->model('users_address_model', 'users_address');
		$this->load->model('Tmp_order_data_model', 'tmp_order');
		$this->load->model('cart_model', 'cart');
		$this->load->model('deal_model', 'deals');
		$this->load->model('vendor_model', 'vendors');
		$this->load->model('newsletter_model', 'news_letters');
		$this->load->model('Review_model', 'review');
		$this->update_cart_data();
	}

	/**
	 * [update_cart_data description]
	 * @return products already add to cart and this products in hot deals so change price
	 */
	public function update_cart_data()
	{
		$user_id               = $this->session->userdata('user_id');
		$where['user_id']      = (empty($user_id)) ? 0 : $user_id;
		$hot_deals_products_id = array();

		if ($where['user_id'] == 0)
		{
			$where['user_ip'] = $this->input->ip_address();
		}

		$cart = $this->cart->get_cart_data($where);

		if (!empty($cart))
		{
			foreach ($cart as $key => $cart_data)
			{
				$hot_deals = get_hot_deals_data();

				if (!empty($hot_deals))
				{
					foreach ($hot_deals as $key => $hot_deals_data)
					{
						$hot_deals_products_id[] = $hot_deals_data['product_id'];

						if ($cart_data['product_id'] == $hot_deals_data['product_id'])
						{
							if ($hot_deals_data['type'] == 0)
							{
								$price                        = get_product($cart_data['product_id'], 'price') - $hot_deals_data['value'];
								$update_where['total_amount'] = $price * $cart_data['quantity'];
								$this->cart->update($cart_data['id'], $update_where, FALSE);
							}
							else
							{
								$save_amount                  = (get_product($cart_data['product_id'], 'price') * $hot_deals_data['value']) / 100;
								$price                        = get_product($cart_data['product_id'], 'price') - $save_amount;
								$update_where['total_amount'] = $price * $cart_data['quantity'];
								$this->cart->update($cart_data['id'], $update_where, FALSE);
							}
						}
					}
				}

				if (!in_array($cart_data['product_id'], $hot_deals_products_id))
				{
					$update_where['total_amount'] = get_products_info($cart_data['product_id'], 'price') * $cart_data['quantity'];
					$this->cart->update($cart_data['id'], $update_where, FALSE);
				}
			}
		}
	}
}
