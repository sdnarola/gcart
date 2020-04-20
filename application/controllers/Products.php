<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Product_model', 'products');
		$this->load->model('category_model', 'category');
		$this->load->model('Review_model', 'review');
		$this->load->model('Comment_model', 'comment');
	}

	public function index($product_slug = '')
	{
		if (!empty($product_slug))
		{
			$this->show_detail($product_slug);
		}
		else
		{
			$this->add_product_by_tags();
		}
	}

	/**
	 * [show_detail description]
	 * @return [type] [description]
	 */
	public function show_detail($product_slug = '')
	{
		$products_data = $this->products->get_products_by_slug($product_slug);

		if (!empty($products_data))
		{
			$category_id         = $products_data['category_id'];
			$product_id          = $products_data['id'];
			$this->data['price'] = $products_data['price'];

			$where['id'] = $category_id;

			$category_data = $this->category->get_parent_categories($where);

			foreach ($category_data as $key => $category)
			{
				$category_name = $category['name'];
				$category_slug = $category['slug'];
			}

			$category_banner = $this->category->get_category_by_banner($category_slug);

			$products_where['product_id'] = $product_id;
			$user_where['user_id']        = $this->session->userdata('user_id');
			$user_review_data             = $this->review->get_many_by($user_where);
			$user_review_use_id           = array();
			$user_review_products_id      = array();

			foreach ($user_review_data as $key => $user_review)
			{
				$user_review_use_id[]      = $user_review['user_id'];
				$user_review_products_id[] = $user_review['product_id'];
			}

			$this->data['user_review_use_id']      = $user_review_use_id;
			$this->data['user_review_products_id'] = $user_review_products_id;
			$this->data['user_by_review_data']     = $this->review->get_many_by($user_where);
			$this->data['reviews_data']            = $this->review->get_products_by_review($products_where);
			$this->data['comments_data']           = $this->comment->get_products_by_comment($product_id);
			$this->data['products_id']             = $products_data['id'];
			$this->data['category_banner']         = $category_banner;
			$this->data['category_name']           = $category_name;
			$this->data['category_slug']           = $category_slug;
			$this->data['reviews']                 = $this->products->count_products_review($product_id);
			$this->data['products_name']           = $products_data['name'];
			$this->data['upsell_products']         = $this->products->get_upsell_products();
			$this->data['hot_deals_products']      = $this->products->get_hot_deals_products();
			$this->data['products_detail']         = $products_data;

			$this->template->load('index', 'content', 'products/details', $this->data);
		}
	}

	public function add_product_by_tags()
	{
		$tags          = $this->input->post('tags');
		$product_id    = $this->input->post('products_id');
		$where['id']   = $product_id;
		$products_tags = $this->products->get_products_tags($where);

		if (!empty($products_tags))
		{
			$products_tags = implode(',', array_map(function ($entry)
			{
				return $entry['tags'];
			}, $products_tags));
			$products_tags = implode(',', array_unique(explode(',', $products_tags)));
		}

		$products_tags_array = explode(',', $products_tags);

		if (!in_array($tags, $products_tags_array))
		{
			
			$this->data['tags'] = $products_tags.','.$tags;

			// echo $products_tags;

			$result = $this->products->add_product_by_tags($product_id, $this->data);

			if ($result == 0)
			{
				echo 'success';
			}
		}
		else
		{
			echo "exits";
		}
	}


	/***==========================================================code by vixuti patel===========================================================***
		/**
		 * [get_new_arrivals description]
		 * @return [json] [new_poducts and riviews of all new products]
	*/
	public function get_new_arrivals()
	{
		$category_id          = $this->input->post('category_id');
		$data['reviews']      = $this->products->get_all_reviews();
		$data['new_products'] = $this->products->get_new_products($category_id);

		echo json_encode($data);
	}

	/***=======================================================code end by vixuti patel========================================================**/
}
