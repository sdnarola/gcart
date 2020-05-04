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

	// public function index($product_id='')
	// {
	// 	$this->show_detail($product_id);
	// }

	// /**
	//  * [show_detail description]
	//  * @return [type] [description]
	//  */
	// public function show_detail($product_id)
	// {
	// 	$products_data = $this->products->get_products_by_slug($product_id);;
	// 	$category_id   = $products_data['category_id'];
	// 	// echo $products_data['name'];
	// 	$this->data['price']=$products_data['price'];

	// 	$category_data = $this->category->get_parent_categories($category_id);

	// 	foreach ($category_data as $key => $category)
	// 	{
	// 		$this->data['category_name'] = $category['name'];
	// 		$this->data['category_slug']   = $category['slug'];
	// 	}

	// 	$this->data['reviews']            = $this->products->count_products_review($product_id);
	// 	$this->data['products_name']      = $products_data['name'];
	// 	$this->data['upsell_products']    = $this->products->get_upsell_products();
	// 	$this->data['hot_deals_products'] = $this->products->get_hot_deals_products();
	// 	$this->data['products_detail']    = $this->products->get_products_by_slug($product_id);

	// 	$this->template->load('index', 'content', 'products/details', $this->data);
	// }

	public function add_cart_products()
	{
		$product_id      = $this->input->post('products_id');
		$products_data   = $this->products->get($product_id);
		$products_amount = $products_data['new_price'];
		$date            = date('Y-m-d h:i:scandir(directory)');

		$data = array(
			'product_id'   => $product_id,
			'quantity'     => 1,
			'total_amount' => $products_amount,
			'date'         => $date
		);

		$this->products->add_to_cart($data);
	}

	public function add_wishlist_products()
	{
		$product_id      = $this->input->post('products_id');
		$all_products_id = $this->products->get_wishlist_data(1);

		if (!empty($product_id))
		{
			$ids = array();

			foreach ($all_products_id as $product)
			{
				// if ($product->product_id != $product_id)
				// {
					array_push($ids, $product->product_id);
				// }
			}
			// print_r($ids);

			if (!in_array($product_id, $ids, TRUE))
			{
				$data = array(

					'user_id'    => 1,

					'product_id' => $product_id

				);

				$result = $this->products->add_wishlist_products($data);

				// if ($result == TRUE)
				// {
				// 	echo 'Add successfully';
				// }
			}
			// else
			// {
			// 	echo 'All ready add in wish list';
			// }
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
		$category_id= $this->input->post('category_id'); 
		$data['reviews']=$this->products->get_all_reviews();
		$data['new_products']=$this->products->get_new_products($category_id);

 	    echo json_encode($data); 
	} 
	/**
	 * [autocomplete_search description]
	 * @return [type] [description]
	 */
	 public function autocomplete_search()
	 {
	  $query = '';
	  if($this->input->post('query'))
	  {
	   	$query = $this->input->post('query');
	  }
	  
	  $data = $this->products->autocomplete($query);

	  if($data->num_rows() > 0)
	  {
	  	foreach($data->result_array() as $row)
	    {
	      $result[] = $row['name'];
	    }
	    $product_tags = implode(',', array_map(function ($entry)
	                {
	                  return $entry['tags'];
	                }, $data->result_array()));

	               $product_tags = implode(',', array_unique(explode(',', $product_tags)));
	               $product_tags = explode(',', $product_tags);
	               $count=0;
	               foreach ($product_tags as $tag) 
	               {
		               	if (! in_array($tag, $result)) 
		 			    {
		                	$result[]=$tag;
		                }
	               }
	    }
	    else
	    {
	      $result = array();
	    }
	    //return json result
	    echo json_encode($result);
	 }
	 /**
	  * [search description]
	  * @return [type] [description]
	  */
	 public function search($tags='')
	 {
		$name        = $this->input->post('name');
		$category_id=$this->input->post('category_id');		
		$data        = $this->products->search($category_id, $name);
		
		 if(!empty($data))
		 {
		 	if(!empty($data[0]['sub_cat_slug']))
				{
					redirect(site_url('categories/'.$data[0]['cat_slug']."/".$data[0]['sub_cat_slug'])); 
				}
				if(!empty($data[0]['cat_slug']))
				{
					redirect(site_url('categories/'.$data[0]['cat_slug'])); 
				}

			$products                = array();
			$product_id 			 = array();
			$where 					 = array();
			$products_tags 			 = '';
			$limit                   = 4;
			$total                   = 0;
			$list_container          = $this->input->get('list-container');
			$list_container          = (empty($list_container)) ? '' : $list_container;
			$pricerange              = $this->input->get('pricerange');
			$sort                    = $this->input->get('sort');
			$sort                    = (empty($sort)) ? 'name' : $sort;
			$page                    = $this->input->get('page');
			$page                    = (empty($page)) ? 1 : $page;
			$order                   = $this->input->get('order');
			$order                   = (empty($order)) ? 'asc' : $order;
			$tags                    = $this->input->get('tags');		
			$tags                    = (empty($tags)) ? '' : $tags;
			$manufacture             = $this->input->get('manufacture');
			$manufacture             = (empty($manufacture)) ? '' : $manufacture;
			$default_min_max         = array('min' => 100, 'max' => 50000);

			foreach ($data as $product)
			{			
				if(!empty($data[0]['product_slug']))
				{
					if(count($data)<2)
					{
						redirect(site_url('Products/'.$product['product_slug'])); 
					}

				$product_info = $this->products->get_products_by_slug($product['product_slug']);
				$products[] = $product_info;

				}
			}
			
			foreach ($products as $product)
			{
				$product_id[] = $product['id'];	
			}
			$product_id=implode(",",$product_id );
			$product_id=explode(",", $product_id);
			if (!empty($manufacture))
				{
					$where['brand_id'] = $manufacture;
				}
				if(!empty($pricerange))
				{
					$prices            = explode(',', $pricerange);
					$where['price >='] = $prices[0];
					$where['price <='] = $prices[1];
				}
			$products_tags = $this->category->get_products_tags(null,null, $product_id);
			if (!empty($products_tags))
			{
				$products_tags = implode(',', array_map(function ($entry)
				{
					return $entry['tags'];
				}, $products_tags));
				$products_tags = implode(',', array_unique(explode(',', $products_tags)));
				$products_tags = explode(',', $products_tags);
			}

			$default_min_max             = $this->category->get_all_products_min_max(null, null,null, $product_id);
			$pricerange                    = (empty($pricerange)) ? $default_min_max['min'].','.$default_min_max['max'] : $pricerange;

			if(!empty($where) || !empty($manufacture))
			{
				if(empty($manufacture))
				{
					$manufacture 	= 0;
				}
			$products                    = $this->category->get_all_products($where, $page, $limit, $sort, $order, $tags,null, $manufacture);
			}
			if(!empty($tags) || !empty($manufacture))
			{ 
				$where['is_deleted'] = 0;
				if(empty($manufacture))
				{
					$manufacture 	= 0;
				}
				$products           = $this->category->get_all_products($where, $page, $limit, $sort, $order, $tags,null,$manufacture);
		
			}
			$where['is_deleted']   = 0;
			$total                 = $this->category->get_all_products_count($where, $tags, $product_id);
			$data['brands']		   = $this->category->get_brands(null,null,null,null,$product_id);
			$data['main_category'] = $this->category->get_parent_categories();
			$data['sub_category']  = $this->category->get_sub_categories();
			$data['products']      = $products;
			$data['limit']         = $limit;
			$data['page']		   = $page;
			$data['total']         = $total;
			$data['list_container']= $list_container;
			$data['sort']		   = (empty($sort)) ? 'name' : $sort;
			$data['order']         = 'asc' ;
			$data['tags_data']     =  $tags ;
			$data['manufacture']   = '' ;
			$data['subcategory']   = '';
			$data['total']           = '';
			$data['default_min_max'] =  $default_min_max;
			$data['pricerange']      = '';
			$data['pricerange']      = $pricerange;
			$data['products_tags']	 = $products_tags;

			$this->set_page_title('Products');
			$this->template->load('index', 'content', 'products/index', $data);
						
		}
		else
		{
			redirect(site_url('categories/')); 
		}
							
	}
		/***=================================================code end by vixuti patel========================================================**/
}
		


