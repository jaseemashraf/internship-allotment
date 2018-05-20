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

	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from company";
    $result = $conn->query($sql);

    $companies = Array();
    
    while( $row = $result->fetch_assoc()) {
        $companies[$row['id']] = Array(
            '1' => $row['cse_vac'],
            '2' => $row['cve_vac'],
            '3' => $row['ece_vac'],
            '4' => $row['eee_vac'],
            '5' => $row['mee_vac'],
            '6' => $row['pee_vac']
        );
    }
    $sql = "select student.id as studentId,fname, lname, cgpa, student.created_at, dp_id, company.id as companyId, name,  priority   
    from student, std_cmp, company, student_cgpa 
    where student.id = std_cmp.std_id 
    and student.id = student_cgpa.id
    and company.id = std_cmp.cmp_id
    order by cgpa desc,created_at, priority
    ";
    $result = $conn->query($sql);
    
    $student_allocation = Array();
    // Allocate the first 
    $allotment = $result->fetch_assoc();
    $company_id = $allotment['companyId'];
    $dp_id = $allotment['dp_id'];
    $companies[$company_id][$dp_id] = $companies[$company_id][$dp_id] - 1;
    $student_id = $allotment['studentId']; 
    $company_name = $allotment['name'];
    $conn->query("INSERT INTO final_list (student_id,company_name) VALUES ('".$student_id."','".$company_name."')");
    $allotted = Array($allotment['studentId'] => 1);
    $counter = 0;
    
    while( $row = $result->fetch_assoc()) 
    {
        $counter += 1;
        $student_id = $row['studentId'];
        $company_id = $row['companyId'];
        $dp_id = $row['dp_id'];
      //Check if student is already alloted a company
        if ($allotted[$student_id] == 1) {
            continue;
        } elseif ($companies[$company_id][$dp_id] > 0) {
            $companies[$company_id][$dp_id] = $companies[$company_id][$dp_id] - 1;
            $company_name = $row['name'];
            $conn->query("INSERT INTO final_list (student_id,company_name) VALUES ('".$student_id."','".$company_name."')");
            $conn->query("UPDATE student SET alloted=1 where id='$student_id'");
            $allotted[$student_id] = 1;
            echo('<br/>' . $student_id . $company_name);
        }  
    }
?>
