<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('vendor_model', 'vendors');
		$this->load->model('product_model', 'products');
		$this->load->model('settings_model', 'settings');
		$this->load->model('subscriptions_model', 'subscriptions');
	}

	/**
	 * Loads the list of vendors.
	 */
	public function index()
	{
		$this->set_page_title(_l('vendors'));

		$data['vendors']      = $this->vendors->get_all();
		$data['registration'] = $this->settings->get_by('name', 'vendors_registration');

		$data['content'] = $this->load->view('admin/vendors/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Deletes the single vendor record
	 */
	public function delete()
	{
		$vendor_id = $this->input->post('vendor_id');

		$vendor = $this->vendors->get($vendor_id);
		$imagepath = $vendor['profile_image'];
		$newpath = 'assets/uploads/vendors/profile/deleted/'.basename($imagepath);

		$logopath = $vendor['logo'];
		$new_logopath = 'assets/uploads/vendors/logo/deleted/'.basename($logopath);

		if(basename($imagepath) != 'default_img.png')
		{
			$copied = copy($imagepath , $newpath);
			unlink($imagepath);
		} 

		if(basename($logopath) != 'default_logo.png')
		{
			$copied = copy($logopath , $new_logopath);
			unlink($logopath);
		} 

		$deleted = $this->vendors->delete($vendor_id);

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
	 * Deletes multiple vendors records
	 */
	public function delete_multiple()
	{
		$where = $this->input->post('ids');

		$data= $this->vendors->get_many($where);
		
		foreach($data as $record)
		{
			$imagepath = $record['profile_image'];
			$newpath = 'assets/uploads/vendors/profile/deleted/'.basename($imagepath);
			$logopath = $record['logo'];
			$new_logopath = 'assets/uploads/vendors/logo/deleted/'.basename($logopath);

			if(basename($imagepath) != 'default_img.png')
			{
				$copied = copy($imagepath , $newpath);
				unlink($imagepath);
			}

			if(basename($logopath) != 'default_logo.png')
			{
				$copied = copy($logopath , $new_logopath);
				unlink($logopath);
			} 
		}


		$deleted = $this->vendors->delete_many($where);

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

	/**
	 * Updates the vendor record
	 *
	 * @param int  $id  The vendor id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('vendors').' | '._l('edit'));

		if ($this->input->post())
		{
			$data              = $this->input->post();
			$data['is_active'] = ($this->input->post('is_active')) ? 1 : 0;

			$update = $this->vendors->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('vendor')));
				redirect('admin/vendors');
			}
		}
		else
		{
			$data['vendor'] = $this->vendors->get($id);

			$data['content'] = $this->load->view('admin/vendors/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * contains details of vendor
	 *
	 * @param      <int>  $id     The vendor id
	 */
	public function details($id)
	{
		$this->set_page_title(_l('vendors').' | '._l('details'));

		$data['vendor']  = $this->vendors->get($id);
		$this->products->order_by('name', 'ASC');
		$data['records'] = $this->products->get_products($id);

		$data['content'] = $this->load->view('admin/vendors/details', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Toggles the vendor status to Active or Inactive
	 */
	public function update_status()
	{
		$vendor_id = $this->input->post('vendor_id');
		$data      = array('is_active' => $this->input->post('is_active'));

		$update = $this->vendors->update($vendor_id, $data);

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
	 * Toggles the vendor registration status to Active or De-active
	 */
	public function registration_status()
	{
		$data  = array('value' => $this->input->post('value1'));
		$where = array('name' => 'vendors_registration');

		$update = $this->settings->update_by($where, $data);

		if ($update)
		{
			if ($this->input->post('value1') == 1)
			{
				echo 'true';
			}
			else
			{
				echo 'false';
			}
		}
	}
}
