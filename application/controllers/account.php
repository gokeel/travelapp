<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function profile()
	{
		$this->load->view('header');
		$this->load->view('myaccount_leftmenu');
		$this->load->view('myaccount_profile');
		$this->load->view('footer');
	}
	
	public function order()
	{
		$this->load->view('header');
		$this->load->view('myaccount_leftmenu');
		$this->load->view('myaccount_order');
		$this->load->view('footer');
	}
	
	public function confirmpayment()
	{
		$this->load->view('header');
		$this->load->view('myaccount_leftmenu');
		$this->load->view('myaccount_confirmpayment');
		$this->load->view('footer');
	}
	
	public function changepasswd()
	{
		$this->load->view('header');
		$this->load->view('myaccount_leftmenu');
		$this->load->view('myaccount_changepassword');
		$this->load->view('footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */