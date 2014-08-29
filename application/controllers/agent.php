<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	public function __construct() {
		parent::__construct();

        $this->load->helper('form');
        $this->load->model('users');
		$this->load->model('agents');
		$this->load->model('bank');	
	}
	
	public function home(){
		$this->page('agent_home');
		
	}
	
	function page($page_request){
		$this->load->view('agent_header');
		$this->load->view($page_request);
		$this->load->view('agent_navigation');
	}
	
	public function order_page(){
		$this->page('agent_add_order');
	}
}
?>