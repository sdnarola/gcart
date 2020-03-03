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

	/**
	 * get sub categories of parent category
	 * @param  int 		$id 	parent category id
	 * @return array
	 */
	function get_sub_categories($id = '')
	{
		$this->_table = 'sub_categories';

		if ($id == null)
		{
			$result = $this->get_all();

			if ($result)
			{
				return $result;
			}
			else
			{
				return null;
			}
		}

		$result = $this->get_many_by('category_id', $id);

		if ($result)
		{
			return $result;
		}
		else
		{
			return null;
		}
	}

	/**
	 * get sub category of product
	 * @param  int 		$id 	product id
	 * @return array
	 */
	function get_sub_category($id)
	{
		$this->_table = 'sub_categories';
		$result       = $this->get($id);

		if ($result)
		{
			return $result;
		}
		else
		{
			return null;
		}
	}
}
