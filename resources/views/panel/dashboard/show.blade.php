@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                @if (auth()->user()->role == 'admin')
                    <div class="row row-xs mb-3">
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Number
                                    Shops</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_shops }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Active
                                    Shops</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $active_shops }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">InActive
                                    Shops</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $inactive_shops }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
<!--                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            {{--@include('panel.includes.datatable')--}}
                        </div>
                    </div>
                </div>-->
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

