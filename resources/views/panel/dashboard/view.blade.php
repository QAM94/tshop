<div class="row row-sm">
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Product
                Name</label>
            <p class="mg-b-0 tx-14">{{ $data->recalled_product }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Date of
                Recall</label>
            <p class="mg-b-0 tx-14">{{ $data->date_of_recall }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-center justify-content-between pd-t-10 pd-b-10 border-bottom">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Reference
                URl</label>
            <p class="mg-b-0 tx-14">{{ $data->ref_url }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="d-flex align-items-start justify-content-between pd-t-10 pd-b-10">
            <label class="tx-12 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-0">Retailer</label>

            @foreach($data->recallProductStores as $store)
                <p class="mg-b-0 tx-14">{{ auth()->user()->store->name }}</p>
            @endforeach

        </div>
    </div>
</div>