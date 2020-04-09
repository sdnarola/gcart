<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('wishlist_model', 'wishlist');
		$this->load->model('category_model', 'category');
	}

	public function index()
	{
		$this->set_page_title('Wishlist');
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
}
