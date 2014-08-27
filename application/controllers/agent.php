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
		$this->load->view('agent_home');
		$this->load->view('agent_navigation');
	}
}
?>