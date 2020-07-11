<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujian extends CI_Controller {

	function __construct() {
        parent::__construct();
		
		$this->load->model(array('m_mapel'));
		
		if (!$this->session->userdata('nisn')) {
			redirect('');
		}
	}
	
	public function index()
	{
		$id_d_kelas = $this->session->userdata('id_d_kelas');
		$id_mapel=$this->input->get('metpen');
		$uts = $this->m_mapel->cek_nilai($id_d_kelas, $id_mapel, '311');
		$uas = $this->m_mapel->cek_nilai($id_d_kelas, $id_mapel, '312');
		$data['uts'] = $uts;
		$data['uas'] = $uas;
		$da = $this->m_mapel->getmapel();
		$du = $this->m_mapel->getujian();
		$data['data_get'] = $da;
		
		foreach($da as $dt){
			if ($dt->ID_MAPEL==$id_mapel) {
				$hasil=$dt->NAMA_MAPEL;
			}
		}
		$data['aktif'] = "Ujian ".$hasil;
		$data['id_mapel']=$id_mapel;
		$id_ujian=array();
		$nama_ujian=array();
		foreach($du as $dt){
			$id_ujian[]=$dt->ID_TPUJIAN;
			$nama_ujian[]=$dt->NAMA_TPUJIAN;
		}
		$data['id_ujian']=$id_ujian;
		$data['nama_ujian']=$nama_ujian;
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/ujian/v_ujian', $data);
	}

	public function soal(){
		$da = $this->m_mapel->getmapel();
		$du = $this->m_mapel->getujian();
		$data['data_get'] = $da;
		$id_mapel=$this->input->get('metpen');
		$id_ujian=$this->input->get('ujian');
		$id_kelas=$this->session->userdata('id_kelas');
		$where=array(
			'ID_TPUJIAN' => $id_ujian,
			'ID_MAPEL' => $id_mapel,
			'ID_KELAS' => $id_kelas
		);
		$ds = $this->m_mapel->getsoal($where);
		foreach($da as $dt){
			if ($dt->ID_MAPEL==$id_mapel) {
				$hasil=$dt->NAMA_MAPEL;
			}
		}
		foreach($du as $da){
			if ($id_ujian == $da->ID_TPUJIAN) {
				$akhir = $da->NAMA_TPUJIAN;
			}
		}
		$data['id_ujian']=$id_ujian;
		$data['id_mapel']=$id_mapel;
		$data['soal'] = $ds;
		$data['aktif'] = "Ujian ".$hasil;
		$data['aktif_ujian'] = "Ujian ".$hasil." / ".$akhir;
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/ujian/v_soal', $data);
	}
	
	function save() {
		$da = $this->m_mapel->getmapel();
		$data['data_get'] = $da;
		$id_mapel = $this->input->post('id_mapel');
		$id_ujian = $this->input->post('id_ujian');
		$jumlah_soal = $this->input->post('jumlah');
		$salah = 0;
		$benar = 0;
		for ($i=1; $i <= $jumlah_soal ; $i++) { 
			if($this->input->post('radio'.$i.'') == $this->input->post('jawaban'.$i.'')){
				$benar++;
			}
			else{
				$salah++;
			}
		}
		$hasil_akhir = round(($benar/$jumlah_soal)*100, 2);
		$data_k=array(
			'ID_D_KELAS' => $this->session->userdata('id_d_kelas'),
			'ID_MAPEL' => $id_mapel,
			'ID_TPUJIAN' => $id_ujian,
			'NILAI_H_UJIAN' => $hasil_akhir
		);
		$insert_k = $this->m_mapel->save_k($data_k);
		$data['aktif'] = "Hasil Ujian ";
		$data['benar']=$benar;
		$data['salah']=$salah;
		$data['jumlah_soal']=$jumlah_soal;
		$data['hasil_akhir']=$hasil_akhir;
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/ujian/v_hasil', $data);
	}

}

