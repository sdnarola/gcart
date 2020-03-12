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

	public function user_order_details($id)
	{
		//$sql = "SELECT orders.* FROM orders INNER JOIN order_items ON orders.id = order_items.order_id wHERE order_items.user_id=$id";

		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_items', 'orders.id = order_items.order_id');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get ordered product items.
	 *
	 * @param  int 		$id 		Id of the order.
	 * @param  int 		$vendor_id 	Id of the vendor.
	 *
	 * @return mixed 	$items 	ordered product's information.
	 */
	public function get_items($id, $vendor_id = '')
	{
		$this->db->select('order_items.quantity AS item_quantity, order_items.*,products.id AS pro_id,products.*');
		$this->db->from('order_items');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->where('order_items.order_id', $id);

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

// =========================== Bhavik ==================================//
	/**
	 * Get the orders of vendors/admins.
	 *
	 * @param  int 		$id 		id of vendor/admin.
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

	/**
	 * Update vendor status of ordered items.
	 *
	 * @param  int 		$id 		the order id.
	 * @param  mixed 	$data.
	 *
	 * @return bool True if status is update. False otherwise.
	 */
	public function update_status($id, $data)
	{
		//to get order and vendor wise products.
		$this->db->select('order_items.product_id');
		$this->db->from('order_items');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->where('products.vendor_id', $data['vendor_id']);
		$this->db->where('order_items.order_id', $id);
		$products = $this->db->get()->result_array();
		$ids      = implode(',', array_map(function ($id)
		{
			return $id['product_id'];
		}, $products));

		// update vendor status for ordered products.
		$query  = 'UPDATE order_items SET vendor_status='.$data['vendor_status'].' WHERE order_id='.$id.' AND product_id IN('.$ids.')';
		$result = $this->db->query($query);

		return $result;
	}

// =========================== Bhavik ==================================//
}

?>