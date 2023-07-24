<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaduan_model extends CI_Model {

	function get_pengaduan_list($where,$limit,$offset,$like)
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
		$this->db->order_by('id','desc');

		return $this->db->get('pengaduan', $limit, $offset);
	}


	function get_pengaduan_list_total($where,$like)
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

		return $this->db->get('pengaduan');
	}
}
