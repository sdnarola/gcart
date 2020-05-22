<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
	/**
	 * @var boolean
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Gets the users.
	 *
	 * @return     <object>  The users.
	 */
	public function get_users($where = array())
	{
		if (empty($where))
		{
			$array = array('is_admin' => 0, 'is_deleted' => 0);

			$this->db->where($array);
			$data = $this->db->get('users')->result();

			return $data;
		}
		else
		{
			$this->db->where($where);
			$query  = $this->db->get_where('users', array('is_admin' => 0, 'is_deleted' => 0));
			$result = $query->row_array();

			if ($result)
			{
				return $result;
			}
		}
	}

	/**
	 * show the particular user's details
	 *
	 * @param      <int>  $id     The identifier
	 *
	 * @return     <array>  ( The user's details like name,address etc. )
	 */
	public function show($id)
	{
		$this->db->select('users.*,users_addresses.id as users_addresses_id,users_addresses.users_id,users_addresses.house_or_village,users_addresses.street_or_society,users_addresses.landmark,users_addresses.city_id,users_addresses.state_id,users_addresses.pincode');
		$this->db->from('users');
		$this->db->join('users_addresses', 'users.id = users_addresses.users_id');
		$this->db->where('users_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

/***==================================================code by vixuti patel=====================================================***/
	/**
	 * { update particular user's details }
	 *
	 * @param      <array>  $data   The data of user's details
	 * @param      <int>  $id     The identifier
	 *
	 * @return     <bool>  ( shows update sucessfully or not )
	 */
	public function edit($data, $id)
	{
		$result = $this->update($id, $data);

		return $result;
	}

/**
 * [get_state all states details]
 * @return [array] $response [all states details ]
 */
	public function get_states()
	{
		$this->db->select('*');
		$this->db->order_by('name', 'asc');
		$this->db->where(array('is_active' => 1, 'is_deleted' => 0));
		$query    = $this->db->get('states');
		$response = $query->result_array();

		return $response;
	}

	/**
	 * [get_state_name by state id]
	 * @param  [type] $id [state id]
	 * @return [state name]
	 */
	public function get_state_name($id)
	{
		$this->db->select('name');
		$this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'id' => $id));
		$query  = $this->db->get('states');
		$result = $query->result_array();
		if ($result)
		{
			foreach ($result as $state_name)
			{
				echo $state_name['name'];
			}
		}
		else
		{
			return false;
		}
	}

	/**
	 * [get_cities_by_state (by state_id)]
	 * @param  [int] $state_id [state_id]
	 * @return [array]           [array of cities details]
	 */
	public function get_cities_by_state($state_id)
	{
		if ($state_id)
		{
			$this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'state_id' => $state_id));
			$query  = $this->db->get('cities');
			$cities = $query->result_array();

			return $cities;
		}
		else
		{
			return false;
		}
	}

	/**
	 * [get_state_name by city id]
	 * @param  [int] $id [city id]
	 * @return     [city name]
	 */
	public function get_city_name($id)
	{
		$this->db->select('name');
		$this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'id' => $id));
		$query  = $this->db->get('cities');
		$result = $query->result_array();
		if ($result)
		{
			foreach ($result as $city_name)
			{
				echo $city_name['name'];
			}
		}
		else
		{
			return false;
		}
	}

// =========================== Bhavik ==================================//
	/**
	 * Get user's address
	 * @param  int  	$id    		The id of the user.
	 *
	 * @return mixed 	$address 	The Address Information.
	 */
	public function get_user_address($id)
	{
		$this->_table = 'users_addresses';
		$address      = $this->get($id);

		return $address;
	}

// =========================== Bhavik ==================================//

/***==================================================code by vixuti patel=====================================================***/
/**
 * [edit_user_address by users_id]
 * @param  [int] $id  [users_id]
 * @param  [array] $data [description]
 * @return [bool]       [return true or false]
 */
	public function edit_user_address($id, $data)
	{
		$this->db->where('users_id', $id);
		$edit = $this->db->update('users_addresses', $data);
		if ($edit)
		{
			return $edit;
		}
		else
		{
			return false;
		}
	}

/**
 * [insert_user_address data]
 * @param  [array] $data [array of column  and it's value]
 * @return [bool]       [true or false]
 */
	public function insert_user_address($data)
	{
		return $this->db->insert('users_addresses', $data);
	}

	/**
	 * [get_user_addresses by User_id]
	 * @param  [type] $id [user_id]
	 * @return [array] $result  [result array of user_address]
	 */
	public function get_user_addresses($id)
	{
		$this->db->select('*');
		$this->db->where('users_id', $id);
		$query  = $this->db->get('users_addresses');
		$result = $query->result_array();

		return $result;
	}

/***==================================================code end by vixuti patel=====================================================***/
}
