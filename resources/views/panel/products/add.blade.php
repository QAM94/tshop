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
                <input type="text" name="sku" id="sku" class="form-control" />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Title</label>
                <input type="text" name="title" id="title" class="form-control" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity (Units)</label>
                <input type="number" name="quantity" id="quantity" class="form-control ydsUnit" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Yards Per Unit</label>
                <input type="number" name="length" id="length" class="form-control ydsUnit" step="any"  />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Yards</label>
                <input type="number" name="yards" id="yards" class="form-control" step="any" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="any" />
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

