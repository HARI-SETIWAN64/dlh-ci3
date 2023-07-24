<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('penilaian.*, users.first_name, master_penilaian.keterangan');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}

		$user_id = $this->session->userdata('user_id');
		$group = $this->db->query("SELECT `groups`.* FROM users_groups INNER JOIN `groups` ON users_groups.group_id = groups.id where user_id='".$user_id."'")->row();

		if($group->name == 'admin' or $group->name == 'manager_teknis' or $group->name == 'ka_lab'){
		}else{
			$this->db->where(array('create_by'=>$user_id));
		}

		$this->db->join('master_penilaian','master_penilaian.id = penilaian.master_penilaian_id');
		$this->db->join('users','users.id = penilaian.user_id');
		$this->db->order_by('master_penilaian.id','DESC');
		$this->db->order_by('penilaian.id','DESC');

		return $this->db->get('penilaian', $limit, $offset);
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
		$this->db->join('master_penilaian','master_penilaian.id = penilaian.master_penilaian_id');
		$this->db->join('users','users.id = penilaian.user_id');

		return $this->db->get('penilaian');
	}

	function dropdown_penilaian()
	{
		$K=$this->db->query("SELECT * from master_penilaian where aktif=1");
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['keterangan'];
			}
		$K->free_result();
		return $data;
	}
    
    function get_objects_calender($where=null, $like=null) {
        $this->db->select("mulai as start, sampai as end, penilaian as title, uraian as description, 'true' as allDay, color");
        if ($where) {
            $this->db->where($where);
        }
        if ($like) {
            $this->db->or_like($like);
        }

        $data = $this->db->get('penilaian')->result();
        return $data;
    }
}
