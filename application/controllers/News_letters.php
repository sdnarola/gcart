<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_letters extends Frontend_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('newsletter_model', 'news_letters');

	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$email = $this->input->post('email');
		
		$data = array(
			'email' => $this->input->post('email')
		);

		if(!empty($email))
		{
		$inserts = $this->news_letters->insert($data);
	    }
		if ($inserts)
		{
			set_alert('success', 'Your are subscription successfully. ');		
		}
		else
		{
		 log_activity("User trying to subscribe  In [Email: $email]");
		}
		//echo json_encode($email);
		redirect(); 

	}
	/*
	 * Checks if user with provided email id exists or not
	 * @return [type] [description]
	 */
	public function email_exists()
	{
		$exists = $this->news_letters->count_by('email', $this->input->post('email'));
		echo $exists;
	}

}
