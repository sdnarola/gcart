<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('comment_model', 'comments');
	}

// =========================== Bhavik ==================================//
	/**
	 * Gets product's comments information.
	 */
	public function index()
	{
		$this->set_page_title(_l('comments'));
		$id               = $this->session->userdata('vendor_id');
		$data['comments'] = $this->comments->get_product_comments($id);
		$data['content']  = $this->load->view('vendor/comments/index', $data, TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

	/**
	 * Delete the single comment record
	 */
	public function delete()
	{
		$comment_id = $this->input->post('comment_id');
		$deleted    = $this->comments->delete($comment_id);

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
	 * Deletes multiple comments records
	 */
	public function delete_selected()
	{
		$where   = $this->input->post('ids');
		$deleted = $this->comments->delete_many($where);

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

// =========================== Bhavik ==================================//
}
