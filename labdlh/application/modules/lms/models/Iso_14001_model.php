<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Iso_14001_model extends CI_Model
{

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where, $limit, $offset, $like)
	{
		$this->db->select('*');
		if ($where) {
			$this->db->where($where);
		}
		if ($like) {
			$this->db->or_like($like);
		}
		$this->db->order_by('date_create', 'desc');
		$this->db->where('jenis_dokumen', 'Iso-14001');

		return $this->db->get('lms_manajemen', $limit, $offset);
	}


	function get_list_total($where, $like)
	{

		$this->db->select('count(*) as count');
		if ($where) {
			$this->db->where($where);
		}
		if ($like) {
			$this->db->or_like($like);
		}

		return $this->db->get('lms_manajemen');
	}
}