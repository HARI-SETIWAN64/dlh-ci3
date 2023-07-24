<?php
  require APPPATH . '../vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
  use PhpOffice\PhpSpreadsheet\RichText\RichText;

  $spreadsheet= new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();

  $sheet->mergeCells('A1:J1');
  $sheet->setCellValue('A1', "Data Perusahaan");

  $sheet->setCellValue('A4', 'Nama');
  $sheet->setCellValue('B4', 'NPWRD');
  $sheet->setCellValue('C4', 'NIB');
  $sheet->setCellValue('D4', 'Perlin');
  $sheet->setCellValue('E4', 'Ipal');
  $sheet->setCellValue('F4', 'Kab');
  $sheet->setCellValue('G4', 'Kec');
  $sheet->setCellValue('H4', 'Kel');
  $sheet->setCellValue('I4', 'Alamat');
  $sheet->setCellValue('J4', 'Telp');
  $sheet->setCellValue('K4', 'Email');
  $sheet->setCellValue('L4', 'Jenis Usaha');


  // $sheet->getColumnDimension('A')->setWidth(14);
  // $sheet->getColumnDimension('B')->setWidth(30);
  // $sheet->getColumnDimension('C')->setWidth(11);


  $i=5;
  foreach($items as $item) {

    // $nokohir = new RichText();
    // $nokohir->createText($item->no_kohir);

    // $nosptpd = new RichText();
    // $nosptpd->createText($item->no_sptpd);

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A'.$i, $item->nama)
      ->setCellValue('B'.$i, $item->npwp)
      ->setCellValue('C'.$i, $item->nib)
      ->setCellValue('D'.$i, $perlin)
      ->setCellValue('E'.$i, $ipal)
      ->setCellValue('F'.$i, $item->kab)
      ->setCellValue('G'.$i, $item->NAMA_KEC)
      ->setCellValue('H'.$i, $item->NAMA_KEL)
      ->setCellValue('I'.$i, $item->alamat)
      ->setCellValue('J'.$i, $item->telp)
      ->setCellValue('K'.$i, $item->email)
      ->setCellValue('L'.$i, $item->jenis_usaha);
    $i++;
  }


  $filename = 'Lap_perusahaan_'.date('Ydmhis',strtotime('NOW')).'_'.$uid;

if($format == 'excel'){
  $writer = new Xlsx($spreadsheet);
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
  header('Cache-Control: max-age=0');
  $writer->save('php://output');
}elseif($format == 'pdf'){
  //
    IOFactory::registerWriter('Pdf', \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class);

    // Redirect output to a client’s web browser (PDF)
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="01simple.pdf"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
    $writer->save('php://output');
    exit;
}





 ?>
