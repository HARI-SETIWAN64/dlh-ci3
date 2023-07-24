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
              Data Uji Lab Per Bulan
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
        <td align="center" width="35%"><b>Nama</b></td>
        <td align="center" width="5%"><b>01</b></td>
        <td align="center" width="5%"><b>02</b></td>
        <td align="center" width="5%"><b>03</b></td>
        <td align="center" width="5%"><b>04</b></td>
        <td align="center" width="5%"><b>05</b></td>
        <td align="center" width="5%"><b>06</b></td>
        <td align="center" width="5%"><b>07</b></td>
        <td align="center" width="5%"><b>08</b></td>
        <td align="center" width="5%"><b>09</b></td>
        <td align="center" width="5%"><b>10</b></td>
        <td align="center" width="5%"><b>11</b></td>
        <td align="center" width="5%"><b>12</b></td>
    </tr>';

    $januari=$februari=$maret=$april=$mei=$juni=$juli=$agustus=$sepetember=$oktober=$november=$desember=0;
    $no = 0;
    foreach ($items as $item) {
        $no++;

        if($item->januari == 0){ $c_januari = 'bgcolor="#f27e7e"'; } else { $c_januari = ''; }
        if($item->februari == 0){ $c_februari = 'bgcolor="#f27e7e"'; } else { $c_februari = ''; }
        if($item->maret == 0){ $c_maret = 'bgcolor="#f27e7e"'; } else { $c_maret = ''; }
        if($item->april == 0){ $c_april = 'bgcolor="#f27e7e"'; } else { $c_april = ''; }
        if($item->mei == 0){ $c_mei = 'bgcolor="#f27e7e"'; } else { $c_mei = ''; }
        if($item->juni == 0){ $c_juni = 'bgcolor="#f27e7e"'; } else { $c_juni = ''; }
        if($item->juli == 0){ $c_juli = 'bgcolor="#f27e7e"'; } else { $c_juli = ''; }
        if($item->agustus == 0){ $c_agustus = 'bgcolor="#f27e7e"'; } else { $c_agustus = ''; }
        if($item->sepetember == 0){ $c_sepetember = 'bgcolor="#f27e7e"'; } else { $c_sepetember = ''; }
        if($item->oktober == 0){ $c_oktober = 'bgcolor="#f27e7e"'; } else { $c_oktober = ''; }
        if($item->november == 0){ $c_november = 'bgcolor="#f27e7e"'; } else { $c_november = ''; }
        if($item->desember == 0){ $c_desember = 'bgcolor="#f27e7e"'; } else { $c_desember = ''; }

        $isi2 .= '
        <tr>
            <td> '.$no.'</td>
            <td> '.$item->nama.'</td>
            <td align="center" '.$c_januari.'> '.$item->januari.'</td>
            <td align="center" '.$c_februari.'> '.$item->februari.'</td>
            <td align="center" '.$c_maret.'> '.$item->maret.'</td>
            <td align="center" '.$c_april.'> '.$item->april.'</td>
            <td align="center" '.$c_mei.'> '.$item->mei.'</td>
            <td align="center" '.$c_juni.'> '.$item->juni.'</td>
            <td align="center" '.$c_juli.'> '.$item->juli.'</td>
            <td align="center" '.$c_agustus.'> '.$item->agustus.'</td>
            <td align="center" '.$c_sepetember.'> '.$item->sepetember.'</td>
            <td align="center" '.$c_oktober.'> '.$item->oktober.'</td>
            <td align="center" '.$c_november.'> '.$item->november.'</td>
            <td align="center" '.$c_desember.'> '.$item->desember.'</td>
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
$this->pdf->Output('Lap Uji Perbulan.pdf', 'D');
