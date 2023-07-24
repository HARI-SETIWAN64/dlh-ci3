<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan_model extends CI_Model {

	//PEENDAFTAR JALUR PRESTASI
	function get_perusahaan_list($where,$limit,$offset,$like)
	{
		$this->db->select('
			master_perusahaan.alamat, 
			master_perusahaan.kab, 
			kec.NAMA_KEC, 
			kel.NAMA_KEL, 
			master_perusahaan.nib, 
			master_perusahaan.perlin, 
			master_perusahaan.ipal, 
			master_perusahaan.npwp, 
			master_perusahaan.nama, 
			master_perusahaan.telp, 
			master_perusahaan.email, 
			master_perusahaan.jenis_usaha
		');
		if($where)
		{
			$this->db->where($where);
		}

        if ($like) {
            $this->db_sikd->group_start();
            $this->db_sikd->or_like($like);
            $this->db_sikd->group_end();
        }
		$this->db->order_by('nama','asc');
		$this->db->where('soft_delete','0');
		$this->db->join('kec','master_perusahaan.no_kec = kec.NO_KEC', 'left');
		$this->db->join('kel','master_perusahaan.no_kel = kel.NO_KEL AND kec.NO_KEC = kel.NO_KEC', 'left');

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
}
