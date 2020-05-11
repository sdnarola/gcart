<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =========================== Bhavik ==================================//

class Orders extends Admin_Controller
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
		$data['orders']  = $this->orders->get_all();
		$data['content'] = $this->load->view('admin/orders/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Get Order details
	 *
	 * @param  int 		$id 	The order id.
	 */
	public function details($id)
	{
		$this->set_page_title(_l('order_details'));

		if ($id)
		{
			$data['order']       = $this->orders->get($id);
			$data['order_items'] = $this->orders->get_items($id);
			$data['content']     = $this->load->view('admin/orders/details', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
		else
		{
			redirect('admin/orders');
		}
	}

	/**
	 * Updates the order status
	 *
	 * @param int  $id  The order id
	 */
	public function update_status($id)
	{
		$data   = $this->input->post();
		$update = $this->orders->update($id, $data);

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
	 * Updates the payment status
	 *
	 * @param int  $id  The order id
	 */
	public function update_payment_status($id)
	{
		$data   = $this->input->post();
		$update = $this->orders->update($id, $data);

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
	 * Updates the vendor status
	 *
	 * @param int  $id  The order id
	 */
	public function update_vendor_status($id)
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
	 * Get invoice details of Order.
	 *
	 * @param  int 		$id 	id of order.
	 */
	public function invoice($id = '')
	{
		$this->set_page_title(_l('invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id);

		$data['content'] = $this->load->view('admin/orders/invoice', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	public function print_invoice($id = '')
	{
		$this->load->library('pdf');

		$this->set_page_title(_l('print_invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id);
		// $this->load->view('admin/orders/print_invoice', $data);

		$this->pdf->load_view('admin/orders/print_invoice', $data);
		$this->pdf->render();
		$this->pdf->stream('invoice.pdf', array('Attachment' => 0));
	}

// =========================== Bhavik ==================================//
}
