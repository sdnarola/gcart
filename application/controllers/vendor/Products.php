<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =========================== Bhavik ==================================//

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
			$data['add_date']         = date('Y-m-d h:i:s', time());
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
					$thumb_image         = get_product($id, 'thumb_image');
					unlink($thumb_image);
				}

				if (!empty($_FILES['image']['name'][0]))
				{
					$multi_upload = multiple_image_upload();

					if (!$multi_upload)
					{
						redirect('vendor/products');
					}

					$data['images'] = $multi_upload['images'];
					$images         = unserialize(get_product($id, 'images'));

					foreach ($images as $image)
					{
						unlink($image);
					}
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
				$data['sub_categories'] = $this->categories->get_sub_categories_of_parent_category();
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
	 * Toggles the product status to Active or Inactive
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
		$vendor_id  = $this->session->userdata('vendor_id');

		$thumb_image = get_product($product_id, 'thumb_image'); //get thumb_image
		$images      = unserialize(get_product($product_id, 'images')); //get multiple images

		$deleted = $this->products->delete($product_id);

		if ($deleted)
		{
			//thumb image//
			$copy_thumb = str_replace('products', 'products/deleted', $thumb_image); //replace path
			copy($thumb_image, $copy_thumb); //copy image
			unlink($thumb_image);

			foreach ($images as $image) //multiple images//
			{
				$copy_image = str_replace('products', 'products/deleted', $image); //replace path
				copy($image, $copy_image); //copy image
				unlink($image);
			}

			$this->vendors->update_total_product($vendor_id, 'total_products - 1');
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
		$where     = $this->input->post('ids');
		$count     = count($where);
		$vendor_id = $this->session->userdata('vendor_id');

		foreach ($where as $product_id)
		{
			$thumb_image = get_product($product_id, 'thumb_image'); //get thumb_image
			$images      = unserialize(get_product($product_id, 'images'));

			//thumb image//
			$copy_thumb = str_replace('products', 'products/deleted', $thumb_image); //replace path
			copy($thumb_image, $copy_thumb); //copy image
			unlink($thumb_image);

			foreach ($images as $image) //multiple images//
			{
				$copy_image = str_replace('products', 'products/deleted', $image); //replace path
				copy($image, $copy_image); //copy image
				unlink($image);
			}
		}

		$deleted = $this->products->delete_many($where);
		$update  = $this->vendors->update_total_product($vendor_id, 'total_products - '.$count);

		if ($deleted && $update)
		{
			$ids = implode(',', $where);
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * show the product details.
	 */
	public function details($id = '')
	{
		$this->set_page_title(_l('product_details'));

		$vendor_id = $this->session->userdata('vendor_id');

		if ($id)
		{
			$data['product'] = $this->products->get_by(array('id' => $id, 'vendor_id' => $vendor_id));

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

	/**
	 * Get sub categories of parent category.
	 *
	 * @param  int  	$id  	Id of parent category.
	 *
	 * @return mixed 			array of json-data
	 */
	public function get_sub_categories($id)
	{
		$data = $this->categories->get_sub_categories_of_parent_category($id);
		echo json_encode($data);
	}

// =========================== Bhavik ==================================//
}
