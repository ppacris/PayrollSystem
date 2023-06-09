<?php 
require_once ("../headFoot/up.php");
?>



<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">View</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">PDF</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="pt-4">
            <div id="DataTable_EmployeeView"></div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="pt-4 ">
            <div id="DataTable_InsertPDF"></div>
        </div>
    </div>
</div>

<!-- Decision Notification Open PDF Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="myFormViewPDF" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                        <input type="text" id="hiddenID" name="hiddenID" hidden>
                        <p>Proceed to open pdf file?</p>
                    </center>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="submitViewPDF">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Decision Notification Insert PDF Modal -->
<div class="modal fade" id="pdf1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="myFormInsertPDF" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <label for="insert_torpdf" class="form-label">TOR pdf file:</label>
                    <center>
                        <input type="text" id="hidden1ID" name="hidden1ID" hidden>
                        <input type="file" class="form-control" id="insert_torpdf" name="insert_torpdf" accept=".pdf">
                    </center>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="">Submit</button>
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
