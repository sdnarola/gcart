<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('vendor_model', 'vendors');
		$this->load->model('deal_model', 'deals');
		$this->load->model('Slider_setting_model', 'sliders');
		$this->load->model('banner_model', 'banners');
	}

/**
 * [index to display products,sliders,tags,banners etc.]
 */

	public function index()
	{
		  $data['sliders']  = $this->sliders->get_all();
		  $data['banners']  = $this->banners->get_all();
		  $data['deals']    = $this->deals->get_all();
		  $data['main_categories']	 = $this->category->get_header_parent_category(); 
		  $data['sub_categories'] 	 = $this->category->get_sub_categories();
		  $data['all_new_products']  = $this->products->get_new_products(); //all new arrival products
		  $data['offer_products']    = $this->products->get_special_offers(); //special offer  products  
		  $data['tags']              = $this->products->get_tags();  //to get all tags
		  $data['sellers_products']  = $this->products->get_best_sellers();  
		  $data['featured_products'] = $this->products->get_featured_products();  
		  $data['special_deal']      =  $this->products->get_special_deal();

 		  $this->template->load('index', 'content', 'home', $data);
	}

	/**
	 * Loads the vendor store
	 */
	public function store($id)
	{
		$this->set_page_title(_l('store'));

		//pagination setup.
		$products_rows = $this->products->get_vendor_products($id);
		$start         = 0;
		$limit         = 4;
		$total_rows    = $products_rows;
		$config        = array();
		$url           = base_url().'home/store/'.$id.'/';
		$uri_segment   = 4;
		$config        = pagination($url, $total_rows, $limit, $uri_segment);
		$page_no       = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		if (!empty($page_no))
		{
			$start = ($page_no - 1) * $config['per_page'];
		}

		//get products per page.
		$this->products->limit($limit, $start);
		$data['products'] = $this->products->get_many_by('vendor_id', $id);

		//pagination link
		$data['link'] = $this->pagination->create_links();

		//vendor info
		$data['vendor']  = $this->vendors->get($id);
		$data['content'] = $this->load->view('themes/default/store', $data, TRUE);
		$this->load->view('themes/default/layouts/index', $data);
	}
}
