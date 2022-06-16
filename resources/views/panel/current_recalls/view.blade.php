<div class="row row-sm">
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Product
                Name</label>
            <p class="mg-b-0 tx-14"><a href="{{ $data->ref_url }}" target="_blank">{{ $data->product }}</a></p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Product
                Type</label>
            <p class="mg-b-0 tx-14">{{ $data->product_type }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Date of
                Recall</label>
            <p class="mg-b-0 tx-14">{{ date('d M Y', strtotime($data->recall_date)) }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Brand Name</label>
            <p class="mg-b-0 tx-14">{{ $data->brand_name }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Recall Reason</label>
            <p class="mg-b-0 tx-14">{{ $data->recall_reason }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-start justify-content-between pd-t-10 pd-b-10">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Batch No.</label>
            @foreach($data->batches as $batches)
                <p class="mg-b-0 tx-14">{{ $batches->batch }}</p>
            @endforeach
        </div>
    </div>
</div>