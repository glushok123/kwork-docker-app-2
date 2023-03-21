/**
 * Изменение фильтра
 * отправка запроса на сервер
 * обновление блока с товарами
 */
function changeFilters() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    data = {
        filtersAdvertisingValue: $('#filtersAdvertising').val(),
        filtersSpheresValue: $('#filtersSpheres').val(),
        filtersPriceValueMin: $('#filtersPriceValueMin').val(),
        filtersPriceValueMax: $('#filtersPriceValueMax').val(),
        filtersSort: $('input[name="sort-product"]:checked').data('sort'),
    };

    $.ajax({
        url: '/get-products-by-filters',
        method: 'post',
        dataType: "json",
        data: data,
        async: false,
        success: function(data) {
            $('#grid-product').replaceWith(data.data);
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });

}


function validationFeedback() {
    if ($('#feedback-name').val() == '') {
        toastr.error('Необходимо заполнить имя !');
        return false;
    }

    if ($('#feedback-phone').val() == '') {
        toastr.error('Необходимо заполнить номер телефона !');
        return false;
    }

    return true;
}

function validationFeedbackRegister() {
    if ($('#register-name').val() == '') {
        toastr.error('Необходимо заполнить имя !');
        return false;
    }

    if ($('#register-phone').val() == '') {
        toastr.error('Необходимо заполнить номер телефона !');
        return false;
    }

    return true;
}

function sendFeedback() {
    if (validationFeedback() == false) {
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    data = {
        name: $('#feedback-name').val(),
        phone: $('#feedback-phone').val(),
    };

    $.ajax({
        url: '/feedback-send',
        method: 'post',
        dataType: "json",
        data: data,
        async: false,
        success: function(data) {
            $('#feedbackModal').modal('hide');
            toastr.success('Заявка сохранена!');
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
}

function sendRegisterOrder() {
    if (validationFeedbackRegister() == false) {
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    data = {
        name: $('#register-name').val(),
        phone: $('#register-phone').val(),
    };

    $.ajax({
        url: '/feedback-send',
        method: 'post',
        dataType: "json",
        data: data,
        async: false,
        success: function(data) {
            $('#registerModal').modal('hide');
            toastr.success('Заявка сохранена!');
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
}

function validationOrder() {
    if ($('#order-name').val() == '') {
        toastr.error('Необходимо заполнить имя !');
        return false;
    }

    if ($('#order-phone').val() == '') {
        toastr.error('Необходимо заполнить номер телефона !');
        return false;
    }

    return true;
}

function sendOrder() {
    if (validationOrder() == false) {
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    data = {
        name: $('#order-name').val(),
        phone: $('#order-phone').val(),
        bundleId: $('#modal-id-bundleid').data('bundleid'),
    };

    $.ajax({
        url: '/order-send',
        method: 'post',
        dataType: "json",
        data: data,
        async: false,
        success: function(data) {
            $('#orderModal').modal('hide');
            toastr.success('Заявка сохранена!');
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect. Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found (404).');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error (500).');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error. ' + jqXHR.responseText);
            }
        }
    });
}


function showModalOrder(bundleId) {
    $('#modal-id-bundleid').text('Связка #' + bundleId)
    $('#modal-id-bundleid').data('bundleid', bundleId)
    $('#orderModal').modal('show');
}

$(document).on('change', '.filters-change', function(){ changeFilters() });
$(document).on('click', '#feedback-send', function(){ sendFeedback() });
$(document).on('click', '#order-send', function(){ sendOrder() });
$(document).on('click', '#register-send', function(){ sendRegisterOrder() });
$(document).on('click', '.order-create-button', function(){ showModalOrder($(this).data('bundleid')) });