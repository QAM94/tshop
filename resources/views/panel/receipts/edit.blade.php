<form class="w-100 d-inline-block" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Receipt No</label>
                <input type="text" name="receipt_no" id="receipt_no" class="form-control"
                       value="{{ $data->receipt_no }}"/>
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
        </div>
    </div>
    <div id="detailsDiv">
        @foreach($data->details as $row)
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Product</label>
                        <select class="form-control proSel" disabled>
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
                <div class="col-sm-3">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Yards</label>
                        <input type="number" class="form-control proQty"
                               value="{{ $row->yards }}" min="1" step="any" disabled>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group mb-3">
                        <label class="mb-1 d-block">Items Sold</label>
                        <input type="number" class="form-control" min="0"
                               value="{{ $row->items_sold }}" step="any" value="0" disabled>
                    </div>
                </div>
                <div class="col-sm-1">
                    <a href="javascript:;" class="removeRow" data-id="{{ $row->id }}">
                        <i class="ion-md-close"></i>
                    </a>
                </div>
                <input type="hidden" name="unit_price[]" class="proUPrice" value="{{ $row->unit_price }}"/>
                <input type="hidden" class="proPrice" name="price[]" value="{{ $row->price }}"/>
            </div>
        @endforeach
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">
                    <input type="checkbox" name="own_cloth" id="own_cloth" value="1"
                        {{ $data->own_cloth ? 'checked' : ''}} /> Customer's Own Cloth?</label>
            </div>

            <!--            <div class="row"  style="float: right">
                <button type="button" class="btn btn-success" style="padding: 3px 15px;
                {{ empty($data->description) ? '' : 'display:none;' }}" id="addDetailsBtn">
                    <i class="ion-ios-add-circle-outline"></i> Add Extra Details
                </button>
                <button type="button" class="btn btn-danger" style="padding: 3px 15px;
                {{ !empty($data->description) ? '' : 'display:none;' }}" id="removeDetailsBtn">
                    <i class="ion-md-close"></i>
                </button>
            </div>
            <div class="row" id="editorDiv" style="display:{{ empty($data->description) ? 'none;' : 'inline;' }};">
                <textarea  id="summernote" name="description"></textarea >
            </div>-->
        </div>
        <div class="col-sm-5">
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Subtotal</p>
                <input type="number" class="form-control col-sm-3" id="sub_total" name="sub_total"
                       value="{{ $data->sub_total }}">
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">VAT</p>
                <input type="number" class="form-control col-sm-3" name="vat" id="vat" min="0" max="100"
                       value="{{ $data->vat ? $data->vat : 0 }}" step="any">
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Discount</p>
                <input type="number" class="form-control col-sm-3" name="discount" id="discount" min="0"
                       value="{{ $data->discount ? $data->discount : 0 }}" step="any">
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Total</p>
                <input type="number" class="form-control col-sm-3" id="total" name="total"
                       value="{{ $data->total }}">
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Advance Payment</p>
                <input type="number" class="form-control col-sm-3" id="advance_payment" name="advance_payment"
                       value="{{ $data->advance_payment }}">
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Remaining Payment</p>
                <input type="number" class="form-control col-sm-3" id="remaining_payment" name="remaining_payment"
                       value="{{ $data->remaining_payment }}">
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
<script>
    /* $(document).ready(function() {
         $('#summernote').summernote({
             placeholder: 'write here...',
             toolbar: [
                 ['font', ['fontsize']],
                 ['style', ['bold', 'italic', 'underline', 'clear']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']]
             ]
         });
         $("#summernote").summernote("code", "{!! $data->description !!}");
    });*/
</script>
