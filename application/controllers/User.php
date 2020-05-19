<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [index description]
	 * user information
	 */
	public function index()
	{
		$data['users_id']          = $this->session->userdata('user_id');
		$data['house_or_village']  = $this->input->get('home_no');
		$data['street_or_society'] = $this->input->get('society_name');
		$data['city']              = $this->input->get('city');
		$data['state']             = $this->input->get('state');
		$data['pincode']           = $this->input->get('pincode');

		$user_address = $this->users->show($data['users_id']);

		$user_address_id = $user_address['users_addresses_id'];

		if (!empty($data['house_or_village']))
		{
			$update = $this->users_address->edit($data, $user_address_id);

			if ($update)
			{
				set_alert('success', _l('_updated_address_successfully'));
				redirect(site_url('user'));
			}
		}

		$user_address_data = $this->users->show($data['users_id']);

		if (empty($user_address_data))
		{
			$this->template->load('index', 'content', 'profile/edit', $this->data);
		}
		else
		{
			$this->data['users_data'] = $this->users->show($data['users_id']);
			$this->template->load('index', 'content', 'checkout_address', $this->data);
		}
	}

	// ============================================ END WORK BY KOMAl =========================================================================================
}

?>