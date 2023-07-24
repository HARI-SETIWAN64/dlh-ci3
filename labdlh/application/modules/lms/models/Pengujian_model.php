<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pengujian_model extends CI_Model
{

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where, $limit, $offset, $like)
	{
		$this->db->select('a.*, b.nama as jenis_sampel');
		if ($where) {
			$this->db->where($where);
		}
		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		$this->db->order_by('date_create', 'desc');
		$this->db->where('jenis_dokumen', 'Pengujian');
		$this->db->join('master_jenis_sampel as b', 'b.id = a.sampel_id');

		return $this->db->get('lms_teknis as a', $limit, $offset);
	}


	function get_list_total($where, $like)
	{

		$this->db->select('count(*) as count');
		if ($where) {
			$this->db->where($where);
		}
		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		$this->db->join('master_jenis_sampel as b', 'b.id = a.sampel_id');

		return $this->db->get('lms_teknis as a');
	}


	function dropdown_jenis_sampel()
	{
		$K = $this->db->query("SELECT * from master_jenis_sampel where soft_delete=0");
		$data[''] = '== Pilih Jenis Sampel ==';
		foreach ($K->result_array() as $row) {
			$data[$row['id']] = $row['nama'];
		}
		$K->free_result();
		return $data;
	}
}