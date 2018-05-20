<?php
    session_start();
	if(!isset($_SESSION['name']))
	{
		header("location: admin_login.php");
    }
    $host='localhost';
    $user='root';
    $dbpassword='donotgiveup.1';
    $dbname='it_project';
    $conn=new  mysqli($host,$user,$dbpassword,$dbname);
    $count="select * from final_list";  
    require('fpdf.php');
    $pdf = new FPDF(); 
    $pdf->AddPage();
    $width_cell=array(50,60);
    $pdf->SetFont('Arial','B',16);
    $pdf->SetFillColor(193,229,252);
    $pdf->Cell($width_cell[0],10,'STUDENT ID',1,0,C,true);  
    $pdf->Cell($width_cell[1],10,'COMPANY ALLOTED',1,1,C,true); 
    $pdf->SetFont('Arial','',14);
    $pdf->SetFillColor(235,236,236); 
    $fill=false;  
    foreach ($conn->query($count) as $row) 
    {
        $pdf->Cell($width_cell[0],10,$row['student_id'],1,0,C,$fill);
        $pdf->Cell($width_cell[1],10,$row['company_name'],1,1,L,$fill);
        $fill = !$fill;
    }
    $pdf->Output();
?>