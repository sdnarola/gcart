<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('wishlist_model', 'wishlist');
		$this->load->model('category_model', 'category');
		$this->load->model('Product_model', 'product');
	}

	public function index()
	{
		$this->set_page_title('Wishlist');

		$user_id = $this->session->userdata('user_id');

		if (!empty($user_id))
		{
			$where['user_id'] = $user_id;
			$whishlist_data   = $this->wishlist->get_many_by($where);
			$products_id      = array();

			foreach ($whishlist_data as $key => $data)
			{
				$products_id[] = $data['product_id'];
			}
			if(!empty($products_id))
			{
				$this->data['whishlist_data'] = $this->product->get_whislist_products($products_id);
			
			}
			$this->template->load('index', 'content', 'wishlist', $this->data);
		}
	}

	/**
	 * Adds product in wishlist.
	 *
	 * @param int 	$id 	Id of the Product.
	 */
	public function add($id = '')
	{
		if ($id)
		{
			$data['user_id']    = $this->session->userdata('user_id');
			$data['product_id'] = $id;
			$wishlist           = $this->wishlist->get_by(array('user_id' => $data['user_id'], 'product_id' => $data['product_id']));

			if ($wishlist['user_id'] == $data['user_id'] && $wishlist['product_id'] == $data['product_id'])
			{
				echo 'already added';
			}
			else
			{
				$insert = $this->wishlist->insert($data);

				if ($insert)
				{
					redirect(site_url('home'));
				}
			}
		}
	}

	public function add_wishlist_products()
	{
		$this->data['product_id'] = $this->input->post('products_id');
		$this->data['user_id']    = $this->session->userdata('user_id');

		$wishlist_data = $this->wishlist->get_wishlist_data();

		$whishlist_users_id = array();

		$whishlist_products_id = array();

		foreach ($wishlist_data as $key => $value)
		{
			$whishlist_users_id[] = $value['user_id'];

			$whishlist_products_id[] = $value['product_id'];
		}

		if ((in_array($this->data['user_id'], $whishlist_users_id)) && (in_array($this->data['product_id'], $whishlist_products_id)))
		{
			echo 'Already Exits';
		}
		else
		{
			$insert = $this->wishlist->insert($this->data);
		}
	}
}
