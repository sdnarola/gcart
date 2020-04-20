<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'users');
<<<<<<< HEAD
		$this->load->model('vendor_model', 'vendors');
	}

	/**
	 * Updates user's personal profile details.
=======
<<<<<<< HEAD
		$this->load->model('activity_log_model', 'activity_log');
	}

	/**
	 * Updates user's personal profile details
=======
		$this->load->model('vendor_model', 'vendors');
	}

	/**
	 * Updates user's personal profile details.
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
>>>>>>> feature/category-page
	 */
	public function edit()
	{
		$this->set_page_title(_l('edit_profile'));
		$id = get_loggedin_user_id();

		if ($id)
		{
<<<<<<< HEAD
			$data['user']      = $this->users->get($id);
			$data['shop_name'] = get_vendor_info($id, 'shop_name');
			$data['content']   = $this->load->view('admin/profile/edit', $data, TRUE);
=======
<<<<<<< HEAD
			$data['user']    = $this->users->get($id);
			$data['content'] = $this->load->view('admin/profile/edit', $data, TRUE);
=======
			$data['user']      = $this->users->get($id);
			$data['shop_name'] = get_vendor_info($id, 'shop_name');
			$data['content']   = $this->load->view('admin/profile/edit', $data, TRUE);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
>>>>>>> feature/category-page
			$this->load->view('admin/layouts/index', $data);
		}

		if ($this->input->post())
		{
<<<<<<< HEAD
=======
<<<<<<< HEAD
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname'  => $this->input->post('lastname'),
				'email'     => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no')
			);

			$update = $this->users->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('profile')));
				log_activity("User Updated Profile [ID:$id]");
=======
>>>>>>> feature/category-page
			$data      = $this->input->post();
			$shop_name = $data['shop_name'];
			unset($data['shop_name']);
			$update = $this->users->update($id, $data);

			$update_shop = $this->vendors->update($id, array('shop_name' => $shop_name));

			if ($update && $update_shop)
			{
				set_alert('success', _l('_updated_successfully', _l('profile')));
<<<<<<< HEAD
=======
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
>>>>>>> feature/category-page
				redirect('admin/profile/edit');
			}
		}
	}

	/**
	 * Updates user's password
	 */
	public function edit_password()
	{
		$id           = get_loggedin_user_id();
		$data['user'] = $this->users->get($id);

		if ($this->input->post())
		{
			$data = array
				(
				'password'             => md5($this->input->post('new_password')),
				'last_password_change' => date('Y-m-d H:i:s')
			);

<<<<<<< HEAD
=======
<<<<<<< HEAD
			$update = $this->users->update($id, $data);

			if ($update)
=======
>>>>>>> feature/category-page
			$update        = $this->users->update($id, $data);
			$update_vendor = $this->vendors->update($id, $data);

			if ($update && $update_vendor)
<<<<<<< HEAD
=======
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
>>>>>>> feature/category-page
			{
				set_alert('success', _l('_updated_successfully', _l('password')));
				redirect('admin/profile/edit');
			}
		}
	}
}
