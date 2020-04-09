<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber_model extends MY_Model
{
	/**
	 * @var boolean
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * Constructor for the class
	 */
	protected $_table = 'news_letters';
	public function __construct()
	{

		parent::__construct();
	}
}
