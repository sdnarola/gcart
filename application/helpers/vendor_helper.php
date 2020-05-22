<?php defined('BASEPATH') or exit('No direct script access allowed');

// =========================== Bhavik ==================================//

/**
 * Gets the vendor url.
 *
 * @param  string  $url  The url.
 *
 * @return string  The vendor url.
 */
function vendor_url($url = '')
{
	$vendorURI = get_vendor_uri();

	if ($url == '' || $url == '/')
	{
		if ($url == '/')
		{
			$url = '';
		}

		return site_url($vendorURI).'/';
	}

	return site_url($vendorURI.'/'.$url);
}

/**
 * Gets the vendor uri.
 *
 * @return string  The vendor uri.
 */
function get_vendor_uri()
{
	return VENDOR_URI;
}

/**
 * Gets the loggedin vendor identifier.
 *
 * @return int  The loggedin vendor identifier.
 */
function get_loggedin_vendor_id()
{
	return get_instance()->session->userdata('vendor_id');
}

/**
 * Gets the requested info of vendor.
 *
 * @param  int  $id    The id of the vendor.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_vendor_info($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('vendor_model', 'vendors');

	$vendor = $CI->vendors->get($id);

	if ($vendor)
	{
		if ($info != '')
		{
			return $vendor[$info];
		}
		else
		{
			return $vendor;
		}
	}
}

/**
 * Get Vendor's information by field.
 * @param  string 		$field 		Field name.
 * @return mixed        			vendor's information.
 */
function get_vendor_by($data)
{
	$CI = &get_instance();
	$CI->load->model('vendor_model', 'vendors');

	$vendor = $CI->vendors->get_by($data);

	return $vendor;
}

// =========================== Bhavik ==================================//

/**
 * Gets the subscription information.
 *
 * @param      <int>  $subscription_id  The subscription identifier
 * @param      string  $info             The key of the information required.
 *
 * @return     mixed The information required.
 */
function get_subscription_info($subscription_id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('subscriptions_model', 'subscription');

	$subscription = $CI->subscription->get($subscription_id);

	if ($info != '')
	{
		return $subscription[$info];
	}
	else
	{
		return $subscription;
	}
}

/**
 * calculate the subscription expired date
 *
 * @param      <int>   $id     The identifier of vendor
 *
 * @return     integer  ( if expire then 1 else 0 )
 */
function expire_subscription($id)
{
	$CI = &get_instance();
	$CI->load->model('subscriptions_model', 'subscription');
	$subscription_id = get_vendor_info($id, 'subscription_id');
	$date1           = get_vendor_info($id, 'subscribe_date');
	$days            = get_subscription_info($subscription_id, 'days');

//calculate expire date of subscription
	if ($days)
	{
		$date = new DateTime($date1);
		$day  = 'P'.$days.'D';

		$exp_date = $date->add(new DateInterval($day));
		$exp      = $exp_date->format('Y-m-d H:i:s');

		$current = date('Y-m-d H:i:s');

		if ($current >= $exp)
		{
			return $exp;
		}
		else
		{
			return 0;
		}
	}
	else
	{
		return null;
	}
}

?>