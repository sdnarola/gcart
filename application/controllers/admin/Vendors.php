<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('vendor_model', 'vendors');
		$this->load->model('product_model', 'products');
		$this->load->model('settings_model', 'settings');
		$this->load->model('subscriptions_model', 'subscriptions');
		$this->load->model('user_model', 'users');
	}

	/**
	 * Loads the list of vendors.
	 */
	public function index()
	{
		$this->set_page_title(_l('vendors'));

		$data['vendors']      = $this->vendors->get_all();
		$data['registration'] = $this->settings->get_by('name', 'vendors_registration');
		$data['content']      = $this->load->view('admin/vendors/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Deletes the single vendor record
	 */
	public function delete()
	{
		$vendor_id    = $this->input->post('vendor_id');
		$vendor       = $this->vendors->get($vendor_id);
		$imagepath    = $vendor['profile_image'];
		$newpath      = 'assets/uploads/vendors/profile/deleted/'.basename($imagepath);
		$logopath     = $vendor['logo'];
		$new_logopath = 'assets/uploads/vendors/logo/deleted/'.basename($logopath);

		if (basename($imagepath) != 'default_img.png')
		{
			$copied = copy($imagepath, $newpath);
			unlink($imagepath);
		}

		if (basename($logopath) != 'default_logo.png')
		{
			$copied = copy($logopath, $new_logopath);
			unlink($logopath);
		}

		$deleted = $this->vendors->delete($vendor_id);

		if ($deleted)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Deletes multiple vendors records
	 */
	public function delete_multiple()
	{
		$where = $this->input->post('ids');

		$data = $this->vendors->get_many($where);

		foreach ($data as $record)
		{
			$imagepath    = $record['profile_image'];
			$newpath      = 'assets/uploads/vendors/profile/deleted/'.basename($imagepath);
			$logopath     = $record['logo'];
			$new_logopath = 'assets/uploads/vendors/logo/deleted/'.basename($logopath);

			if (basename($imagepath) != 'default_img.png')
			{
				$copied = copy($imagepath, $newpath);
				unlink($imagepath);
			}

			if (basename($logopath) != 'default_logo.png')
			{
				$copied = copy($logopath, $new_logopath);
				unlink($logopath);
			}
		}

		$deleted = $this->vendors->delete_many($where);

		if ($deleted)
		{
			$ids = implode(',', $where);
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Updates the vendor record
	 *
	 * @param int  $id  The vendor id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('vendors').' | '._l('edit'));

		if ($this->input->post())
		{
			$data              = $this->input->post();
			$data['is_active'] = ($this->input->post('is_active')) ? 1 : 0;

			$update = $this->vendors->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('vendor')));
				redirect('admin/vendors');
			}
		}
		else
		{
			$data['vendor']  = $this->vendors->get($id);
			$data['states']  = $this->users->get_states();
			$data['content'] = $this->load->view('admin/vendors/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * contains details of vendor
	 *
	 * @param      <int>  $id     The vendor id
	 */
	public function details($id)
	{
		$this->set_page_title(_l('vendors').' | '._l('details'));

		$data['vendor'] = $this->vendors->get($id);
		$this->products->order_by('name', 'ASC');
		$data['records'] = $this->products->get_products($id);
		$data['content'] = $this->load->view('admin/vendors/details', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Toggles the vendor status to Active or Inactive
	 */
	public function update_status()
	{
		$vendor_id = $this->input->post('vendor_id');
		$data      = array('is_active' => $this->input->post('is_active'));

		$update = $this->vendors->update($vendor_id, $data);

		if ($update)
		{
			if ($this->input->post('is_active') == 1)
			{
				echo 'true';
			}
			else
			{
				echo 'false';
			}
		}
	}

	/**
	 * Toggles the vendor registration status to Active or De-active
	 */
	public function registration_status()
	{
		$data  = array('value' => $this->input->post('value1'));
		$where = array('name' => 'vendors_registration');

		$update = $this->settings->update_by($where, $data);

		if ($update)
		{
			if ($this->input->post('value1') == 1)
			{
				echo 'true';
			}
			else
			{
				echo 'false';
			}
		}
	}

	/**
	 * { display list of vendors whoes subscription is expired }
	 */
	public function pending_list()
	{
		$this->set_page_title(_l('vendors').' | '._l('pending').' '._l('subscription'));

		$vendor_list = [];
		$vendors     = $this->vendors->get_all();

		foreach ($vendors as $vendor)
		{
			$expired = expire_subscription($vendor['id']);

			if ($expired)
			{
				$vendor_list[] = get_vendor_info($vendor['id']);
			}
		}

		if ($vendor_list)
		{
			$data['vendors'] = $vendor_list;
		}
		else
		{
			$data['vendors'] = ' ';
		}

		$data['content'] = $this->load->view('admin/vendors/pending_subscription', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * { send emails to vendors whom subscription is pending }
	 */
	public function mail_renew_subscription()
	{
		$ids = $this->input->post('ids');

		if ($ids)
		{
			$template = get_email_template('renew-subscription-plan');
			$subject  = str_replace('{company_name}', get_settings('company_name'), $template['subject']);
			$message  = get_settings('email_header');

			foreach ($ids as $id)
			{
				$vendor  = get_vendor_info($id);
				$expired = expire_subscription($id);
				$key     = md5($vendor['mobile'] + $vendor['id']);
				$url     = site_url('vendor/profile/renew_paln_link/').$vendor['id'].'/'.$key;

				$find = [
					'{firstname}',
					'{lastname}',
					'{url}',
					'{email_signature}',
					'{company_name}',
					'{expired_date}'
				];

				$replace = [
					$vendor['firstname'],
					$vendor['lastname'],
					$url,
					get_settings('email_signature'),
					get_settings('company_name'),
					$expired
				];

				$message .= str_replace($find, $replace, $template['message']);
				$message .= str_replace('{company_name}', get_settings('company_name'), get_settings('email_footer'));
				$sent = send_email($vendor['email'], $subject, $message);

				if ($sent)
				{
					$result[] = 'true';
				}
				else
				{
					$result[] = 'false';
				}
			}

			foreach ($result as $value)
			{
				if ($value == 'false')
				{
					echo 'false';
				}
			}

			echo 'true';
		}
	}
}
