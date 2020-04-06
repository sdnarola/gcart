<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends MY_Model
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
		//$CI = &get_instance();
	}
	/***==================================================code by vixuti patel=====================================================***/
	/**
	 * [get_all_brands description]
	 * @return [type] [description]
	 */
	public function get_slider()
	{
		$query = $this->db->get('slider_settings');

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}
	public function get_home_banners()
	{
		$_table="banner";
		$query = $this->db->get('banners');

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}
	/***==================================================code end by vixuti patel=====================================================***/

}
