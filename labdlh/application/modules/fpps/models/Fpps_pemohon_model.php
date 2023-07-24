<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpps_pemohon_model extends CI_Model {

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

	function get_fpps_list($where,$limit,$offset,$like)
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

		return $this->db->get('fpps', $limit, $offset);
	}


	function get_fpps_list_total($where,$like)
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

		return $this->db->get('fpps');
	}

	//invalid
	function get_fpps_invalid_list($where,$limit,$offset,$like)
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
        // $this->db->group_start();
        $this->db->or_where_in('validasi_fpps', array('0', '2'));
        // $this->db->group_end();

		return $this->db->get('fpps', $limit, $offset);
	}


	function get_fpps_invalid_list_total($where,$like)
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
        // $this->db->group_start();
        $this->db->or_where_in('validasi_fpps', array('0', '2'));
        // $this->db->group_end();
		// $this->db->where('soft_delete','0');

		return $this->db->get('fpps');
	}

	function data_parameter($id)
	{
		$this->db->select('master_parameter.*, fpps.nomor, a.fpps_id');
		$this->db->from('master_parameter');
		$this->db->where(array("soft_delete"=>"0"));
		$this->db->join("(SELECT * FROM fpps_parameter WHERE fpps_id='$id') a", 'master_parameter.id = a.parameter_id', 'left');
		$this->db->join("fpps", 'fpps.id = a.fpps_id', 'left');
		$query = $this->db->get()->result();
		return $query;
		// print_r($this->db->last_query());die();
	}

	function pelanggan($title){
        $this->db->like('first_name', $title , 'both');
        $this->db->order_by('first_name', 'ASC');
        $this->db->limit(10);
        return $this->db->get('users')->result();
    }

	function timeline($fpps_id=null, $proses=null, $keterangan=null){
		$kirim['fpps_id'] = $fpps_id;
		$kirim['proses'] = $proses;
		$kirim['keterangan'] = $keterangan;
		$kirim['date_create'] = date('Y-m-d H:i:s', strtotime('NOW'));
		$kirim['create_by'] = $this->session->userdata('user_id');
		$this->db->insert('fpps_timeline',$kirim);
    }
}
