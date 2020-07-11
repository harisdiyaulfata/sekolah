<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_mapel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getmapel() {
		$ambil = $this->db->get('mapel');
		return $ambil->result();
	}

	function getujian() {
		$ambil = $this->db->get('tpujian');
		return $ambil->result();
	}

	function getsoal($where){
		$this->db->where($where);
		$ambil = $this->db->get('soal');
		return $ambil->result();
	}

	public function save_k($data)
	{
		$this->db->insert('h_ujian', $data);
		return $this->db->insert_id();
	}

	function getprofil(){
		$ambil = $this->db->get('siswa');
		return $ambil->result();
	}

	function cek_nilai($id_d_kelas, $id_mapel, $id_ujian){
		$query = $this->db->query('SELECT f.NILAI_H_UJIAN from d_kelas a, kelas b, tpujian d, mapel e, h_ujian f WHERE a.ID_D_KELAS = "'.$id_d_kelas.'" AND a.ID_KELAS = b.ID_KELAS AND e.ID_MAPEL = "'.$id_mapel.'" AND e.ID_MAPEL = f.ID_MAPEL AND a.ID_D_KELAS = f.ID_D_KELAS AND f.ID_TPUJIAN = "'.$id_ujian.'" AND d.ID_TPUJIAN = "'.$id_ujian.'";');
		return $query->result();
	}
}