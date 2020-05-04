<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Frontend_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model', 'orders');
		if (!is_user_logged_in())
		{
			redirect(site_url('authentication'));
		}
	}
/**
 * [index to display orders]
 * @return [type] [description]
 */
	public function index()
	 {	
		$this->set_page_title(_l('orders'));

		$user_id=get_loggedin_user_id();
		//$user_id=70;
		$where['user_id']=$user_id;
		$order_id=array();
		$data['orders']  = $this->db->get_where('orders',$where)->result_array();
		foreach ($data['orders'] as $order)
		{
			$order_id[]=$order['id'];

		}
		$data['order_items'] = $this->orders->get_items(null,null,$order_id);

		$this->template->load('index', 'content', 'orders/index', $data);

	}

	/**
	 * Get Order details
	 *
	 * @param  int 		$id 	The order id.
	 */
	public function details($id='')
	{
		$this->set_page_title(_l('order_details'));
		
		if ($id)
		{
			$data['order']       = $this->orders->get($id);
			$data['order_items'] = $this->orders->get_items($id);

		$this->template->load('index', 'content', 'orders/details', $data);

		}
		else
		{
			redirect('orders');
		}
	}

	/**
	 * Get invoice details of Order.
	 *
	 * @param  int 		$id 	id of order.
	 */
	public function invoice($id = '',$vendor_id='')
	{
		
		$this->set_page_title(_l('invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id,$vendor_id);
		$this->template->load('index', 'content', 'orders/invoice', $data);

	}
	
	 /**
	  * [print_pdf description]
	  * @param  string $id        [description]
	  * @param  string $vendor_id [description]
	  * @return [type]            [description]
	  */
	 public function print_pdf($id='',$vendor_id='')
	 {
	 	$this->load->library('pdf');	
	  	$this->set_page_title(_l('invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id,$vendor_id);
	  
	   $html=$this->pdf->load_view('themes/default/orders/invoice',$data);
	   $this->pdf->render();
	   $output = $this->pdf->output();

	   file_put_contents("invoice.pdf", $output);
	   $this->pdf->stream("'invoice'.pdf", array("Attachment"=>0));
	  // $dompdf->stream("'invoice'.pdf");

	}

// =========================== vixuti patel ==================================//
}
