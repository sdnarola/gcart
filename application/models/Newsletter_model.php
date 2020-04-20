<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_model extends MY_Model
{
		
	/**
	 * @var string
	 */
	protected $_table = 'news_letters';
	
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

	}
}
