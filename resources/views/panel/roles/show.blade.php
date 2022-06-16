@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 id="section1" class="mg-b-4">{{ setText($module) }} Management</h4>
                    <div class="new-store-box d-flex align-items-center">
                        <div class="custom-control custom-switch pl-0">
                            <label for="customSwitch1" class="switch-active">Status</label>
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label for="customSwitch1" class="custom-control-label ml-3"></label>
                        </div>
                    </div>
                </div>
                <div class="row row-xs mt-2">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card card-body dataTableBox">
                            @include('panel.includes.datatable')
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </div><!-- content-body -->
        @include('panel.includes.modal_edit')
    </div><!-- content -->
@endsection


