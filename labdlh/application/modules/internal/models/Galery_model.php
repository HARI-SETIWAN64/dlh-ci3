<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galery_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_list($where,$limit,$offset,$like)
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
		$this->db->order_by('date_create','desc');

		return $this->db->get('galery', $limit, $offset);
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

		return $this->db->get('galery');
	}

	function dropdown_jenis_sampel()
	{
		$K=$this->db->query("SELECT * from master_jenis_sampel where soft_delete=0");
			$data[''] = '== Pilih Jenis Sampel ==';
			foreach ($K->result_array() as $row)
			{
				$data[$row['kode']] = $row['nama'];
			}
		$K->free_result();
		return $data;
	}

    
    function get_objects_calender($where=null, $like=null) {
        $this->db->select("mulai as start, sampai as end, galery as title, uraian as description, 'true' as allDay, color");
        if ($where) {
            $this->db->where($where);
        }
        if ($like) {
            $this->db->or_like($like);
        }

        $data = $this->db->get('galery')->result();
        return $data;
    }
}
