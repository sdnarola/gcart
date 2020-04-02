<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{		
		$this->template->load('index', 'content', 'home');
	}
	
}
