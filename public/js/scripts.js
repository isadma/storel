var dataTable;
const blockUI = new KTBlockUI(document.querySelector("#kt_app_body"));


toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toastr-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json",
        'Content-Type': "application/json",
    }
});

function blockPage(){
    blockUI.block();
}

function unblockPage(){
    blockUI.release();
}

function sendPostMethodRequest(url, data, successCallback){
    $.ajax({
        type: 'POST',
        url: url,
        contentType: 'application/json',
        data: JSON.stringify(data),
        beforeSend: function() {
            blockPage();
        },
        success: function (resp){
            successCallback(resp);
        },
        error: function(error) {
            if (error.responseJSON && error.responseJSON.message){
                toastr.error(error.responseJSON.message);
            }
            else{
                toastr.error("Sorry, something went wrong");
            }
            console.log(error.responseJSON);
        },
        complete: function() {
            unblockPage();
        },
    });
}

function getFormData(form) {
    return Object.fromEntries(new FormData(form));
}
