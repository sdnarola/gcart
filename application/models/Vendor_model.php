<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model extends MY_Model
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

// =========================== Bhavik ==================================//

	/**
	 * Update vendor wise total products.
	 *
	 * @param  string  	$product_ids 	ids of the product.
	 *
	 * @return bool 	$result 		boolean true if updated, false otherwise.
	 */
	public function update_vendors_total_products($product_ids)
	{
		$this->db->select('products.vendor_id,count(products.id) AS total_products');
		$this->db->from('products');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where_in('products.id', $product_ids);
		$this->db->group_by('products.vendor_id');
		$data = $this->db->get()->result_array();

		foreach ($data as $vendor)
		{
			$this->db->set('total_products', 'total_products - '.$vendor['total_products'], FALSE);
			$this->db->where('id', $vendor['vendor_id']);
			$result = $this->db->update('vendors');
		}

		return $result;
	}

	/**
	 * Update total products of vendor.
	 *
	 * @param  int  	$id          	id of the vendor.
	 * @param  string 	$update      	update column with increment/decrement values.
	 *
	 * @return bool 	$result 		boolean true if updated, false otherwise.
	 */
	public function update_total_product($id, $update)
	{
		$this->db->set('total_products', $update, FALSE);
		$this->db->where('id', $id);
		$result = $this->db->update('vendors');

		return $result;
	}

// =========================== Bhavik ==================================//
}
