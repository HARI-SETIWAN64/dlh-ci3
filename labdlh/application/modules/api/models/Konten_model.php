<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konten_model extends CI_Model
{

	function slider($where, $like)
	{
		$this->db->select("*, CONCAT('http://labdlh.banyuwangikab.go.id/images/konten/',images) as url_image ");
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
	        $this->db->group_start();
			$this->db->like($like);
	        $this->db->group_end();
		}
		$this->db->like('alias', 'slider', 'after'); 
		$this->db->order_by('modified','DESC');
		$query = $this->db->get('konten');
		return $query;

		print_r($this->db->last_query());
	}

}
