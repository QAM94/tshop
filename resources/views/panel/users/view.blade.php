@extends('panel.master')

@section('main')
    <div class="layout-w">
        <div class="content-w">

            <div class="content-panel-toggler">
                <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
            </div>
            <div class="content-i">
                <div class="content-box">
                    <div class="element-wrapper">
                        <div class="container col-lg-9">
                            <div class="element-wrapper"><h6 class="element-header">View {{ ucfirst($module) }}</h6>
                                <div class="element-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-border-color card-border-color-primary cus-card-bg">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Name</h6></label>
                                                                <p>{{ $data->name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Email</h6></label>
                                                                <p>{{ $data->email }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Contact</h6></label>
                                                                <p>{{ $data->contact }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Role</h6></label>
                                                                <p>{{ $data->role->title }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Status</h6></label>
                                                                <p>{{ $data->status }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Hotel Name</h6></label>
                                                                <p>{{ $data->hotel->name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group pt-2">
                                                                <label for="inputEmail"><h6>Branch Name</h6></label>
                                                                <p>{{ $data->branch->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
