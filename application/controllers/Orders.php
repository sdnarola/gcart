<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Frontend_Controller
{
// =========================== vixuti patel ==================================//
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
 */
	public function index()
	{
		$this->set_page_title(_l('orders'));

		$user_id          = get_loggedin_user_id();
		$where['user_id'] = $user_id;
		$order_id         = array();
		$data['orders']   = $this->db->get_where('orders', $where)->result_array();
		foreach ($data['orders'] as $order)
		{
			$order_id[] = $order['id'];
		}

		$data['order_items'] = $this->orders->get_items(null, null, $order_id);

		$this->template->load('index', 'content', 'orders/index', $data);
	}

	/**
	 * [details (get order details)]
	 * @param  string $id [order id]
	 */
	public function details($id = '')
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
	 * [invoice (to get invoice details of order)]
	 * @param  string $id        [order id]
	 * @param  string $vendor_id [vendor id]
	 */
	public function invoice($id = '', $vendor_id = '')
	{
		$this->set_page_title(_l('invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id, $vendor_id);
		$this->template->load('index', 'content', 'orders/invoice', $data);
	}

	/**
	 * [print_pdf description]
	 * @param  string $id        [order id]
	 * @param  string $vendor_id [vendor id]
	 */
	public function print_pdf($id = '', $vendor_id = '')
	{
		$this->load->library('pdf');
		$this->set_page_title(_l('invoice'));
		$data['order']       = $this->orders->get($id);
		$data['order_items'] = $this->orders->get_items($id, $vendor_id);

		$html = $this->pdf->load_view('themes/default/orders/invoice', $data);
		$this->pdf->render();
		$output = $this->pdf->output();

		$this->pdf->stream("'invoice'.pdf", array('Attachment' => 0));
	}

// =========================== END vixuti patel ==================================//

// ============================================ WORK BY KOMAl =================================================================================================

	/**
	 * [place_order description]
	 * @return about place order data
	 */
	public function place_order()
	{
		$where['user_id'] = $this->session->userdata('user_id');

		$order_where['user_id'] = $this->session->userdata('user_id');
		$cart_amount            = $this->cart->count_cart_total_amount_for_confirm_order($order_where);

		if ($cart_amount == 0)
		{
			redirect(site_url());
		}
		else
		{
			$this->calculate_order_amount($this->session->userdata('user_id'));

			$cart_data                  = $this->cart->get_cart_data($where);
			$this->data['Product_data'] = '';

			if (!empty($cart_data))
			{
				$products_id                = get_products_id_foreach($cart_data);
				$cart_where['cart.user_id'] = $where['user_id'];
				$this->data['Product_data'] = $this->cart->get_cart_products_detail($cart_where, $products_id);
			}

			$users_where['users_id']     = $this->session->userdata('user_id');
			$this->data['users_address'] = $this->users_address->get_many_by($users_where);

			$this->template->load('index', 'content', 'orders/place_order', $this->data);
		}
	}

	/**
	 * [calculate_order_amount description]
	 * @param  [type] $user_id [user primary key]
	 * @return calculate amount by coupon , sub amount
	 */
	public function calculate_order_amount($user_id)
	{
		$where['cart.user_id'] = $user_id;
		$total_amount          = $this->cart->count_cart_total_amount_for_confirm_order($where);
		$coupon_amount         = '';
		$grand_total_amount    = '';
		$tmp_order_data        = $this->tmp_order->get_by(array('user_id' => $user_id));
		$coupone_data          = $this->coupons->get_by(array('id' => $tmp_order_data['coupon_id'], 'start_date <' => date('Y-m-d h:i:s'), 'end_date >' => date('Y-m-d h:i:s')));

		if (!empty($coupone_data))
		{
			if ($coupone_data['quantity'] > $coupone_data['used'])
			{
				if ($coupone_data['type'] == 1)
				{
					$coupon_amount      = floor(($total_amount * $coupone_data['amount']) / 100);
					$grand_total_amount = floor($total_amount - $coupon_amount);
				}
				elseif ($coupone_data['type'] == 0)
				{
					$coupon_amount      = $coupone_data['amount'];
					$grand_total_amount = $total_amount - $coupon_amount;
				}
			}
		}

		$this->data['coupone_used']       = $coupone_data['used'];
		$this->data['coupon_id']          = $coupone_data['id'];
		$this->data['coupon_amount']      = $coupon_amount;
		$this->data['grand_total_amount'] = (empty($grand_total_amount)) ? $total_amount : $grand_total_amount;
		$this->data['total_amount']       = $total_amount;
	}

	/**
	 * [confirm_order_successfully description]
	 *
	 */
	public function confirm_order_successfully()
	{
		$product_id    = array();
		$products_data = array();
		$user_id       = $this->session->userdata('user_id');
		$this->calculate_order_amount($user_id);
		$cart_where['user_id']                = $user_id;
		$cart_count_row_where['cart.user_id'] = $user_id;

		$order_data['user_id']        = $user_id;
		$order_data['grand_total']    = $this->data['grand_total_amount'];
		$order_data['order_number']   = rand(7, 100000000);
		$order_data['invoice_number'] = rand(7, 100000000);
		$order_data['total_products'] = $this->cart->count_cart_row_for_confirm_order($cart_count_row_where);
		$order_data['order_date']     = date('Y-m-d h:i:s');
		$order_data['order_status']   = 0;
		$order_data['payment_method'] = 'cash on delivery';
		$order_data['payment_status'] = 0;
		$order_data['coupon_id']      = $this->data['coupon_id'];
		$order_date                   = date('l,F d,Y');
		$cart                         = $this->cart->get_cart_data($cart_where);

		if (!empty($order_data['total_products']))
		{
			$result = $this->order->insert($order_data);

			if ($result)
			{
				$this->tmp_order->delete_by(array('user_id' => $user_id));

				$coupone_used['used'] = $this->data['coupone_used'] + 1;

				$this->coupons->update($this->data['coupon_id'], $coupone_used, FALSE);

				foreach ($cart as $key => $cart_data)
				{
					if ($cart_data['quantity'] <= get_products_info($cart_data['product_id'], 'quantity'))
					{
						$order                            = $this->order->get_by(array('order_number' => $order_data['order_number']));
						$order_item_data['order_id']      = $order['id'];
						$order_item_data['product_id']    = $cart_data['product_id'];
						$order_item_data['vendor_status'] = 0;
						$order_item_data['quantity']      = $cart_data['quantity'];
						$order_item_data['total_amount']  = $cart_data['total_amount'];

						$products_qty      = get_products_info($cart_data['product_id'], 'quantity');
						$products_slug     = get_products_info($cart_data['product_id'], 'slug');
						$products_image    = get_products_info($cart_data['product_id'], 'thumb_image');
						$products_name     = ucwords(get_products_info($cart_data['product_id'], 'name'));
						$vendor_id         = get_products_info($cart_data['product_id'], 'vendor_id');
						$vendor_shope_name = ucwords(get_vendor_info($vendor_id, 'shop_name'));

						$update_product_qty['quantity'] = $products_qty - $cart_data['quantity'];
						$this->products->update($cart_data['product_id'], $update_product_qty, FALSE);

						$result_order_item = $this->order->add_order_item_data($order_item_data);

						$products_data[] = "<table cellpadding='0' cellspacing='0' border='0' ><tbody><tr style='margin-top:40px; margin-bottom: 20px;padding-bottom: 20px;' width='100%'><td valign='top' align='left' width='20%'><a href='".site_url('Products/'.$products_slug.'')."'><img width='100px'src='".base_url().$products_image."' ></a></td><td valign='top' width='60%'' align='left' style='font-size:16px;line-height:18px;border:1px black'><a href='' style='text-decoration: none;''><span style='font-size:17px;line-height:18px;color:#0549A2 ;'><a href='".site_url('Products/'.$products_slug.'')."' style='text-decoration: none;''>".$products_name."</a></span></a><br><span style='font-size:14px;line-height:18px;color:#888888'>Qty :".$cart_data['quantity']."</span><br><span style='font-size:14px;line-height:18px;color:#888888'>Sold by :".$vendor_shope_name."</span></td><td valign='top' style='text-align: right;'><b>&#x20B9;".$cart_data['total_amount'].'</b></td></tr></tbody></table ><br>';

						if ($result_order_item)
						{
							$this->cart->delete_by(array('user_id' => $user_id, 'product_id' => $cart_data['product_id']));
						}
					}
				}

				$products_data = implode(' ', $products_data);

				$shipping_amount = 0.00;
				$template        = get_email_template('confirm-order');
				$subject         = str_replace('{company_name}', get_settings('company_name'), $template['subject']);
				$message         = get_settings('email_header');

				$message_find = [
					'{company_name}',
					'{firstname}',
					'{frist_date}',
					'{second_date}',
					'{house_no}',
					'{societyname}',
					'{landmark}',
					'{city}',
					'{state}',
					'{pincode}',
					'{order_number}',
					'{order_date}',
					'{products_data}',
					'{sub_total}',
					'{shipping_amount}',
					'{coupon_amount}',
					'{grand_total}',
					'{email_signature}'

				];

				$coupon_amount = (empty($this->data['coupon_amount'])) ? number_format(0, 2, '.', '') : number_format($this->data['coupon_amount'], 2, '.', '');
				$user_address  = get_user_address_info($user_id);

				$message_replace = [
					get_settings('company_name'),
					get_user_info($user_id, 'firstname'),
					date('l,F d', strtotime('5 days', strtotime($order_data['order_date']))),
					date('l,F d', strtotime('6 days', strtotime($order_data['order_date']))),
					$user_address['house_or_village'],
					ucwords($user_address['street_or_society']),
					ucwords($user_address['landmark']),
					ucwords(get_city_name($user_address['city_id'], 'name')),
					ucwords(get_state_name($user_address['state_id'], 'name')),
					$user_address['pincode'],
					$order_data['order_number'],
					$order_date,
					$products_data,
					$this->data['total_amount'],
					number_format($shipping_amount, 2, '.', ''),
					$coupon_amount,
					number_format($this->data['grand_total_amount'], 2, '.', ''),
					get_settings('email_signature')

				];

				$message .= str_replace($message_find, $message_replace, $template['message']);

				$message .= str_replace('{company_name}', get_settings('company_name'), get_settings('email_footer'));

				$sent = send_email(get_user_info($user_id, 'email'), $subject, $message);
				$this->template->load('index', 'content', 'orders/confirm_order_successfully');
			}
		}
		else
		{
			redirect(site_url());
		}
	}

	// ============================================ END WORK BY KOMAl =========================================================================================
}
