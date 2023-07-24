<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{


    var $table = 'pengaduan';
    var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array('title','metakey'); //set column field database for datatable searchable
    var $order = array('id'=>'desc'); // default order


	private $limit = 5;

	function get_page($where, $limit, $start){

		$this->db->where($where);
		$this->db->order_by('id','desc');

		return $this->db->get('pengaduan', $limit, $start);
	}

    function last_pegaduan(){
        $this->db->select('*');
        $this->db->limit('10');
        $this->db->order_by('created','desc');
        return $this->db->get('pengaduan');
    }

}
