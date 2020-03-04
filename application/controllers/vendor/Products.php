<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->set_page_title(_l('products'));
		$data['content'] = $this->load->view('vendor/products/index', '', TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

	/**
	 * Add new Product
	 */
	public function add()
	{
		$this->set_page_title(_l('products').' | '._l('add'));

		if ($this->input->post())
		{
			print_r($this->input->post());
		}
		else
		{
			$data['content'] = $this->load->view('vendor/products/add', '', TRUE);
			$this->load->view('vendor/layouts/index', $data);
		}
	}
}
