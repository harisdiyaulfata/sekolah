<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        	$this->load->model(array('m_mapel', 'm_siswa'));
		
		if (!$this->session->userdata('nisn')) {
			redirect('login');
		}
	}
	public function index() {
		$data['aktif'] = "";
		$data['data_get'] = $this->m_mapel->getmapel();
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/home');
	}

		function profil(){
		$da = $this->m_mapel->getmapel();
		$data['data_get'] = $da;
		$ds = $this->m_siswa->get_siswa($this->session->userdata('id_d_kelas'));
		$data['data'] = $ds;
		
		$data['aktif'] = "Profil";
		$data['data_t'] = $this->m_mapel->getprofil();
        $this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/template/profil', $data);
    }

	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}