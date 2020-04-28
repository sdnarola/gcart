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

	public function index()
	{ 

		
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
