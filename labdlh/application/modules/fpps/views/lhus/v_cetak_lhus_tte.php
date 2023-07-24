<?php
class MyPDF extends TCPDF {
	var $htmlFooter;
	public function setHtmlFooter($htmlFooter) {
    $this->htmlFooter = $htmlFooter;
  }
	public function Footer() {
    $this->SetY(-17);
		$this->writeHTML("<hr>", false, false, false, false, '');
    $this->SetY(-16);
    $this->SetFont('helvetica', 'I', 7);
    $this->writeHTMLCell(
    $w = 0, $h = 0, $x = '', $y = '',
    $this->htmlFooter, $border = 0, $ln = 1, $fill = 0,
    $reseth = true, $align = 'top', $autopadding = true);
  }
}

$this->pdf = new MyPDF('P', 'mm','F4', true, 'UTF-8', false);
$this->pdf->SetSubject('');
$this->pdf->SetKeywords('');
$this->pdf->setPrintHeader(false);
$this->pdf->SetDisplayMode('real',$mode='UseOC');
$this->pdf->setPrintFooter(true);
$this->pdf->SetFont('times', '', 11);
$this->pdf->SetMargins(5, 5, 5, true);
$this->pdf->AddPage();

$foter ='
<table>
	<tr>
		<td width="10%">Revisi/Terbitan</td>
		<td width="1%">:</td>
		<td width="20%">'.$lhus->footer_terbit_lhus.'</td>
		<td width="38%"></td>
		<td width="10%">No.  Dok.</td>
		<td width="1%">:</td>
		<td width="20%">'.$lhus->footer_no_dok_lhus.'</td>
	</tr>
	<tr>
		<td>Tanggal berlaku</td>
		<td>:</td>
		<td>'.$lhus->footer_berlaku_lhus.'</td>
		<td></td>
		<td>Halaman</td>
		<td>:</td>
		<td>'.$this->pdf->getAliasNumPage().' of '.$this->pdf->getAliasNbPages().'</td>
	</tr>
</table>
';
$this->pdf->setHtmlFooter($foter);

$today = date('d-M-Y H:m:s', strtotime('NOW'));
if($lhus->validasi_lhus_date==""){$lhus_date="0000 xxxx 00";}else{$lhus_date=$this->fungsi->tanggal3($lhus->validasi_lhus_date,'', false);}
$url = base_url();
$isi='
<table width="100%" border="0">
  <tr>
    <td width="20%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
    <td  width="60%"><div align="center">
      PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN<br/>
      Jl. Wijaya Kusuma No 102 Banyuwangi Telp/Fax (0333) 428833<br/>
      E-mail : lablingblhbwi@gmail.com
    </div></td>
    <td width="20%"><img src="img/kan.jpg" alt="logo" height="70" width="100"></td>
  </tr>
  <tr>
  	<td colspan="3">
	<hr />
	</td>
  </tr>
  <tr>
  	<td></td>
	<td><br/><div align="center"><strong><u>LAPORAN HASIL UJI SEMENTARA (LHUS)</u></strong></div></td>
	<td><br /><br /><br /><br /></td>
  </tr>
  <tr>
  	<td colspan="3">
		<table width="100%">
			<tr>
				<td width="20%">No.</td>
				<td width="80%">: '.$no.'</td>
			</tr>
			<tr>
				<td>Jenis Sampel</td>
				<td>: '.$lhus->nama.' - '.$lhus->jenis_industri.'</td>
			</tr>
			<tr>
				<td>No Sampel</td>
				<td>: '.$lhus->no_sampel.'</td>
			</tr>
			<tr>
				<td>Tanggal Pengujian</td>
				<td>: '.$this->fungsi->tanggal3($lhus->validasi_stp_date,'', false).' s/d '.$lhus_date.'</td>
			</tr>
		</table>
	</td>
  </tr>
</table>';
$no=0;
$isi .= '
<br /><br />
<table width="100%" border="1">';
	$isi .= '
	<tr align="center">
		<td width="5%"><b>No</b></td>
		<td width="35%"><b>Parameter</b></td>
		<td width="10%"><b>Satuan</b></td>
		<td width="10%"><b>Hasil</b></td>
		<td width="40%"><b>Keterangan</b></td>
	</tr>
	';
	$jum = count($items);
	if($jum<=30){
		foreach ($items as $item) {
			$no++;
			$isi .= '
			<tr>
				<td> '.$no.'.</td>
				<td> '.$item->parameter.'</td>
				<td> '.$item->lhus_satuan.'</td>
				<td> '.$item->lhus_hasil.'</td>
				<td> '.$item->lhus_keterangan.'</td>
			</tr>
			';
		}
	}else{
		$isi2="";
		foreach ($items as $item) {
			$no++;
			if($no<=20){
				$isi .= '
				<tr>
					<td> '.$no.'.</td>
					<td> '.$item->parameter.'</td>
					<td> '.$item->lhus_satuan.'</td>
					<td> '.$item->lhus_hasil.'</td>
					<td> '.$item->lhus_keterangan.'</td>
				</tr>
				';
			}else{
				$isi2 .= '
				<tr>
					<td> '.$no.'.</td>
					<td> '.$item->parameter.'</td>
					<td> '.$item->lhus_satuan.'</td>
					<td> '.$item->lhus_hasil.'</td>
					<td> '.$item->lhus_keterangan.'</td>
				</tr>
				';
			}
		}
	}
if($lhus->validasi_lhus_date==""){
	$tanggal = date("Y-m-d");
}else{
	$tanggal = $lhus->validasi_lhus_date;
}
$tanggal = $this->fungsi->tanggal3($tanggal,'', false);
$isi .= '</table>';
$ttd = '
<table width="100%" border="0">
	<br /><br /><br /><br />
	<tr align="center">
		<td width="60%"></td>
		<td width="40%">Banyuwangi, '.$tanggal.'</td>
	</tr>
	<br />
	<tr align="center">
		<td></td>
		<td>Kepala UPTD Laboratorium Lingkungan</td>
	</tr>
	<tr align="center">
		<td></td>
		<td>'.$jabatan->description.'</td>
	</tr>
	<br /><br /><br /><br /><br /><br />
	<tr align="center">
		<td></td>
		<td>'.$jabatan->first_name.'</td>
	</tr>
</table>
';

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->MultiCell(0, 0, $ttd, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='230', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);


if($jum>30){
	$this->pdf->AddPage();
	$p2='
	<table border="1">
	'.$isi2.'
	</table>
	';
	$this->pdf->MultiCell(0, 0, $p2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
	$this->pdf->MultiCell(0, 0, $ttd, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='230', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
}

$nm_file = str_replace("/","_",$lhus->no_sampel);
if($doc == "0"){
  $this->pdf->Output('LHUS_'.$nm_file.'.pdf', 'I');
}else{
  $this->pdf->Output('/home/labdlh/public_html/doc/lhus/LHUS_'.$nm_file.'.pdf', 'F');
}
