<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
//=========================================================== KOMAL WORK ================================================================================================//
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
	public function get_parent_categories($where=array())
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
	public function get_sub_categories($where=array())
	{
		if (!empty($where))
		{
			$this->db->order_by('name', 'asc');
			$this->db->where($where);
			$this->db->where(array('is_deleted' => 0));
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
			$query  = $this->db->get_where('sub_categories', array('is_deleted' => 0));
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
	 * [get_shop_by_sub_category description]
	 * @param  int $category_id    [category id]
	 * @param  int $brand_id       [brand id]
	 * @param  string $tags        [products tags]
	 * 
	 * @return [array]             
	 */
	public function get_shop_by_sub_category($category_id = '', $brand_id = '', $tags = '')
	{
		if (!empty($category_id) && !empty($tags))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('sub_categories.*');
			$this->db->from('sub_categories');
			$this->db->join('products', 'products.sub_category_id=sub_categories.id', 'inner');
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where(array('sub_categories.is_active' => 1, 'sub_categories.is_deleted' => 0, 'sub_categories.category_id' => $category_id, 'products.is_deleted' => 0, 'products.is_active' => 1));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id) && !empty($brand_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('sub_categories.*');
			$this->db->from('sub_categories');
			$this->db->join('products', 'products.sub_category_id=sub_categories.id', 'inner');
			$this->db->where(array('sub_categories.is_active' => 1, 'sub_categories.is_deleted' => 0, 'sub_categories.category_id' => $category_id, 'products.is_deleted' => 0, 'products.is_active' => 1, 'products.brand_id' => $brand_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('sub_categories.*');
			$this->db->from('sub_categories');
			$this->db->join('products', 'products.sub_category_id=sub_categories.id', 'inner');
			$this->db->where(array('sub_categories.is_active' => 1, 'sub_categories.is_deleted' => 0, 'sub_categories.category_id' => $category_id, 'products.is_deleted' => 0, 'products.is_active' => 1));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}

		return false;
	}

// =========================== Bhavik ==================================//


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
		 * [get_parent_category description]k
		 * @return [boolean] Query true return sub catgories or return false
	*/
public function get_header_parent_category($is_header = '')
{
	if (empty($is_header))
	{
		$query = $this->db->get_where('categories', array('is_active' => 1));
		$result=$query->result_array();

		if (!empty($result))
		{
			return $result;
		}

		return false;
	}
	else
	{
		$query = $this->db->get_where('categories', array('is_active' => 1, 'is_header' => $is_header));
		$result=$query->result_array();
		if (!empty($result))
		{
			return $result;
		}

		return false;
	}
}


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

	// public function get_data_to_cart_products($product_id)
	// {
	// 	$query = $this->db->get_where('products', array('id' => $products_id));

	// 	if ($query == TRUE)
	// 	{
	// 		return $query->result();
	// 	}
	// }
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

	/**

	 * [get_category_by_slug description]
	 * @param  string $slug [category slug]
	 *
	 * @return [array]
	 */
	public function get_category_by_banner($slug = '')
	{
		if (empty($slug))
		{
			return false;
		}
		else
		{
			$this->db->select('categories.*,banners.title,banners.sub_title,banners.description,banners.banner');
			$this->db->from('categories');
			$this->db->join('banners', 'banners.id=categories.banner_id');
			$this->db->where('categories.slug', $slug);
			$query  = $this->db->get();
			$result = $query->row_array();

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

	
	//=========================================================== END KOMAL WORK ===========================================================================================//


     /**
	 * [search category or product or brand]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function search($category_id, $name = '')
	{
		$this->db->select('c.name as category,p.name as product ,p.tags ,s.name as subcategory,c.id as c_id,p.id as p_id,s.id as s_id', TRUE);
		$this->db->from('categories as c');
		$this->db->join('sub_categories as s', ' s.category_id=c.id');
		$this->db->join('products as p', ' c.id=p.category_id');
		$this->db->join('brands as b', ' p.brand_id=b.id ');

		if ($category_id == '*' && empty($name))
		{
			$this->db->where(array('c.is_header' => 1));
		}
		elseif (!empty($name))
		{
			if ($category_id == '*' || isset($name))
			{
				$this->db->where(array('c.is_header' => 1));
				$this->db->where(array('c.is_header' => 1, 'c.id' => $category_id));
			}
			else
			{
			}

			$this->db->like('s.name', $name, 'match');
			$this->db->or_like('p.name', $name, 'match');
			$this->db->or_like('p.tags', $name, 'match');
		}
		else
		{
			$this->db->where(array('c.is_header' => 1, 'c.id' => $category_id));
		}

		$query = $this->db->get();

		return $query->result_array();
	}
		/***==================================================code end by vixuti patel=====================================================***/

}




