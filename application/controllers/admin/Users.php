<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'users');
		$this->load->model('order_model', 'orders');
	}

	/**
	 * Loads the list of users.
	 */
	public function index()
	{
		$this->set_page_title(_l('users'));

		$data['users']   = $this->users->get_users();
		$data['content'] = $this->load->view('admin/users/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Updates the user record
	 *
	 * @param int  $id  The user id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('users').' | '._l('edit'));

		if ($this->input->post())
		{
			$data = array
				(
				'firstname' => $this->input->post('firstname'),
				'lastname'  => $this->input->post('lastname'),
				'email'     => $this->input->post('email'),
				'mobile'    => $this->input->post('mobile'),
				'is_active' => ($this->input->post('is_active')) ? 1 : 0
			);

			$address_data = array(
				'house_or_village' => $this->input->post('house_village'),
				'street_or_society' => $this->input->post('street_society'),
				'pincode' => $this->input->post('pincode'),
				'landmark' => $this->input->post('landmark'),
				'city_id' => $this->input->post('city'),
				'state_id' => $this->input->post('state'),
				'users_id' => $id
			);
		
			$edit = $this->users->edit($data,$id);
			$edit_address = $this->users->edit_user_address($id,$address_data);

			if ($edit && $edit_address) 
			{
				set_alert('success', _l('_updated_successfully', _l('user')));
				redirect('admin/users');
			}
		}
		else
		{
        	$data['user']    = get_user_info($id);
        	$data['address'] = get_user_address($data['user']['id']);
			$data['states'] = $this->users->get_states();
			$data['content'] = $this->load->view('admin/users/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Deletes the single user record
	 */
	public function delete()
	{
		$user_id = $this->input->post('user_id');

		$user      = $this->users->get($user_id);
		$imagepath = $user['profile_image'];
		$newpath   = 'assets/uploads/users/deleted/'.basename($imagepath);

		if (basename($imagepath) != 'default_img.png')
		{
			$copied = copy($imagepath, $newpath);
			unlink($imagepath);
		}

		$deleted = $this->users->delete($user_id);

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
	 * contains details of user
	 *
	 * @param      <int>  $id     The user id
	 */
	public function details($id)
	{
		$this->set_page_title(_l('users').' | '._l('details'));

        $data['user']    = get_user_info($id);
        $data['address'] = get_user_address($id);
		$data['records'] = $this->order_details($id);
		$data['content'] = $this->load->view('admin/users/details', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Deletes multiple user records
	 */
	public function delete_selected()
	{
		$where = $this->input->post('ids');

		$data = $this->users->get_many($where);

		foreach ($data as $record)
		{
			$imagepath = $record['profile_image'];
			$newpath   = 'assets/uploads/users/deleted/'.basename($imagepath);

			if (basename($imagepath) != 'default_img.png')
			{
				$copied = copy($imagepath, $newpath);
				unlink($imagepath);
			}
		}

		$deleted = $this->users->delete_many($where);

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
	 * Toggles the user status to Active or Inactive
	 */
	public function update_status()
	{
		$user_id = $this->input->post('user_id');
		$data    = array('is_active' => $this->input->post('is_active'));
		$update  = $this->users->update($user_id, $data);

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
	 * return orders of particular user
	 *
	 * @param      <int>  $id     The user_id
	 *
	 * @return     <array>  ( orders of particular user )
	 */
	public function order_details($user_id)
	{
		$this->orders->order_by('order_number', 'ASC');
		$order_records = $this->orders->get_many_by('user_id', $user_id);

		return $order_records;
	}

	public function get_cities_by_state_id($id)
	{
		$data = $this->users->get_cities_by_state($id);
		echo json_encode($data);
	}

}
