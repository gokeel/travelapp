<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webfront extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('homepage');
		$this->load->view('footer');
		
		//$this->load->view('homepage');
	}
	
	public function paketwisata(){
		$this->load->view('header');
		$this->load->view('wisata');
		$this->load->view('footer');
	}
	
	public function agen(){
		$this->load->view('header');
		$this->load->view('agen');
		$this->load->view('footer');
	}
	
	public function hotel(){
		$this->load->view('header');
		$this->load->view('hotel');
		$this->load->view('footer');
	}
	
	public function tentang(){
		$this->load->view('header');
		$this->load->view('tentang');
		$this->load->view('footer');
	}
	
	public function promo(){
		$this->load->view('header');
		$this->load->view('promo');
		$this->load->view('footer');
	}
	
		public function kontak(){
		$this->load->view('header');
		$this->load->view('kontak');
		$this->load->view('footer');
	}
	
		public function paketdetailbelitung(){
		$this->load->view('header');
		$this->load->view('paketdetailbelitung');
		$this->load->view('footer');
	}
	
	public function paketdetailrajaampat(){
		$this->load->view('header');
		$this->load->view('paketdetailrajaampat');
		$this->load->view('footer');
	}
	
		public function registrasi(){
		$this->load->view('header');
		$this->load->view('registrasi');
		$this->load->view('footer');
	}
	
	public function pesanpaket(){
		$this->load->view('header');
		$this->load->view('pesanpaket');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */