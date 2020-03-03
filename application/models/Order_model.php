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
		$sql = "SELECT orders.* FROM orders INNER JOIN order_items ON orders.id = order_items.order_id wHERE order_items.user_id=$id";
		$query = $this->db->query($sql);
		//	print_r($data);
		return $query->result_array();
	}

}
?>