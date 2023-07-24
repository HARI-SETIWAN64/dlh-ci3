<?php
// print_r($parameter);
// die();
$this->pdf = new TCPDF('P', 'mm','F4', true, 'UTF-8', false);
$this->pdf->SetSubject('');
$this->pdf->SetKeywords('');
$this->pdf->setPrintHeader(false);
$this->pdf->SetDisplayMode('real',$mode='UseOC');
$this->pdf->setPrintFooter(false);
    // set font
$this->pdf->SetFont('times', '', 10);
//$this->pdf->SetFont('timesB', 'B', 10);
//SetMargins($left,$top,$right = -1,$keepmargins = false)
$this->pdf->SetMargins(25, 25, 10, true);
  $this->pdf->AddPage();

$today = date('d-M-Y H:m:s', strtotime('NOW'));
$url = base_url();

$kan = '';
if($ket == 'kan'){
  $kan = '<img src="img/kan.jpg" alt="logo" height="70" width="100">';
}

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
    <td width="35%">Nomor Sampel </td>
    <td width="1%">:</td>
    <td width="59%">'.$lhu->u_nomor_sampel.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>2.</td>
    <td>Customer Sampel ID </td>
    <td>:</td>
    <td>'.$lhu->u_customer_sample_id.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>3.</td>
    <td>Nama Pelanggan </td>
    <td>:</td>
    <td>'.$lhu->u_nama_pelanggan.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4.</td>
    <td>Alamat</td>
    <td>:</td>
    <td>'.$lhu->u_alamat.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5.</td>
    <td>Jenis Industri/Kegiatan Usaha </td>
    <td>:</td>
    <td>'.$lhu->u_jenis_industri.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>6. </td>
    <td>Jenis Contoh Uji </td>
    <td>:</td>
    <td>'.$lhu->u_jenis_contoh_uji.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>7.</td>
    <td>Rentang Pengujian </td>
    <td>:</td>
    <td>'.$lhu->u_rentang_pengujian.'</td>
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
    <td>'.$lhu->nama.'</td>
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
    <td>Petugas Pengambil </td>
    <td>:</td>
    <td>'.$lhu->petugas_pengambil.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>4.</td>
    <td>Tanggal/Jam Pengambilan </td>
    <td>:</td>
    <td>'.$lhu->tanggal_pengambilan.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5.</td>
    <td>Tanggal/Jam Penerimaan di Lab </td>
    <td>:</td>
    <td>'.$lhu->tanggal_penerimaan.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>5.</td>
    <td>Lokasi/Titik Pengambilan </td>
    <td>:</td>
    <td>'.$lhu->lokasi.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>7.</td>
    <td>Metode Pengambilan </td>
    <td>:</td>
    <td>'.$lhu->metode_pengambilan.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>8.</td>
    <td>Pengukuran Lapangan *) </td>
    <td>:</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>- Debit Air Limbah </td>
    <td>:</td>
    <td>'.$lhu->debit_air_limbah.'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>- Total Produksi/Bahan Baku </td>
    <td>:</td>
    <td>'.$lhu->total_produksi.'</td>
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
    <td colspan="5"><table width="100%" border="1">
      <tr>
        <td width="3%"><div align="center"><strong>No.</strong></div></td>
        <td width="27%"><div align="center"><strong>PARAMETER</strong></div></td>
        <td width="9%"><div align="center"><strong>SATUAN</strong></div></td>
        <td width="10%"><div align="center"><strong>BAKU MUTU </strong></div></td>
        <td width="19%"><div align="center"><strong>HASIL</strong></div></td>
        <td width="18%"><div align="center"><strong>SPESIFIKASI METODE </strong></div></td>
        <td width="14%"><div align="center"><strong>KETERANGAN</strong></div></td>
      </tr>';
      $no=0;
      foreach ($items as $item) {
      	$no++;
      	$isi .= '
      		<tr>
		        <td> '.$no.'</td>
		        <td> '.$item->parameter.'</td>
		        <td> '.$item->satuan.'</td>
		        <td> '.$item->baku_mutu.'</td>
		        <td> '.$item->hasil.'</td>
		        <td> '.$item->spesifikasi_metode.'</td>
		        <td> '.$item->keterangan.'</td>
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
	</table></td>
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
    <td>'.$jabatan->nama.'</td>
  </tr>
</table>
<br/><br/>
<table width="100%" border="0">
  <tr>
    <td colspan="2"><font size="-1">Keterangan : </font></td>
  </tr>
  <tr>
    <td width="3%"><font size="-1">1.</font></td>
    <td width="97%"><font size="-1">Hasil uji di atas hanya berlaku untuk sampel yang diuji </font></td>
  </tr>
  <tr>
    <td><font size="-1">2.</font></td>
    <td><font size="-1">Laporan hasil uji ini terdiri dari 2 halaman </font></td>
  </tr>
  <tr>
    <td><font size="-1">3.</font></td>
    <td><font size="-1">Laporan hasil uji ini tidak boleh digandakan, kecuali secara lengkap dan seijin tertulis dari UPTD Laboratorium Lingkungan DLH Kabupaten Banyuwangi </font></td>
  </tr>
  <tr>
    <td><font size="-1">4.</font></td>
    <td><font size="-1">Rekaman data teknis, diberikan kepada kepada pelanggan, bila diminta oleh pelanggan secara tertulis </font></td>
  </tr>
  <tr>
    <td><font size="-1">5.</font></td>
    <td><font size="-1">*: diukur oleh petugas pengambil contoh uji dilapangan </font></td>
  </tr>
  <tr>
    <td><font size="-1">6</font></td>
    <td><font size="-1">**: parameter diluar ruang lingkup akreditasi </font></td>
  </tr>
  <tr>
    <td><font size="-1">7.</font></td>
    <td><font size="-1">***: parameter subkontrak </font></td>
  </tr>
  <tr>
    <td><font size="-1">8.</font></td>
    <td><font size="-1">Laboratorium tidak bertanggung jawab terhadap pengambilan dan pengambilan sampel yang dilakukan oleh pelanggan atau pihak yang ditunjuk oleh pelanggan </font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>';
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('LHU.pdf', 'I');

