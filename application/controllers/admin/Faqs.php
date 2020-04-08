<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends Admin_Controller
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
		$data['content'] = $this->load->view('admin/faqs/index',$data, TRUE);
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
			$data1 =array('question' => $data['title'],'answer' => $data['details']);

			$insert = $this->faq->insert($data1);    

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('faq')));
				redirect('admin/faqs');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/faqs/add',' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
 	* Deletes multiple faq records
 	*/
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');	
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

				if($result)
				{
					set_alert('success', _l('_updated_successfully', _l('faq')));
					redirect('admin/faqs');		
				}	
			} 
			else 
			{
				$data['faq'] = $this->faq->get($id);
				$data['content'] = $this->load->view('admin/faqs/edit',$data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}	
	}

}
