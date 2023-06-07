$(document).ready(function () {
    InsertData();


    DisplayData();
    UpdateDataPDF();
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
            $('#DataTable_InstructorView').html(data);
            $(document).ready(function () {
                $('#DB_InstructorTableView').DataTable({
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
    $.post('../assets/module_employee/emp-insertPDF.php', {
        updateID_Send: updateID
    }, function (data, status) {});
    $('#pdfModal').modal('show');
}

function UpdateDataPDF() {
    const toastTrigger = $('#submitAdd');
    const toastLiveExample = $('#liveToast');
    let toastBootstrap_Add;

    $('#myFormPDF').submit(function (event) {
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '../assets/module_employee/emp-insertPDF.php',
            data: formData,
            success: function (response) {
                // Toas Notif
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
