<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comments extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model', 'comments');
	}

	public function index()
	{
	}

	public function add_products_comments()
	{
		$this->data['product_id'] = $this->input->post('products_id');
		$this->data['user_name']  = $this->input->post('name');
		$this->data['user_email'] = $this->input->post('email');
		$this->data['comment']    = $this->input->post('comments');
		$this->data['add_date']   = date('Y-m-d h:i:sa');

		$result = $this->comments->insert($this->data);

		if ($result)
		{
			echo 'Review submit successfully';
		}
	}
}

?>