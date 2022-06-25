<form class="w-100 d-inline-block" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Receipt No</label>
                <input type="text" name="receipt_no" id="receipt_no" class="form-control"
                       value="{{ $data->receipt_no }}" />
            </div>
        </div>
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
                    @foreach($customers as $customer)
                        <option {{ $data->customer_id == $customer->id ? 'selected' : '' }}
                                value="{{ $customer->id }}">
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <button type="button" class="btn btn-success addRow" style="padding: 3px 15px; float: right;">
                <i class="ion-ios-add-circle-outline"></i> Add Product
            </button>
            <br/>
            <!-- <button type="button" class="btn btn-danger delRow" style="padding: 3px 5px;">
                                <i class="ion-ios-close-circle-outline"></i>
                            </button>-->
        </div>
    </div>

    <div id="detailsDiv">
        @foreach($data->details as $row)
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Product</label>
                        <select name="product_id[]" class="form-control proSel">
                            <option>Please Select</option>
                            @foreach($products as $product)
                                <option {{ $row->product_id == $product->id ? 'selected' : '' }}
                                        value="{{ $product->id }}" data-price="{{ $product->price }}">
                                    {{ $product->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Unit Price</label>
                        <input type="number" name="unit_price[]" class="form-control proUPrice" min="1"
                               value="{{ $row->unit_price }}" step="any">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Quantity</label>
                        <input type="number" name="quantity[]" class="form-control proQty"
                               value="{{ $row->quantity }}" min="1" step="any">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Price</label>
                        <input type="number" class="form-control proPrice" readonly
                               value="{{ $row->price }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Subtotal</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" id="sub_total" disabled value="{{ $data->sub_total }}">
        </p>
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Discount</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" name="discount" id="discount" min="0"
                   max="{{ $data->sub_total }}" value="{{ $data->discount ? $data->discount : 0 }}" step="any">
        </p>
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Total</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" id="total" disabled value="{{ $data->total }}">
        </p>
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
@push('custom-scripts')
    @once
        <script src="{{ asset('js/form.js') }}"></script>
    @endonce
@endpush
