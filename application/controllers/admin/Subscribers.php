<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('subscriber_model', 'subscribers');
	}

	/**
	 * Loads the list of subscribers.
	 */
	public function index()
	{
		$this->set_page_title(_l('subscribers'));

		$data['subscribers']   = $this->subscribers->get_all();
		$data['content'] = $this->load->view('admin/subscribers/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

}
