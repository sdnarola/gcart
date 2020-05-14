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

	// ===================================================== WORK BY KOMAL ====================================================================================

	/**
	 * [get_whislist_products description]
	 * @param  [type] $product_id [products id in array]
	 * @return whishlist products data
	 */
	public function get_whislist_products($product_id)
	{
		$this->db->where_in('id', $product_id);
		$query  = $this->db->get('products');
		$result = $query->result_array();

		if (empty($result))
		{
			return 0;
		}
		else
		{
			return $result;
		}
	}
	// ===================================================== WORK BY KOMAL ====================================================================================
}
