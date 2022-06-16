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
                <label class="mb-1 d-block">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control sel2" disabled>
                    <option>Please Select</option>
                </select>
            </div>
        </div>
    </div>
    <div id="detailsDiv">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <button type="button" class="btn btn-success addRow" style="padding: 3px 15px; float: right;">
                    <i class="ion-ios-add-circle-outline"></i> Add Row
                </button>
                <br/>
                <!-- <button type="button" class="btn btn-danger delRow" style="padding: 3px 5px;">
                                    <i class="ion-ios-close-circle-outline"></i>
                                </button>-->
            </div>
        </div>
    </div>
    <div class="row">
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Subtotal</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" id="sub_total" disabled>
        </p>
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Discount</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" name="discount" id="discount" min="0">
        </p>
        <p class="col-sm-10" style="margin: revert;text-align: right;font-weight: bold;">Total</p>
        <p class="col-sm-2">
            <input type="number" class="form-control" id="total" disabled>
        </p>
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

@include('panel.receipts.scripts')
