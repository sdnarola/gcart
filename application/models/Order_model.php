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

	/**
	 * Gets total orders of vendor
	 *
	 * @param  int 		$id 			Id of the vendor.
	 * @return int 		$total_orders	Total orders.
	 */
	public function total_orders($id)
	{
		$this->db->select('DISTINCT(orders.id)');
		$this->db->from('orders');
		$this->db->join('order_items', 'order_items.order_id = orders.id');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where('vendors.id', $id);
		$total_orders = $this->db->get()->num_rows();

		return $total_orders;
	}

	/**
	 * Gets total earnings of the vendor.
	 *
	 * @param  int 		$id 				Id of the vendor.
	 * @return mixed 	$total_earnings		Total amount of the orders.
	 */
	public function total_earnings($id)
	{
		$this->db->select_sum('order_items.total_amount');
		$this->db->from('orders');
		$this->db->join('order_items', 'orders.id = order_items.order_id');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where('vendors.id', $id);
		$total_earning = $this->db->get()->row_array();

		return $total_earning;
	}

	/**
	 * Gets total items sold of the vendor.
	 *
	 * @param  int 	$id 			Id of the vendor.
	 * @return int 	$items_sold		Total amount of the orders.
	 */
	public function items_sold($id)
	{
		$this->db->select_sum('order_items.quantity');
		$this->db->from('orders');
		$this->db->join('order_items', 'orders.id = order_items.order_id');
		$this->db->join('products', 'products.id = order_items.product_id');
		$this->db->join('vendors', 'vendors.id = products.vendor_id');
		$this->db->where('vendors.id', $id);
		$items_sold = $this->db->get()->row_array();

		return $items_sold;
	}

	/**
	 * Gets the last 30 days orders per day.
	 *
	 * @return mixed 	Date wise total orders.
	 */
	public function last_30_days_sale()
	{
		$this->db->select('order_date, count(*) AS sale');
		$this->db->where('order_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');
		$this->db->group_by('order_date');

		return $this->db->get('orders')->result_array();
	}
}

?>