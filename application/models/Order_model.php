<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model {
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
	public function __construct() {
		parent::__construct();
	}

	public function user_order_details($id) {
		//$sql = "SELECT orders.* FROM orders INNER JOIN order_items ON orders.id = order_items.order_id wHERE order_items.user_id=$id";

		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('order_items', 'orders.id = order_items.order_id');
		$query = $this->db->get();
		
		return $query->result_array();
	}

}
?>