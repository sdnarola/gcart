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
		$this->load->model('vendor_model', 'vendors');
		$this->load->model('brand_model', 'brands');
		$this->load->model('category_model', 'categories');
		$this->load->model('order_model', 'orders');
		$this->load->model('product_model', 'products');
	}

	/**
	 * Loads the admin dashboard
	 */
	public function index()
	{
		$this->set_page_title(_l('dashboard'));

		//counter
		$data['total_products'] = $this->products->count_all();
		$data['total_orders']   = $this->orders->count_all();
		$data['total_users']    = $this->users->count_by('is_admin', 0);
		$data['total_vendors']  = $this->vendors->count_all();

		//recent
		$data['recent_customers'] = $this->recent_customers();
		$data['recent_products']  = $this->recent_products();
		$data['recent_orders']    = $this->recent_orders();

		$data['content'] = $this->load->view('admin/dashboard/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Gets recent customers.
	 *
	 * @return mixed 	Recent 5 customer's information.
	 */
	public function recent_customers()
	{
		$this->users->order_by('signup_date', 'DESC');
		$this->users->limit(5);

		return $this->users->get_many_by('is_admin', 0);
	}

	/**
	 * Gets recent products.
	 *
	 * @return mixed 	Recent 5 product's information.
	 */
	public function recent_products()
	{
		$this->products->order_by('add_date', 'DESC');
		$this->products->limit(5);

		return $this->products->get_all();
	}

	/**
	 * Gets recent orders.
	 *
	 * @return mixed 	Recent 5 order's information.
	 */
	public function recent_orders()
	{
		$this->orders->order_by('order_date', 'DESC');
		$this->orders->limit(5);

		return $this->orders->get_all();
	}

	/**
	 * Gets last 30 days total orders per day.
	 */
	public function sale()
	{
		$data['last_30_days_sale'] = $this->orders->last_30_days_sale();
		$this->load->view('admin/dashboard/sale_data', $data);
	}
}
