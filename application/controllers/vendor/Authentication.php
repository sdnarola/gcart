<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authentication extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication_model');
		$this->load->model('brand_model', 'brands');
		$this->load->model('vendor_model', 'vendors');
		$this->load->model('category_model', 'category');
		$this->load->model('cart_model', 'cart');
		$this->load->model('Tmp_order_data_model', 'tmp_order');
		$this->load->model('user_model', 'users');
	}

	/**
	 * Entry Point
	 * Call Login function
	 */
	public function index()
	{
		$this->vendor_login();
		//$this->signup();
	}

	/**
	 * Loads vendor login form & performs login
	 */
	public function vendor_login()
	{
		if (is_vendor_logged_in())
		{
			redirect(vendor_url());
		}

		$this->set_page_title(_l('login'));

		if ($this->input->post())
		{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember');

			$vendor = $this->Authentication_model->vendor_login($email, $password, $remember);

			if (is_array($vendor) && isset($vendor['vendor_inactive']))
			{
				set_alert('error', _l('your_account_is_not_active'));
				redirect(vendor_url('authentication'));
			}
			elseif (is_array($vendor) && isset($vendor['invalid_email']))
			{
				set_alert('error', _l('incorrect_email'));
				redirect(vendor_url('authentication'));
			}
			elseif (is_array($vendor) && isset($vendor['invalid_password']))
			{
				set_alert('error', _l('incorrect_password'));
				redirect(vendor_url('authentication'));
			}
			elseif ($vendor == false)
			{
				set_alert('error', _l('incorrect_email_or_password'));
				redirect(vendor_url('authentication'));
			}

			//If previous redirect URL is set in session, redirect to that URL
			maybe_redirect_to_previous_url();

			//Else rediret to vendor home page.
			redirect(vendor_url());
		}

		$data['content'] = $this->load->view('vendor/authentication/login_vendor', '', true);
		$this->load->view('vendor/authentication/index', $data);
	}

/**==========================================code by vixuti patel===========================================*/
/**
 * [signup vendors]
 * @return [type] [description]
 */
	public function signup()
	{
		if ($this->input->post())
		{
			$data = $this->input->post();
			if (empty($data['firstname']))
			{
				redirect(site_url('vendor/authentication/signup'));
			}

			$data['password'] = md5($data['password']);
			unset($data['confirm_password']);

			$data['sign_up_key'] = app_generate_hash();

			if ($this->vendors->insert($data))
			{
				$template = get_email_template('new-user-signup');
				$subject  = str_replace('{company_name}', get_settings('company_name'), $template['subject']);

				$message = get_settings('email_header');

				$find = [
					'{firstname}',
					'{lastname}',
					'{email_verification_url}',
					'{email_signature}',
					'{company_name}'
				];

				$replace = [
					$data['firstname'],
					$data['lastname'],
					site_url('vendor/authentication/verify_email/').$data['sign_up_key'],
					get_settings('email_signature'),
					get_settings('company_name')
				];

				$message .= str_replace($find, $replace, $template['message']);

				$message .= str_replace('{company_name}', get_settings('company_name'), get_settings('email_footer'));

				$sent = send_email($data['email'], $subject, $message);

				if ($sent)
				{
					set_alert('success', 'Your are registered successfully. Please check your email for account verification instructions.');
					redirect(site_url('vendor/authentication/signup'));
				}
			}
		}

		$this->set_page_title('Sign Up');
		$data['states'] = $this->users->get_states();
		$this->load->view('vendor/authentication/register', $data);
	}

/**
 * [verify_email description]
 * @param  string $sign_up_key [description]
 * @return [type]              [description]
 */
	public function verify_email($sign_up_key = '')
	{
		if ($sign_up_key == '')
		{
			redirect(site_url());
		}

		$success = $this->Authentication_model->verify_vendor_email($sign_up_key);

		if ($success == true)
		{
			set_alert('success', 'Your Email is verified. You can login now.');
		}
		else
		{
			set_alert('error', 'Some issue in verifying your email.');
		}

		redirect(site_url('vendor/authentication'));
	}

/*=================================================code end by vixuti pate=====================================*/

	/**
	 * Loads forgot password form & performs forgot password
	 */
	public function forgot_password()
	{
		$this->set_page_title(_l('forgot_password'));

		if (is_vendor_logged_in())
		{
			redirect(vendor_url());
		}

		if ($this->input->post())
		{
			$success = $this->Authentication_model->vendor_forgot_password($this->input->post('email'), true);

			if (is_array($success) && isset($success['vendor_inactive']))
			{
				set_alert('error', _l('your_account_is_not_active'));
			}
			elseif (is_array($success) && isset($success['invalid_vendor']))
			{
				set_alert('error', _l('incorrect_email'));
			}
			elseif ($success == true)
			{
				set_alert('success', _l('check_email_for_resetting_password'));
			}
			else
			{
				set_alert('error', _l('error_setting_new_password_key'));
			}

			redirect(vendor_url('authentication/forgot_password'));
		}

		$data['content'] = $this->load->view('vendor/authentication/forgot_password', '', true);
		$this->load->view('vendor/authentication/index', $data);
	}

	/**
	 * Loads reset password form & resets the password
	 *
	 * @param int  $vendor_id       The vendor identifier
	 * @param str  $new_pass_key  The new pass key
	 */
	public function reset_password($vendor_id = 0, $new_pass_key = '')
	{
		if (($vendor_id == 0) || ($new_pass_key == ''))
		{
			redirect(vendor_url());
		}

		$this->set_page_title(_l('reset_password'));

		if (!$this->Authentication_model->vendor_can_reset_password($vendor_id, $new_pass_key))
		{
			set_alert('error', _l('password_reset_key_expired'));
			redirect(vendor_url('authentication'));
		}

		if ($this->input->post())
		{
			$success = $this->Authentication_model->vendor_reset_password($vendor_id, $new_pass_key, $this->input->post('password'));

			if (is_array($success) && $success['expired'] == true)
			{
				set_alert('error', _l('password_reset_key_expired'));
			}
			elseif ($success == true)
			{
				set_alert('success', _l('password_reset_message'));
			}
			else
			{
				set_alert('error', _l('new_password_is_same_as_old_password'));
				redirect(site_url($this->uri->uri_string()));
			}

			redirect(vendor_url('authentication'));
		}

		$data['content'] = $this->load->view('vendor/authentication/reset_password', '', true);
		$this->load->view('vendor/authentication/index', $data);
	}

	/**
	 * Checks if vendor with provided email id exists or not
	 */
	public function email_exists()
	{
		$exists = $this->vendors->count_by('email', $this->input->post('email'));
		echo $exists;
	}

	/**
	 * Does logout
	 */
	public function logout()
	{
		$this->Authentication_model->logout();
		redirect(vendor_url('authentication'));
	}

	/**
	 * Does auto logout
	 */
	public function autologout()
	{
		if (get_cookie('autologin', true)) //If vendor has set REMEMBER ME
		{
			redirect($this->agent->referrer()); //redirect to the same page from where autologin is called.
		}

		$this->logout();
	}
}
