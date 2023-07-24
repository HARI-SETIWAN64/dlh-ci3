<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spek_alat_model extends CI_Model {

	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('spek_alat.*, alat.nama_alat');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}

		// $user_id = $this->session->userdata('user_id');
		// $group = $this->db->query("SELECT `groups`.* FROM users_groups INNER JOIN `groups` ON users_groups.group_id = groups.id where user_id='".$user_id."'")->row();

		// if($group->name == 'admin' or $group->name == 'manager_teknis' or $group->name == 'ka_lab'){
		// }else{
		// 	$this->db->where(array('create_by'=>$user_id));
		// }

		$this->db->join('alat','alat.id_alat = spek_alat.id_alat');
		$this->db->order_by('alat.id_alat','DESC');
		$this->db->order_by('spek_alat.id_spek','DESC');

		return $this->db->get('spek_alat', $limit, $offset);
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
		$this->db->join('alat','alat.id_alat = spek_alat.id_alat');
		// $this->db->join('users','users.id = penilaian.user_id');

		return $this->db->get('spek_alat');
	}

	function dropdown_spek_alat()
	{
		$K=$this->db->query("SELECT * from alat where soft_delete=0");
			$data[''] = '== Pilih Alat ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id_alat']] = $row['nama_alat'];
			}
		$K->free_result();
		return $data;
	}
    
    // function get_objects_calender($where=null, $like=null) {
    //     $this->db->select("mulai as start, sampai as end, penilaian as title, uraian as description, 'true' as allDay, color");
    //     if ($where) {
    //         $this->db->where($where);
    //     }
    //     if ($like) {
    //         $this->db->or_like($like);
    //     }

    //     $data = $this->db->get('penilaian')->result();
    //     return $data;
    // }
}
