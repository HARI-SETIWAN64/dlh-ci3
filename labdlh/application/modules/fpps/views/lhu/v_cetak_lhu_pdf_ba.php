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
$this->pdf->SetMargins(4, 4, 4, 4);
$this->pdf->AddPage();

$foter ='
<table>
  <tr>
    <td width="10%">Revisi/Terbitan</td>
    <td width="1%">:</td>
    <td width="20%">'.$lhu->footer_terbit_lhu.'</td>
    <td width="38%"></td>
    <td width="10%">No.  Dok.</td>
    <td width="1%">:</td>
    <td width="20%">'.$lhu->footer_no_dok_lhu.'</td>
  </tr>
  <tr>
    <td>Tanggal berlaku</td>
    <td>:</td>
    <td>'.$lhu->footer_berlaku_lhu.'</td>
    <td></td>
    <td>Halaman</td>
    <td>:</td>
    <td>'.$this->pdf->getAliasNumPage().' of '.$this->pdf->getAliasNbPages().'</td>
  </tr>
</table>
';

$this->pdf->setHtmlFooter($foter);
$today = date('d-M-Y H:m:s', strtotime('NOW'));
$url = base_url();

$kan = '';
if($ket == 'kan'){
  $kan = '<img src="img/ilac.png" alt="logo" height="70" width="70">&nbsp;<img src="img/kan.jpg" alt="logo" height="70" width="100">';
}
$isi = '
<table width="100%" border="0">
  <tr>
    <td width="15%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
    <td  width="50%"><div align="center">
      <font size="13"><b>PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN<br/></b></font>
      <font size="9">Jl. Wijaya Kusuma No 102 Banyuwangi Telp/Fax (0333) 428833<br/></font>
    </div></td>
    <td width="35%" align="right">'.$kan.'</td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td align="center" colspan="3">
      <b><u>LAPORAN HASIL PENGUJIAN</u></b>
    </td>
  </tr>
  <tr>
    <td align="center" colspan="3">
      No. : '.$no.'
    </td>
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
    <td colspan="4" width="97%"><strong><u>UMUM</u></strong></td>
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
    <td>'.$this->fungsi->tanggal3($lhu->validasi_stp_date,'', false).' s/d '.$this->fungsi->tanggal3($lhu->validasi_lhus_date,'', false).'</td>
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
    <td colspan="4"><strong><u>DATA PENGIRIMAN CONTOH UJI</u></strong> </td>
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
    <td>Pengukuran di Dilapangan </td>
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
    <td><strong>III.</strong></td>
    <td colspan="4"><strong><u>HASIL PENGUJIAN </u></strong></td>
  </tr>
  <tr>
    <td colspan="5">
    <font size="9">
    <table width="100%" border="1">
      <tr>
        <td width="3%" rowspan="2"><div style="vertical-align: middle;"><strong>No.</strong></div></td>
        <td width="18%" rowspan="2"><div align="center"><strong>PARAMETER</strong></div></td>
        <td width="8%" rowspan="2"><div align="center"><strong>SATUAN</strong></div></td>
        <td width="20%"><div align="center"><strong>BAKU MUTU </strong></div></td>
        <td width="10%" rowspan="2"><div align="center"><strong>HASIL UJI</strong></div></td>
        <td width="20%" rowspan="2"><div align="center"><strong>SPESIFIKASI METODE </strong></div></td>
        <td width="20%" rowspan="2"><div align="center"><strong>KETERANGAN</strong></div></td>
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
    </table>
    </font>
    </td>
  </tr>
  <tr>
    <td><strong>IV.</strong></td>
    <td colspan="4"><strong><u>KESIMPULAN HASIL PENGUJIAN</u></strong></td>
  </tr>
  <tr>
    <td><strong></strong></td>
    <td colspan="4">ini adalah KESIMPULAN HASIL PENGUJIAN yang perlu diisi oleh admin simpling</td>
  </tr>
</table>
';
// $isi .= '
// <table width="100%" border="0">
//   <tr>
//     <td width="20%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
//     <td  width="60%"><div align="center">
//       PEMERINTAH KABUPATEN BANYUWANGI<br/>
//       DINAS LINGKUNGAN HIDUP<br/>
//       UPTD LABORATORIUM LINGKUNGAN<br/>
//       Jl. Wijaya Kusuma No 102 Banyuwangi Telp/Fax (0333) 428833<br/>
//       E-mail : lablingblhbwi@gmail.com
//     </div></td>
//     <td width="20%">'.$kan.'</td>
//   </tr>
//   <tr>
//     <td colspan="3"><hr /></td>
//   </tr>
//   <tr>
//     <td>&nbsp;</td>
//     <td>&nbsp;</td>
//     <td>&nbsp;</td>
//   </tr>
// </table>';

if($lhu->validasi_lhus_date==""){
  $tanggal = date("Y-m-d");
}else{
  $tanggal = $lhu->validasi_lhus_date;
}
$tanggal = $this->fungsi->tanggal3($tanggal,'', false);
$tte = '
<table width="100%" border="0">
  <tr>
    <td width="60%">&nbsp;</td>
    <td width="40%">Banyuwangi, '.$tanggal.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Manajer Teknis</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>UPTD LABORATORIUM LINGKUNGAN </td>
  </tr>
  <tr>
    <td height="80">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><b><u>Ivan Candra FY, ST</u></b></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Penata</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>NIP. 19830203201101 1 005</td>
  </tr>
</table>
<br/>
<table width="100%" border="0">
  <tr>
    <td colspan="2"><font size="-1">Keterangan : </font></td>
  </tr>
  <tr>
    <td width="3%"><font size="9">1.</font></td>
    <td width="97%"><font size="9">Laporan hasil uji ini terdiri dari 1 halaman </font></td>
  </tr>
  <tr>
    <td><font size="9">2.</font></td>
    <td><font size="9">Laboratorium melayani pengaduan/complaint maksimum 5 (lima) hari kerja terhitung dari tanggal penyerahan LHU </font></td>
  </tr>
  <tr>
    <td><font size="9">3.</font></td>
    <td><font size="9">*: diukur oleh petugas pengambil contoh uji dilapangan </font></td>
  </tr>
  <tr>
    <td><font size="9">4</font></td>
    <td><font size="9">**: Parameter yang belum masuk ruang lingkup akreditasi </font></td>
  </tr>
  <tr>
    <td><font size="9">5.</font></td>
    <td><font size="9">Laboratorium tidak bertanggung jawab terhadap pengambilan dan pengiriman sampel. </font></td>
  </tr>
</table>';
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->MultiCell(0, 0, $tte, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='223', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
if($doc == "0"){
  $this->pdf->Output('LHU.pdf', 'I');
}else{
  $nm_file = str_replace("/","_",$lhu->no_sampel);
  if($ket == 'kan'){
    $this->pdf->Output('/home/labdlh/public_html/doc/lhu/lhu_kan/LHU_KAN_'.$nm_file.'.pdf', 'F');
  }else{
    $this->pdf->Output('/home/labdlh/public_html/doc/lhu/lhu/LHU_'.$nm_file.'.pdf', 'F');
  }
}

