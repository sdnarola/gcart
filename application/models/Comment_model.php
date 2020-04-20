<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends MY_Model
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
	 * Gets product's comments of Vendor.
	 *
	 * @param  int 		$id 		Id of the vendor.
	 *
	 * @return mixed 	$result 	Comments information.
	 */
	public function get_product_comments($id)
	{
		$this->db->select('comments.*');
		$this->db->from('comments');
		$this->db->join('products', 'products.id = comments.product_id');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where('products.vendor_id', $id);
		$this->db->where('comments.is_deleted', 0);
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function get_products_by_comment($products_id)
	{
		$query  = $this->db->get_where('comments', array('is_deleted' => 0, 'product_id' => $products_id));
		$result = $query->result_array();

		if (empty($result))
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
}
