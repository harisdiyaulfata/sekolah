<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal extends CI_Controller {

	function __construct() {
        parent::__construct();
		
		$this->load->model(array('m_soal'));
		
		if (!$this->session->userdata('u_admin')) {
			redirect('');
		}
	}
	
	public function index()
	{
		$data['id_ujian'] = $this->input->get('ujian');
		$data['id_kelas'] = $this->input->get('kelas');
		$data['ujian'] = $this->input->get('n_ujian');
		$data['kelas'] = $this->input->get('n_kelas');
		$head = $this->input->get('n_ujian')." Kelas ".$this->input->get('n_kelas');
		$data['aktif'] = $head;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/soal/v_soal', $data);
	}
	
	public function in_soal()
	{
		$data = array(
			"mapel" => $this->input->post('id_mapel')
		);
		
		echo json_encode($data);
	}
	
	public function lis()
	{
		$list = $this->m_soal->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dt->NAMA_MAPEL;
			
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Tambah" onclick="add('."'".$dt->ID_MAPEL."'".')"><i class="glyphicon glyphicon-plus"></i></a>
					  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="view('."'".$dt->ID_MAPEL."'".')"><i class="glyphicon glyphicon-eye-open"></i></a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delet('."'".$dt->ID_MAPEL."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_soal->count_all(),
			"recordsFiltered" => $this->m_soal->count_filtered(),
			"data" => $data
		);
		echo json_encode($output);
	}
	
	function save() {
		if($this->m_soal->get_num_rows() == 0){
			$kode = 999377;
		} else {
			$kode = $this->m_soal->terbesar();
			$kode++;
		}
		for($i = 1; $i <= 50; $i++) {
			if($this->input->post('soal'.$i.'') != "") {
				$data = array(
					'ID_SOAL' => $kode,
					'ID_TPUJIAN' => $this->input->post('id_ujian'),
					'ID_KELAS' => $this->input->post('id_kelas'),
					'ID_MAPEL' => $this->input->post('id_mapel'),
					'SOAL' => $this->input->post('soal'.$i.''),
					'PLH1' => $this->input->post('plh1'.$i.''),
					'PLH2' => $this->input->post('plh2'.$i.''),
					'PLH3' => $this->input->post('plh3'.$i.''),
					'PLH4' => $this->input->post('plh4'.$i.''),
					'JWB' => $this->input->post('jwb'.$i.''),
					'TGL_SOAL' => date("Y-m-d")
				);
				$insert = $this->m_soal->save($data);
				$kode++;
			} else {
				break;
			}
		}
		echo json_encode(array("status" => TRUE));
	}
	
	public function add()
	{
		$id = $_GET['a'];
		$kelas = $_GET['b'];
		$ujian = $_GET['c'];
		$where = array('ID_MAPEL' => $id, 'ID_KELAS' => $kelas, 'ID_TPUJIAN' => $ujian);
		$list = $this->m_soal->view_soal($where);
		if($list == NULL) {
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}
	
	function view() {
		$id = $_GET['a'];
		$kelas = $_GET['b'];
		$ujian = $_GET['c'];
		$where = array('ID_MAPEL' => $id, 'ID_KELAS' => $kelas, 'ID_TPUJIAN' => $ujian);
		$list = $this->m_soal->view_soal($where);
		
		$soal = '';
		$no = 0;
		if($list != NULL) {
			$soal = $soal.'<table width="100%">';
			foreach ($list as $dt) {
				$no++;
				$soal = $soal. '<tr>
							<td colspan="2"><b>'.$no.'. '.$dt->SOAL.'</b></td>
						</tr>
						<tr>
							<td>A. '.$dt->PLH1.'</td>
							<td>C. '.$dt->PLH3.'</td></tr>
						<tr>
							<td>B. '.$dt->PLH2.'</td>
							<td>D. '.$dt->PLH4.'</td>
						</tr>
						<tr>
							<td colspan="2"> <b>Jawaban :</b> '.$dt->JWB.'</td>
						</tr>
						<tr height="20px">
							<td colspan="2"></td>
						</tr>';
			}
			$soal = $soal.'</table>';
		} else {
			$soal = ' ';
		}
		
		echo json_encode($soal);
	}
	
	public function delet()
	{
		$id = $_GET['a'];
		$kelas = $_GET['b'];
		$ujian = $_GET['c'];
		$where = array('ID_MAPEL' => $id, 'ID_KELAS' => $kelas, 'ID_TPUJIAN' => $ujian);
		$this->m_soal->delete_by_id($where);
		echo json_encode(array("status" => TRUE));
	}
}
