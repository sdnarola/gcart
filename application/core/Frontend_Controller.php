<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for all front-end controllers
 */
class Frontend_Controller extends My_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('category_model', 'category');
		$this->load->model('brand_model', 'brand');
		$this->load->model('slider_model', 'slider');
		$this->load->model('product_model', 'product');

	}
}
