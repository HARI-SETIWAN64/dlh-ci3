<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dropdown extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function kelurahanx($kec=NULL,$val=NULL)
    {
  		if($kec == ''){
  		}else{
  			$kel=$this->base_model->get_kel_list($kec);

  			//echo $this->db->last_query();
  			echo form_dropdown('no_kel',$kel,$val,'id="no_kel"  class="form-control input-sm" onchange="get_items()"');
  		}

    }

    function kabupaten($prop,$val=NULL)
    {
      $kab=$this->base_model->get_kab($prop);
    	//echo json_encode($kab);
      echo form_dropdown('no_kab',$kab,$val,'id="no_kab" onchange="getKec()" class="form-control input-sm"');
    }

    function kecamatan($prop,$kab,$val=NULL)
    {
      $kec=$this->base_model->get_kec($prop,$kab);
      echo form_dropdown('no_kec',$kec,$val,'id="no_kec" onchange="getKel()" class="form-control input-sm"');
    }

    function kelurahanxx($prop,$kab,$kec=NULL,$val=NULL)
    {
      if($kec == NULL){
      }else{
      	$kel=$this->base_model->get_kel($prop,$kab,$kec);
      	echo form_dropdown('no_kel',$kel,$val,'id="no_kel"  class="form-control input-sm" onchange="get_items()"');
      }
    }

    // function kelurahan($prop,$kab,$kec=NULL,$val=NULL)
    // {
    //   if($kec == NULL){
    //   }else{
    //   	$kel=$this->base_model->get_kel($prop,$kab,$kec);
    //   	echo form_dropdown('NO_KEL',$kel,$val,'id="NO_KEL"  class="form-control input-sm" onchange="get_items()"');
    //   }
    // }


    

    function kelurahan($kec=NULL,$val=NULL)
    {
      if($kec == NULL){
      }else{
        // $kel = $this->base_model->get_kel($prop,$kab,$kec);
        $kel = $this->base_model->get_kel('35','10',$kec);
        echo form_dropdown('no_kel',$kel,$val,'id="no_kel"  class="form-control input-sm" onchange="get_items()"');
      }
    }

    function kelurahan_no_load($kec=NULL,$val=NULL)
    {
      if($kec == NULL){
      }else{
        // $kel = $this->base_model->get_kel($prop,$kab,$kec);
        $kel = $this->base_model->get_kel('35','10',$kec);
        echo form_dropdown('no_kel',$kel,$val,'id="no_kel"  class="form-control input-sm"');
      }
    }
}
