<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpps_parameter_model extends CI_Model {

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

	function get_fpps_parameter_list($where,$limit,$offset,$like)
	{
		$this->db->select('a.*, b.parameter, c.first_name');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		$this->db->join('users c','a.users_analis=c.id');
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

		return $this->db->get('fpps_parameter a', $limit, $offset);
	}

	function get_fpps_parameter_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		$this->db->join('users c','a.users_analis=c.id');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		// $this->db->where('soft_delete','0');

		return $this->db->get('fpps_parameter a');
	}

	function get_objek_fpps_parameter($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		return $this->db->get('fpps_parameter')->row();
	}

	function data_parameter_inner($id)
	{
		$nomor = $this->db->query("select * from fpps where id='$id'")->row('nomor');
		$this->db->select('master_parameter.*, a.nomor, a.no_sampel');
		$this->db->from('master_parameter');
		$this->db->join("(SELECT fpps_parameter.parameter_id, fpps.no_sampel, fpps.nomor FROM fpps_parameter INNER JOIN fpps ON fpps_parameter.fpps_id = fpps.id WHERE fpps_id='$id') a", 'master_parameter.id = a.parameter_id', 'left');
		$this->db->where("a.parameter_id is null");
		$query = $this->db->get();

		$data[''] = '== Pilih Jenis Parameter ==';
		foreach ($query->result_array() as $row)
		{
			$data[$row['id']] = $row['parameter'];
		}
		$query->free_result();
		return $data;
	}

	function get_veri_pajak_list($where,$limit,$offset,$like)
	{
		$this->db->select('a.*, b.parameter, b.harga, c.uraian_tarif_pajak, c.nilai_tarif_pajak');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		$this->db->join('epad_sim_tarif_pajak c','b.sim_tarif_pajak_id=c.id_sim_tarif_pajak', 'left');
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

		return $this->db->get('fpps_parameter a', $limit, $offset);
	}

	function get_veri_pajak_list_total($where,$like)
	{

		$this->db->select('count(*) as count');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		$this->db->join('epad_sim_tarif_pajak c','b.sim_tarif_pajak_id=c.id_sim_tarif_pajak', 'left');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		// $this->db->where('soft_delete','0');

		return $this->db->get('fpps_parameter a');
	}

	function get_pajak($id)
	{
		$this->db->select('*');
		$this->db->join('master_parameter b','a.parameter_id=b.id');
		$this->db->join('epad_sim_tarif_pajak c','b.sim_tarif_pajak_id=c.id_sim_tarif_pajak', 'left');
		$this->db->where('a.fpps_id',$id);
		return $this->db->get('fpps_parameter a')->result();
	}
}
