<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	function __construct() {
        parent::__construct();
		
		$this->load->model(array('m_absensi'));
		
		if (!$this->session->userdata('u_admin')) {
			redirect('');
		}
	}
	
	public function index()
	{
		$data['id_kelas'] = $this->input->get('kelas');
		//date_default_timezone_set('Asia/Jakara');
		$date = date("Y-m-d H:i:s");
		$id_absensi = $this->input->get('absen');
		if($this->m_absensi->cek_absen($date) == 0){
			$this->m_absensi->first_save($id_absensi,$date);
		}
		
		$head = $this->input->get('n_absensi')." Kelas ".$this->input->get('n_kelas');
		$data['aktif'] = $head;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/absensi/v_absensi', $data);
	}
	
	public function lis($kelas)
	{
		$list = $this->m_absensi->get_datatables($kelas);
		$absen = $this->m_absensi->get_kode_absensi();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dt->NISN;
			$row[] = $dt->NAMA_SISWA;
			$row[] = $dt->JENIS_KELAMIN;
			$roww = '<i class="glyphicon glyphicon-ok"></i>';
			$Hadir = '';
			$Izin = '';
			$Sakit = '';
			$Alfa = '';

			foreach ($absen as $value) {
				if($value->ID_ABSENSI == $dt->ID_ABSENSI){
					if($value->STATUS_ABSENSI == 'Hadir') {
						$Hadir = $roww;

					}else if($value->STATUS_ABSENSI == 'Izin') {
						$Izin = $roww;

					}else if($value->STATUS_ABSENSI == 'Sakit') {
						$Sakit = $roww;

					}else{
						$Alfa = $roww;
					}
				}
			}		
			
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hadir" onclick="kehadiran('."'".$dt->ID_D_KELAS."', '500'".')">'.$Hadir.' Hadir</a>
				  <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Izin" onclick="kehadiran('."'".$dt->ID_D_KELAS."', '501'".')">'.$Izin.' Izin</i></a>
				  <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Alfa" onclick="kehadiran('."'".$dt->ID_D_KELAS."', '502'".')">'.$Sakit.' Sakit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Alfa" onclick="kehadiran('."'".$dt->ID_D_KELAS."', '503'".')">'.$Alfa.' Alfa</a>';
			
			$data[] = $row;

		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->m_absensi->count_all(),
			"recordsFiltered" => $this->m_absensi->count_filtered($kelas),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function status()
	{
		$kelas = $this->input->get('kelas');
		$absen = $this->input->get('absensi');
		$data = array('ID_ABSENSI' => $absen);
		$this->m_absensi->update(array('ID_D_KELAS' => $kelas), $data);
		echo json_encode(array("status" => TRUE));
	}

}