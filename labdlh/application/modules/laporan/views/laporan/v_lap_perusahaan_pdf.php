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
$this->pdf = new MyPDF('L', 'mm','F4', true, 'UTF-8', false);
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
              DATA PERUSAHAAN
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
        <td width="3%"><b>No.</b></td>
        <td width="10%"><b>Nama</b></td>
        <td width="7%"><b>NPWRD</b></td>
        <td width="7%"><b>NIB</b></td>
        <td width="5%"><b>Perlin</b></td>
        <td width="5%"><b>Ipal</b></td>
        <td width="7%"><b>Kab</b></td>
        <td width="9%"><b>Kec</b></td>
        <td width="9%"><b>Kel</b></td>
        <td width="18%"><b>Alamat</b></td>
        <td width="5%"><b>Telp</b></td>
        <td width="5%"><b>Email</b></td>
        <td width="10%"><b>Jenis Usaha</b></td>
    </tr>';
    $no = 0;
    foreach ($items as $item) {
        $no++;


        $ipal = "Tidak Ada";  
        $perlin = "Tidak Ada";
        if($item->perlin=='1'){
            $perlin = "Ada";
        }
        if($item->ipal=='1'){
            $ipal = "Ada";
        }
        $isi2 .= '
        <tr>
            <td> '.$no.'.</td>
            <td> '.$item->nama.'</td>
            <td> '.$item->npwp.'</td>
            <td> '.$item->nib.'</td>
            <td> '.$perlin.'</td>
            <td> '.$ipal.'</td>
            <td> '.$item->kab.'</td>
            <td> '.$item->NAMA_KEC.'</td>
            <td> '.$item->NAMA_KEL.'</td>
            <td> '.$item->alamat.'</td>
            <td> '.$item->telp.'</td>
            <td> '.$item->email.'</td>
            <td> '.$item->jenis_usaha.'</td>
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

// echo $isi;
// die();
$this->pdf->MultiCell(0, 0, $isi2, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='10', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('Lap Perusahaan.pdf', 'D');
