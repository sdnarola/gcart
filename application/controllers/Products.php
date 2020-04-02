<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		
		
	}
	/***==========================================================code by vixuti patel===========================================================***
	/**
	 * [get_new_arrivals description]
	 * @return [json] [new_poducts and riviews of all new products]
	 */
	public function get_new_arrivals()
	{		
		$category_id= $this->input->post('category_id'); 
		$data['reviews']=$this->product->get_all_reviews();
		$data['new_products']=$this->product->get_new_products($category_id);

 	    echo json_encode($data); 
	} 
	public function get_product()
	{
		
	}
	/***=======================================================code end by vixuti patel========================================================**/
}