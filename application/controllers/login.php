<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
		
		if(!isset($_SESSION)){
			session_start();
		}
        if ($this->session->userdata('nisn')) {
            redirect('home');
        }
    }
    function index() {
		$this->load->view('frontend/login');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/login');
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = $usr;
            $p = md5($psw);
			$this->load->model(array('m_loginsiswa'));
            $cek = $this->m_loginsiswa->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['nisn'] = $qad->NISN;
                    $sess_data['nama_siswa'] = $qad->NAMA_SISWA;
                    $sess_data['id_kelas'] = $qad->ID_KELAS;
                    $sess_data['id_d_kelas'] = $qad->ID_D_KELAS;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('home');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}?>