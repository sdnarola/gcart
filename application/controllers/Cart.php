<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->get_cart();
	}

	/**
	 * [get_cart description]
	 * @return get cart data
	 */
	public function get_cart()
	{
		if (is_user_logged_in())
		{
			$this->set_page_title('Cart');

			$user_ip                   = $this->input->ip_address();
			$user_id                   = $this->session->userdata('user_id');
			$where['user_id']          = $user_id;
			$this->data['cart_items']  = $this->cart->get_many_by(array('user_ip' => $user_ip, 'user_id' => $user_id));
			$this->data['grand_total'] = $this->cart->count_cart_total_amount_for_confirm_order($where);

			$this->template->load('index', 'content', 'cart', $this->data);
			// }
		}
		else
		{
			$this->template->load('index', 'content', 'checkout');
		}
	}

	/**
	 * Adds product in cart.
	 *
	 * @param int 	$id 	Id of the Product.
	 */
	public function add($id = '')
	{
		if ($id)
		{
			$data['user_id']      = $this->session->userdata('user_id');
			$data['product_id']   = $id;
			$data['quantity']     = 1;
			$data['total_amount'] = $data['quantity'] * (get_product($id, 'price'));
			$data['date']         = date('Y-m-d h:i:s', time());

			$cart = $this->cart->get_by(array('user_id' => $data['user_id'], 'product_id' => $id));

			if ($cart['product_id'] == $id && $cart['user_id'] == $data['user_id'])
			{
				$update_data['quantity']     = $cart['quantity'] + 1;
				$update_data['total_amount'] = $update_data['quantity'] * (get_product($id, 'price'));

				if ($this->cart->update($cart['id'], $update_data, FALSE))
				{
					redirect(site_url('home'));
				}
			}
			else
			{
				$insert = $this->cart->insert($data);

				if ($insert)
				{
					redirect(site_url('home'));
				}
			}
		}
	}

// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [Add products in cart
	 */
	public function add_cart_product()
	{
		$this->data['product_id']   = $this->input->post('product_id');
		$this->data['user_ip']      = $this->input->ip_address();
		$quantity                   = $this->input->post('quantity');
		$this->data['quantity']     = (empty($quantity)) ? 1 : $this->input->post('quantity');
		$this->data['total_amount'] = $this->data['quantity'] * (get_product($this->data['product_id'], 'price'));
		$hot_deals                  = get_hot_deals_data();

		if (!empty($hot_deals))
		{
			foreach ($hot_deals as $key => $hot_deals_data)
			{
				if ($hot_deals_data['product_id'] == $this->data['product_id'])
				{
					if ($hot_deals_data['type'] == 0)
					{
						$price                      = get_product($this->data['product_id'], 'price') - $hot_deals_data['value'];
						$this->data['total_amount'] = $price * $this->data['quantity'];
					}
					else
					{
						$save_amount                = (get_product($this->data['product_id'], 'price') * $hot_deals_data['value']) / 100;
						$price                      = get_product($this->data['product_id'], 'price') - $save_amount;
						$this->data['total_amount'] = $price * $this->data['quantity'];
					}
				}
			}
		}

		$this->data['date']    = date('Y-m-d h:i:s');
		$user_id               = $this->session->userdata('user_id');
		$this->data['user_id'] = (empty($user_id)) ? 0 : $user_id;

		$where['product_id']                           = $this->data['product_id'];
		$where['user_id']                              = $this->data['user_id'];
		$cart_where['user_id']                         = $this->data['user_id'];
		$cart_count_amount_where['cart.user_id']       = $this->data['user_id'];
		$user_where['user_id']                         = $this->data['user_id'];
		$user_where['user_ip']                         = $this->data['user_ip'];
		$user_count_amount_where['cart.user_id']       = $this->data['user_id'];
		$user_count_amount_where['cart.user_ip']       = $this->data['user_ip'];
		$ip_address_where['user_id']                   = $this->data['user_id'];
		$ip_address_where['user_ip']                   = $this->data['user_ip'];
		$ip_address_count_amount_where['cart.user_id'] = $this->data['user_id'];
		$ip_address_count_amount_where['cart.user_ip'] = $this->data['user_ip'];

		$products_quantity = get_products_info($this->data['product_id'], 'quantity');

		$cart            = $this->cart->get_cart_data($where);
		$cart_id         = '';
		$cart_ip_address = '';
		$cart_product_id = '';
		$cart_user_id    = '';
		$cart_quantity   = '';

		if (!empty($cart))
		{
			foreach ($cart as $key => $value)
			{
				$cart_id         = $value['id'];
				$cart_ip_address = $value['user_ip'];
				$cart_product_id = $value['product_id'];
				$cart_user_id    = $value['user_id'];
				$cart_quantity   = $value['quantity'];
			}
		}

		if ($cart_product_id == $this->data['product_id'] && $cart_user_id == $user_id && $user_id != 0)
		{
			$cart_record['msg']                 = 'updated success';
			$cart_data                          = $this->cart->get_cart_data($cart_where);
			$products_id                        = get_products_id_foreach($cart_data);
			$cart_product_where['cart.user_id'] = $this->data['user_id'];
			$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
			$cart_record['row']                 = $this->cart->count_cart_row($cart_where);
			$cart_record['total_amount']        = $this->cart->count_total_amount($cart_where);
		}
		elseif ($cart_product_id == $this->data['product_id'] && $cart_ip_address == $this->data['user_ip'] && $user_id == 0)
		{
			$cart_record['msg']                 = 'updated success';
			$cart_data                          = $this->cart->get_cart_data($ip_address_where);
			$products_id                        = get_products_id_foreach($cart_data);
			$cart_product_where['cart.user_id'] = $this->data['user_id'];
			$cart_product_where['cart.user_ip'] = $this->data['user_ip'];
			$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
			$cart_record['row']                 = $this->cart->count_cart_row($ip_address_where);
			$cart_record['total_amount']        = $this->cart->count_total_amount($ip_address_where);
		}
		else
		{
			if ($this->data['quantity'] <= $products_quantity)
			{
				$insert = $this->cart->insert($this->data);

				if ($insert)
				{
					$cart_record['msg']                 = 'success';
					$cart_record['row']                 = $this->cart->count_cart_row($user_where);
					$cart_data                          = $this->cart->get_cart_data($user_where);
					$products_id                        = get_products_id_foreach($cart_data);
					$cart_product_where['cart.user_id'] = $this->data['user_id'];
					$cart_product_where['cart.user_ip'] = $this->data['user_ip'];
					$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
					$cart_record['total_amount']        = $this->cart->count_total_amount($user_where);
				}
			}
			else
			{
				$cart_record['msg']          = 'quantity not available';
				$cart_record['row']          = $this->cart->count_cart_row($user_where);
				$cart_data                   = $this->cart->get_cart_data($user_where);
				$cart_record['Product_data'] = '';
				$cart_record['total_amount'] = '';
				if (!empty($cart_data))
				{
					$products_id                        = get_products_id_foreach($cart_data);
					$cart_product_where['cart.user_id'] = $this->data['user_id'];
					$cart_product_where['cart.user_ip'] = $this->data['user_ip'];
					$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
					$cart_record['total_amount']        = $this->cart->count_total_amount($user_where);
				}
			}
		}

		echo json_encode($cart_record);
	}

	/**
	 * [delete_cart_product description]
	 *
	 */
	public function delete_cart_product()
	{
		$cart_id                                = $this->input->post('cart_id');
		$user_id                                = (empty($this->session->userdata('user_id'))) ? 0 : $this->session->userdata('user_id');
		$ip_address                             = $this->input->ip_address();
		$row_where['user_id']                   = $user_id;
		$row_count_amount_where['cart.user_id'] = $user_id;

		if ($user_id == 0)
		{
			$row_count_amount_where['cart.user_ip'] = $ip_address;
			$row_where['user_ip']                   = $ip_address;
		}

		$deleted = $this->cart->delete($cart_id);

		if ($deleted == true)
		{
			$cart_record['row']          = $this->cart->count_cart_row($row_where);
			$cart_record['total_amount'] = $this->cart->count_cart_total_amount_for_confirm_order($row_count_amount_where);
		}

		echo json_encode($cart_record);
	}

// ============================================ END WORK BY KOMAl =================================================================================================
	/**
	 * Update cart details
	 */
	public function edit()
	{
		$data                      = $this->input->post();
		$update                    = $this->cart->update($data['id'], $data);
		$where['user_id']          = $this->session->userdata('user_id');
		$this->data['grand_total'] = $this->cart->count_cart_total_amount_for_confirm_order($where);

		if ($update)
		{
			$this->data['msg'] = 'true';
		}
		else
		{
			$this->data['msg'] = 'false';
		}

		echo json_encode($this->data);
	}

	/**
	 * Delete the single cart record
	 */
	public function delete()
	{
		$cart_id = $this->input->post('cart_id');
		$deleted = $this->cart->delete($cart_id);
		$user_id = $this->session->userdata('user_id');

		if ($deleted)
		{
			$this->data['msg']       = 'deleted';
			$this->data['cart_data'] = $this->cart->get_by(array('user_id' => $user_id));
		}
		else
		{
			$this->data['msg'] = 'false';
		}

		echo json_encode($this->data);
	}

	/**
	 * Get coupon code details.
	 */
	public function apply_coupon()
	{
		$code    = $this->input->post('coupon');
		$user_id = $this->session->userdata('user_id');

		$Orders_data     = $this->order->get_many_by(array('user_id' => $user_id));
		$order_coupon_id = array();

		foreach ($Orders_data as $key => $value)
		{
			$order_coupon_id[] = $value['coupon_id'];
		}

		if (!empty($code))
		{
			$coupone_data   = $this->coupons->get_by(array('code' => $code, 'start_date <' => date('Y-m-d h:i:s'), 'end_date >' => date('Y-m-d h:i:s')));
			$tmp_order_data = $this->tmp_order->get_by(array('user_id' => $user_id, 'coupon_id' => $coupone_data['id']));

			if (in_array($coupone_data['id'], $order_coupon_id))
			{
				echo json_encode('Invalid');
			}
			else
			{
				if ($coupone_data['quantity'] > $coupone_data['used'])
				{
					if ($user_id != $tmp_order_data['user_id'] && $tmp_order_data['coupon_id'] != $coupone_data['id'])
					{
						$this->data['coupon_id'] = $coupone_data['id'];
						$this->data['user_id']   = $user_id;

						$this->tmp_order->insert($this->data);
					}

					if (!empty($coupone_data))
					{
						echo json_encode($this->coupons->get_by(array('code' => $code, 'start_date <' => date('Y-m-d h:i:s'), 'end_date >' => date('Y-m-d h:i:s'))));
					}
					else
					{
						echo json_encode('Invalid');
					}
				}
				else
				{
					echo json_encode('Invalid');
				}
			}
		}
	}
}
