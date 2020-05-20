<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [index description]
	 *
	 */
	public function index()
	{
		$this->set_page_title('Wishlist');
		if (is_user_logged_in())
		{
			$this->get_wishlist_data();
		}
		else
		{
			redirect(site_url('authentication'));
		}
	}

	/**
	 * [get_wishlist_data description]
	 * return user wish list data
	 */
	public function get_wishlist_data()
	{
		$user_id = $this->session->userdata('user_id');

		if (!empty($user_id))
		{
			$where['user_id'] = $user_id;

			$this->data['wishlist_data'] = $this->wishlist->get_wishlist_data($where);

			$this->template->load('index', 'content', 'wishlist', $this->data);
		}
	}

	/**
	 * [add_wishlist_products description]
	 */
	public function add_wishlist_products()
	{
		$this->data['product_id'] = $this->input->post('products_id');
		$this->data['user_id']    = $this->session->userdata('user_id');

		$where['user_id']    = $this->data['user_id'];
		$where['product_id'] = $this->data['product_id'];
		$wishlist_data       = $this->wishlist->get_wishlist_data($where);

		$whishlist_users_id    = '';
		$whishlist_products_id = '';
		$Wishlist_id           = '';

		if (!empty($wishlist_data))
		{
			foreach ($wishlist_data as $key => $value)
			{
				$Wishlist_id           = $value['id'];
				$whishlist_users_id    = $value['user_id'];
				$whishlist_products_id = $value['product_id'];
			}
		}

		if ($this->data['user_id'] == $whishlist_users_id && $this->data['product_id'] == $whishlist_products_id)
		{
			$update_data['is_deleted'] = 1;
			$update                    = $this->wishlist->update($Wishlist_id, $update_data, FALSE);

			if ($update)
			{
				echo 'Already Exits';
			}
		}
		else
		{
			$insert = $this->wishlist->insert($this->data);

			if ($insert)
			{
				echo 'success';
			}
		}
	}

	/**
	 * [delete_wishlist_product description]
	 */
	public function delete_wishlist_product()
	{
		$products_id         = $this->input->post('product_id');
		$user_id             = $this->session->userdata('user_id');
		$where['user_id']    = $user_id;
		$where['product_id'] = $products_id;
		$wishlist_data       = $this->wishlist->get_wishlist_data($where);

		$whishlist_users_id    = '';
		$whishlist_products_id = '';
		$Wishlist_id           = '';

		foreach ($wishlist_data as $key => $value)
		{
			$Wishlist_id           = $value['id'];
			$whishlist_users_id    = $value['user_id'];
			$whishlist_products_id = $value['product_id'];
		}

		$update_where['is_deleted'] = 1;
		$update                     = $this->wishlist->update($Wishlist_id, $update_where, FALSE);

		$wishlist_data_where['user_id']     = $user_id;
		$wishlist_record['wishlist_detail'] = $this->wishlist->get_wishlist_data($wishlist_data_where);

		if ($update)
		{
			$wishlist_record['deleted_data'] = 'success';
		}

		echo json_encode($wishlist_record);
	}

// ============================================ END WORK BY KOMAl =================================================================================================
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
