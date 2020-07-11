<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_siswa extends CI_Model {
	
	var $table = 'siswa';
	var $column_order = array('siswa.NISN','siswa.NAMA_SISWA','siswa.JENIS_KELAMIN','siswa.AGAMA_SISWA','siswa.ALAMAT_SISWA','kelas.KELAS',null);
	var $column_search = array('siswa.NISN','siswa.NAMA_SISWA');
	var $order = array('kelas.KELAS' => 'asc', 'siswa.NAMA_SISWA' => 'asc');
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	private function datatables_query($cek)
	{
		$this->db->select('*');
		$this->db->from('siswa, d_kelas, kelas');
		$this->db->where('siswa.NISN = d_kelas.NISN');
		$this->db->where('kelas.ID_KELAS = d_kelas.ID_KELAS');
		$this->db->where('d_kelas.STATUS_KELAS', 'Aktif');
		if($cek == 'kelola') {
			$this->db->where('siswa.STATUS_SISWA', 'Aktif');
		}
		
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
	function get_datatables($cek)
	{
		$this->datatables_query($cek);
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
	function count_filtered($cek)
	{
		$this->datatables_query($cek);
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
	public function get_kelas()
	{
		$query = $this->db->get('kelas');
		return $query->result();
	}
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	public function save_k($data)
	{
		$this->db->insert('d_kelas', $data);
		return $this->db->insert_id();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete_by_id($where, $data)
	{
		$this->db->update('siswa', $data, $where);
		return $this->db->affected_rows();
		/*$this->db->where('NISN', $id);
		$this->db->delete($this->table);*/
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
		$ambil = $this->db->get('d_kelas');
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$hasil = $data->ID_D_KELAS;
			}
			return $hasil;
		}
	}
	function get_num_rows() {
		$ambil = $this->db->get('d_kelas');
		return $ambil->num_rows();
	}
	function get_siswa($kelas){
		$this->db->select('*');
		$this->db->from('siswa, d_kelas, kelas');
		$this->db->where('siswa.NISN = d_kelas.NISN');
		$this->db->where('kelas.ID_KELAS = d_kelas.ID_KELAS');
		$this->db->where('d_kelas.STATUS_KELAS', 'Aktif');
		$this->db->where('d_kelas.ID_D_KELAS', $kelas);
		return $this->db->get()->result();
	}
}