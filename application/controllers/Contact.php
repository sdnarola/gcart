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
			$contact_data= array(
				'name'    => $this->input->post('name'),
				'email'   =>  $this->input->post('email'),
				'title'   =>  $this->input->post('title'),
				'comments' =>  $this->input->post('comments'),
				);
			$insert = $this->contact->insert($contact_data);
			if($insert)
			{
				set_alert('success', 'Thanks! Details submitted. ');
			}
		}
	
	redirect('contact');
	}
}