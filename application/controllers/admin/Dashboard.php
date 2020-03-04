<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'users');
		$this->load->model('brand_model', 'brands');
		$this->load->model('category_model', 'categories');
		$this->load->model('product_model', 'products');
	}

	/**
	 * Loads the admin dashboard
	 */
	public function index()
	{
		$this->set_page_title(_l('dashboard'));

		$data['total_products'] = $this->db->count_all('products');
		$data['total_orders']   = $this->db->count_all('orders');
		$data['total_users']    = $this->db->count_all('users');
		$data['total_vendors']  = $this->db->count_all('vendors');

		$data['content'] = $this->load->view('admin/dashboard/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);

	}

	public function recent_customers()
	{
		$this->users->order_by('signup_date', 'DESC');
		$data['recent_customers'] = $this->users->get_many_by('is_admin', 0);
		echo '<pre>';
		print_r($data);
	}

	public function recent_products()
	{
		$this->products->order_by('price', 'DESC');
		$data['recent_products'] = $this->products->get_all();
		echo '<pre>';
		print_r($data);
	}
}
