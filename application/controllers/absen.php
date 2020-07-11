<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {
    
	function __construct() {
        parent::__construct();
        	$this->load->model(array('m_absensi', 'm_mapel'));
		
		if (!$this->session->userdata('nisn')) {
			redirect('');
		}
	}
	public function index() {
		$da = $this->m_mapel->getmapel();
		$data['data_get'] = $da;
		$data['aktif'] = "Kehadiran";
		$data['send'] = $this->m_absensi->view_absen($this->session->userdata('id_d_kelas'));
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/absensi/v_absen', $data);
	}
}