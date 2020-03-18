<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('review_model', 'reviews');
	}

// =========================== Bhavik ==================================//
	/**
	 * Gets product's reviews information.
	 */
	public function index()
	{
		$this->set_page_title(_l('reviews'));
		$id              = $this->session->userdata('vendor_id');
		$data['reviews'] = $this->reviews->get_product_reviews($id);
		$data['content'] = $this->load->view('vendor/reviews/index', $data, TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

	/**
	 * Delete the single review record
	 */
	public function delete()
	{
		$review_id = $this->input->post('review_id');
		$deleted   = $this->reviews->delete($review_id);

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
	 * Deletes multiple reviews records
	 */
	public function delete_selected()
	{
		$where   = $this->input->post('ids');
		$deleted = $this->reviews->delete_many($where);

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
