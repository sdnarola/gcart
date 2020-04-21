<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
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
