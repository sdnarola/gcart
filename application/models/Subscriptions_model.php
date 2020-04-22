<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriptions_model extends MY_Model {
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
	public function __construct() 
	{
		parent::__construct();
	}

/**
 * Gets all the subscriptions either is_delete=0 ot 1.
 *
 * @param      <int>  $id     The identifier
 *
 * @return     <array>  ( returns all the subscriptions either is_delete=0 ot 1)
 */
	public function get_($id)
	{
		$this->soft_delete = FALSE;

		$subs = $this->get($id);
		return $subs;
	}
}