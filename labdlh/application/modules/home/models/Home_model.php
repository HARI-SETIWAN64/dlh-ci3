<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	private $limit = 5;
	function get_page_kat()
	{
		//Model Home
	}

	function get_page($limit, $start){

		$this->db->where('catid !=','4');
		$this->db->order_by('id','desc');

		return $this->db->get('konten', $limit, $start);
	}

	

	function get_count_page($like){
		$this->db->select('*');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like($like);
		}
		$this->db->where('catid !=','4');
		$this->db->order_by('id','desc');

		return $this->db->get('konten')->num_rows();
	}

	function get_active_opd()
	{
		$K=$this->db->query("select * from skpd_master ORDER BY KODE_BAGIAN ASC");			
			foreach ($K->result_array() as $row)
			{
				$data[$row['KODE_OPD']] = $row['NAMA_OPD'];
			}

		$K->free_result();
		return $data;
	} 	
	function get_opd_select($kode)
	{
		$K=$this->db->query("select * from skpd_master where KODE_OPD = $kode ORDER BY KODE_BAGIAN ASC");			
			foreach ($K->result_array() as $row)
			{
				$data[$row['KODE_OPD']] = $row['NAMA_OPD'];
			}

		$K->free_result();
		return $data;
	}

	function get_home_list($where,$limit,$offset,$like)
	{
		$this->db->select('*');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like($like);
		}
		$this->db->where('catid !=','4');
		$this->db->order_by('s.nama','asc');

		return $this->db->get('konten', $limit, $offset);
	}

	function get_home_list_total($where,$like)
	{
		$this->db->select('count(*) as count');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like($like);
		}
		$this->db->where('catid!=','4');

		return $this->db->get('konten');
	}
}
