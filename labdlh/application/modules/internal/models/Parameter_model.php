<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parameter_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_parameter_list($where,$limit,$offset,$like)
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
		$this->db->order_by('parameter','asc');
		$this->db->where('soft_delete','0');

		return $this->db->get('master_parameter', $limit, $offset);
	}


	function get_parameter_list_total($where,$like)
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

		return $this->db->get('master_parameter');
	}

	function dropdown_parameter()
	{
		$K=$this->db->query("SELECT * from master_parameter where soft_delete=0");
			$data[''] = '';

			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['parameter'];
			}
		$K->free_result();
		return $data;
	}


    function analis()
    {
		$K=$this->db->query("SELECT users.* FROM users INNER JOIN users_groups ON users.id = users_groups.user_id INNER JOIN groups ON users_groups.group_id = groups.id  WHERE groups.`name` = 'analis'");
		// $data[''] = '';

		foreach ($K->result_array() as $row)
		{
			$data[$row['id']] = $row['first_name'];
		}
		$K->free_result();
		return $data;
    }

	function data_parameter()
	{
		return $this->db->query("SELECT * from master_parameter where soft_delete=0")->result();
	}
}
