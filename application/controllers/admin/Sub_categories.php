<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_categories extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('sub_category_model', 'sub_categories');
	}

	/**
	 *  listing all sub_categories 
	 */
	public function index()
	{
		$this->set_page_title(_l('sub_categories'));

		$data['sub_categories'] = $this->sub_categories->get_all();
		$data['content'] = $this->load->view('admin/categories/sub_categories/index',$data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Deletes the single sub_category record
	 */
	public function delete() 
	{
		$sub_category_id = $this->input->post('sub_category_id');

		$deleted = $this->sub_categories->delete($sub_category_id);

		if ($deleted) 
		{
			echo 'true';
		} 
		else 
		{
			echo 'false';
		}

	}

	/**
	 * Toggles the sub_category status to Active or Inactive
	*/
	public function update_status() 
	{
		$sub_category_id = $this->input->post('sub_category_id');
		$data = array('is_active' => $this->input->post('is_active'));

		$update = $this->sub_categories->update($sub_category_id, $data);

		if ($update) 
		{

			if ($this->input->post('is_active') == 1) 
			{
				echo 'true';
			} 
			else 
			{
				echo 'false';
			}

		}

	}	

	/**
 	* Deletes multiple sub_categories records
 	*/
	public function delete_multiple() {
		$where = $this->input->post('ids');

		$deleted = $this->sub_categories->delete_many($where);

		if ($deleted) 
		{
			$ids = implode(',', $where);
			echo 'true';
		} 
		else 
		{
			echo 'false';
		}

	}

	/**
	 * Add new sub_category
	 */
	public function add()
	{
		$this->set_page_title(_l('sub_categories').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();
			$data['category_id']= get_category_id($data['category_name']);
			unset($data['category_name']);
			
			$insert = $this->sub_categories->insert($data); 

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('sub_category')));
				redirect('admin/sub_categories/');
			}

		}
		else
		{
			$data['content'] = $this->load->view('admin/categories/sub_categories/add',' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}

	}

	/**
	 * edit sub_category 
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '') 
		{
			$this->set_page_title(_l('sub_category') . ' | ' . _l('edit'));

			if ($this->input->post()) 
			{
				$data =$this->input->post(); 
				$data['is_active'] = ($this->input->post('is_active')) ? 1 : 0;
						 			
				$update = $this->sub_categories->update($id,$data);

				 if($update)
				 {
				 	set_alert('success', _l('_updated_successfully', _l('sub_category')));
					redirect('admin/sub_categories');
				}
				
			} 
			else 
			 {
				$data['sub_category'] = $this->sub_categories->get($id);
				$data['content'] = $this->load->view('admin/categories/sub_categories/edit',$data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}	

		}
}