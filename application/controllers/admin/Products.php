<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('brand_model', 'brands');
		$this->load->model('category_model', 'categories');
		$this->load->model('product_model', 'products');
	}

	public function index()
	{
		$this->set_page_title(_l('products'));
		$data['products'] = $this->products->get_all();
		$data['content']  = $this->load->view('admin/products/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new Product
	 */
	public function add()
	{
		$this->set_page_title(_l('products').' | '._l('add'));

		if ($this->input->post())
		{
			$data                     = $this->input->post();
			$data['related_products'] = serialize($this->input->post('related_products'));

			//upload start
			$config['upload_path']   = 'assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
			$config['file_name']     = time().'-'.$_FILES['thumb_image']['name'];
			$config['max_size']      = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('thumb_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				set_alert('danger', ucwords($error['error']));
				redirect('admin/products');
			}
			else
			{
				$UploadData          = $this->upload->data();
				$data['thumb_image'] = $config['upload_path'].$UploadData['file_name'];
			}

			//upload ends
			$insert = $this->products->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('product')));
				redirect('admin/products');
			}
		}
		else
		{
			$data['brands']     = $this->brands->get_all();
			$data['categories'] = $this->categories->get_all();
			$data['products']   = $this->products->get_all();

			$data['content'] = $this->load->view('admin/products/add', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Updates the product record
	 *
	 * @param int  $id  The product id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('users').' | '._l('edit'));

		if ($id)
		{
			if ($this->input->post())
			{
				$data                     = $this->input->post();
				$data['related_products'] = serialize($this->input->post('related_products'));

				//upload start
				$config['upload_path']   = 'assets/uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG';
				$config['max_size']      = 10000;
				$config['file_name']     = time().'-'.$_FILES['thumb_image']['name'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('thumb_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					set_alert('danger', ucwords($error['error']));
					redirect('admin/products');
				}
				else
				{
					$UploadData          = $this->upload->data();
					$data['thumb_image'] = $config['upload_path'].$UploadData['file_name'];
				}

				//upload ends

				$update = $this->products->update($id, $data);

				if ($update)
				{
					set_alert('success', _l('_updated_successfully', _l('product')));
					redirect('admin/products');
				}
			}
			else
			{
				$data['brands']         = $this->brands->get_all();
				$data['categories']     = $this->categories->get_all();
				$data['sub_categories'] = $this->categories->get_sub_categories();
				$data['products']       = $this->products->get_all();
				$data['product']        = $this->products->get($id);

				$data['related_products'] = $this->load->view('admin/products/related_products', $data, TRUE);

				$data['content'] = $this->load->view('admin/products/edit', $data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}
		}
		else
		{
			redirect('admin/products');
		}
	}

/**
 * Toggles the porduct status to Active or Inactive
 */
	public function update_status()
	{
		$product_id = $this->input->post('product_id');
		$data       = array('is_active' => $this->input->post('is_active'));

		$update = $this->products->update($product_id, $data);

		if ($update)
		{
			if ($this->input->post('is_active') == 1)
			{
				echo 'true';
			}
			else
			{
				echo 'false';
			}
		}
	}

	/**
	 * Delete the single product record
	 */
	public function delete()
	{
		$product_id = $this->input->post('product_id');
		$deleted    = $this->products->delete($product_id);

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
	 * Deletes multiple products records
	 */
	public function delete_selected()
	{
		$where   = $this->input->post('ids');
		$deleted = $this->products->delete_many($where);

		if ($deleted)
		{
			$ids = implode(',', $where);
			log_activity("Products Deleted [IDs: $ids]");
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * show the single product details
	 */
	public function details($id = '')
	{
		if ($id)
		{
			$data['product'] = $this->products->get($id);

			if ($data['product'])
			{
				$data['content'] = $this->load->view('admin/products/details', $data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}
			else
			{
				redirect('admin/products');
			}
		}
		else
		{
			redirect('admin/products');
		}
	}
}
