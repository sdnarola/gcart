<?php defined('BASEPATH') or exit('No direct script access allowed');

// =========================== Bhavik ==================================//

/**
 * Upload single image file
 *
 * @return array data.
 * @return boolean bool false if image can't upload.
 */
function image_upload()
{
	$CI = &get_instance();

	$config['upload_path']   = 'assets/uploads/products/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size']      = 10000;
	$config['file_name']     = time().'-'.$_FILES['thumb_image']['name'];

	$CI->upload->initialize($config);

	if (!$CI->upload->do_upload('thumb_image'))
	{
		$error = array('error' => $CI->upload->display_errors());
		set_alert('danger', ucwords($error['error']));

		return false;
	}

	$UploadData          = $CI->upload->data();
	$data['thumb_image'] = $config['upload_path'].$UploadData['file_name'];

	return $data;
}

/**
 * Uploads Multiple image files
 *
 * @return boolean bool False if images can't upload.
 * @return mixed 	uploaded images.
 */
function multiple_image_upload()
{
	$CI = &get_instance();

	$count = count($_FILES['image']['name']);

	for ($i = 0; $i < $count; $i++)
	{
		if (!empty($_FILES['image']['name'][$i]))
		{
			$config['upload_path']   = 'assets/uploads/products/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = 10000;
			$config['file_name']     = time().'--'.$_FILES['image']['name'][$i];

			$CI->upload->initialize($config);

			$_FILES['file']['name']     = $_FILES['image']['name'][$i];
			$_FILES['file']['type']     = $_FILES['image']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
			$_FILES['file']['error']    = $_FILES['image']['error'][$i];
			$_FILES['file']['size']     = $_FILES['image']['size'][$i];

			if (!$CI->upload->do_upload('file'))
			{
				$error = array('error' => $CI->upload->display_errors());
				set_alert('danger', ucwords($error['error']));

				return false;
			}
			else
			{
				$uploadData = $CI->upload->data();
				$image[$i]  = $config['upload_path'].$uploadData['file_name'];
			}
		}
	}

	$data['images'] = serialize($image);

	return $data;
}

// =========================== Bhavik ==================================//
?>
