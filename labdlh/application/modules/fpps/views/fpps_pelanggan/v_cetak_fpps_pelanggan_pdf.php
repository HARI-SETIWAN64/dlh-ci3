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
$this->pdf->SetFont('times', '', 10);
$this->pdf->SetMargins(10, 10, 10, true);
$this->pdf->AddPage();
$foter ='
<table>
	<tr>
		<td width="10%">Revisi/Terbitan</td>
		<td width="1%">:</td>
		<td width="20%">'.$fpps->footer_terbit.'</td>
		<td width="38%"></td>
		<td width="10%">No.  Dok.</td>
		<td width="1%">:</td>
		<td width="20%">'.$fpps->footer_no_dok.'</td>
	</tr>
	<tr>
		<td>Tanggal berlaku</td>
		<td>:</td>
		<td>'.$fpps->footer_berlaku.'</td>
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
		<table width="100%" style="font-size:11px">
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
				<td>:
					<table>
						<tr>
							<td width="20%">Nama</td>
							<td width="80%">: '.$nama.'</td>
						</tr>
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
				<td>: '.$fpps->nama_kode_sampel.' - '.$fpps->jenis_industri.'</td>
			</tr>
			<br />
			<tr>
				<td>Jumlah Sampel</td>
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
			<br />
			<tr>
				<td>Pengukuran Lapangan</td>
				<td>: '.$fpps->pengukuran_lapangan.'</td>
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
</table>
<font size="7" face="Courier New">
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
			$tidak = '<img src="img/mark.jpg" alt="logo" height="5" width="4">';
		}else{
			$iya = '<img src="img/mark.jpg" alt="logo" height="5" width="4">';
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

if($fpps->kemampuan_personil != 1){$kemampuan_personil = "<s>Mampu</s> / Tidak Mampu";}else{$kemampuan_personil = "Mampu / <s>Tidak Mampu</s>";}
if($fpps->kesesuaian_metode_uji != 1){$kesesuaian_metode_uji = "<s>Sesuai</s> / Tidak sesuai";}else{$kesesuaian_metode_uji = "Sesuai / <s>Tidak sesuai</s>";}
if($fpps->kondisi_peralatan != 1){$kondisi_peralatan = "Rusak / <s>Tidak rusak </s>";}else{$kondisi_peralatan = "<s>Rusak</s> / Tidak rusak";}
if($fpps->kelengkapan_bahan_kimia != 1){$kelengkapan_bahan_kimia = "<s>Lengakap </s> / Tidak lengkap";}else{$kelengkapan_bahan_kimia = "Lengkap / <s>Tidak lengkap</s>";}
if($fpps->kondisi_akomodasi != 1){$kondisi_akomodasi = "<s>Sesuai </s> / Tidak sesuai";}else{$kondisi_akomodasi = "Sesuai / <s>Tidak sesuai</s>";}
if($fpps->beban_pekerjaan != 1){$beban_pekerjaan = "Over load / <s>Tidak Over load </s>";}else{$beban_pekerjaan = " <s>Over load </s> /Tidak over load";}
$isi2 .= '
<br />
<br />
Kaji Ulang Permintaan
<br />
<table border="1">
	<tr align="center">
		<td width="5%">No.</td>
		<td width="40%">Unsur Kaji Ulang</td>
		<td width="30%">Hasil Kaji Ulang</td>
		<td width="25%">Kendala</td>
	</tr>
	<tr>
		<td align="center">1.</td>
		<td> Kemampuan Personil</td>
		<td> '.$kemampuan_personil.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">2.</td>
		<td> Kesesuaian Metode</td>
		<td> '.$kesesuaian_metode_uji.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">3.</td>
		<td> Kondisi Peralatan Pengujian</td>
		<td> '.$kondisi_peralatan.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">4.</td>
		<td> Kelengkapan Bahan Kimia</td>
		<td> '.$kelengkapan_bahan_kimia.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">5.</td>
		<td> Kondisi Akomodasi</td>
		<td> '.$kondisi_akomodasi.'</td>
		<td></td>
	</tr>
	<tr>
		<td align="center">6.</td>
		<td> Beban Pekerjaan Laboratorium</td>
		<td> '.$beban_pekerjaan.'</td>
		<td></td>
	</tr>
</table>
</font>
<br /> 
*) Beri tanda <img src="img/mark.jpg" alt="logo" height="9" width="9"> pada kolom yang sesuai <br />
**) Coret salah satu

<br />
Kesimpulan :<br />
Permintaan dapat / <s>tidak dapat</s> dilayani (coret salah satu)
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
</font>
';

// echo $isi2;
// die();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->AddPage();
$this->pdf->MultiCell(0, 0, $isi2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('FPPS.pdf', 'I');
