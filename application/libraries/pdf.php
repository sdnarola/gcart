<?php

if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	private $CI;
	public function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}

	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function load_view($view, $data = array())
	{
		$html = $this->CI->load->view($view, $data, TRUE);
		$this->load_html($html);
	}
}

?>