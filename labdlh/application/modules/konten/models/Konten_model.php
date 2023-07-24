<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konten_model extends CI_Model
{



    var $table = 'konten';
    var $column_order = array(); //set column field database for datatable orderable
    var $column_search = array('title','metakey'); //set column field database for datatable searchable
    var $order = array('id'=>'desc'); // default order



    private function _get_datatables_query()
    {

       $this->db->select('*');


        if($this->input->post('xxxx'))
        {
            $this->db->where('xxxx', $this->input->post('xxx'));
        }

        if($this->input->post('yyy'))
        {
            $this->db->where('yyy', $this->input->post('yyy'));
        }

        $this->db->from($this->table);
        $i = 0;


        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                   $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
				{
                  $this->db->group_end(); //close bracket
				}
            }
            $i++;
        }
        $this->db->where('state', '1');
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

////



	public function hits_konten($id,$hitplus)
	{

		$data = array(
			'hits' => $hitplus+1
		);
		$this->db->where('id',$id);
		return $this->db->update('konten', $data);
	}

	public function get_konten($where)
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

	function get_konten_list($limit = 10, $offset = 0, $search=0,$key_search){

		$this->db->select('*');
		$this->db->like($key_search,$search);
		$this->db->where('state','1');
        $this->db->where('catid !=','4');
		$this->db->order_by('created','desc');
		return $this->db->get('konten',$limit,$offset,$key_search);
	}

    function last_konten(){
        $this->db->select('*');
        $this->db->where('state','1');
        $this->db->where('catid !=','3');
        $this->db->limit('5');
        $this->db->order_by('created','desc');
        return $this->db->get('konten');
    }

    //start lms_konten lms
	function lms_konten(){
        $this->db->select('*');
        $this->db->where('state','1');
        $this->db->where('catid ','5');
        $this->db->limit('5');
        return $this->db->get('konten');
    }
    //end lms_konten lms

    function slider(){
        $this->db->select('*');
        $this->db->like('title', 'Slider-', 'after');
        $this->db->where('catid','4');
        return $this->db->get('konten');
    }


	function total_konten($search, $key_search){

		$Q = $this->db->query("select * from konten where $key_search LIKE '%$search%' and state = '1'" );

		return $Q->num_rows();

	}
	function get_news_json_list($limit = 10, $offset = 0,$copy)
	{
		$this->db->select('*');
		$this->db->like('title','ekonomi');
		$this->db->order_by('created','desc');
		return $this->db->get('konten', $limit, $offset);
	}

	function get_map(){

		$this->db->select('title, alias');

		$this->db->where('state','1');

		$this->db->order_by('created','desc');
		return $this->db->get('konten');
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



	private $limit = 5;

	function get_page($where, $limit, $start){

		$this->db->where($where);
		$this->db->where('catid !=','4');
		$this->db->order_by('id','desc');

		return $this->db->get('konten', $limit, $start);
	}

	

	function get_count_page($where, $like){
		$this->db->select('*');
		if($where){
			$this->db->where($where);
		}
		if($like){
			$this->db->like($like);
		}
		$this->db->where('catid !=','4');
		$this->db->order_by('id','desc');

		return $this->db->get('konten')->num_rows();
	}



}
