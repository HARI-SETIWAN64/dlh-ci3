<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Base_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}



	function get_user_unit()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select('a.*', FALSE);
		$this->db->where('a.is_unit','1');
		$this->db->where('a.id',$user_id);
		return $this->db->get('users as a');

	}


	function get_unit()
	{
		$this->db->select('*', FALSE);
		return $this->db->get('appl_unit_kerja');
	}

	function get_unit_id($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		return $this->db->get('appl_unit_kerja');
	}


///paten

	function get_perusahaan_list()
	{
		$K=$this->db->query("select * from master_perusahaan order by nama ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['id']] = $row['nama'];
			}
		$K->free_result();
		return $data;
	}

	function get_kec_list()
	{
		$K=$this->db->query("select * from kec where NO_PROP = '".$this->config->item('NO_PROP')."' AND NO_KAB = '".$this->config->item('NO_KAB')."' order by NO_KEC ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['NO_KEC']] = $row['NAMA_KEC'];
			}
		$K->free_result();
		return $data;
	}

	function get_kel_list($kec)
	{
		$K=$this->db->query("select * from kel where NO_PROP = '".$this->config->item('NO_PROP')."' AND NO_KAB = '".$this->config->item('NO_KAB')."' AND NO_KEC = $kec");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['NO_KEL']] = $row['NAMA_KEL'];
			}
		$K->free_result();
		return $data;
	}

	function get_unit_user()

	{

		// $this->ion_auth->user($this->session->userdata('user_id'));
		$this->db->select('*');
		$this->db->where('id',$this->session->userdata('user_id'));
		return $this->db->get('users');

	}


	function get_prop()
	{
		$K=$this->db->query("select * from setup_prop order by NO_PROP ASC");

			foreach ($K->result_array() as $row)
			{
				$data[$row['NO_PROP']] = $row['NAMA_PROP'];
			}

		$K->free_result();
		return $data;
	}


   	function get_kab($idprop)
	{
		$K=$this->db->query("select * from setup_kab where NO_PROP = '$idprop' order by NO_KAB ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['NO_KAB']] = $row['NAMA_KAB'];
			}

		$K->free_result();
		return $data;
	}



   	function get_kec($idprop,$idkab)
	{
		// $K=$this->db->query("select * from setup_kec where NO_PROP = '$idprop' AND NO_KAB = '$idkab' order by NO_KEC ASC");
		$K=$this->db->query("select * from kec where NO_PROP = '$idprop' AND NO_KAB = '$idkab' order by NO_KEC ASC");
			$data[''] = '';
			foreach ($K->result_array() as $row)
			{
				$data[$row['NO_KEC']] = $row['NAMA_KEC'];
			}

		$K->free_result();
		return $data;
	}


   	function get_kel($idprop,$idkab,$idkec)
	{
		$K=$this->db->query("select * from kel where NO_PROP = '$idprop' AND NO_KAB = '$idkab' AND NO_KEC = '$idkec' order by NO_KEL ASC");
		
		$data[''] = '';
		foreach ($K->result_array() as $row)
		{
			$data[$row['NO_KEL']] = $row['NAMA_KEL'];
		}

		$K->free_result();
		return $data;
	}


	function get_agama()
	{
		$K=$this->db->query("select * from agama_master order by NO ASC");

			foreach ($K->result_array() as $row)
			{
				$data[$row['NO']] = $row['DESCRIP'];
			}

		$K->free_result();
		return $data;
	}


	function get_pkrjn()
	{
		$K=$this->db->query("select * from PKRJN_MASTER order by NO ASC");

			foreach ($K->result_array() as $row)
			{
				$data[$row['NO']] = $row['DESCRIP'];
			}

		$K->free_result();
		return $data;
	}


	function get_pddk()
	{
		$K=$this->db->query("select * from pddkn_master order by NO ASC");

			foreach ($K->result_array() as $row)
			{
				$data[$row['NO']] = $row['DESCRIP'];
			}

		$K->free_result();
		return $data;
	}


	function get_klmin()
	{
		$data = array('1'=>'Laki - Laki','2'=>'Perempuan');
		return $data;
	}

}
