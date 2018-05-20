<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

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
    $content = $pdf->Output('/tmp/doc.pdf','F');


    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'presidencyuniversity88@gmail.com';                 // SMTP username
    $mail->Password = 'Jaseem@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('presidencyuniversity88@gmail.com', 'Presidency University');
    $mail->addAddress('presidencyuniversity88@gmail.com');     // Add a recipient
       
    $mail->addBCC('testproject337@gmail.com');
    $mail->addBCC('manoj.pm@v2solutions.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     $mail->addAttachment('/tmp/doc.pdf', 'Allocatiion.pdf');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Allocation Details';
    $mail->Body    = 'Attached pdf file contains the allocation deails';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>