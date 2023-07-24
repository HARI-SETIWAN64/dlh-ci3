<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lhus_parameter_model extends CI_Model {

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

	function get_lhus_parameter_list($where,$limit,$offset,$like)
	{
		$this->db->select('a.*, b.parameter, b.metode');
		$this->db->join('master_parameter b', 'b.id = a.parameter_id');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		// $this->db->order_by('date_create','desc');
		// $this->db->where('soft_delete','0');

		return $this->db->get('lhus_parameter a', $limit, $offset);
	}


	function get_lhus_parameter_list_total($where,$like)
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
		// $this->db->where('soft_delete','0');

		return $this->db->get('lhus_parameter');
	}
}
