<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends Admin_Controller 
{
	/**
	 * Constructor for the class
	 */
	public function __construct() 
	{
		parent::__construct();

		$this->load->model('brand_model', 'brands');
	}

	/**
	 *  listing all brands
	 */
	public function index() 
	{
		$this->set_page_title(_l('partners'));

		$data['brands'] = $this->brands->get_all();
		$data['content'] = $this->load->view('admin/brands/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new brand
	 */
	public function add() 
	{
		$this->set_page_title(_l('partners') . ' | ' . _l('add'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			if ($_FILES['logo']['name'] != NULL) 
			{
				$result = upload_logo("assets/uploads/brands/", "logo");

				if (!$result) 
				{
					redirect('admin/brands/add');
				}

				$data['logo'] = $result;
			} 
			else 
			{
				$data['logo'] = 'assets/uploads/brands/default_brand.png';
			}

			$insert = $this->brands->insert($data);

			if ($insert) 
			{
				set_alert('success', _l('_added_successfully', _l('partner')));
				redirect('admin/brands');
			}
		} 
		else 
		{
			$data['content'] = $this->load->view('admin/brands/add', ' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * edit brand
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '') 
	{
		$this->set_page_title(_l('partners') . ' | ' . _l('edit'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			if ($_FILES['logo']['name'] != NULL) 
			{
				$result = upload_logo("assets/uploads/brands/", "logo");

				if (!$result) 
				{
					redirect('admin/brands/edit/' . $id);
				}

				$data['logo'] = $result;

				//for unlink image from folder
				$old_upload_image = $this->brands->get($id);

				if (basename($old_upload_image['logo']) != 'default_brand.png') 
				{
					unlink($old_upload_image['logo']);
				}
			}

			$result = $this->brands->update($id, $data);

			set_alert('success', _l('_updated_successfully', _l('partner')));
			redirect('admin/brands');
		} 
		else 
		{
			$data['brand'] = $this->brands->get($id);
			$data['content'] = $this->load->view('admin/brands/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Deletes the single brand record
	 */
	public function delete() 
	{
		$id = $this->input->post('brand_id');
		//in soft delete move image to deleted folder
		$old_upload_image = $this->brands->get($id);
		$imagepath = $old_upload_image['logo'];
		$newpath = 'assets/uploads/brands/deleted/' . basename($imagepath);

		if (basename($imagepath) != 'default_brand.png') 
		{
			$copied = copy($imagepath, $newpath);
			unlink($imagepath);
		}

		$deleted = $this->brands->delete($id);

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
	 * Deletes multiple brands records
	 */
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');
		//in soft delete move image to deleted folder
		$data = $this->brands->get_many($where);
		foreach ($data as $record) 
		{
			$imagepath = $record['logo'];
			$newpath = 'assets/uploads/brands/deleted/' . basename($imagepath);

			if (basename($imagepath) != 'default_brand.png') 
			{
				$copied = copy($imagepath, $newpath);
				unlink($imagepath);
			}
		}

		$deleted = $this->brands->delete_many($where);

		if ($deleted) 
		{
			$ids = implode(',', $where);
			echo 'true';
		} 
		else 
		{
			echo 'false';
		}

	}

}
