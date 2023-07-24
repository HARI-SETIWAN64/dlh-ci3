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
		$this->db->join("(SELECT id_sim_tarif_pajak, uraian_tarif_pajak, nilai_tarif_pajak FROM epad_sim_tarif_pajak WHERE `groups`='dlh' and is_new = '1') as epad_sim_tarif_pajak", 'master_parameter.sim_tarif_pajak_id = epad_sim_tarif_pajak.id_sim_tarif_pajak', 'left');

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

	function tarif()
	{
		$tarif=$this->db->query("SELECT * from epad_sim_tarif_pajak where `groups`='dlh' and is_new = '1'");
		$data[''] = '';

		foreach ($tarif->result_array() as $row)
		{
			$data[$row['id_sim_tarif_pajak']] = "[".$row['nilai_tarif_pajak']."] ".$row['uraian_tarif_pajak'];
		}
		$tarif->free_result();
		return $data;
	}


	function analis()
	{
		$K=$this->db->query("SELECT users.* FROM users INNER JOIN users_groups ON users.id = users_groups.user_id INNER JOIN `groups` as g ON users_groups.group_id = g.id  WHERE g.`name` = 'analis'");
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
