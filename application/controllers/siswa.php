<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct() {
        parent::__construct();
		
		$this->load->model(array('m_siswa'));
		
		if (!$this->session->userdata('u_admin')) {
			redirect('');
		}
	}
	
	public function index()
	{
		$data['aktif'] = "Kelola Siswa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/siswa/v_siswa', $data);
	}
	
	public function lis()
	{
		$cek = 'kelola';
		$list = $this->m_siswa->get_datatables($cek);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dt->NISN;
			$row[] = $dt->NAMA_SISWA;
			$row[] = $dt->JENIS_KELAMIN;
			$row[] = $dt->AGAMA_SISWA;
			$row[] = $dt->ALAMAT_SISWA;
			$row[] = $dt->KELAS;
			
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$dt->NISN."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-default" href="javascript:void(0)" title="Reset Password" onclick="reset('."'".$dt->NISN."'".')"><i class="glyphicon glyphicon-refresh"></i></a>';
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_siswa->count_all(),
			"recordsFiltered" => $this->m_siswa->count_filtered($cek),
			"data" => $data
		);
		echo json_encode($output);
	}
	
	public function data()
	{
		$data['aktif'] = "Siswa";
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/siswa/d_siswa', $data);
	}
	
	public function lis_data()
	{
		$cek = 'data';
		$list = $this->m_siswa->get_datatables($cek);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dt->NISN;
			$row[] = $dt->NAMA_SISWA;
			$row[] = $dt->JENIS_KELAMIN;
			$row[] = $dt->AGAMA_SISWA;
			$row[] = $dt->ALAMAT_SISWA;
			$row[] = $dt->STATUS_SISWA;
			if($dt->STATUS_SISWA != 'Lulus') {
				if($dt->STATUS_SISWA == 'Aktif') {
					$roww = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Non-Aktifkan" onclick="non_aktif('."'".$dt->NISN."'".')"><i class="glyphicon glyphicon-remove"></i></a>';
				} else {
					$roww = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Aktifkan" onclick="aktif('."'".$dt->NISN."'".')"><i class="glyphicon glyphicon-ok"></i></a>';
				}
			} else {
				$roww = '';
			}
			$row[] = $roww; 
			
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_siswa->count_all(),
			"recordsFiltered" => $this->m_siswa->count_filtered($cek),
			"data" => $data
		);
		echo json_encode($output);
	}
	
	public function add() {
		$list = $this->m_siswa->get_kelas();
		$data = '<option value="">--Pilih--</option>';
		foreach ($list as $dt) {
			$data = $data .'<option value="'.$dt->ID_KELAS.'">'.$dt->KELAS.'</option>';
		}
		echo json_encode($data);
	}
	
	public function delet()
	{
		$status = $this->input->get('status');
		$id = $this->input->get('nisn');
		$data = array('STATUS_SISWA' => $status);
		$this->m_siswa->delete_by_id(array('NISN' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function reset($id)
	{
		$data = array('PASSWORD' => md5(12345678));
		$this->m_siswa->delete_by_id(array('NISN' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}
	
	function save() {
		$nisn = $this->input->post('nisn');
		if($this->m_siswa->cek_sama($nisn) == false) {
			
		} else {
			if($this->m_siswa->get_num_rows() == 0){
				$kode = 5278;
			} else {
				$kode = $this->m_siswa->terbesar();
				$kode++;
			}
			$data = array(
				'NISN' => $nisn,
				'NAMA_SISWA' => $this->input->post('nama_siswa'),
				'JENIS_KELAMIN' => $this->input->post('jenis_kelamin'),
				'AGAMA_SISWA' => $this->input->post('agama_siswa'),
				'ALAMAT_SISWA' => $this->input->post('alamat_siswa'),
				'PASSWORD' => md5($this->input->post('password')),
				'STATUS_SISWA' => 'Aktif',
				'NAMA_AYAH' => $this->input->post('nama_ayah'),
				'NAMA_IBU' => $this->input->post('nama_ibu'),
				'ALAMAT_ORTU' => $this->input->post('alamat_ortu'),
				'PEKERJAAN_AYAH' => $this->input->post('pekerjaan_ayah'),
				'PEKERJAAN_IBU' => $this->input->post('pekerjaan_ibu'),
				'TLP_AYAH' => $this->input->post('tlp_ayah'),
				'TLP_IBU' => $this->input->post('tlp_ibu'),
				'NAMA_WALI' => $this->input->post('nama_wali'),
				'ALAMAT_WALI' => $this->input->post('alamat_wali'),
				'PEKERJAAN_WALI' => $this->input->post('pekerjaan_wali'),
				'TLP_WALI' => $this->input->post('tlp_wali'),
			);
			$data_k =  array(
				'ID_D_KELAS' => $kode,
				'ID_KELAS' => $this->input->post('kelas'),
				'NISN' => $nisn,
				'STATUS_KELAS' => 'Aktif',
				'TAHUN_D_KELAS' => date('Y')
			);
			$insert = $this->m_siswa->save($data);
			$insert_k = $this->m_siswa->save_k($data_k);
			echo json_encode(array("status" => TRUE));
		}
	}
	
	public function edit($id)
	{
		$data = $this->m_siswa->get_by_id($id);
		echo json_encode($data);
	}
	
	function update() {
		$nisn = $this->input->post('nisn');
		$data = array(
			'NAMA_SISWA' => $this->input->post('nama_siswa'),
			'JENIS_KELAMIN' => $this->input->post('jenis_kelamin'),
			'AGAMA_SISWA' => $this->input->post('agama_siswa'),
			'ALAMAT_SISWA' => $this->input->post('alamat_siswa'),
			'NAMA_AYAH' => $this->input->post('nama_ayah'),
			'NAMA_IBU' => $this->input->post('nama_ibu'),
			'ALAMAT_ORTU' => $this->input->post('alamat_ortu'),
			'PEKERJAAN_AYAH' => $this->input->post('pekerjaan_ayah'),
			'PEKERJAAN_IBU' => $this->input->post('pekerjaan_ibu'),
			'TLP_AYAH' => $this->input->post('tlp_ayah'),
			'TLP_IBU' => $this->input->post('tlp_ibu'),
			'NAMA_WALI' => $this->input->post('nama_wali'),
			'ALAMAT_WALI' => $this->input->post('alamat_wali'),
			'PEKERJAAN_WALI' => $this->input->post('pekerjaan_wali'),
			'TLP_WALI' => $this->input->post('tlp_wali')
		);
		$this->m_siswa->update(array('NISN' => $nisn), $data);
		echo json_encode(array("status" => TRUE));
	}
}
