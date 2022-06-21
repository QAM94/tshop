$(document).on('change', '#shop_id', function () {
    $("#customer_id").attr('disabled', true);
    $("#customer_id").empty().append('<option>Please Select</option>');
    $("#product_id").attr('disabled', true);
    $("#product_id").empty().append('<option>Please Select</option>');
    $.get(base_url + "/customers-by-shop/" + $(this).val(), function (data) {
        $("#customer_id").attr('disabled', false);
        $("#customer_id").append('<option value="new">New Customer</option>');
        $.each(data, function (key, row) {
            $("#customer_id").append('<option value=' + row.id + '>' + row.name + '</option>');
        });
    });
    $.get(base_url + "/products-by-shop/" + $(this).val(), function (data) {
        $("#product_id").attr('disabled', false);
        $.each(data, function (key, row) {
            $("#product_id").append('<option value=' + row.id + '>' + row.title + ' ($' + row.price
                + ' per '  + row.inventory.unit + ')</option>');
        });
    });
});
$(document).on('click', '.addRow', function () {
    let shop_id = $("#shop_id").val();
    if (shop_id > 0) {
        $.get(base_url + "/receipts-detail-row/" + shop_id, function (data) {
            $("#detailsDiv").append(data);
        });
    } else {
        alert('Please Select Shop');
    }
});

$(document).on('change', '#customer_id', function () {
    $("#customerDiv").empty();
    let customer_id = $("#customer_id").val();
    if (customer_id == 'new') {
        $.get(base_url + "/customers-form/", function (data) {
            $("#customerDiv").append(data);
        });
    }
});

$(document).on('change', '.proSel', function () {
    calculateBill($(this));
});

$(document).on('keyup keypress change', '.proQty', function () {
    $(this).parent().parent().parent().find('.proSel').change();
});

function calculateBill(selector) {
    let unitPrice = selector.find(':selected').data('price');
    let qty = selector.parent().parent().parent().find('.proQty').val();
    let price = selector.parent().parent().parent().find('.proPrice');
    price.val(unitPrice * qty);
    let sum = 0;
    $(".proPrice").each(function () {
        sum += +$(this).val();
    });
    $("#sub_total").val(sum);
    let discount = $("#discount").val();
    $("#total").val(sum - discount);
}
$(document).on('keyup keypress change', '#discount', function () {
    let sub_total = $("#sub_total").val();
    let discount = $("#discount").val();
    $("#total").val(sub_total - discount);
});
