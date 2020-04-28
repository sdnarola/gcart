<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model
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
	 * Get ordered product items.
	 *
	 * @param  int 		$id 		Id of the order.
	 * @param  int 		$vendor_id 	Id of the vendor.
	 *
	 * @return mixed 	$items 	ordered product's information.
	 */
	public function get_items($id='', $vendor_id = '',$order_id='')
	{
		$this->db->select('order_items.quantity AS item_quantity, order_items.*,products.id AS pro_id,products.*');
		$this->db->from('order_items');
		$this->db->join('products', 'products.id = order_items.product_id');
		if(!empty($id))
		{
		$this->db->where('order_items.order_id', $id);
		}
		if(!empty($order_id))
		{
				$this->db->where_in('order_items.order_id', $order_id);
	
		}
		if ($vendor_id)
		{
			$this->db->where('products.vendor_id', $vendor_id);
		}

		$items = $this->db->get()->result_array();

		if (!$items)
		{
			return false;
		}

		return $items;
	}

	/**
	 * Get the orders of vendors/admins.
	 *
	 * @param  int 		$vendor_id 	Id of vendor/admin.
	 * @param  int 		$id 		Id of order.
	 *
	 * @return mixed 	$orders 	order information.
	 */
	public function get_orders($vendor_id, $id = '')
	{
		$this->db->select('orders.invoice_number,orders.user_id,orders.order_date,orders.payment_status,orders.payment_method,orders.order_number, SUM(order_items.quantity),SUM(order_items.total_amount), order_items.*');
		$this->db->from('orders');
		$this->db->join('order_items', 'orders.id = order_items.order_id');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->where('products.vendor_id', $vendor_id);

		if ($id)
		{
			$this->db->where('order_items.order_id', $id);
			$orders = $this->db->get()->row_array();
		}
		else
		{
			$this->db->group_by('order_items.order_id');
			$orders = $this->db->get()->result_array();
		}

		if (!$orders)
		{
			return false;
		}

		return $orders;
	}

		
}

?>