<form class="w-100 d-inline-block" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-6">
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
                <label class="mb-1 d-block">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option>Please Select</option>
                    @foreach($products as $product)
                        <option {{ $data->product_id == $product->id ? 'selected' : '' }}
                                value="{{ $product->id }}">
                            {{ $product->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Type</label>
                <select name="type" id="type" class="form-control sel2">
                    <option value="sale" {{ $data->type == 'sale' ? 'selected' : '' }}>Sale</option>
                    <option value="purchase" {{ $data->type == 'purchase' ? 'selected' : '' }}>Purchase</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $data->quantity }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $data->price }}">
            </div>
        </div>
    </div>
    <div class="row">
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
@include('panel.receipts.scripts')
