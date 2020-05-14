<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_letters extends Frontend_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$email = $this->input->post('email');

		$data = array(
			'email' => $this->input->post('email')
		);

		if (!empty($email))
		{
			$inserts = $this->news_letters->insert($data);
		}

		if ($inserts)
		{
			set_alert('success', 'Your are subscription successfully. ');
		}
		else
		{
			log_activity("User trying to subscribe  In [Email: $email]");
		}

		//echo json_encode($email);
		redirect();
	}

	/*
		 * Checks if user with provided email id exists or not
		 * @return [type] [description]
	*/
	public function email_exists()
	{
		$exists = $this->news_letters->count_by('email', $this->input->post('email'));
		echo $exists;
	}
// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [news_letters_subscribe description]
	 *
	 */
	public function news_letters_subscribe()
	{
		$email = $this->input->post('email');
		$news_letters_data  = $this->news_letters->get_all();
		$news_letters_email = array();

		if (!empty($email))
		{
			$data['email'] = $email;

			foreach ($news_letters_data as $key => $news_letters)
			{
				$news_letters_email[] = $news_letters['email'];
			}

			if (in_array($email, $news_letters_email))
			{
				echo 'exit';
			}
			else
			{
				$inserts = $this->news_letters->insert($data);

				if ($inserts)
				{
					echo 'success';
				}
			}
		}
	}
	// ============================================ END WORK BY KOMAl ========================================================================================
}
	
