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
		$this->load->model('vendor_model', 'vendors');
	}

	/**
	 * Updates user's personal profile details.
	 */
	public function edit()
	{
		$this->set_page_title(_l('edit_profile'));
		$id = get_loggedin_user_id();

		if ($id)
		{
			$data['user']      = $this->users->get($id);
			$data['shop_name'] = get_vendor_info($id, 'shop_name');
			$data['content']   = $this->load->view('admin/profile/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}

		if ($this->input->post())
		{
			$data      = $this->input->post();

			if ($_FILES['profile_image']['name'] != NULL)
			{
				$result = upload_logo('assets/uploads/users/', 'profile_image');

				if (!$result)
				{
					$error = array('error' => $this->upload->display_errors());
					set_alert('danger', ucwords($error['error']));
					redirect('admin/profile/edit');
				}

				$data['profile_image'] = $result;
				//for unlink image from folder
				$old_upload_image = $this->users->get($id);

				if (basename($old_upload_image['profile_image']) != 'default_user.png')
				{
					unlink($old_upload_image['profile_image']);
				}
			}

			$shop_name = $data['shop_name'];
			unset($data['shop_name']);
			$update = $this->users->update($id, $data);

			$update_shop = $this->vendors->update($id, array('shop_name' => $shop_name));

			if ($update && $update_shop)
			{
				set_alert('success', _l('_updated_successfully', _l('profile')));
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

			$update        = $this->users->update($id, $data);
			$update_vendor = $this->vendors->update($id, $data);

			if ($update && $update_vendor)
			{
				set_alert('success', _l('_updated_successfully', _l('password')));
				redirect('admin/profile/edit');
			}
		}
	}
}
