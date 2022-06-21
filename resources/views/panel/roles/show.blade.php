@extends('panel.master')
@section('main')

    <div class="content ht-100v pd-0">
        <div class="content-body">
            <div class="container pd-x-0 tx-13">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 id="section1" class="mg-b-4">{{ setText($module) }} Management</h4>
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


