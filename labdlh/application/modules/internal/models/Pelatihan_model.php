<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelatihan_model extends CI_Model {

	function get_list($where,$limit,$offset,$like)
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
		$this->db->order_by('tgl','asc');

		return $this->db->get('users_pelatihan', $limit, $offset);
	}


	function get_list_total($where,$like)
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
		return $this->db->get('users_pelatihan');
	}
}
