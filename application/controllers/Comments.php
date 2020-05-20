<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comments extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [index description]
	 * @param  string $products_slug [products wise slug]
	 * @return comments data
	 */
	public function index($products_slug = '')
	{
		if (!empty($products_slug))
		{
			$page                         = $this->input->get('page');
			$page                         = (empty($page)) ? 1 : $page;
			$limit                        = 4;
			$start                        = ($page - 1) * $limit;
			$products                     = $this->products->get_products_by_slug($products_slug);
			$product_id                   = $products['id'];
			$products_where['product_id'] = $product_id;
			$total_comments               = $this->comments->count_products_comments($product_id);
			$page_size                    = 4;

			$this->data['page_size']       = $page_size;
			$this->data['page']            = $page;
			$this->data['limit']           = $limit;
			$this->data['products_review'] = $this->comments->get_many_by(array('product_id' => $product_id));
			$this->data['products_name']   = $products['name'];
			$this->data['products_slug']   = $products_slug;
			$this->data['products_detail'] = $products;
			$this->data['comments_data']   = $this->comments->get_products_by_comment($products_where, $limit, $start);
			$this->data['comments']        = $total_comments;
			$this->template->load('index', 'content', 'products/comments', $this->data);
		}
		else
		{
			$this->add_products_comments();
		}
	}

	/**
	 * [add_products_comments ]
	 */
	public function add_products_comments()
	{
		$this->data['product_id'] = $this->input->post('products_id');
		$this->data['user_name']  = $this->input->post('name');
		$this->data['user_email'] = $this->input->post('email');
		$this->data['comment']    = $this->input->post('comments');
		$this->data['add_date']   = date('Y-m-d h:i:sa');

		$result = $this->comments->insert($this->data);

		if ($result)
		{
			echo 'comments submit successfully';
		}
	}

	// ============================================ END WORK BY KOMAl ========================================================================================
}

?>