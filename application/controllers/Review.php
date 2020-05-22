<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

// ============================================ WORK BY KOMAl =================================================================================================
	/**
	 * [index description]
	 * @param  string $products_slug
	 *
	 */
	public function index($products_slug = '')
	{
		if (!empty($products_slug))
		{
			$page                         = $this->input->get('page');
			$page                         = (empty($page)) ? 1 : $page;
			$limit                        = 4;
			$start                        = ($page - 1) * $limit;
			$products                     = $this->products->get_products_by_slug($products_slug);
			$product_id                   = $products['id'];
			$products_where['product_id'] = $product_id;
			$total_review                 = $this->review->count_products_review($product_id);
			$page_size                    = 4;

			$this->data['page_size']       = $page_size;
			$this->data['page']            = $page;
			$this->data['limit']           = $limit;
			$this->data['products_review'] = $this->review->get_many_by(array('product_id' => $product_id));
			$this->data['products_name']   = $products['name'];
			$this->data['products_slug']   = $products_slug;
			$this->data['products_detail'] = $products;
			$this->data['reviews_data']    = $this->review->get_products_by_review($products_where, $limit, $start);
			$this->data['reviews']         = $total_review;
			$this->template->load('index', 'content', 'products/review', $this->data);
		}
		else
		{
			$this->add_products_review();
		}
	}

	/**
	 * [add_products_review description]
	 */
	public function add_products_review()
	{
		$this->data['user_id']      = $this->session->userdata('user_id');
		$this->data['product_id']   = $this->input->post('products_id');
		$this->data['star_ratings'] = $this->input->post('star');
		$this->data['review']       = $this->input->post('review');
		$this->data['add_date']     = date('Y-m-d h:i:s');
		$product_id                 = $this->input->post('products_id');
		$user_id                    = $this->session->userdata('user_id');

		$where['product_id'] = $product_id;
		$where['user_id']    = $user_id;

		$reviews_data = $this->review->get_products_by_review($where);

		$review_user_id    = '';
		$review_product_id = '';

		if (!empty($reviews_data))
		{
			foreach ($reviews_data as $key => $value)
			{
				$review_user_id    = $value['user_id'];
				$review_product_id = $value['product_id'];
			}
		}

		if ($review_user_id != $user_id && $review_product_id != $product_id)
		{
			$result = $this->review->insert($this->data);

			if ($result)
			{
				$template = get_email_template('thanks-for-product-review');

				$subject_find = [
					'{product_name}',
					'{company_name}'
				];

				$subject_replace = [
					ucwords(get_products_info($product_id, 'name')),
					get_settings('company_name')
				];

				$subject = str_replace($subject_find, $subject_replace, $template['subject']);

				$message = get_settings('email_header');

				$message_find = [
					'{company_name}',
					'{firstname}',
					'{lastname}',
					'{products_detail_url}',
					'{image_url}',
					'{review_date}',
					'{star_rating}',
					'{review_msg}',
					'{email_signature}'

				];

				$products_img_url = base_url().get_products_info($product_id, 'thumb_image');

				$message_replace = [
					get_settings('company_name'),
					get_user_info($user_id, 'firstname'),
					get_user_info($user_id, 'lastname'),
					site_url('Products/'.get_products_info($product_id, 'slug')),
					$products_img_url,
					date('d F ,Y'),
					$this->data['star_ratings'],
					$this->data['review'],
					get_settings('email_signature')

				];

				$message .= str_replace($message_find, $message_replace, $template['message']);
				$message .= str_replace('{company_name}', get_settings('company_name'), get_settings('email_footer'));

				$sent = send_email(get_user_info($user_id, 'email'), $subject, $message);

				if ($sent)
				{
					echo 'Review submit successfully';
				}
			}
		}
	}

// ========================================================== END WORK BY KOMAl ============================================

/*==================================== code by vixuti patel===========================================*/
	/**
	 * [add_review or if exist then update]
	 */
	public function add_review()
	{
		if (isset($_POST['review']))
		{
			$this->data['review'] = $this->input->post('review');
		}

		$this->data['user_id']    = $this->session->userdata('user_id');
		$this->data['product_id'] = $this->input->post('products_id');
		if (isset($_POST['star']))
		{
			$this->data['star_ratings'] = $this->input->post('star');
		}

		$this->data['add_date'] = date('Y-m-d h:i:s');
		$ratings                = get_product_review_by_user($this->data['product_id'], $this->data['user_id']);
		if ($ratings == false)
		{
			$result = $this->review->insert($this->data);
			if ($result)
			{
				echo '<strong>Thanks!</strong> Review submitted.';
			}
			else
			{
				return false;
			}
		}
		else
		{
			$result = $this->review->update($ratings[0]['id'], $this->data);
			if ($result)
			{
				echo '<strong>Thanks!</strong> Review updated.';
			}
			else
			{
				return false;
			}
		}
	}

	/*==================================== end code by vixuti patel===========================================*/
}

?>