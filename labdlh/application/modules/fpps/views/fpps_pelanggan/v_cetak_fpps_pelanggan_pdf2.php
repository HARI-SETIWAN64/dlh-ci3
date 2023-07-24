<?php
// print_r($parameter);
// die();

// Extend the TCPDF class to create custom Header and Footer
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
      UPTD LABORATORIUM LINGKUNGAN<br/>
      Jl. KH Agus Salim No 107 Banyuwangi Telp/Fax (0333) 428833<br/>
      E-mail : lablingblhbwi@gmail.com
    </div></td>
    <td width="20%"> <img src="img/kan.jpg" alt="logo" height="70" width="100"></td>
  </tr>
  <tr>
  	<td colspan="3">
	<hr />
	</td>
  </tr>
  <tr>
	<td colspan="3" align="center">
		<u><h4>FORMULIR PERMINTAAN PENGUJIAN SAMPEL (FPPS) DAN KAJI ULANG PERMINTAAN</h4></u><br />
		NO. : '.$fpps->nomor.'
	</td>
  </tr>
  <br /><br /><br />
  <tr>
  	<td colspan="3">
		<table width="100%" style="font-size:35px">
			<tr>
				<td width="30%">Nama Customer</td>
				<td width="70%">: '.$fpps->nama_pelanggan.'</td>
			</tr>
			<br />
			<tr>
				<td>Alamat</td>
				<td>: '.$fpps->alamat.'</td>
			</tr>
			<br />
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
			<br />
			<tr>
				<td>Jenis Sampel</td>
				<td>: '.$fpps->nama_kode_sampel.'</td>
			</tr>
			<br />
			<tr>
				<td>Jumlah_Sampel</td>
				<td>: '.$fpps->jumlah_sampel.'</td>
			</tr>
			<br />
			<tr>
				<td>Volume Sampel</td>
				<td>: '.$fpps->volume_sampel.'</td>
			</tr>
			<br />
			<tr>
				<td>Wadah Sampel</td>
				<td>: '.$fpps->wadah_sampel.'</td>
			</tr>
			<br />
			<tr>
				<td>Tanggal Penerimaan</td>
				<td>: '.$fpps->tanggal_penerimaan.' / '.$fpps->jam_penerimaan.'</td>
			</tr>
			<br />
			<tr>
				<td>Tanggal Sampling</td>
				<td>: '.$fpps->tanggal_sampling.' / '.$fpps->jam_sampling.'</td>
			</tr>
			<br />
			<tr>
				<td>Deskripsi Sampel</td>
				<td>: '.$fpps->deskripsi_sampel.'</td>
			</tr>
		</table>
	</td>
  </tr>
</table>';

$isi2 = '
<table>
	<tr>
    <td width="20%"><img src="img/bwi.jpg" alt="logo" height="70" width="70"></td>
    <td  width="60%"><div align="center">
      PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN<br/>
      Jl. KH Agus Salim No 107 Banyuwangi Telp/Fax (0333) 428833<br/>
      E-mail : lablingblhbwi@gmail.com
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
<font size="7" face="Courier New">
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
		if($item->fpps_id==''){
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
</font>
';

if($fpps->kemampuan_personil == 1){$kemampuan_personil = "<u>Mampu</u> / Tidak Mampu";}else{$kemampuan_personil = "Mampu / <u>Tidak Mampu</u>";}
if($fpps->kesesuaian_metode_uji == 1){$kesesuaian_metode_uji = "<u>Sesuai</u> / Tidak sesuai";}else{$kesesuaian_metode_uji = "Sesuai / <u>Tidak sesuai</u>";}
if($fpps->kondisi_peralatan == 1){$kondisi_peralatan = "<u>Rusak </u> / Tidak rusak";}else{$kondisi_peralatan = "Rusak / <u>Tidak rusak</u>";}
if($fpps->kelengkapan_bahan_kimia == 1){$kelengkapan_bahan_kimia = "<u>Lengakap </u> / Tidak lengkap";}else{$kelengkapan_bahan_kimia = "Lengkap / <u>Tidak lengkap</u>";}
if($fpps->kondisi_akomodasi == 1){$kondisi_akomodasi = "<u>Sesuai </u> / Tidak sesuai";}else{$kondisi_akomodasi = "Sesuai / <u>Tidak sesuai</u>";}
if($fpps->beban_pekerjaan == 1){$beban_pekerjaan = "<u>Over load </u> / Tidak Over load";}else{$beban_pekerjaan = "Over load / <u>Tidak over load</u>";}
$isi2 .= '
<br />
Kaji Ulang Permintaan
<br />
<font size="7" face="Courier New">
<table border="1">
	<tr align="center">
		<td width="5%">No.</td>
		<td width="40%">Unsur Kaji Ulang</td>
		<td width="30%">Hasil Kaji Ulang</td>
		<td width="25%">Kendala</td>
	</tr>
	<tr>
		<td align="center">1.</td>
		<td>Kemampuan Personil</td>
		<td> '.$kemampuan_personil.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">2.</td>
		<td>Kesesuaian Metode</td>
		<td>'.$kesesuaian_metode_uji.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">3.</td>
		<td>Kondisi Peralatan Pengujian</td>
		<td>'.$kondisi_peralatan.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">4.</td>
		<td>Kelengkapan Bahan Kimia</td>
		<td>'.$kelengkapan_bahan_kimia.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">5.</td>
		<td>Kondisi Akomodasi</td>
		<td>'.$kondisi_akomodasi.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">6.</td>
		<td>Beban Pekerjaan Laboratorium</td>
		<td>'.$beban_pekerjaan.'</td>
		<td></td>
	</tr>
</table>
</font>
<br /> 
*) Beri tanda <img src="img/mark.jpg" alt="logo" height="9" width="9"> pada kolom yang sesuai <br />
**) Coret salah satu

<br />
Kesimpulan :<br />
<u>Permintaan dapat</u> / tidak dapat dilayani (coret salah satu)
'
;

$isi2 .= '
<br/>
<table border="0">
	<tr>
		<td width="5%"></td><td width="45%"></td><td width="45%"></td><td width="5%"></td>
	</tr>
	<tr>
		<td colspan="4"><b>Abnormalitas sampel (bila ada) :</b></td>
	</tr>
	<tr>
		<td>1.</td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td>2.</td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">Pelanggan</td>
		<td colspan="2" align="center">Petugas Pelayanan</td>
	</tr>
	<br/><br/><br/>
	<tr>
		<td colspan="2" align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
		<td colspan="2" align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
	</tr>
	<tr>
		<td colspan="4">Catatan :</td>
	</tr>
	<tr>
		<td>1.</td>
		<td colspan="3">Lembar asli [original] untuk pelanggan, kopi untuk laboratorium.</td>
	</tr>
	<tr>
		<td>2.</td>
		<td colspan="3">Masa simpan sampel di laboratorium maksimal 1 (satu) bulan, atau sesuai kebutuhan, atau sesuai permintaan pelanggan</td>
	</tr>
</table>
';

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->AddPage();
$this->pdf->MultiCell(0, 0, $isi2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('STP.pdf', 'I');
