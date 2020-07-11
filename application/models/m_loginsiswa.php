<?php
class M_Loginsiswa extends CI_Model {

    private $table = "siswa";

    function cek($username, $password) {
        $this->db->select('siswa.*, d_kelas.*');
        $this->db->from('siswa, d_kelas');
        $this->db->where('siswa.NISN', $username);
        $this->db->where('siswa.PASSWORD', $password);
        $this->db->where('d_kelas.NISN', $username);
        return $this->db->get();
    }

    function semua() {
        return $this->db->get("siswa");
    }

    function cekKode($kode) {
        $this->db->where("NISN", $kode);
        return $this->db->get("siswa");
    }

    function cekId($kode) {
        $this->db->where("NISN", $kode);
        return $this->db->get("siswa");
    }
    
    function getLoginData($usr, $psw) {
        $u = mysql_real_escape_string($usr);
        $p = md5(mysql_real_escape_string($psw));
        $q_cek_login = $this->db->get_where('siswa, d_kelas', array('siswa.NISN' => $u, 'siswa.PASSWORD' => $p));
        if (count($q_cek_login->result()) > 0) {
            foreach ($q_cek_login->result() as $qck) {
                foreach ($q_cek_login->result() as $qad) {
                    $sess_data['logged_in'] = 'aingLoginWebYeuh';
                    $sess_data['nisn'] = $qad->NISN;
                    $sess_data['nama_siswa'] = $qad->NAMA_SISWA;
                    $sess_data['id_kelas'] = $qad->ID_KELAS;
                    $sess_data['id_d_kelas'] = $qad->ID_D_KELAS;
                    $sess_data['group'] = $qad->group;
                    $sess_data['rid'] = $qad->rid;
                    $this->session->set_userdata($sess_data);
                }
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
            header('location:' . base_url() . 'login');
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