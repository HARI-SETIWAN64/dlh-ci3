<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail_alat_model extends CI_Model {

	function get_list($where,$limit,$offset,$like)
	{
		$this->db->select('detail_alat.*, alat.nama_alat,spek_alat.kode_alat,spek_alat.brand,spek_alat.model,spek_alat.noseri,users.first_name');
		if($where)
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->or_like($like);
		}
		// $this->db->where('id_footer','0');
		$user_id = $this->session->userdata('user_id');
		$group = $this->db->query("SELECT `groups`.* FROM users_groups INNER JOIN `groups` ON users_groups.group_id = groups.id where user_id='".$user_id."'")->row();

		if($group->name == 'admin' or $group->name == 'manager_teknis' or $group->name == 'analis'){
		}else{
			$this->db->where(array('create_by'=>$user_id));
		}
		$this->db->join('alat','alat.id_alat = detail_alat.id_alat');
		// $this->db->order_by('alat.id_alat','asc');
		$this->db->join('spek_alat','spek_alat.id_spek = detail_alat.id_spek');
		// $this->db->order_by('spek_alat.id_spek','asc');
		$this->db->join('users','users.id = detail_alat.user_id');
		$this->db->order_by('detail_alat.nextcal','asc');
	

		return $this->db->get('detail_alat', $limit, $offset);
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
		// $this->db->where('id_footer','0');
		$this->db->join('alat','alat.id_alat = detail_alat.id_alat');
		$this->db->join('spek_alat','spek_alat.id_spek = detail_alat.id_spek');
		$this->db->join('users','users.id = detail_alat.user_id');
		// $this->db->where('soft_delete','0');


		return $this->db->get('detail_alat');
	}

	function TampilDataX()
	{
		$this->db->order_by('id_detail', 'ASC');
		// Menghitung jumlah baris yang dikembalikan
        return $this->db->from('detail_alat')
          ->join('alat', 'alat.id_alat=detail_alat.id_alat' )
		  ->join('spek_alat', 'spek_alat.id_spek=detail_alat.id_spek')
		  ->join('users','users.id = detail_alat.user_id')
		//   ->limit(10, 5)
          ->get()
          ->result();
	}

	// function TampilDataF()
	// {
	// 	$this->db->where('id_detail');
    //     return $this->db->from('detail_alat')
    //       ->join('alat_footer', 'alat_footer.id_footer=detail_alat.id_footer' )
    //       ->get()
    //       ->result();
	// }


	function cari($id){
        $query= $this->db->get_where('spek_alat',array('id_spek'=>$id));
        return $query;
    }
    
    function get_objects_calender($where=null, $like=null) {
	
        $this->db->select("nextcal as start, nextcal as end, concat(nama_alat, ' (', kode_alat, ')') as title, detail_alat.*, alat.nama_alat, spek_alat.kode_alat");
        if ($where) {
            $this->db->where($where);
        }
        if ($like) {
            $this->db->or_like($like);
        }	
		
		$this->db->join('alat','alat.id_alat = detail_alat.id_alat');
		$this->db->order_by('alat.id_alat','asc');
		$this->db->join('spek_alat','spek_alat.id_spek = detail_alat.id_spek');
		$this->db->order_by('spek_alat.id_spek','asc');
		
        $data = $this->db->get('detail_alat')->result();
        return $data;
    }

	// function alldata()
	// {
	// 	return $this->db->get_where('spek_alat')->get()->getResultArray();
	// }
}

