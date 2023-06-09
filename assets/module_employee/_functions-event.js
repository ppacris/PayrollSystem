$(document).ready(function () {
    InsertData();
    DisplayData();

    OpenDataPDF();

    const profileTabButton = $("#profile-tab");

    profileTabButton.click(function () {
        DisplayDataPDF();
        InsertUpdateDataPDF();
    });
});


// Add submodule
function InsertData() {
    const toastTrigger = $('#submitAdd');
    const toastLiveExample = $('#liveToast');
    let toastBootstrap_Add;

    $('#myFormAdd').submit(function (event) {
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../assets/module_employee/emp-insert.php',
            data: formData,
            success: function (response) {
                // Toas Notif
                if (toastTrigger) {
                    toastBootstrap_Add = toastBootstrap_Add || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
                    toastBootstrap_Add.show();
                }
                $('form').trigger('reset');
            },
            error: function (error) {
                alert('Form submission failed:', error);
            }
        });
    });
}

// Update files submodule, Display Record in the Database (<div id="DataTable_InstructorView"></div>)
function DisplayData() {
    var DisplayData_insView = "true";
    $.ajax({
        url: '../assets/module_employee/emp-view.php',
        method: 'POST',
        data: {
            DisplayDatainsView_Send: DisplayData_insView
        },
        success: function (data, status) {
            $('#DataTable_EmployeeView').html(data);
            $(document).ready(function () {
                $('#DB_EmployeeTableView').DataTable({
                    deferRender: true,
                    scrollY: '50vh',
                    scrollCollapse: true,
                    order: [
						[0, 'asc']
					],
                });
            });
        }
    })
}

// Update files submodule, Display Record in the Database (<div id="DataTable_InsertPDF"></div>)
function DisplayDataPDF() {
    var DisplayData_PDF = "true";
    $.ajax({
        url: '../assets/module_employee/emp-viewPdf.php',
        method: 'POST',
        data: {
            DisplayData_PDF_Send: DisplayData_PDF
        },
        success: function (data, status) {
            $('#DataTable_InsertPDF').html(data);
            $(document).ready(function () {
                $('#DB_PDFTableView').DataTable({
                    deferRender: true,
                    scrollY: '50vh',
                    scrollCollapse: true,
                    order: [
						[0, 'asc']
					],
                });
            });
        }
    })
}

// Update files submodule, get row ID
function GetData(updateID) {
    $('#hiddenID').val(updateID);
    $.post('../assets/module_employee/getID.php', {
        updateID_Send: updateID
    });
}

// Update files submodule, get row ID
function Get1Data(update1ID) {
    $('#hidden1ID').val(update1ID);
    $.post('../assets/module_employee/get1ID.php', {
        update1ID_Send: update1ID
    });
}

function InsertUpdateDataPDF() {
    const toastTrigger = $('#submitAdd');
    const toastLiveExample = $('#liveToast');
    let toastBootstrap_Add;

    $('#myFormInsertPDF').submit(function (event) {
        event.preventDefault();

        // Create a FormData object
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../assets/module_employee/emp-insertupdatePDF.php',
            data: formData,
            processData: false, // Prevent jQuery from automatically processing the data
            contentType: false, // Prevent jQuery from automatically setting the content type
            success: function (response) {
                console.log(response);
                if (toastTrigger) {
                    toastBootstrap_Add = toastBootstrap_Add || bootstrap.Toast.getOrCreateInstance(toastLiveExample);
                    toastBootstrap_Add.show();
                }
            },
            error: function (error) {
                alert('Form submission failed:', error);
            }
        });
    });
}

function OpenDataPDF() {
    $('#myFormViewPDF').submit(function (event) {
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        $.ajax({
                type: 'POST',
                url: '../assets/module_employee/pdf.php',
                data: formData
            })
            .done(function (response) {
                // Open the PDF content in a new tab
                var newTab = window.open();
                newTab.document.write('<html><head><style>body { margin: 0; }</style></head><body><iframe src="data:application/pdf;base64,' + encodeURI(response) + '" style="width: 100%; height: 100%; margin: 0;" frameborder="0" scrolling="auto"></iframe></body></html>');
            })
            .fail(function (error) {
                alert('Form submission failed:', error);
            });
    });
}
