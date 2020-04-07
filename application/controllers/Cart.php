<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model', 'cart');
		$this->load->model('category_model', 'category');
	}

	public function index()
	{
		$this->set_page_title('Cart');
		$user_id            = get_loggedin_user_id();
		$data['cart_items'] = $this->cart->get_many_by(array('user_id' => $user_id));

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
}
