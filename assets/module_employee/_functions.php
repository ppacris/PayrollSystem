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

function DisplayRecord() {
    global $conn;
    if (isset($_POST['DisplayDatainsView_Send'])) {
        $table = '<table id="DB_EmployeeTableView" class="table table-bordered table-hover" style="width:100%">
                <thead class="table-info">
                    <tr>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>PDF0</th>
                        <th>PDF1</th>
                    </tr>
                </thead>';
        $query = "SELECT * FROM tbl_employee";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $table .= '<tr>
                        <td>'.$row['employeeID'].'</td>
                        <td>'.$row['empLname'].' '.$row['empFname'].' '.$row['empMI'].' '.$row['empSuffix'].'</td>
                        <td>
                            <center>
                                <button type="button" onclick="GetData('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                    <span class="d-flex justify-content-center align-items-center">
                                        Open
                                    </span>
                                </button>
                            </center>
                        </td>
                        <td>
                            <center>
                                <button type="button" onclick="GetData('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                    <span class="d-flex justify-content-center align-items-center">
                                        Open
                                    </span>
                                </button>
                            </center>
                        </td>
                    </tr>';
        }
        $table .= '</table>';
        echo $table;
    }
}

function DisplayRecordPDF() {
    global $conn;
    if (isset($_POST['DisplayData_PDF_Send'])) {
        $table = '<table id="DB_PDFTableView" class="table table-bordered table-hover" style="width:100%">
                <thead class="table-info">
                    <tr>
                        <th>Employee ID</th>
                        <th>Full Name</th>
                        <th>PDF0</th>
                        <th>PDF1</th>
                    </tr>
                </thead>';
        $query = "SELECT * FROM tbl_employee";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $table .= '<tr>
                        <td>'.$row['employeeID'].'</td>
                        <td>'.$row['empLname'].' '.$row['empFname'].' '.$row['empMI'].' '.$row['empSuffix'].'</td>
                        <td>
                            <center>
                                <button type="button" id="pdf0" onclick="Get1Data('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdf1Modal">
                                    <span class="d-flex justify-content-center align-items-center">
                                        Upload
                                    </span>
                                </button>
                            </center>
                        </td>
                        <td>
                            <center>
                                <button type="button" id="pdf1" onclick="Get1Data('.$row['ID'].')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdf1Modal">
                                    <span class="d-flex justify-content-center align-items-center">
                                        Upload
                                    </span>
                                </button>
                            </center>
                        </td>
                    </tr>';
        }
        $table .= '</table>';
        echo $table;
    }
}

function GetRecord(){
	global $conn;
	if(isset($_POST['updateID_Send'])){
		$recordID = $_POST['updateID_Send'];
		$query = "SELECT ID FROM tbl_employee WHERE ID = $recordID";
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

function Get1Record(){
	global $conn;
	if(isset($_POST['update1ID_Send'])){
		$recordID = $_POST['update1ID_Send'];
		$query = "SELECT ID FROM tbl_employee WHERE ID = $recordID";
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

function InsertUpdateRecordPDF() {
    global $conn;

    // Get the form data
    $hidden1ID = $_POST['hidden1ID'];

    // Check if a file was uploaded
    if (isset($_FILES['insert_torpdf']) && $_FILES['insert_torpdf']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['insert_torpdf'];

        // Read the file contents
        $pdfContent = file_get_contents($file['tmp_name']);

        // Update the row in the database with the PDF content and filename
        // Replace 'your_table_name' with your actual table name and 'your_file_column' with the column where you store the PDF contents, and 'your_filename_column' with the column where you store the filename
        $sql = "UPDATE tbl_employee SET tor_pdfName = ?, tor_pdfFile = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $file['name'], $pdfContent, $hidden1ID);

        if ($stmt->execute()) {
            echo 'File uploaded and database updated successfully.';
        } else {
            echo 'Error updating database: ' . $stmt->error;
        }
    } else {
        echo 'No file selected or file upload error.';
    }
}

function OpenRecordPDF(){
    global $conn;
    $ID = $_POST['hiddenID'];

    // Fetch the PDF from the database
    $sql = "SELECT tor_pdfName, tor_pdfFile FROM tbl_employee WHERE ID = $ID";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $pdfName = $row['tor_pdfName'];
    $pdfContent = $row['tor_pdfFile'];

    // Encode the PDF content as base64
    $encodedContent = base64_encode($pdfContent);

    echo $encodedContent;
    } else {
        echo "No PDF found in the database.";
    }
}
