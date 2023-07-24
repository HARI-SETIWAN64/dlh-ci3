<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paket_parameter_model extends CI_Model {

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

	function get_paket_parameter_list($where,$limit,$offset,$like)
	{
		$this->db->select('a.*, b.parameter');
		$this->db->join('master_parameter b','a.master_parameter_id=b.id');
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

		return $this->db->get('master_paket_parameter a', $limit, $offset);
	}


	function get_paket_parameter_list_total($where,$like)
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
		return $this->db->get('master_paket_parameter a');
	}



	function data_parameter_inner($id)
	{
		$this->db->select('a.*');
		$this->db->from('master_parameter a');
		$this->db->join("(SELECT * FROM master_paket_parameter WHERE master_paket_id='$id') b", 'a.id = b.master_parameter_id', 'left');
		$this->db->where("b.master_parameter_id is null");
		$query = $this->db->get();

		$data[''] = '== Pilih Jenis Parameter ==';
		foreach ($query->result_array() as $row)
		{
			$data[$row['id']] = $row['parameter'];
		}
		$query->free_result();
		return $data;
	}
}
