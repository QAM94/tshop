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
                        <div class="card card-body dataTableBox">
                            @include('panel.includes.datatable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('panel.includes.modal_add')
        @include('panel.includes.modal_edit')
        @include('panel.includes.modal_view')
    </div>
@endsection
@push('custom-scripts')
        <script src="{{ asset('js/form.js') }}"></script>
        <script>
            function printReceipt() {
                let divToPrint=document.getElementById('printDiv');
                let win=window.open('','Print-Window');
                win.document.open();
                win.document.write('<html><body onload="window.print()">'+printDiv.innerHTML+'</body></html>');
                win.document.body.style.fontFamily="IBM Plex Sans, sans-serif";
                win.document.close();
                setTimeout(function(){win.close();},10);
            }
        </script>
@endpush


