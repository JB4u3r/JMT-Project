<?php
require 'fpdf.php';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "license";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





               


class myPDF extends FPDF {
    
function header(){
//$this->Image('registration.png',10,6);
$this->SetFont('Arial','B',14);
$this->Cell(276,5,'VEHICLE LICENSE RECEIPT',0,0,'C');
$this->Ln();
$this->SetFont('Times','',12);
$this->Cell(276,10,'Renewal',0,0,'C');
$this->Ln(20);
}
function footer(){
$this->SetY(-15);
$this->SetFont('Arial','',8);
$this->Cell(0,10,'Page' .$this->PageNo().'/{nb}',0,0,'C');
}

function headerTable(){
    $this->SetFont('Times','B',12);
    $this->Cell(20,10,'REF No.',1,0,'C');
    $this->Cell(40,10,'Name',1,0,'C');
    $this->Cell(40,10,'Surname',1,0,'C');
    $this->Cell(60,10,'Vehicle Book No.',1,0,'C');
    $this->Cell(36,10,'Vehicle Reg No.',1,0,'C');
    $this->Cell(30,10,'Cost ($) ',1,0,'C');
    $this->Cell(50,10,'Paid Using',1,0,'C');
    $this->Ln();
    }

    function viewTable($conn){
        $id=$_GET['id'];
       
        $sql = "SELECT * FROM details WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) { 
                $month = $row['month']; 
        
                              $this->SetFont('Times','B',12);
                              $this->Cell(20,10,$row['id'],1,0,'C');
                              $this->Cell(40,10,$row['name'],1,0,'C');
                              $this->Cell(40,10,$row['surname'],1,0,'C');
                              $this->Cell(60,10,$row['book'],1,0,'C');
                              $this->Cell(36,10,$row['plate'],1,0,'C');
                              $this->Cell(30,10,$month * 10,1,0,'C');
                              $this->Cell(50,10,$row['payment'],1,0,'C');
                              $this->Ln();
                              
                
         }
        } else {
            echo "0 results";
        }
    }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->Image('registration_background.png', 12, 30, $fpdf->w, $fpdf->h);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Output();

?>