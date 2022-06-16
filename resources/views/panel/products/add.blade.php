<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-12">
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
                <label class="mb-1 d-block">Category</label>
                <select name="category_id" id="category_id" class="form-control sel2">
                    <option>Please Select</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">SKU</label>
                <input type="text" name="sku" id="sku" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Measure Length</label>
                <input type="text" name="measure" id="measure" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Unit</label>
                <select name="unit" id="unit" class="form-control sel2">
                    <option value="meter">Meter</option>
                    <option value="guz">Guz</option>
                    <option value="inch">Inch</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>
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

<script type="text/javascript">

    function readURL(input) {


        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#store_logo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-upload2").change(function () {
        readURL(this);
    });

</script>

