<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penugasan_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('ppc_penugasan.*, users.first_name,ppc_jenis_tugas.jenis_tugas');
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
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

		$user_id = $this->session->userdata('user_id');
		$group = $this->db->query("SELECT `groups`.* FROM users_groups INNER JOIN `groups` ON users_groups.group_id = groups.id where user_id='".$user_id."'")->row();

		if($group->name == 'admin' or $group->name == 'analis' or $group->name == 'admin_pelayanan' or $group->name == 'manager_teknis'){
		}else{
			$this->db->where(array('create_by'=>$user_id));
		}

		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');
		$this->db->order_by('ppc_penugasan.id','DESC');

		return $this->db->get('ppc_penugasan', $limit, $offset);
		
		// print_r($this->db->last_query());die;
	}

	function get_list_total($where,$like)
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
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');

		return $this->db->get('ppc_penugasan');
	}

	function dropdown_jenis_tugas()
	{
		$K=$this->db->query("SELECT * from ppc_jenis_tugas where soft_delete=0");
			$data[''] = '== Pilih Jenis Tugas ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['jenis_tugas'];
			}
		$K->free_result();
		return $data;
	}
}
