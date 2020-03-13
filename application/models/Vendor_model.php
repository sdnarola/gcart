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
	 * Gets vendor's ids and their total products
	 *
	 * @param  string  	$product_ids 	ids of the porducts.
	 *
	 * @return mixed 	$data 			vendor ids,product ids.
	 */
	public function vendor_total_products($product_ids)
	{
		$this->db->select('products.vendor_id,count(products.id)');
		$this->db->from('products');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where_in('products.id', $product_ids);
		$this->db->group_by('products.vendor_id');
		$idsss = $this->db->get()->result_array();

		$data['vendor_ids'] = array_map(function ($id)
		{
			return $id['vendor_id'];
		}, $idsss);
		$data['products'] = array_map(function ($id)
		{
			return $id['count(products.id)'];
		}, $idsss);

		return $data;
	}

	/**
	 * Update total products of vendors.
	 *
	 * @param  int  	$id          	id of the vendor.
	 * @param  string 	$update      	update column with increment/decrement values.
	 * @param  string 	$product_ids 	ids of the porducts.
	 *
	 * @return bool 	$result 		boolean true if updated, false otherwise.
	 */
	public function update_total_product($id, $update, $product_ids = '')
	{
		if ($product_ids)
		{
			$data  = $this->vendor_total_products($product_ids);
			$count = count($data['vendor_ids']);
		}
		else
		{
			$this->db->set('total_products', $update, FALSE);
			$this->db->where('id', $id);
			$result = $this->db->update('vendors');
		}

		return $result;
	}

// =========================== Bhavik ==================================//
}
