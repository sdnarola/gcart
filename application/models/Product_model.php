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
	 * Add new Product image
	 * @param  string $image path and image name
	 * @return int       	id of product image
	 */
	public function product_images($image)
	{
		$this->_table = 'product_images';
		$result       = $this->insert($image);

		if ($result)
		{
			return $result;
		}

		return false;
	}

	/**
	 * Delete the single product record
	 * soft delete false
	 */
	public function delete_product($id)
	{
		$this->soft_delete = false;
		$this->_table      = 'products';
		$result            = $this->delete($id);

		if (!$result)
		{
			return false;
		}

		return true;
	}

	/**
	 * Delete the product image
	 * soft delete false
	 */
	public function delete_product_images($id)
	{
		$this->soft_delete = false;
		$this->_table      = 'product_images';
		$result            = $this->delete($id);

		if (!$result)
		{
			return false;
		}

		return true;
	}

	public function get_images($id)
	{
		$this->_table = 'product_images';
		$result       = $this->get_by('product_id', $id);

		return $result;
	}

	public function get_products($id)
	{
		$this->db->select('products.*,categories.name AS category_name,categories.is_active AS category_status');
		$this->db->from('products');
		$this->db->join('categories', 'products.category_id = categories.id');
		$this->db->where('vendor_id',$id);
		$query = $this->db->get();
		
		return $query->result_array();
	}
}
