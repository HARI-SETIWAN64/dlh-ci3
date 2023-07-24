<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugas_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_tugas_list($where,$limit,$offset,$like)
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
		$this->db->order_by('tugas','asc');
		$this->db->where('ppc_tugas.soft_delete','0');

		return $this->db->get('ppc_tugas', $limit, $offset);
	}


	function get_tugas_list_total($where,$like)
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
		$this->db->where('ppc_tugas.soft_delete','0');

		return $this->db->get('ppc_tugas');
	}
}
