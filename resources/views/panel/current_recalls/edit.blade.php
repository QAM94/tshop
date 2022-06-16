<form class="w-100 d-inline-block" enctype="multipart/form-data" method="POST" id="editForm"
      action="{{ route($module.'.edit' , ['id' => $data->id]) }}">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Date of Recall</label>
                <input type="date" class="form-control" name="recall_date" id="recall_date"
                       max="{{ date('Y-m-d') }}" value="{{ $data->recall_date }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="product" class="mb-1 d-block">Product Name</label>
                <input type="text" name="product" id="product" class="form-control" value="{{ $data->product }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="product_type" class="mb-1 d-block">Product Type</label>
                <input type="text" name="product_type" id="product_type" class="form-control"
                       value="{{ $data->product_type }}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="brand_name" class="mb-1 d-block">Brand/Company</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control"
                       value="{{ $data->brand_name }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="ref_url" class="mb-1 d-block">Reference URL</label>
                <input type="text" name="ref_url" id="ref_url" class="form-control" value="{{ $data->ref_url }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="recall_reason" class="mb-1 d-block">Recall Reason Details</label>
                <textarea name="recall_reason" id="recall_reason"
                          class="form-control">{{ $data->recall_reason }}</textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label for="" class="mb-1 d-block">Stores</label>
                <select class="form-control select2-clear" name="batches[]" id="batches" multiple="multiple"
                        tabindex="-1" aria-hidden="true">
                    @foreach($data->batches as $batch)
                        <option selected value="{{ $batch->batch }}">{{ $batch->batch }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>

<script type="text/javascript">

    $(function () {

        $('.select2-clear').select2({
            minimumResultsForSearch: Infinity,
            placeholder: 'Choose one',
            allowClear: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

    });

</script>
