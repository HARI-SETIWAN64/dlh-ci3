<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lhu_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
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

	function get_lhu_list($where,$limit,$offset,$like)
	{
		$this->db->select('*, REPLACE(nomor, "FPPS", "LHU") as no_lhu');
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
		// $this->db->where('soft_delete','0');

		return $this->db->get('fpps', $limit, $offset);
	}


	function get_lhu_list_total($where,$like)
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

		return $this->db->get('fpps');
	}


	function get_lhu_parameter($fpps_id)
	{

		$this->db->select('master_parameter.parameter as nama,master_parameter.metode,fpps_parameter.*');
		$this->db->where('fpps_id',$fpps_id);
		$this->db->join('master_parameter','fpps_parameter.parameter_id=master_parameter.id');

		return $this->db->get('fpps_parameter');
	}
}
