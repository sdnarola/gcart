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
}
