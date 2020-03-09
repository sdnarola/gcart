<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
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
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Gets the users.
	 *
	 * @return     <object>  The users.
	 */
	public function get_users() {
		$array = array('role_id' => 0, 'is_deleted' => 0);

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
	public function show($id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_address', 'users.id = users_address.users_id');
		$this->db->where('users_id',$id);
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
	public function edit($data, $id) {
		$result = $this->update($id, $data);
		return $result;
	}
}
