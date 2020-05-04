<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends Admin_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Slider_setting_model', 'sliders');
	}

	/**
	 *  listing all sliders 
	 */
	public function index()
	{
		$this->set_page_title(_l('sliders'));

		$data['sliders'] = $this->sliders->get_all();
		$data['content'] = $this->load->view('admin/settings/sliders/index', $data, TRUE);
		$this->load->view('admin/layouts/index', $data);
	}

	/**
	 * Add new slider
	 */
	public function add()
	{
		$this->set_page_title(_l('sliders').' | '._l('add'));

		if ($this->input->post())
		{
			$data = $this->input->post();

			if($_FILES['image']['name']!=NULL)
			{
				$result = upload_logo("assets/uploads/sliders/","image");

                if (!$result)
                {
                    redirect('admin/sliders/add');
                }
                
                $data['image'] = $result;
			}
			else
			{
				$data['image'] = 'assets/uploads/sliders/default_slider.png';
			}

                      $insert = $this->sliders->insert($data);    

						if ($insert)
						{
							set_alert('success', _l('_added_successfully', _l('slider')));
							redirect('admin/sliders');
						}
		}
		else
		{
			$data['content'] = $this->load->view('admin/settings/sliders/add',' ', TRUE);
			$this->load->view('admin/layouts/index', $data);
		}
	}

	/**
	 * edit slider 
	 *
	 * @param      int  $id     The identifier
	 */
	public function edit($id = '') 
	{
			$this->set_page_title(_l('sliders') . ' | ' . _l('edit'));

			if ($this->input->post()) 
			{
				$data =$this->input->post(); 

				if($_FILES['image']['name']!=NULL)
				{
					$result = upload_logo("assets/uploads/sliders/","image");

	                if (!$result)
	                {
	                    redirect('admin/sliders/edit/'.$id);
	                }
	                
	                $data['image'] = $result;

	                //for unlink image from folder
	                $old_upload_image = $this->sliders->get($id);

	                if(basename($old_upload_image['image']) != 'default_slider.png')
					{
		             	unlink($old_upload_image['image']);
					}
				}

				$result = $this->sliders->update($id,$data);
				
				if($result)
				{
					set_alert('success', _l('_updated_successfully', _l('slider')));
					redirect('admin/sliders');		
				}	
			} 
			else 
			{
				$data['slider'] = $this->sliders->get($id);
				$data['content'] = $this->load->view('admin/settings/sliders/edit',$data, TRUE);
				$this->load->view('admin/layouts/index', $data);
			}	
	}

	/**
	 * Deletes the single slider record
	 */
	public function delete() 
	{
		$id = $this->input->post('slider_id');
		//in soft delete move image to deleted folder
		$old_upload_image = $this->sliders->get($id);
		$imagepath = $old_upload_image['image'];
		$newpath = 'assets/uploads/sliders/deleted/'.basename($imagepath);

		if(basename($imagepath) != 'default_slider.png')
		{
			$copied = copy($imagepath , $newpath);
			unlink($imagepath);
		} 
		
		$deleted = $this->sliders->delete($id);

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
 	* Deletes multiple slider records
 	*/
	public function delete_multiple() 
	{
		$where = $this->input->post('ids');
		//in soft delete move image to deleted folder
		$data= $this->sliders->get_many($where);
		foreach($data as $record)
		{
			$imagepath = $record['image'];
			$newpath = 'assets/uploads/sliders/deleted/'.basename($imagepath);
			
			if(basename($imagepath) != 'default_slider.png')
			{
				$copied = copy($imagepath , $newpath);
				unlink($imagepath);
			}
		}

		$deleted = $this->sliders->delete_many($where);

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

}
