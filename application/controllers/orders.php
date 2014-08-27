<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function price_passenger()
	{
		$this->load->view('header');
		$this->load->view('price_passenger');
		$this->load->view('footer');
	}
}