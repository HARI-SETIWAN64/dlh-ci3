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

$this->pdf = new MyPDF('L', 'mm','F4', true, 'UTF-8', false);
$this->pdf->SetSubject('');
$this->pdf->SetKeywords('');
$this->pdf->setPrintHeader(false);
$this->pdf->SetDisplayMode('real',$mode='UseOC');
$this->pdf->setPrintFooter(true);
$this->pdf->SetFont('times', '', 8);
$this->pdf->SetMargins(6, 4, 4, 4);
$this->pdf->AddPage();


$query = $this->db->query('SELECT * FROM alat_footer');
$result = $query->result();

foreach ($result as $row) {
  $foter ='
  <table>
    <tr>
      <td width="10%">Revisi/Terbitan</td>
      <td width="1%">:</td>
      <td width="70%">'.$row->footer_terbit.'</td>
      <td width="10%">No.  Dok.</td>
      <td width="1%">:</td>
      <td>'.$row->footer_no_dok.'</td>
    </tr>
    
    <tr>
      <td>Tanggal berlaku</td>
      <td>: <b></b></td>
      <td>'.$row->footer_berlaku.'</td>
      <td>Halaman</td>
      <td>:</td>
      <td>'.$this->pdf->getAliasNumPage().' of '.$this->pdf->getAliasNbPages().'</td>
    </tr>
  </table>
  ';

  

$this->pdf->setHtmlFooter($foter);

}

$heder ='
<table width="100%" border="0">
  <tr>
    <td width="10%"><img src="img/BWI.jpg" alt="logo" width="70"></td>
    <td  width="80%"><div align="center">
      <font size="13"><b>PEMERINTAH KABUPATEN BANYUWANGI<br/>
      DINAS LINGKUNGAN HIDUP<br/>
      UPTD LABORATORIUM LINGKUNGAN<br/></b></font>
      <font size="9">Jl. Wijaya Kusuma No 102 Banyuwangi Telp/Fax (0333) 428833<br/></font>
    </div></td>
    <td width="10%"><img src="images/KAN.jpg" alt="logo" width=""></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
</table>
';


$isi ='
    <table width="100%">
        <tr align="center">
            <td><font size="10"><b>DAFTAR <br /> INVENTARIS KALIBRASI PERALATAN</b></font></td>
        </tr>
    </table>
';

$content = ' 
  <table border="1" cellpadding="3">  
    <tr align="center">
      <th width="3%"><b>No</b></th>
      <th width="8%"><b>Nama Alat</b></th>
      <th width="6%"><b>Kode Alat</b></th>
      <th width="8%"><b>Titik Kalibrasi</b></th>
      <th width="3%"><b>Kelas</b></th>
      <th width="4%"><b>Daya</b></th>
      <th width="6%"><b>Rentang</b></th>
      <th width="5%"><b>Resolusi</b></th>
      <th width="5%"><b>Toleransi</b></th>
      <th width="6%"><b>Merk</b></th>
      <th width="5%"><b>Model</b></th>
      <th width="5%"><b>No Seri</b></th>
      <th width="5%"><b>Periode</b></th>
      <th width="7%"><b>Kal. Terakhir</b></th>
      <th width="8%"><b>Kal. Selanjutnya</b></th>
      <th width="5%"><b>Status Kal.</b></th>
      <th width="10%"><b>Provider</b></th>
    </tr>
  </table>
';

    $no = 0;
    $itemsPerPage = 10;
    $page = 1;
    $itemCount = 0;

    $this->pdf->writeHTML($heder, true, true, true, true, '');
    $this->pdf->Ln(4);  
    $this->pdf->writeHTML($isi, true, true, true, true, '');
    $this->pdf->Ln(8);  
    $this->pdf->writeHTML($content, true, true, true, true, '');

    foreach ($items as $item) {
        $no++;
        date_default_timezone_set("Asia/Jakarta");
        $time =  Date('Y-m-d');
        $nextcal= $item->nextcal;
        $startdate = date('Y-m-d', strtotime('-60 days', strtotime($nextcal)));
          if($time < $startdate){
            $statuscal='1';
          }elseif($time < $nextcal){
            $statuscal='2';
          }else{
            $statuscal='3';
          }
          $data = array('1'=>'Aktif', '2'=>'Hold', '3'=>'Non-Aktif');
        $dataku = '
          <table border="1" cellpadding="7">  
                  <tr align="center">
                    <th width="3%">'.$no.'</th>
                    <th width="8%">'.$item->nama_alat.'</th>
                    <th width="6%">'.$item->kode_alat.'</th>
                    <th width="8%"> '.$item->titikkalibrasi.'</th>
                    <th width="3%"> '.$item->kelas.'</th>
                    <th width="4%"> '.$item->daya.' '.$item->satuan_daya.'</th>
                    <th width="6%"> '.$item->usagerange.' '.$item->satuan_rentang.'</th>
                    <th width="5%"> '.$item->resolusion.' '.$item->satuan_resolusi.'</th>
                    <th width="5%"> '.$item->tolerance.' '.$item->satuan_toleransi.'</th>
                    <th width="6%"> '.$item->brand.'</th>
                    <th width="5%"> '.$item->model.'</th>
                    <th width="5%"> '.$item->noseri.'</th>
                    <th width="5%"> '.$item->periode.' '.$item->satuan_periode.'</th>
                    <th width="7%"> '.$item->lastcal.'</th>
                    <th width="8%"> '.$item->nextcal.'</th>
                    <th width="5%"> '.$data[$statuscal].'</th>
                    <th width="10%"> '.$item->provider.'</th>         
                  </tr>
              </table>
            ';

        if ($itemCount >= $itemsPerPage) {
                // Add a new page
              $this->pdf->AddPage();
              $page++;
              $itemCount = 0;

              $this->pdf->writeHTML($heder, true, true, true, true, '');
              $this->pdf->writeHTML($isi, true, true, true, true, '');
              $this->pdf->Ln(8);
              $this->pdf->writeHTML($content, true, true, true, true, '');
              
            }
              // $this->pdf->SetFont('helvetica', 'B', 12);
              // $this->pdf->Cell(0, 10, 'Nama Alat: ' . $item->nama_alat, 0, 1, 'L')
              $this->pdf->Ln(0); // Atur jarak antara baris
              $this->pdf->writeHTML($dataku, true, true, true, true, '');
              $this->pdf->SetAutoPageBreak(false);
              $itemCount++;
            }
// echo $isi;

// $this->pdf->MultiCell(0, 0, $isi, $border=0, $align='T', $fill=0, $ln=1, $x='8', $y='38', $reseth=true, $stretch=0, $ishtml=true, $autopadding=true, $maxh=0);
$this->pdf->Output('Iventaris Alat.pdf','I');

