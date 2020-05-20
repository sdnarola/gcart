<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends MY_Model
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

// =========================================================== WORK BY KOMAL ========================================================================================
	/**
	 * [get_brands description]
	 * 
	 * @param  array  $where         			  array value
	 * @param  string $multiple_sub_category_id   multiple sub category id
	 * @param  string $tags                       products Tags
	 *
	 * @return [array]
	 */
	public function get_products_brands($where = array(), $tags = '', $multiple_sub_category_id = '',$search_id = '')
	{
		if (empty($where) && !empty($search_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id = brands.id', 'inner');
			$this->db->where_in('products.id',$search_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where_in('products.sub_category_id', $multiple_sub_category_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0));
			$this->db->where($where);
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		else
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0));
			$this->db->where($where);
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
	}

	// =========================================================== WORK BY KOMAL ========================================================================================
}
