<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_absensi extends CI_Model {
	
	var $table = 'siswa';
	var $column_order = array('siswa.NISN','siswa.NAMA_SISWA','siswa.JENIS_KELAMIN',null);
	var $column_search = array('siswa.NISN','siswa.NAMA_SISWA');
	var $order = array('siswa.NISN' => 'desc');
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	private function datatables_query($kelas)
	{
		$this->db->select('*');
		$this->db->from('siswa, d_kelas, kelas, absensi, d_absensi');
		$this->db->where('siswa.NISN = d_kelas.NISN');
		$this->db->where('kelas.ID_KELAS = d_kelas.ID_KELAS');
		$this->db->where('d_kelas.ID_D_KELAS = d_absensi.ID_D_KELAS');
		$this->db->where('absensi.ID_ABSENSI = d_absensi.ID_ABSENSI');
		$this->db->where('d_kelas.STATUS_KELAS', 'Aktif');
		$this->db->where('siswa.STATUS_SISWA', 'Aktif');
		$this->db->where('d_kelas.ID_KELAS', $kelas);
		$this->db->like('d_absensi.TGL_D_ABSENSI', date("Y-m-d"));
			

		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value']) // for search
			{
				if($i===0)
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables($kelas)
	{
		$this->datatables_query($kelas);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	function count_filtered($kelas)
	{
		$this->datatables_query($kelas);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('NISN',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function update($where, $data)
	{
		$this->db->like('TGL_D_ABSENSI', date("Y-m-d"));
		$this->db->update('d_absensi', $data, $where);
		return $this->db->affected_rows();
	}
	public function delete_by_id($id)
	{
		$this->db->where('NISN', $id);
		$this->db->delete($this->table);
	}
	function cek_sama($lempar) {
		$ambil = $this->db->get($this->table);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				if($lempar == $data->NISN) {
					$hasil = false;
					break;
				} else {
					$hasil = true;
				}
			}
		} else {
			$hasil = true;
		}
		return $hasil;
	}
	function terbesar() {
		$ambil = $this->db->get($this->table);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$hasil = $data->NISN;
			}
			return $hasil;
		}
	}
	function get_absen(){
		$this->db->select('d_kelas.ID_D_KELAS');
		$this->db->from('siswa, d_kelas, kelas');
		$this->db->where('siswa.NISN = d_kelas.NISN');
		$this->db->where('kelas.ID_KELAS = d_kelas.ID_KELAS');
		$this->db->where('d_kelas.STATUS_KELAS', 'Aktif');
		$this->db->where('siswa.STATUS_SISWA', 'Aktif');

		return $this->db->get()->result();

	}
	function first_save($id,$date){
		$absen = $this->get_absen();
		foreach ($absen as $dt) {
			$data = array(
				'ID_D_KELAS' => $dt->ID_D_KELAS,
				'ID_ABSENSI' => $id,
				'TGL_D_ABSENSI' => $date
			);
			$this->db->insert('d_absensi', $data);	
		}
		return $this->db->insert_id();
	}
	function cek_absen($date){
		$this->db->like('TGL_D_ABSENSI', date("Y-m-d"));
		return	$this->db->get('d_absensi')->num_rows();

	}

	function get_kode_absensi(){
	return	$this->db->get('absensi')->result();
	}
	
	function view_absen($id)
	{
		$this->db->select('*');
		$this->db->from('absensi, d_absensi');
		$this->db->where('d_absensi.ID_ABSENSI = absensi.ID_ABSENSI');
		$this->db->where('d_absensi.ID_D_KELAS', $id);
		return $this->db->get()->result();
	}

	function get_siswa($id)
	{
		$this->db->select('*');
		$this->db->from('siswa, d_kelas, kelas');
		$this->db->where('siswa.NISN = d_kelas.NISN');
		$this->db->where('kelas.ID_KELAS = d_kelas.ID_KELAS');
		$this->db->where('d_kelas.STATUS_KELAS', 'Aktif');
		$this->db->where('siswa.STATUS_SISWA', 'Aktif');
		$this->db->where('d_kelas.ID_D_KELAS', $id);
		return $this->db->get()->result();
		
	}

}