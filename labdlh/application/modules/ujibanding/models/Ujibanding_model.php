<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ujibanding_model extends CI_Model {

	//valid
	function get_field_table($table)
	{
			$fields = $this->db->list_fields($table);
			$all_obj = new stdClass;
			foreach ($fields as $field)
			{
				$all_obj->$field = '';
			}
			return $all_obj;
	}

	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('a.*, b.nama as jenis_sampel');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
	        $this->db->group_start();
			$this->db->or_like($like);
	        $this->db->group_end();
		}
		
		$this->db->order_by('date_create','desc');
		$this->db->join('master_jenis_sampel as b', 'b.id = a.sampel_id');
		return $this->db->get('ujibanding as a', $limit, $offset);
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
	        $this->db->group_start();
			$this->db->or_like($like);
	        $this->db->group_end();
		}
		$this->db->join('master_jenis_sampel as b', 'b.id = a.sampel_id');

		return $this->db->get('ujibanding as a');
	}
}
