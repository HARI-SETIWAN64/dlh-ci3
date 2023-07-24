<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    function get_alat($idalat)
	{
		// $K=$this->db->query("select * from setup_kec where NO_PROP = '$idprop' AND NO_KAB = '$idkab' order by NO_KEC ASC");
		$K=$this->db->query("select * from alat order by id_alat ASC");

			foreach ($K->result_array() as $row)
			{
				$data[$row['id_alat']] = $row['nama_alat'];
			}

		$K->free_result();
		return $data;
	}


   	function get_spek($idalat)
	{
		$K=$this->db->query("select * from spek_alat where id_alat='".$idalat."' order by kode_alat ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id_spek']] = $row['kode_alat'];
			}

		$K->free_result();
		return $data;
	}

	function get_alat_list()
	{
		$K=$this->db->query("select * from alat where soft_delete=0 order by nama_alat ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id_alat']] = $row['nama_alat'];
			}
		$K->free_result();
		return $data;
	}

	function get_spek_list()
	{
		$K=$this->db->query("select * from spek_alat where id_alat = '".$this->config->item('id_alat')."' order by id_alat");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id_spek']] = $row['kode_alat'];
			}
		$K->free_result();
		return $data;
	}
}
