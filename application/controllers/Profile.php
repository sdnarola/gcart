<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'users');

		if (!is_user_logged_in())
		{
			redirect(site_url('authentication'));
		}
	}

/***==================================================code by vixuti patel=====================================================***/
/**
 * [index to display user details]
 */
	public function index()
	{
		$this->set_page_title(_l('profile'));
		$id = get_loggedin_user_id();

		if ($id)
		{
			$data['user']         = $this->users->get($id);
			$data['user_address'] = $this->users->get_user_addresses($id);
		}

		$this->template->load('index', 'content', 'profile/index', $data);
	}

	/**
	 * Updates user's personal profile details
	 * @return [type] [description]
	 */
	public function edit()
	{
		$this->set_page_title(_l('edit_profile'));
		$id = get_loggedin_user_id();

		if ($id)
		{
			$data['user_address'] = $this->users->get_user_addresses($id);
			$data['user']         = $this->users->get($id);
			$data['states']       = $this->users->get_states();

			$this->template->load('index', 'content', 'profile/edit', $data);
		}

		if ($this->input->post())
		{
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname'  => $this->input->post('lastname'),
				'email'     => $this->input->post('email'),
				'mobile'    => $this->input->post('mobile')

			);

			$data   = array_map('strip_tags', $data);
			$update = $this->users->update($id, $data);

			$data = array(
				'house_or_village'  => $this->input->post('house_or_village'),
				'street_or_society' => $this->input->post('street_or_society'),
				'landmark'          => $this->input->post('landmark'),
				'city_id'           => $this->input->post('city'),
				'state_id'          => $this->input->post('state'),
				'pincode'           => $this->input->post('pincode')

			);

			$user_address = $this->users->edit_user_address($id, $data);

			if ($update == TRUE || $user_address == TRUE)
			{
				set_alert('success', _l('_updated_successfully', _l('profile')));
				log_activity("User Updated Profile [ID:$id]");
				redirect('profile/edit');
			}
		}
	}

	/**
	 * [get_cities by state_id]
	 * @param  [int] $state_id [state_id]
	 * @return [json]           [json data of cities]
	 */
	public function get_cities()
	{
		$state_id = $this->input->post('state_id');

		$cities = $this->users->get_cities_by_state($state_id);
		echo json_encode($cities);
	}

	/**
	 *Updates user's password
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

			$data   = array_map('strip_tags', $data);
			$update = $this->users->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('password')));
				redirect('profile/edit');
			}
		}
	}

/**
 * [uploads file][to upload user profile image]
 */
	public function uploads()
	{
		$id   = get_loggedin_user_id();
		$data = $this->input->post();

		if ($_FILES['profile_image']['name'] != NULL)
		{
			$result = upload_logo('assets/uploads/users/', 'profile_image');

			if (!$result)
			{
				set_alert('warning', _l('_updation_fail_please_try_again', _l('profile')));
				redirect('profile/edit');
			}
			else
			{
				$data['profile_image'] = $result;

				$update = $this->users->update($id, $data);
				if ($update)
				{
					set_alert('success', _l('_updated_successfully', _l('profile')));
					redirect('profile/edit');
				}
			}
		}
	}

/***==================================================code end by vixuti patel=====================================================***/
}
