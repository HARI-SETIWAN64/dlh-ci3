<?php



$this->pdf = new FPDI('L', 'mm','A4', true, 'UTF-8', false);

        $this->pdf->SetSubject('PDF');
        $this->pdf->SetKeywords('PDF, PDF, example, test, guide'); 
		$this->pdf->setPrintHeader(false);
		$this->pdf->SetDisplayMode('real',$mode='UseOC');
		$this->pdf->setPrintFooter(false);
        // set font
        $this->pdf->SetFont('helvetica', '', 8);
		$this->pdf->SetMargins(5, 5, 5, true);

		$this->pdf->SetAutoPageBreak(TRUE, 0);


$this->pdf->setSourceFile('pfm.pdf');

// add a page
$this->pdf->AddPage();
// set the source file

// import page 1
$tplIdx = $this->pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$this->pdf->useTemplate($tplIdx, 3, 3, 290);

//wil
$this->pdf->Image(base_url().'images/logo.jpg' , '201', '31', '18', '', '', '', 'T', false, 75, '', false, false, 0, false, false, false);


$this->pdf->Output();

?>