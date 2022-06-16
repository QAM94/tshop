<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control sel2">
                    <option>Please Select</option>
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">
                            {{ $shop->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Products</label>
                <select name="product_id" id="product_id" class="form-control sel2" disabled>
                    <option>Please Select</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Type</label>
                <select name="type" id="type" class="form-control sel2">
                    <option value="sales">Sales</option>
                    <option value="purchase">Purchase</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 d-flex align-items-center">
            <div class="custom-control custom-switch pl-0">
                <label for="customSwitch2" class="switch-active">Status</label>
                <input type="hidden" name='is_active' value="0">
                <input type="checkbox" class="custom-control-input" id="customSwitch2" name='is_active' value="1">
                <label for="customSwitch2" class="custom-control-label ml-3"></label>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>

<script>
    $('#shop_id').change(function () {
        $("#product_id").attr('disabled', true);
        $("#product_id").empty().append('<option>Please Select</option>');
        $.get(base_url + "/products-by-shop/" + $(this).val(), function (data) {
            $("#product_id").attr('disabled', false);
            $.each(data, function (key, row) {
                $("#product_id").append('<option value=' + row.id + '>' + row.title + ' ($' + row.price
                    + '/' + row.inventory.measure + row.inventory.unit + ')</option>');
            });
        });
    });
</script>
