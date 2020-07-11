<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin extends CI_Controller {
    function __construct() {
        parent::__construct();
		
		if(!isset($_SESSION)){
			session_start();
		}
        if ($this->session->userdata('u_admin')) {
            redirect('home_admin');
        }
    }
    function index() {
		$this->load->view('admin/login_admin');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login_admin');
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = $usr;
            $p = md5($psw);
			$this->load->model(array('m_admin'));
            $cek = $this->m_admin->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['kode_admin'] = $qad->KODE_ADMIN;
                    $sess_data['nama_admin'] = $qad->NAMA_ADMIN;
                    $sess_data['u_admin'] = $qad->U_ADMIN;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('home_admin');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login_admin');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login_admin');
    }
}?>