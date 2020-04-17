<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
		$this->load->model('Product_model', 'product');
	}

	public function index()
	{ 

		///echo $product_id;

		//$this->get_main_categories();
	}

	/**==================================================code  by vixuti patel=====================================================
	 * [search_category ]
	 * @return [type] [description]
	 */
	public function search()
	{
		if ($this->input->post('category_id'))
		{
			$name        = $this->input->post('name');
			$category_id = $this->input->post('category_id');
			$data        = $this->category->search($category_id, $name);

			//var_dump($data);

			foreach ($data as $search)
			{
				if (!empty($search['s_id']))
				{
					//$data['sub_category_products'] = $this->category->get_sub_category_products($search['s_id']);
					return $this->category->get_sub_category_products($search['s_id']);

				}
				else
				{
					//$data['parent_category_products'] = $this->category->get_parent_category_products($search['c_id']);
					return $this->category->get_parent_category_products($search['c_id']);

				}

			//	$this->template->load('index', 'content', 'products/index', $data);
			}

			if (!$data)
			{
				set_alert('error', _l('no_data_found', _l('')));
				redirect();
			}
			
		}
	}
	/***==================================================code end by vixuti patel=====================================================***/

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
