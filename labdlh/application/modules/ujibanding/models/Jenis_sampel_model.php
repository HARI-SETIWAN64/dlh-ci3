<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_sampel_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_jenis_sampel_list($where,$limit,$offset,$like)
	{
		$this->db->select('*');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		$this->db->order_by('nama','asc');
		$this->db->where('soft_delete','0');

		return $this->db->get('master_jenis_sampel', $limit, $offset);
	}


	function get_jenis_sampel_list_total($where,$like)
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
		$this->db->where('soft_delete','0');

		return $this->db->get('master_jenis_sampel');
	}

	function dropdown_jenis_sampel()
	{
		$K=$this->db->query("SELECT * from master_jenis_sampel where soft_delete=0");
			$data[''] = '== Pilih Jenis Sampel ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['kode']] = $row['nama'];
			}
		$K->free_result();
		return $data;
	}
}
