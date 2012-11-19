<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = array
		(
			'content' => $this->load->view('pages/index', false, true)
		);

		$this->load->view('main_view', $data);
	}
}
