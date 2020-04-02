<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brand_model extends MY_Model
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
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [get_all_brands description]
	 * @return [type] [description]
	 */
	public function get_all_brands()
	{
		$query = $this->db->get('brands');

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}
}
