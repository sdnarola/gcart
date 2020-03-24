<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_setup extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Category_model', 'categories');
	}

	/**
	 * Loads the list of all categories with it's display status on menu
	 */
	public function index()
	{
		$this->set_page_title(_l('menu_setup'));

		$data['content'] = $this->load->view('admin/settings/menu/index.php','', TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Toggles the category display status to Active or Inactive
	*/
	public function update_display_status() 
	{
		$category_id = $this->input->post('category_id');
		$data = array('is_header' => $this->input->post('is_header'));
		
		$update = $this->categories->update($category_id, $data);
	
		if ($update == 1) 
		{

			if ($this->input->post('is_header') == 1) 
			{
				echo 'true';
			} 
			else 
			{
				echo 'false';
			}

		}
	}	

}
