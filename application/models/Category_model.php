<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
//=========================================================== WORK BY KOMAL====================================================================//
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
		$this->table = 'sub_categoris;';
	}

	/**
	 * [get_parent_category description]
	 * @return [boolean] Query true return sub catgories or return false
	 */
	public function get_parent_categories($where = array())
	{
		if (!empty($where))
		{
			$this->db->order_by('name', 'asc');
			$this->db->where($where);
			$query  = $this->db->get_where('categories', array('is_deleted' => 0, 'is_active' => 1));
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
		else
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('categories.*,sub_categories.category_id');
			$this->db->from('categories');
			$this->db->join('sub_categories', 'sub_categories.category_id= categories.id', 'left');
			$this->db->where(array('categories.is_deleted' => 0, 'categories.is_active' => 1));
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

		return false;
	}

	/**
	 * [get_sub_category description]
	 * @param  int $id     sub categories primary key
	 *
	 * @return [boolean]   Query is true return sub category or return false
	 */
	public function get_sub_categories($where = array())
	{
		if (!empty($where))
		{
			$this->db->order_by('name', 'asc');
			$this->db->where($where);
			$this->db->where(array('is_deleted' => 0, 'is_active' => 1));
			$query  = $this->db->get('sub_categories');
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
		else
		{
			$this->db->order_by('name', 'asc');
			$query  = $this->db->get_where('sub_categories', array('is_deleted' => 0, 'is_active' => 1));
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
	}

	/**
	 * [get_shop_by_parent_category description]
	 *
	 * @return [boolean] Query true return main catgories this have to sub categories and products or return false
	 */
	public function get_shop_by_parent_category($where = array())
	{
		if (empty($where))
		{
			return array();
		}
		else
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('categories.*');
			$this->db->from('categories');
			$this->db->join('sub_categories', 'sub_categories.category_id=categories.id', 'inner');
			$this->db->join('products', 'products.category_id=categories.id', 'inner');
			$this->db->where($where);
			$this->db->where(array('categories.is_active' => 1, 'categories.is_deleted' => 0, 'products.is_deleted' => 0, 'products.is_active' => 1));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result_array();
			}
		}
	}

	/**
	 * [get_shop_by_sub_category description]
	 * @param  int $category_id    [category id]
	 * @param  int $brand_id       [brand id]
	 * @param  string $tags        [products tags]
	 *
	 * @return [array]
	 */
	public function get_shop_by_sub_category($where = array(), $tags = '')
	{
		if (empty($where))
		{
			return array();
		}
		else
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('sub_categories.*');
			$this->db->from('sub_categories');
			$this->db->join('products', 'products.sub_category_id=sub_categories.id', 'inner');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where(array('sub_categories.is_active' => 1, 'sub_categories.is_deleted' => 0, 'products.is_deleted' => 0, 'products.is_active' => 1));
			$this->db->where($where);
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
	}

	/**
	 * [get_sub_category_by_slug description]
	 * @param  integer $category_id [category id]
	 * @param  string  $slug        [sub category slug]
	 *
	 * @return [array]
	 */
	public function get_sub_category_by_slug($category_id = 0, $slug = '')
	{
		if (empty($slug) || empty($category_id))
		{
			return false;
		}
		else
		{
			$this->db->where('slug', $slug);
			$this->db->where('category_id', $category_id);
			$query  = $this->db->get('sub_categories');
			$result = $query->row_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result;
			}
		}
	}

//=========================================================== END WORK BY KOMAL =======================================================================//

// =========================== Bhavik ==================================//

//

/**
 * get sub categories of parent category
 *
 * @param  int 		$id 	parent category id
 *
 * @return mixed 	sub categories
 */
	public function get_sub_categories_of_parent_category($id = '')
	{
		$this->_table = 'sub_categories';
		$this->order_by('name');
		if ($id == null)
		{
			$result = $this->get_all();

			if (!$result)
			{
				return null;
			}

			return $result;
		}

		$result = $this->get_many_by('category_id', $id);

		if (!$result)
		{
			return null;
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
	function get_sub_category_info($id)
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

/***======================================================code by vixuti patel===========================================================***
/**
 * [get_header_parent_category description]
 * @param  [int] $is_header [if is_header=1 return header category]
 * @return [array]    $result        [category array]
 */
	public function get_header_parent_category($is_header = '')
	{
		if (empty($is_header))
		{
			$query  = $this->db->get_where('categories', array('is_active' => 1, 'is_deleted' => 0));
			$result = $query->result_array();

			if (!empty($result))
			{
				return $result;
			}

			return false;
		}
		else
		{
			$query  = $this->db->get_where('categories', array('is_active' => 1, 'is_deleted' => 0, 'is_header' => $is_header));
			$result = $query->result_array();

			if (!empty($result))
			{
				return $result;
			}

			return false;
		}
	}

	/***======================================================code end  by vixuti patel===========================================================***

		/**
		 * [get_parent_category_products description]
		 * @param  [type] $id [description]
		 * @return [type]     [description]
	*/
	public function get_parent_category_products($id)
	{
		$query = $this->db->get_where('products', array('category_id' => $id));

		if ($query == TRUE)
		{
			return $query->result_array();
		}

		return false;
	}

	/**
	 * [get_sub_category_products description]
	 * @param  [int] $id  Sub categories Primary Key
	 *
	 * @return [boolean]    Query true return sub catgory wise products or return false
	 */
	public function get_sub_category_products($id)
	{
		$query = $this->db->get_where('products', array('sub_category_id' => $id));

		if ($query == TRUE)
		{
			return $query->result_array();
		}

		return false;
	}
}
