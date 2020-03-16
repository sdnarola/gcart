<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
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
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

// =========================== Bhavik ==================================//

	/**
	 * get sub categories of parent category
	 *
	 * @param  int 		$id 	parent category id
	 *
	 * @return mixed 	sub categories
	 */
	function get_sub_categories($id = '')
	{
		$this->_table = 'sub_categories';

		if ($id == null)
		{
			$result = $this->get_all();

			if (!$result)
			{
				return false;
			}

			return $result;
		}

		$result = $this->get_many_by('category_id', $id);

		if (!$result)
		{
			return false;
		}

		return $result;
	}

	/**
	 * get sub category of product
	 *
	 * @param  int 		$id 	product id
	 *
	 * @return mixed 	sub category
	 */
	function get_sub_category($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->get('sub_categories')->row_array();

		if (!$result)
		{
			return false;
		}

		return $result;
	}

// =========================== Bhavik ==================================//
}
