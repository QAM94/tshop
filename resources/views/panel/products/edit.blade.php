<form class="w-100 d-inline-block" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control sel2">
                    <option>Please Select</option>
                    @foreach($shops as $shop)
                        <option {{ $data->shop_id == $shop->id ? 'selected' : '' }}
                                value="{{ $shop->id }}">
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
                    <option value="">None</option>
                    @foreach($categories as $category)
                        <option {{ $data->category->id == $category->id ? 'selected' : '' }}
                                value="{{ $category->id }}" >
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">SKU</label>
                <input type="text" name="sku" id="sku" class="form-control" value="{{ $data->sku }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $data->title }}">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control ydsUnit" step="any"
                       value="{{ @$data->inventory->quantity }}" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Yards Per Unit</label>
                <input type="number" name="length" id="length" class="form-control ydsUnit" step="any"
                       value="{{ @$data->inventory->length }}" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Yards</label>
                <input type="number" name="yards" id="yards" class="form-control" step="any"
                       value="{{ @$data->inventory->yards }}" />
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $data->price }}" />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $data->description }}</textarea>
            </div>
        </div>
        <div class="col-sm-6 d-flex align-items-center">
            <div class="custom-control custom-switch pl-0">
                <label for="customSwitch2" class="switch-active">Status</label>
                <input type="hidden" name='is_active' value="0">
                <input type="checkbox" {{ $data->is_active ? 'checked' : '' }} class="custom-control-input"
                       id="customSwitch2" name='is_active' value="1">
                <label for="customSwitch2" class="custom-control-label ml-3"></label>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
