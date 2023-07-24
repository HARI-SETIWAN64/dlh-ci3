<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_jabatan_list($where,$limit,$offset,$like)
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

		return $this->db->get('master_jabatan', $limit, $offset);
	}


	function get_jabatan_list_total($where,$like)
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

		return $this->db->get('master_jabatan');
	}


    function get_dropdown_users($where=FALSE, $notnull=FALSE) {

        $this->db->select('users.id, users.first_name, groups.description');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->join('groups', 'users_groups.group_id = groups.id');
        if($where <> null){
        	$this->db->where($where);
        }
        $this->db->where_in("groups.name", array("Analis", "Manager Teknis", "Ka Lab", "Admin Pelayanan"));
        $data = $this->db->get('users');

        $list = array();
        if($notnull=="0"){
            $list[''] = ' Silahkan Pilih ';
        }

        foreach ($data->result_array() as $row) {
            $list[$row['id']] = $row['first_name']." [".$row['description']."]";
        }

        $data->free_result();
        return $list;
    }
}
