<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	
	
	function user_unit()
	{
		$this->db->select('a.*,b.nama_unit', FALSE);
		$this->db->where('a.is_unit','1');
		$this->db->order_by('id','desc');
		$this->db->join('appl_unit_kerja as b','b.kode_unit = a.unit','LEFT');		
		return $this->db->get('users as a');	
	}	



	function user_umum()
	{
		$this->db->select('a.*', FALSE);
		$this->db->where('a.is_unit <> "1"');
		$this->db->order_by('id','desc');	
		return $this->db->get('users as a');	
	}	


	function option_unit()
	{
		$K=$this->db->query("select * from skpd_master");

		$data[''] = '';
		foreach ($K->result_array() as $row)
		{
			$data[$row['KODE_OPD']] = $row['KODE_BAGIAN'].' - '.$row['NAMA_OPD'];
		}

		$K->free_result();
		return $data;
	} 	
	
	public function get_kgtn($where)
	{
		$this->db->from('konten');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			$fields = $this->db->list_fields('konten');
			$all_obj = new stdClass;
			foreach ($fields as $field)
			{
				$all_obj->$field='';
			}
			return $all_obj;
		}
	}
	function get_field_table($table)
	{
			$fields = $this->db->list_fields($table);
			$all_obj = new stdClass;
			foreach ($fields as $field)
			{
				$all_obj->$field = '';
			}
			return $all_obj;
	}
	public function get_emskab($kode,$tahunpil)
	{
		$dpa_query = $this->db->query("SELECT * FROM emskab_kgtn WHERE KD_DPA = $kode AND TAHUN = $tahunpil GROUP BY ID");
		return $dpa_query;
	}
	function kgtn_dpa_emskab_list($where,$like,$limit,$offset)
	{
		$this->db->select('a.*');			
		if($where)
		{
			$this->db->where($where);
		}	
		if($like)
		{
			$this->db->like($like);
		}		
		$this->db->order_by('a.ID','DESC');
		return $this->db->get('emskab_kgtn as a',$limit,$offset);	
	}
	function emskab_img0_list($where,$like,$limit,$offset)
	{
		$this->db->select('a.*');			
		if($where)
		{
			$this->db->where($where);
		}	
		if($like)
		{
			$this->db->like($like);
		}		
		$this->db->order_by('a.ID','DESC');
		return $this->db->get('emskab_img_0 as a',$limit,$offset);	
	}
	function emskab_img50_list($where,$like,$limit,$offset)
	{
		$this->db->select('a.*');			
		if($where)
		{
			$this->db->where($where);
		}	
		if($like)
		{
			$this->db->like($like);
		}		
		$this->db->order_by('a.ID','DESC');
		return $this->db->get('emskab_img_50 as a',$limit,$offset);	
	}
	function emskab_img100_list($where,$like,$limit,$offset)
	{
		$this->db->select('a.*');			
		if($where)
		{
			$this->db->where($where);
		}	
		if($like)
		{
			$this->db->like($like);
		}		
		$this->db->order_by('a.ID','DESC');
		return $this->db->get('emskab_img_100 as a',$limit,$offset);	
	}
	function emskab_map_list($where,$like,$limit,$offset)
	{
		$this->db->select('a.*');			
		if($where)
		{
			$this->db->where($where);
		}	
		if($like)
		{
			$this->db->like($like);
		}		
		$this->db->order_by('a.id','DESC');
		return $this->db->get('emskab_map as a',$limit,$offset);	
	}

}?>