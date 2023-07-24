<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujibanding_detail_model extends CI_Model {

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
		$this->db->select('a.*, b.parameter');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		$this->db->order_by('date_create','desc');
		// $this->db->where('soft_delete','0');

		return $this->db->get('ujibanding_detail a', $limit, $offset);
	}

	function get_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		// $this->db->where('soft_delete','0');

		return $this->db->get('ujibanding_detail a');
	}
}
