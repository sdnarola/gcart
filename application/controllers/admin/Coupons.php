<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('coupon_model', 'coupons');
	}

// =========================== Bhavik ==================================//
	/**
	 * Gets coupon's coupons information.
	 */
	public function index()
	{
		$this->set_page_title(_l('coupons'));
		$data['coupons'] = $this->coupons->get_all();
		$data['content'] = $this->load->view('admin/coupons/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new coupon
	 */
	public function add()
	{
		$this->set_page_title(_l('coupons').' | '._l('add'));

		if ($this->input->post())
		{
			$data             = $this->input->post();
			$data['quantity'] = $data['value'];
			unset($data['value']);
			$insert = $this->coupons->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('coupon')));
				redirect('admin/coupons');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/coupons/add', '', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Updates the coupon record
	 *
	 * @param int  $id  The coupon id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('coupons').' | '._l('edit'));

		if ($id)
		{
			if ($this->input->post())
			{
				$data             = $this->input->post();
				$data['quantity'] = $data['value'];
				unset($data['value']);

				$update = $this->coupons->update($id, $data);
				if ($update)
				{
					set_alert('success', _l('_updated_successfully', _l('coupon')));
					redirect('admin/coupons');
				}
			}
			else
			{
				$data['coupon']  = $this->coupons->get($id);
				$data['content'] = $this->load->view('admin/coupons/edit', $data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}
		}
		else
		{
			redirect('admin/coupons');
		}
	}

	/**
	 * Toggles the coupon status to Active or Inactive
	 */
	public function update_status()
	{
		$coupon_id = $this->input->post('coupon_id');
		$data      = array('is_active' => $this->input->post('is_active'));

		$update = $this->coupons->update($coupon_id, $data);

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
	 * Delete the single coupon record
	 */
	public function delete()
	{
		$coupon_id = $this->input->post('coupon_id');
		$deleted   = $this->coupons->delete($coupon_id);

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
	 * Deletes multiple coupons records
	 */
	public function delete_selected()
	{
		$where   = $this->input->post('ids');
		$deleted = $this->coupons->delete_many($where);

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

// =========================== Bhavik ==================================//
}
