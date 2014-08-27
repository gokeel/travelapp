<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webfront extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
		
		//$this->load->view('homepage');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */