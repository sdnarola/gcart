<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends MY_Model
{
	/**
	 * @var mixed
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * @var string
	 */
	protected $_table = 'wishlist';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [get_wishlist_data description]
	 * @return [boolean] query is true return wish List data in array
	 */
	public function get_wishlist_data($where = array())
	{
		if (!empty($where))
		{
			
			$this->db->where($where);
			$query  = $this->db->get_where('wishlist', array('is_deleted' => 0));
			$result = $query->result_array();

			if ($result)
			{
				return $result;
			}
		}
		else
		{
			
			$query  = $this->db->get_where('wishlist', array('is_deleted' => 0));
			$result = $query->result_array();

			if ($result)
			{
				return $result;
			}
		}
	}
}
