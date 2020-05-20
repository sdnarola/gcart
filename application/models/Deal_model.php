<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deal_model extends MY_Model
{
	/**
	 * @var mixed
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * @var string
	 */
	protected $_table = 'hot_deals';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAL ===============================================================================

	/**
	 * [get_hot_deals_products description]
	 * @return return Hote Deals products data
	 */
	public function get_hot_deals_products()
	{
		$this->db->select('products.*,hot_deals.id as hot_id,hot_deals.start_date,hot_deals.end_date,hot_deals.product_id,hot_deals.type,hot_deals.value');
		$this->db->from('products');
		$this->db->join('hot_deals', 'products.id=hot_deals.product_id and products.quantity > 0', 'inner');
		$this->db->where(array('products.is_deleted' => 0, 'products.is_active' => 1, 'hot_deals.is_deleted' => 0, 'hot_deals.end_date >' => date('Y-m-d h:i:s'), 'hot_deals.start_date <' => date('Y-m-d h:i:s')));
		$query  = $this->db->get();
		$result = $query->result_array();

		if (empty($result))
		{
			return false;
		}
		else
		{
			return $result;
		}
	}

	// ============================================ END WORK BY KOMAL ===============================================================================
}
