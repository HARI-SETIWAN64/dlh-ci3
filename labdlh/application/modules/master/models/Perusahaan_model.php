<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_perusahaan_list($where,$limit,$offset,$like)
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
		$this->db->order_by('nama','asc');
		$this->db->where('soft_delete','0');

		return $this->db->get('master_perusahaan', $limit, $offset);
	}


	function get_perusahaan_list_total($where,$like)
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

		return $this->db->get('master_perusahaan');
	}

	function dropdown_perusahaan()
	{
		$K=$this->db->query("SELECT * from master_perusahaan where soft_delete=0 order by nama");
			$data[''] = 'Pilih Perusahaan';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['nama']." - (". $row['alamat'].")";
			}
		$K->free_result();
		return $data;
	}

	function get_perusahaan($user_id)
	{
		$p=$this->db->query("SELECT master_perusahaan.* FROM users INNER JOIN master_perusahaan ON users.perusahaan_id = master_perusahaan.id WHERE users.id = '".$user_id."' and soft_delete=0")->row();
		return $p;
	}

	function get_perusahaan_by_id($id)
	{
		$p=$this->db->query("SELECT * from master_perusahaan where id='".$id."'")->row();
		return $p;
	}
}
