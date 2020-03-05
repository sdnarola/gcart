<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Vendor_Controller
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
		$vendor_id        = $this->session->userdata('vendor_id');
		$data['products'] = $this->products->get_many_by('vendor_id', $vendor_id);
		$data['content']  = $this->load->view('vendor/products/index', $data, TRUE);
		$this->load->view('vendor/layouts/index', $data);
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
			$data['vendor_id']        = $this->session->userdata('vendor_id');
			$data['related_products'] = serialize($this->input->post('related_products'));

			if ($_FILES['thumb_image']['name'] != null)
			{
				$upload = image_upload();

				if (!$upload)
				{
					redirect('vendor/products');
				}

				$data['thumb_image'] = $upload['thumb_image'];
			}

			if (!empty($_FILES['image']['name'][0]))
			{
				$multi_upload = multiple_image_upload();

				if (!$multi_upload)
				{
					redirect('vendor/products');
				}

				$data['images'] = $multi_upload['images'];
			}

			$insert = $this->products->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('product')));
				redirect('vendor/products');
			}
		}
		else
		{
			$data['brands']     = $this->brands->get_all();
			$data['categories'] = $this->categories->get_all();
			$data['products']   = $this->products->get_all();

			$data['content'] = $this->load->view('vendor/products/add', $data, TRUE);
			$this->load->view('vendor/layouts/index', $data);
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
				$data['vendor_id']        = $this->session->userdata('vendor_id');
				$data['related_products'] = serialize($this->input->post('related_products'));

				if ($_FILES['thumb_image']['name'] != null)
				{
					$upload = image_upload();

					if (!$upload)
					{
						redirect('vendor/products');
					}

					$data['thumb_image'] = $upload['thumb_image'];
				}

				if (!empty($_FILES['image']['name'][0]))
				{
					$multi_upload = multiple_image_upload();

					if (!$multi_upload)
					{
						redirect('vendor/products');
					}

					$data['images'] = $multi_upload['images'];
				}

				$update = $this->products->update($id, $data);

				if ($update)
				{
					set_alert('success', _l('_updated_successfully', _l('product')));
					redirect('vendor/products');
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

				$data['content'] = $this->load->view('vendor/products/edit', $data, TRUE);
				$this->load->view('vendor/layouts/index', $data);
			}
		}
		else
		{
			redirect('vendor/products');
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

			if (!$data['product'])
			{
				redirect('vendor/products');
			}

			$data['content'] = $this->load->view('vendor/products/details', $data, TRUE);
			$this->load->view('vendor/layouts/index', $data);
		}
		else
		{
			redirect('vendor/products');
		}
	}

	public function get_sub_categories($id)
	{
		$data = $this->categories->get_sub_categories($id);
		echo json_encode($data);
	}
}
