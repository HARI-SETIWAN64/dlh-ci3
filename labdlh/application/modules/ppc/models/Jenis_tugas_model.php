<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_tugas_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_jenis_tugas_list($where,$limit,$offset,$like)
	{
		$this->db->select('ppc_jenis_tugas.*, ppc_tugas.tugas');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		$this->db->order_by('jenis_tugas','asc');
		$this->db->where('ppc_jenis_tugas.soft_delete','0');
		$this->db->join('ppc_tugas','ppc_tugas.id = ppc_jenis_tugas.tugas_id');

		return $this->db->get('ppc_jenis_tugas', $limit, $offset);
	}


	function get_jenis_tugas_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		$this->db->where('ppc_jenis_tugas.soft_delete','0');
		$this->db->join('ppc_tugas','ppc_tugas.id = ppc_jenis_tugas.tugas_id');

		return $this->db->get('ppc_jenis_tugas');
	}

	function dropdown_tugas()
	{
		$K=$this->db->query("SELECT * from ppc_tugas where soft_delete=0");
			$data[''] = '== Pilih Tugas ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['tugas'];
			}
		$K->free_result();
		return $data;
	}
}
