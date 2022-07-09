@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                @if (auth()->user()->role == 'admin')
                    <div class="row row-xs mb-3">
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total
                                    Shops</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_shops }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Shop
                                    Users</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_users }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total
                                    Customers</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_customers }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            <div class="table-responsive">
                                <table id="datatable-{{$module}}" width="100%" class="table">
                                    <thead>
                                    <tr>
                                        <th>Shop Name</th>
                                        <th>Total Products</th>
                                        <th>Total Receipts</th>
                                        <th>Total Customers</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_table_shops as $column)
                                        <tr>
                                            <td>{{ $column->name }}</td>
                                            <td>{{ $column->products_count }}</td>
                                            <td>{{ $column->receipts_count }}</td>
                                            <td>{{ $column->customers_count }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

