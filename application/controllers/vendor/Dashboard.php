<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Vendor_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vendor_model', 'vendors');
		$this->load->model('product_model', 'products');
	}

	/**
	 * Loads the vendor dashboard
	 */
	public function index()
	{
		$this->set_page_title(_l('dashboard'));
		$id              = $this->session->userdata('vendor_id');
		$data['vendor']  = $this->vendors->get($id);
		$data['content'] = $this->load->view('vendor/dashboard/index', '', TRUE);
		$this->load->view('vendor/layouts/index', $data);
	}

	/**
	 * Updates vendor's store details.
	 */
	public function edit_store()
	{
		$this->set_page_title(_l('edit_store'));
		$id = $this->session->userdata('vendor_id');

		if ($id)
		{
			$data['vendor']  = $this->vendors->get($id);
			$data['content'] = $this->load->view('vendor/dashboard/edit_store', $data, TRUE);
			$this->load->view('vendor/layouts/index', $data);
		}

		if ($this->input->post())
		{
			$data = $this->input->post();

			if ($_FILES['logo']['name'] != null)
			{
				$config['upload_path']   = 'assets/uploads/vendors/logo/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = 10000;
				$config['file_name']     = time().'-'.$_FILES['logo']['name'];

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('logo'))
				{
					$error = array('error' => $this->upload->display_errors());
					set_alert('danger', ucwords($error['error']));
					redirect('vendor/dashboard/store');
				}

				$UploadData   = $this->upload->data();
				$data['logo'] = $config['upload_path'].$UploadData['file_name'];

				$logo = get_vendor_info($id, 'logo');
				unlink($logo);
			}

			$update = $this->vendors->update($id, $data);

			if ($update)
			{
				set_alert('success', _l('_updated_successfully', _l('store')));
				redirect('vendor/dashboard');
			}
		}
	}
}
