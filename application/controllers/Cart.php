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
	}

	public function add($id = '')
	{
		if ($id)
		{
			$data['user_id']      = $this->session->userdata('user_id');
			$data['product_id']   = $id;
			$data['quantity']     = 1;
			$data['total_amount'] = $data['quantity'] * (get_product($id, 'price'));
			$data['date']         = date('Y-m-d h:i:s', time());
			$insert               = $this->cart->insert($data);

			if ($insert)
			{
				redirect(site_url('home'));
			}
		}
	}
}
