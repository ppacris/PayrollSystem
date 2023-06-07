<?php 
require_once ("../headFoot/up.php");
?>

<form id="myFormAdd">
    <div class="row border rounded shadow mb-4">
        <h4 class="text-center p-2 bg-light rounded-top">Personal Information</h4>
        <div class="col-md-12 pt-1">
            <div class="row mb-3">
                <div class="col-3">
                    <label for="EpmloyeeID" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" placeholder="Employee ID" id="EmployeeID" name="EmployeeID" required>
                </div>
                <div class="col-9">
                    <label for="EmployeeEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email Address" id="EmployeeEmail" name="EmployeeEmail" required>
                </div>
            </div>

            <div class="row border shadow-sm rounded mx-1 pb-2 mb-3">
                <label for="Lname" class="form-label pt-1">Full name</label>
                <div class="col-lg col-md-4 col-sm-5 pb-2">
                    <input type="text" class="form-control" placeholder="Last name" id="Lname" name="Lname" required>
                </div>
                <div class="col-lg col-md-4 col-sm-5">
                    <input type="text" class="form-control" placeholder="First name" id="Fname" name="Fname" required>
                </div>
                <div class="col-lg col-md-4 col-sm-2">
                    <input type="text" class="form-control" placeholder="M.I" id="MI" name="MI" required>
                </div>
                <div class="col-lg-1 col-md-2 col-sm-3">
                    <input type="text" class="form-control" placeholder="Suffix" id="Suffix" name="Suffix">
                </div>
            </div>

            <div class="row border shadow-sm rounded mx-1 pb-2 mb-3 justify-content-center">
                <label for="StAddress" class="form-label pt-1">Address</label>
                <div class="col-sm-6 pb-2">
                    <input type="text" class="form-control" placeholder="Street address" id="StAddress" name="StAddress">
                </div>
                <div class="col-sm-6 pb-2">
                    <input type="text" class="form-control" placeholder="Barangay" id="Brgy" name="Brgy" required>
                </div>
                <div class="col-sm-6 pb-2">
                    <input type="text" class="form-control" placeholder="Municipality / City" id="City" name="City" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Province" id="Province" name="Province" required>
                </div>
            </div>
        </div>
    </div>

    <!-- Button Save -->
    <div class="row row-cols-3 justify-content-end">
        <button type="submit" class="btn btn-primary" id="submitAdd"><b>Save</b></button>
    </div>
</form>


<?php 
require_once ("../headFoot/down.php");
?>

<script src="../assets/module_employee/_functions-event.js"></script>


<!-- TOAST NOTIFICATION -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <b>Success!</b>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
