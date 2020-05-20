<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Gets the loggedin user identifier.
 *
 * @return int  The loggedin user identifier.
 */
function get_loggedin_user_id()
{
	return get_instance()->session->userdata('user_id');
}

/**
 * Gets the requested info of logged in user.
 *
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_loggedin_info($info)
{
	return get_instance()->session->userdata($info);
}

/**
 * Gets the requested info of user.
 *
 * @param  int  $id    The id of the user.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_user_info($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('user_model', 'users');

	$user = $CI->users->get($id);

	if ($info != '')
	{
		return $user[$info];
	}
	else
	{
		return $user;
	}
}

/**
 * Gets the requested info of user.
 *
 * @param  int  $id    The id of the user.
 * @param  str  $info  The key of the information required.
 *
 * @return mixed The information required.
 */
function get_user_address_info($user_id)
{
	$CI = &get_instance();
	$CI->load->model('Users_address_model', 'user_address');
	$user_address = $CI->user_address->get_user_address($user_id);

	if ($user_address)
	{
		return $user_address;
	}
}

/**
 * Gets the address info of user.
 *
 * @param  int  $id    The id of the user.
 *
 * @return mixed The Address Information,bool False otherwise.
 */
function get_user_address($id)
{
	$CI = &get_instance();
	$CI->load->model('users_address_model', 'users_addresses');

	$address = $CI->users_addresses->get_user_address($id);

	if ($address == '')
	{
		return false;
	}

	return $address;
}

/**
 * Determines if user has permissions.
 *
 * @param  str  $feature     The feature/module
 * @param  str  $capability  The capability/action
 *
 * @return bool True if has permissions, False otherwise.
 */
function has_permissions($feature, $capability)
{
	$CI = &get_instance();
	$CI->load->model('user_permission_model', 'user_permissions');
	$data = array(
		'user_id'      => get_loggedin_user_id(),
		'features'     => $feature,
		'capabilities' => $capability

	);

	$permissions = $CI->user_permissions->get_many_by($data);

	if ($permissions)
	{
		return true;
	}
	else
	{
		return false;
	}
}

/**==========================code by vixuti patel=================================*/
/**
 * [get_city_name by it's id]
 * @param  [int] $id [city id]
 * @return [string] $city_name   [city name]
 */
function get_city_name($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('City_model', 'city');

	$city_name = $CI->city->get($id);

	if ($info != '')
	{
		return $city_name[$info];
	}
	else
	{
		return $city_name;
	}
}

/**
 * [get_state_name by it's id]
 * @param  [int] $id [state_id]
 * @return [string] $state_name  [state_name]
 */
function get_state_name($id, $info = '')
{
	$CI = &get_instance();
	$CI->load->model('State_model', 'state');

	$state_name = $CI->state->get($id);

	if ($info != '')
	{
		return $state_name[$info];
	}
	else
	{
		return $state_name;
	}
}

/*==============================code end by vixuti patel======================================*/
?>