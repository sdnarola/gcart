<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Faq_model', 'faq');
	}

	/**
	 *  listing all faq
	 */
	public function index()
	{
		$this->set_page_title(_l('faq'));

		$data['faq'] = $this->faq->get_all();
		
		$data['content'] = $this->load->view('admin/faq/index',$data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Deletes the single faq record
	 */
	public function delete() 
	{
		$id = $this->input->post('faq_id');
		
		$deleted = $this->faq->delete($id);

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
	 * Add new faq
	 */
	public function add()
	{
		$this->set_page_title(_l('faq').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();
			//print_r($data);
			$data1 =array('question' => $data['title'],'answer' => $data['details']);

			$insert = $this->faq->insert($data1);    

						if ($insert)
						{
							set_alert('success', _l('_added_successfully', _l('faq')));
							redirect('admin/faq');
						}
		}
		else
		{
			$data['content'] = $this->load->view('admin/faq/add',' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
 	* Deletes multiple faq records
 	*/
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');
		//in soft delete move image to deleted folder
		$data= $this->faq->get_many($where);
		
		$deleted = $this->faq->delete_many($where);

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
	 * edit faq
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '') 
	{
			$this->set_page_title(_l('faq') . ' | ' . _l('edit'));

			if ($this->input->post()) 
			{
				$data =$this->input->post(); 
				$data =array('question' => $data['title'],'answer' => $data['details']);

				$result = $this->faq->update($id,$data);

			
				set_alert('success', _l('_updated_successfully', _l('faq')));
				redirect('admin/faq');			
			} 
			else 
			{
				$data['faq'] = $this->faq->get($id);
				
				$data['content'] = $this->load->view('admin/faq/edit',$data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}	
	}

}

	

	
	