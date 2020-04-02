<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
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
	 * 	===================================================vixuti patel's code================================================================
	 * [get_hot_deals products]
	 * @return [type] [description]
	 */
	public function get_hot_deals()
	{
		$this->db->select('p.id,p.name,p.thumb_image,p.old_price, p.new_price,h.from_date_time as start ,h.to_date_time as end', TRUE);
		$this->db->from('products as p');
		$this->db->join('hot_deals as h', 'p.id=h.product_id');
		$this->db->where(array('p.is_hot' => 1, 'p.is_active' => 1));

		$query = $this->db->get();

		return $query->result_array();
	}

/**
 * [get_all_reviews description]
 * @return [type] [description]
 */
	public function get_all_reviews()
	{
		$this->db->select('*', TRUE);
		$this->db->from('reviews as r');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * [get_new_products description]
	 * @return [type] [description]
	 */
	public function get_new_products($id = '')
	{
		if (empty($id))
		{

			$this->db->order_by('created_at', 'des');

			$query = $this->db->get_where('products', array('is_active' => 1));

			if ($query)
			{
				return $query->result_array();
			}

			return false;
		}
		else
		{
			$this->db->order_by('created_at', 'des');
			$query = $this->db->get_where('products', array('is_active' => 1, 'category_id' => $id));

			if ($query)
			{
				return $query->result_array();
			}

			return false;
		}
	}

	/**
	 * [get_special_offers description]
	 * @return [type] [description]
	 */
	public function get_special_offers()
	{
		$this->db->order_by('created_at', 'des');

		$query = $this->db->get_where('products', array('is_active' => 1, 'is_sale' => 1));

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}

	/**
	 * [get_special_offers description]
	 * @return [type] [description]
	 */
	public function get_special_deal()
	{
		$this->db->order_by('created_at', 'des');
		$this->db->select('p.*, (p.old_price - p.new_price ) / p.new_price * 100 AS discount', TRUE);
		$this->db->from('products as p');
		$query = $this->db->get();

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}

/**
 * [get_best_sellers description]
 * @return [type] [description]
 */
	public function get_best_sellers()
	{
		$this->db->select('p.*,SUM(i.quantity) AS total_quantity', TRUE);
		$this->db->from('products as p');
		$this->db->join('order_items as i', 'i.product_id=p.id');
		$this->db->join('orders as o', 'i.order_id=o.id');

		$this->db->where('o.payment_status', 1);
		$this->db->group_by('p.id');

		$this->db->order_by('total_quantity ', 'desc');
		$this->db->limit(15);
		$query = $this->db->get();

		return $query->result_array();
	}
/**
 * [get_featured_products description]
 * @return [type] [description]
 */
	public function get_featured_products()
	{
		$this->db->distinct();
		$this->db->select('p.*');
		$this->db->from('products as p');
		$this->db->where(array('is_active' => 1, 'short_description !=' => ''));
		//$this->db->where('long_description !=', '');
		$query = $this->db->get();

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}
/**
 * [get_tags description]
 * @return [type] [description]
 */
	public function get_tags()
	{
		$this->db->distinct();
		$this->db->order_by('tags', 'asc');
		$this->db->select('id,tags');
		$this->db->limit(6); 
		$result = $this->db->get('products')->result_array();

		return $result;

	}

	//======================================================code end by vixuti patel========================================================//
}
