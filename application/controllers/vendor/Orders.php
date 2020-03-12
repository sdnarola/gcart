<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =========================== Bhavik ==================================//

class Orders extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model', 'orders');
	}

	public function index()
	{
		$this->set_page_title(_l('orders'));
		$vendor_id       = $this->session->userdata('vendor_id');
		$data['orders']  = $this->orders->get_orders($vendor_id);
		$data['content'] = $this->load->view('vendor/orders/index', $data, TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

	/**
	 * Updates the vendor status
	 *
	 * @param int  $id  The order id
	 */
	public function update_status($id)
	{
		$data   = $this->input->post();
		$update = $this->orders->update_status($id, $data);

		if ($update)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Get Order details
	 *
	 * @param  int 		$id 	The order id.
	 */
	public function details($id = '')
	{
		if ($id)
		{
			$vendor_id = $this->session->userdata('vendor_id');

			$data['order']       = $this->orders->get_orders($vendor_id, $id);
			$data['order_items'] = $this->orders->get_items($id, $vendor_id);

			$data['content'] = $this->load->view('vendor/orders/details', $data, TRUE);
			$this->load->view('vendor/layouts/index', $data);
		}
		else
		{
			redirect('vendor/orders');
		}
	}

	/**
	 * Get invoice of Order.
	 *
	 * @param  int 		$id 	id of order.
	 */
	public function invoice($id = '')
	{
		$vendor_id = $this->session->userdata('vendor_id');

		$data['order']       = $this->orders->get_orders($vendor_id, $id);
		$data['order_items'] = $this->orders->get_items($id, $vendor_id);

		$data['content'] = $this->load->view('vendor/orders/invoice', $data, TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

// =========================== Bhavik ==================================//
}
