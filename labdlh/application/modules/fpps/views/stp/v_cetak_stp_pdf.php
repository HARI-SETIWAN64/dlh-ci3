<?php
class MyPDF extends TCPDF {
	var $htmlFooter;
	public function setHtmlFooter($htmlFooter) {
        $this->htmlFooter = $htmlFooter;
    }
	public function Footer() {
        $this->SetY(-15);
  		$this->writeHTML("<hr>", false, false, false, false, '');
        $this->SetY(-14);
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
		<td width="20%">'.$fpps->footer_terbit_stp.'</td>
		<td width="38%"></td>
		<td width="10%">No.  Dok.</td>
		<td width="1%">:</td>
		<td width="20%">'.$fpps->footer_no_dok_stp.'</td>
	</tr>
	<tr>
		<td>Tanggal berlaku</td>
		<td>:</td>
		<td>'.$fpps->footer_berlaku_stp.'</td>
		<td></td>
		<td>Halaman</td>
		<td>:</td>
		<td>'.$this->pdf->getAliasNumPage().' of '.$this->pdf->getAliasNbPages().'</td>
	</tr>
</table>
';
$this->pdf->setHtmlFooter($foter);

$today = date('d-M-Y H:m:s', strtotime('NOW'));

// $bwi = $this->pdf->Image('img/bwi.jpg', '15', '5', 16, 20, 'jpg', '', 'T', false, 75, '', false, false, 0, false, false, false);

$isi='
<table width="100%" border="0">
  <tr>
    <td width="20%"> <img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
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
	<td><br/><div align="center"><strong><u>SURAT TUGAS PENGUJIAN (STP)</u></strong></div></td>
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
				<td>Dari</td>
				<td>: Manajer Laboratorium</td>
			</tr>
			<tr>
				<td>Ditugaskan Kepada</td>
				<td>: Analis</td>
			</tr>
			<tr>
				<td>Jenis Sampel</td>
				<td>: '.$fpps->nama_kode_sampel.' - '.$fpps->jenis_industri.'</td>
			</tr>
			<tr>
				<td>No FPPS</td>
				<td>: '.$fpps->nomor.'</td>
			</tr>
			<tr>
				<td>No Sampel</td>
				<td>: '.$fpps->no_sampel.'</td>
			</tr>
		</table>
	</td>
  </tr>
</table>';

$isi .= '
<table width="70%" border="0">
	<br/><br/><br/>
	<tr>
		<td colspan="3"><b>Parameter</b></td>
	</tr>
	<tr>
		<td width="5%"></td>
		<td width="5%"></td>
		<td width="90%"></td>
	</tr>';
	$no=0;
	foreach ($items as $item) {
		$no++;
		$isi .= '
		<tr>
			<td align="right">'.$no.'</td>
			<td align="left">.</td>
			<td>'.$item->parameter.'</td>
		</tr>
		';
	}
// 	$no = 0;
// 	$cek = 0;
// 	foreach ($items as $item) {
// 		$cek = 0;
// 		$no++;
// 		$nilai = ($no % 3);
// 		if($nilai==1||$no==0){
// 			$isi .= '<tr>';
// 		}
// 		$isi .= "<td>$no. $item->parameter</td>";
// 		if($nilai==0){
// 			$isi .= '</tr>';
// 			$cek = 1;
// 		}
// 	}
// if($cek==0){
// 	$isi .=' </tr>';
// }
if($fpps->validasi_stp_date == ""){
	$tanggal == "0000 xxxx 00";
}else{
	$tanggal = $this->fungsi->tanggal3($fpps->validasi_stp_date,'', false);
}
$isi .=' </table>';
$isi .= '

<table width="100%" border="0">
	<br /><br /><br /><br />
	<tr colspan="2">
		<td>Untuk segera melaksanakan pengujian sampel tersebut</td>
	</tr>
</table>
<table nobr="true" width="100%" border="0">
	<br /><br /><br />
	<tr>
		<td width="60%"></td>
		<td width="40%">Banyuwangi, '.$tanggal.'</td>
	</tr>
	<tr>
		<td></td>
		<td>'.$jabatan->description.'</td>
	</tr>
	<tr>
		<td></td>
		<td>UPTD Laboratorium Lingkungan</td>
	</tr>
	<br /><br /><br />
	<tr>
		<td></td>
		<td>'.$jabatan->first_name.'</td>
	</tr>
</table>
';

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('STP.pdf', 'I');
