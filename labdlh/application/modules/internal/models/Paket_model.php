<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paket_model extends CI_Model {

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

	function get_paket_list($where,$limit,$offset,$like)
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
		$this->db->order_by('date_create','desc');
		//$this->db->where('create_by', 1);

		return $this->db->get('master_paket', $limit, $offset);
	}


	function get_paket_list_total($where,$like)
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

		return $this->db->get('master_paket');
	}

	function data_parameter($id)
	{
		$this->db->select('master_parameter.*');
		$this->db->from('master_parameter');
		$this->db->join("(SELECT * FROM master_paket_parameter WHERE master_paket_id='$id') a", 'master_parameter.id = a.master_parameter_id', 'left');
		$query = $this->db->get()->result();
		return $query;
	}



	function dropdown_jenis_paket_sampel()
	{
		$K=$this->db->query("SELECT * from master_paket where soft_delete=0");
			$data[''] = '== Pilih Jenis Paket ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['nama_paket'];
			}
		$K->free_result();
		return $data;
	}
}
