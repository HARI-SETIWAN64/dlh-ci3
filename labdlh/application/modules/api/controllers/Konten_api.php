<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Konten_api extends CI_Controller {
	private $limit = 10;
    function __construct()
    {
		parent::__construct();
		$this->data = null;
		$this->load->model(array(
			'api/konten_model', 
		));
	}

    public function get_slider() {
		header('Content-Type:Application/json');

		$where = array('catid'=>"4");
		$like = array('alias'=>'slider');
		$konten = $this->konten_model->slider($where,$like);
		// print_r($this->db->last_query());

		$data = array();
		foreach($konten->result_array() as $row){
		    $data[]=$row;
		}
		echo json_encode($data);
	}


	public function lhu_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();


		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$like = array('no_lhus'=>$this->input->post('nama'),'jenis_sampel'=>$this->input->post('nama'));
		}
		$where = array('validasi_lhus'=>"1");

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['items'] = $this->lhu_model->get_lhu_list($where,$limit,$offset,$like)->result();
		// echo $this->db->last_query();
		// die();
		$tot = $this->lhu_model->get_lhu_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('lhu/v_lhu_list', $data);
	}

	public function form($id=false) {
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		$fpps = $this->db->query("select * from fpps where id='$id'")->row();
		$data['item'] =  $fpps;
		$data['parameter'] = $this->fpps_model->data_parameter($id);

		$userid = $this->session->userdata('user_id');
		$data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
		$data['subkontrak'] = array("0" => "Tidak", "0" => "Iya");
		$data['kemampuan_personil'] = array("1" => "Mampu", "0" => "Tidak Mampu");
		$data['kesesuaian_metode_uji'] = array("1" => "Sesuai", "0" => "Tidak Sesuai");
		$data['kondisi_peralatan'] = array("1" => "Tidak Rusak", "0" => "Rusak");
		$data['kelengkapan_bahan_kimia'] = array("1" => "Lengkap", "0" => "Tidak Lengkap");
		$data['kondisi_akomodasi'] = array("1" => "Sesuai", "0" => "Tidak Sesuai");
		$data['beban_pekerjaan'] = array("1" => "Tidak Overload", "0" => "Overload");
		$data['kesimpulan_kaji_ulang'] = array("Pekerjaan Dapat Dilayani" => "Pekerjaan Dapat Dilayani", "Pekerjaan Tidak Dapat Dilayani" => "Pekerjaan Tidak Dapat Dilayani");
		$data['jenis_sampel'] = $this->jenis_sampel_model->dropdown_jenis_sampel();
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->template->title = 'LHU';
		$data['menu'] = 'lhu';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('lhu/v_form_ubah_lhu', $data);
		$this->template->publish();
    }

	public function lhu_parameter_list() {
		$pagenya ='1';
		$where = array();
		$offset = '0';
		$limit=$this->limit;
		$like = array();

		if (isset($_POST['nama']) && $_POST['nama'] != NULL) {
			$nomor = str_replace("LHU","LHUS",$this->input->post('nama'));
			$like = array('lhus_nomor'=>$nomor);
		}

		if (isset($_POST['page']) && $_POST['page'] != NULL) {
			$pagenya = $_POST['page'];
			$pageof = $pagenya-1;
			$offset = $pageof * $limit;
		}

		$data['rows'] = $this->fpps_parameter_model->get_fpps_parameter_list($where,$limit,$offset,$like)->result();
		$tot = $this->fpps_parameter_model->get_fpps_parameter_list_total($where,$like)->row();
		$data['total_items'] =$tot->count;
		$data['page'] = $pagenya;
		$this->load->view('lhu/v_lhu_parameter_list', $data);
	}

	function ubah_lhus_parameter($id=false){
		$data['item']=$this->db->query('select a.*, b.parameter, b.metode from lhus_parameter a inner join master_parameter b on a.parameter_id=b.id where a.id = "'.$id.'"')->row();
		$this->load->view('lhu/v_form_ubah_lhu_parameter_admin',  isset($data) ? $data : NULL);
	}

	function simpan_lhu_parameter($id=false){
    	if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}

		$kirim=array
		(
			'satuan' => $this->input->post('satuan'),
			'baku_mutu' => $this->input->post('baku_mutu'),
			'hasil' => $this->input->post('hasil'),
			'spesifikasi_metode' => $this->input->post('spesifikasi_metode'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->update('lhus_parameter',$kirim,array('id'=>$id));
		$this->data['message'] = 'Nilai Berhasil diupdate.';

		$this->data['status'] = 'success';
		echo json_encode($this->data);
	}

    function form_bukti($id = false){
		$data['fpps'] = $this->db->query('select * from fpps where id ="'.$id.'"')->row();
		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		$this->template->title = 'Form konten';
		$data['menu'] = 'konten';
		$this->template->description = '';
		$this->template->meta->add('keyword', '');
		$this->template->content->view('fpps_pelanggan/v_form_bukti',  isset($data) ? $data : NULL);
		$this->template->publish();
	}

	public function lhu_pdf($id=null, $ket=null) {
		if (!$this->ion_auth->logged_in())
		{	$this->session->set_flashdata('message', 'Maaf anda tidak berhak');
			redirect('lhu/lhu_admin');
		}
		$lhu = $this->db->query("SELECT fpps.*, master_jenis_sampel.nama as nama_jenis_sampel FROM fpps INNER JOIN master_jenis_sampel ON fpps.jenis_sampel = master_jenis_sampel.kode where fpps.id = '".$id."'")->row();
		$nomor_lhus = str_replace("LHU","FPPS",$lhu->nomor);
		$data['lhu'] = $lhu;
		$data['manajer'] = $this->db->query("SELECT users.first_name FROM users_groups INNER JOIN users ON users.id = users_groups.user_id INNER JOIN groups ON users_groups.group_id = groups.id where groups.description = 'Manager Teknik'")->row('first_name');
		$data['ket']=$ket;
		// $data['manajer'] = $this->db->query("select * from master_jabatan  where jabatan = 'Manager Teknik'")->row('nama');
		$data['items'] = $this->db->query("select a.*, b.parameter from fpps_parameter a inner join master_parameter b on b.id=a.parameter_id where a.fpps_id = '".$id."'")->result();
		// echo $this->db->last_query();
		// die();
		$this->load->view('lhu/v_cetak_lhu_pdf', $data);
	}

	public function validasi($id)
    {
		$datapost['validasi_lhu']="1";
		$datapost['validasi_lhu_by']=$this->session->userdata('user_id');
		$datapost['validasi_lhu_date']=date('Y-m-d H:i:s', strtotime('NOW'));
		$this->db->update('fpps',$datapost,array('id'=>$id));
		// $this->fpps_model->timeline($id, "LHU", "LHU Sudah Selesai, Proses Menunggu Upload Dokumen LHU Asli");
		$this->fpps_model->timeline($id, "LHU", "LHU Sudah Selesai, Laporan Hasil Uji Bisa Di Ambil");
		$this->data['status'] = 'success';
		echo json_encode($this->data);
    }
	
    public function docx($id=null, $ket=null) {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();

		if($ket == 'kan'){
		  $kan = '<img src="img/kan.jpg" alt="logo" height="70" width="100">';
		}
		$lhu = $this->db->query("SELECT fpps.*, master_jenis_sampel.nama as nama_jenis_sampel FROM fpps INNER JOIN master_jenis_sampel ON fpps.jenis_sampel = master_jenis_sampel.kode where fpps.id = '".$id."'")->row();
		$items = $this->db->query("select a.*, b.parameter from fpps_parameter a inner join master_parameter b on b.id=a.parameter_id where a.fpps_id = '".$id."'")->result();
		$manajer = $this->db->query("SELECT users.first_name FROM users_groups INNER JOIN users ON users.id = users_groups.user_id INNER JOIN groups ON users_groups.group_id = groups.id where groups.description = 'Manager Teknik'")->row('first_name');
		$isi = '
			<table width="100%" border="0">
			  <tr>
			    <td width="20%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
			    <td width="60%">
			      <div align="center">
			        <br />
			        PEMERINTAH KABUPATEN BANYUWANGI<br/>
			        DINAS LINGKUNGAN HIDUP<br/>
			        UPTD LABORATORIUM LINGKUNGAN
			        </div>
			      </td>
			    <td width="20%">'.$kan.'</td>
			  </tr>
			  <tr>
			    <td colspan="3"><hr /></td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td><div align="center">
			      <b><u>LAPORAN HASIL UJI (LHU)</u></b>
			    </div></td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td><div align="center">No. : '.$lhu->nomor.'</div></td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			</table>';

			$isi .= ' 
			<table width="100%" border="0">
			  <tr>
			    <td width="3%"><strong>I. </strong></td>
			    <td colspan="4"><strong>UMUM </strong></td>
			  </tr>
			  <tr>
			    <td width="3%">&nbsp;</td>
			    <td width="2%">1.</td>
			    <td width="35%">Kode Contoh Uji</td>
			    <td width="1%">:</td>
			    <td width="59%">'.$lhu->no_sampel.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>2.</td>
			    <td>Customer Sampel ID</td>
			    <td>:</td>
			    <td>'.$lhu->lhu_customer_sampel_id.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>3.</td>
			    <td>Nama Pelanggan</td>
			    <td>:</td>
			    <td>'.$lhu->nama_pelanggan.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>4.</td>
			    <td>Alamat</td>
			    <td>:</td>
			    <td>'.$lhu->alamat.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>5.</td>
			    <td>Jenis Usaha/Industri</td>
			    <td>:</td>
			    <td>'.$lhu->jenis_industri.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>6.</td>
			    <td>Jenis Contoh Uji</td>
			    <td>:</td>
			    <td>'.$lhu->nama_jenis_sampel.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>7. </td>
			    <td>Rentang Pengujian</td>
			    <td>:</td>
			    <td>'.$lhu->lhus_tanggal_mulai_pengujian.' s/d '. $lhu->lhus_tanggal_sampai_pengujian.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			    <td><strong>II.</strong></td>
			    <td colspan="4"><strong>DATA PENGIRIMAN CONTOH UJI</strong> </td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>1.</td>
			    <td>Nama/Instansi/Pelanggan</td>
			    <td>:</td>
			    <td>'.$lhu->nama_pelanggan.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>2.</td>
			    <td>Alamat</td>
			    <td>:</td>
			    <td>'.$lhu->alamat.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>3.</td>
			    <td>Petugas Pengambil</td>
			    <td>:</td>
			    <td>Karyawan perusahaan</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>4.</td>
			    <td>Tanggal / Jam Pengambil</td>
			    <td>:</td>
			    <td>'.$lhu->tanggal_sampling.' / '.$lhu->jam_sampling.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>5.</td>
			    <td>Tanggal / Jam Penerimaan</td>
			    <td>:</td>
			    <td>'.$lhu->tanggal_penerimaan.' / '.$lhu->jam_penerimaan.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>6.</td>
			    <td>Lokasi / Titik Pengambilan </td>
			    <td>:</td>
			    <td>'.$lhu->lokasi_pengambilan_sampel.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>7.</td>
			    <td>Metode Pengambilan</td>
			    <td>:</td>
			    <td> - </td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>8.</td>
			    <td>Pengukur Dilapanagn </td>
			    <td>:</td>
			    <td>'.$lhu->deskripsi_sampel.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			  	<br />
			    <td><strong>III.</strong></td>
			    <td colspan="4"><strong>HASIL PENGUJIAN </strong></td>
			  </tr>
			  <tr>
			  	<br />
			    <td colspan="5">
			    <table width="100%" border="1">
			      <tr>
			        <td width="5%" rowspan="2"><div align="center"><strong>No.</strong></div></td>
			        <td width="15%" rowspan="2"><div align="center"><strong>PARAMETER</strong></div></td>
			        <td width="10%" rowspan="2"><div align="center"><strong>SATUAN</strong></div></td>
			        <td width="20%"><div align="center"><strong>BAKU MUTU </strong></div></td>
			        <td width="10%" rowspan="2"><div align="center"><strong>HASIL UJI</strong></div></td>
			        <td width="15%" rowspan="2"><div align="center"><strong>SPESIFIKASI METODE </strong></div></td>
			        <td width="15%" rowspan="2"><div align="center"><strong>KETERANGAN</strong></div></td>
			      </tr>
			      <tr>
			        <td align="center">Per .Gub Jatim No. 72 Tahun 2013 Lamp . V</td>
			      </tr>
			      ';
			      $no=0;
			      foreach ($items as $item) {
			      	$no++;
			      	$isi .= '
			      		<tr>
					        <td> '.$no.'</td>
					        <td> '.$item->parameter.'</td>
					        <td> '.$item->lhus_satuan.'</td>
					        <td> '.$item->lhus_baku_mutu.'</td>
					        <td> '.$item->lhus_hasil.'</td>
					        <td> '.$item->lhus_spesifikasi_metode.'</td>
					        <td> '.$item->lhus_keterangan.'</td>
			      		</tr>
			      	';
			      }
			$isi .= '
			      <tr>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			        <td>&nbsp;</td>
			      </tr>
			    </table>
			    </td>
			  </tr>
			  <tr>
			  	<br />
			    <td><strong>IV.</strong></td>
			    <td colspan="4"><strong>KESIMPULAN HASIL PENGUJIAN </strong></td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td colspan="4">&nbsp;</td>
			  </tr>
			</table>';

			$isi .= '
			<br />
			<table width="100%" border="0">
			  <tr>
			    <td width="60%">&nbsp;</td>
			    <td width="40%">Banyuwangi,</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>Manager Teknis </td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>UPTD LABORATORIUM LINGKUNGAN </td>
			  </tr>
			  <tr>
			    <td height="77">&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>'.$manajer.'</td>
			  </tr>
			</table>
			<br/><br/>
			<table width="100%" border="0">
			  <tr>
			    <td colspan="2"><font size="-1">Keterangan : </font></td>
			  </tr>
			  <tr>
			    <td width="3%"><font size="-1">1.</font></td>
			    <td width="97%"><font size="-1">Laporan hasil uji ini terdiri dari 1 halaman </font></td>
			  </tr>
			  <tr>
			    <td><font size="-1">2.</font></td>
			    <td><font size="-1">Laboratorium melayani pengaduan/complaint maksimum 5 (lima) hari kerja terhitung dari tanggal penyerahan LHU </font></td>
			  </tr>
			  <tr>
			    <td><font size="-1">3.</font></td>
			    <td><font size="-1">*: diukur oleh petugas pengambil contoh uji dilapangan </font></td>
			  </tr>
			  <tr>
			    <td><font size="-1">4</font></td>
			    <td><font size="-1">**: Parameter yang belum masuk ruang lingkup akreditasi </font></td>
			  </tr>
			  <tr>
			    <td><font size="-1">7.</font></td>
			    <td><font size="-1">Laboratorium tidak bertanggung jawab terhadap pengambilan dan pengiriman sampel. </font></td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			</table>';
		// $section->addText(
		// 	'"Learn from yesterday, live for today, hope for tomorrow. '
		// 		. 'The important thing is not to stop questioning." '
		// 		. '(Albert Einstein)'
		// );
		// $section->addText($isi);
		// \PhpOffice\PhpWord\Shared\Html::addHtml($section, $isi);
		// $filename = date('Y-m-d H:i:s') . '.docx';
		// header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
  //       header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
  //       header('Cache-Control: max-age=0'); //no cache
  //       // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
  //       $objWriter = \PhpOffice\PhpWord\Shared\Html::addHtml($phpWord, $isi, false, false);
  //       $objWriter->save('php://output');


		$today = date("Y-m-d-His");
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=Invoice-".$today.".doc");
		echo $isi;
    }

	public function a() {
		$today = date("Y-m-d-His");

		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=Invoice-".$today.".doc");

		$html = '<html>
		<meta http-equiv="Content-Type" content="text/html" charset="Windows-1252">
		<body>
		';

		//invoice header
		$html .= '
		<table width="800px">
		<tbody>
		<tr style="border-collapse:collapse">
			<td rowspan="3" width="50%">
			<p>hai</p>
			</td>
			<td width="50%">
		        <p>hui</p>
		        </td>
		</tr>
		<tr>
			<td>sadasd</td>
		</tr>
		</tbody>
		</table>
		';

		$html .='
		</body>
		</html>
		';

		echo $html;
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
