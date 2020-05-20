<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_us extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('about_us_model', 'about');

	}

	public function index()
	{
		$this->template->load('index', 'content', 'about_us');
	}
	
}