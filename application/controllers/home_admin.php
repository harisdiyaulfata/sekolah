<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_admin extends CI_Controller {
    
	function __construct() {
        parent::__construct();
		
		if (!$this->session->userdata('u_admin')) {
			redirect('');
		}
	}
	public function index() {
		$aktif['aktif'] = "";
		$this->load->view('admin/template/header', $aktif);
		$this->load->view('admin/home');
	}
	function logout() {
        $this->session->sess_destroy();
        redirect('login_admin');
    }
}

