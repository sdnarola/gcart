<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_category_model extends MY_Model
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
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *  delete sub_categories while main category delete 
	 *
	 * @param      <int>  $category_id  The category identifier
	 *
	 * @return     <bool>  ( true if delete successfully else false )
	 */
	public function delete_sub_categories($category_id)
	{
		$this->primary_key = 'category_id';
		$delete = $this->delete($category_id);

		return $delete;
	}

	/**
	 * delete sub_categories while multiple main categories delete 
	 *
	 * @param      <int>  $category_id  The category identifier
	 *
	 * @return     <bool>  ( true if delete successfully else false )
	 */
	public function multi_delete_sub_categories($category_id)
	{
		$this->primary_key = 'category_id';
		$delete = $this->delete_many($category_id);

		return $delete;
	}
}
