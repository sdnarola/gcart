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
	public function get_sub_category_info($id)
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
	 * [get_brands description]
	 * @param  int $category_id    	              products categories forgeign Key
	 * @param  int  $sub_category_id              products sub categories foreign key
	 * @param  string $multiple_sub_category_id   multiple sub category id
	 * @param  string $tags                       products Tags
	 * 
	 * @return [array]                          
	 */
	public function get_brands($category_id = '', $sub_category_id = '', $multiple_sub_category_id = '', $tags = '',$search_id = '')
	{
		// echo $search_id;
		if(!empty($search_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id = brands.id', 'inner');
			$this->db->where_in('products.id',$search_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id) && !empty($multiple_sub_category_id) && !empty($tags))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where_in('products.sub_category_id', $multiple_sub_category_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.category_id' => $category_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id) && !empty($tags))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.category_id' => $category_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($sub_category_id) && !empty($tags))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->like('products.tags', $tags, 'both');
			$this->db->where_in('products.sub_category_id', $multiple_sub_category_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.sub_category_id' => $sub_category_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id) && !empty($multiple_sub_category_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->where_in('products.sub_category_id', $multiple_sub_category_id);
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.category_id' => $category_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		elseif (!empty($category_id) && !empty($sub_category_id))
		{
			$this->db->distinct();
			$this->db->order_by('name', 'asc');
			$this->db->select('brands.*,products.sub_category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.sub_category_id' => $sub_category_id, 'products.category_id' => $category_id));
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
			$this->db->select('brands.*,products.category_id');
			$this->db->from('brands');
			$this->db->join('products', 'products.brand_id= brands.id', 'inner');
			$this->db->where(array('products.is_active' => 1, 'products.is_deleted' => 0, 'brands.is_deleted' => 0, 'products.category_id' => $category_id));
			$query = $this->db->get();

			if ($query == TRUE)
			{
				return $query->result();
			}
		}
		

		return false;
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
<<<<<<< HEAD
	 * [get_products_tags description]
	 * @param  array  $where                    [where cluse value in array]
	 * @param  string $multiple_sub_category_id [multiple sub category id]
	 *
	 * @return [array]                           [products tags data]
	 */
	public function get_products_tags($where = array(), $multiple_sub_category_id = '',$product_id='')
	{
		if(!empty($product_id))
		{
			$this->db->distinct();
			$this->db->order_by('tags', 'asc');
			$this->db->select('tags');
			$this->db->where_in('products.id', $product_id);
			$this->db->where(array('is_deleted' => 0, 'is_active' => 1));
			$query = $this->db->get('products')->result_array();

			if ($query)
			{
				return $query;
			}
		}
		if (empty($where))
		{
			return array();
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->distinct();
			$this->db->order_by('tags', 'asc');
			$this->db->select('tags');
			$this->db->where_in('sub_category_id', $multiple_sub_category_id);
			$this->db->where($where);
			$this->db->where(array('is_deleted' => 0, 'is_active' => 1));
			$query = $this->db->get('products')->result_array();

			if ($query)
			{
				return $query;
			}
		}
		
		else
		{
			$this->db->distinct();
			$this->db->order_by('tags', 'asc');
			$this->db->select('tags');			
			$this->db->where($where);
			$this->db->where(array('is_deleted' => 0, 'is_active' => 1));
			$query = $this->db->get('products')->result_array();

			if ($query)
			{
				return $query;
			}
		}
	}


	public function get_data_to_cart_products($product_id)
	{
		$query = $this->db->get_where('products', array('id' => $products_id));

		if ($query == TRUE)
		{
			return $query->result();
		}
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

	/**

	 * [get_category_by_slug description]
	 * @param  string $slug [category slug]
	 *
	 * @return [array]
<<<<<<< HEAD
=======
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
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
	 */
	public function get_category_by_slug($slug = '')
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
	 * [get_all_products description]
	 * @param  array   $where                    [where cluse value in array]
	 * @param  integer $page                     [page number]
	 * @param  integer $limit                    [limit]
	 * @param  string  $sort                     [sorted value]
	 * @param  string  $order                    [ordered value]
	 * @param  string  $tags                     [products tags]
	 * @param  string  $multiple_sub_category_id [multiple sub category id]
	 * @return [array]                            [description]
	 */
	public function get_all_products($where = array(), $page = 1, $limit = 4, $sort = 'name', $order = 'asc', $tags = '', $multiple_sub_category_id = '',$manufacture='')
	{
		if(empty($tags) && !empty($manufacture))
		{
			$this->db->where($where);
			$start = ($page - 1) * 4;
			$this->db->limit($limit, $start);
			$sort = ($sort == 'name') ? $sort : 'price';
			$this->db->order_by($sort, $order);
			 $tags = (empty($tags)) ? '' : $tags;
			 $this->db->like('tags', $tags, 'both');
			$query  = $this->db->get('products');
			$result = $query->result_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result;
			}
		}
		if(!empty($tags) && !empty($manufacture))
		{
			$this->db->where($where);
			$start = ($page - 1) * 4;
			$this->db->limit($limit, $start);
			$this->db->order_by($sort, $order);
			 $tags = (empty($tags)) ? '' : $tags;

			 $this->db->like('tags', $tags, 'both');
			if($manufacture!=0)
			{
			$this->db->where('brand_id',$manufacture);
			}
			$query  = $this->db->get('products');
			$result = $query->result_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result;
			}
		}
		if (empty($where))
		{
			return array();
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->where($where);
			$start = ($page - 1) * 4;
			$this->db->limit($limit, $start);
			$sort = ($sort == 'name') ? $sort : 'price';
			$this->db->order_by($sort, $order);
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$this->db->where_in('sub_category_id', $multiple_sub_category_id);
			$query  = $this->db->get('products');
			$result = $query->result_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result;
			}
		}
		else
		{
			$this->db->where($where);
			$start = ($page - 1) * 4;
			$this->db->limit($limit, $start);
			$sort = ($sort == 'name') ? $sort : 'price';
			$this->db->order_by($sort, $order);
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$query  = $this->db->get('products');

			$result = $query->result_array();

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


	/**
	 * [get_all_products_count description]
	 * @param  array  $where                    [[where cluse value in array]
	 * @param  string $tags                     [products tags]
	 * @param  string $multiple_sub_category_id [multiple sub category id]
	 * @return [array]
	 */
	public function get_all_products_count($where = array(), $tags = '', $multiple_sub_category_id = '')
	{
		if (empty($where))
		{
			return array();
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->select('count(*) as total');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$this->db->where_in('sub_category_id', $multiple_sub_category_id);
			$this->db->where($where);
			$query = $this->db->get('products');

			$result = $query->row_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result['total'];
			}
		}
		else
		{
			$this->db->select('count(*) as total');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$this->db->where($where);

			$query = $this->db->get('products');

			$result = $query->row_array();

			if (empty($result))
			{
				return 0;
			}
			else
			{
				return $result['total'];
			}
		}
	}

	/**
	 * [get_all_products_min_max description]
	 * @param  array  $where                    [[where cluse value in array]
	 * @param  string $tags                     [products tags]
	 * @param  string $multiple_sub_category_id [multiple sub category id]
	 * @return [array]                           [description]
	 */
	public function get_all_products_min_max($where = array(), $tags = '', $multiple_sub_category_id = '', $product_id = '')
	{

		if(!empty($product_id))
		{
			$this->db->select('min(price) as min,max(price) as max');
			$this->db->where_in('products.id', $product_id);
			$query  = $this->db->get('products');
			$result = $query->row_array();

			return $result;
		}
		if (empty($where))
		{
		 	return array();
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->select('min(price) as min,max(price) as max');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$this->db->where_in('sub_category_id', $multiple_sub_category_id);
			$this->db->where($where);
			$query  = $this->db->get('products');
			$result = $query->row_array();

			return $result;
		}
		else
		{
			$this->db->select('min(price) as min,max(price) as max');
			$tags = (empty($tags)) ? '' : $tags;
			$this->db->like('tags', $tags, 'both');
			$this->db->where($where);
			$query  = $this->db->get('products');
			$result = $query->row_array();

			return $result;
		}
	}

	//=========================================================== END KOMAL WORK ===========================================================================================//


	/***==================================================code end by vixuti patel=====================================================***/
}




