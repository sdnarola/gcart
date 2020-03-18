<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'products');
		$this->load->model('category_model', 'category');
	}

	public function index()
	{
		$this->set_page_title('Category');
	}

	public function show_details($id)
	{
		if ($data['product_details'] = $this->products->get($id))
		{
			$data['content'] = $this->load->view('themes/default/products/details', $data, TRUE);
			$this->load->view('themes/default/layouts/index', $data);
		}
	}
}
