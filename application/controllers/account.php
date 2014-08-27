<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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