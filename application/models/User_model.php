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
	public function get_users()
	{
		$array = array('is_admin' => 0, 'is_deleted' => 0);

		$this->db->where($array);
		$data = $this->db->get('users')->result();

		return $data;
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
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_address', 'users.id = users_address.users_id');
		$this->db->where('users_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

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

// =========================== Bhavik ==================================//
	/**
	 * Get user's address
	 * @param  int  	$id    		The id of the user.
	 *
	 * @return mixed 	$address 	The Address Information.
	 */
	public function get_user_address($id)
	{
		$this->_table = 'users_address';
		$address      = $this->get($id);

		return $address;
	}

// =========================== Bhavik ==================================//
// 
/***==================================================code by vixuti patel=====================================================***/

/**
 * [edit user address ]
 * @param  [array] $data [user details]
 * @param  [int] $id   [user id]
 * @return [array]   $query    [user-address data]
 */
	public function edit_user_address($id, $address_1, $address_2, $city, $state, $pincode)
	{
		$result = "UPDATE users_address as a SET a.house_or_village='$address_1',a.street_or_society='$address_2',a.city='$city',a.state='$state',a.pincode='$pincode' WHERE a.users_id=$id";
		$query  = $this->db->query($result);
		
		return $query;	

	}
/**
 * [insert_user_address description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
	public function insert_user_address($data)
	{
		return $this->db->insert('users_address',$data);

	}
/***==================================================code end by vixuti patel=====================================================***/

}
