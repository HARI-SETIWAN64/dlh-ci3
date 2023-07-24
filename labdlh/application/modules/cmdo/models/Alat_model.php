<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alat_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_alat_list($where,$limit,$offset,$like)
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
		$this->db->order_by('nama_alat','asc');
		$this->db->where('soft_delete','0');

		return $this->db->get('alat', $limit, $offset);
	}


	function get_alat_list_total($where,$like)
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

		return $this->db->get('alat');
	}

	function dropdown_alat()
	{
		$K=$this->db->query("SELECT * from alat where soft_delete=0");
			$data[''] = '== Pilih Alat ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['nama_alat']] = $row['nama_alat'];
			}
		$K->free_result();
		return $data;
	}

	function getdataalat()
	{
		$query = $this->db->query("SELECT * FROM alat ORDER BY nama_alat ASC");
		
		return $query->result();
	}

}
