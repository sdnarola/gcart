<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends MY_Model
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
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAL =====================================================================================================
	/**

	 * [get_category_by_slug description]
	 * @param  string $slug [category slug]
	 *
	 * @return [array]
	 */
	public function get_category_by_banner($slug = '')
	{
		if (empty($slug))
		{
			return false;
		}
		else
		{
			$this->db->select('categories.*,banners.title,banners.sub_title,banners.description,banners.banner');
			$this->db->from('categories');
			$this->db->join('banners', 'banners.id=categories.banner_id');
			$this->db->where('categories.slug', $slug);
			$query  = $this->db->get();
			$result = $query->row_array();

			if (empty($result))
			{
				return false;
			}
			else
			{
				return $result;
			}
		}
	}
// ============================================ END WORK BY KOMAL =====================================================================================================
}
