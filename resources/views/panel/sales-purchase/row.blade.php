<div class="row">
    <div class="col-sm-8">
        <div class="form-group mb-3">
            <label class="mb-1 d-block">Product</label>
            <select name="product_id[]" class="form-control proSel">
                <option>Please Select</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                        {{ $product->title }}
                        ({{ $product->price }}/{{ $product->inventory->measure.$product->inventory->unit }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group mb-3">
            <label class="mb-1 d-block">Quantity</label>
            <input type="number" name="quantity[]" class="form-control proQty" min="1" max="99">
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group mb-3">
            <label class="mb-1 d-block">Price</label>
            <input type="number" class="form-control proPrice" readonly>
        </div>
    </div>
</div>
