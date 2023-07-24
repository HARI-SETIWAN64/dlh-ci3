<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lhus_model extends CI_Model {

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

	function get_lhus_list($where,$limit,$offset,$like,$order)
	{
		$this->db->select('fpps.*, REPLACE(nomor, "FPPS", "LHUS") as no_lhus, b.lhus_satuan, b.lhus_baku_mutu, b.lhus_hasil, b.lhus_spesifikasi_metode, b.lhus_keterangan, b.id as id_parameter, b.lhus_date_create as lhus_date_create, c.parameter, d.first_name');
		$this->db->join('fpps_parameter b','b.fpps_id=fpps.id');
		$this->db->join('master_parameter c','c.id=b.parameter_id');
		$this->db->join('users d','b.users_analis=d.id');
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

		if ($this->ion_auth->in_group(array('analis'))){
			$this->db->where(array("users_analis"=>$this->session->userdata('user_id')));
		}


		$this->db->order_by('fpps.date_create',$order);
		$this->db->where('validasi_stp','1');

		$data = $this->db->get('fpps', $limit, $offset);
		// print_r($this->db->last_query());die();
		return $data;
	}


	function get_lhus_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		$this->db->join('fpps_parameter b','b.fpps_id=fpps.id');
		$this->db->join('master_parameter c','c.id=b.parameter_id');
		$this->db->join('users d','b.users_analis=d.id');
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

		if ($this->ion_auth->in_group(array('analis'))){
			$this->db->where(array("users_analis"=>$this->session->userdata('user_id')));
		}


		$this->db->order_by('fpps.date_create','desc');
		$this->db->where('validasi_stp','1');

		return $this->db->get('fpps');
	}

	function get_lhus_persetujuan_list($where,$limit,$offset,$like)
	{
		$id_s = $this->db->query("SELECT fpps_id FROM fpps_parameter WHERE fpps_parameter.lhus_hasil IS NULL GROUP BY fpps_parameter.fpps_id ORDER BY fpps_parameter.fpps_id ASC")->result();
		$where_fpps=array();
		foreach ($id_s as $id) {
			$where_fpps[] = $id->fpps_id;  
		}

		$this->db->select('fpps.*, REPLACE(nomor, "FPPS", "LHUS") as no_lhus, b.lhus_satuan, b.lhus_baku_mutu, b.lhus_hasil, b.lhus_spesifikasi_metode, b.lhus_keterangan, b.id as id_parameter, b.lhus_date_create as lhus_date_create, c.parameter, d.first_name');
		$this->db->join('fpps_parameter b','b.fpps_id=fpps.id');
		$this->db->join('master_parameter c','c.id=b.parameter_id');
		$this->db->join('users d','b.users_analis=d.id');
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

		if ($this->ion_auth->in_group(array('analis'))){
			$this->db->where(array("users_analis"=>$this->session->userdata('user_id')));
		}


		$this->db->where_not_in('fpps_id', $where_fpps);
		$this->db->order_by('fpps.date_create','ASC');
		$this->db->where('validasi_stp','1');

		$data = $this->db->get('fpps', $limit, $offset);
		// print_r($this->db->last_query());die();
		return $data;
	}


	function get_lhus_persetujuan_list_total($where,$like)
	{
		$id_s = $this->db->query("SELECT fpps_id FROM fpps_parameter WHERE fpps_parameter.lhus_hasil IS NULL GROUP BY fpps_parameter.fpps_id ORDER BY fpps_parameter.fpps_id ASC")->result();
		$where_fpps=array();
		foreach ($id_s as $id) {
			$where_fpps[] = $id->fpps_id;  
		}

		$this->db->select('count(*) as count');
		$this->db->join('fpps_parameter b','b.fpps_id=fpps.id');
		$this->db->join('master_parameter c','c.id=b.parameter_id');
		$this->db->join('users d','b.users_analis=d.id');
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

		if ($this->ion_auth->in_group(array('analis'))){
			$this->db->where(array("users_analis"=>$this->session->userdata('user_id')));
		}


		$this->db->where_not_in('fpps_id', $where_fpps);
		$this->db->order_by('fpps.date_create','desc');
		$this->db->where('validasi_stp','1');

		return $this->db->get('fpps');
	}
}
