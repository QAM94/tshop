function deleteRow(id, module) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            let request_url = base_url + '/' + module + '-delete/' + id;
            removeAjaxMsgs();
            $.get(request_url).done(function () {
                var table = $('#datatable-' + module).DataTable();
                table.ajax.reload();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }).fail(function (err) {
                console.log(err);
            });
        }
    })
}

function sendRecall(id, module) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to send this recall?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, send email!'
    }).then((result) => {
        if (result.value) {
            let request_url = base_url + '/' + module + '-send-recall/' + id;
            removeAjaxMsgs();
            $.get(request_url).done(function () {
                Swal.fire(
                    'Success!',
                    'Email Sent Successfully!',
                    'success'
                )
            }).fail(function (err) {
                console.log(err);
            });
        }
    })
}

function removeAjaxMsgs() {
    let errorDiv = $('.ajax-error-div');
    let errorMsgElm = $('.ajax-error-msg');
    $('.text-danger').remove();

    errorDiv.css('display', 'none');
    errorMsgElm.html('');
}

function formSuccessAction(data, type) {
    if (type == 'add') {
        $('#addModal').modal('hide');
        $('#addForm')[0].reset();
    }
    if (type == 'edit') {
        $('#editModal').modal('hide');
        $('#editForm')[0].reset();
    }
    var table = $('#datatable-' + _module).DataTable();
    table.ajax.reload();
    Swal.fire(
        'Success!',
        'Form Submitted Successfully!',
        'success'
    )
}

function showErrorMsgs(errs) {
    var response = errs.responseJSON;
    $.each(response.errors, function (key, value) {
        let msg = value[0].replace(" id", "");
        $("#" + key).parent().append('<p class="text-danger">' + msg + '</p>');
    });
}

function errorMessage(message) {
    Swal.fire({
        type: 'warning',
        title: message
    });
}

function getNotifications(userID, count) {

    $.get(base_url + '/get-notifications/' + userID + '/' + count)
        .done(function (data) {
            $('#notification_box').html(data);
        })
        .fail(function (err) {
            console.log(err);
        })

}

function getNotificationCount(userID) {
    $.get(base_url + '/get-notification-count/' + userID)
        .done(function (data) {
            if (data > 0) {
                $('.new-messages-count').html(data);
            } else {
                $('.new-messages-count').html(0);
            }
        })
        .fail(function (err) {
            console.log(err)
        })
}

$(document).on('submit', '#addForm', function (event) {
    event.preventDefault();
    removeAjaxMsgs();
    let form = $(this);
    let btn = form.find('.btn');
    btn.attr("disabled", true);
    btn.addClass('loader');
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            formSuccessAction(data, 'add');
        }, error: function (err) {
            btn.attr("disabled", false);
            btn.removeClass('loader');
            showErrorMsgs(err);
        }
    });
});

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    removeAjaxMsgs();
    let form = $(this);
    let btn = form.find('.btn');
    btn.attr("disabled", true);
    btn.addClass('loader');

    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            formSuccessAction(data, 'edit');
        }, error: function (err) {
            btn.attr("disabled", false);
            btn.removeClass('loader');
            showErrorMsgs(err);
        }
    });
});

$('.modal').on('hidden.bs.modal', function () {
    $('.modal_empty').html('');
});

$(document).ready(function() {
    $('.sel2').select2();
});

