<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kata_mutiara_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_kata_mutiara_list($where,$limit,$offset,$like)
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
		$this->db->order_by('id_kata_mutiara','asc');

		return $this->db->get('kata_mutiara', $limit, $offset);
	}


	function get_kata_mutiara_list_total($where,$like)
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

		return $this->db->get('kata_mutiara');
	}
}
