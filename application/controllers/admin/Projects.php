<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('project_model', 'projects');
	}

	/**
	 * Loads the list of projects.
	 */
	public function index()
	{
		$this->set_page_title(_l('projects'));

		if (!has_permissions('projects', 'view'))
		{
			$this->access_denied('projects', 'view');
		}
		else
		{
			$data['projects'] = $this->projects->get_all();
			$data['content']  = $this->load->view('admin/projects/index', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Add new project
	 */
	public function add()
	{
		$this->set_page_title(_l('projects').' | '._l('add'));

		if (!has_permissions('projects', 'create'))
		{
			$this->access_denied('projects', 'create');
		}
		else

		if ($this->input->post())
		{
			$data = array
				('project_id' => 'PROJECT_'.rand(10, 100),
				'name'        => $this->input->post('name'),
				'details'     => $this->input->post('details'),
				'created'     => date('Y-m-d H:i:s')
			);

			$insert = $this->projects->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('project')));
				log_activity("New Project Created [ID:$insert]");
				redirect('admin/projects');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/projects/create', '', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Updates the project record
	 *
	 * @param int  $id  The project id
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('projects').' | '._l('edit'));

		if (!has_permissions('projects', 'edit'))
		{
			$this->access_denied('projects', 'edit');
		}
		else

		if ($id)
		{
			$data['project'] = $this->projects->get($id);

			if ($this->input->post())
			{
				$data = array
					('project_id' => 'PROJECT_'.rand(10, 100),
					'name'        => $this->input->post('name'),
					'details'     => $this->input->post('details'),
					'updated'     => date('Y-m-d H:i:s')
				);

				$update = $this->projects->update($id, $data);

				if ($update)
				{
					set_alert('success', _l('_updated_successfully', _l('project')));
					log_activity("Project Updated [ID:$id]");
					redirect('admin/projects');
				}
			}
			else
			{
				$data['content'] = $this->load->view('admin/projects/edit', $data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}
		}
		else
		{
			redirect('admin/projects');
		}
	}

	/**
	 * Deletes the single project record
	 */
	public function delete()
	{
		$project_id = $this->input->post('project_id');
		$deleted    = $this->projects->delete($project_id);

		if ($deleted)
		{
			log_activity("Project Deleted [ID:$project_id]");
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Deletes multiple project records
	 */
	public function delete_selected()
	{
		$where   = $this->input->post('ids');
		$deleted = $this->projects->delete_many($where);

		if ($deleted)
		{
			$ids = implode(',', $where);
			log_activity("Projects Deleted [IDs: $ids]");
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}
}
