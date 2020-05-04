<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for all front-end controllers
 */
class Frontend_Controller extends MY_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		if (get_settings('maintenance') == 1)
		{
			redirect(site_url('authentication/maintenance'));
		}

		$this->load->model('category_model', 'category');
		$this->load->model('brand_model', 'brands');
		$this->load->model('slider_model', 'sliders');
		$this->load->model('product_model', 'products');
		$this->load->model('cart_model', 'cart');

	}
}
