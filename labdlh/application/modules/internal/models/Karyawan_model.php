<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('users.*, groups.description');
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
		$this->db->join('users_groups','users.id = users_groups.user_id');
		$this->db->join('groups','users_groups.group_id = groups.id');
		$this->db->where('groups.`name` IN ("analis","manager_teknis","ka_lab","admin_pelayanan")');
		$this->db->order_by('first_name','asc');

		return $this->db->get('users', $limit, $offset);
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
		$this->db->join('users_groups','users.id = users_groups.user_id');
		$this->db->join('groups','users_groups.group_id = groups.id');
		$this->db->where('groups.`name` IN ("analis","manager_teknis","ka_lab","admin_pelayanan")');

		return $this->db->get('users');
	}



	function dropdown_pegawai()
	{
		$K=$this->db->query("SELECT users.* FROM users INNER JOIN users_groups ON users.id = users_groups.user_id INNER JOIN `groups` ON users_groups.group_id = groups.id  WHERE (`groups`.`name` = 'analis' or `groups`.`name` = 'admin_pelayanan') and users.active='1'");
			$data[''] = ' Pilih Karyawan';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['first_name'];
			}
		$K->free_result();
		return $data;
	}
}


