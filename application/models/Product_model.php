<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model
{
	/**
	<<<<<<< HEAD
	 * @var mixed
	=======
	 * @var boolean
	>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
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

// =====================================================  WORK BY KOMAL ========================================================================================
	/**
	 * [get_products_by_slug description]
	 * @param  string $products_slug [products slug]
	 * @return [array]
	 */
	public function get_products_by_slug($products_slug = '')
	{
		if (empty($products_slug))
		{
			return array();
		}
		else
		{
			$query  = $this->db->get_where('products', array('is_active' => 1, 'is_deleted' => 0, 'slug' => $products_slug));
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

	 * [get_products_tags description]
	 * @param  array  $where                    [where cluse value in array]
	 * @param  string $multiple_sub_category_id [multiple sub category id]
	 *
	 * @return [array]                           [products tags data]
	 */
	public function get_products_tags($where = array(), $multiple_sub_category_id = '', $product_id = '')
	{
		if (empty($where))
		{
			return array();
		}
		elseif (empty($where) && !empty($product_id = ''))
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

			# code...
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

	/**
	 * [get_hot_deals_data description]
	 * @return hot deals data in array
	 */
	public function get_hot_deals_data()
	{
		$query  = $this->db->get_where('hot_deals', array('is_deleted' => 0, 'end_date >' => date('Y-m-d h:i:s'), 'start_date <' => date('Y-m-d h:i:s')));
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
	public function get_all_products($where = array(), $page = 1, $limit = 1, $sort = 'name', $order = 'asc', $tags = '', $multiple_sub_category_id = '')
	{
		if (empty($where))
		{
			return array();
		}
		elseif (!empty($where) && !empty($multiple_sub_category_id))
		{
			$this->db->where($where);
			$start = ($page - 1) * $limit;
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
			$start = ($page - 1) * $limit;
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
	public function get_all_products_min_max($where = array(), $tags = '', $multiple_sub_category_id = '')
	{
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

	/**
	 * [add_product_by_tags description]
	 * @param [int] $product_id [products primary key]
	 * @param [array] $data
	 */
	public function add_product_by_tags($product_id, $data)
	{
		$this->db->where('id', $product_id);
		$this->db->update('products', $data);
	}

// ===================================================== END WORK BY KOMAL ========================================================================================

//

//
	//
	public function get_products($id)
	{
		$this->db->select('products.*,categories.name AS category_name,categories.is_active AS category_status');
		$this->db->from('products');
		$this->db->join('categories', 'products.category_id = categories.id');
		$this->db->where('vendor_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_vendor_products($id)
	{
		$this->db->where('vendor_id', $id);

		return $this->db->get('products')->num_rows();
	}

// public function get_product_by_star_raring($product_id)

// {

// 	$this->db->select('AVG(star_ratings) as star_rating');

// 	$this->db->get_where('reviews',array(''))

// }
	/**
	 * 	===================================================vixuti patel's code================================================================
	 * [get_hot_deals products]
	 * @return [type] [description]
	 */
	public function get_hot_deals()
	{
		$this->db->select('p.id,p.name,p.thumb_image,p.old_price, p.price,h.start_date as start ,h.end_date as end', TRUE);
		$this->db->from('products as p');
		$this->db->join('hot_deals as h', 'p.id=h.product_id');
		$this->db->where(array('p.is_hot' => 1, 'p.is_active' => 1));

		$query = $this->db->get();

		return $query->result_array();
	}

/**
 * [get_all_reviews description]
 * @return [type] [description]
 */
	public function get_all_reviews()
	{
		$this->db->select('product_id,AVG(star_ratings) as star_ratings', TRUE);
		$this->db->from('reviews as r');
		$this->db->group_by('product_id');
		$query = $this->db->get();

		return $query->result_array();
	}

// /**

//  * [get_new_products description]

//  * @return [type] [description]

//  */

	public function get_new_products($id = '')
	{
		if (empty($id))
		{
			$this->db->order_by('add_date', 'des');

			$query = $this->db->get_where('products', array('is_active' => 1));

			if ($query)
			{
				return $query->result_array();
			}

			return false;
		}
		else
		{
			$this->db->order_by('add_date', 'des');

			$query = $this->db->get_where('products', array('is_active' => 1, 'category_id' => $id));

			if ($query)
			{
				return $query->result_array();
			}

			return false;
		}
	}

	/**
	 * [get_special_offers description]
	 * @return [type] [description]
	 */
	public function get_special_offers()
	{
		$this->db->order_by('add_date', 'des');

		$query = $this->db->get_where('products', array('is_active' => 1, 'is_sale' => 1));

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}

	/**
	 * [get_upsell_products description]
	 * @return [return upsell products
	 */
	public function get_upsell_products()
	{
		$query = $this->db->get_where('products', array('is_deleted' => 0, 'is_active' => 1, 'is_sale' => 1));

		if ($query == TRUE)
		{
			return $query->result();
		}

		return false;
	}

	/**
	 * [get_special_offers description]
	 * @return [type] [description]
	 */
	public function get_special_deal()
	{
		$this->db->order_by('add_date', 'des');
		$this->db->select('p.*', TRUE);
		$this->db->from('products as p');
		$this->db->where('p.old_price>', 'p.price');
		$query = $this->db->get();

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}

/**
 * [get_best_sellers description]
 * @return [type] [description]
 */
	public function get_best_sellers()
	{
		$this->db->select('p.*,SUM(i.quantity) AS total_quantity', TRUE);
		$this->db->from('products as p');
		$this->db->join('order_items as i', 'i.product_id=p.id');
		$this->db->join('orders as o', 'i.order_id=o.id');

		$this->db->where('o.payment_status', 1);
		$this->db->group_by('p.id');

		$this->db->order_by('total_quantity ', 'desc');
		$this->db->limit(15);
		$query = $this->db->get();

		return $query->result_array();
	}

/**
 * [get_featured_products description]
 * @return [type] [description]
 */
	public function get_featured_products()
	{
		$this->db->distinct();
		$this->db->select('p.*');
		$this->db->from('products as p');
		$this->db->where(array('is_active' => 1, 'short_description !=' => ''));
		//$this->db->where('long_description !=', '');
		$query = $this->db->get();

		if ($query)
		{
			return $query->result_array();
		}

		return false;
	}

/**
 * [get_tags description]
 * @return [type] [description]
 */
	public function get_tags()
	{
		$this->db->distinct();
		$this->db->order_by('tags', 'asc');
		$this->db->select('id,tags');
		$this->db->limit(6);
		$result = $this->db->get('products')->result_array();

		return $result;
	}

	/**
	 * [autocomplete by product name or tags in search ]
	 * @param  [type] $query [description]
	 * @return [type]        [description]
	 */
	public function autocomplete($query)
	{
		$this->db->distinct();
		$this->db->select('name,tags,slug');
		$this->db->from('products');

		if ($query != '')
		{
			$this->db->like('name', $query, 'both');
			$this->db->or_like('tags', $query, 'both');
			$this->db->or_like('slug', $query, 'both');
		}

		$this->db->order_by('name', 'DESC');

		return $this->db->get();

// $query=$this->db->get();
		// return $query->result_array();
	}

	/**
	 * [search category or product or brand]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function search($category_id = '', $name = '')
	{
//search by category
		if (!empty($category_id && empty($name)))
		{
			$this->db->select('c.slug as cat_slug', TRUE);
			$this->db->from('products as p');
			$this->db->join('categories as c', ' c.id=p.category_id');
			$this->db->where(array('c.is_active' => 1, 'c.is_deleted' => 0, 'p.category_id' => $category_id));
			$query  = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		if (!empty($category_id) && !empty($name))
		{
			$this->db->distinct();
			$this->db->select('s.slug as sub_cat_slug,c.slug as cat_slug', TRUE);
			$this->db->from('products as p');
			$this->db->join('categories as c', ' c.id=p.category_id');
			$this->db->join('sub_categories as s', ' s.category_id=c.id');
			$this->db->like('s.name', $name, 'both');
			$this->db->where(array('c.is_active' => 1, 'c.is_deleted' => 0, 'p.category_id' => $category_id));

			$query  = $this->db->get();
			$result = $query->result_array();

//search subcategory
			if (empty($result))
			{
				$this->db->distinct();
				$this->db->select('p.slug as product_slug', TRUE);
				$this->db->from('products as p');
				$this->db->join('categories as c', ' c.id=p.category_id');
				$this->db->join('brands as b', ' p.brand_id=b.id ');

				$this->db->like('p.name', $name, 'both');
				$this->db->or_like('p.tags', $name, 'both');
				$this->db->or_like('b.name', $name, 'both');

				$this->db->where(array('c.is_active' => 1, 'c.is_deleted' => 0));

				$query  = $this->db->get();
				$result = $query->result_array();

				return $result;
				//var_dump($result);
			}
			else
			{
				return $result;
			}
		}

		if (empty($category_id) && !empty($name))
		{
			$this->db->distinct();
			$this->db->select('s.slug as sub_cat_slug,c.slug as cat_slug', TRUE);
			$this->db->from('products as p');
			$this->db->join('categories as c', ' c.id=p.category_id');
			$this->db->join('sub_categories as s', ' s.category_id=c.id');
			$this->db->like('s.name', $name, 'both');

			$query  = $this->db->get();
			$result = $query->result_array();

//search subcategory
			if (empty($result))
			{
				$this->db->select('p.slug as product_slug,p.id', TRUE);
				$this->db->from('products as p');
				$this->db->join('brands as b', ' p.brand_id=b.id ');

				$this->db->like('p.name', $name, 'both');
				$this->db->or_like('p.tags', $name, 'both');
				$this->db->or_like('b.name', $name, 'both');

				$this->db->where(array('p.is_active' => 1, 'p.is_deleted' => 0));

				$query  = $this->db->get();
				$result = $query->result_array();

				return $result;
			}
			else
			{
				return $result;
			}
		}

		if (empty($category_id) && empty($name))
		{
			$this->db->select('p.slug as product_slug', TRUE);
			$this->db->from('products as p');
			$this->db->where(array('p.is_active' => 1, 'p.is_deleted' => 0));

			$query  = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
	}

	//======================================================code end by vixuti patel========================================================//
}
