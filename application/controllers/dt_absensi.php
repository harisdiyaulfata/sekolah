<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dt_absensi extends CI_Controller {

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
		$head = $this->input->get('n_absensi')." Kelas ".$this->input->get('n_kelas');
		$data['aktif'] = $head;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/absensi/d_absensi', $data);
	}
	
	public function lis($kelas)
	{
		$list = $this->m_absensi->get_datatables($kelas);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $dt) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $dt->NISN;
			$row[] = $dt->NAMA_SISWA;
			$row[] = $dt->JENIS_KELAMIN;
			
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="view('."'".$dt->ID_D_KELAS."'".')"><i class="glyphicon glyphicon-eye-open"></i></a>';
			
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

	function view() {
		$id = $_GET['d_kelas'];
		$dt_absen = $this->m_absensi->view_absen($id);
		$siswa = $this->m_absensi->get_siswa($id);
		
		$absen = '';
		$no = 0;
		if($dt_absen != NULL) {
			if($siswa != NULL){
				foreach ($siswa as $value) {
					$absen = $absen.'<table width="100%" border="0">
							<tr>
								<td colspan="2">NISN</td>
								<td> :  '.$value->NISN.'</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="2">NAMA</td>
								<td> :  '.$value->NAMA_SISWA.'</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="2">Kelas</td>
								<td> :  '.$value->KELAS.'</td>
								<td></td>
							</tr>
							<tr height="20px">
								<td colspan="4"></td>
							</tr>
							<tr>
								<th width="5%">No</th>
								<th colspan="2">Tanggal Absensi</th>
								<th>Keterangan</th>
							</tr>';
				}				
			}
			
			foreach ($dt_absen as $dt) {
				$no++;
				$absen = $absen. '<tr>
							<td>'.$no.'.</td>
							<td colspan="2">'.$dt->TGL_D_ABSENSI.'</td>
							<td>'.$dt->STATUS_ABSENSI.'</td>
						</tr>
						<tr height="20px">
							<td colspan="4"></td>
						</tr>';
			}
			$absen = $absen.'</table>';
		} else {
			$absen = ' ';
		}
		
		echo json_encode($absen);
	}
	

}
