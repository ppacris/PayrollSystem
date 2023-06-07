<?php 
require_once ("../headFoot/up.php");
?>

<div class="container">
    <div id="DataTable_InstructorView"></div>
</div>

<!-- Decision Notification Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="myFormPDF" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="text" id="hiddenID" name="hiddenID">
                    <input type="file" class="form-control" name="tor_pdfFile" accept=".pdf">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="submitPDF">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>

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
