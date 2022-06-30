@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 id="section1" class="mg-b-4">{{ setText($module) }} Management</h4>
                    <div class="new-store-box d-flex align-items-center">
                        @if(hasRole($module , 'add'))
                            <button type="button" class="btn btn-success" onclick="openAddModal()">
                                Add New {{ setText($module,true) }}
                            </button>
                        @endif
                    </div>
                </div>
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body ">
                            <label class="mb-1 d-block">Filter By Shop</label>
                            <select name="shop_id" id="shop_filter" class="form-control sel2">
                                <option value="0">All Shops</option>
                                @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}" {{ $shop_id == $shop->id ? 'selected' : '' }}>
                                        {{ $shop->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            <form method="POST" action="{{ route($module.'.move-stock') }}" id="stockForm">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <select name="shop_id" id="shop_id" class="form-control sel2 col-sm-8">
                                            <option>Please Select Shop to Move Stock</option>
                                            @foreach($shops as $shop)
                                                <option value="{{ $shop->id }}">
                                                    {{ $shop->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                               placeholder="Quantity">
                                    </div>
                                    <div class="col-sm-2">
                                            <input type="text" name="length" id="length" class="form-control"
                                                   placeholder="Yards">
                                    </div>
                                    <div class="col-sm-1">
                                        <button class="btn btn-sm btn-success tx-12" type="submit">Submit</button>
                                    </div>
                                </div>
                                @include('panel.includes.datatable')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('panel.includes.modal_add')
        @include('panel.includes.modal_edit')
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('#shop_filter').change(function () {
            if ($(this).val() == 0) {
                window.location.replace(base_url + "/products");
            } else {
                window.location.replace(base_url + "/products-shop/" + $(this).val());
            }
        });
        $(document).on('submit', '#stockForm', function (event) {
            event.preventDefault();
            removeAjaxMsgs();
            let form = $(this);
            let btn = form.find('.btn');
            btn.attr("disabled", true);
            btn.addClass('loader');
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    var table = $('#datatable-' + _module).DataTable();
                    table.ajax.reload();
                    btn.attr("disabled", false);
                    Swal.fire(
                        'Success!',
                        'Stock Updated Successfully!',
                        'success'
                    )
                }, error: function (err) {
                    btn.attr("disabled", false);
                    btn.removeClass('loader');
                    showErrorMsgs(err);
                }
            });
        });
    </script>
@endpush
