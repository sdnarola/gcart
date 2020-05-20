<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends MY_Model
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
	 * Gets product's reviews of Vendor.
	 *
	 * @param  int 		$id 		Id of the vendor.
	 *
	 * @return mixed 	$result 	Reviews information.
	 */
	public function get_product_reviews($id)
	{
		$this->db->select('reviews.*');
		$this->db->from('reviews');
		$this->db->join('products', 'products.id = reviews.product_id');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where('products.vendor_id', $id);
		$this->db->where('reviews.is_deleted', 0);
		$result = $this->db->get()->result_array();

		return $result;
	}

// ================================================ WORK BY KOMAL ================================================================================
	/**
	 * [get_products_by_review description]
	 * @param  [int] $products_id [products id]
	 * @return [array]             products review
	 */
	public function get_products_by_review($where = array(), $limit = 1, $start = 0)
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
			$query  = $this->db->get_where('reviews', array('is_deleted' => 0));
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
	 * [count_products_review description]
	 * @param  [int] $product_id  reviews products table forgein key
	 *
	 * @return boolean            query is true return review data in row array
	 */
	public function count_products_review($product_id)
	{
		$query = $this->db->get_where('reviews', array('product_id' => $product_id, 'is_deleted' => 0));

		if ($query == TRUE)
		{
			return $query->num_rows();
		}

		return false;
	}

	/**
	 * [get_products_star_rating description]
	 * @param  [int] $product_id  reviews products table forgein key
	 * @return boolean            query is true return star data in row array
	 */
	public function get_products_star_rating($product_id)
	{
		$this->db->select('AVG(star_ratings) AS star');
		$this->db->where('product_id', $product_id);
		$query  = $this->db->get_where('reviews', array('is_deleted' => 0));
		$result = $query->row_array();

		if (empty($result))
		{
			return 0;
		}
		else
		{
			return $result['star'];
		}
	}

	// ================================================ WORK BY KOMAL ================================================================================
}
