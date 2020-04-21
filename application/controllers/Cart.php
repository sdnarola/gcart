<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('wishlist_model', 'wishlist');
		$this->load->model('cart_model', 'cart');
		$this->load->model('category_model', 'category');
		$this->load->model('coupon_model', 'coupons');
	}

	public function index()
	{
		$this->set_page_title('Cart');
		$user_ip            = $this->input->ip_address();
		$data['cart_items'] = $this->cart->get_many_by(array('user_ip' => $user_ip));

		$data['content'] = $this->load->view('themes/default/cart', $data, TRUE);
		$this->load->view('themes/default/layouts/index', $data);
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
			$data['user_ip']      = $this->input->ip_address();
			$data['product_id']   = $id;
			$data['quantity']     = 1;
			$data['total_amount'] = $data['quantity'] * (get_product($id, 'price'));
			$data['date']         = date('Y-m-d h:i:s', time());

			$cart = $this->cart->get_by(array('user_ip' => $data['user_ip'], 'product_id' => $id));

			if ($cart['product_id'] == $id && $cart['user_ip'] == $data['user_ip'])
			{
				set_alert('warning', _l('_already_added', _l('product')));
				redirect(site_url('cart'));
			}
			else
			{
				$insert = $this->cart->insert($data);

				if ($insert)
				{
					set_alert('success', _l('_added_successfully', _l('product')));
					redirect(site_url('cart'));
				}
			}
		}
	}

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
		$this->data['date']         = date('Y-m-d h:i:s');
		$user_id                    = $this->session->userdata('user_id');
		$this->data['user_id']      = (empty($user_id)) ? '' : $user_id;
		$this->data['user_id']      = $this->session->userdata('user_id');

		$where['product_id']         = $this->data['product_id'];
		$where['user_id']            = $this->data['user_id'];
		$cart_where['user_id']       = $this->data['user_id'];
		$user_where['user_id']       = $this->data['user_id'];
		$user_where['user_ip']       = $this->data['user_ip'];
		$ip_address_where['user_id'] = $this->data['user_id'];
		$ip_address_where['user_ip'] = $this->data['user_ip'];

		$cart          = $this->cart->get_cart_data($where);
		$wishlist_data = $this->wishlist->get_wishlist_data($where);

		$wishlist_product_id = '';
		$wishlist_id         = '';
		$whishlist_user_id   = '';

		if (!empty($wishlist_data))
		{
			foreach ($wishlist_data as $key => $wishlist)
			{
				$wishlist_product_id = $wishlist['product_id'];
				$wishlist_id         = $wishlist['id'];
				$whishlist_user_id   = $wishlist['user_id'];
			}

			$wishlist_where['is_deleted'] = 1;

			if ($wishlist_product_id == $this->data['product_id'])
			{
				$this->wishlist->update($wishlist_id, $wishlist_where, FALSE);
			}
		}

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

		if ($cart_product_id == $this->data['product_id'] && $cart_user_id == $user_id && !empty($user_id))
		{
			$update_data['quantity']     = $cart_quantity + $this->data['quantity'];
			$update_data['total_amount'] = $update_data['quantity'] * (get_product($this->data['product_id'], 'price'));
			$update_data['user_ip']      = $this->data['user_ip'];

			$update = $this->cart->update($cart_id, $update_data, FALSE);

			if ($update)
			{
				$cart_data                          = $this->cart->get_cart_data($cart_where);
				$products_id                        = $this->get_products_id_foreach($cart_data);
				$cart_product_where['cart.user_id'] = $this->data['user_id'];
				$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
				$cart_record['row']                 = $this->cart->count_cart_row($cart_where);
				$cart_record['total_amount']        = $this->cart->count_total_procucts_amount($cart_where);

				echo json_encode($cart_record);
			}
		}
		elseif ($cart_product_id == $this->data['product_id'] && $cart_ip_address == $this->data['user_ip'] && empty($user_id))
		{
			$update_data['quantity'] = $cart_quantity + $this->data['quantity'];

			$update_data['total_amount'] = $update_data['quantity'] * (get_product($this->data['product_id'], 'price'));

			$update = $this->cart->update($cart_id, $update_data, FALSE);

			if ($update)
			{
				$cart_data                          = $this->cart->get_cart_data($ip_address_where);
				$products_id                        = $this->get_products_id_foreach($cart_data);
				$cart_product_where['cart.user_id'] = $this->data['user_id'];
				$cart_product_where['cart.user_ip'] = $this->data['user_ip'];
				$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
				$cart_record['row']                 = $this->cart->count_cart_row($ip_address_where);
				$cart_record['total_amount']        = $this->cart->count_total_procucts_amount($ip_address_where);

				echo json_encode($cart_record);
			}
		}
		else
		{
			$insert = $this->cart->insert($this->data);

			if ($insert)
			{
				$cart_record['row']                 = $this->cart->count_cart_row($user_where);
				$cart_data                          = $this->cart->get_cart_data($user_where);
				$products_id                        = $this->get_products_id_foreach($cart_data);
				$cart_product_where['cart.user_id'] = $this->data['user_id'];
				$cart_product_where['cart.user_ip'] = $this->data['user_ip'];
				$cart_record['Product_data']        = $this->cart->get_cart_products_detail($cart_product_where, $products_id);
				$cart_record['total_amount']        = $this->cart->count_total_procucts_amount($user_where);

				echo json_encode($cart_record);
			}
		}
	}

	public function get_products_id_foreach($recode)
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

	public function delete_cart_product()
	{
		$product_id                = $this->input->post('product_id');
		$update_data['is_deleted'] = 1;
		$where['product_id']       = $product_id;
		$where['user_id']          = $this->session->userdata('user_id');
		$ip_address                = $this->input->ip_address();
		$row_where['user_id']      = $this->session->userdata('user_id');

		if (empty($this->session->userdata('user_id')))
		{
			$where['user_ip']     = $ip_address;
			$row_where['user_ip'] = $ip_address;
		}

		$cart = $this->cart->get_cart_data($where);

		$cart_id         = '';
		$cart_ip_address = '';
		$cart_product_id = '';
		$cart_user_id    = '';

		if (!empty($cart))
		{
			foreach ($cart as $key => $value)
			{
				$cart_id         = $value['id'];
				$cart_ip_address = $value['user_ip'];
				$cart_product_id = $value['product_id'];
				$cart_user_id    = $value['user_id'];
			}
		}

		if ($product_id == $cart_product_id && $this->session->userdata('user_id') == $cart_user_id && !empty($this->session->userdata('user_id')))
		{
			$update = $this->cart->update($cart_id, $update_data, FALSE);

			if ($update)
			{
				$cart_record['row']          = $this->cart->count_cart_row($row_where);
				$cart_record['total_amount'] = $this->cart->count_total_procucts_amount($row_where);
				echo json_encode($cart_record);
			}
		}
		elseif ($product_id == $cart_product_id && $ip_address == $cart_ip_address)
		{
			$update = $this->cart->update($cart_id, $update_data, FALSE);

			if ($update)
			{
				$cart_record['row']          = $this->cart->count_cart_row($row_where);
				$cart_record['total_amount'] = $this->cart->count_total_procucts_amount($row_where);
				echo json_encode($cart_record);
			}
		}
	}

	/**
	 * Update cart details
	 */
	public function edit()
	{
		$data   = $this->input->post();
		$update = $this->cart->update($data['id'], $data);

		if ($update)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Delete the single cart record
	 */
	public function delete()
	{
		$cart_id = $this->input->post('cart_id');
		$deleted = $this->cart->delete($cart_id);

		if ($deleted)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Get coupon code details.
	 */
	public function apply_coupon()
	{
		$code = $this->input->post('coupon');
		echo json_encode($this->coupons->get_by(array('code' => $code)));
	}
}
