<?php

class MyPDF extends TCPDF {
    // var $htmlFooter;
    // public function setHtmlFooter($htmlFooter) {
    //     $this->htmlFooter = $htmlFooter;
    // }
    // public function Footer() {
    //     $this->SetY(-15);
    //     $this->writeHTML("<hr>", false, false, false, false, '');
    //     $this->SetY(-14);
    //     $this->SetFont('helvetica', 'I', 7);
    //     $this->writeHTMLCell(
    //         $w = 0, $h = 0, $x = '', $y = '',
    //         $this->htmlFooter, $border = 0, $ln = 1, $fill = 0,
    //         $reseth = true, $align = 'top', $autopadding = true);
    // }
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

$isi2 = '
<table>
    <tr>
        <td>
            <div align="center">
              Data Rekap List Project
            </div>
        </td>
    </tr>
</table>
<font size="7" face="Courier New">
';
$isi2 .= '
<font size="7" face="Courier New">
<table border="1" width="100%">
    <tr align="center">
        <td align="center" width="5%"><b>No</b></td>
        <td align="center" width="35%"><b>Jenis Tugas</b></td>
        <td align="center" width="15%"><b>Belum Dikerjakan</b></td>
        <td align="center" width="15%"><b>Sedang Dikerjakan</b></td>
        <td align="center" width="15%"><b>Selesai Tepat Waktu</b></td>
        <td align="center" width="15%"><b>Selesai Terlambat</b></td>
    </tr>';

    $belum_dikerjakan=$sedang_dikerjakan=$tepat_waktu=$terlambat=0;
    $no = 0;
    foreach ($items as $item) {
        $no++;

        if($item->belum_dikerjakan == 0){ $c_belum_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_belum_dikerjakan = ''; }
        if($item->sedang_dikerjakan == 0){ $c_sedang_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_sedang_dikerjakan = ''; }
        if($item->tepat_waktu == 0){ $c_tepat_waktu = 'bgcolor="#f27e7e"'; } else { $c_tepat_waktu = ''; }
        if($item->terlambat == 0){ $c_terlambat = 'bgcolor="#f27e7e"'; } else { $c_terlambat = ''; }

        $isi2 .= '
        <tr>
            <td> '.$no.'</td>
            <td> '.$item->jenis_tugas.'</td>
            <td align="center" '.$c_belum_dikerjakan.'> '.$item->belum_dikerjakan.'</td>
            <td align="center" '.$c_sedang_dikerjakan.'> '.$item->sedang_dikerjakan.'</td>
            <td align="center" '.$c_tepat_waktu.'> '.$item->tepat_waktu.'</td>
            <td align="center" '.$c_terlambat.'> '.$item->terlambat.'</td>
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
';

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('Rekap Total Project.pdf', 'D');
