<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct() 
	{
		parent::__construct();

		$this->load->model('subscriptions_model', 'subscriptions');
	}

	/**
	 * Loads the list of vendors.
	 */
	public function index() 
	{
		$this->set_page_title(_l('subscriptions'));

		$data['plans'] = $this->subscriptions->get_all();
		$data['content'] = $this->load->view('admin/vendors/subscriptions/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * add records
	 */
	public function add() 
	{
		$this->set_page_title(_l('subscriptions') . ' | ' . _l('add'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			$insert = $this->subscriptions->insert($data);

			if ($insert) 
			{
				set_alert('success', _l('_added_successfully', _l('subscriptions')));
				redirect('admin/subscriptions/');
			}
		} 
		else 
		{
			$data['content'] = $this->load->view('admin/vendors/subscriptions/add', '', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Updates the  record
	 *
	 * @param int  $id  The subscription id
	 */
	public function edit($id = '') 
	{
		$this->set_page_title(_l('subscription') . ' | ' . _l('edit'));

		if ($this->input->post()) 
		{
			$data = $this->input->post();

			$update = $this->subscriptions->update($id, $data);

			if ($update) 
			{
				set_alert('success', _l('_updated_successfully', _l('subscription')));
				redirect('admin/subscriptions/');
			}

		} 
		else 
		{
			$data['plan'] = $this->subscriptions->get($id);
			$data['content'] = $this->load->view('admin/vendors/subscriptions/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}

	}

	/**
	 * Deletes the single record
	 */
	public function delete() 
	{
		$id = $this->input->post('plan_id');
		$deleted = $this->subscriptions->delete($id);

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
	 * Deletes multiple  records
	 */
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');
		$deleted = $this->subscriptions->delete_many($where);

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

}
