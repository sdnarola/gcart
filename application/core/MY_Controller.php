<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for entire application
 */
class MY_Controller extends CI_Controller
{
	/**
	 * Page Title to be set for each page which will be shown in Browser Tab using <title> tag
	 */
	public $page_title;
	protected $data = array();

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->lang->load('english');
// <<<<<<< HEAD
		$this->load->library('pagination');

// =======

// 		$this->load->model('category_model', 'category');
		// >>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
	}

	/**
	 * Set the page title.
	 * @param str $page_title The title to be set.
	 *
	 * @return str  The page title.
	 */
	public function set_page_title($page_title)
	{
		if (strpos(current_full_url(), '/admin') == true)
		{
			$this->page_title = get_settings('company_name').' | Admin Panel | '.$page_title;
		}
		elseif (strpos(current_full_url(), '/vendor') == true)
		{
			$this->page_title = get_settings('company_name').' | Vendor Panel | '.$page_title;
		}
		else
		{
			$this->page_title = get_settings('company_name').' | '.$page_title;
		}
	}

	protected function init_pagination($url, $total_rows, $per_page, $uri_segment)
	{
		$config                     = array();
		$config['base_url']         = $url;
		$config['total_rows']       = $total_rows;
		$config['per_page']         = $per_page;
		$config['uri_segment']      = $uri_segment;
		$config['num_links']        = 1;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open']    = '<ul class="list-inline list-unstyled">';
		$config['full_tag_close']   = '</ul>';
		$config['first_link']       = '&lt;&lt';
		$config['first_tag_open']   = '<li class="prev">';
		$config['first_tag_close']  = '</li>';
		$config['last_link']        = '&gt;&gt';
		$config['last_tag_open']    = '<li class="prev">';
		$config['last_tag_close']   = '</li>';
		$config['next_link']        = '&gt;';
		$config['next_tag_open']    = '<li class="prev">';
		$config['next_tag_close']   = '</li>';
		$config['prev_link']        = '&lt';
		$config['prev_tag_open']    = '<li class="prev">';
		$config['prev_tag_close']   = '</li>';
		$config['cur_tag_open']     = '<li class="active btn-info"><a href="" class="pagination_link" >';
		$config['cur_tag_close']    = '</a></li>';
		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';

		$this->pagination->initialize($config);

		return $config;
	}
}
