<?php 
require_once "conn.php";
require "fpdf/fpdf.php";

/* 
PDF A4 width: 219mm
default margin: 10mm each side
writable area: 219 - (10*2) = 189mm
*/

class mypdf extends FPDF{
    function header(){
        $this -> Image('img/logo.png', 10, 6);
        $this -> SetFont('Arial', 'B', 14);
        $this -> Cell(190, 10 , 'Automatic Invoices', 0, 0, 'C');
        $this -> Ln();
        $this -> SetFont('Times', '', 12);
        $this -> Cell(190, 11, 'Random Employee Data', 0, 0, 'C');
        $this -> Ln(20);
    }
    function footer(){
        $this -> SetY(-15);
        $this -> SetFont('Arial', '', 8);
        $this -> Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
    function headerTable(){
        $this -> SetFont('Times', 'B', 12);
        $this -> Cell(25, 10, 'ID', 1, 0, 'C');
        $this -> Cell(40, 10, 'Name', 1, 0, 'C');
        $this -> Cell(40, 10, 'Address', 1, 0, 'C');
        $this -> Cell(30, 10, 'Age', 1, 0, 'C');
        $this -> Cell(50, 10, 'Salary', 1, 0, 'C');
        $this -> Ln();
    }
    function randomTable(){
        $this -> SetFont('Times', '', 12);
        $all = 'abcdefghijklmnopqrstuvwxyz';

        $r = rand(10, 50);
        for($i=0; $i<$r; $i++){
            $this -> Cell(25, 10, strtoupper(substr(str_shuffle($all), 0, 2)).'-'.rand(1000, 9999), 1, 0, 'C');
            $this -> Cell(40, 10, ucfirst(substr(str_shuffle($all), 0, 7)).' '.ucfirst(substr(str_shuffle($all), 0, 5)), 1, 0, 'C');
            $this -> Cell(40, 10, substr(str_shuffle($all), 0, 12), 1, 0, 'C');
            $this -> Cell(30, 10, rand(20, 65), 1, 0, 'C');
            $this -> Cell(50, 10, rand(1000, 950000), 1, 0, 'C');
            $this -> Ln();
        }
    }
}

$pdf = new mypdf();

// generate pdf
$pdf -> AliasNbPages();
$pdf -> AddPage('P', 'A4', 0);
//$pdf -> Line(10, 60, 200, 60);
//$pdf -> Cell(100, 10, 'Hello test', 1, 0, 'C');
$pdf -> headerTable();
$pdf -> randomTable();

$pdf -> Output();

?>