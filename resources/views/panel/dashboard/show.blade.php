@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                @if (auth()->user()->role == 'admin')
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <input type="text" name="daterange" class="form-control"/>
                        </div>
                    </div>
                    <div class="row row-xs mb-3">
                        <div class="col-sm-4 col-lg-3">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total
                                    Sales</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $currency.$total_sales }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Net
                                    Sales</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $currency.$net_sales }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Orders</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_orders }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="card card-body text-center">
                                <h6 class="tx-uppercase tx-15 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Items
                                    Sold</h6>
                                <div class="d-flex d-lg-block d-xl-flex align-items-end justify-content-center">
                                    <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1 tx-28">{{ $total_items_sold }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <h4>Top Products - Items Sold</h4>
                        <div class="card card-body dataTableBox">
                            <div class="table-responsive">
                                <table id="datatable-{{$module}}" width="100%" class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Items Sold</th>
                                        <th>Net Sales</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_table_items as $column)
                                        <tr>
                                            <td>{{ $column->title }}</td>
                                            <td>{{ $column->items_sold }}</td>
                                            <td>{{ $currency.$column->net_sales }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left'
                    }, function (start, end, label) {
                        location.replace('{{ url("/") }}?start='+ start.format('YYYY-MM-DD') + '&end=' + end.format('YYYY-MM-DD'));
                    });
                });
            </script>

    @endpush

