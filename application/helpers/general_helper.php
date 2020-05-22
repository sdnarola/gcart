<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Checks if admin is logged in or not
 * @return boolean
 */
function is_admin_logged_in()
{
	if (get_instance()->session->has_userdata('user_logged_in') && get_instance()->session->userdata('is_admin') == 1)
	{
		return get_user_info(get_instance()->session->userdata('user_id'), 'is_active');
	}

	return false;
}

// =========================== Bhavik ==================================//

/**
 * Checks if vendor is logged in or not
 * @return boolean
 */
function is_vendor_logged_in()
{
	if (get_instance()->session->has_userdata('vendor_logged_in'))
	{
		return get_vendor_info(get_instance()->session->userdata('vendor_id'), 'is_active');
	}

	return false;
}

// =========================== Bhavik ==================================//

/**
 * Checks if user is logged in or not
 * @return boolean
 */
function is_user_logged_in()
{
	if (get_instance()->session->has_userdata('user_logged_in'))
	{
		return get_user_info(get_instance()->session->userdata('user_id'), 'is_active');
	}

	return false;
}

/**
 * Redirects to approprirate URL after login instead of Dashboard all the time.
 */
function redirect_after_login_to_current_url()
{
	$CI         = &get_instance();
	$redirectTo = current_full_url();

	$CI->session->set_userdata(['redirect_url' => $redirectTo]);
}

/**
 * Checks if user accessed some url while not logged in.
 * Sets it to redirect URL so that user can be redirected to it after login
 * @return null
 */
function maybe_redirect_to_previous_url()
{
	$CI = &get_instance();

	if ($CI->session->has_userdata('redirect_url'))
	{
		$red_url = $CI->session->userdata('redirect_url');

		$CI->session->unset_userdata('redirect_url');
		redirect($red_url);
	}
}

/**
 * Get current url with query vars
 * @return string
 */
function current_full_url()
{
	$CI  = &get_instance();
	$url = $CI->config->site_url($CI->uri->uri_string());

	return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
}

/**
 * Translates the string to the current selected language.
 *
 * @param  str  $line   The key for the string
 * @param  str  $label  (optional)The sub string if there is any
 *
 * @return str  The translated string
 */
function _l($line, $label = '')
{
	$CI = &get_instance();

	$output = $CI->lang->line($line);

	if ($label != '')
	{
		$output = str_replace('%s', $label, $output);
	}

	return $output;
}

/**
 * Translates & prints the string to the current selected language.
 *
 * @param  str  $line   The key for the string
 * @param  str  $label  (optional)The sub string if there is any
 *
 * @return str  The translated string
 */
function _el($line, $label = '')
{
	$CI = &get_instance();

	$output = $CI->lang->line($line);

	if ($label != '')
	{
		$output = str_replace('%s', $label, $output);
	}

	echo $output;
}

/**
 * Gets the settings value for the passed key.
 * Returns all the settings values of no key is passed.
 *
 * @param  str  $name  The key of the settings
 *
 * @return str  The settings value.
 */
function get_settings($name = '')
{
	$CI = &get_instance();
	$CI->load->model('setting_model', 'settings');

	if ($name == '')
	{
		$settings = $CI->settings->get_all();

		return $settings;
	}
	else
	{
		$result = $CI->settings->get_by(['name' => $name]);

		if ($result)
		{
			return $result['value'];
		}
		else
		{
			return null;
		}
	}
}

/**
 * Gets the email template for the passed slug.
 *
 * @param  str  $slug  The slug name of the template
 *
 * @return str  The email template.
 */
function get_email_template($slug)
{
	$CI = &get_instance();
	$CI->load->model('email_model', 'emails');
	$result = $CI->emails->get_by(['slug' => $slug]);

	if ($result)
	{
		return $result;
	}
	else
	{
		return null;
	}
}

/**
 * Gets the current controller name.
 *
 * @return str  The current controller name.
 */
function get_current_controller()
{
	$CI = &get_instance();

	return $CI->router->fetch_class();
}

/**
 * Determines if active controller.
 *
 * @param  str  $controller  The controller
 *
 * @return bool True if active controller, False otherwise.
 */
function is_active_controller($controller)
{
	$CI = &get_instance();

	if ($CI->router->fetch_class() == $controller)
	{
		return TRUE;
	}

	return FALSE;
}

/**
 * Determines if active controller->method.
 *
 * @param  str  $method  The controller->method
 *
 * @return bool True if active controller->method, False otherwise.
 */
function is_active_method($method)
{
	$CI = &get_instance();

	if ($CI->router->fetch_method() == $method)
	{
		return TRUE;
	}

	return FALSE;
}

/**
 * Sets the notification alert on different evets performed.
 *
 * @param str  $type     The type
 * @param str  $message  The message
 */
function set_alert($type, $message)
{
	get_instance()->session->set_flashdata($type, $message);
}

/**
 * Generates a random hash key for Forgot Password functionality
 *
 * @return str  Hash key
 */
function app_generate_hash()
{
	return md5(rand().microtime().time().uniqid());
}

/**
 * Gets the role by identifier.
 *
 * @param  int  $id  The identifier
 *
 * @return str  The role by identifier.
 */
function get_role_by_id($id)
{
	$CI = &get_instance();
	$CI->load->model('role_model', 'roles');
	$role = $CI->roles->get($id);

	return $role['name'];
}

/**
 * Logs an activity into the database if enabled.
 *
 * @param str  $description  The description
 * @param str  $user_id      The id of the user doing the activity
 */
function log_activity($description, $user_id = '')
{
	if (get_settings('log_activity') == 1)
	{
		$CI = &get_instance();
		$CI->load->model('activity_log_model', 'activity_log');

		if ($user_id == '')
		{
			$user_id = get_loggedin_user_id();
		}

		$data = array(
			'description' => $description,
			'date'        => date('Y-m-d H:i:s'),
			'user_id'     => $user_id,
			'ip_address'  => $CI->input->ip_address()
		);

		$CI->activity_log->insert($data);
	}
}

/*================================================vixuti patel===================================================*/
/**
 * [no_to_words convert numbers to word]
 * @param  [type] $no [get numbers]
 * @return [type]  $word  [return in words]
 */
function no_to_words($no)
{
	$CI = &get_instance();

	$words = array('0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninty', '100' => 'hundred &', '1000' => 'thousand', '100000' => 'lakh', '10000000' => 'crore');
	if ($no == 0)
	{
		return ' ';
	}
	else
	{
		$novalue  = '';
		$highno   = $no;
		$remainno = 0;
		$value    = 100;
		$value1   = 1000;
		while ($no >= 100)
		{
			if (($value <= $no) && ($no < $value1))
			{
				$novalue  = $words["$value"];
				$highno   = (int) ($no / $value);
				$remainno = $no % $value;
				break;
			}

			$value  = $value1;
			$value1 = $value * 100;
		}

		if (array_key_exists("$highno", $words))
		{
			return $words["$highno"].' '.$novalue.' '.no_to_words($remainno);
		}
		else
		{
			$unit = $highno % 10;
			$ten  = (int) ($highno / 10) * 10;

			return $words["$ten"].' '.$words["$unit"].' '.$novalue.' '.no_to_words($remainno);
		}
	}
}

/**========================================end by vixuti patel=========================**/

// =========================== Bhavik ==================================//

/**
 * Gets the requested info of product.
 *
 * @param  int  $id    The id of the product.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_product($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('product_model', 'products');
	$product = $CI->products->get($id);

	if ($info != '')
	{
		return $product[$info];
	}
	else
	{
		return $product;
	}
}

/**
 * Gets the requested info of deal.
 *
 * @param  int  $id    The id of the deal.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_deal($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('deal_model', 'deals');
	$deal = $CI->deals->get($id);

	if ($info != '')
	{
		return $deal[$info];
	}
	else
	{
		return $deal;
	}
}

/**
 * configuration for creating Pagination Links.
 *
 * @param  string  		$url         	URL for the pagination.
 * @param  int  		$total_rows  	Total number of records.
 * @param  int 			$per_page    	Number of records per page.
 * @param  int 			$uri_segment  	Segment of URL.
 *
 * @return mixed 		$config 		Configuration for Pagination.
 */
function pagination($url, $total_rows, $per_page, $uri_segment)
{
	$CI                         = &get_instance();
	$config                     = array();
	$config['base_url']         = $url;
	$config['total_rows']       = $total_rows;
	$config['per_page']         = $per_page;
	$config['uri_segment']      = $uri_segment;
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open']    = '<ul class="list-inline list-unstyled">';
	$config['full_tag_close']   = '</ul>';
	$config['first_link']       = '&lt;&lt';
	$config['first_tag_open']   = '<li class="page-item">';
	$config['first_tag_close']  = '</li>';
	$config['last_link']        = '&gt;&gt';
	$config['last_tag_open']    = '<li class="page-item">';
	$config['last_tag_close']   = '</li>';
	$config['next_link']        = '<li class="next"><i class="fa fa-angle-right"></i></li>';
	$config['next_tag_open']    = '<li class="page-item">';
	$config['next_tag_close']   = '</li>';
	$config['prev_link']        = '<li class="prev"><i class="fa fa-angle-left"></i></li>';
	$config['prev_tag_open']    = '<li class="page-item">';
	$config['prev_tag_close']   = '</li>';
	$config['cur_tag_open']     = '<li class="active"><a href="">';
	$config['cur_tag_close']    = '</a></li>';
	$config['num_tag_open']     = '<li class="page-item">';
	$config['num_tag_close']    = '</li>';

	$CI->pagination->initialize($config);

	return $config;
}

function get_coupon_info($id)
{
	$CI = &get_instance();
	$CI->load->model('coupon_model', 'coupons');

	return $CI->coupons->get($id);
}

// =========================== Bhavik ==================================//

/**
 * Uploads a logo.
 *
 * @return     array  ( returns uploaded data path else return error )
 */
function upload_logo($path, $fieldname)
{
	$CI = &get_instance();

	$config['upload_path']   = $path;
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = 1000;
	$config['file_name']     = time().'-'.$_FILES[$fieldname]['name'];

	$CI->upload->initialize($config);

	if (!$CI->upload->do_upload($fieldname))
	{
		$error = array('error' => $CI->upload->display_errors());
		set_alert('danger', ucwords($error['error']));

		return false;
	}

	$uploadData = $CI->upload->data();

	$data = $config['upload_path'].$uploadData['file_name'];

	return $data;
}
