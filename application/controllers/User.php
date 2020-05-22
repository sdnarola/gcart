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
		$data['users_id']       = $this->session->userdata('user_id');
		$order_where['user_id'] = $this->session->userdata('user_id');
		$total_amount           = $this->cart->count_cart_total_amount_for_confirm_order($order_where);

		if ($total_amount == 0)
		{
			redirect(site_url());
		}
		else
		{
			$data['house_or_village']  = $this->input->get('home_no');
			$data['street_or_society'] = $this->input->get('society_name');
			$data['landmark']          = $this->input->get('landmark');
			$data['city_id']           = $this->input->get('city');
			$data['state_id']          = $this->input->get('state');
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
				$this->data['state'] = $this->state->get_many_by(array('country_id' => 105));
				$user_data           = $this->users->show($data['users_id']);

				foreach ($this->data['state'] as $key => $state_data)
				{
					$state_id = $state_data['id'];
				}

				$this->data['city_data'] = $this->city->get_many_by(array('state_id' => $state_id));

				$this->data['users_data'] = $user_data;
				$this->template->load('index', 'content', 'checkout_address', $this->data);
			}
		}
	}

	/**
	 * [get_state_by_city description]
	 *
	 */
	public function get_state_by_city()
	{
		$state_id = $this->input->post('state_id');

		$this->data['city_data'] = $this->city->get_many_by(array('state_id' => $state_id));

		echo json_encode($this->data);
	}

// ============================================ END WORK BY KOMAl =========================================================================================

// /** ===================================code by vixuti patel========================================== */
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

	/** ===================================code end  by vixuti patel========================================== */
}

?>