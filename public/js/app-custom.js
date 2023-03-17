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

$(document).on('change', '.filters-change', function(){ changeFilters() });