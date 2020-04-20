<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review_model', 'review');
	}

	public function index()
	{
	}

	public function add_products_review()
	{
		$this->data['user_id']      = $this->session->userdata('user_id');
		$this->data['product_id']   = $this->input->post('products_id');
		$this->data['star_ratings'] = $this->input->post('star');
		$this->data['review']   = $this->input->post('review');
		$this->data['add_date'] = date('Y-m-d h:i:s');

		$result = $this->review->insert($this->data);

		if ($result)
		{
			echo 'Review submit successfully';
		}
	}
	
}

?>