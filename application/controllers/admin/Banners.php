<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends Admin_Controller 
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('banner_model', 'banners');
	}

	/**
	 *  listing all banners
	 */
	public function index() 
	{
		$this->set_page_title(_l('banners'));

		$data['banners'] = $this->banners->get_all();
		$data['content'] = $this->load->view('admin/settings/banners/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new banner
	 */
	public function add() 
	{
		$this->set_page_title(_l('banners') . ' | ' . _l('add'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			if ($_FILES['banner']['name'] != NULL) 
			{
				$result = upload_logo("assets/uploads/banners/", "banner");

				if (!$result) 
				{
					redirect('admin/banners/add');
				}

				$data['banner'] = $result;
			} 
			else 
			{
				$data['banner'] = 'assets/uploads/banners/default_banner.png';
			}

			$insert = $this->banners->insert($data);

			if ($insert) 
			{
				set_alert('success', _l('_added_successfully', _l('banner')));
				redirect('admin/banners');
			}
		} 
		else 
		{
			$data['content'] = $this->load->view('admin/settings/banners/add', ' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * edit banner
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '') 
	{
		$this->set_page_title(_l('banners') . ' | ' . _l('edit'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			if ($_FILES['banner']['name'] != NULL) 
			{
				$result = upload_logo("assets/uploads/banners/", "banner");

				if (!$result) 
				{
					redirect('admin/banners/edit/' . $id);
				}

				$data['banner'] = $result;

				//for unlink image from folder
				$old_upload_image = $this->banners->get($id);

				if (basename($old_upload_image['banner']) != 'default_banner.png') 
				{
					unlink($old_upload_image['banner']);
				}
			}

			$result = $this->banners->update($id, $data);

			set_alert('success', _l('_updated_successfully', _l('banner')));
			redirect('admin/banners');
		} 
		else 
		{
			$data['banner'] = $this->banners->get($id);
			$data['content'] = $this->load->view('admin/settings/banners/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Deletes the single banner record
	 */
	public function delete() 
	{
		$id = $this->input->post('banner_id');
		//in soft delete move image to deleted folder
		$old_upload_image = $this->banners->get($id);
		$imagepath = $old_upload_image['banner'];
		$newpath = 'assets/uploads/banners/deleted/' . basename($imagepath);

		if (basename($imagepath) != 'default_banner.png') 
		{
			$copied = copy($imagepath, $newpath);
			unlink($imagepath);
		}

		$deleted = $this->banners->delete($id);

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
	 * Deletes multiple banners records
	 */
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');
		//in soft delete move image to deleted folder
		$data = $this->banners->get_many($where);
		foreach ($data as $record) 
		{
			$imagepath = $record['banner'];
			$newpath = 'assets/uploads/banners/deleted/' . basename($imagepath);

			if (basename($imagepath) != 'default_banner.png') 
			{
				$copied = copy($imagepath, $newpath);
				unlink($imagepath);
			}
		}

		$deleted = $this->banners->delete_many($where);

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
