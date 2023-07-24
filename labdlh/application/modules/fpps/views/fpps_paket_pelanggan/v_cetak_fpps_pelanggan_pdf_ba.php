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
$isi='
<table width="100%" border="0">
  <tr>
    <td width="20%"> <img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
    <td  width="60%"><div align="center">
      PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN
    </div></td>
    <td width="20%"> <img src="img/kan.jpg" alt="logo" height="70" width="100"></td>
  </tr>
  <tr>
  	<td colspan="3">
	<hr />
	</td>
  </tr>
  <tr>
  	<td></td>
	<td><br/><div align="center"><u>FORMULIR PERMINTAAN PENGUJIAN SAMPEL (FPPS) DAN KAJI ULANG PERMINTAAN</u></div></td>
	<td><br /><br /><br /><br /></td>
  </tr>
  <tr>
  	<td colspan="3">
		<table width="100%">
			<tr>
				<td width="20%">Nama Customer</td>
				<td width="80%">: '.$fpps->nama_pelanggan.'</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: '.$fpps->alamat.'</td>
			</tr>
			<tr>
				<td>Contact Person</td>
				<td>: <br />
					<table>
						<tr>
							<td width="20%">Telp./Fax</td>
							<td width="80%">: '.$fpps->no_telp.'</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>: '.$fpps->email.'</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
  </tr>
</table>';
$isi .= '
<br /><br />
<table width="100%" border="1">';
	$isi .= '
	<tr align="center">
		<td rowspan="2"><b>LAb. ID</b></td>
		<td rowspan="2"><b>Identitas Samapel Pelanggan</b></td>
		<td colspan="2"><b>Tanggal/Jam Diambil</b></td>
		<td rowspan="2"><b>Tipe Samapel</b></td>
		<td rowspan="2"><b>Wadah Sampel</b></td>
		<td rowspan="2"><b>Volume Sampel</b></td>
		<td><b>Diawtkan</b></td>
	</tr>
	<tr>
		<td><b>Tanggal</b></td>
		<td><b>Jam</b></td>
		<td><b>(Ya/Tidak)</b></td>
	</tr>
	<tr>
		<td> '.$fpps->lab_id.'.</td>
		<td> '.$fpps->identitas_sampel_pelanggan.'</td>
		<td> '.$fpps->tanggal_diambil.'</td>
		<td> '.$fpps->jam_diambil.'</td>
		<td> '.$fpps->jenis_sampel.'</td>
		<td> '.$fpps->wadah_sampel.'</td>
		<td> '.$fpps->volume.'</td>
		<td> '.$fpps->diawetkan.'</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="4"> <b>Instruksi khusus</b></td>
		<td colspan="4"> <b>Kondisi sampel saat diterima (Abnormalitas sampel)</b></td>
	</tr>
	<tr>
		<td colspan="4"> '.$fpps->intruksi_khusus.'<br/></td>
		<td colspan="4"> '.$fpps->kodisi_sampel.'<br/></td>
	</tr>
	<tr>
		<td colspan="2"><b> Aspek kaji ulang permintaan</b></td>
		<td align="center"><b>OK</b></td>
		<td align="center"><b>TIDAK OK</b></td>
		<td colspan="2"><b> Aspek kaji ulang permintaan</b></td>
		<td align="center"><b>OK</b></td>
		<td align="center"><b>TIDAK OK</b></td>
	</tr>
	<tr>
		<td colspan="2"> 1. Ketersediaan & kemampuan personil</td>
		<td></td>
		<td></td>
		<td colspan="2">4. Ketersediaan bahan kimia</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2"> 2. Ketersediaan metode uji</td>
		<td></td>
		<td></td>
		<td colspan="2"> 5. Kondisi fasilitas & lingkungan</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2"> 3. Ketersediaan & kondisi perlatan pengujian</td>
		<td></td>
		<td></td>
		<td colspan="2"> 6. Aspek Kaji Ulang Permintaan</td>
		<td></td>
		<td></td>
	</tr>
	';
$isi .= '</table>';

$isi2 = '
<table>
	<tr>
    <td width="20%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
    <td  width="60%"><div align="center">
      PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN
    </div></td>
    <td width="20%"><img src="img/kan.jpg" alt="logo" height="70" width="100"></td>
  </tr>
  <tr>
  	<td colspan="3">
	<hr />
	</td>
  </tr>
</table>
';
$isi2 .= '
Parameter dan metode yang akan diuji berikut : <br />
<table border="1" width="100%">
	<tr align="center">
		<td width="5%" rowspan="2"><b>No.</b></td>
		<td width="35%" rowspan="2"><b>Parameter</b></td>
		<td width="35%" rowspan="2"><b>Metode Pengujian Yang Tersedia</b></td>
		<td width="25%" colspan="2"><b>Persetujuan Pelangan *)</b></td>
	</tr>
	<tr align="center">
		<td><b>Ya</b></td>
		<td><b>Tidak</b></td>
	</tr>';
	$no = 0;
	foreach ($items as $item) {
		$no++;
		if($item->nomor==''){
			$iya = "";
			$tidak = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
		}else{
			$iya = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
			$tidak = "";
		}
		$isi2 .= '
		<tr>
			<td> '.$no.'.</td>
			<td> '.$item->parameter.'</td>
			<td> '.$item->metode.'</td>
			<td align="center"><b> '.$iya.'</b></td>
			<td align="center"><b> '.$tidak.'</b></td>
		</tr>
		';
	}
$isi2 .= '
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
';

if($fpps->kesimpulan_kaji_ulang=="Pekerjaan Dapat Dilayani"){
	$iya_k = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
	$tidak_k = "&nbsp;";
}else{
	$iya_k = "&nbsp;";
	$tidak_k = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
}

if($fpps->subkontrak=="1"){
	$iya_s = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
	$tidak_s = "&nbsp;";
}else{
	$iya_s = "&nbsp;";
	$tidak_s = '<img src="img/mark.jpg" alt="logo" height="9" width="9">';
}
$isi2 .= '
	<br /><br /><br />
	<table border="1">
		<tr>
			<td width="25%"><b>Kesimpulang Kaji Ulang Permitaan</b></td>
			<td width="25%">['.$iya_k.'] Pekerjaan dapat dilayani<br />['.$tidak_k.'] Pekerjaan tidak dapat dilayani</td>
			<td width="25%"><b>Perlu disubkontrakkan?</b></td>
			<td width="25%">['.$tidak_s.'] Tidak<br />['.$iya_s.']Iya</td>
		</tr>
		<tr>
			<td colspan="2"><b> Siserahkan Oleh</b></td>
			<td colspan="2"><b> Diterima Oleh</b></td>
		</tr>
		<tr>
			<td width="15%"> Perusahaan</td>
			<td width="35%"> : '.$fpps->serahkan_perusahaan.'</td>
			<td width="15%"> Perusahaan</td>
			<td width="35%"> : '.$fpps->terima_perusahaan.'</td>
		</tr>
		<tr>
			<td> Nama</td>
			<td> : '.$fpps->serahkan_nama.'</td>
			<td> Nama</td>
			<td> : '.$fpps->terima_tanggal.'</td>
		</tr>
		<tr>
			<td> Tanggal</td>
			<td> : '.$fpps->serahkan_tanggal.'</td>
			<td> Tanggal</td>
			<td> : '.$fpps->terima_nama.'</td>
		</tr>
		<tr>
			<td> Jam</td>
			<td> : '.$fpps->serahkan_jam.'</td>
			<td> Jam</td>
			<td> : '.$fpps->terima_jam.'</td>
		</tr>
		<tr>
			<td> Tanda Tangan</td>
			<td> : <br/><br/><br/><br/><br/><br/><br/><br/></td>
			<td> Tanda Tangan</td>
			<td> : </td>
		</tr>
	</table>
';

$isi2 .= '
<br /><br /><br />
<table>
	<tr>
		<td width="8%">Catatan :</td>
		<td width="92%">
		1. Lembar asli (originil) untuk pelanggan, copy untuk laboratorium<br />
		2. Masa simpan sampel di laboratorium maksimal 1 (satu) bulan, atau sesuai kebutuhan, sesuai permintaan pelanggan
		</td>
	</tr>
</table>
';

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->AddPage();
$this->pdf->MultiCell(0, 0, $isi2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('STP.pdf', 'I');
