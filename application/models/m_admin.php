<?php
class M_Admin extends CI_Model {

    private $table = "admin";

    function cek($username, $password) {
        $this->db->where("U_ADMIN", $username);
        $this->db->where("P_ADMIN", $password);
        return $this->db->get("admin");
    }

    function semua() {
        return $this->db->get("admin");
    }

    function cekKode($kode) {
        $this->db->where("U_ADMIN", $kode);
        return $this->db->get("admin");
    }

    function cekId($kode) {
        $this->db->where("KODE_ADMIN", $kode);
        return $this->db->get("admin");
    }
    
    function getLoginData($usr, $psw) {
        $u = mysql_real_escape_string($usr);
        $p = md5(mysql_real_escape_string($psw));
        $q_cek_login = $this->db->get_where('admin', array('username' => $u, 'password' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['kode_admin'] = $qad->KODE_ADMIN;
                    $sess_data['u_admin'] = $qad->U_ADMIN;
                    $sess_data['nama_admin'] = $qad->NAMA_ADMIN;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
                    $this->session->set_userdata($sess_data);
                }
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login_admins');
        }
    }

    function update($id, $info) {
        $this->db->where("KODE_ADMIN", $id);
        $this->db->update("admin", $info);
    }

    function simpan($info) {
        $this->db->insert("admin", $info);
    }

    function hapus($kode) {
        $this->db->where("KODE_ADMIN", $kode);
        $this->db->delete("admin");
    }

}