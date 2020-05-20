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

// ===================================================== WORK BY KOMAL =====================================================================================
	/**
	 * [get_products_by_comment description]
	 * @param  array   $where [where conf=dition]
	 * @param  integer $limit [limted to display data]
	 * @param  integer $start [start with data]
	 * @return products comments
	 */
	public function get_products_by_comment($where = array(), $limit = 1, $start = 0)
	{
		if (empty($where))
		{
			return array();
		}
		else
		{
			$this->db->where($where);
			$this->db->limit($limit, $start);
			$this->db->order_by('add_date', 'desc');
			$query  = $this->db->get_where('comments', array('is_deleted' => 0));
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

	/**
	 * [count_products_comments description]
	 * @param  [int] $product_id  reviews products table forgein key
	 * @return boolean            query is true return comments data in row array
	 */
	public function count_products_comments($product_id)
	{
		$query = $this->db->get_where('comments', array('product_id' => $product_id, 'is_deleted' => 0));

		if ($query == TRUE)
		{
			return $query->num_rows();
		}

		return false;
	}

	// ===================================================== END WORK BY KOMAL ===================================================================
}
