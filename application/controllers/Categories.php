<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	    $this->CI = &get_instance();
		
		$this->load->model('category_model', 'category');
		$this->load->model('Product_model', 'product');
	}

	/**
	 * [index description]
	 * @param  string $category_slug      [Categories slug]
	 * @param  string $sub_category_slug [sub category slug]
	 * @return [All category page data]
	 */
	public function index($category_slug = '', $sub_category_slug = '')
	{
		$this->data['main_category'] = $this->category->get_parent_categories();
		$this->data['sub_category']  = $this->category->get_sub_categories();

//check if category slug is there
		//

		$category                = array();
		$sub_category            = array();
		$products                = array();
		$list_container          = $this->input->get('list-container');
		$list_container          = (empty($list_container)) ? '' : $list_container;
		$page                    = $this->input->get('page');
		$page                    = (empty($page)) ? 1 : $page;
		$limit                   = 4;
		$total                   = 0;
		$sort                    = $this->input->get('sort');
		$sort                    = (empty($sort)) ? 'name' : $sort;
		$order                   = $this->input->get('order');
		$order                   = (empty($order)) ? 'asc' : $order;
		$tags                    = $this->input->get('tags');
		$tags                    = (empty($tags)) ? '' : $tags;
		$manufacture             = $this->input->get('manufacture');
		$manufacture             = (empty($manufacture)) ? '' : $manufacture;
		$multiple_subcategory    = $this->input->get('subcategory');
		$multiple_subcategory    = (empty($multiple_subcategory)) ? '' : $multiple_subcategory;
		$pricerange              = $this->input->get('pricerange');
		$default_min_max         = array('min' => 100, 'max' => 800);
		$multiple_subcategory_id = '';
		$result                  = array();

		if (!empty($multiple_subcategory))
		{
			$multiple_subcategory_id = (explode(',', $multiple_subcategory));
		}

		if (!empty($category_slug) || !empty($sub_category_slug))
		{
			//get the category id from it
			$category     = $this->category->get_category_by_banner($category_slug);
			$sub_category = $this->category->get_sub_category_by_slug($category['id'], $sub_category_slug);

			$this->data['category_title']    = $category['name'];
			$this->data['subcategory_title'] = $sub_category['name'];
			$this->data['category_slug']     = $category_slug;
			//get the brands
			$this->data['brands'] = $this->product->get_products_brands($category['id'], $sub_category['id'], $multiple_subcategory_id, $tags);

			//get the products now
			$where['category_id'] = $category['id'];

			if (!empty($sub_category_slug))
			{
				$where['sub_category_id'] = $sub_category['id'];
			}

			if (!empty($manufacture))
			{
				$where['brand_id'] = $manufacture;
			}

			if (!empty($pricerange))
			{
				$prices            = explode(',', $pricerange);
				$where['price >='] = $prices[0];
				$where['price <='] = $prices[1];
			}

//sub categories
			if (empty($sub_category_slug))
			{
				$this->data['categoriesfilters'] = $this->category->get_shop_by_sub_category($category['id'], $manufacture, $tags);
			}

			//tags

			$products_tags = $this->product->get_products_tags($where, $multiple_subcategory_id);

			if (!empty($products_tags))
			{
				$products_tags = implode(',', array_map(function ($entry)
				{
					return $entry['tags'];
				}, $products_tags));
				$products_tags = implode(',', array_unique(explode(',', $products_tags)));
				$products_tags = explode(',', $products_tags);
			}


		
	}

	

			$this->data['products_tags'] = $products_tags;
			$default_min_max             = $this->product->get_all_products_min_max($where, $tags, $multiple_subcategory_id);
			$total                       = $this->product->get_all_products_count($where, $tags, $multiple_subcategory_id);
			$products                    = $this->product->get_all_products($where, $page, $limit, $sort, $order, $tags, $multiple_subcategory_id);
		//}

		$pricerange                    = (empty($pricerange)) ? $default_min_max['min'].','.$default_min_max['max'] : $pricerange;
		$this->data['category']        = (empty($category)) ? array() : $category;
		$this->data['products']        = $products;
		$this->data['list_container']  = $list_container;
		$this->data['page']            = $page;
		$this->data['limit']           = $limit;
		$this->data['total']           = $total;
		$this->data['sort']            = $sort;
		$this->data['order']           = $order;
		$this->data['tags_data']       = $tags;
		$this->data['manufacture']     = $manufacture;
		$this->data['pricerange']      = $pricerange;
		$this->data['subcategory']     = $multiple_subcategory;
		$this->data['default_min_max'] = $default_min_max;

		$this->template->load('index', 'content', 'products/index', $this->data);
	}

	

	public function get_parent_category_products($parent_id)
	{
		$parent_id = $this->uri->segment(3);
		$this->category->get_parent_category_products($parent_id);

		return true;
	}

	public function get_sub_category_products($parent_id)
	{
		$parent_id                     = $this->uri->segment(3);
		$data['sub_category_products'] = $this->category->get_sub_category_products($parent_id);

		var_dump($data);
		//$this->data=$this->get_all();
		//$this->template->load('index', 'content', 'products/index', $data);

	}
}
