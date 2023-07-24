<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Footer_model extends CI_Model {

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

		return $this->db->get('master_footer', $limit, $offset);
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

		return $this->db->get('master_footer');
	}
}
