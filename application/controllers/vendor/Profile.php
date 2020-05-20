<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('vendor_model', 'vendors');
		$this->load->model('subscriptions_model', 'subscriptions');
	}

// =========================== Bhavik ==================================//

	/**
	 * Updates vendor's personal profile details.
	 */
	public function edit()
	{
		$this->set_page_title(_l('edit_profile'));
		$id = $this->session->userdata('vendor_id');

		if ($id)
		{
			$data['vendor']  = $this->vendors->get($id);
			$data['cities']  =
			$data['content'] = $this->load->view('vendor/profile/edit', $data, TRUE);
			$this->load->view('vendor/layouts/index', $data);
		}

		if ($this->input->post())
		{
			$data = $this->input->post();

			if ($_FILES['profile_image']['name'] != null)
			{
				$config['upload_path']   = 'assets/uploads/vendors/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = 10000;
				$config['file_name']     = time().'-'.$_FILES['profile_image']['name'];

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('profile_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					set_alert('danger', ucwords($error['error']));
					redirect('vendor/dashboard/store');
				}

				$UploadData            = $this->upload->data();
				$data['profile_image'] = $config['upload_path'].$UploadData['file_name'];

				$profile_image = get_vendor_info($id, 'profile_image');
				unlink($profile_image);
			}

			$update = $this->vendors->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('profile')));
				redirect('vendor/profile/edit');
			}
		}
	}

// =========================== Bhavik ==================================//

//=====================================================maitri==================================================

/**
 * { for re-new update vendors plan and subscription date }
 *
 * @param      integer  $id     The vendor identifier
 * @param      <type>   $key    The key  for security
 */
	public function renew_paln_link($id, $key)
	{
		$this->set_page_title(_l('vendors').' | '._l('subscription'));

		if ($this->input->post())
		{
			$plan                    = $this->input->post();
			$data['subscription_id'] = $plan['plan_id'];
			$data['subscribe_date']  = date('Y-m-d H:i:s');

			$update = $this->vendors->update($plan['vendor_id'], $data);

			if ($update)
			{
				echo 'your data updated sucessfully';
			}
			else
			{
				echo 'somthing wrong during update';
			}
		}
		else
		{
			$data['vendor'] = get_vendor_info($id);
			$key_check      = md5($id + $data['vendor']['mobile']);

			if ($key == $key_check)
			{
				$data['plans'] = $this->subscriptions->get_all();
				$this->load->view('vendor/profile/renew_subscription_plan', $data);
			}
			else
			{
				echo 'your website is not secure';
			}
		}
	}

//=====================================================maitri==================================================
}
