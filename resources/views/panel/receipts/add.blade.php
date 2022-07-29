<form class="w-100 d-inline-block" method="POST" action="{{ route($module.'.add') }}"
      id="addForm">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Receipt No</label>
                <input type="text" name="receipt_no" id="receipt_no" class="form-control"/>
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
            <div class="form-group mb-3">
                <label class="mb-1 d-block">Quantity of Items Sold</label>
                <input type="text" name="items_sold_qty" id="items_sold_qty" class="form-control"/>
            </div>
            <div class="form-group mb-3">
                <label class="mb-1 d-block">
                    <input type="checkbox" name="own_cloth" id="own_cloth" value="1" />
                    Customer's Own Cloth?</label>
            </div>

            <!--            <div class="row"  style="float: right">
                            <button type="button" class="btn btn-success" style="padding: 3px 15px;"
                                    id="addDetailsBtn">
                                <i class="ion-ios-add-circle-outline"></i> Add Extra Details
                            </button>
                            <button type="button" class="btn btn-danger" style="padding: 3px 15px; display:none;"
                                    id="removeDetailsBtn">
                                <i class="ion-md-close"></i>
                            </button>
                        </div>
                        <div class="row" id="editorDiv" style="display:none;">
                            <textarea  id="summernote" name="description"></textarea >
                        </div>-->
        </div>
        <div class="col-sm-6">
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Subtotal</p>
                <input type="number" class="form-control col-sm-3" id="sub_total" name="sub_total"/>
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">VAT</p>
                <input type="number" class="form-control col-sm-3" name="vat" id="vat" min="0" value="0"
                       step="any" max="100" />
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Discount</p>
                <input type="number" class="form-control col-sm-3" name="discount" id="discount" min="0"
                       value="0" step="any"/>
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Total</p>
                <input type="number" class="form-control col-sm-3" id="total" name="total"/>
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Advance Payment</p>
                <input type="number" class="form-control col-sm-3" id="advance_payment" name="advance_payment"
                       value="0"/>
            </div>
            <div class="row">
                <p class="col-sm-8" style="margin: revert;text-align: right;font-weight: bold;">Remaining Payment</p>
                <input type="number" class="form-control col-sm-3" id="remaining_payment" name="remaining_payment">
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>
<script>
    /* $(document).ready(function () {
         $('#summernote').summernote({
             placeholder: 'write here...',
             toolbar: [
                 ['font', ['fontsize']],
                 ['style', ['bold', 'italic', 'underline', 'clear']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']]
             ]
         });
     });*/
</script>
