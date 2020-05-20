<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
	/**
	 * @var boolean
	 */
	protected $soft_delete = TRUE;

	/**
	 * @var string
	 */
	protected $soft_delete_key = 'is_deleted';

	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Gets the users.
	 *
	 * @return     <object>  The users.
	 */
	public function get_users($where = array())
	{
		if (empty($where))
		{
			$array = array('is_admin' => 0, 'is_deleted' => 0);

			$this->db->where($array);
			$data = $this->db->get('users')->result();

			return $data;
		}
		else
		{
			$this->db->where($where);
			$query  = $this->db->get_where('users', array('is_admin' => 0, 'is_deleted' => 0));
			$result = $query->row_array();

			if ($result)
			{
				return $result;
			}
		}
	}
	/**
	 * show the particular user's details
	 *
	 * @param      <int>  $id     The identifier
	 *
	 * @return     <array>  ( The user's details like name,address etc. )
	 */
	public function show($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_addresses', 'users.id = users_addresses.users_id');
		$this->db->where('users_id', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * { update particular user's details }
	 *
	 * @param      <array>  $data   The data of user's details
	 * @param      <int>  $id     The identifier
	 *
	 * @return     <bool>  ( shows update sucessfully or not )
	 */
	public function edit($data, $id)
	{
		$result = $this->update($id, $data);

		return $result;
	}

/***==================================================code by vixuti patel=====================================================***/

/**
 * [edit user address ]
 * @param  [array] $data [user details]
 * @param  [int] $id   [user id]
 * @return [array]   $query    [user-address data]
 */
	public function edit_user_address($id, $address_1, $address_2, $city, $state, $pincode)
	{
		$this->_table = "users_addresses";
		$flag = 0;
		$records = $this->get_all();

		foreach ($records as $record) 
		{
			if($record['users_id'] == $id)
			{
				$flag=1;
				break;
			}

		}
		if($flag == 1)
		{
			$result = "UPDATE users_addresses as a SET a.house_or_village='$address_1',a.street_or_society='$address_2',a.city_id='$city',a.state_id='$state',a.pincode='$pincode' WHERE a.users_id=$id";
			$query  = $this->db->query($result);
		}
		else
		{
			$data = array('house_or_village' => $address_1,
				 			'street_or_society'=> $address_2,
				 			'city_id'=> $city,
				 			'state_id'=> $state,
				 			'pincode'=> $pincode,
				 			'users_id' => $id,
				 			'is_deleted' => 0
			 );
			$query = $this->db->insert('users_addresses',$data);	

		}

		return $query;
	}

/**
 * [insert_user_address description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
	public function insert_user_address($data)
	{
		return $this->db->insert('users_address', $data);
	}


/***==================================================code end by vixuti patel=====================================================***/

//========================================maitri temporary=========================================

 /**
   * [get_state_name by state id]
   * @param  [type] $id [state id]
   * @return [state name]
   */  
public function get_state_name($id)
{
 	$this->db->select('name');
	$this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'id' =>$id)); 
    $query = $this->db->get('states');
    $result = $query->result_array();
    if($result)
    {
	    foreach ($result as $state_name) 
	    {
			echo $state_name['name'];
	    }
	}
	else{
		return false;
	}

 }
 
 /**
   * [get_state_name by city id]
   * @param  [int] $id [city id]
   * @return     [city name]
   */
  public function get_city_name($id)
  {
 	$this->db->select('name');
	$this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'id' =>$id)); 
    $query = $this->db->get('cities');
    $result = $query->result_array();
    if($result)
    {
	    foreach ($result as $city_name) 
	    {
			echo $city_name['name'];
	    }
	}
	else
	{
		return false;
	}

 }

 /**
 * [get_state all states details]
 * @return [array] $response [all states details ]
 */
public function get_states()
{  
    $this->db->select('*');
    $this->db->order_by('name', 'asc');
	$this->db->where(array('is_active' => 1, 'is_deleted' => 0)); 
    $query = $this->db->get('states');
    $response = $query->result_array();

    return $response;
 }

  /**
  * [get_cities_by_state (by state_id)]
  * @param  [int] $state_id [state_id]
  * @return [array]           [array of cities details]
  */
 public function get_cities_by_state($state_id)
 {
        if($state_id)
        {
        $this->db->where(array('is_active' => 1, 'is_deleted' => 0, 'state_id' =>$state_id)); 
	    $query = $this->db->get('cities');
	    $cities = $query->result_array();   
	    return $cities;             
        }
        else
        {
        	return false;
        }
  }

//========================================maitri temporary=========================================

}
