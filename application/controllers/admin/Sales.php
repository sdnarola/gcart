<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =========================== Bhavik ==================================//

class Sales extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model', 'products');
	}

	public function index()
	{
		$this->set_page_title(_l('sales'));
		$data['sales']   = $this->products->get_many_by('is_sale', 1);
		$data['content'] = $this->load->view('admin/sales/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new Product
	 */
	public function add()
	{
		$this->set_page_title(_l('sales').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();

			//price of prodduct
			$old_price = get_product($data['product_id'], 'price');

			if ($data['type'] == 1)
			{
				//discount by percentage
				$new_price = $old_price - ($old_price * ($data['value'] / 100));
			}
			elseif ($data['type'] == 0)
			{
				//discount by amount
				$new_price = $old_price - $data['value'];
			}

			$update_data = array(
				'old_price' => $old_price,
				'price'     => $new_price,
				'is_sale'   => 1
			);

			$update = $this->products->update($data['product_id'], $update_data);

			if ($update)
			{
				set_alert('success', _l('_added_successfully', _l('sale')));
				redirect('admin/sales');
			}
		}
		else
		{
			$data['products'] = $this->products->get_many_by(array('is_hot' => 0, 'is_sale' => 0));
			$data['content']  = $this->load->view('admin/sales/add', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Delete the single deal record
	 */
	public function delete()
	{
		$product_id = $this->input->post('product_id');
		$price      = get_product($product_id, 'old_price');

		$update_data = array(
			'old_price' => 0,
			'price'     => $price,
			'is_sale'   => 0
		);

		$update = $this->products->update($product_id, $update_data);

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
	 * Deletes multiple sales records
	 */
	public function delete_selected()
	{
		$where = $this->input->post('ids');

		foreach ($where as $product_id)
		{
			$price = get_product($product_id, 'old_price');

			$update_data = array(
				'old_price' => 0,
				'price'     => $price,
				'is_sale'   => 0
			);

			$update = $this->products->update($product_id, $update_data);
		}

		if ($update)
		{
			$ids = implode(',', $where);
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

// =========================== Bhavik ==================================//
}
