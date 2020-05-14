<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_address_model extends MY_Model
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
// ===================================================== WORK BY KOAML ================================================================================================
	/**
	 * [get_user_address description]
	 * @param  [int] $user_id  [user primary key]
	 * @return user address in row array
	 */
	public function get_user_address($user_id)
	{
		$query  = $this->db->get_where('users_addresses', array('users_id' => $user_id));
		$result = $query->row_array();

		if ($result)
		{
			return $result;
		}
	}

	/**
	 * [edit description]
	 * @param  [array] $data 
	 * @param  [int] $id   [primary key]
	 */
	public function edit($data, $id)
	{
		$result = $this->update($id, $data);

		return $result;
	}

// ===================================================== WORK BY KOAML ================================================================================================
}
