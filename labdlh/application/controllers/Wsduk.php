<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wsduk extends CI_Controller {
    function __construct() 
    {

        parent::__construct();



	}


	function index()
	{
		
		echo 'sdfsdf';
	}
	
	
	
	
	function cek_nikccc()
	{
		$_POST = json_decode(file_get_contents('php://input'), true);
       
		
		
		// $output['NIK'] = $this->input->post('NIK');
		// $output['SS'] = 'SSSS';
		
		
		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		// echo json_encode($output);	



		$aa = $this->nik($this->input->post('NIK'));	
		
		$bb = json_decode($aa, true);
		
		$data['item']['NIK'] = $bb['data']['NIK'];
		
		echo json_encode($data);
		
		
		
	}			
	
	function cek_nik() {
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
		
		
		header('Access-Control-Allow-Origin: *');		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');	
		
		
		$_POST = json_decode(file_get_contents('php://input'), true);
		
		$nik = $this->input->post('NIK');
		
		$Url = "http://api2.banyuwangikab.go.id/onestop/cek_nik/".$nik;
		
		//$kec_des_kel = $this->db->query("SELECT NAMA_KEC,NAMA_KEL FROM wilayah_bwi WHERE NO_KEC = '".$data['data']['no_kec']."' AND NO_KEL = '".$data['data']['no_kel']."'")->row();

		
  		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HTTPHEADER,array('X-cons-id: 4144',
		//										  'X-timestamp: '.time().'',
		//										  'X-signature:'.$encodedSignature.''						  
		//										  ));
		
		$output = curl_exec($ch);
		
		$aa = json_decode($output,true);
		
		if($aa['data']['NIK']){
		 $out['metaData']['code']='200';
		 $out['metaData']['message'] = 'OK';
		 $out['status']='success';
		 //$out['payload']=$aa['data'];

		$out['data']['NIK'] = $aa['data']['NIK'];
		$out['data']['NAMA_LGKP'] = $aa['data']['NAMA_LGKP'];
		$out['data']['TGL_LHR'] = $aa['data']['TGL_LHR'];
		$out['data']['TMPT_LHR'] = $aa['data']['TMPT_LHR'];
		$out['data']['NO_KK'] = $aa['data']['NO_KK'];
		$out['data']['NO_PROP'] = $aa['data']['NO_PROP'];
		$out['data']['NO_KAB'] = $aa['data']['NO_KAB'];
		$out['data']['NO_KEC'] = $aa['data']['NO_KEC'];
		$out['data']['NO_KEL'] = $aa['data']['NO_KEL'];
		$out['data']['PDDK_AKH'] = $aa['data']['PDDK_AKH'];
		$out['data']['JENIS_KLMIN'] = $aa['data']['JENIS_KLMIN'];
		$out['data']['JENIS_PKRJN'] = $aa['data']['JENIS_PKRJN'];
		$out['data']['NAMA_LGKP_IBU'] = $aa['data']['NAMA_LGKP_IBU'];
		$out['data']['NO_AKTA_LHR'] = $aa['data']['NO_AKTA_LHR'];
		$out['data']['NIK_AYAH'] = $aa['data']['NIK_AYAH'];
		$out['data']['NIK_IBU'] = $aa['data']['NIK_IBU'];
		$out['data']['ALAMAT'] = $aa['data']['ALAMAT'];
		$out['data']['NO_RT'] = $aa['data']['NO_RT'];
		$out['data']['NO_RW'] = $aa['data']['NO_RW'];
		$out['data']['AGAMA'] = $aa['data']['AGAMA'];
		$out['data']['NAMA_KEC'] = '';
		$out['data']['NAMA_DESKEL'] = '';
		$out['data']['TGL_KWN'] = $aa['data']['TGL_KWN'];	
		$out['data']['nikhtml'] = '';	


		 
		 
		 
		}else{
		 $out['metaData']['code']='204';
		 $out['metaData']['message'] = 'kosong';
		 $out['status']='error';		
			
		}
		
		
		
		
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
		curl_close($ch);
	
	   	if($httpCode == '504'){				
				echo header('content-type: application/json; charset=utf-8');				
				$info['metaData']['code'] = '504';
				$info['metaData']['message'] = 'Web Service Off';				
				$json = json_encode($info);	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}else{		
				echo header('content-type: application/json; charset=utf-8');	
				$json = json_encode($out);	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}	

	}	



	

	function nik($nik) {
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
	

		$Url = "http://api2.banyuwangikab.go.id/onestop/cek_nik/".$nik;

		
  		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HTTPHEADER,array('X-cons-id: 4144',
		//										  'X-timestamp: '.time().'',
		//										  'X-signature:'.$encodedSignature.''						  
		//										  ));
		
		$output = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
		curl_close($ch);
	
	   	if($httpCode == '504'){				
				echo header('content-type: application/json; charset=utf-8');				
				$info['metaData']['code'] = '504';
				$info['metaData']['message'] = 'Web Service Off';				
				$json = json_encode($info);	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}else{		
				echo header('content-type: application/json; charset=utf-8');	
				$json = $output;	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}	

	}	
	
	
	
	function kk($kk) {
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
	

		$Url = "http://api2.banyuwangikab.go.id/onestop/cek_kk/".$kk;

		
  		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_HTTPHEADER,array('X-cons-id: 4144',
		//										  'X-timestamp: '.time().'',
		//										  'X-signature:'.$encodedSignature.''						  
		//										  ));
		
		$output = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); //get the code of request
		curl_close($ch);
	
	   	if($httpCode == '504'){				
				echo header('content-type: application/json; charset=utf-8');				
				$info['metaData']['code'] = '504';
				$info['metaData']['message'] = 'Web Service Off';				
				$json = json_encode($info);	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}else{		
				echo header('content-type: application/json; charset=utf-8');	
				$json = $output;	
				echo isset($_GET['callback'])? "{$_GET['callback']}($json)": $json;	
		}	

	}	
	




	function nikx($nik)
	{
		if($nik){
		$bio = file_get_contents("http://api2.banyuwangikab.go.id/onestop/cek_nik/".$nik);
		header('content-type: application/json; charset=utf-8');
		echo $bio;
		}
		
	}
	
	function kkx($kk)
	{
		if($kk){
		$bio = file_get_contents("http://api2.banyuwangikab.go.id/onestop/cek_kk/".$kk);
		header('content-type: application/json; charset=utf-8');
		echo $bio;
		}
		
	}	
	
	
}
