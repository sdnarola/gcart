<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model', 'categories');
	}

	public function index()
	{
		$this->set_page_title(_l('categories'));
		$data['content'] = $this->load->view('admin/categories/index', '', TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new category
	 */
	public function add()
	{
		$this->set_page_title(_l('categories').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();
			print_r($data);

			$insert = $this->users->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('category')));
				redirect('admin/categories');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/categories/add', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	public function get_sub_categories($id)
	{
		$data = $this->categories->get_sub_categories($id);
		echo json_encode($data);
	}
}
