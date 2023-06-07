<?php
require_once '../db/dbConn.php';

function InsertRecord() {
    global $conn;

    $EmpID = mysqli_real_escape_string($conn, $_POST['EmployeeID']);
    $EmpEmail = mysqli_real_escape_string($conn, $_POST['EmployeeEmail']);
    $EmpLname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $EmpFname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $EmpMI = mysqli_real_escape_string($conn, $_POST['MI']);
    $EmpSuffix = mysqli_real_escape_string($conn, $_POST['Suffix']);
    $EmpStAddress = mysqli_real_escape_string($conn, $_POST['StAddress']);
    $EmpBrgy = mysqli_real_escape_string($conn, $_POST['Brgy']);
    $EmpCity = mysqli_real_escape_string($conn, $_POST['City']);
    $EmpProvince = mysqli_real_escape_string($conn, $_POST['Province']);

    $query = "INSERT INTO tbl_employee (employeeID, empEmail, empLname, empFname, empMI, empSuffix, st, brgy, city, province) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $EmpID, $EmpEmail, $EmpLname, $EmpFname, $EmpMI, $EmpSuffix, $EmpStAddress, $EmpBrgy, $EmpCity, $EmpProvince);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Insertion was successful
        mysqli_stmt_close($stmt);
        return true;
    } else {
        // Handle error case
        mysqli_stmt_close($stmt);
        echo "<script>alert('Data insertion failed!');</script>";
        return false;
    }
}

function DisplayRecord(){
	global $conn;
	if(isset($_POST['DisplayDatainsView_Send'])){
		$table='<table id="DB_InstructorTableView" class="table table-bordered table-hover" style="width:100%">
				<thead class="table-info">
					<tr>
						<th>Employee ID</th>
						<th>Full Name</th>
						<th>TOR</th>
						<th>
							<center>Edit</center>
						</th>
					</tr>
				</thead>';
		$query = "SELECT * FROM tbl_employee";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)){
			$table.='<tr>
						<td>'.$row['employeeID'].'</td>
						<td>'.$row['empLname'].' '.$row['empFname'].' '.$row['empMI'].' '.$row['empSuffix'].'</td>
						<td>'.$row['tor_pdf'].'</td>
						<td>
							<center>
								<button type="button" onclick="GetData('.$row['ID'].')" class="btn btn-primary">
									<span class=" d-flex justify-content-center align-items-center">
										<i class="fa-solid fa-user-pen text-light"></i>
									</span>
								</button>
							</center>
						</td>
					</tr>';
		}
		$table.='</table>';
		echo $table;
	}
}

function GetRecord(){
	global $conn;
	if(isset($_POST['updateID_Send'])){
		$recordID = $_POST['updateID_Send'];
		$query = "SELECT * FROM tbl_employee WHERE ID = $recordID";
		$result = mysqli_query($conn, $query);
		$response = array();
		while($row = mysqli_fetch_assoc($result)){
			$response = $row;
		}
		echo json_encode($response);
	}else{
		$response['status']=200;
		$response['message']="Invalid data found";
	}
}

function UpdateRecordPDF() {
    global $conn;

    if(isset($_POST['hiddenID'])) {
        $gethiddenID = $_POST['hiddenID'];
        
        // Retrieve the PDF file data
        if(isset($_FILES['tor_pdfFile']) && $_FILES['tor_pdfFile']['error'] === UPLOAD_ERR_OK) {
            $pdfData = file_get_contents($_FILES['tor_pdfFile']['tmp_name']);
            
            // Update the record in the database
            $query = "UPDATE tbl_employee SET tor_pdf = ? WHERE ID = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'ss', $pdfData, $gethiddenID);
            $result = mysqli_stmt_execute($stmt);
            
            mysqli_stmt_close($stmt);
            
            if ($result) {
                // Update was successful
                return true;
            } else {
                // Handle error case
                echo "<script>alert('Data update failed!');</script>";
                return false;
            }
        }
    }
}
