<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_us_model', 'contact');

	}

	public function index()
	{
		$this->template->load('index', 'content', 'contact');
	}
	/**
	 * [Contact_us (to Insert contacted user data)]
	 * @return [type] [success message if $insert true]
	 */
	public function contact_us()
	{
		if($this->input->post())
		{
			$data   = $this->input->post();
			$insert = $this->contact->insert($data);
			if($insert)
			{
				set_alert('success', 'Thanks! Details submitted. ');
			}
		}
	
	 redirect('contact');
	}
}