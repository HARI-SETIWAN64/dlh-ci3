<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('allow_url_fopen', 1);

class Map extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
        $this->template->set_template('template/admin');
        $this->data = null;

        $this->load->model(array('data/data_model', 'admin/admin_model'));
        $this->data['message'] = $this->session->flashdata('message');
        $data['message'] = $this->session->flashdata('message');
        if (!$this->ion_auth->in_group(array('admin', 'opr_dapodik', 'opr_smp', 'opr_sd'))) {
            redirect('auth/login?continue=' . urlencode(base_url() . 'app/pdd_map'));
        }
    }

    function pdd_maps() {

        $data['id'] = urldecode($_POST['id']);
        $this->load->view('peserta_didik/v_peserta_didik_maps', isset($data) ? $data : NULL);
    }

    public function pdd_map($id = false) {

        if (!$this->ion_auth->in_group(array('admin','opr_sd','opr_smp'))) {
            echo 'Maaf Akun Anda tidak Bisa Menggunakan Layanan ini dikarenakan, Silahkan menghubungi Dinas pendidikan atau Administrator terkait. Terimakasih..';
            die();
        }
         
        $data['kodeid'] = $id;
        $this->load->library('googlemaps');

        $sql = $this->db->query("SELECT * FROM peserta_didik pd where pd.peserta_didik_id='" . $id . "'")->row();
        $data['item'] = $sql;
        $data['unitnya'] = $sql->sekolah_id;
        $sqlmap = $this->db->query("SELECT * FROM peserta_didik_map mp where mp.peserta_didik_id='" . $id . "'");
        $data['mapnya'] = $sqlmap->row();
        $map = $sqlmap->row();

        $sqlsekolah_koordinat = $this->db->query("SELECT * FROM sekolah s where s.lintang <> 0 AND s.sekolah_id='" . $sql->sekolah_id . "'");
        $sekolah_koordinat = $sqlsekolah_koordinat->row();

        if ($sqlmap->num_rows() < 1) {

            $config['onrightclick'] = "insertDatabase(event.latLng.lat(),event.latLng.lng());";

            if ($sql->kode_wilayah) {

                //$config['center'] = '-8.3140933,114.2799936';
                if ($sqlsekolah_koordinat->num_rows() < '1') {

                    $config['center'] = '-8.3140933,114.2799936';
                } else {

                    $config['center'] = $sekolah_koordinat->lintang . ", " . $sekolah_koordinat->bujur;
                }
            } else {
                $config['center'] = '-8.3140933,114.2799936';
            }
            $config['zoom'] = '15';
        } else {
            $config['center'] = $map->lat . ', ' . $map->lng;
            $config['zoom'] = '18';
        }


        $config['mapTypeId'] = 'HYBRID';

        $this->googlemaps->initialize($config);
        if ($sqlmap->num_rows() > 0) {
            $lt = $map->lat;
            $ln = $map->lng;
            $idmap = $map->id;
            $marker['title'] = $id;
            $marker['icon'] = base_url() . 'img/orange.png';
            $marker['draggable'] = true;
            $marker['position'] = $lt . ',' . $ln;
            $marker['onclick'] = 'detailmap("' . $id . '");';
            $marker['onrightclick'] = 'deleteDatabase(' . $idmap . ');';
            $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng(),' . $idmap . ');';


            $this->googlemaps->add_marker($marker);
        }


        $data['map'] = $this->googlemaps->create_map();

        $this->template->title = 'PETA PESERTA DIDIK';
        $data['menu'] = 'cpdd';
        $this->template->description = '';
        $this->template->meta->add('keyword', '');
        $this->template->content->view('peserta/v_peserta_didik_map', $data);
        $this->template->publish();
    }

    function record_insert_map($lat, $lng, $id) {
        $user = $this->session->userdata('email');
        $kirim['lat'] = $lat;
        $kirim['lng'] = $lng;

        $cek = $this->db->query("SELECT * FROM peserta_didik_map where peserta_didik_id = '" . $id . "'");
        if ($cek->num_rows() > 0) {

            $kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
            $kirim['update_by'] = $this->session->userdata('email');
            $kirim['updated_via'] = 'web';
            $this->db->update('peserta_didik_map', $kirim, array('peserta_didik_id' => $id));
        } else {
            $kirim['peserta_didik_id'] = $id;
            $kirim['date_created'] = date('Y-m-d H:i:s', strtotime('NOW'));
            $kirim['created_by'] = $this->session->userdata('email');
            $kirim['created_via'] = 'web';
            $this->db->insert('peserta_didik_map', $kirim);
            $out['status'] = 'success';
            $out['message'] = 'Posisi sudah disimpan';
        }
         echo json_encode($out);
    }
 
    function record_update_map($lat, $lng, $idmap) {
        $cekpeta = $this->db->query('select * from peserta_didik_map where peserta_didik_id = "'.$idmap.'" ')->num_rows();
        if(!$this->ion_auth->in_group(array('admin'))){
            if($cekpeta > 0){
                redirect('data/peserta','refresh');
            }
            $out['status'] = 'error';
            $out['message'] = 'Anda tidak berhak merubah, Silahkan Hubungi Dinas Pendidikan Kab. Banyuwangi';       
        }else{
            $kirim['lat'] = $lat;
            $kirim['lng'] = $lng;
            $kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
            $kirim['update_by'] = $this->session->userdata('email');
            $kirim['updated_via'] = 'web';
            $this->db->update('peserta_didik_map', $kirim, array('id' => $idmap));
            $out['status'] = 'success';
            $out['message'] = 'Posisi sudah berubah';
        }
        echo json_encode($out);
    }

    function record_delete_map($idmap) {
        $cekpeta = $this->db->query('SELECT * from peserta_didik_map where id = "'.$idmap.'" ')->num_rows();
        if(!$this->ion_auth->in_group(array('admin'))){
            $out['status'] = 'error';
            $out['message'] = 'Anda tidak berhak merubah';            
            
        }else{
            if($cekpeta > 0){
                $this->db->delete('peserta_didik_map', array('id' => $idmap));
                $out['status'] = 'success';
                $out['message'] = 'Posisi Sudah terhapus';
                //redirect('data/peserta','refresh');
            }else{ 
                $out['status'] = 'error';
                $out['message'] = 'data tidak ditemukan';
            }
        }
        echo json_encode($out);
    }

    public function map_simpan_manual($id = false) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lat', 'latitude', 'required|xss_clean');
        $this->form_validation->set_rules('lng', 'longitude', 'required|xss_clean');
        if ($id) {
            $user = $this->session->userdata('email');
            $kirim['lat'] = $this->input->post('lat');
            $kirim['lng'] = $this->input->post('lng');

            $cek = $this->db->query("SELECT * FROM peserta_didik_map where peserta_didik_id = '" . $id . "'");
            if ($cek->num_rows() > 0) {
                $kirim['date_update'] = date('Y-m-d H:i:s', strtotime('NOW'));
                $kirim['update_by'] = $this->session->userdata('email');
                $kirim['updated_via'] = 'web';
                $this->db->update('peserta_didik_map', $kirim, array('peserta_didik_id' => $id));
            } else {
                $kirim['peserta_didik_id'] = $id;
                $kirim['date_created'] = date('Y-m-d H:i:s', strtotime('NOW'));
                $kirim['created_by'] = $this->session->userdata('email');
                $kirim['created_via'] = 'web';
                $this->db->insert('peserta_didik_map', $kirim);
            }

            $this->data['status'] = 'error';
            $this->data['message'] = validation_errors();
            redirect('pendaftaran/map/pdd_map/' . $id, 'refresh');
        } else {
            $this->data['status'] = 'error';
            $this->data['message'] = validation_errors();
            redirect('pendaftaran/map/pdd_map/' . $id, 'refresh');
        }
    }

}
