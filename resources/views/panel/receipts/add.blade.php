<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Receipt No</label>
                <input type="text" name="receipt_no" id="receipt_no" class="form-control" />
            </div>
        </div>
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
    <div id="customerDiv">
    </div>
    <div id="detailsDiv">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <button type="button" class="btn btn-success addRow" style="padding: 3px 15px; float: right;">
                    <i class="ion-ios-add-circle-outline"></i> Add Product
                </button>
                <br/>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-sm-6">
            <label class="mb-1 d-block" style="font-weight: bold;">Extra Details</label>
            <textarea class="form-control" name="description" rows="5"
                      placeholder="Enter Extra Details Here..."></textarea>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Subtotal</p>
                <input type="number" class="form-control col-sm-3" id="sub_total" name="sub_total" />
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Discount</p>
                <input type="number" class="form-control col-sm-3" name="discount" id="discount" min="0"
                       step="any" />
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Total</p>
                <input type="number" class="form-control col-sm-3" id="total" name="total" />
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Advance Payment</p>
                <input type="number" class="form-control col-sm-3" id="advance_payment" name="advance_payment" />
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Remaining Payment</p>
                <input type="number" class="form-control col-sm-3" id="remaining_payment" name="remaining_payment" >
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
