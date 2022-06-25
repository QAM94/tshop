<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-md-8">
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
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Length</label>
                <input type="text" name="length" id="length" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>

