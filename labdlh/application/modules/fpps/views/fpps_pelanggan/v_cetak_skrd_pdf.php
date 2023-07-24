<?php
$nama_pejabat = $fpps->nama;
$nip_pejabat = $fpps->nip;
$jabatan = $fpps->jabatan;

$tgl_penyetorans = '';


if($fpps->tgl_setor!='0000-00-00' || $fpps->tgl_setor != 1970-01-01) $tgl_setor = date('d',strtotime($fpps->tgl_setor)).' '.$this->fungsi->bulan(date('m',strtotime($fpps->tgl_setor))).' '.date('Y',strtotime($fpps->tgl_setor)); else $tgl_setor='-';
if($fpps->tgl_terima!='0000-00-00' || $fpps->tgl_terima != 1970-01-01) $tgl_terima = date('d',strtotime($fpps->tgl_terima)).' '.$this->fungsi->bulan(date('m',strtotime($fpps->tgl_terima))).' '.date('Y',strtotime($fpps->tgl_terima)); else $tgl_terima='-';
if($tgl2!='0000-00-00' || $tgl2 != 1970-01-01)
$tgl_penyetoran = date('d',strtotime($fpps->tgl_penyetoran)).' '.$this->fungsi->bulan(date('m',strtotime($fpps->tgl_penyetoran))).' '.date('Y',strtotime($fpps->tgl_penyetoran));  else $tgl_penyetoran='-';

if($fpps->tgl_penyetoran == '' || $fpps->tgl_penyetoran == '0000-00-00')
{
	$tgl_penyetorans = date('d',strtotime($fpps->tgl_penyetoran)).' '.$this->fungsi->bulan(date('m',strtotime($fpps->tgl_penyetoran))).' '.date('Y',strtotime($fpps->tgl_penyetoran));
}
else
{
	$tgl_penyetorans = '';
}

class MyPDF extends TCPDF {
	var $htmlFooter;
	public function setHtmlFooter($htmlFooter) {
        $this->htmlFooter = $htmlFooter;
    }
	public function Footer() {
    //     $this->SetY(-20);
  		// $this->writeHTML("<hr>", false, false, false, false, '');
        $this->SetY(-19);
        $this->SetFont('helvetica', 'I', 7);
        $this->writeHTMLCell(
            $w = 0, $h = 0, $x = '', $y = '',
            $this->htmlFooter, $border = 0, $ln = 1, $fill = 0,
            $reseth = true, $align = 'top', $autopadding = true);
    }
}

$this->pdf = new MyPDF('P', 'mm','LETTER', true, 'UTF-8', false);
$this->pdf->SetSubject('');
$this->pdf->SetKeywords('');
$this->pdf->setPrintHeader(false);
$this->pdf->SetDisplayMode('real',$mode='UseOC');
$this->pdf->setPrintFooter(true);
$this->pdf->SetFont('times', '', 9);
$this->pdf->SetMargins(5, 5, 2, true);
$this->pdf->AddPage();

$foter ='
<div align="center" style="font-family:monospace;"> Halaman '.$this->pdf->getAliasNumPage().' Dari '.$this->pdf->getAliasNbPages().' </div>
';
$this->pdf->setHtmlFooter($foter);

$isi= '
<style>
.atas { top: 20px; left: 87.5px;font-family: monospace; transform: scaleX(1); text-align:center }
.isi { top: 20px;  left: 87.5px;font-family: monospace; transform: scaleX(1);   }
th { border: 0.5 dashed #000000; }
.kiri { border-left: 0.5 dashed #000000; }
.kanan { border-right: 0.5 dashed #000000;}
.bawah { border-bottom: 0.5 dashed #000000;}
 </style>
<table cellspacing="0" cellpadding="2" >
  <tr>
  <th colspan="5" style="width:240;" class="atas ">PEMERINTAH KABUPATEN BANYUWANGI<br/>Jl. A Yani No. 100 <br/> BANYUWANGI</th>
  <th style="width:210;" class="atas ">SURAT KETETAPAN <br/> RETRIBUSI DAERAH <br/> Tahun '.$fpps->tahun.'</th>
  <th colspan="2" style="width:125;" class="atas ">NO KOHIR <br/> '.$fpps->no_kohir.' <br/> KODE BAYAR <br/><STRONG>'.$fpps->kode_bayar.'</STRONG></th>
  </tr>
  <tr>
    <td colspan="2" class="isi kiri">&nbsp; Nama OP.</td>
    <td colspan="6" class="isi kanan"> : '.$fpps->nama_pt.'</td>
  </tr>
  <tr>
    <td colspan="2" class="isi kiri">&nbsp; Alamat </td>
    <td colspan="6" class="isi kanan"> : '.$fpps->alamat_pt.'</td>
  </tr>
   <tr>
    <td colspan="2" class="isi kiri">&nbsp; NOPD </td>
    <td colspan="6" class="isi kanan"> : '.$fpps->npwp.'</td>
  </tr>
  <tr>
    <td colspan="8" class="isi kiri kanan">&nbsp; Batas Penyetoran terakhir Tanggal : '.$tgl_setor.'</td>
  </tr>
  <tr>
    <th class="atas" style="width:20;" >No</th>
    <th colspan="2" class="atas" style="width:100;">Kode Tarif</th>
    <th colspan="2" class="atas" style="width:195;">Uraian</th>
    <th colspan="2" class="atas" style="width:180;">Keterangan</th>
    <th colspan="1" class="atas" style="width:80;">Jumlah</th>
  </tr>';
  $no=0;
  foreach($d as $data){
  	$no++;
		$isi .= '
	 <tr>
	    <td class="atas kiri">'.$no.'</td>
	    <td colspan="2" class="isi kiri" style="width:100;">'.$data->kd_rek_tarif_pajak.'</td>
	    <td colspan="2" class="isi kiri" style="width:195;">'.$data->uraian_tarif_pajak.'</td>
	    <td colspan="2" class="isi kiri" style="width:180;">Jumlah : '.number_format($data->omset,2,',','.').'<br/> Tarif :'.number_format($data->tarif,2,',','.').'<br>'.$data->keterangan.'</td>
	    <td style="text-align:right" class="isi kiri kanan">'.number_format($data->biaya,2,',','.').'</td>
	  </tr>
	  ';
  }
  $isi .= '
  <tr>
    <th colspan="3" class="atas" style="width:120;">&nbsp;</th>
    <th colspan="4" class="isi kiri" style="width:375;"> Jumlah</th>
    <th style="text-align:right; width:80;" class="isi kiri kanan">'.number_format($fpps->total,2,',','.').' &nbsp;</th>
  </tr>
  <tr>
     <td colspan="8" class="kiri kanan bawah" >&nbsp; Terbilang: <em>('.$fpps->total_text.')</em></td>
   </tr>
  ';
$isi .= '</table>';

$isi .='
<style>
td { left: 87.5px;font-family: monospace; transform: scaleX(1); }
</style>

<table border="0" cellspacing="0" cellpadding="0" style="width:575px;border-left: 0.5 dashed #000000; border-right: 0.5 dashed #000000; border-bottom: 0.5 dashed #000000;">
 <tr>
    <td>&nbsp;Perhatian:
	<ol>
		<li>Harap Penyetoran dilakukan pada teller Bank Jatim.</li>
		<li>Panduan online pambayaran dapat dikases melalui https://layanan.banyuwangikab.go.id .</li>
		<li>Apabila SKPD ini tidak/kurang dibayar setelah Batas Penyetoran terakhir, dikenakan sanksi administrasi berupa bunga sebesar 2% per-bulan.</li>
	</ol>
	<br/><br/>
	</td>
  </tr>
</table>';

if($fpps->status_penyetoran == '1') {

	if($fpps->ipg_source){

		$setor_tgll = date('d',strtotime($fpps->tgl_penyetoran));
		$setor_bln = $this->fungsi->bulan(date('m',strtotime($fpps->tgl_penyetoran)));
		$setor_thn = date('Y',strtotime($fpps->tgl_penyetoran));
		$tglsetorr = $setor_tgll.' '.$setor_bln.' '.$setor_thn;



	$bukti = ' ***** DUPLIKAT *****<br/>
			Sudah dibayar melalui '.$fpps->ipg_source.' <br/>
			ID: '.$fpps->id_pajak_retribusi.'<br/>
			Tgl: '.$tglsetorr.'
           ';
	}else {
		$setor_tgll = date('d',strtotime($fpps->tgl_penyetoran));
		$setor_bln = $this->fungsi->bulan(date('m',strtotime($fpps->tgl_penyetoran)));
		$setor_thn = date('Y',strtotime($fpps->tgl_penyetoran));
		$tglsetorr = $setor_tgll.' '.$setor_bln.' '.$setor_thn;
		$bukti = '***** DUPLIKAT *****<br/>
				Sudah Setor Tanggal :<br/>
				'.$tglsetorr.'
				';
	}

}else{
  $bukti = '';
}

	$isi .= '
	<table border="0" cellspacing="0" cellpadding="0" style="border-left: 0.5 dashed #000000; border-right: 0.5 dashed #000000; border-top: 0.5 dashed #000000; border-bottom: 0.5 dashed #000000;">
	  <tr >
		<td style="width:10px;"></td>
		<td style="width:255px;">'.$bukti.'

		</td >
		<td align="center" style="width:310px;">

			Banyuwangi, '.$tgl_terima.'<br/>
			Dinas Lingkungan Hidup<br/>
			'.$jabatan.'<br/>
			<br/><br/><br/><br/>

			'.$nama_pejabat.'<br/>
			'.$nip_pejabat.'

		</td>
	  </tr>
	</table>';

// print_r($isi); die();
ob_clean();
$this->pdf->MultiCell(0, 0, $isi, $border=0, $align='', $fill=0, $ln=1, $x='5.5', $y='5.5', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('FPPS.pdf', 'I');
