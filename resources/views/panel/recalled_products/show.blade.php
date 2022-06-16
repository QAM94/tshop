@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 id="section1" class="mg-b-4">{{ setText($module) }}</h4>
                    <button class="btn btn-success add-class" type="button" id="dropdownMenuButton">
                        Filter Products
                    </button>
                </div>
                <div class="filter-dropdown {{ isset($search_product) ? 'filter-active' : '' }}">
                    <form method="get" action="{{ route($module.'.search') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text"
                                           value="{{ isset($search_product['product']) ? $search_product['product'] : '' }}"
                                           name="product" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Recall Date</label>
                                    <input type="text" class="form-control" name="date_range"
                                           value="{{ isset($search_product['date_range']) ? date("m-d-Y", strtotime( explode(' - ', $search_product['date_range'])[0])) : date("m-d-Y") }} - {{ isset($search_product['date_range']) ? date("m-d-Y", strtotime( explode(' - ', $search_product['date_range'])[1])) : date("m-d-Y") }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Batch/Lot No</label>
                                    <input type="text" class="form-control" name="batch_no"
                                           value="{{ isset($search_product['batch_no']) ? $search_product['batch_no'] : '' }}"/>
                                </div>
                            </div>
                            <div class="col-md-6 text-right d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-success remove-class">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            @include('panel.includes.datatable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('panel.includes.modal_view')
    </div>
@endsection

@push('custom-scripts')

<script type="text/javascript">

    $(function () {

        $('input[name="date_range"]').daterangepicker({
            opens: 'left'
        }, function (start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

    });

</script>

@endpush

