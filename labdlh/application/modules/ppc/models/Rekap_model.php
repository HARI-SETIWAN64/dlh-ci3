<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select("
			ppc_penugasan.jenis_tugas_id,
			ppc_jenis_tugas.jenis_tugas,
			sum(if(status_project = 1 and keterangan= 4, 1, 0)) AS terlambat,
			sum(if(status_project = 3 and keterangan= 4, 1, 0)) AS tepat_waktu
			");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

        $this->db->where('ppc_penugasan.status','3');
		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');
		$this->db->group_by('ppc_penugasan.jenis_tugas_id');
		$this->db->order_by('ppc_penugasan.jenis_tugas_id','asc');

		return $this->db->get('ppc_penugasan', $limit, $offset);
	}

	function get_list_belum($where, $like)
	{
		$this->db->select("
			ppc_penugasan.jenis_tugas_id,
			ppc_jenis_tugas.jenis_tugas,
			sum(if(status = '0' or status = '4', 1, 0)) AS belum_dikerjakan,  
			sum(if(status = '1', 1, 0)) AS sedang_dikerjakan
			");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');
        $this->db->group_by('ppc_penugasan.jenis_tugas_id');
		$this->db->order_by('ppc_penugasan.jenis_tugas_id','asc');

		return $this->db->get('ppc_penugasan');
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


		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');
		$this->db->group_by('ppc_penugasan.jenis_tugas_id');
		$this->db->order_by('ppc_penugasan.jenis_tugas_id','asc');

		return $this->db->get('ppc_penugasan');
	}


    public function data_penugasan($where, $like)
    {
        $this->db->select("
		ppc_penugasan.jenis_tugas_id,
		ppc_jenis_tugas.jenis_tugas,
		sum(if(status = '0' or status = '4', 1, 0)) AS belum_dikerjakan,  
		sum(if(status = '1', 1, 0)) AS sedang_dikerjakan,
		sum(if(status_project = 1 and keterangan= 4, 1, 0)) AS terlambat,
		sum(if(status_project = 3 and keterangan= 4, 1, 0)) AS tepat_waktu
        ");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

		$this->db->join('ppc_jenis_tugas','ppc_jenis_tugas.id = ppc_penugasan.jenis_tugas_id');
		$this->db->join('users','users.id = ppc_penugasan.user_id');
        $this->db->group_by('ppc_penugasan.jenis_tugas_id');
		$this->db->order_by('ppc_penugasan.jenis_tugas_id','asc');

		return $this->db->get('ppc_penugasan');
        // return $this->db->get()->result();
    }
    public function data_rekap_karyawan($where, $like)
    {
        $this->db->select("
		ppc_penugasan.user_id,
		users.first_name,
		sum(if(status = '0' or status = '4', 1, 0)) AS belum_dikerjakan,  
		sum(if(status = '1', 1, 0)) AS sedang_dikerjakan,
		sum(if(status_project = 1 and keterangan= 4, 1, 0)) AS terlambat,
		sum(if(status_project = 3 and keterangan= 4, 1, 0)) AS tepat_waktu
        ");
		if($where)
		{
			$this->db->where($where);
		}

		if ($like) {
			$this->db->group_start();
			$this->db->or_like($like);
			$this->db->group_end();
		}
		if ($this->ion_auth->in_group(array("analis","admin_pelayanan"))){
			$this->db->where(array("users.id"=>$this->session->userdata('user_id')));
		}

		$this->db->join('users','users.id = ppc_penugasan.user_id');
        $this->db->group_by('ppc_penugasan.user_id');
		$this->db->order_by('ppc_penugasan.user_id','asc');

		return $this->db->get('ppc_penugasan');
        // return $this->db->get()->result();
    }
}
