<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('category_model', 'categories');
		$this->load->model('sub_category_model', 'sub_categories');
	}

	/**
	 *  listing all categories
	 */
	public function index()
	{
		$this->set_page_title(_l('categories'));

		$data['categories'] = $this->categories->get_all();
		$data['content']    = $this->load->view('admin/categories/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new category
	 */
	public function add()
	{
		$this->set_page_title(_l('categories').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();

			if ($_FILES['icon']['name'] != NULL)
			{
				$result = upload_logo('assets/uploads/main_categories/', 'icon');

				if (!$result)
				{
					redirect('admin/categories/add');
				}

				$data['icon'] = $result;
			}
			else
			{
				$data['icon'] = 'assets/uploads/main_categories/default_category.png';
			}

			$insert = $this->categories->insert($data);

			if ($insert)
			{
				set_alert('success', _l('_added_successfully', _l('category')));
				redirect('admin/categories');
			}
		}
		else
		{
			$data['content'] = $this->load->view('admin/categories/add', ' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * edit category
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '')
	{
		$this->set_page_title(_l('categories').' | '._l('edit'));

		if ($this->input->post())
		{
			$data = $this->input->post();

			$data['is_active'] = ($this->input->post('is_active')) ? 1 : 0;
			//for deactive subcategories status
			$status = array('is_active' => $data['is_active']);

			if ($_FILES['icon']['name'] != NULL)
			{
				$result = upload_logo('assets/uploads/main_categories/', 'icon');

				if (!$result)
				{
					redirect('admin/categories/edit/'.$id);
				}

				$data['icon'] = $result;
				//for unlink image from folder
				$old_upload_image = $this->categories->get($id);

				if (basename($old_upload_image['icon']) != 'default_category.png')
				{
					unlink($old_upload_image['icon']);
				}
			}

			$result = $this->categories->update($id, $data);

			if ($result)
			{
				set_alert('success', _l('_updated_successfully', _l('category')));
				redirect('admin/categories');
			}
		}
		else
		{
			$data['category'] = $this->categories->get($id);
			$data['content']  = $this->load->view('admin/categories/edit', $data, TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * Deletes the single category record
	 */
	public function delete()
	{
		$category_id = $this->input->post('category_id');
		//in soft delete move image to deleted folder
		$old_upload_image = $this->categories->get($category_id);
		$imagepath        = $old_upload_image['icon'];
		$newpath          = 'assets/uploads/main_categories/deleted/'.basename($imagepath);

		if (basename($imagepath) != 'default_category.png')
		{
			$copied = copy($imagepath, $newpath);
			unlink($imagepath);
		}

		$deleted                = $this->categories->delete($category_id);
		$deleted_sub_categories = $this->sub_categories->delete_sub_categories($category_id);

		if ($deleted == 1 && $deleted_sub_categories == 1)
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}

	/**
	 * Deletes multiple categories records
	 */
	public function delete_multiple()
	{
		$where = $this->input->post('ids');

		$data = $this->categories->get_many($where);

		foreach ($data as $record)
		{
			$imagepath = $record['icon'];
			$newpath   = 'assets/uploads/main_categories/deleted/'.basename($imagepath);

			if (basename($imagepath) != 'default_category.png')
			{
				$copied = copy($imagepath, $newpath);
				unlink($imagepath);
			}
		}

		$deleted                = $this->categories->delete_many($where);
		$deleted_sub_categories = $this->sub_categories->multi_delete_sub_categories($where);

		if ($deleted == 1 && $deleted_sub_categories == 1)
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
	 * Toggles the category status to Active or Inactive
	 */
	public function update_status()
	{
		$category_id = $this->input->post('category_id');
		$data        = array('is_active' => $this->input->post('is_active'));

		$update = $this->categories->update($category_id, $data);

		if ($update == 1)
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

// =========================== Bhavik ==================================//

	/* Get sub categories of parent category.
		 *
		 * @param  int  	$id  	Id of parent category.
		 *
		 * @return mixed 			array of json-data
	*/
	public function get_sub_categories($id)
	{
		$data = $this->categories->get_sub_categories_of_parent_category($id);
		echo json_encode($data);
	}

// =========================== Bhavik ==================================//
}
