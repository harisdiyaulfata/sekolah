<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_soal extends CI_Model {
	
	var $table = 'mapel';
	var $column_order = array('NAMA_MAPEL',null);
	var $column_search = array('NAMA_MAPEL');
	var $order = array('ID_MAPEL' => 'desc');
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	private function datatables_query()
	{
		$this->db->from($this->table);
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
	function get_datatables()
	{
		$this->datatables_query();
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
	function count_filtered()
	{
		$this->datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function view_soal($where)
	{
		$this->db->where($where);
		$query = $this->db->get('soal');
		return $query->result();
	}
	public function save($data)
	{
		$this->db->insert('soal', $data);
		return $this->db->insert_id();
	}
	public function delete_by_id($where)
	{
		$this->db->where($where);
		$this->db->delete('soal');
	}
	function terbesar() {
		$ambil = $this->db->get('soal');
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$hasil = $data->ID_SOAL;
			}
			return $hasil;
		}
	}
	function get_num_rows() {
		$ambil = $this->db->get('soal');
		return $ambil->num_rows();
	}
}