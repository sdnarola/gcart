<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends MY_Model
{
	/**
	 * @var mixed
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * @var string
	 */
	protected $_table = 'wishlist';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}
}
